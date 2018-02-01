<?php 
require('links.php');
?>

<script>
        
    //On radio select get admins of the selected department and display
    function selected(DID){
        $.ajax(
        {
            url:"get-dep-admins.php",
            method:"POST",
            data:{DID:DID},
            success:function(data){
                $('#admin_list').html(data);
                $('#Admin_view').show();
                if(data == 1){
                    // Means no Employees in department so hide the remove employee button
                    $('#del-admin-btn').hide();
                }
            }
        });
        
        $.ajax(
        {
            url:"get-non-admins.php",
            method:"POST",
            data:{DID:DID},
            success:function(data){
                $('#non_admin_list').html(data);
                $('#non_admin_employees').show();
                
                //NOW show the related Buttons
                if(data!=1){ // Means there are non admin employees
                    //Show 
                    //Add to department
                    $('#add-admin-btn').show();
                }
            }
        });
    }
    
    //Getting department hirarchy to add admins
    function fetch_depts(){
        $.ajax(
        {
            url:"get-dep-hir-for-admin-add.php",
            method:"POST",
            success:function(data){
                $('#dept_list').html(data);
                
            }
        });
    }
    
    
    //Admin is selected hence show proper buttons
    function show_from_btns(id){
        //Showing remove from dept 
        $('#rem_btns').show();
        //Hiding add to dept 
        $('#add_btns').hide();
    }
    
    //NON-Employee is selected hence show proper buttons (ADD)
    function show_add(id){
        console.log(id);
        var selected = 0;
        //Hiding remove from dept button
        $('#rem_btns').hide();
        
        $(':checkbox:checked').each(function(i){
            id[i] = $(this).val();
            selected++;
        });
        if(selected == 0){
            // No checkbox is selected hence hiding add to dept button
            $('#add_btns').hide();
        }
        else{
            //Some checkboxes are selected hence Showing add to dept button
            $('#add_btns').show();
        }
        
    }
    
    $(document).ready(function(){
        
        var lvbtn = document.getElementById('admin-privils');
        lvbtn.addEventListener('click', function() { document.location.href = '/admin_privils.php'; });
        
        //get hirarchy to add admins
        fetch_depts();
        
        
        //Providing the delete admin function
        $('#del-admin-btn').click(function(){
            var id = document.querySelector('input[name="myradio"]:checked').value;
            $.ajax({
                url:'del-admin.php',
                method:'POST',
                data:{id:id},
                success:function(data){

                    $('input[name="myradio"]:checked').css('background-color','#ccc');
                    $('input[name="myradio"]:checked').fadeOut('slow');
                    $('input[name="myradio"]:checked').remove();

                    //Now refreshing the lists
                    $('#Admin_view').hide();
                    $('#rem_btns').hide();
                    $('#dept_list').empty();
                    fetch_depts();
                }
            });
        });
        
        
        
        
        //Providing the Add to department admin function
        $('#add-admin-btn').click(function(){
            var id=[];
            var DID = $('input[name="radi"]:checked').val();
            var adminType = '';
            adminType = $('input[name="admin_type"]:checked').val();
            if(adminType != ''){
                $(':checkbox:checked').each(function(i){
                    id[i] = $(this).val();
                });
                $.ajax({
                    url:'add-admin-to-dpt.php',
                    method:'POST',
                    data:{id:id,adminType:adminType},
                    success:function(data){                
                        //Now refreshing the lists
                        $('#admin_list').empty();
                        selected(DID);
                    }
                });
            }
            else
                alert("Please Select an Admin type and try again");
            
        });
        
        
        //Providing the Change Pass Interface
        $('#change-admin_pass_btn').click(function(){
            $('#change-super-pass').show();
            $('#change-admin_pass_btn').hide();
        });
        
        
        //Handling Password Update Functionality
        $('#update-pass-btn').click(function(){
            var old_pass = document.getElementById("old_pass").value;
            var new_pass = document.getElementById("new_pass").value;
            var varify_pass = document.getElementById("varify_pass").value;
            if(old_pass != "" && new_pass != "" && new_pass == varify_pass){
                var id = document.querySelector('input[name="myradio"]:checked').value;

                $.ajax({
                    url:'change-admin-pass.php',
                    method:'POST',
                    data:{id:id,old_pass:old_pass,new_pass:new_pass,varify_pass:varify_pass},
                    success:function(data){
                        alert(data);
                        $(':radio:checked').attr('checked', false);
                        $('#rem_btns').hide();
                    }
                });
            }
            else
                alert("Please Recheck the fields and enter again")
        });
        
        //Handlig Default Password Update Functionality
        $('#set-def-pass-btn').click(function(){
            if(confirm("Are you Sure Want to Remove Thesese?")){
                var id = document.querySelector('input[name="myradio"]:checked').value;

                $.ajax({
                    url:'change-admin-pass-default.php',
                    method:'POST',
                    data:{id:id},
                    success:function(data){
                        alert(data);
                        $(':radio:checked').attr('checked', false);
                        $('#change-super-pass').hide();
                        $('#del-admin-btn').hide();
                        $('#change-admin_pass_btn').hide();
                    }
                });
            }
        });
        
        
        //Handling a state machine multiuse button
        var adminchange = 0;
        //Handlig Admin Type Update
        $('#change-admin_type_btn').click(function(){
            if(adminchange == 0){
                $('#add_btns').show();
                $('#add-admin-btn').hide();
                adminchange++;
            }
            else{
                adminchange--;
                $('#add_btns').hide();
                var userID = $('input[name="myradio"]:checked').val();
                var adminType = $('input[name="admin_type"]:checked').val();
                $.ajax({
                    url:'change-admin-type.php',
                    method:'POST',
                    data:{userID:userID,adminType:adminType},
                    success:function(data){
                        alert(data);
                    }
                });
            }    
        });
        
    });
</script>
<title>Attendence Management System</title>
      
</head>
<body>
    
    <!-- NAV -->
<?php 
    require('navbar_admin.php');
    ?>
<!-- NAV -->
	<h2 align="center">Department Administrator Settings</h2>
	<div class = "container">
		<div style="width: 100%;">
            <div style="float: left; width: 35%" id="Dept_view"> 
                <button type="button" class="btn btn-primary" id="admin-privils" >Admin Privils</button>
 		   		<h3>Departments</h3><p>Select a Department to add aministrator</p>
                <div id="dept_list"></div>
			</div>
            <div style="float: right; width: 60%; display:none;" id="Admin_view"> 
 		   		<h3>Admins</h3>
                <div id="admin_list"></div>
			</div>
            
            <div style="display:none;width:60%; float:right; display:none;"  id="rem_btns"> 
                
                <button type="button" class="btn btn-danger" id="del-admin-btn" >Delete Admin</button>
                <form class="change-super-pass" role="form" style="display:none; margin:3%;" id="change-super-pass">
                    
                    <span class="input_text" style="margin:1%;"><input type="text" class="form-control" id="old_pass" placeholder="Old Password"></span>
                    <span class="input_text" style="margin:1%;"><input type="text" class="form-control" id="new_pass" placeholder="New Password"></span>
                    <span class="input_text" style="margin:1%;"><input type="text" class="form-control" id="varify_pass" placeholder="Varify Password"></span>
                    <button type="button" class="btn btn-primary" id="update-pass-btn" style="margin:1%;">Change Password</button>
                    <button type="button" class="btn btn-primary" id="set-def-pass-btn" style="margin:1%;">Set Default</button>
                </form>
                <button type="button" class="btn btn-primary" id="change-admin_pass_btn" >Change Password</button>
                <button type="button" class="btn btn-primary" id="change-admin_type_btn" >Change Type</button>
                
			</div>
            
            <div style="display:none;width:60%; float:right; display:none;"  id="add_btns">
                <button type="button" class="btn btn-primary" id="add-admin-btn">Add Admin</button>
                <span>First Level<input type="radio" name="admin_type" value="1"></span>
                <span>Second Level<input type="radio" name="admin_type" value="2"></span>
            </div>
            
            
            <div style="display:none;width:60%; float:right;"  id="non_admin_employees"> 
 		   		<h3>NON Admin Employees</h3>
                <div id="non_admin_list"></div>
			</div>
            
		</div>
	</div>
</body>
</html>
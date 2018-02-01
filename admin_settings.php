<?php 
require('links.php');
?>

<script>
var dept_selected = 0;
function allow_del_user(){
    $('#del-admin-btn').show();
    $('#add-new-admin').hide();
    $('#add-super-admin').hide();
    $('#change-admin_pass_btn').show();
}    
    
    
function fetch_admins(){
    $.ajax(
    {
        url:"get-admins.php",
        method:"POST",
        success:function(data){
            $('#admin_list').html(data);
        }
    });
}
function display_employees_of_dept(id){
    $.ajax(
    {
        url:"get-dep-emp.php",
        method:"POST",
        data:{id:id},
        success:function(data){
            $('#show-employees').html(data);
            $('#show-employees').show();
        }
    });
}
    
    
$(document).ready(function(){
    // Functions for calling other screens
    var addDepAdm = document.getElementById('add-dept-admin-btn');
    addDepAdm.addEventListener('click', function() { document.location.href = '/add_dep_admin.php'; });
    
    //Ajax functions
    fetch_admins();
    $('#add-admin-btn').click(function(){
        $('#add-new-admin').show();
        $('#add-super-admin').hide();
        $('#add-super-admin-btn').show();
        $('#change-admin_pass_btn').hide();
        $('#del-admin-btn').hide();
        $('#change-super-pass').hide();
        $('input[name="radi"]:checked').attr('checked', false);
    });
    
    
    
    //Adding Super Admin Button Press
    //Here we are showing the Form Containing necessary fields for the use to add
    $('#add-super-admin-btn').click(function(){
        $('#add-super-admin').show();
        $('#add-super-admin-btn').hide();
    });
    
    
    // Showing the search Results
    $(document).on('click','#show-search',function(){
        var userID = document.getElementById("userID").value;
        if(userID!=""){
            $.ajax({
                 url:'search-employee.php',
                 method:'POST',
                 data:{userID:userID},
                 success:function(data){
                     $('#search-res').html(data);
                 }
            });
        }
        else
            alert("Please Enter Something in the search box");
    });
    
    //Handling the Add Super Button
    // Here we will get the value from the selected Radio Button and
    // Make AJAX call
    // TO add the user as SUPER
    // TO add User as super just make its admin TYPE as 0
    // USER can still be the part of some dept but can be super at the same time
    $('#add-super-admin-now-btn').click(function(){
        if(confirm("Are you Sure Want to Add the user as super Admin?")){
            var id=[];
            $(':checkbox:checked').each(function(i){
                id[i] = $(this).val();
            });
            if(id.length > 0){
                $.ajax({
                    url:'add-super-admin.php',
                    method:'POST',
                    data:{id:id},
                    success:function(data){
                        $('#admin_list').empty();
                        fetch_admins();
                        $('#add-super-admin').hide();
                        $('#add-super-admin-btn').hide();
                    }
                });
            }
            else{
                alert("Please Select atleast one checkbox");
            }
        }
        else{
            return false;
        }
    });
    
    //Adding Delete Admin Functionality
    $('#del-admin-btn').click(function(){
        var id = document.querySelector('input[name="radi"]:checked').value;
        console.log(id);
        $.ajax({
            url:'del-admin.php',
            method:'POST',
            data:{id:id},
            success:function(data){
                $('#admin_list').empty();
                fetch_admins();
                $('#add-super-admin').hide();
                $('#add-super-admin-btn').hide();
                $('#change-super-pass').hide();
                $('#del-admin-btn').hide();
                $('#change-admin_pass_btn').hide();
            }
        });
    });
    
    
    //Adding Change Password Functionality
    
    $('#change-admin_pass_btn').click(function(){
        var id = document.querySelector('input[name="radi"]:checked').value;
        $('#change-super-pass').show();
    });
    
    
    //Handling Password Update Functionality
    $('#update-pass-btn').click(function(){
        var old_pass = document.getElementById("old_pass").value;
        var new_pass = document.getElementById("new_pass").value;
        var varify_pass = document.getElementById("varify_pass").value;
        if(old_pass != "" && new_pass != "" && new_pass == varify_pass){
            var id = document.querySelector('input[name="radi"]:checked').value;
            
            $.ajax({
                url:'change-admin-pass.php',
                method:'POST',
                data:{id:id,old_pass:old_pass,new_pass:new_pass,varify_pass:varify_pass},
                success:function(data){
                    alert(data);
                    $(':radio:checked').attr('checked', false);
                    $('#change-super-pass').hide();
                    $('#del-admin-btn').hide();
                    $('#change-admin_pass_btn').hide();
                }
            });
        }
        else
            alert("Please Recheck the fields and enter again")
    });
    
    //Handlig Default Password Update Functionality
    $('#set-def-pass-btn').click(function(){
        if(confirm("Are you Sure Want to Remove Thesese?")){
            var id = document.querySelector('input[name="radi"]:checked').value;
        
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
        else
            alert("Please Recheck the fields and enter again")
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
	<h2 align="center">Administrator Settings</h2>
	<div class = "container">
		<div style="width: 100%;">
            <div style="float: left; width: 35%" id="Admin_view"> 
 		   		<h3>Administrators</h3>
                <div id="admin_list"></div>
                <span style="font-size:50px;"><div id="spec_admin"></div></span>
			</div>
			<div style="float: right; width: 60%">
                <div id="show-employees" style="display:none;">
                </div>
                
 		   		<h3>Options</h3>
                <form class = "admin-options" role = "form">
                    <button type="button" class="btn btn-primary" id="show-dept-again-btn" style="display:none;">Back to Admin</button>
                    <button type="button" class="btn btn-primary" id="add-admin-btn">Add Admin</button>
                    <button type="button" class="btn btn-danger" id="del-admin-btn" style="display:none;">Delete Admin</button>
                    <button type="button" class="btn btn-primary" id="change-admin_pass_btn" style="display:none;">Change Password</button>
                    
                </form>
                <form class="add-new-admin" role="form" style="display:none; margin:3%;" id="add-new-admin">
                    <button type="button" class="btn btn-primary" id="add-super-admin-btn">Add Super Admin</button>
                    <button type="button" class="btn btn-primary" id="add-dept-admin-btn">Add Department Admin</button>
                </form>
                
                <form class="add-super-admin" role="form" style="display:none; margin:3%;" id="add-super-admin">
                    
                    <span class="input_text" style="margin:1%;"><input type="text" class="form-control" id="userID" placeholder="User ID"></span>
                    <button type="button" class="btn btn-primary" id="show-search" style="margin:1%;">Search</button>
                    <div id="search-res"></div>
                    <button type="button" class="btn btn-primary" id="add-super-admin-now-btn" style="margin:1%;">Add Super</button>
                </form>
                
                <form class="change-super-pass" role="form" style="display:none; margin:3%;" id="change-super-pass">
                    
                    <span class="input_text" style="margin:1%;"><input type="text" class="form-control" id="old_pass" placeholder="Old Password"></span>
                    <span class="input_text" style="margin:1%;"><input type="text" class="form-control" id="new_pass" placeholder="New Password"></span>
                    <span class="input_text" style="margin:1%;"><input type="text" class="form-control" id="varify_pass" placeholder="Varify Password"></span>
                    <button type="button" class="btn btn-primary" id="update-pass-btn" style="margin:1%;">Change Password</button>
                    <button type="button" class="btn btn-primary" id="set-def-pass-btn" style="margin:1%;">Set Default</button>
                </form>
                
			</div>
		</div>
	</div>
</body>
</html>
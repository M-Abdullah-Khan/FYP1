<?php 
require('links.php');
?>

<script>
var dept_selected = 0;
function fetch_departments(){
    $.ajax(
    {
        url:"get-dep-hir.php",
        method:"POST",
        success:function(data){
            $('#dep-list').html(data);
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
 fetch_departments();
    $('#add_dept_btn').click(function(){
        $('#add-new-dept').show();
    });
    
    
    $('#add_dept_now_btn').click(function(){
        var id=[];
         $(':checkbox:checked').each(function(i){
             id[i] = $(this).val();
         });
        var name = document.getElementById("name").value;
         if(id.length < 2){
             $.ajax({
                 url:'add-dept-now.php',
                 method:'POST',
                 data:{id:id,name:name},
                 success:function(){
                    fetch_departments(); 
                 }
             });
         }
        else{
            alert("Please Select only one checkbox");
        }
     
    });
    
 $('#del_dept_btn').click(function(){
     if(confirm("Are you Sure Want to Remove Thesese?")){
         var id=[];
         $(':checkbox:checked').each(function(i){
             id[i] = $(this).val();
         });
         if(id.length > 0){
             $.ajax({
                 url:'delete-dept.php',
                 method:'POST',
                 data:{id:id},
                 success:function(data){
                     for(var i=0; i < id.length; i++){
                         $('li#'+id[i]+'').css('background-color','#ccc');
                         $('li#'+id[i]+'').fadeOut('slow');
                         $('#'+id[i]+'').remove();
                     }
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
     header("Location: departments.php");
 });
    
});
    //Show departments again after work is done
    $(document).on('click','#show_dept_again_btn',function(){
        $('#dep-list').show();
        $(':checkbox:checked').attr('checked', false);
        $('#one_dep').hide();
        $('#show-employees').hide();
        $('#show_dept_again_btn').hide();
        $('#add_emp_rem_btn').show();
        $('#add_dept_btn').show();
        $('#del_dept_btn').show();
    });
    
    
    $(document).on('click','#rem_from_dept_btn',function(){
        if(confirm("Are you Sure Want to Remove These from Selected Department?")){
            var id=[];
            $(':checkbox:checked').each(function(i){
                id[i] = $(this).val();
            });
            if(id.length > 0){
                $.ajax({
                    url:'rem-from-dept.php',
                    method:'POST',
                    data:{id:id,dept_selected:dept_selected},
                    success:function(data){
                        for(var i=0; i < id.length; i++){
                            $('tr#'+id[i]+'').css('background-color','#ccc');
                            $('tr#'+id[i]+'').fadeOut('slow');
                        }
                        $.ajax(
                        {
                            url:"get-dep-emp.php",
                            method:"POST",
                            data:{id:dept_selected},
                            success:function(data){
                                $('#show-employees').html(data);
                                $('#show-employees').show();
                            }
                        });
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
     header("Location: departments.php");
    });
    
    // Handling add/rem employee button functionality
    $(document).on('click','#add_emp_rem_btn',function(){
        var id=[];
         $(':checkbox:checked').each(function(i){
             id[i] = $(this).val();
         });
        if(id.length == 1){
            display_employees_of_dept(id);
            dept_selected = id[0];
            $('#dep-list').hide();
            $('#add_dept_btn').hide();
            $('#del_dept_btn').hide();
            $('#add_emp_rem_btn').hide();
            $.ajax({
                 url:'get-dept-name.php',
                 method:'POST',
                 data:{id:id},
                 success:function(data){
                    $('#one_dep').html(data);         
                 }
             });
            $(':checkbox:checked').attr('checked', false);
            $('#one_dep').show();
            $('#show_dept_again_btn').show(); 
         }
        else{
            alert("Please Select only one checkbox to use this feature");
        }
    });
    
    //handling the add to department functionality
    $(document).on('click','#add_to_dept',function(){
        var id=[];
         $(':checkbox:checked').each(function(i){
             id[i] = $(this).val();
         });
        if(id.length == 1){
            $.ajax({
                 url:'add-to-dep.php',
                 method:'POST',
                 data:{id:id, dept_selected:dept_selected},
                 success:function(data){
                     for(var i=0; i < id.length; i++){
                         $('tr#'+id[i]+'').css('background-color','#ccc');
                         $('tr#'+id[i]+'').fadeOut('slow');
                     }
                     $.ajax({
                         url:"get-dep-emp.php",
                         method:"POST",
                         data:{id:dept_selected},
                         success:function(data){
                             $('#show-employees').html(data);
                             $('#show-employees').show();
                         }
                     });
                 }
             });
         }
        else{
            alert("Please Select only one checkbox to use this feature");
        }
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
	<h2 align="center">Department Management</h2>
	<div class = "container">
		<div style="width: 100%;">
            <div style="float: left; width: 35%" id="department-view"> 
 		   		<h3>Departments</h3>
                <div id="dep-list"></div>
                <span style="font-size:50px;"><div id="one_dep"></div></span>
			</div>
			<div style="float: right; width: 60%">
                <div id="show-employees" style="display:none;">
                </div>
                
 		   		<h3>Options</h3>
                <form class = "dept-options" role = "form">
                    <button type="button" class="btn btn-primary" id="show_dept_again_btn" style="display:none;">Show Departments</button>
                    <button type="button" class="btn btn-danger" id="del_dept_btn">Delete Department</button>
                    <button type="button" class="btn btn-primary" id="add_dept_btn">Add New Department</button>
                    <button type="button" class="btn btn-primary" id="add_emp_rem_btn">Add/Remove Employees to/From Department</button>
                    
                </form>
                <form class="add-new-dept" role="form" style="display:none; margin:7%;" id="add-new-dept">
                    <p>To add department under super please check the super and Press Newly created ADD BUTTON. A department cannot have multiple Supers.</p>
                    
                    <span class="input_text"><input type="text" class="form-control" id="name" placeholder="Name"></span>
                    <button type="button" class="btn btn-primary" id="add_dept_now_btn">Add</button>
                </form>
			</div>
		</div>
	</div>
</body>
</html>
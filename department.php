<?php 
require('links.php');
?>

<script>

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
    $('#add_dept').click(function(){
        $('#add-new-dept').show();
    });
    
    
    $('#add_dept_now').click(function(){
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
                     for(var i=0;i<id.length; i++){
                         $('li#'+id[i]+'').css('background-coloe','#ccc');
                         $('li#'+id[i]+'').fadeOut('slow');
                     }
                 }
             });
         }
        else{
            alert("Please Select only one checkbox");
        }
     fetch_departments();
    });
    
 $('#del_dept').click(function(){
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
                 success:function(){
                     for(var i=0;i<id.length; i++){
                         $('li#'+id[i]+'').css('background-coloe','#ccc');
                         $('li#'+id[i]+'').fadeOut('slow');
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
     fetch_departments();
 });
    
});
    
    // Handling add/rem employee button functionality
    $(document).on('click','#add_emp_rem',function(){
        var id=[];
         $(':checkbox:checked').each(function(i){
             id[i] = $(this).val();
         });
        if(id.length == 1){
            display_employees_of_dept(id);
            $('#dep-list').hide();
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
            display_employees_of_dept(id);
         }
        else{
            alert("Please Select only one checkbox to use this feature");
        }
    });
    
$(document).on('click','#btn-add',function(){
    console.log('btn Click');
    var uid = document.getElementById("uid").value;
    var name = document.getElementById("name").value;
    var CN = document.getElementById("CN").value;
    var title = document.getElementById("title").value;
    var department = document.getElementById("department").value;
    var adminType = document.getElementById("adminType").value;
    var mon = document.getElementById("mon").value;
    var off_Tel = document.getElementById("off_Tel").value;
    var email = document.getElementById("email").value;
    var address = document.getElementById("address").value;
    var city = document.getElementById("city").value;
    var state = document.getElementById("state").value;
    var nationality = document.getElementById("nationality").value;
    var PO = document.getElementById("PO").value;
    var FC = document.getElementById("FC").value;
    var LFC = document.getElementById("LFC").value;
    var RFC = document.getElementById("RFC").value;
    var DOB = document.getElementById("DOB").value;
    var DOE = document.getElementById("DOE").value;
    console.log();
      $.ajax({
          url: "insert.php",
          method:"POST",
          data: {uid:uid, CN:CN, name:name, email:email, title:title, department:department, mon:mon, off_Tel:off_Tel, address:address, city:city, state:state, nationality:nationality, PO:PO, FC:FC, LFC:LFC, RFC:RFC, DOB:DOB, DOE:DOE, adminType:adminType},
          dataType:"text",
          success:function(data){
              alert(data);
              fetch_departments();
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
                    <button type="button" class="btn btn-danger" id="del_dept">Delete Department</button>
                    <button type="button" class="btn btn-primary" id="add_dept">Add New Department</button>
                    <button type="button" class="btn btn-primary" id="add_emp_rem">Add/Remove Employees to/From Department</button>
                    
                </form>
                <form class="add-new-dept" role="form" style="display:none; margin:7%;" id="add-new-dept">
                    <p>To add department under super please check the super and Press Newly created ADD BUTTON. A department cannot have multiple Supers.</p>
                    
                    <span class="input_text"><input type="text" class="form-control" id="name" placeholder="Name"></span>
                    <button type="button" class="btn btn-primary" id="add_dept_now">Add</button>
                </form>
			</div>
		</div>
	</div>
</body>
</html>
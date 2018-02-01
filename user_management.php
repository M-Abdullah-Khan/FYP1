<?php 
require('links.php');
?>
</head>

<script>
function showDiv(){
    document.getElementById('add_users').style.display = "block";
}
function showUpload(){
    console.log("upload");
    document.getElementById('upload_file').style.display = "block";
}
function fetch_data(){
    $.ajax(
    {
        url:"select.php",
        method:"POST",
        success:function(data){
            $('#live_data').html(data);
        }
    });
}
$(document).ready(function(){
 fetch_data();
 $('#btn-delete').click(function(){
     if(confirm("Are you Sure Want to Remove Thesese?")){
         var id=[];
         $(':checkbox:checked').each(function(i){
             id[i] = $(this).val();
         });
         if(id.length > 0){
             $.ajax({
                 url:'delete.php',
                 method:'POST',
                 data:{id:id},
                 success:function(){
                     for(var i=0;i<id.length; i++){
                         $('tr#'+id[i]+'').css('background-coloe','#ccc');
                         $('tr#'+id[i]+'').fadeOut('slow');
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
 });
    
});
$(document).on('click','#btn-add',function(){
    console.log('btn Click');
    var uid = document.getElementById("uid").value;
    var name = document.getElementById("name").value;
    var CN = document.getElementById("CN").value;
    var title = document.getElementById("title").value;
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
    
    
    $get_dept_query = "SELECT department FROM employee"
    if(department)
    
    
    console.log();
      $.ajax({
          url: "insert.php",
          method:"POST",
          data: {uid:uid, CN:CN, name:name, email:email, title:title, mon:mon, off_Tel:off_Tel, address:address, city:city, state:state, nationality:nationality, PO:PO, FC:FC, LFC:LFC, RFC:RFC, DOB:DOB, DOE:DOE},
          dataType:"text",
          success:function(data){
              alert(data);
              fetch_data();
          }
      });
});
</script>
<body>
    
    <!-- NAV -->
<?php 
    require('navbar_admin.php');
    ?>
<!-- NAV -->
<h2 align="center">Employee Maintenance</h2>
<div id="live_data"></div>

<button type="button" class="btn btn-primary" onclick="showDiv()">Add User</button>
<button type="button" class="btn btn-primary" onclick="showUpload()">Upload Data</button>
<button type="button" class="btn btn-danger" id="btn-delete">Delete User</button>
<div class="container" style="display:none" id="add_users">
    <form class = "add_device" role = "form">
        <span class="input_text"><input type="text" class="form-control" id="uid" placeholder="UserID"></span>
        <span class="input_text"><input type="text" class="form-control" id="CN" placeholder="Card No"></span>
        <span class="input_text"><input type="text" class="form-control" id="name" placeholder="Name"></span>
        <span class="input_text"><input type="text" class="form-control" id="title" placeholder="Title"></span>
        <span class="input_text"><input type="text" class="form-control" id="mon" placeholder="Mobile No"></span>
        <span class="input_text"><input type="text" class="form-control" id="off_Tel" placeholder="Office Tel."></span>
        <span class="input_text"><input type="text" class="form-control" id="email" placeholder="Email"></span>
        <span class="input_text"><input type="text" class="form-control" id="address" placeholder="Address"></span>
        <span class="input_text"><input type="text" class="form-control" id="city" placeholder="City"></span>
        <span class="input_text"><input type="text" class="form-control" id="state" placeholder="State"></span>
        <span class="input_text"><input type="text" class="form-control" id="nationality" placeholder="Nationality"></span>
        <span class="input_text"><input type="text" class="form-control" id="PO" placeholder="Post Code"></span>
        <span class="input_text"><input type="text" class="form-control" id="FC" placeholder="Face Count"></span>
        <span class="input_text"><input type="text" class="form-control" id="LFC" placeholder="Left Finger Count"></span>
        <span class="input_text"><input type="text" class="form-control" id="RFC" placeholder="Right Figer Count"></span>
        <span class="input_text">Date Of Birth:<input type="date" class="form-control" id="DOB"></span>
        <span class="input_text">Date Of Employeed:<input type="date" class="form-control" id="DOE"></span>
        <button type="button" class="btn btn-primary" id="btn-add">Add</button>
    </form>
<div id="upload_file">
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" value="upload">
    </form>
</div>
</div>
</body>
</html>

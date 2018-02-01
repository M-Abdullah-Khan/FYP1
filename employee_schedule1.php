<?php 
require('links.php');
?>
</head>

<script>
function showDiv(){
    document.getElementById('schedule').style.display = "block";
}
function showUpload(){
    console.log("upload");
    document.getElementById('upload_file').style.display = "block";
}
function fetch_data(){
    $.ajax(
    {
        url:"DeptView_.php",
        method:"POST",
        success:function(data){
            $('#Department_data').html(data);
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
    var cn = document.getElementById("cn").value;
    var Name = document.getElementById("Name").value;
    var eid = document.getElementById("eid").value;
    var pn = document.getElementById("pn").value;
    console.log();
      $.ajax({
          url: "insert.php",
          method:"POST",
          data: {uid:uid, cn:cn, Name:Name, eid:eid, pn:pn},
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
<h2 align="center">Employee Schedule</h2>
<div class="container">
    <div id="Department_data" style="width:45%; float:left;"></div>
    <div id="Employee_data" style="width:45%; float:right;"></div>
</div>
</br>
<div class="container">
    <div id="schedule"></div>
</div>
<button type="button" class="btn btn-primary" onclick="showDiv()">Add to department</button>
<button type="button" class="btn btn-primary" onclick="showUpload()">Upload Data</button>
<button type="button" class="btn btn-danger" id="btn-delete">Delete User</button>
</body>
</html>

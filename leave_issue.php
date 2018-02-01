<?php 
require('links.php');
?>
</head>

<script>
var qux = 0;  
var row_sel;
var row_num;
function showUpload(){
    console.log("upload");
    document.getElementById('upload_file').style.display = "block";
}
function fetch_data(){
    $.ajax(
    {
        url:"get-leave-info.php",
        method:"POST",
        success:function(data){
            $('#live_data').html(data);
        }
    });
}
$(document).ready(function(){
    fetch_data();  
    var foo = 0;
    $("#issue").click(function(){
        if(foo == 0){
            $("#search").show();
            $("#btn-add").show();
            foo = 1;
        }
        else{
            $("#search").hide();
            $("#btn-add").hide();
            foo = 0;
        } 
    });
    $(':checkbox:checked').change(function() {
       if ($(this).is(":checked")) {
          console.log("in");
          return;
       }
        else{
            console.log("out");
        }
    });
    
    
    $('#btn-delete').click(function(){
         if(confirm("Are you Sure Want to Remove Thesese?")){
             var id=[];
             $(':checkbox:checked').each(function(i){
                 id[i] = $(this).val();
             });
             if(id.length > 0){
                 $.ajax({
                     url:'remove-leave.php',
                     method:'POST',
                     data:{id:id},
                     success:function(){
                         for(var i=0;i<id.length; i++){
                             $('tr#'+id[i]).css('background-color','#ccc');
                             $('tr#'+id[i]).fadeOut('slow');
                             fetch_data();
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
        var from = document.getElementById("from_field").value;
        var to = document.getElementById("to_field").value;
        var issuedby = document.getElementById("IssuedBy").value;
        var reason = document.getElementById("Reason").value;
        var leavetype = document.getElementById("Ltype").value;
        if(confirm("Are you Sure Want to Issue Leave to selected Employee(s)?")){
             var id=[];
             $('#search_results :checkbox:checked').each(function(i){
                 id[i] = $(this).val();
             });
             if(id.length > 0){
                 $.ajax({
                    url: "insert-leave.php",
                    method:"POST",
                    data: {id:id, from:from, to:to, issuedby:issuedby, reason:reason, leavetype:leavetype},
                    success:function(){
                        alert("done");
                        $("#search_string").hide();
                        qux = 0;
                        $("#search_results").hide();
                        $("#add_leave").hide();
                        foo = 0;
                        fetch_data();
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
    
    $(document).on('click','#search',function(){
        if(qux == 0){
            $("#search_string").show();
            qux = 1;
        }
        else{
            var searchstr = document.getElementById("search_string").value;
            $.ajax({
                url: "search-result.php",
                method:"POST",
                data: {searchstr:searchstr},
                dataType:"text",
                success:function(data){
                    $('#search_results').html(data);
                }
            });
            qux = 0;
            $("#search_string").hide();
            $("#add_leave").show();
            $("#search_results").show();
            
        }
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

<button type="button" class="btn btn-primary" id="issue" style="float:left; margin:20px;">Issue Leave</button>
<button type="button" class="btn btn-danger" id="btn-delete" style="float:left; margin:20px;">Remove Leave</button>
    <div class="space"></div></br>
    <div class="container" id="search_results">
        

    </div>
    <div class="container">
        <input type="text" class="form-control" id="search_string" placeholder="Search" style="display:none; margin:20px; width:50%;">
        <button type ="button" class="btn btn-primary" id="search" style="float:right; margin:10px; display:none;">Search</button>
        <button type="button" class="btn btn-primary" id="btn-add" style="float:right; margin:10px; display:none;">Add</button>
        <div id="add_leave" class="form" style="display:none">
            <span class="date_picker" style="margin:10px;">From:<input type="date" name="From" id="from_field" required autofocus ></span>
            <span class="date_picker" style="margin:10px;">To:<input type="date" name="To" id="to_field" required autofocus ></span>
            <span class="input_text"><input type = "text" class = "form-control" 
            name = "IBy" id="IssuedBy" placeholder = "Issued By" 
            required autofocus></span>
            <span class="input_text"><input type = "text" class = "form-control" 
            name = "Reason" id="Reason" placeholder = "Reason" 
            required autofocus></span>
            <span class="input_text"><input type = "text" class = "form-control" 
            name = "LeaveType" id="Ltype" placeholder = "Leave Type" 
            required autofocus></span>
            
        </div>
    </div>
</body>
</html>

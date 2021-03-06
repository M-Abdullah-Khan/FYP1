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
                $('#live_data').show();
            }
        });
        
    }
    
    
    //Function Called When an employee is selected form the search results
    function employee_selected(){
        var sid=[];
        $(':checkbox:checked').each(function(total){
            sid[total] = $(this).val();
        });
        console.log("selected");
        
        if(sid.length > 0){
            $('#btn-add').show();
            console.log(sid.length);
        }
        else{
            console.log(sid.length);
            $('#btn-add').hide();
        }
    }
    
    
    // Function is called when a checkbox is checked
    function selected(){
        
        // Getting total no of checkboxes selected
        var id=[];
        $('tr').css('background-color','#ffffff');
        $(':checkbox:checked').each(function(i){
            id[i] = $(this).val();
            $('tr#'+id[i]+'').css('background-color','#7be587');
        });
                                      
        
        // Now if more than one are selected user should be getting a remove option // else not!
        if(id.length > 0){
            $('#btn-delete').show();
            
        }
        else{
            $('#btn-delete').hide();
        }
        
    }
    
    
    
    
    $(document).ready(function(){
        fetch_data();
        
        // When Issue Leave button is pressed do the following
        var foo = 0;
        $("#issue").click(function(){
            if(foo == 0){
                $("#search").show();
                $('#search_string').show();
                foo = 1;
            }
            else{
                $("#search").hide();
                $('#search_string').hide();
                foo = 0;
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
                                 $('tr#'+id[i]+'').css('background-color','#f20000');
                                 $('tr#'+id[i]+'').fadeOut('slow');
                             }
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


    });
    $(document).on('click','#btn-add',function(){
        var from = document.getElementById("from_field").value;
        var to = document.getElementById("to_field").value;
        var issuedby = document.getElementById("IssuedBy").value;
        var reason = document.getElementById("Reason").value;
        var leavetype = document.getElementById("leave_classes").value;
        if(confirm("Are you Sure Want to Issue Leave to selected Employee(s)?")){
             var id=[];
             $('#search_results :checkbox:checked').each(function(i){
                 id[i] = $(this).val();
                 console.log(id[i]);
             });
             if(id.length > 0){
                 $.ajax({
                    url: "insert-leave.php",
                    method:"POST",
                    data: {id:id, from:from, to:to, issuedby:issuedby, reason:reason, leavetype:leavetype},
                    success:function(){
                        $(':checkbox:checked').attr('checked', false);
                        $("#search_string").hide();
                        $("#search_results").hide();
                        $("#btn-add").hide();
                        $("#add_leave").hide();
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
        $("#search_string").hide();//
            
        //Getting Leave Types From Database
        $.ajax({
            url: "get-leave-types.php",
            method:"POST",
            data: {searchstr:searchstr},
            dataType:"text",
            success:function(data){
                $('#leave_classes').append(data);
            }
        });
        $(':checkbox:checked').attr('checked', false);
        $("#live_data").hide();
        $('#btn-delete').hide();
        $('#search').hide();
        $("#add_leave").show();
        $("#search_results").show();
    });
    
    
    
</script>
<body>
    
    <!-- NAV -->
<?php 
    require('navbar_admin.php');
    ?>
<!-- NAV -->
<h2 align="center">Leave Management</h2>
    <div class="container">
        <div>
            <button type="button" class="btn btn-primary" id="issue" style="float:right; margin-right:20px;">Issue Leave</button>
            <button type="button" class="btn btn-danger" id="btn-delete" style="float:right; margin-right:20px; display:none;">Remove Leave</button>
            
            <input type="text" class="form-control" id="search_string" placeholder="Search" style="display:none; margin-right:10px; width:45%; float:left;">
            <button type ="button" class="btn btn-primary" id="search" style="width:10% margin-right:10px; display:none;">Search</button>
            
        </div>
        </br>
        <div class="container" id="search_results"></div>
            <div id="add_leave" class="form" style="display:none">
                <span class="date_picker" style="margin-right:10px;">From:<input type="date" name="From" id="from_field" required autofocus ></span>
                <span class="date_picker" style="margin-right:10px;">To:<input type="date" name="To" id="to_field" required autofocus ></span>
                <span class="input_text"><input type = "text" class = "form-control" 
                name = "IBy" id="IssuedBy" placeholder = "Issued By" 
                required autofocus style="margin-right:10px;"></span>
                <span class="input_text"><input type = "text" class = "form-control" 
                name = "Reason" id="Reason" placeholder = "Reason" 
                required autofocus style="margin-right:10px;"></span>
                <span class="input_text" >Class:<select id="leave_classes" style="margin-right:10px;"></select></span>
            </div>
            <button type="button" class="btn btn-primary" id="btn-add" style=" width:10% margin-right:10px; display:none;">Add</button>
        </div>
    </div>
    
    <!-- Here the leave table will be placed showing all the issued leaves -->
    <div id="live_data"></div>
    
</body>
</html>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Unimainbech.com</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="jquery-1.12.3.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="bootstrap-3.3.6/dist/js/bootstrap.min.js" ></script>

        <!-- Optional theme -->
        <link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <!-- Essential Logical PHP -->
    <!-- /Ending Essential Logical PHP -->
    <!-- Scripts -->
    <script>
        var qux = 0;  
        var cur_ad = 0;
        var now = 6;
        
        function fetch_ads(cur_ad){
            //Setting variable now!
            $.ajax(
                {
                url:"fetch-ads.php",
                method:"POST",
                data: {cur_ad:cur_ad},
                dataType:"text",
                method:"POST",
                success:function(data){
                    if(data == "0"){
                        $('#ad_place').append("<p>There are no more ads at the moment</p>");
                           //In case there are no ads in the database no need to keep calling the function
                    }
                    else{
                        $('#ad_place').append(data);
                    }
                }
            });
        }
        
        $(window).scroll(function() {
            if($(window).scrollTop() + $(window).height() > $(document).height() - 100 && (cur_ad-4)<=now) {
                $.ajax({
                    url:"fetch-details.php",
                    method:"POST",
                    success:function(data){
                        now = data;
                    }
                });
                fetch_ads(cur_ad);
                cur_ad+=5;
            }
        });
        
        
  /*  
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
    
    
    
    */
    $(document).ready(function(){
     //   fetch_ads();
      /*  
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

    */
    });
        
    /*    
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
      */  
    </script>
    <!-- |Scripts| -->
    
    
    
    
    <!-- Body -->
    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="#">UniMainBech.com</a>
                </div>
                <ul class="nav navbar-nav">
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Universities<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="nust.php">NUST</a></li>
                      <li><a href="fast.php">FAST</a></li>
                    </ul>
                  </li>
                  <li><a href="categories.php">Categories</a></li>
                </ul>
            </div>
        </nav>
         <!-- Navbar -->
        <div class="container">
            <div class="row">
                <div class="col-xs-2">
                    <img src="dp/1.png">
                </div>
                
                <div class="col-xs-10">
                    <p>Welcome to UNI main Bech. We are providing stuff on demand now too. So if you want something just hit the demand button! Happy Hunting ;)</p>
                </div>
            </div>
            </br>
        </div>
        
        <!-- Place For Ads -->
        <div class="container" id="ad_place">
            <!-- Place Add no 1 -->
            <div class="row">
                <div class="col-xs-2">
                    <img src="dp/1.png">
                </div>
                
                <div class="col-xs-10">
                    <h4 id="add_name_1"></h4>
                    <p id="add_desc_1"></p>
                </div>
            </div>
            </br>
    <div class="row">
                <div class="col-xs-2">
                    <img src="dp/1.png">
                </div>
                
                <div class="col-xs-10">
                    <h4 id="add_name_1"></h4>
                    <p id="add_desc_1"></p>
                </div>
            </div>
            </br>
    <div class="row">
                <div class="col-xs-2">
                    <img src="dp/1.png">
                </div>
                
                <div class="col-xs-10">
                    <h4 id="add_name_1"></h4>
                    <p id="add_desc_1"></p>
                </div>
            </div>
            </br>
            <!-- Successive ads will be placed below in a similar manner -->
        </div>
    </body>
</html>
   
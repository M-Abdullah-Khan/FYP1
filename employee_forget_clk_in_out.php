<?php 
require('links.php');
require('printer2.php');
?>

</head>
<script>

function show(){
    var i = 0;
    $(':checkbox:checked').each(function(){
        i++;
    });
    if(i > 0){
        $('#handle').show();
    }
    else{
        $('#handle').hide();
    }
}
    
    
    $(document).ready(function(){
       $("#handle").click(function(){
        var id=[];
        $(':checkbox:checked').each(function(i){
            id[i] = $(this).val();
        });
        if(id.length > 0){
            $.ajax({
                url:'handel-clk-in-out-ajax.php',
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
    });
        
        
    });
</script>
<body>
    
    <!-- NAV -->
<?php 
    require('navbar_admin.php');
    ?>
<!-- NAV -->
<div class="container">
    <h3 align="center">Employee Forgot to clk/in clk/out</h3></br>
	<?php
    // New Code
    
    if (isset($_POST['fetchdata']) && !empty($_POST['Search'])&& !empty($_POST['date'])) {
        // Decleration of Variables
        $cn = ($_POST['Search']);
        $date = ($_POST['date']);
        $opt_columns[0]="CN";
        $opt_columns[1]="Time";
        $opt_columns[2]="Status";
        $query = "SELECT Sno, CN, Time, Status
        FROM attendence
        WHERE CN = ".$cn." AND Time LIKE '".$date."%'";
        print_table_with_checkfield_func3("Sno","attendence",$opt_columns,$query,"show");
        
    }
    ?>
    <form class = "form-signin" role = "form">
    <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
            name = "handle" id="handle" style="display:none; width:30%;">Handle</button>
        </form>
</div>
<h2 align="center">Specific User Search</h2>
<h4>Please Fill in appropriate data to get results</h4>
  <div class = "container">
    <form class = "form-signin" style="width:30%;" role = "form" 
      action = "<?php ($_SERVER['PHP_SELF']); ?>" method = "post">
      <input type = "text" class = "form-control" 
        name = "Search" placeholder = "Card No" 
        required autofocus></br>
      <input type = "date" class = "form-control" 
        name = "date" placeholder = "date" 
        required autofocus ></br>
        <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
          name = "fetchdata" id="fdbtn">Fetch Data</button>
      </form>
    </div>
  </body>           
</html>
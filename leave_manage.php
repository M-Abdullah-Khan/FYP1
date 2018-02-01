<?php 
    require('links.php');
    require('printer_functions.php');
//PHP FUNCTION Database Table printer
?>

<script type="text/javascript">
window.onload = function() {

	var ambtn = document.getElementById('issue');
	ambtn.addEventListener('click', function() { document.location.href = '/leave_issue.php'; });
    
    $('#add').click(function(){
        $('#fields').show();
    });
}
</script>

</head>
<body>
<?php require('navbar_admin.php');
    
    if (isset($_POST['addleave']) && !empty($_POST['leaveName']) && !empty($_POST['symbol'])) {
        $con = mysqli_connect("localhost","root","","fpmsdb");
        $sel_user_query = "INSERT INTO leavesettings (Type, Symbol) VALUES ('".$_POST['leaveName']."','".$_POST['symbol']."');";
        $result= mysqli_query($con, $sel_user_query);
        header("Location: leave_manage.php");
    }
    
    
    ?>
    <div class = "container">
		<div style="width:45%; float:left;">
            
            <h3> Leave Types</h3>
            <?php
            print_table("leavesettings","","");
            ?>
        </br>
        </div>    

        <div style="width:45%; float:right;" id="form-div">
            <div id="fields" style="display:none;">
            <form class = "form-signin" role = "form" 
              action = "<?php ($_SERVER['PHP_SELF']); ?>" method = "post">
              <input type = "text" class = "form-control" 
                name = "leaveName" placeholder = "Name" 
                required autofocus id="name"></br>
                <input type = "text" class = "form-control" 
                name = "symbol" placeholder = "Symbol" 
                required autofocus></br>

                <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
                  name = "addleave" id="fdbtn">Add leave</button>
              </form>
            </div>
            </br>
            
			<div> 
				<div style="float: left; width: 25%; display:inline-block" >
 		   			<button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "more_issues" id = "add">Add</button>
				</div>
				<div style="float: right; width: 25%; display:inline-block"> 
   		 			<button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "issue_warning" id = "issue">Issue</button>
                </div>
			</div>

		</div>
	</div>
    
    
</body>
</html>
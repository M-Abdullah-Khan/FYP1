<?php 
require('links.php');
require('printer2.php');
?>


<script type="text/javascript">
window.onload = function() {

	var sobtn = document.getElementById('sob');
	sobtn.addEventListener('click', function() { document.location.href = '/leave_manage.php'; });
	
	var subtn = document.getElementById('sub');
	subtn.addEventListener('click', function() { document.location.href = '/leave_issue.php'; });
	
}
</script>
    
    <?php 
    $con = mysqli_connect("localhost","root","","fpmsdb");
?>
    
</head>    
<body>
    
    <!-- NAV -->
<?php 
    require('navbar_admin.php');
    ?>
<!-- NAV -->
    <h2 align="center">Leave Settings</h2>
	<div class = "container">
		<div style="width: 100%;"> 
   	        <h3 align="center">Employees on Leave</h3>
            <?php
            
            $opt_columns[0] = "CN";
            $opt_columns[1] = "name";
            $opt_columns[2] = "From";
            $opt_columns[3] = "To";
            $opt_columns[4] = "LeaveType";
            $opt_columns[5] = "Reason";
            $opt_columns[6] = "Issuedby";
            $query = "SELECT a.LID, a.CN, b.name, a.From, a.To, a.LeaveType, a.Reason, a.Issuedby
            FROM leaveinfo a, employee b
            WHERE a.CN = b.CN;";
            print_table_with_checkfield_func3("LID","leaveinfo",$opt_columns,$query,"selected"); 
            ?>
		</div>
	</div>
    <div class="space"></div>
	<div class = "container">
		<div style="width:100%;">
            
 		   		<div style="float: left; width: 40%">
 		   			<button class = "btn btn-lg btn-primary" type = "submit" name = "show_others" id = "sob">Leave Management</button>
				</div>
				<div style="float: right; width: 40%"> 
   	 				<button class = "btn btn-lg btn-primary" type = "submit" name = "specific_user" id = "sub">Issue Leave</button>
				</div>
		</div>
	</div>
    </br>
</body>
</html>
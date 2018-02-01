
<?php require('links.php'); ?>
<script type="text/javascript">
window.onload = function() {
}
</script>
</head>
<body>
    
     <!-- NAV -->
<?php 
    require('navbar_admin.php');
    ?>
<!-- NAV -->
	<h2 align="center">Shift Schedule Management</h2>
	<div class = "container">
		<div style="width: 100%;">
			<div style="float: left; width: 30%"> 
				
 		   		<h3>Options</h3>
 		   		<a href = "time_table.php"><p>Add a Time Table</p> </a>
                <br>
 		   		<a href="assign_shift_time.php"><p>Assign Shift Time Period </p></a>
 		   		<br>
 		   		<a href="employee_shift.php"><p>Assign Shift To Employee</p></a>
			</div>
		</div>
	</div>
</body>
</html>
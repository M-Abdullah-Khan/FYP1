<?php 
require('links.php');
?>

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
	<h2 align="center">Department Options</h2>
	<div class = "container">
		<div style="width: 100%;">
			<div style="float: left; width: 30%"> 
				
 		   		<h3>Options</h3>
 		   		</br>
 		   		<a href="view_departments.php"><p>View Departments</p></a>
 		   		</br>
 		   		<a href="add_departments.php"><p>Add Department</p></a>
 		   		</br>
 		   		<a href="assign_users.php"><p>Assign Users</p></a>
			</div>
		</div>
	</div>
</body>
</html>
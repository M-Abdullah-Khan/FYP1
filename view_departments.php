<?php 
require('links.php');
?>


<script type="text/javascript">
window.onload = function() {
	var pibtn = document.getElementById('pib');
	pibtn.addEventListener('click', function() { document.location.href = '/print_issues.php'; });
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
	<h2 align="center">Attendence Management System</h2>
    <h3 align="center"> View Departments</h3>
	<div class = "container">
		<div style="width: 100%;">
			<div style="float: left; width: 30%"> 
				
 		   		<h3>Perform Queries</h3>
 		   		</br>
 		   		<a href="add_departments.php"><p>Add Department</p></a>
 		   		</br>
				
			</div>
			<div style="float: right; width: 60%"> 
   		 		 
   		 		<h3>Department List</h3>
 		   		
 		   		<table width="100%" border="1" summary="The recent issues of the employees are displayed by priority">
					<tr id="r1">
    					<td id="r1c1" width="10%"><b>Department ID</b></td>
    					<td id="r1c2" width="50%"><b>Name</b></td>
  					</tr>
  					<?php 
                        $sel_dept_query = "select * from departmentdata";
                        $result= mysqli_query($con, $sel_dept_query);
                        $rows =2;
                        while($row = $result->fetch_assoc()) {
                            $cols = 1;
                            echo"<tr id=r". $rows.">";
                                echo"<td id=r".$rows."c".$cols.">";
                                $cols++;
                                echo $row["DID"]."</td>".
                                "<td id=r".$rows."c".$cols.">".$row["Name"]."</td></tr>";
                            $rows++;
                        }
                    ?>
				</table>
			</div>		
		</div>
	</div>

	<div class = "container">
		<div style="width:100%;">
            
			<div style="float: right; width: 60%; text-align:center"> 
				<div style="float: right; width: 26%; display:inline-block"> 
   		 			<button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "print_issues" id = "pib">Print</button>
				</div>
			</div>

		</div>
	</div>
</body>
</html>
<?php 
require('links.php');
require('printer_functions.php');
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
	<h2 align="center">Employee Schedule</h2>
	<div class = "container">
		<div style="width: 100%;">
			<div id="dept_view" style="float: left; width: 50%" class="department_wind_view"> 
				<h5>Departments</h5>
                <?php
                 $con = mysqli_connect("localhost","root","","fpmsdb");
                echo '<table width="90%" border="1">
                <tr id = "01" >
                <th width="12%">Checkbox</th>
                <th>DID</th>
                <th>Name</th>';
                $sel_user_query = "SELECT DID,Name FROM departmentdata";
                $result= mysqli_query($con, $sel_user_query);
                 while($row = $result->fetch_assoc())
                     {
                         echo '<tr id="row'.$row['DID'].'">';
                            echo '<td><input type="checkbox" id = "'.$row['DID'].'" value="'.$row['DID'].'"></td>';
                            echo "<td>".$row['DID']."</td>";
                            echo "<td>".$row['Name']."</td>";
                         echo "</tr>";
                    }
                     echo "</table>";
                ?>
			</div>
            
            <!--  Printing the users depending on the department selected -->
            <div id="user_view" style="float: right; width: 50%"> 
        <?php        $cols1[0]="UID";
                $cols1[1]="CN";
                $cols1[2]="Name";
                $cols1[3]="EID";
				 print_table("userdata", $cols1,"SELECT UID,CN,Name,EID FROM userdata"); ?>
			</div>
		</div>
        <div id="ttable_view" style="width: 100%" class="department_wind_view"> 
				<h5>Departments</h5>
        </div>
	</div>
</body>
</html>
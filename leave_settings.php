<?php 
require('links.php');
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
 		   		
 		   		<table style="width:100%; margin-top:3%; margin-bottom:3%;" border="1" summary="The recent issues of the employees are displayed by priority">
					<tr id="r1">
    					<td id="r1c1" width="25%"><b>Name</b></td>
                        <td id="r1c2" width="10%"><b>Card No</b></td>
                        <td id="r1c3" width="10%"><b>From</b></td>
                        <td id="r1c4" width="10%"><b>To</b></td>
                        <td id="r1c5" width="20%"><b>Reason</b></td>
                        <td id="r1c6" width="15%"><b>Issued By</b></td>
  					</tr>
  					<?php 
                        $sel_dept_query = "select * from leaveinfo";
                        $result= mysqli_query($con, $sel_dept_query);
                        $rows =2;
                        while($row = $result->fetch_assoc()) {
                            $cols = 1;
                            echo"<tr id=r". $rows.">";
                                echo"<td id=r".$rows."c".$cols.">";
                                $cols++;
                                // Getting name from Userdata Table
                                $sel_user_name_query = "SELECT Name FROM userdata WHERE CN = ".$row["CN"];
                                $result2= mysqli_query($con, $sel_user_name_query);
                                $resrow = $result2->fetch_assoc();
                                echo $resrow["Name"]."</td>";
                                echo"<td id=r".$rows."c".$cols.">";
                                $cols++;
                                echo $row["CN"]."</td>";
                                echo"<td id=r".$rows."c".$cols.">";
                                $cols++;
                                echo $row["From"]."</td>";
                                echo"<td id=r".$rows."c".$cols.">";
                                $cols++;
                                echo $row["To"]."</td>";
                                echo"<td id=r".$rows."c".$cols.">";
                                $cols++;
                                echo $row["Reason"]."</td>";
                                echo"<td id=r".$rows."c".$cols.">";
                                $cols++;
                                echo $row["Issuedby"]."</td></tr>";
                            $rows++;
                        }
                    ?>
				</table>
            
		</div>
	</div>
    <div class="space"></div>
	<div class = "container">
		<div style="width:100%;">
            
 		   		<div style="float: left; width: 40%">
 		   			<button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "show_others" id = "sob">Leave Management</button>
				</div>
				<div style="float: right; width: 40%"> 
   	 				<button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "specific_user" id = "sub">Issue Leave</button>
				</div>
		</div>
	</div>
    </br>
</body>
</html>
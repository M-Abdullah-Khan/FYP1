<?php 
    require('links.php');
    ?>
<script type="text/javascript">
window.onload = function() {
	var lvbtn = document.getElementById('lvb');
	lvbtn.addEventListener('click', function() { document.location.href = '/live_view.php'; });

	var ambtn = document.getElementById('amb');
	ambtn.addEventListener('click', function() { document.location.href = '/account_management.php'; });

	var sobtn = document.getElementById('sob');
	sobtn.addEventListener('click', function() { document.location.href = '/available_queries.php'; });
	
	var subtn = document.getElementById('sub');
	subtn.addEventListener('click', function() { document.location.href = '/specific_user_query.php'; });
	
	var mibtn = document.getElementById('mib');
	mibtn.addEventListener('click', function() { document.location.href = '/show_all_issues.php'; });

	var iwbtn = document.getElementById('iwb');
	iwbtn.addEventListener('click', function() { document.location.href = '/issue_warning.php'; });
	
	var pibtn = document.getElementById('pib');
	pibtn.addEventListener('click', function() { document.location.href = '/print_issues.php'; });
}
</script>
<?php
    $con = mysqli_connect("localhost","root","","fpmsdb");
    $keyval["none"] = "0";
    $ts = 0;
    function DeviceSelection_throw($con,$keyval,$ts) {
    echo "<select>";
        $sel_dept_query = "SELECT * FROM deviceinfo";
        $result= mysqli_query($con, $sel_dept_query);
        $rows =2;
        $length = 0;
        $check = 0;
        $Array_dept_num[$length]="";
        $Array_dept_name[$length]="";
        
        while($row = $result->fetch_assoc()){
            $Array_dept_num[$length] = $row["DN"];
            $Array_dept_name[$length] = $row["Department"];
            $keyval[(string)$Array_dept_num[$length]] = $Array_dept_name[$length]; 
            $length++;
        }
        $ts = 1;
        while($rows != 9){
            $cols = 1;
            echo"<tr id=r0". $rows.">";
            while($cols != 13){
                echo "<td id=r0".$rows."c".$cols.">";
                    echo "<select id=".$ts." name=".$ts.">";
                    $check = 0;
                    echo "<option value="."0".">free</option>";
                    while($check != $length){
                        echo "<option value=".$Array_dept_num[$check].">".$Array_dept_name[$check]."</option>";
                        $check++;
                    }
                    echo "</select>";
                    echo "</td>";
                $cols++;
                $ts++;
            }
            echo"</tr>";
            $rows++;
        }
    }
    
    $cont = 0;
    /* Getting the data from the form and using it to populate the database */
    if (isset($_POST['login']) && !empty($_POST['deptname'])) {
        $ch = 0;
        $option[$ch] ="";
        while($ch != $ts){
            $option[$ch] = $_POST[$ts];
        }
        
        $check_dept_query = "SELECT * FROM departmentdata";
        $result= mysqli_query($con, $check_dept_query);
        $new_row = $result->num_rows +101;
        // Add schedule to departmentdata
        $insert_dept_query2 = "INSERT INTO departmentdata (DID, Name, TS01, TS02, TS03, TS04, TS05, TS06, TS07, TS08, TS09, TS10, TS11, TS12, TS13, TS14, TS15, TS16, TS17, TS18, TS19, TS20, TS21, TS22, TS23, TS24, TS25, TS26, TS27, TS28, TS29, TS30, TS31, TS32, TS33, TS34, TS35, TS36, TS37, TS38, TS39, TS40, TS41, TS42, TS43, TS44, TS45, TS46, TS47, TS48, TS49, TS50, TS51, TS52, TS53, TS54, TS55, TS56, TS57, TS58, TS59, TS60, TS61, TS62, TS63, TS64, TS65, TS66, TS67, TS68, TS69, TS70, TS71, TS72, TS73, TS74, TS75, TS76, TS77, TS78, TS79, TS80, TS81, TS82, TS83, TS84) VALUES ('".$new_row."','".$_POST['deptname']."','".$_POST['1']."','".$_POST['2']."','".$_POST['3']."','".$_POST['4']."','".$_POST['5']."','".$_POST['6']."','".$_POST['7']."','".$_POST['8']."','".$_POST['9']."','".$_POST['10']."','".$_POST['11']."','".$_POST['12']."','".$_POST['13']."','".$_POST['14']."','".$_POST['15']."','".$_POST['16']."','".$_POST['17']."','".$_POST['18']."','".$_POST['19']."','".$_POST['20']."','".$_POST['21']."','".$_POST['22']."','".$_POST['23']."','".$_POST['24']."','".$_POST['25']."','".$_POST['26']."','".$_POST['27']."','".$_POST['28']."','".$_POST['29']."','".$_POST['30']."','".$_POST['31']."','".$_POST['32']."','".$_POST['33']."','".$_POST['34']."','".$_POST['35']."','".$_POST['36']."','".$_POST['37']."','".$_POST['38']."','".$_POST['39']."','".$_POST['40']."','".$_POST['41']."','".$_POST['42']."','".$_POST['43']."','".$_POST['44']."','".$_POST['45']."','".$_POST['46']."','".$_POST['47']."','".$_POST['48']."','".$_POST['49']."','".$_POST['50']."','".$_POST['51']."','".$_POST['52']."','".$_POST['53']."','".$_POST['54']."','".$_POST['55']."','".$_POST['56']."','".$_POST['57']."','".$_POST['58']."','".$_POST['59']."','".$_POST['60']."','".$_POST['61']."','".$_POST['62']."','".$_POST['63']."','".$_POST['64']."','".$_POST['65']."','".$_POST['66']."','".$_POST['67']."','".$_POST['68']."','".$_POST['69']."','".$_POST['70']."','".$_POST['71']."','".$_POST['72']."','".$_POST['73']."','".$_POST['74']."','".$_POST['75']."','".$_POST['76']."','".$_POST['77']."','".$_POST['78']."','".$_POST['79']."','".$_POST['80']."','".$_POST['81']."','".$_POST['82']."','".$_POST['83']."','".$_POST['84']."')";
        
        $result= mysqli_query($con, $insert_dept_query2);
        
        $cont = 1;
    }
?>

 </head>   
<body>
  <!-- NAV -->
<?php 
    require('navbar_admin.php');
    ?>
<!-- NAV -->
    
    
	<h2 align="center">Attendence Management System</h2>
    <h3 align="center">Add New Department</h3>
	<div class = "container">
		<div style="width: 100%">
			<div style="float: left; width: 60%"> 
				
 		   		<h3>Add Department</h3>
 		   		</br>
                <?php
                    if($cont == 1){
                        echo "<h4>Department Added Successfully</h4></br>";    
                    }
                ?>
 		   		<p>Please Submit the form below to add new department</p>
 		   		</br>
                <form class = "add_dept" role = "form" action = "<?php ($_SERVER['PHP_SELF']); ?>" method = "post">
                    <input type = "text" class = "form-control" name = "deptname" placeholder = "Department Name" required autofocus></br>
                    <table width="100%" border="1" summary="Time Table">
                        <tr id="r01">
                            <td id="r01c1" width="10%"><b>0900-1000</b></td>
                            <td id="r01c2" width="10%"><b>1000-1100</b></td>
                            <td id="r01c3" width="8%"><b>1100-1200</b></td>
                            <td id="r01c4" width="8%"><b>1200-1300</b></td>
                            <td id="r01c5" width="8%"><b>1300-1400</b></td>
                            <td id="r01c6" width="8%"><b>1400-1500</b></td>
                            <td id="r01c7" width="8%"><b>1500-1600</b></td>
                            <td id="r01c8" width="8%"><b>1600-1700</b></td>
                            <td id="r01c9" width="8%"><b>1700-1800</b></td>
                            <td id="r01c10" width="8%"><b>1800-1900</b></td>
                            <td id="r01c11" width="8%"><b>1900-2000</b></td>
                            <td id="r01c12" width="8%"><b>2000-2100</b></td>
                        </tr>
                        <?php DeviceSelection_throw($con,$keyval,$ts); ?>
                        
                    </table>
                    </br>       
                    <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "login">Add Department</button>
                </form>
			</div>
    
			<div style="float: right; width: 30%"> 
   		 		 
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
                                "<td id=r".$rows."c".$cols.">&nbsp;".$row["Name"]."</td>";
                            $rows++;
                        }
                    ?>
				</table>
			</div>		
		</div>
	</div>
</body>
</html>
<?php 
require('links.php');
?>

</head>

<body>
    
    <!-- NAV -->
<?php 
    require('navbar_admin.php');
    ?>
<!-- NAV -->
<div class="container">
    <h3 align="center">Records</h3></br>
	<?php
    // New Code
    
    if (isset($_POST['fetchdata']) && !empty($_POST['Search']) && (isset($_POST['late'])||isset($_POST['malicious'])||isset($_POST['abscent'])) ) {
        // Decleration of Variables
        $cols = 1;
        $rows = 2;
        
        //Calculating a criteria
        $alpha = 0;
        if(isset($_POST['late']))
            $alpha += $_POST['late'];
        if(isset($_POST['abscent']))
            $alpha += $_POST['abscent'];
        if(isset($_POST['malicious']))
            $alpha += $_POST['malicious'];
        $con = mysqli_connect("localhost","root","","fpmsdb");
        
        ?>
    <table width="100%" border="1" summary="Employee Records">
        <tr id="r1">
            <td id="r1c1" width="20%"><b>Card No</b></td>
            <td id="r1c2" width="20%"><b>Date</b></td>
            <td id="r1c3" width="10%"><b>Time</b></td>
            <td id="r1c4" width="30%"><b>Place</b></td>
            <td id="r1c5" width="10%"><b>Status</b></td>
            <td id="r1c6" width="10%"><b>Device ID</b></td>
        </tr>
        <?php 
        printer_multiplier($alpha,$con,$rows);
        ?>
    </table>
    
    
    <?php
    }
    else{
        if(isset($_POST['late'])||isset($_POST['malicious'])||isset($_POST['abscent']))
            echo "Please insert some value to search for";
        else
            echo "Please check a criteria";
    }
    // New Code Ends

    
    //Functions
    function printer ($result,$type,$rows){
        if ($result->num_rows > 0)
        {
            $cols = 1;
            
            // output data of each row
            while($row = $result->fetch_assoc())
            {
                echo "<tr id=r".$rows.">";
                
                echo "<td id =r".$rows."c".$cols.">";
                    echo $row["CN"];
                echo "</td>";
                $cols++;
                echo "<td id =r".$rows."c".$cols.">";
                    echo date_format(new DateTime($row['Time']), "Y-m-d H:i:s");
                echo "</td>";
                $cols++;
                echo "<td id =r".$rows."c".$cols.">";
                    echo date("H:i:s",strtotime($row['Time']));
                echo "</td>";
                $cols++;
                echo "<td id =r".$rows."c".$cols.">";
                    echo "place";
                echo "</td>";
                $cols++;
                echo "<td id =r".$rows."c".$cols.">";
                    echo $type;
                echo "</td>";
                $cols++;
                echo "<td id =r".$rows."c".$cols.">";
                    echo $row["DN"];
                echo "</td>";
                echo "</tr>";
            }
            
        }
        else 
        {
            echo "0 results</br>";
        }
    }
    
    // This function searches the result for the query performing useful queries and returns the result array;
    function check($criteria){
        $sel_user_query = "select * from attendence where CN = '".$_POST['Search']."' AND Status =2";
            $result= mysqli_query($con, $sel_user_query);
            if($result->num_rows == 0){
                $sel_user_query = "SELECT CN FROM userdata WHERE Name LIKE '%".$_POST['Search']."%' OR EID LIKE '%".$_POST['Search']."%' OR CAST(PN as CHAR) LIKE '%".$_POST['Search']."%' OR CAST(DID as CHAR) LIKE '%".$_POST['Search']."%' OR CAST(UID as CHAR) LIKE '%".$_POST['Search']."%'";
                $ficRES= mysqli_query($con, $sel_user_query);
                if($ficRES->num_rows > 0){
                    while($row = $ficRES->fetch_assoc()){
                        $sel_user_query = "select * from attendence where CN = '".$row["CN"]."' AND Status =2";
                        $result= mysqli_query($con, $sel_user_query);
                        printer($result,"late",$rows);
                        $rows++;
                    }
                }
                else
                    echo "No user data found matching search specifications";
            }
            else{
                printer($result,"late",$rows);
            }
    }
    function printer_multiplier($var,$con,$rows){
        if($var == 6){      // User has checked Late and Malicious only
            $sel_user_query = "select * from attendence where CN = '".$_POST['Search']."' AND Status =2";
            $result= mysqli_query($con, $sel_user_query);
            if($result->num_rows == 0){
                $sel_user_query = "SELECT CN FROM userdata WHERE Name LIKE '%".$_POST['Search']."%' OR EID LIKE '%".$_POST['Search']."%' OR CAST(PN as CHAR) LIKE '%".$_POST['Search']."%' OR CAST(DID as CHAR) LIKE '%".$_POST['Search']."%' OR CAST(UID as CHAR) LIKE '%".$_POST['Search']."%'";
                $ficRES= mysqli_query($con, $sel_user_query);
                if($ficRES->num_rows > 0){
                    while($row = $ficRES->fetch_assoc()){
                        $sel_user_query = "select * from attendence where CN = '".$row["CN"]."' AND Status = 2";
                        $result= mysqli_query($con, $sel_user_query);
                        printer($result,"late",$rows);
                        
                        $sel_user_query = "select * from attendence where CN = '".$row["CN"]."' AND Status = 4";
                        $result= mysqli_query($con, $sel_user_query);
                        printer($result,"Malicious",$rows);
                    }
                }
                else
                    echo "No user data found matching search specifications";
            }
            else{
                printer($result,"late",$rows);
                $sel_user_query = "select * from attendence where CN = '".$_POST['Search']."' AND Status =4";
                $result= mysqli_query($con, $sel_user_query);
                printer($result,"Malicious",$rows);
            }
        }
    
        elseif ($var == 10) {   // User has checked Late and Abscent
            $sel_user_query = "select * from attendence where CN = '".$_POST['Search']."' AND Status = 2";
            $result= mysqli_query($con, $sel_user_query);
            if($result->num_rows == 0){
                $sel_user_query = "SELECT CN FROM userdata WHERE Name LIKE '%".$_POST['Search']."%' OR EID LIKE '%".$_POST['Search']."%' OR CAST(PN as CHAR) LIKE '%".$_POST['Search']."%' OR CAST(DID as CHAR) LIKE '%".$_POST['Search']."%' OR CAST(UID as CHAR) LIKE '%".$_POST['Search']."%'";
                $ficRES= mysqli_query($con, $sel_user_query);
                if($ficRES->num_rows > 0){
                    while($row = $ficRES->fetch_assoc()){
                        $sel_user_query = "select * from attendence where CN = '".$row["CN"]."' AND Status =2";
                        $result= mysqli_query($con, $sel_user_query);
                        printer($result,"late",$rows);
                        
                        $sel_user_query = "select * from attendence where CN = '".$row["CN"]."' AND Status =8";
                        $result= mysqli_query($con, $sel_user_query);
                        printer($result,"Malicious",$rows);
                    }
                }
                else
                    echo "No user data found matching search specifications";
            }
            else{
                printer($result,"late",$rows);
                $sel_user_query = "select * from attendence where CN = '".$_POST['Search']."' AND Status =8";
                $result= mysqli_query($con, $sel_user_query);
                printer($result,"Abscent",$rows);
            }
        }
        elseif($var == 12){ //User Has checked Maclicious and Abscent
            $sel_user_query = "select * from attendence where CN = '".$_POST['Search']."' AND Status =4";
            $result= mysqli_query($con, $sel_user_query);
            if($result->num_rows == 0){
                $sel_user_query = "SELECT CN FROM userdata WHERE Name LIKE '%".$_POST['Search']."%' OR EID LIKE '%".$_POST['Search']."%' OR CAST(PN as CHAR) LIKE '%".$_POST['Search']."%' OR CAST(DID as CHAR) LIKE '%".$_POST['Search']."%' OR CAST(UID as CHAR) LIKE '%".$_POST['Search']."%'";
                $ficRES= mysqli_query($con, $sel_user_query);
                if($ficRES->num_rows > 0){
                    while($row = $ficRES->fetch_assoc()){
                        $sel_user_query = "select * from attendence where CN = '".$row["CN"]."' AND Status =4";
                        $result= mysqli_query($con, $sel_user_query);
                        printer($result,"Malicious",$rows);
                        
                        $sel_user_query = "select * from attendence where CN = '".$row["CN"]."' AND Status =8";
                        $result= mysqli_query($con, $sel_user_query);
                        printer($result,"Abscent",$rows);
                    }
                }
                else
                    echo "No user data found matching search specifications";
            }
            else{
                printer($result,"Malicious",$rows);
                $sel_user_query = "select * from attendence where CN = '".$_POST['Search']."' AND Status =8";
                $result= mysqli_query($con, $sel_user_query);
                printer($result,"Abscent",$rows);
            }
        }
        elseif($var == 2){
            $sel_user_query = "select * from attendence where CAST(CN as CHAR) LIKE '".$_POST['Search']."' AND Status =2";
            $result= mysqli_query($con, $sel_user_query);
            if($result->num_rows == 0){
                $sel_user_query = "SELECT CN FROM userdata WHERE Name LIKE '%".$_POST['Search']."%' OR EID LIKE '%".$_POST['Search']."%' OR CAST(PN as CHAR) LIKE '%".$_POST['Search']."%' OR CAST(DID as CHAR) LIKE '%".$_POST['Search']."%' OR CAST(UID as CHAR) LIKE '%".$_POST['Search']."%'";
                $ficRES= mysqli_query($con, $sel_user_query);
                if($ficRES->num_rows > 0){
                    while($row = $ficRES->fetch_assoc()){
                        $sel_user_query = "select * from attendence where CN = '".$row['CN']."' AND Status =2";
                        $result= mysqli_query($con, $sel_user_query);
                        printer($result,"late",$rows);
                    }
                }
                else
                    echo "No user data found matching search specifications";
            }
            else{
               printer($result,"late",$rows);
            }
        }
        elseif($var == 4){
            $sel_user_query = "select * from attendence where CN = '".$_POST['Search']."' AND Status =4";
            $result= mysqli_query($con, $sel_user_query);
            if($result->num_rows == 0){
                $sel_user_query = "SELECT CN FROM userdata WHERE Name LIKE '%".$_POST['Search']."%' OR EID LIKE '%".$_POST['Search']."%' OR CAST(PN as CHAR) LIKE '%".$_POST['Search']."%' OR CAST(DID as CHAR) LIKE '%".$_POST['Search']."%' OR CAST(UID as CHAR) LIKE '%".$_POST['Search']."%'";
                $ficRES= mysqli_query($con, $sel_user_query);
                if($ficRES->num_rows > 0){
                    while($row = $ficRES->fetch_assoc()){
                        $sel_user_query = "select * from attendence where CN = '".$row["CN"]."' AND Status =4";
                        $result= mysqli_query($con, $sel_user_query);
                        printer($result,"Malicious",$rows);
                    }
                }
                else
                    echo "No user data found matching search specifications";
            }
            else{
                printer($result,"Malicious",$rows);
            }
        }
        elseif($var == 8){
            $sel_user_query = "select * from attendence where CN = '".$_POST['Search']."' AND Status =8";
            $result= mysqli_query($con, $sel_user_query);
            if($result->num_rows == 0){
                $sel_user_query = "SELECT CN FROM userdata WHERE Name LIKE '%".$_POST['Search']."%' OR EID LIKE '%".$_POST['Search']."%' OR CAST(PN as CHAR) LIKE '%".$_POST['Search']."%' OR CAST(DID as CHAR) LIKE '%".$_POST['Search']."%' OR CAST(UID as CHAR) LIKE '%".$_POST['Search']."%'";
                $ficRES= mysqli_query($con, $sel_user_query);
                if($ficRES->num_rows > 0){
                    while($row = $ficRES->fetch_assoc()){
                        $sel_user_query = "select * from attendence where CN = '".$row["CN"]."' AND Status =8";
                        $result= mysqli_query($con, $sel_user_query);
                        printer($result,"Abscent",$rows);
                    }
                }
                else
                    echo "No user data found matching search specifications";
            }
            else{
                printer($result,"Abscent",$rows);
            }
        }
        else
        {
            $sel_user_query = "select * from attendence where CN = '".$_POST['Search']."' AND Status =2";
            $result= mysqli_query($con, $sel_user_query);
            if($result->num_rows == 0){
                $sel_user_query = "SELECT CN FROM userdata WHERE Name LIKE '%".$_POST['Search']."%' OR EID LIKE '%".$_POST['Search']."%' OR CAST(PN as CHAR) LIKE '%".$_POST['Search']."%' OR CAST(DID as CHAR) LIKE '%".$_POST['Search']."%' OR CAST(UID as CHAR) LIKE '%".$_POST['Search']."%'";
                $ficRES= mysqli_query($con, $sel_user_query);
                if($ficRES->num_rows > 0){
                    while($row = $ficRES->fetch_assoc()){
                        $sel_user_query = "select * from attendence where CN = '".$row["CN"]."' AND Status =2";
                        $result= mysqli_query($con, $sel_user_query);
                        printer($result,"late",$rows);
                        
                        $sel_user_query = "select * from attendence where CN = '".$row["CN"]."' AND Status =4";
                        $result= mysqli_query($con, $sel_user_query);
                        printer($result,"Malicious",$rows);
                        
                        $sel_user_query = "select * from attendence where CN = '".$row["CN"]."' AND Status =8";
                        $result= mysqli_query($con, $sel_user_query);
                        printer($result,"Abscent",$rows);
                    }
                }
                else
                    echo "No user data found matching search specifications";
            }
            else{
                printer($result,"Late",$rows);
                $sel_user_query = "select * from attendence where CN = '".$_POST['Search']."' AND Status 4";
                $result= mysqli_query($con, $sel_user_query);
                printer($result,"Malicious",$rows);
                $sel_user_query = "select * from attendence where CN = '".$_POST['Search']."' AND Status =8";
                $result= mysqli_query($con, $sel_user_query);
                printer($result,"Abscent",$rows);
            }
        }
    }   
  ?>
</div>
<h2 align="center">Specific User Search</h2>
<h4>Please Fill in appropriate data to get results</h4>
  <div class = "container">
    <form class = "form-signin" role = "form" 
      action = "<?php ($_SERVER['PHP_SELF']); ?>" method = "post">
      <input type = "text" class = "form-control" 
        name = "Search" placeholder = "Search" 
        required autofocus></br>
        <input type = "checkbox" class="form-control"
          name = "late" checked value = "2">Late</br>
        <input type = "checkbox" class="form-control"
          name = "malicious" value = "4">Malicious</br>
        <input type = "checkbox" class="form-control"
          name = "abscent" value = "8">Abscent</br>
        <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
          name = "fetchdata" id="fdbtn">Fetch Data</button>
      </form>
    </div>
  </body>           
</html>
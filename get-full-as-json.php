<?php

require('get-json-functions.php');
$db_name = "fpmsdb";
$query = "SELECT * from adminprivil WHERE SNo = ".$_POST['aid'];
$con = mysqli_connect("localhost","root","",$db_name);
    if (!$con) { // No connection
        return 1;
        die('Could not connect to MySQL: ' . mysql_error()); 
    } 
    else{   // Connected 
        $result_all_sel_query = mysqli_query($con, $query);
        $row = $result_all_sel_query->fetch_assoc();
        echo json_encode($row);
    }

?>
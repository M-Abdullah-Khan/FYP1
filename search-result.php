<?php 
    $output  = '';
    require("printer2.php");
    $con = mysqli_connect("localhost","root","","fpmsdb");

    $optional_cols[0] = "userID";
    $optional_cols[1] = "CN";
    $optional_cols[2] = "name";
    $optional_cols[3] = "email";
    $optional_cols[4] = "mobileNo";
    $optional_cols[5] = "department";
    
    $sel_user_query = "SELECT * FROM employee WHERE name LIKE '%".$_POST['searchstr']."%' OR email LIKE '%".$_POST['searchstr']."%' OR mobileNo  LIKE '%".$_POST['searchstr']."%' OR CAST(department as CHAR) LIKE '%".$_POST['searchstr']."%' OR userID LIKE '%".$_POST['searchstr']."%' OR CAST(CN as CHAR) LIKE '%".$_POST['searchstr']."%'";
    
    print_table_with_checkfield_func3("CN","employee",$optional_cols,$sel_user_query,"employee_selected"); 

?>
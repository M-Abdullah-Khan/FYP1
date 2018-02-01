<?php
require('printer2.php');

$sel_user_query = "SELECT DISTINCT
name,CN,userID
FROM employee 
WHERE name LIKE '%".$_POST['userID']."%' OR CN LIKE '%".$_POST['userID']."%' OR CAST(userID as CHAR) LIKE '%".$_POST['userID']."%' OR city LIKE '%".$_POST['userID']."%' OR email LIKE '%".$_POST['userID']."%'";


$id = "userID";
$table_name = "name";
$opt_columns[0] = "userID";
$opt_columns[1] = "name";
$opt_columns[2] = "CN";
if(print_table_with_checkfield($id,$table_name,$opt_columns,$sel_user_query) ==1){ 
    echo "There are No Admins at the moment. Please Make A super";
}
?>
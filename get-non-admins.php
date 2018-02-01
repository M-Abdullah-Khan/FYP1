<?php
require('printer2.php');


$sql = "SELECT userID, name,adminType
FROM employee
WHERE adminType IS NULL AND department =".$_POST['DID'];
$id = "userID";
$table_name = "employee";
$opt_columns[0] = "userID";
$opt_columns[1] = "name";
$opt_columns[2] = "adminType";
$func = "show_add";
if(print_table_with_checkfield_func3($id,$table_name,$opt_columns,$sql,$func) ==1){ 
    echo "There are No Admins at the moment. Please Make One";
}
else
?>
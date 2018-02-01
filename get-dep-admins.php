<?php
require('printer2.php');


$sql = "SELECT userID, name,adminType
FROM employee
WHERE adminType IS NOT NULL AND department =".$_POST['DID'];
$id = "userID";
$table_name = "employee";
$opt_columns[0] = "userID";
$opt_columns[1] = "name";
$opt_columns[2] = "adminType";
$func = "show_from_btns";
if(print_table_with_radiobutton_with_oc3($id,$table_name,$opt_columns,$sql,$func,"myradio") ==1){ 
    echo "There are No Admins at the moment. Please Make One";
}
?>
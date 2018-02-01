<?php
require('printer2.php');


$sql = "SELECT a.userID, a.name,a.title,a.adminType ,b.Dname
FROM employee a, departments b
WHERE adminType IS NOT NULL AND a.department = b.DID";
$id = "userID";
$table_name = "employee";
$opt_columns[0] = "userID";
$opt_columns[1] = "name";
$opt_columns[2] = "Dname";
$func = "allow_del_user";
echo '<div id="admin-disp-div">';
if(print_table_with_radiobutton_with_oc($id,$table_name,$opt_columns,$sql,$func) ==1){ 
    echo "There are No Admins at the moment. Please Make A super";
}
else
    echo '</div>';
?>
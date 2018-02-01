<?php    
require('printer2.php');


$sql = "SELECT Name, PlaceofInstall,SerialNo
        FROM devicemanagement;";
$opt_cols[0] = "Name";
$opt_cols[1] = "PlaceofInstall";

print_table_with_radiobutton_with_oc3("SerialNo","devicemanagement",$opt_cols,$sql,"display_change","dev"); 
?>
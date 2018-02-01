<?php 

require('printer2.php');
$opt_columns[0] = "Name";
$opt_columns[1] = "From";
$opt_columns[2] = "To";
$query = "SELECT * FROM holidayinfo;";
print_table_with_checkfield_func3("HID","holidayinfo",$opt_columns,$query,"selected"); 



?>
<?php
require('printer2.php');

$con = mysqli_connect("localhost","root","","fpmsdb");
$output  = '';
$sql = "SELECT a.LID, a.CN, a.From, a.To, a.DN, a.LeaveType, a.Reason, a.Issuedby, b.name
        FROM leaveinfo a, employee b
        WHERE a.CN = b.CN;";
$opt_columns[0] = "CN";

$opt_columns[1] = "name";
$opt_columns[2] = "From";
$opt_columns[3] = "To";
$opt_columns[4] = "LeaveType";
$opt_columns[5] = "Reason";
$opt_columns[6] = "Issuedby";

$query = "SELECT a.LID, a.CN, b.name, a.From, a.To, a.LeaveType, a.Reason, a.Issuedby
FROM leaveinfo a, employee b
WHERE a.CN = b.CN;";

print_table_with_checkfield_func3("LID","leaveinfo",$opt_columns,$query,"selected"); 
?>
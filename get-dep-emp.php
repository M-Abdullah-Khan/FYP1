<?php
require('printer2.php');


$con = mysqli_connect("localhost","root","",'fpmsdb');
    if (!$con) { // No connection
        return 1;
        die('Could not connect to MySQL: ' . mysql_error()); 
    }
//$sql = 'SELECT userID,name,adminType,CN, FROM employee WHERE department = "'.$_POST["id"][0].'" AND NOT (adminType = 0)';
$sql = "SELECT `userID`,`name`,`adminType`,`CN` FROM `employee` WHERE department = ".$_POST["id"][0]." AND NOT(adminType = 0);";
$result= mysqli_query($con, $sql);

if($result->num_rows == 0){ 
    echo "Please Add Some Employees First";
}
else{
    $id = "userID";
    $table_name = "employee";
    $opt_columns[0] = "userID";
    $opt_columns[1] = "name";
    $opt_columns[2] = "adminType";
    $opt_columns[3] = "CN";
    $query = "SELECT `userID`,`name`,`adminType`,`CN` FROM `employee` WHERE department = ".$_POST["id"][0]." AND NOT(adminType = 0);";
    print_table_with_checkfield($id,$table_name,$opt_columns,$query);
}
$id = "userID";
$table_name = "employee";
$opt_columns[0] = "userID";
$opt_columns[1] = "name";
$opt_columns[2] = "adminType";
$opt_columns[3] = "CN";
$query = "SELECT `userID`,`name`,`adminType`,`CN` FROM `employee` WHERE department IS NULL";

echo '<div id="employees_without_dept" style="margin:10%; float:right;">';
print_table_with_checkfield($id,$table_name,$opt_columns,$query);
echo '</div>';
$result= mysqli_query($con, $query);
if($result->num_rows > 0){ 
    echo '<button type="button" class="btn btn-primary" id="add_to_dept">Add to Department</button>
    <h5 id="hed2">Employees with no Department</h5>
    <button type="button" class="btn btn-danger" id="rem_from_dept">Remove From Department</button>';
}
else
    echo '<h5 id="hed2">Employees with no Department</h5>NONE
    <button type="button" class="btn btn-danger" id="rem_from_dept">Remove From Department</button>';

    
    
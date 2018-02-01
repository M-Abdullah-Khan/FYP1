<?php


$con = mysqli_connect("localhost","root","","fpmsdb");
if(!$con)
    die('Can not connect to database'.mysqli_errno());
$sql = "SELECT className FROM leavesettings";

$result = mysqli_query($con,$sql);

while($row = $result->fetch_assoc()){
    echo '<option value="'.$row["className"].'">'.$row["className"].'</option>';
}


?>
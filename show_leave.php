<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
if(!$con)
    die('Can not connect to database'.mysqli_errno());
$sql = "SELECT className, minUnitType, minUnit, roundOffCont, symbol, countToLeave FROM leavesettings WHERE LNO = '".$_POST["Id"]."'";

$result = mysqli_query($con,$sql);
$row = $result->fetch_assoc();

$str = $row["className"].",".$row["minUnitType"];
$str .= ",".$row["minUnit"].",".$row["roundOffCont"];
$str .= ",".$row["symbol"].",".$row["countToLeave"];
echo $str;
?>
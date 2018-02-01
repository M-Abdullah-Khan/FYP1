<?php
$con = mysqli_connect("localhost","root","","fpmsdb");

if(!$con)
    die('Can not connect to Database'. mysqli_errno());

$sql = "UPDATE leavesettings SET className='".$_POST["name"]."', minUnitType='".$_POST["unitType"]."',minUnit = '".$_POST["unit"]."',roundOffCont='".$_POST["round"]."', symbol='".$_POST["symbol"]."' WHERE LNO='".$_POST["LNO"]."'";

echo $sql;
if(mysqli_query($con,$sql))
    echo "Data Modified";

?>
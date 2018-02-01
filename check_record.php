<?php
$con = mysqli_connect("localhost","root","","fpmsdb");

if(!$con)
    die('mysqli_connect');
$sql = "SELECT className From leavesettings WHERE className='".$_POST["name"]."'";

$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) != 0){
    echo "name";
}
else{
    $query = "SELECT symbol FROM leavesettings WHERE symbol='".$_POST["symbol"]."'";
    echo $query;
    $result1 = mysqli_query($con,$query);
    if(mysqli_num_rows($result1) != 0){
    echo "symbol";
}
    else{
        $que = "INSERT INTO leavesettings (className,minUnitType,minUnit,roundOffCont,symbol) VALUES ('".$_POST["name"]."','".$_POST["unitType"]."','".$_POST["unit"]."','".$_POST["round"]."','".$_POST["symbol"]."')";
        mysqli_query($con,$que);
    }
    
}
?>
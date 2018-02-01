<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
$dep = 100;
$password = "SEECS@123";
if(isset($_POST["id"])){
    echo $_POST["id"][0];
    $sql = "INSERT INTO `fpmsdb`.`departments` (`DID`, `Dname`, `Dsuper`) VALUES (NULL, '".$_POST["name"]."', '".$_POST["id"][0]."');";
}
else{
    $sql = "INSERT INTO `fpmsdb`.`departments` (`DID`, `Dname`, `Dsuper`) VALUES (NULL, '".$_POST["name"]."', NULL);";
}

if(mysqli_query($con,$sql)){
    $sql1 = "SELECT DID FROM `fpmsdb`.`departments` WHERE Dname = '".$_POST["name"]."';";
    $result2 = mysqli_query($con,$sql1);
    $row = $result2->fetch_assoc();
    echo $row['DID'];
}

?>
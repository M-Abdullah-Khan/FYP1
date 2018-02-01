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
    echo 'Data Inserted';
}

?>
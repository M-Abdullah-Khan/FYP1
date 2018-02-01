<?php 

$con = mysqli_connect("localhost","root","","fpmsdb");
if(!$con)
    die('Can not connect to Database' .mysqli_error());

echo $_POST["early"];

$sql = "INSERT INTO shifttime (SNO, CIn1, COut1, CIn2, COut2, lateIn, earlyOut,name) VALUES (NULL, TIME('".$_POST["onDuty1"]."'), TIME('".$_POST["offDuty1"]."'),TIME('".$_POST["onDuty2"]."'), TIME('".$_POST["offDuty2"]."'), '".$_POST["late"]."', '".$_POST["early"]."', '".$_POST["name"]."')";
if(mysqli_query($con,$sql)){
    echo 'Data Inserted';
}
else
    echo "Data Not Inserted"

?>
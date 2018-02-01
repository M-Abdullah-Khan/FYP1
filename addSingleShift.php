<?php 

$con = mysqli_connect("localhost","root","","fpmsdb");
if(!$con)
    die('Can not connect to Database' .mysqli_error());

$sql = "INSERT INTO shifttime (CIn1, COut1, CIn2, COut2, lateIn, earlyOut,ShiftName) VALUES (TIME('".$_POST["onDuty"]."'), TIME('".$_POST["offDuty"]."'), NULL, NULL, '".$_POST["late"]."', '".$_POST["early"]."', '".$_POST["name"]."')";

echo $sql;

if(mysqli_query($con,$sql)){
    echo 'Data Inserted';
}
else
    echo "Data Not Inserted"

?>
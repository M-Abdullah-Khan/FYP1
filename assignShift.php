<?php
$con = mysqli_connect("localhost","root","","fpmsdb");

if(!$con)
    die('Could not Connect to Database ' .mysqli_errno());

$sql = "SELECT SNO from shift WHERE name ='".$_POST["shift"]."'";

  $result = mysqli_query($con,$sql);
    $SNO;
    if(mysqli_num_rows($result)>0){
     $row = mysqli_fetch_array($result);
        $SNO = $row["SNO"];
    }


    

foreach($_POST["id"] as $CN){
    $que = "INSERT INTO `fpmsdb`.`shiftschedule` (`CN`, `shiftNo`, `from`, `to`) VALUES ('".$CN."', '".$SNO."', '".$_POST["from"]."', '".$_POST["to"]."');";
    echo $que;
    if(mysqli_query($con,$que))
        echo "Data Inserted";
}
?>
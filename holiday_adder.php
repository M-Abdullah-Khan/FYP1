<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
    $sql = 'INSERT INTO `holidayinfo`(`From`, `To`, `Name`) VALUES ("'.$_POST['from'].'","'.$_POST['to'].'","'.$_POST['name'].'");';
    mysqli_query($con,$sql);
echo $sql;
?>
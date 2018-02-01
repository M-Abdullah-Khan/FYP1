<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
$sql = 'UPDATE `employee` SET `adminType` = NULL WHERE userID = "'.$_POST["id"].'";';    
mysqli_query($con,$sql);
?>

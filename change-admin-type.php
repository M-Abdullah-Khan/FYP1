<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
    $sql = 'UPDATE `employee` SET `adminType`= '.$_POST['adminType'].' WHERE userID = "'.$_POST["userID"].'";';
    mysqli_query($con,$sql);
echo "Success";
?>
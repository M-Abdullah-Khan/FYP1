<?php
$con = mysqli_connect("localhost","root","","fpmsdb");

// change now
$update_password_query = 'UPDATE `employee` SET `password`= "SEECS@123" WHERE userID = "'.$_POST['id'].'";';
if(mysqli_query($con,$update_password_query)){
    echo "Password Set to default ";
}
else 
    echo "Wrong Old Password! Try Again";
?>
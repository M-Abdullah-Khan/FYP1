<?php
$con = mysqli_connect("localhost","root","","fpmsdb");

//Getting Old Password From employee table to check against the provided password
$select_old_pass_query = "SELECT password from employee WHERE userID = '".$_POST['id']."';";
$result_old_pass_query = mysqli_query($con,$select_old_pass_query);

$row = $result_old_pass_query->fetch_assoc();
if($row['password'] == $_POST['old_pass']){     // THe old password matches with the database
        // change now
    $update_password_query = 'UPDATE `employee` SET `password`= "'.$_POST['new_pass'].'" WHERE userID = "'.$_POST['id'].'";';
    mysqli_query($con,$update_password_query);
    echo "success";
}
else 
    echo "Wrong Old Password! Try Again";
?>
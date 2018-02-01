<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
foreach($_POST["id"] as $id){
    $sql = 'UPDATE `employee` SET `adminType`= 1 WHERE userID = "'.$id.'";';    
    mysqli_query($con,$sql);
    echo $sql;  
}
echo "Users Added as Admin";
?>
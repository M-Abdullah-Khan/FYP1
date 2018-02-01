<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
foreach($_POST["id"] as $id){
    
    echo $_POST["id"][0];
    $sql = "UPDATE `employee` SET `department` = NULL WHERE userID = '".$id."';";    
    mysqli_query($con,$sql);
}
echo $sql;
?>
<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
foreach($_POST['id'] as $id){
    $sql = 'UPDATE `attendence` SET `Status`= 0 WHERE Sno = "'.$id.'";';
    mysqli_query($con,$sql);
}

?>
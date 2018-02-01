<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
if(isset($_POST["id"])){
    foreach($_POST["id"] as $id){
        $sql = "DELETE FROM devicemanagement WHERE SerialNo=".$id;
        mysqli_query($con,$sql);
    }
}
?>
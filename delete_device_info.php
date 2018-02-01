<?php
$con = mysqli_connect("localhost","root","","fpmsdb");

    $sql = "DELETE FROM devicemanagement WHERE SerialNo=".$_POST["id"];
    mysqli_query($con,$sql);
?>
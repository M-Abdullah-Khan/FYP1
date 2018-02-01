<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
if(isset($_POST["id"])){
    $sql = 'SELECT Dname From `departments` WHERE DID = '.$_POST["id"][0].';';
}
$result = mysqli_query($con,$sql);
    $row = $result->fetch_assoc();
    echo $row['Dname'];

?>
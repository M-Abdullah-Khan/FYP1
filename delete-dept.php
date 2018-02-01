<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
if(isset($_POST["id"])){
    foreach($_POST["id"] as $id){
        $sql = "DELETE FROM departments WHERE DID =".$id;
        mysqli_query($con,$sql);
    }
}
?>

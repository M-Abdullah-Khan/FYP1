<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
foreach($_POST["id"] as $id){
    
    echo $_POST["id"][0];
    $sql = 'UPDATE `employee` SET `adminType`= '.$_POST['adminType'].' WHERE userID = "'.$id.'";';    
    echo $sql;
    mysqli_query($con,$sql);
}
echo "Users Added";
?>
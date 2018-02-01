<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
foreach($_POST["id"] as $id){
    echo $_POST['dept_selected'];
    
    echo $_POST["id"][0];
    $sql = 'UPDATE `employee` SET `department`= '.$_POST['dept_selected'].' WHERE userID = "'.$id.'";';    
    mysqli_query($con,$sql);
}
echo "Users Added";
?>
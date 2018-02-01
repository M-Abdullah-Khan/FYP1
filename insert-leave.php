<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
$dep = 100;
$looper = 0;
// Getting remaining userinfo from userdata table
if(isset($_POST["id"])){
    foreach($_POST["id"] as $id){
        
        $sql1 = "SELECT department from employee WHERE CN = '".$id."';";
        echo $sql1;
        $ficRES = mysqli_query($con,$sql1);
        $row1 = $ficRES->fetch_assoc();
        
        $DN[$looper] = $row1["department"];
        $sql = "INSERT INTO `leaveinfo` (`CN`, `From`, `To`, `DN`, `LeaveType`, `Reason`, `Issuedby`)
        VALUES ('".$id."', '".$_POST["from"]."', '".$_POST["to"]."', '".$DN[$looper]."', '".$_POST["leavetype"]."', '".$_POST["reason"]."', '".$_POST["issuedby"]."');";
        
        echo $sql;
        mysqli_query($con,$sql);
    }
}
?>
<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
$dep = 100;
$CN;
$DN;
$looper = 0;
// Getting remaining userinfo from userdata table
if(isset($_POST["id"])){
    foreach($_POST["id"] as $id){
        $sql1 = "SELECT DID, CN from userdata WHERE UID = ".$id.";";
        $ficRES = mysqli_query($con,$sql1);
        $row1 = $ficRES->fetch_assoc();
        $DN[$looper] = $row1["DID"];
        $CN[$looper] = $row1["CN"];
        $sql = "INSERT INTO `leaveinfo` (`CN`, `From`, `To`, `DN`, `LeaveType`, `Reason`, `Issuedby`)
        VALUES ('".$CN[$looper]."', '".$_POST["from"]."', '".$_POST["to"]."', '".$DN[looper]."', '".$_POST["leavetype"]."', '".$_POST["reason"]."', '".$_POST["issuedby"]."');";
        mysqli_query($con,$sql);
    }
}
?>
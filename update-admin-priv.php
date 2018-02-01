<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
    

$sql = 'UPDATE `adminprivil` SET `backupDB`= "'.$_POST["val"][0].'",`upDownData`= "'.$_POST["val"][1].'",`devManage`= "'.$_POST["val"][2].'",`leaveManag`= "'.$_POST["val"][3].'",`empMain`= "'.$_POST["val"][5].'",`mainSS`= "'.$_POST["val"][6].'",`holiM`= "'.$_POST["val"][7].'",`depManage`= "'.$_POST["val"][8].'",`fClk`= "'.$_POST["val"][4].'" WHERE SNo = "'.$_POST["admin"].'";';  

echo $sql;

if(mysqli_query($con,$sql)){
    echo $_POST['admin'];
}

?>
<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
$output ="";
$sql = 'UPDATE `devicemanagement` 
        SET `Name`= "'.$_POST["name"].'",`CommunicationMode`="'.$_POST["com_type"].'",`Port`="'.$_POST["com_port"].'",`BaudRate`="'.$_POST["baud_rate"].'",`CommunicationPassword`="'.$_POST["com_key"].'",`SerialNo`="'.$_POST["device_no"].'"
        WHERE `SerialNo` ="'.$_POST["old_serial_no"].'";';
$result = mysqli_query($con,$sql);


$sql = "SELECT Name,SerialNo, CommunicationMode,Port,BaudRate,CommunicationPassword
        FROM devicemanagement;";
$result = mysqli_query($con,$sql);

 if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_array($result)){
        $output = '{ "employees" : [ { "name":"'.$row['Name'].'", "serialno" : "'.$row['SerialNo'].'",
            "communicationmode" : "'.$row['CommunicationMode'].'",
            "port" : "'.$row['Port'].'",
            "baudrate" : "'.$row['BaudRate'].'",
            "communicationpass" : "'.$row['CommunicationPassword'].'"}]}';
    }
    echo $output;
 }
else{
    die("Sorry Connection was not made with the database"); 
}?>
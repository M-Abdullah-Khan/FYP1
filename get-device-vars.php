<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
$output ="";
$sql = "SELECT Name,SerialNo, CommunicationMode,Port,BaudRate,CommunicationPassword
        FROM devicemanagement WHERE SerialNo = ".$_POST["row"].";";
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
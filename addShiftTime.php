<?php
$con = mysqli_connect("localhost","root","","fpmsdb");

    $sql = "INSERT INTO `shift` (`name`, ";
    $counti = count($_POST["days"]);
    
    foreach($_POST["days"] as $day){
        $sql .= "`".$day."`";
        if($counti>1){
            $sql .= ",";
            $counti--;
        }
    }
    $sql .= ") VALUES (";
    $sql .= "'".$_POST["name"]."',";
    $sql_1 = "SELECT SNO FROM shifttime WHERE ShiftName = '".$_POST["shift"]."'";
    $result = mysqli_query($con,$sql_1);
    $SNO;
    if(mysqli_num_rows($result)>0){
     $row = mysqli_fetch_array($result);
        $SNO = $row["SNO"];
    }
    $counti = count($_POST["days"]);
    foreach($_POST["days"] as $day){
    
        $sql .= $SNO;
        if($counti>1){
            $sql .= ",";
            $counti--;
        }
        
    }
    rtrim($sql,",");
    $sql .= ")";
    echo $sql;
    if(mysqli_query($con,$sql))
        echo "Data Inserted";
    
    
?>

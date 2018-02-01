<?php 
    $output  = '';
    require("printer_functions.php");
    $con = mysqli_connect("localhost","root","","fpmsdb");


    $optional_cols[0] = "Checkbox";
    $optional_cols[1] = "UID";
    $optional_cols[2] = "CN";
    $optional_cols[3] = "Name";
    $optional_cols[4] = "EID";
    $optional_cols[5] = "PN";
    $optional_cols[6] = "DID";
    
    $sel_user_query = "SELECT * FROM userdata WHERE Name LIKE '%".$_POST['searchstr']."%' OR EID LIKE '%".$_POST['searchstr']."%' OR CAST(PN as CHAR) LIKE '%".$_POST['searchstr']."%' OR CAST(DID as CHAR) LIKE '%".$_POST['searchstr']."%' OR CAST(UID as CHAR) LIKE '%".$_POST['searchstr']."%' OR CAST(CN as CHAR) LIKE '%".$_POST['searchstr']."%'";
    $ficRES= mysqli_query($con, $sel_user_query);
    if($ficRES->num_rows > 0){
        meta_table($optional_cols);
        echo "<tbody>";
        while($row = $ficRES->fetch_assoc()){
            echo '<tr id="'.$row["UID"].'">';
                echo '<td><input type="checkbox" id = "'.$row["UID"].'" value = "'.$row["UID"].'"></td>';
                echo '<td>'.$row["UID"].'</td>';
                echo '<td>'.$row["CN"].'</td>';
                echo '<td>'.$row["Name"].'</td>';
                echo '<td>'.$row["EID"].'</td>';
                echo '<td>'.$row["PN"].'</td>';
                echo '<td>'.$row["DID"].'</td>';
            echo '<tr>';
        }
    }
    else{
        echo "sorry no reqults found";
    }
?>
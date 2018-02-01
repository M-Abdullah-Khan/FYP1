
<?php
$con = mysqli_connect("localhost","root","",'fpmsdb');
    if (!$con) { // No connection
        return 1;
        die('Could not connect to MySQL: ' . mysql_error()); 
    }
$sql = "SELECT * FROM departments WHERE Dsuper IS NULL";
$result= mysqli_query($con, $sql);

if($result->num_rows == 0){ 
    echo "Please Add Some Departments First";
}
else{
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        getit($row['Dname'],$row['DID'],$row,$con);
    }
    echo "</ul>";
}
function getit($name,$id,$row,$con){
    echo '<li><input type="checkbox" value="'.$id.'" id="'.$id.'" onclick="select('.$id.')">'.$name."</li>";
    $sql1 = "SELECT * FROM departments WHERE Dsuper = ".$id;
    $result= mysqli_query($con, $sql1);
    echo "<ul>";
    while($row2 = $result->fetch_assoc()) {
        getit($row2['Dname'],$row2['DID'],$row2,$con);                
    }
    echo "</ul>";
}
?>
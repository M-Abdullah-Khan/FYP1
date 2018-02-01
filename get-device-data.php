<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
$output  = '';
$sql = "SELECT Name, PlaceofInstall,SerialNo
        FROM devicemanagement;";
$result = mysqli_query($con,$sql);
$output.= '
        <table class="table" id = "device-info">
  <thead class="thead-inverse">
    <tr>
      <th>Check Field</th>
      <th>Name</th>
      <th>Place</th>
    </tr>
  </thead>
  <tbody>
  ';
 if(mysqli_num_rows($result)>0){
    $foo = 0;
    while($row = mysqli_fetch_array($result)){
         $output .= '<tr id ="'.$row['SerialNo'].'">
                    <td><input type="checkbox" onclick="display_change('.$row['SerialNo'].')" id="'.$row['SerialNo'].'" value="'.$row['SerialNo'].'"></td>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['PlaceofInstall'].'</td>
                    </tr>';
         $foo++;
     }
 }
else{
    $output .= '<tbody>
    <tr>
      <td colspan="6">Data Not Found</td>
    </tr>
    </tbody>';
}
$output .= '</tbody>
            </table>';
echo $output;
?>
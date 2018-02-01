<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
$output  = '';
$sql = "SELECT * FROM departmentdata ORDER BY DID DESC";
$result = mysqli_query($con,$sql);
$output.= '
        <table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>Select</th>
      <th>Department No</th>
      <th>Dept. Name</th>
    </tr>
  </thead>
  <tbody>
  ';
 if(mysqli_num_rows($result)>0){
     while($row = mysqli_fetch_array($result)){
         $output .= '<tr id ="'.$row['DID'].'">
                    <th><div class="checkbox"><label><input type="checkbox" value="'.$row['DID'].'"></label></div></th>
                    <th>'.$row['DID'].'</th>
                    <th>'.$row['Name'].'</th>
                    </tr>';
     }
 }
else{
    $output .= '<tbody>
    <tr>
      <th colspan="6">Data Not Found</th>
    </tr>
    </tbody>';
}
$output .= '</tbody>
            </table>';
echo $output;
?>
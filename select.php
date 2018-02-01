<?php
$conn = mysqli_connect("localhost","root","","fpmsdb");
$output  = '';
$sql = "SELECT userID, CN, name, email, mobileNo, department FROM employee ORDER BY userID DESC";
$result = mysqli_query($conn,$sql);
$output.= '
        <table class="table">
  <thead class="thead-inverse">
    <tr>
      <th>checkbox</th>
      <th>UserID</th>
      <th>Card No</th>
      <th>Name</th>
      <th>Email</th>
      <th>Mobile No</th>
      <th>Department ID</th>
    </tr>
  </thead>
  <tbody>
  ';
 if(mysqli_num_rows($result)>0){
     while($row = mysqli_fetch_array($result)){
         $output .= '<tr id ="'.$row['CN'].'">
                    <th><div class="checkbox"><label><input type="checkbox" value="'.$row['CN'].'"></label></div></th>
                    <th>'.$row['userID'].'</th>
                    <th>'.$row['CN'].'</th>
                    <th>'.$row['name'].'</th>
                    <th>'.$row['email'].'</th>
                    <th>'.$row['mobileNo'].'</th>
                    <th>'.$row['department'].'</th>
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
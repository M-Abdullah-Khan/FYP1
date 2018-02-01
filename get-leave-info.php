<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
$output  = '';
$sql = "SELECT a.LID, a.CN, a.From, a.To, a.DN, a.LeaveType, a.Reason, a.Issuedby, b.Name
        FROM leaveinfo a, userdata b
        WHERE a.CN = b.CN;";
$result = mysqli_query($con,$sql);
$output.= '
        <table class="table" id = "check">
  <thead class="thead-inverse">
    <tr>
      <th>Check Field</th>
      <th>Card No</th>
      <th>Name</th>
      <th>From</th>
      <th>To</th>
      <th>DN</th>
      <th>Reason</th>
      <th>Issued By</th>
      <th>Leave Type</th>
    </tr>
  </thead>
  <tbody>
  ';
 if(mysqli_num_rows($result)>0){
    $foo = 0;
    while($row = mysqli_fetch_array($result)){
         $output .= '<tr id ="'.$row['LID'].'">
                    <td><input type="checkbox" id="'.$row['LID'].'" value="'.$row['LID'].'"></td>
                    <td>'.$row['CN'].'</td>
                    <td>'.$row['Name'].'</td>
                    <td>'.$row['From'].'</td>
                    <td>'.$row['To'].'</td>
                    <td>'.$row['DN'].'</td>
                    <td>'.$row['Reason'].'</td>
                    <td>'.$row['Issuedby'].'</td>
                    <td>'.$row['LeaveType'].'</td>
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
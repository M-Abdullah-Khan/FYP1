<?php
if(isset($_FILES['file'])){
    $file = $_FILES['file'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_ext = explode('.',$file_name);
    $file_ext = strtolower(end($file_ext));
    $file_error = $file['error'];
    $allowed = array('xls');
    $upload_dir = '/excel';
    
    if(in_array($file_ext, $allowed)){
        if($file_error==0){
            $done = true;
            move_uploaded_file($file_name,$upload_dir);
            $conn = mysqli_connect("localhost","root","","fpmsdb");
            include("excel/PHPExcel/IOFactory.php");
            $objPHPExcel = PHPExcel_IOFactory::load($file_tmp);
            foreach ($objPHPExcel->getWorksheetIterator() as $worksheet){
                $highestRow = $worksheet->getHighestRow();
                for($row=2;$row<=$highestRow;$row++){
                    $uid = mysqli_real_escape_string($conn,$worksheet->getCellByColumnAndRow(0,$row)->getValue());
                    $cn = mysqli_real_escape_string($conn,$worksheet->getCellByColumnAndRow(1,$row)->getValue());
                    $Name = mysqli_real_escape_string($conn,$worksheet->getCellByColumnAndRow(2,$row)->getValue());
                    $eid = mysqli_real_escape_string($conn,$worksheet->getCellByColumnAndRow(3,$row)->getValue());
                    $pn = mysqli_real_escape_string($conn,$worksheet->getCellByColumnAndRow(4,$row)->getValue());
                    $did = mysqli_real_escape_string($conn,$worksheet->getCellByColumnAndRow(5,$row)->getValue());
                   $sql = "INSERT INTO userdata (UID,CN,Name,EID,PN,DID) VALUES ('".$uid."', '".$cn."','".$Name."','".$eid."','".$pn."','".$did."')";
                   mysqli_query($conn,$sql);
                }
            }
//                echo '<br /> Data Inserted';
        }
    }
}
        header("Location:user_management.php");

?>
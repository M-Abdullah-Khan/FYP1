<?php
$con = mysqli_connect("localhost","root","","fpmsdb");
$dep = 100;
$password = "SEECS@123";

$sql = 'INSERT INTO `fpmsdb`.`employee` (`acNo`, `userID`, `name`, `title`, `mobileNo`, `DOB`, `DOE`, `address`, `PO`, `off_Tel`, `department`, `adminType`, `nationality`, `city`, `state`, `CN`, `password`, `faceCount`, `fingerCountL`, `fingerCountR`, `email`) VALUES (NULL, "'.$_POST["uid"].'", "'.$_POST['name'].'","'.$_POST['title'].'","'.$_POST['mon'].'", "'.$_POST['DOB'].'","'.$_POST['DOE'].'","'.$_POST['address'].'", "'.$_POST["PO"].'","'.$_POST['off_Tel'].'", "'.$_POST['department'].'", "'.$_POST['adminType'].'","'.$_POST['nationality'].'","'.$_POST['city'].'", "'.$_POST['state'].'", "'.$_POST['CN'].'","'.$password.'","'.$_POST['FC'].'","'.$_POST['LFC'].'","'.$_POST['RFC'].'","'.$_POST['email'].'");';


if(mysqli_query($con,$sql)){
    echo 'Data Inserted';
}

?>
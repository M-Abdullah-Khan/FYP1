<?php 
session_start();
if($_SESSION['username'] == ""){
    header('Refresh: 0.000001; URL = index.php');
}


?>
<!doctype html>
<html lang="en">
<head>
    <title>FPAM System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap.min.css">
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="bootstrap-3.3.6/dist/js/bootstrap.min.js" ></script>
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="style.css">
    
    
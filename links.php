<?php 
session_start();
if($_SESSION['username'] == ""){
    header('Refresh: 0.000001; URL = index.php');
}
// Checking if the privilage is given to access the page else just throw to home
    ob_start();
    
    $query = 'SELECT adminType, CN FROM employee WHERE name = "'.$_SESSION['username'].'" AND password = "'.$_SESSION['password'].'";';
    $con = mysqli_connect("localhost","root","","fpmsdb");
    if (!$con) { // No connection
        return 1;
        die('Could not connect to MySQL: ' . mysql_error());
    } 
    else{   // Connected 
        $result_all_sel_query = mysqli_query($con, $query);
        $row = $result_all_sel_query->fetch_assoc();
        $aid = $row["adminType"];
        $CN = $row["CN"];
        
        //Get the privil url from the browser
        $URL = $_SERVER['REQUEST_URI'];
        
        
        //Parsing URL to generate specific admin privil
        require('generate_privil.php');
        $privil = urlToPrivil($URL);
        
        // Now Get AdminName
        $getAname = 'SELECT adminName FROM adminprivil WHERE SNo = '.$aid;
        $resultGetAname = mysqli_query($con, $getAname);         //Execute Query
        $row_result_Get_Aname = $resultGetAname->fetch_assoc();
        $type = $row_result_Get_Aname['adminName'];
        
        
        if(strcmp($type,"Super Administrator") != 0 && strcmp($privil,"adm") == 0 ){
            header('Refresh: 0.000001; URL = home.php');
        }
        elseif(strcmp($type,"Super Administrator") == 0 && strcmp($privil,"adm") == 0 ){
            
        }
        else{
            
            if($privil == ""){
                
            }
            else{
                $query2 = 'SELECT '.$privil.' FROM adminprivil WHERE SNo ='.$aid;

                $result_all_sel_query2 = mysqli_query($con, $query2);
                $row2 = $result_all_sel_query2->fetch_assoc();
                if($row2[$privil] != 1){
                    header('Refresh: 0.000001; URL = home.php');
                }
            }
            
        }
    }
    ?>
    

<!doctype html>
<html lang="en">
<head>
    <title>FPAM System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="jquery-1.12.3.min.js"></script>
        
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap.min.css">
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="bootstrap-3.3.6/dist/js/bootstrap.min.js" ></script>
    
    <!-- Optional theme -->
    <link rel="stylesheet" href="bootstrap-3.3.6/dist/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="style.css">
    
    
    
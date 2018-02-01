<?php 
function urlToPrivil($URL){
    $privil = "";
    
    
    
    //1
    if(strcmp($URL,"/device_management.php") == 0)
        $privil = "devManage";
    
    if(strcmp($URL,"/user_management.php") == 0)
        $privil = "upDownData";
    
    if(strcmp($URL,"/backup.php") == 0)
        $privil = "backupDB";
    
    
    //2
    if(strcmp($URL,"/department.php") == 0)
        $privil = "depManage";
    
    if(strcmp($URL,"/user_management.php") == 0)
        $privil = "empMain";
    
    
    //Only test
    if(strcmp($URL,"/admin_settings.php") == 0)
        $privil = "adm";
    
    if(strcmp($URL,"/management_shift_schedules.php") == 0 || strcmp($URL,"/assign_shift_time.php") == 0 || strcmp($URL,"/time_table.php") == 0 || strcmp($URL,"/employee_shift.php") == 0)
        $privil = "mainSS";
    
    if(strcmp($URL,"/holidays_maintenances.php") == 0)
        $privil = "holiM";
    
    
    //3
    if(strcmp($URL,"/leave_settings.php") == 0)
        $privil = "leaveManag";
    
    if(strcmp($URL,"/employee_forget_clk_in_out.php") == 0)
        $privil = "fClk";
    
    
    return $privil;
}



?>


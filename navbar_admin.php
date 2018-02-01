<?php 
/*
$db_name = "fpmsdb";
$query = 'SELECT adminType from employee WHERE name = "'.$_SESSION['username'].'" AND password = "'.$_SESSION['password'].'";';
$con = mysqli_connect("localhost","root","",$db_name);
    if (!$con) { // No connection
        return 1;
        die('Could not connect to MySQL: ' . mysql_error());
    } 
    else{   // Connected 
        $result_all_sel_query = mysqli_query($con, $query);
        $row = $result_all_sel_query->fetch_assoc();
        $aid = $row["adminType"];
        $query2 = 'SELECT adminName from adminprivil WHERE SNo ='.$aid;
        $result_all_sel_query2 = mysqli_query($con, $query2);
        $row2 = $result_all_sel_query2->fetch_assoc();
        $type = $row2["adminName"];
    }
?>
*//*
<script>
    $(document).ready(function(){
        var aid = <?php echo "'".$aid."'"; ?>;
        var type = <?php echo "'".$type."'"; ?>;
        var username = <?php echo "'".$_SESSION['username']."'"; ?>;
        var username = <?php echo "'".$_SESSION['password']."'"; ?>;
        var final_result = "";
        
        if(type == "Super Administrator"){
            $('#OPT-1').html('<li><a href= "backup.php">Data backup</a></li><li><a href="user_management.php">Upload and Download Data</a></li><li><a href="device_management.php">Device Management</a></li>');
            $('#OPT-3').html('<li><a href="leave_settings.php">Leave Management</a></li><li><a href="employee_forget_clk_in_out.php">Forgetting to Clock In/Out</a></li>');
            $('#OPT-2').html('<li><a href="management_shift_schedules.php">Management Shift Schedules</a></li><li><a href="holidays_maintenances.php">Holidays Maintenances</a></li><li><a href="admin_settings.php">Administrator Setting</a></li><li><a href="department.php">Department Management</a></li><li><a href="user_management.php">Employee Maintain</a></li>');
        }
        else{
            $.ajax
            ({
                url:"get-full-as-json.php",
                method:"POST",
                data:{aid:aid},
                success:function(data){

                    // Perfecting data in to json object
                    final_result = '{"adminprivils":[' +data+']}';
                    // Parsing json data

                    console.log(final_result);
                    obj = JSON.parse(final_result);
                    /* 
                        <li><a href="device_management.php">Device Management</a></li>
                        <li><a href="user_management.php">Upload and Download Data</a></li>
                        <li><a href="backup.php">Data backup</a></li>
                    */
                    
                    //Depending on the privils change the navbar
                    if(obj.adminprivils[0].devManage == 1){
                        $('#OPT-1').append('<li><a href="device_management.php">Device Management</a></li>');
                    }
                    if(obj.adminprivils[0].upDownData == 1){
                        $('#OPT-1').append('<li><a href="user_management.php">Upload and Download Data</a></li>');
                    }
                    if(obj.adminprivils[0].backupDB == 1){
                        $('#OPT-1').append('<li><a href="backup.php">Data backup</a></li>');
                    }
                    
                    /* 
                        <li><a href="department.php">Department Management</a></li>
                        <li><a href="user_management.php">Employee Maintain</a></li>
                        <li><a href="admin_settings.php">Administrator Setting</a></li>
                        <li><a href="management_shift_schedules.php">Management Shift Schedules</a></li>
                        <li><a href="holidays_maintenances.php">Holidays Maintenances</a></li>
                    */
                    if(obj.adminprivils[0].depManage == 1){
                        $('#OPT-2').append('<li><a href="department.php">Department Management</a></li>');
                    }
                    if(obj.adminprivils[0].empMain == 1){
                        $('#OPT-2').append('<li><a href="user_management.php">Employee Maintain</a></li>');
                    }
                    if(obj.adminprivils[0].holiM == 1){
                        $('#OPT-2').append('<li><a href="holidays_maintenances.php">Holidays Maintenances</a></li>');
                    }
                    if(obj.adminprivils[0].mainSS == 1){
                        $('#OPT-2').append('<li><a href="management_shift_schedules.php">Management Shift Schedules</a></li>');
                    }
                    /* 
                        <li><a href="leave_settings.php">Leave Management</a></li>
                        <li><a href="employee_forget_clk_in_out.php">Forgetting to Clock In/Out</a></li>
                    */
                    if(obj.adminprivils[0].fClk == 1){
                        $('#OPT-3').append('<li><a href="employee_forget_clk_in_out.php">Forgetting to Clock In/Out</a></li>');
                    }
                    if(obj.adminprivils[0].leaveManag == 1){
                        $('#OPT-3').append('<li><a href="leave_settings.php">Leave Management</a></li>');
                    }
                    
                }
            });
        }
        
    });
            
            



</script>
*/
</head>
<body>
<!-- Nav-Bar -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="home.php">FPAM System</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul  class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="device-exchenge.php">Data<span class="caret"></span></a>
          <ul id="OPT-1" class="dropdown-menu"></ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="maintainence_options.php">Maintenance Options<span class="caret"></span></a>
          <ul id="OPT-2" class="dropdown-menu"></ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="handle_attendence.php">Attendance Options<span class="caret"></span>
            </a>
            <ul id="OPT-3" class="dropdown-menu"></ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
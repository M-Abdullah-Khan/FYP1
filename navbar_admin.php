<?php ?>

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
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="device-exchenge.php">Maintenance Options<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="device_management.php">Device Management</a></li>
            <li><a href="user_management.php">Upload and Download Data</a></li>
            <li><a href="admin_settings.php">Real Time Monitor</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="maintainence_options.php">Maintenance Options<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="department.php">Department Management</a></li>
            <li><a href="user_management.php">Employee Maintain</a></li>
            <li><a href="admin_settings.php">Administrator Setting</a></li>
            <li><a href="management_shift_schedules.php">Management Shift Schedules</a></li>
            <li><a href="employee_schedule.php">Employee Schedule</a></li>
            <li><a href="holidays_maintenances.php">Holidays Maintenances</a></li>
            <li><a href="attendence_rule.php">Attendance Rule</a></li>
          </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="handle_attendence.php">Attendence Options<span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
            <li><a href="leave_settings.php">Leave Management</a></li>
            <li><a href="user_management.php">Forgetting to Clock In/Out</a></li>
            <li><a href="admin_settings.php">Coming Late</a></li>
            <li><a href="maint_ttables.php">Leaving Early</a></li>
          </ul>
        </li>
        <li><a href="#">Search/Print</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
    <!-- Nav Bar Ends-->
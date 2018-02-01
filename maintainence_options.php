<?php 
require('links.php');
?>


<script type="text/javascript">
window.onload = function() {
	var dptmbtn = document.getElementById('dptm');
	dptmbtn.addEventListener('click', function() { document.location.href = '/department.php'; });

	var empbtn = document.getElementById('emp');
	empbtn.addEventListener('click', function() { document.location.href = '/user_management.php'; });

	var mttbtn = document.getElementById('mtb');
	mttbtn.addEventListener('click', function() { document.location.href = '/maint_ttables.php'; });
	
	var mssbtn = document.getElementById('mss');
	mssbtn.addEventListener('click', function() { document.location.href = '/management_shift_schedules.php'; });
	
	var adsbtn = document.getElementById('ads');
	adsbtn.addEventListener('click', function() { document.location.href = '/admin_settings.php'; });

	var esbtn = document.getElementById('es');
	esbtn.addEventListener('click', function() { document.location.href = '/employee_schedule.php'; });
	
	var holimbtn = document.getElementById('holim');
	holimbtn.addEventListener('click', function() { document.location.href = '/holidays_maintenances.php'; });
    
    var lsbtn = document.getElementById('ls');
	lsbtn.addEventListener('click', function() { document.location.href = '/leave_settings.php'; });
    
    var arbtn = document.getElementById('ar');
	arbtn.addEventListener('click', function() { document.location.href = '/attendence_rule.php'; });
    
    var dobtn = document.getElementById('do');
	dobtn.addEventListener('click', function() { document.location.href = '/database_options.php'; });
    
    var sobtn = document.getElementById('so');
	sobtn.addEventListener('click', function() { document.location.href = '/system_options.php'; });
}
</script>

</head>
<body>
    
     <!-- NAV -->
<?php 
    require('navbar_admin.php');
    ?>
<!-- NAV -->
    <h2 align="center">Maintainence Options</h2></br>
	<div class = "container">
		<div style="width:100%;">
            <div style="float: left; width: 48%">
                <div style="float: left; width: 48%"> 
				
 		   			<button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "department_management" id = "dptm">Department Management</button>
                </div>
                <div style="float: right; width: 48%"> 
                    <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "employee_maintain" id = "emp">Employee Maintain</button>
                </div>
                
            </div>
            
            
            <div style="float: right; width: 48%">
                <div style="float: left; width: 48%">
                    <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "maintenance_timetables" id = "mtb">Maintenance Timetables</button>
                </div>
                <div style="float: right; width: 48%">
                    <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "management_shift_schedules" id = "mss">Management Shift Schedules</button>
                </div>
            </div>
            <div class="space" style="float: left; height: 10px; width: 100%"></div>
            
            
            <div style="float: left; width: 48%">
                <div style="float: left; width: 48%">
                    <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "administrator_setting" id = "ads">Administrator Setting</button>
                </div>
                <div style="float: right; width: 48%">
                    <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "employee_schedule" id = "es">Employee Schedule</button>
                </div>
            </div>
            <div style="float: right; width: 48%">
                <div style="float: left; width: 48%">
                    <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "holidays_maintenances" id = "holim">Holidays Maintenances</button>
                </div>
                <div style="float: right; width: 48%">
                    <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "leave_setting" id = "ls">Leave Setting</button>
                </div>
            </div>
            <div class="space" style="float: left; height: 10px; width: 100%"></div>
            
            
            <div style="float: left; width: 48%">
                <div style="float: left; width: 48%">
                    <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "attendance_rule" id = "ar">Attendance Rule</button>
                </div>
                <div style="float: right; width: 48%">
                    <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "database_option" id = "do">Database Option</button>
                </div>
            </div>
            
            
            <div style="float: right; width: 48%">
                <div style="float: left; width: 48%">
                    <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "system_option" id = "so">System Option</button>
                </div>
            </div>
		</div>
	</div>
    
</body>
</html>
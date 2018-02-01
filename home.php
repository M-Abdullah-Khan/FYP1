<?php 
require('links.php');
?>

    <script type="text/javascript">
        window.onload = function() {
            var lvbtn = document.getElementById('lvb');
            lvbtn.addEventListener('click', function() { document.location.href = '/live_view.php'; });
            
            var ambtn = document.getElementById('amb');
            ambtn.addEventListener('click', function() { document.location.href = '/user_management.php'; });

            var sobtn = document.getElementById('sob');
            sobtn.addEventListener('click', function() { document.location.href = '/available_queries.php'; });
	
            var subtn = document.getElementById('sub');
            subtn.addEventListener('click', function() { document.location.href = '/specific_user_query.php'; });
	
            var mibtn = document.getElementById('mib');
            mibtn.addEventListener('click', function() { document.location.href = '/show_all_issues.php'; });

            var iwbtn = document.getElementById('iwb');
            iwbtn.addEventListener('click', function() { document.location.href = '/issue_warning.php'; });
	
            var pibtn = document.getElementById('pib');
            pibtn.addEventListener('click', function() { document.location.href = '/print_issues.php'; });
    
            var pibtn = document.getElementById('main_opt');
            pibtn.addEventListener('click', function() { document.location.href = '/maintainence_options.php'; });
    
            var pibtn = document.getElementById('hand_atn');
            pibtn.addEventListener('click', function() { document.location.href = '/handle_attendence.php'; });
        }
    </script>
    
</head>
<body>
<!-- NAV -->
<?php 
    require('navbar_admin.php');
    ?>
<!-- NAV -->
    
	<h2 align="center">Attendence Management System</h2>
	<div class = "container">
		<div style="width: 100%;">
			<div style="float: left; width: 30%"> 
				
 		   		<h3>Perform Queries</h3>
 		   		</br>
 		   		<a href="late_comers.php"><p>Check Late Comers</p></a>
 		   		</br>
 		   		<a href="absentees.php"><p>Check Absentees</p></a>
 		   		</br>
 		   		<a href="m_activity.php"><p>Malicious Activity</p></a>
				
			</div>
			<div style="float: right; width: 60%"> 
   		 		 
   		 		<h3>Recent Issues</h3>
 		   		
 		   		<table width="100%%" border="1" summary="The recent issues of the employees are displayed by priority">
					<tr id="r01">
    					<td id="r01c01" width="10%"><b>S.No</b></td>
    					<td id="r01c02" width="50%"><b>Name</b></td>
    					<td id="r01c03" width="20%"><b>Issue</b></td>
    					<td id="r01c04" width="20%"><b>Place</b></td>
  					</tr>
  					<tr id="r02">
    					<td id="r02c01">&nbsp;</td>
    					<td id="r02c01">&nbsp;</td>
    					<td id="r02c03">&nbsp;</td>
    					<td id="r02c04">&nbsp;</td>
  					</tr>
  					<tr id="r03">
    					<td id="r03c01">&nbsp;</td>
    					<td id="r03c01">&nbsp;</td>
    					<td id="r03c03">&nbsp;</td>
    					<td id="r03c04">&nbsp;</td>
  					</tr>
  					<tr id="r04">
    					<td id="r04c01">&nbsp;</td>
    					<td id="r04c01">&nbsp;</td>
    					<td id="r04c03">&nbsp;</td>
    					<td id="r04c04">&nbsp;</td>
  					</tr>
  					<tr id="r05">
    					<td id="r05c01">&nbsp;</td>
    					<td id="r05c01">&nbsp;</td>
    					<td id="r05c03">&nbsp;</td>
    					<td id="r05c04">&nbsp;</td>
  					</tr>
                    <tr id="r06">
    					<td id="r05c01">&nbsp;</td>
    					<td id="r05c01">&nbsp;</td>
    					<td id="r05c03">&nbsp;</td>
    					<td id="r05c04">&nbsp;</td>
  					</tr>
				</table>
			</div>		
		</div>
	</div>

	<div class = "container">
		<div style="width:100%;">
			<div style="float: left; width: 30%"> 
 		   		<div style="float: left; width: 40%">
 		   			<button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "show_others" id = "sob">Others</button>
				</div>
				<div style="float: right; width: 40%"> 
   	 				<button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "specific_user" id = "sub">Spec. User</button>
				</div>
				
			</div>
			
			<div style="float: right; width: 60%; text-align:center"> 
				<div style="float: left; width: 25%; display:inline-block" >
 		   			<button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "more_issues" id = "mib">More</button>
				</div>
				<div style="float: none; width: 25%; display:inline-block"> 
   		 			<button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "issue_warning" id = "iwb">Warn</button>
				</div>
				<div style="float: right; width: 26%; display:inline-block"> 
   		 			<button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "print_issues" id = "pib">Print</button>
				</div>
			</div>

		</div>
	</div>
</body>
</html>
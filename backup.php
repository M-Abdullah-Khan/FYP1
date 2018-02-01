<?php 
require('links.php');
require('printer2.php');
?>

    <script type="text/javascript">
        window.onload = function() {
	
            var subtn = document.getElementById('sub');
            subtn.addEventListener('click', function() { document.location.href = '/dump_database.php'; });
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
                <h3>Data Backup</h3></br>
				<button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "id" id = "sub" style="margin:10px;">Backup</button>
			</div>	
		</div>
	</div>
</body>
</html>
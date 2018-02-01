<?php 
require('links.php');

$con = mysqli_connect("localhost","root","","fpmsdb");
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
    
	<h2 align="center">Assign Users</h2>
    <div class="container">
        <div style="width: 50%; float:left;">
            <?php 
            $get_user = "select * from userdata where DID IS NULL OR DID = ''";
            $result_user= mysqli_query($con, $get_user);
            
            echo "<table>";
            echo "<tr>";
            echo "<th>Check box</th>";
            echo "<th>User ID</th>";
            echo "<th>Card No.</th>";
            echo "<th>Name</th>";
            echo "<th>Email</th>";
            echo "</tr>";
            while($row = $result_user->fetch_assoc()){
                echo "<tr>";
                    echo '<td><input type="checkbox" id = "'.$row['UID'].'" value="'.$row['UID'].'"></td>';
                    echo "<td>".$row['UID']."</td>";
                    echo "<td>".$row['CN']."</td>";
                    echo "<td>".$row['Name']."</td>";
                    echo "<td>".$row['EID']."</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
    
        <div style="width: 50%; float:right;">
            <?php
            $get_dept = "select * from departmentdata";
            $result_dept= mysqli_query($con, $get_dept);
            
            echo "<table>";
            echo "<tr>";
            echo "<th>Check box</th>";
            echo "<th>DID</th>";
            echo "<th>Name</th>";
            echo "</tr>";
            while($row = $result_dept->fetch_assoc()){
                echo "<tr>";
                    echo '<td><input type="checkbox" id = "'.$row['DID'].'" value="'.$row['DID'].'"></td>';
                    echo "<td>".$row['DID']."</td>";
                    echo "<td>".$row['Name']."</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>
        </div>
    </div>
    
    
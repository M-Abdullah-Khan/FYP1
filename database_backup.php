
<?php require('links.php'); ?>
<script type="text/javascript">
window.onload = function() {
}
</script>
</head>

<body>
    
     <!-- NAV -->
<?php 
    require('navbar_admin.php');
    ?>
<!-- NAV -->
<?php 
    backup_tables('localhost','root','','fpmsdb');

/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables = '*')
{
	
	$link = mysqli_connect($host,$user,$pass,$name);
	//mysql_select_db($name,$link);
	
	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		$result = mysqli_query($link,'SHOW TABLES');
		while($row = mysqli_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	//cycle through
	foreach($tables as $table)
	{
		$result = mysqli_query($link,'SELECT * FROM '.$table);
		$num_fields = mysqli_num_fields($result);
		
		$return = 'DROP TABLE '.$table.';';
		$row2 = mysqli_fetch_row(mysqli_query($link,'SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) 
		{
			while($row = mysqli_fetch_row($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j < $num_fields; $j++) 
				{
					$row[$j] = addslashes($row[$j]);
					$row[$j] = preg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j < ($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}
	
	//save file
	$handle = fopen('db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
	fwrite($handle,$return);
	fclose($handle);
}
    ?>
	<h2 align="center">Department Options</h2>
	<div class = "container">
		<div style="width: 100%;">
			<div style="float: left; width: 30%"> 
				
 		   		<h3>Options</h3>
 		   		<br>
			</div>
		</div>
	</div>
</body>
</html>
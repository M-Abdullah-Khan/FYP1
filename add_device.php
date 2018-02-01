<?php 
require('links.php');

if (isset($_POST['Add']) && !empty($_POST['name']) && !empty($_POST['install-place'])&& !empty($_POST['communication-key'])&& !empty($_POST['Ip'])&& isset($_POST['Status'])&& isset($_POST['communication-type'])&& isset($_POST['baud-rate'])&& isset($_POST['communication-port'])) {
 $con = mysqli_connect("localhost","root","","fpmsdb");
    $sql = 'INSERT INTO `devicemanagement`(`Name`, `CommunicationMode`, `Port`, `BaudRate`, `IPAddress`, `CommunicationPassword`, `PlaceofInstall`, `Status`) VALUES ("'.$_POST['name'].'","'.$_POST['communication-type'].'","'.$_POST['communication-port'].'","'.$_POST['baud-rate'].'","'.$_POST['Ip'].'","'.$_POST['communication-key'].'","'.$_POST['install-place'].'","'.$_POST['Status'].'")';
    
    mysqli_query($con,$sql);
    header("Location: device_management.php");
}

?>

<script type="text/javascript">
    
</script>
</head>
<body>
    
<!-- NAV -->
<?php 
    require('navbar_admin.php');
?>
<!-- NAV -->
    <h1 align="center">Add New Device</h1>
    
    <h4 style="align:left; margin-left:5%;">Please Submit the form to add new device</h4>
    <div class="container">
    
    <form class = "add_device" role = "form" action = "<?php ($_SERVER['PHP_SELF']); ?>" method = "post">
        <span class="input_text">Device Name:<input type = "text" class = "form-control" 
        name = "name" id="name" required autofocus style="margin:10px;" placeholder="Device Name"></span>
                      
        <span class="input_text">Install Place:<input type = "text" class = "form-control" 
        name = "install-place" id="install-place" required autofocus style="margin:10px;" placeholder="Place Of Install"></span>
        
        <span class="input_text">Communication key:<input type = "text" class = "form-control" 
        name = "communication-key" id="communication-key" required autofocus style="margin:10px;" placeholder="Communication Key"></span>
        
        <span class="input_text">IP Address:<input type = "text" class = "form-control" 
        name = "Ip" id="Ip" required autofocus style="margin:10px;" placeholder="IP Address"></span>
        
        <span class="input_text">Status:<select name="Status" id="Status" style="margin:10px;">
            <option value="1">OK</option>
            <option value="0">NOT Working</option>
        </select></span>
                      
        <span class="input_text">Communication Type:<select name="communication-type" id="communication-type" style="margin:10px;">
            <option value="Serial">Serial</option>
            <option value="TCP/IP">TCP/IP</option>
            <option value="Other">Other</option>
        </select></span>
                      
        <span class="input_text">Baud Rate:<select name="baud-rate" id="baud-rate" style="margin:10px;">
            <option value="115200">115200</option>
            <option value="160000">160000</option>
            <option value="Other">Other</option>
        </select></span>
                      
        <span class="input_text">PORT:<select name="communication-port" id="communication-port" style="margin:10px;">
            <option value="COM5">COM5</option>
            <option value="TCP/IP">TCP/IP</option>
            <option value="Other">Other</option>
        </select></span>
                     
        <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "Add" id = "Add">Save</button>    
    </form>
    
    
    </div>
    
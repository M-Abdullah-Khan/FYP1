<?php 
require('links.php');




?>

<script type="text/javascript">
     window.onload = function() {
        var lvbtn = document.getElementById('sav');
        lvbtn.addEventListener('click', function() {
            var name = $('#name').val();
            var old_serial_no = $('#hid-fie').val();
            var device_no = $('#device-no').val();
            var com_key = $('#communication-key').val();
            var com_type = $("#communication-type").val();
            var baud_rate = $('#baud-rate').val();
            var com_port = $('#communication-port').val();
            $.ajax({
                url:"save_device_info.php",
                data: {name:name, device_no:device_no, com_key:com_key, com_type:com_type, com_port:com_port ,old_serial_no:old_serial_no,baud_rate:baud_rate},
                dataType:"text",
                method:"POST",
                success:function(data){
                   set_data(data);
                    $('#hid-fie').val("");
                    $('#change-interface').hide();
                    fetch_data();
                }
            });
        });
        
         
         // This function is called when the user presses the delete button after selecting a device
         // The device is deleted from the database
        var ambtn = document.getElementById('del');
        ambtn.addEventListener('click', function() {
            id = document.querySelector('input[name="dev"]:checked').value
            console.log(id);
            //Confirming 
            if(confirm("Are you Sure Want to Remove Thesese?")){
            
                $.ajax({
                    url:'delete_device_info.php',
                    method:'POST',
                    data:{id:id},
                    success:function(){
                        $('tr#'+id+'').css('background-color','#d64040');
                        $('tr#'+id+'').fadeOut('slow');
                        $('#change-interface').hide();
                        $('#hid-fie').val("");
                        $('#Device-info-table').empty();
                        fetch_data();
                    }
                });
            }
        });

            var sobtn = document.getElementById('add');
            sobtn.addEventListener('click', function() { document.location.href = '/add_device.php'; });
     }
     
     // This function is called when a device is selected 
    function display_change(row){
        
        // Turn All devices backgroung white
        $('tr').css('background-color','#ffffff');
        
        // For the one which is selected turn color to green
        $('tr#'+row).css('background-color','#79E08B');
        
        // Show the change interface
        $('#change-interface').show();
        $.ajax({
            url:"get-device-vars.php",
            method:"POST",
            data:{row:row},
            success:function(data){
                console.log(data);
                set_data(data); 
            }
        });
    }
    
    
    // Function populates the required fields so to make them changeable
    function set_data(cal){
        var obj = JSON.parse(cal);
        $('#name').val(obj.employees[0].name);
        $('#hid-fie').val(obj.employees[0].serialno);
        $('#device-no').val(obj.employees[0].serialno);
        $('#communication-key').val(obj.employees[0].communicationpass);
        $('#communication-type').val(obj.employees[0].communicationmode);
        $('#baud-rate').val(obj.employees[0].baudrate);
        $('#communication-port').val(obj.employees[0].port);
        
    }
    
    // This function gets all the devices from the database and populates them in teh table
    function fetch_data(){
    $.ajax({
            url:"get-device-data.php",
            method:"POST",
            success:function(data){
                $('#Device-info-table').html(data);
            }
        });
    }   
    $(document).ready(function(){ 
        fetch_data();
    });
    
</script>
</head>
<body>
<!-- NAV -->
<?php 
    require('navbar_admin.php');
    ?>
<!-- NAV -->
    
	<h2 align="center">Device Management</h2>
	<div class = "container">
		<div style="width: 100%;">
			<div style="float: left; width: 30%" id="Device-info-table"> 

				
			</div>
			<div style="float: right; width: 60%; display:none;" id="change-interface"> 
                        <span class="input_text">Name:<input type = "text" class = "form-control" 
                    name = "name" id="name" required autofocus style="margin:10px;"></span>
                
                    <input type = "text"
                    name = "hid-fie" id="hid-fie" style="display:none;" value="">
                      
                     <span class="input_text">Device No:<input type = "text" class = "form-control" 
                    name = "device-no" id="device-no" required autofocus style="margin:10px;"></span>
                      
                     
                      
                    <span class="input_text">Communication key:<input type = "text" class = "form-control" 
                    name = "communication-key" id="communication-key" required autofocus style="margin:10px;"></span>
                      
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
                     
                    <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "save" id = "sav">Save</button>
                    <button class = "btn btn-lg btn-danger btn-block" type = "submit" name = "delete" id = "del" >Delete</button>
			</div>
            <div style="width:10%; float:center;">
                <button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "add" id = "add" >Add</button>
		    </div>
        </div>
	</div>

	
</body>
</html>
<?php 
require('links.php');
?>

<script type="text/javascript">
    function disablefield1(){
        document.getElementById('onDuty-1').disabled = false;
        document.getElementById('onDuty-2').disabled = false;
        document.getElementById('offDuty-1').disabled = false;
        document.getElementById('offDuty-2').disabled = false;
        document.getElementById('onDuty-morning').disabled = true;
        document.getElementById('offDuty-morning').disabled = true;    
         $('#single').hide();
        $('#double').show();
    }
    function disablefield(){
        document.getElementById('onDuty-1').disabled = true;
        document.getElementById('onDuty-2').disabled = true;
        document.getElementById('offDuty-1').disabled = true;
        document.getElementById('offDuty-2').disabled = true;
        document.getElementById('onDuty-morning').disabled = false;
        document.getElementById('offDuty-morning').disabled = false;
         $('#single').show();
        $('#double').hide();
    }
    window.onload = function() {
}
    $(document).on('click','#add-shift',function(){
        if($('#single-shift').is(':checked')){
        var name =  document.getElementById('name-shift').value;
        var onDuty = document.getElementById('onDuty-morning').value;
        var offDuty = document.getElementById('offDuty-morning').value;
        var late = document.getElementById('late').value;
        var early = document.getElementById('early').value;
        $.ajax({
            url:'addSingleShift.php',
            method:'POST',
            data:{name:name,onDuty:onDuty,offDuty:offDuty,late:late,early:early},
            success:function(){
                $('#sucess').html('Shift Created Succefully');
            }
        });
        }
    else{
        var name =  document.getElementById('name-shift').value;
        var onDuty1 = document.getElementById('onDuty-1').value;
        var offDuty1 = document.getElementById('offDuty-1').value;
        var onDuty2 = document.getElementById('onDuty-2').value;
        var offDuty2 = document.getElementById('offDuty-2').value;
        var late = document.getElementById('late').value;
        var early = document.getElementById('early').value;
       
        console.log(onDuty);
        
        $.ajax({
            url:'addMultipleShift.php',
            method:'POST',
            data:{name:name,onDuty1:onDuty1,offDuty1:offDuty1,onDuty2:onDuty2,offDuty2:offDuty2,late:late,early:early},
            success:function(){
                $('#sucess').html('Shift Created Succefully');
            }
        });
        
    }
        
});

</script>
</head>
<body>
    
     <!-- NAV -->
<?php 
    require('navbar_admin.php');
    ?>
<!-- NAV -->
	<h2 align="center">Create Shift</h2>
	<div class = "container">
		<div style="width: 100%;">
			<div style="float: left; width: 70%"> 
              <input type="text" class="form-control" id="name-shift" placeholder="Shift Name">
 		   		<h4><b>Times For On/Off Duties</b></h4>
                </br>
                <p>Setting On/Off Time in Organization</p>
 		   		<div class="radio">
                    <label>
                        <input type="radio" value="" name="duty-time" id="single-shift" onclick="disablefield()" checked>
                        On Duty in Morning Off Duty in Afternoon.
                    </label>
                    </br>
                </div>
                 <div class="time">
                 <div id = "single">
                     OnDuty Time: <input type="time" step="300" id = "onDuty-morning" value="9:00:AM" >
                     OffDuty Time: <input type="time" step="300" id = "offDuty-morning" >
                      <br>
                  </div>
              
              <div class="radio">
                    <label>
                        <input type="radio" value="" name="duty-time" id ="double-shift" onclick="disablefield1()">
                        On Duty and Off Duty in morning and afternoon.
                    </label>
                    </br>
                  
                </div>
                <div id="double" style="display:none;">
                OnDuty Time: <input type="time" name="time" id = "onDuty-1" disabled>
                    OffDuty Time: <input type="time"  name="time" step="300" id = "offDuty-1" disabled>
                <br>
                OnDuty Time: <input type="time" step="300" id = "onDuty-2" disabled>
                    OffDuty Time: <input type="time" step="300"step="300" id = "offDuty-2" disabled>
                </div>
                <h4><b>Attendance Rule</b></h4> 
                Minutes Counted Late:<br><input type="number" id="late" step="5" max="30" min="5" value="5"><br>
                Minutes Leave Early:<br><input id="early" type="number" step="5" max="30"  min="5" value="5"><br>
                
                <div class="checkbox">
                <lalbel><input type="checkbox" name="assign" >Assign To employee</lalbel>
            </div>
               <div class="checkbox">
                <lalbel><input type="checkbox" name="assign" >Assign as default</lalbel>
            </div>
            
           <button type="button" class="btn btn-success" id="add-shift">Add Shift</button>
           <p id="sucess"></p>    
                
    </div>
</div>
         
			 
		</div>
		
	</div>
</body>
</html>
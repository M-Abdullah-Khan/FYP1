
<?php require('links.php'); ?>
<script type="text/javascript">
    window.onload = function() {
        
    }   
    $(document).on('click','#create-shedule',function(){
        var shift = document.querySelector('input[name = "shift-name"]:checked').value;
        var days = [];
        var name = document.getElementById('name-shift-time').value;
        $('#checkboxes input:checked').each(function(){
            days.push($(this).attr('name'));
        });
        console.log(shift);
        
        for(var i=0;i<days.length;i++)
            console.log(days[i]);
        
              $.ajax({
                url:'addShiftTime.php',
                method:'POST',
                data:{shift:shift,days:days,name:name},
                success:function(){
                   console.log('Success');
                }
            });
        
        
    });
</script>
</head>
<body>
     <!-- NAV -->
<?php 
    require('navbar_admin.php');
    ?>
<!-- NAV -->
	<h2  align="center">Department Options</h2>
	<div class = "container">
		<div style="width: 100%;">
			<div style="float: left; width: 30%"> 
 		   		<h3 style="padding-left: 100px;">Add Shift Time Period</h3>
 		   		<br>
                <div class="full">
                <input type="text" class="form-control" id="name-shift-time" placeholder="Shift Time Period Name">
                <div class="left">
 		        <h4>select shift category:</h4> 
 		        <?php
                $con = mysqli_connect("localhost","root","","fpmsdb");
                
                $sql = "SELECT ShiftName from shifttime";
                $result = mysqli_query($con,$sql);
                $count = 0;
                if(mysqli_num_rows($result)>0){
                      while($row = mysqli_fetch_array($result)){?>
                         <div class="radio">
                            
                                <?php $count = $count+1; ?>
                                 <input type="radio" id="<?php echo 'radio-'.$count ?>" name="shift-name" value="<?php echo $row['ShiftName']; ?>" ><?php echo $row['ShiftName']; ?>
                    
                         </div>
                          <?php
                      }
                }
                ?>
                </div>
                <div class="right">
                    <h4>Select Day:</h4>
                    <div id="checkboxes">
                      <div class="checkbox">
                           <label>
                                <input type="checkbox" name="mon"  value="mon">Monday
                            </label>
                        </div>
                        <div class="checkbox">
                           <label>
                               <input type="checkbox" name="tue" value="tue">Tuesday
                           </label>
                        </div>
                        <div class="checkbox">
                           <label>
                                <input type="checkbox" name="wed" value="wed">Wednesday
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="thu" value="thu">Thursday
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="fri" value="fri">Friday
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="sat" value="sat">Saturday
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="sun" value="sun">Sunday
                            </label>
                        </div>
                    </div>
                </div>
            </div>
                <div style="text-align:center;">
                    <button style="text-align: center;" class="btn btn-primary" id="create-shedule">Add a shedule</button>
                </div>
			</div>
		</div>
	</div>
</body>
</html>
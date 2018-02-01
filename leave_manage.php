
<?php require('links.php');
require('printer2.php'); ?>
<script type="text/javascript">
    $(document).ready(function(){
        
    });
    function addRecord(){
        var name = $('#name-shift').val();
        var symbol = $('#symbol').val();
          if($('#RoundAcc').is(':checked')){
            var unit = $('#minUnit').val();
            var option = $('#hourDay').val();
            var unitType;
            if(option.localeCompare("hour")){
                unitType = 1;
            }else{
                unitType = 2;
            }
            var round = $('input[name="round"]:checked').val();
        }
        else{
            unit = "NULL";
            option = "NULL";
            round = "NULL";
        }
        $.ajax({
            url:"check_record.php",
            method:"POST",
            data:{name:name,unit:unit,unitType:unitType,round:round,symbol:symbol},
            success:function(data){
                if(!data){
                    
                }
                else if(data.localeCompare("name")==0){
                    alert("Name already exist");
                }
                else{
                    alert("Symbol already exist");
                }

    }
    });
}
    function updateRecord(){
        var LNO = $('input[name="radi"]:checked').val();
        var name = $('#name-shift').val();
        var symbol = $('#symbol').val();
        if($('#RoundAcc').is(':checked')){
            var unit = $('#minUnit').val();
            var option = $('#hourDay').val();
            var unitType;
            if(option.localeCompare("hour")){
                unitType = 1;
            }else{
                unitType = 2;
            }
            var round = $('input[name="round"]:checked').val();
        }
        else{
            unit = "NULL";
            option = "NULL";
            round = "NULL";
        }
        
        $.ajax({
            url:"modify_leave.php",
            method:"POST",
            data:{LNO:LNO,name:name,unit:unit,unitType:unitType,round:round,symbol:symbol},
            success:function(){
            
            }
        });
    }
    function hideShow(){
            $("#minUnit").prop('disabled', true);
            $("#hourDay").prop('disabled', true);
            $("#roundOff").prop('disabled', true);
            $("#roundDown").prop('disabled', true);
            $("#roundUp").prop('disabled', true);
            $('#RoundAcc').attr('checked', false); 
    }
function hideShow1(){
    $("#minUnit").prop('disabled', false);
        $("#hourDay").prop('disabled', false);
        $("#roundOff").prop('disabled', false);
        $("#roundDown").prop('disabled', false);
        $("#roundUp").prop('disabled', false);
    
        $('#AccTime').attr('checked', false); 
    }
    function modify_settings(id){
        var Id =  document.getElementById(id).value;
        var selected = $(':radio:checked','#nameClass').val();
        console.log(Id);
       $.ajax({
           url:"show_leave.php",
           method:"POST",
           data:{Id:Id},
           success: function(data){

              data = data.substring(0,data.length-1);
               console.log(data);
              var myData = data.split(",");
               document.getElementById('name-shift').value = myData[0];
               for(var i=0;i<6;i++)
                   console.log("Data "+i + "   "+myData[i]);
               if(myData[4]==null){
                   hideShow();
                   $('#AccTime').attr('checked', true);
               } 
               else{
                   $('#RoundAcc').attr('checked', true);
                   $('#minUnit').val(myData[2]);
                   if(myData[1] == 1)
                       $('#hourDay').val("Hour");
                   else
                       $('#hourDay').val("workDay");
                   hideShow1();
                   $('#RoundAcc').attr('checked', true);

                   if(myData[4]==0){
                       $('#roundDown').prop('checked', true);
                   }
                   else if(myData[4]==1){
                       $('#roundOff').prop('checked', true);
                   }
                   else{
                       $('#roundUp').prop('checked', true);
                   }   
               }
               $('#symbol').val(myData[4]);
        }
       });
            $('#name-shift').val(id.value);
            $('#modify_leave').show();
    }
</script>
</head>
<body>
     <!-- NAV -->
<?php 
    require('navbar_admin.php');
    ?>
<!-- NAV -->
	<h2 align="center">Department Options</h2>
	<div class = "container">
		<div style="width: 100%;">
		<?php
               $opt_columns[0] = "className";
               
            $query = "SELECT LNO,className FROM leavesettings";
            ?><div style="width=20%;float:left;"><?php
                print_table_with_radiobutton_with_oc("LNO","leavesettings",$opt_columns,$query,"modify_settings")
            ?></div><?php
        ?>
            </div>
            <div id="modify_leave" style="display:none;">
               Leave Class Name:<br>
               <input value="" type="text" class="form-control" id="name-shift">
                <div id="statiscal_rule">
                  <h5><b>Statiscal Rule</b></h5><br>
                    Min Unit:
                    <input type="number" id="minUnit" min="1">
                    <div class="space"></div>
                    <select id="hourDay">
                        <option value="hour">Hour</option>
                        <option value="workDay">WorkDay</option>
                    </select>
                    
                    <div id="round">
                    Round Off Control:
                    <div id="radio_group">
                        <div class="radio">
                            <label>
                                <input type="radio" value="0" name="round" id="roundDown">Round Down
                            </label>
                        </div>
                           <div class="radio">
                            <label>
                                <input type="radio" value="1" name="round" id="roundOff">Round Off
                            </label>
                        </div>
                           <div class="radio">
                            <label>
                                <input type="radio" value="2" name="round" id="roundUp">Round Up
                            </label>
                    </div>
                </div>
            </div>
               <br>
               <div class="checkbox">
                   <label>
                       <input type="checkbox" id="AccTime" name = "accByTime" onclick="hideShow()">Acc by Time
                   </label>
               </div>
                  <div class="checkbox">
                   <label>
                       <input type="checkbox" id="RoundAcc" name = "roudAtAcc" onclick="hideShow1(1)">Round At Acc
                   </label>
               </div>
               Symbol:<input type="text" id="symbol" maxlength="3">
                </div>
                <div class="space" style=" text-align: center;">
                <button type="button" class="btn btn-primary" id= "update-leave" onclick="updateRecord()">Modify</button>
                <?php
                    
                ?>
                <button type="button" class="btn btn-primary" id="add-leave" onclick="addRecord()">Add Leave</button>
                </div>
                
                <div id="leave add">
                
                </div><p id="error"></p>
		</div>
	</div>
</body>
</html>
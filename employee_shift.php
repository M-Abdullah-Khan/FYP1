
<?php require('links.php');require('printer2.php');?>
<script type="text/javascript">
window.onload = function() {
    
}
function showDiv(){
    $('#FromTo').show();
    $('#subm').show();
}
    var id = [];
function assignShift(){
    console.log("hy");
    $(':checkbox:checked').each(function(i){
        id[i] = $(this).val();
         });
         if(id.length > 0){
             $('#shift-div').show();
         }
         else{
             alert("Please Select atleast one checkbox");
         }

}
$('#assign-shift').click(function(){
     });
$(document).on('click','#assignU',function(){
     var shift = document.querySelector('input[name = "radi"]:checked').value;
     var from = document.getElementById('startDate').value;
     var to = document.getElementById('endDate').value;
    console.log(shift);
    console.log(from);
    console.log(to);
    
    for(var i=0;i<id.length;i++)
        console.log(id[i]);
        $.ajax({
            url:'assignShift.php',
            method:'POST',
            data:{id:id,shift:shift,from:from,to:to},
            success:function(){
                $('#sucess').html('Shift Created Succefully');
                alert("Shift Assigned Successfully");
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
	<h2 align="center">Employee Shift</h2>
	<div class = "container">
		<div style="width: 45%; float:left;">
			
				
 		   		<h3>Assign Shift To Employee</h3>
 		   		<br>
 		   		<?php
                $id = "CN";
                $sql = "SELECT e.acNo,e.userID,e.name,e.CN,d.Dname from employee e, departments d WHERE e.department = d.DID";
                $optcolums[0] = "acNo";
                $optcolums[1] = "userID";
                $optcolums[2] = "name";
                $optcolums[3] = "CN";
                $optcolums[4] = "Dname";
                
                print_table_with_checkfield_func3($id,"myTable",$optcolums,$sql,"getme");?>
                <button type="button" class="btn btn-primary" id="assign-shift" onclick="assignShift()">Assign Shift</button>
 		   		
			
		</div>
		<div style="width: 45%; float:right; display:none;" id="shift-div">
				
 		   		<h4>Choose Category</h4>
 		   		<br>
 		   		<?php
                $id = "name";
                $sql = "SELECT name from shift";
                $optcol[0] = "name";
                
                
                print_table_with_radiobutton($id,"myTable",$optcol,$sql);?>
                <button type="button" class="btn btn-primary" id="assign-cat" onclick="showDiv()">Assign Shift Category</button>
		</div>
	
	</div>
		<div id="FromTo">
		    Start Date:<input type="date" id="startDate">
		    End Date:<input type="date" id="endDate">
		</div>
		<div id="subm">
		<button type="button" class="btn btn-success" id="assignU" >Assign To Users</button>
		</div>
		<br>
		
</body>
</html>
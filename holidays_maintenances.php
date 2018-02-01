<?php 
require('links.php');
require('printer_functions.php');
?>

<script type="text/javascript">
window.onload = function() {

	var sobtn = document.getElementById('sob');
	sobtn.addEventListener('click', function() { document.location.href = '/available_queries.php'; });
	
	var subtn = document.getElementById('sub');
	subtn.addEventListener('click', function() { document.location.href = '/specific_user_query.php'; });
    
    var sobtn = document.getElementById('sob');
	sobtn.addEventListener('click', function() {
        $.ajax({
            url:"holiday_adder.php",
            method:"POST",
            success:function(data){
                $('#live_data').html(data);
            }
        });
    });
}


$(document).on('click','#lvadd',function(){
    console.log('btn Click');
    var name = document.getElementById("holiday_name").value;
    var from = document.getElementById("from_field").value;
    var to = document.getElementById("to_field").value;
    console.log(from);
    console.log(to);
      $.ajax({
          url: "holiday_adder.php",
          method:"POST",
          data: {name:name, from:from, to:to},
          dataType:"text",
          success:function(data){
              fetch_data();
              console.log(data);
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
	<h2 align="center">Holidays Maintenance</h2>
	<div class = "container">
		<div style="width: 100%;">
			<div style="width: 100%"> 
   		 		 
   		 		<h3>Holidays</h3>
 		   		<?php  print_table('holidayinfo',"",""); ?>
			</div>		
		</div>
	</div>
    </br>
	<div class = "container">
		<div style="width:100%;">
			<div style="float: left; width: 30%"> 
 		   		<div style="float: left; width: 40%">
 		   			<button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "show_others" id = "sob">Add</button>
				</div>
				<div style="float: right; width: 40%"> 
   	 				<button class = "btn btn-lg btn-primary btn-block" type = "submit" name = "specific_user" id = "sub">Remove</button>
				</div>
				
			</div>

		</div>
	</div>
    </br>
<div class="container">
    <div id="holiday_form" class="form" >
        <span class="input_text"><input type = "text" class = "form-control" 
            name = "holidayName" id="holiday_name" placeholder = "Holiday Name" 
            required autofocus></span>
            
        <span class="date_picker">From:<input type="date" name="From" id="from_field" required autofocus ></span>
        <span class="date_picker">To:<input type="date" name="To" id="to_field" required autofocus ></span>
        <span class="date_picker"><button class="btn btn-lg btn-primary btn-block" type="submit" name="add_leave" id="lvadd">Add</button></span>
    </div>
</div>


</br>
</body>
</html>
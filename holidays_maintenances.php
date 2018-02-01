<?php 
require('links.php');

?>

<script type="text/javascript">
window.onload = function() {

    
    fetch_data();
    
	$(document).on('click','#rem',function(){
        var id = [];
        var total = 0;
        $(':checkbox:checked').each(function(total){
            id[total] = $(this).val();
        });
        
        
        $.ajax({
            url: "holiday-remover.php",
            method:"POST",
            data: {id:id},
            dataType:"text",
            success:function(data){
                fetch_data();
                $('#rem').hide();
            }
        });
    });
	
}

function selected(i){
    var id = [];
    var total = 0;
    $(':checkbox:checked').each(function(total){
        id[total] = $(this).val();
    });
    if(id.length > 0){
        $('#rem').show();
    }
    else{
        $('#rem').hide();
    }
}
    
    
    function fetch_data(){
        $("#holiday_table").empty();
        $.ajax({
            url: "get-holiday.php",
            method:"POST",
            success:function(data){
                $('#holiday_table').html(data);
            }
        });
    }


$(document).on('click','#lvadd',function(){
    console.log('btn Click');
    var name = document.getElementById("holiday_name").value;
    var from = document.getElementById("from_field").value;
    var to = document.getElementById("to_field").value;
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
		<div style="width: 100%;" id="holiday_table">
            <h3>Holidays</h3>
		</div>
        <div style="width: 100%">
            <button class="btn btn-lg btn-danger" id="rem" value="Remove" style="display:none;">Remove</button>    
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
<?php 
require('links.php');
?>

<script>
    //Getting department hirarchy to add admins
    function fetch_depts(){
        $.ajax(
        {
            url:"get-admin-types.php",
            method:"POST",
            success:function(data){
                $('#admin_type_list').html(data);
                
            }
        });
    }
    
    // Creating a filler function
    function fill_in(aid){
        var final_result = "";
        $.ajax(
        {
            url:"get-full-as-json.php",
            method:"POST",
            data:{aid:aid},
            success:function(data){
                
                // Perfecting data in to json object
                final_result = '{"adminprivils":[' +data+']}';
                // Parsing json data
                
                console.log(final_result);
                obj = JSON.parse(final_result);
                //Consoling
                console.log(obj.adminprivils[0].adminName);
                $('#type_admin').val(obj.adminprivils[0].adminName);     
                if(obj.adminprivils[0].adminName == "Super Administrator"){
                    $('#update-privils').hide();
                }
                else{
                    $('#update-privils').show();
                }
                
                //Unchecking all checkboxes
                $(':checkbox').prop('checked',false);
                
                
                //Checkingn required Checkboxes
                if(obj.adminprivils[0].backupDB == 1){
                    $('#backupDB').prop('checked',true);//
                }
                if(obj.adminprivils[0].devManage == 1){
                    $('#devManage').prop('checked',true);//
                }
                if(obj.adminprivils[0].upDownData == 1){
                    $('#upDownData').prop('checked',true);//
                }
                if(obj.adminprivils[0].leaveManag == 1){//
                    $('#leaveManag').prop('checked',true);
                }
                if(obj.adminprivils[0].fClk == 1){//
                    $('#fClk').prop('checked',true);
                }
                if(obj.adminprivils[0].empMain == 1){//
                    $('#empMain').prop('checked',true);
                }
                if(obj.adminprivils[0].mainSS == 1){//
                    $('#mainSS').prop('checked',true);
                }
                if(obj.adminprivils[0].holiM == 1){//
                    $('#holiM').prop('checked',true);
                }
                if(obj.adminprivils[0].depManage == 1){//
                    $('#depManage').prop('checked',true);
                }
                $('#Admin_Priv_form').show();
            }
        });
    }
    
    
    //Handling Update Functionality
    $(document).ready(function(){
                
        //get admins tYPES
        fetch_depts();
        $('#update-privils').click(function(){
            var id=[];
            var val=[];
            $(':checkbox').each(function(i){
                id[i] = $(this).val();
                if($('#'+id[i]).prop('checked') == true){
                    val[i]= 1;
                }
                else{
                    val[i] = 0;
                }
                console.log(id[i]);
                console.log(val[i]);
            });
            console.log(id[0]);
            var type = $('#adm_ty').val();
            var admin = document.querySelector('input[name="admins"]:checked').value;
            console.log(admin);
            $.ajax(
            {
                url:"update-admin-priv.php",
                method:"POST",
                data:{type:type,id:id,val:val,admin:admin},
                success:function(data){
                    alert("Success!");
                    fill_in(admin);
                }
            });
        });
    });

</script>



<!-- NAV -->
<?php 
    require('navbar_admin.php');
    ?>
<!-- NAV -->
	<h2 align="center">Administrator Settings</h2>
	<div class = "container">
		<div style="width: 100%;">
            <div style="float: left; width: 30%" id="Admin_view"> 
 		   		<h3>Admins Types</h3>
                <div id="admin_type_list"></div>
			</div>
            <div style="width: 40%; display:none; float:right;" id="Admin_Priv_form">
                <h3>Admin Privils</h3>
                <span>Admin Type:
                    <input type="text" id = "type_admin"></span>
                
            </br>
                <spna>Backup Database<input type="checkbox" id="backupDB" style="margin-right:50%; float:right;" value="backupDB"></spna></br>
            
                <spna>UP Down Data<input type="checkbox" id="upDownData" style="margin-right:50%; float:right;" value="upDownData"></spna></br>
            
                <spna>Device Management<input type="checkbox" id="devManage" style="margin-right:50%; float:right;" value="devManage"></spna></br>
        
                <spna>Leave Management<input type="checkbox" id="leaveManag" style="margin-right:50%; float:right;" value="leaveManag"></spna></br>

                <spna>Manage Forgetting CLK IN/OUT<input type="checkbox" id="fClk" style="margin-right:50%; float:right;" value="fClk"></spna></br>

                <spna>Employee Maintenance<input type="checkbox" id="empMain" style="margin-right:50%; float:right;" value="empMain"></spna></br>

                <spna>Mantenance Shift Schedule<input type="checkbox" id="mainSS" style="margin-right:50%; float:right;" value="mainSS"></spna></br>

                <spna>Holiday management<input type="checkbox" id="holiM" style="margin-right:50%; float:right;" value="holiM"></spna></br>

                <spna>Department management<input type="checkbox" id="depManage" style="margin-right:50%; float:right;" value="depManage"></spna></br>

                <input type="button" style="margin:10px; display:none;" id="update-privils" value="Update" class= "btn btn-lg btn-primary btn-block">
			</div>
		</div>
	</div>
</body>
</html>
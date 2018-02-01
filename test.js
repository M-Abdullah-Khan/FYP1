$(function(){
    
   var cars = ["Saab", "Volvo", "BMW"];
    var i = 0;
    var looper = 0;
     $('#resultTable tr').click(function (event) {
         cars[i] = ($(this).attr('id')); //trying to alert id of the clicked row          
         i++;
         looper = 0;
         while(looper != i){
             console.log(cars[looper]);
             looper++;
         }
     });
    
});
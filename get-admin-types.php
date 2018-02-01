<?php
require('printer2.php');



    $query = 'SELECT SNo, adminName From adminprivil';
    $optcols[0] = "adminName";
    $optcols[1] = "SNo";
    $id = "SNo";
    $table_name = "";
    $func = "fill_in";
    $name = "admins";
    print_table_with_radiobutton_with_oc3($id,$table_name,$optcols,$query,$func,$name);
?>
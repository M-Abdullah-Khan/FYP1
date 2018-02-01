<?php


//The obj is optional. This will be used to make the return json an object of type obj
function get_full_table_as_json($db_name,$table_name,$query,$obj){
    $con = mysqli_connect("localhost","root","",$db_name);
    $output="";
    $col_name[] ="";
    $col_type[] = "";
    $sel_col_name_query =
        "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS 
        WHERE table_name = '".$table_name."'
        AND table_schema = '".$db_name."';";
    $i = 0;
    
    $result= mysqli_query($con, $sel_col_name_query);
    if($result->num_rows == 0){ // Co reqult
        echo "something wrong with database connection! OR wrong Table name";
    }
    else
    {   //Result got!
        //Step 1:
        // Filling in the array for col name and type so can be used as needed
        $result1= mysqli_query($con, $query);
        $row1 = $result1->fetch_assoc();
        $output.= '{ '.$obj.' : [ {';
        
        echo $output;
        while($row = $result->fetch_assoc())
        {
            $output.= '"'.$row["COLUMN_NAME"].'":"'.$row1[$row["COLUMN_NAME"]].'"';
            $i++;
            if($i+1 <= count($row))
                $output .= ',';
        }            
        $output .='}]}';
    }
    return $output;
}
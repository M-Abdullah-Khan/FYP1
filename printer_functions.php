<?php

function meta_table($table_col_names){
    $i = 0;
    $cont = count($table_col_names);
    $row = 0;
    $col = 0;
    echo '<table width="100%" border="1" summary="Employee Records" id="search_result_table"><thead>';
    echo '<tr id="r'.$row.'">';    
    while($i!=$cont){
        echo '<th id="r'.$row.'c'.$col.'" width="20%"><b>'.$table_col_names[$i].'</b></th>';
        $col++;
        $i++;
    }
    echo "</tr></thead>";
    
}

function printer ($result,$table_col_names){
    if ($result->num_rows > 0)
    {   $num = count($table_col_names);
     $i = 0;
     $cols = 1;
     $rows = 1;
     echo '<tbody>';
     // output data of each row
     while($row = $result->fetch_assoc())
     {
         echo "<tr id=".$row[$table_col_names[$i]].">";
         while($i != $num){
             echo "<td id =r".$rows."c".$cols.">";
             echo $row[$table_col_names[$i]];
             echo "</td>";
             $cols++;    
             $i++;
         }
         $rows++;
         $i = 0;
         echo "</tr>";
     }
     echo "</tbody></table>";
     return 0;
    }
    
    else 
    {
        echo "0 results</br>";
        return 2;
    }
}
function print_table($table_name,$opt_columns,$query){
    $db_name = "fpmsdb";
    $col_name[]="";
    $col_type[]="";
    $sel_col_name_query =
                "SELECT COLUMN_NAME, DATA_TYPE 
                FROM INFORMATION_SCHEMA.COLUMNS 
                WHERE table_name = '".$table_name."' 
                AND table_schema = '".$db_name."';";
    //Establish Connection
    $con = mysqli_connect("localhost","root","",$db_name);
    if (!$con) { // No connection
        return 1;
        die('Could not connect to MySQL: ' . mysql_error()); 
    } 
    else{   // Connected
        if($opt_columns == ""){ // IF the col name are not specified
            // We will need to get all the col names and then print them as required
            
            // Query for getting col names
            
            $result= mysqli_query($con, $sel_col_name_query);
            if($result->num_rows == 0){ // Co reqult
            echo "something wrong with database connection! OR wrong Table name";
            }
            else{   //Result got!
                //Step 1:
                // Filling in the array for col name and type so can be used as needed
                $i = 0;
                while($row = $result->fetch_assoc())
                {
                    $col_name[$i] = $row["COLUMN_NAME"];
                    $col_type[$i] = $row["DATA_TYPE"];
                    $i++;
                }
                // col names got!
                //Step 2: Get actual Data from table
            }
            $i = 0;
            $query = "SELECT * FROM ".$table_name;
            $result_all_sel_query = mysqli_query($con, $query); // Result GOT!
                
                
                //Step3: Print Table Meta
            meta_table($col_name);
                
                //Step 4: Print table contents
            printer($result_all_sel_query,$col_name);
                // Printing done!
        }
        else{ // print only required table using the query      // Print only query part required col_table_names
            $result_all_sel_query = mysqli_query($con, $query);
            //Step3: Print Table Meta
            meta_table($opt_columns);
                
            //Step 4: Print table contents
            printer($result_all_sel_query,$opt_columns);
            // Printing done!
        }    
            
    }
} ?>
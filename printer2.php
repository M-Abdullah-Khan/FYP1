<?php
function printer_with_checkfield($id,$result_all_sel_query,$opt_columns){
    if ($result_all_sel_query->num_rows > 0)
    {   
        $num = count($opt_columns);
        $i = 0;
        $cols = 1;
        $rows = 1;
        echo '<tbody>';
        // output data of each row
        while($row = $result_all_sel_query->fetch_assoc())
        {
            echo "<tr id=".$row[$opt_columns[$i]].">";
            //Creating a checkfield by using id
           echo '<td><input type="checkbox" id="'.$row[$id].'"></td>';
            while($i != $num){
                echo "<td id =r".$rows."c".$cols.">";
                echo $row[$opt_columns[$i]];
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

function meta_table_with_checkfield($opt_table_col_names){
    $i = 0;
    $cont = count($opt_table_col_names);
    $row = 0;
    $col = 0;
    echo '<table width="100%" border="1" summary="Employee Records" id="search_result_table"><thead>';
    echo '<tr id="r'.$row.'">';
    echo '<th>Check Field</th>';
    while($i!=$cont){
        echo '<th id="r'.$row.'c'.$col.'" width="20%"><b>'.$opt_table_col_names[$i].'</b></th>';
        $col++;
        $i++;
    }
    echo "</tr></thead>";
}
// Printer with checkboxes containting the id which is the first argument
function print_table_with_checkfield($id,$table_name,$opt_columns,$query){
    $db_name = "fpmsdb";
    //Establish Connection
    $con = mysqli_connect("localhost","root","",$db_name);
    if (!$con) { // No connection
        return 1;
        die('Could not connect to MySQL: ' . mysql_error()); 
    } 
    else{   // Connected // print only required table using the query      // Print only query part required col_table_names
            $result_all_sel_query = mysqli_query($con, $query);
            //Step3: Print Table Meta
            
            meta_table_with_checkfield($opt_columns);
                
            //Step 4: Print table contents
            printer_with_checkfield($id,$result_all_sel_query,$opt_columns);
            // Printing done!
    } 
}

function full_print_with_checkfield($table_name){
    $db_name = "fpmsdb";
    $col_name[]="";
    $col_type[]="";
    $sel_col_name_query =

        "SELECT COLUMN_NAME, DATA_TYPE 
        FROM INFORMATION_SCHEMA.COLUMNS 
        WHERE table_name = '".$table_name."' 
        AND table_schema = '".$db_name."';";
    
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
    meta_table_with_checkfield($col_name);
                //Step 4: Print table contents
    printer_with_checkfield($col_name[0],$result_all_sel_query,$col_name);
                // Printing done!
}

?>
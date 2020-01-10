<?php
   include_once "connectDB.php"; // ใช้ class connectDB
   $con_obj = new connectDB;
   $conn = $con_obj->conntect_database(); //เรียกใช้ method conntect_database
   
   $output = ''; 
    //echo $_POST['query'];
   $result = mysqli_query($conn, $_POST['query']);
   if($result){
    $num_field = mysqli_field_count($conn);
    $output = '<table class="table" id="myTable">';
    $output.= '<thead><tr>';
    while ($fieldinfo = mysqli_fetch_field($result)) { // fetch header
        $output.='<th>'.$fieldinfo->name.'</th>';
    }
    $output.= '</tr></thead><tbody>';
    
    while($row = mysqli_fetch_row($result)) {  // fetch body
        $output .='<tr>';
        foreach($row as $col_row){
            $output .='<td>'.$col_row.'</td>';
        }
        $output .='</tr>';
    }
    $output .= '</tbody></table>';
    echo $output;
   } 
   else{
       echo "error";
   }
  
   mysqli_close($conn);
   
?>
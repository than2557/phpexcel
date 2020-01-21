<?php
   include_once "../connectDB.php"; // ใช้ class connectDB
   $con_obj = new connectDB;
   $conn = $con_obj->conntect_database(); //เรียกใช้ method conntect_database
   
   $output = '';

   $sql = "SELECT field_name FROM data_dic_ref WHERE tb_ref_name ="."'".$_POST['query']."'"; //หัวตาราง
   $sql2 = "SELECT * FROM ".$_POST['query']; // ข้อมูลในตาราง

   $result = mysqli_query($conn, $sql);

   if($result){
    //$num_field = mysqli_field_count($conn);
    $output = '<table class="table">';
    $output.= '<thead><tr>';
    $output.='<th>Primary key</th>';
    while ($row = mysqli_fetch_row($result)) { // fetch header
        $output.='<th>'.$row[0].'</th>';
    }
    
    // while ($fieldinfo = mysqli_fetch_field($result)) { // fetch header
    //     $output.='<th>'.$fieldinfo->name.'</th>';
    // }

    
    $output.= '</tr></thead><tbody>';
    
    $result = mysqli_query($conn, $sql2);
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
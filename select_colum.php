<?php
   include_once "connectDB.php"; // ใช้ class connectDB
   $con_obj = new connectDB;
   $conn = $con_obj->conntect_database(); //เรียกใช้ method conntect_database
   
   $output = ''; 
    //echo $_POST['query'];
   $result = mysqli_query($conn, $_POST['query']);
   if($result){
       
    $num_field = mysqli_field_count($conn);
    
    while ($fieldinfo = mysqli_fetch_field($result)) { 
        //print_r($fieldinfo);
        $output.='<option>'.$fieldinfo->name.'</option>';
        //echo $output;
    }
    $output.= '<option></option>';
    echo $output;
   } 
  
   mysqli_close($conn);
?>
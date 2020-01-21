<?php
   include '../configDB.php';

   $sql = "SELECT field_name FROM data_dic_ref WHERE tb_ref_name ="."'".$_POST['tb_name']."'"; 
   $result = mysqli_query($DBconnect, $sql);
   $header = array();
   while ($row = mysqli_fetch_row($result)) { // fetch header
      array_push($header,$row[0]);
   }

   echo json_encode($header);
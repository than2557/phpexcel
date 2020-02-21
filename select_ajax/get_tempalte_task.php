<?php

   require_once("configDB.php");

   $conn = $DBconnect;

   $response = array();

   $task_id = $_POST['task_id'];

   $sql = 'SELECT * FROM `template_tb` WHERE `task_user_id` = '.$task_id;

   $query = mysqli_query($conn,$sql);

   $result = array();

   if($query){

      while($row = mysqli_fetch_row($query)){
         $result[] = '<input class="check_row_template" type="checkbox" id="check_row_template" name="check_row_template[]" value="'.$row[2].'" disabled="disabled" readonly >  <span>'.$row[2].'</span><br>';
      }
      
      $response['result'] = $result;
      $response['error'] = false;
      $response['message'] = "success";
   }
   else{
      $response['error'] = true;
      $response['message'] = "ไม่พบข้อมูล";
   }

   echo json_encode($response);
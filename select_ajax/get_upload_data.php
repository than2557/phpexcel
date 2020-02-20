<?php

   function reConstruct_object_data($obj_data,$connectDB,$task_id){

      // Declear blank class
      $new_obj = new stdClass();

      // Array template task
      $template_task = array();

      // SQL 
      $sql = 'SELECT * FROM template_tb WHERE task_user_id = '.$task_id;

      // Query
      $query = mysqli_query($connectDB,$sql);

      // Looping
      while($row = mysqli_fetch_row($query)){
         array_push($template_task,$row[2]);
      }

      foreach($template_task as $task){
         $new_obj->{$task} = $obj_data->{$task};
      }


      return $new_obj;
   }

   require_once("configDB.php");

   $conn = $DBconnect;

   // JSON ที่แปลงเป็น String  และแปลงเป็ฯ Object
   $parse_object_data = json_decode($_POST['data']);

   // ชื่องาน
   $task_id =  $_POST['task_id'];

   // // แปลง object เป็น array
   // $parse_to_array = get_object_vars($parse_object_data);

   // // เก็บ keys (หัวตาราง)
   // $key_obj = array_keys($parse_to_array);

   // // นับจำนวนรายการ
   // $count_row = count($parse_object_data->{$key_obj[0]});

   $new_obj = reConstruct_object_data($parse_object_data,$conn,$task_id);

   echo "<pre>".var_dump($new_obj)."</pre>";
   // for($i = 0 ; $i <= $count_row-1 ; $i++){
   //    for($j = 0 ; $j <= count($key_obj)-1 ; $j++){
   //       echo $parse_object_data->{$key_obj[$j]}[$i];
   //    }
   //    echo "\n";
   // }

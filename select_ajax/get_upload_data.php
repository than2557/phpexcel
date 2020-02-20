<?php

   function validateDate($date, $format = 'd/m/Y'){
      $d = DateTime::createFromFormat($format, $date);
      return $d && $d->format($format) === $date;
   }

   function parse_data_type($data){

      $result_data ;

      if($data != NULL || $data != ''){

            if(is_numeric($data)){
               $result_data = floatval($data);
              
            }
            else if(validateDate($data)){
               $datee = str_replace('/', '-', $data ); // แทนที่เครื่องหมาย "/" ด้วย "-"
               $date2 = date("Y-m-d", strtotime($datee)); // แปลงรูปแบบของวันที่เป็น ปี-เดือน-วัน
               $result_data = '"'.$date2.'"';
            }
            else{
               $result_data = '"'.strval($data).'"';
            }
         
      }
      else{
         if(strval($data) == '0'){
            $result_data = '"'.'0'.'"';
         }
         else{
            $result_data = '"'.strval($data).'"';
         }
      }

      return $result_data;
   }
   function reConstruct_object_data($obj_data,$connectDB,$task_id){

      // Declear blank class
      $new_obj = new stdClass();

      // Declear array template task
      $template_task = array();

      // SQL 
      $sql = 'SELECT * FROM template_tb WHERE task_user_id = '.$task_id;

      // Query
      $query = mysqli_query($connectDB,$sql);

      // Looping
      while($row = mysqli_fetch_row($query)){
         array_push($template_task,$row[2]);
      }

      // Loop reconstruct object (Change fields)
      foreach($template_task as $task){
         $new_obj->{$task} = $obj_data->{$task};
      }

      return $new_obj;
   }

   function uplaod_data($data,$task_name,$connectDB){

      $result ;

      $sql_task_fields = 'SELECT * FROM '.'`'.$task_name.'`';

      $query_task_fields = mysqli_query($connectDB,$sql_task_fields);

      $sql_insert = 'INSERT INTO '.'`'.$task_name.'` (';

      $fields_count = mysqli_num_fields($query_task_fields);

      for($i =1 ; $i <= $fields_count-1; $i++){

         if($fields_count-1 == $i){
            $sql_insert .= ' h'.$i.')';
         }
         else{
            $sql_insert .= ' h'.$i.',';
         }
      }
   
      $sql_insert.= ' VALUES (';

      // แปลง object เป็น array
      $parse_to_array = get_object_vars($data);

      // เก็บ keys (หัวตาราง)
      $key_obj = array_keys($parse_to_array);

      // นับจำนวนรายการ
      $count_row = count($data->{$key_obj[0]});

      for($i = 0 ; $i <= $count_row-1 ; $i++){

         $sql_loop_insert = $sql_insert;
         
         for($j = 0 ; $j <= count($key_obj)-1 ; $j++){

            if($key_obj[$j] == "ลำดับที่"){

               if($j+1 == count($key_obj)){

                  $sql_loop_insert .=' "'.strval($data->{$key_obj[$j]}[$i]).'"';
               }  
               else{
   
                  $sql_loop_insert .=' "'.strval($data->{$key_obj[$j]}[$i]).'" ,';
               }
            }
            else{

               if($j+1 == count($key_obj)){

                  $sql_loop_insert .=' '.parse_data_type($data->{$key_obj[$j]}[$i]);
               }  
               else{
   
                  $sql_loop_insert .=' '.parse_data_type($data->{$key_obj[$j]}[$i]).' ,';
               }
            }

          

         }

         $sql_loop_insert .= ')';

         mysqli_query($connectDB,$sql_loop_insert);
         
         //echo $sql_loop_insert."\n";
      }
   }

   require_once("configDB.php");

   $conn = $DBconnect;

   // JSON ที่แปลงเป็น String  และแปลงเป็ฯ Object
   $parse_object_data = json_decode($_POST['data']);

   // ชื่องาน
   $task_id =  $_POST['task_id'];

   $task_name;


   $sql_task_user  = 'SELECT * FROM task_user WHERE task_user_id = '.$task_id;
   
   $query = mysqli_query($conn,$sql_task_user);

   while($row = mysqli_fetch_row($query)){
      $task_name = $row[2];
   }
   // // แปลง object เป็น array
   // $parse_to_array = get_object_vars($parse_object_data);

   // // เก็บ keys (หัวตาราง)
   // $key_obj = array_keys($parse_to_array);

   // // นับจำนวนรายการ
   // $count_row = count($parse_object_data->{$key_obj[0]});

   $new_obj = reConstruct_object_data($parse_object_data,$conn,$task_id);

   uplaod_data($new_obj,$task_name,$conn);

   //echo $result;  
   //echo "<pre>".var_dump($new_obj)."</pre>";
   // for($i = 0 ; $i <= $count_row-1 ; $i++){
   //    for($j = 0 ; $j <= count($key_obj)-1 ; $j++){
   //       echo $parse_object_data->{$key_obj[$j]}[$i];
   //    }
   //    echo "\n";
   // }

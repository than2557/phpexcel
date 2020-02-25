<?php

   // Check date format
   function validateDate($date, $format = 'd/m/Y'){
      $d = DateTime::createFromFormat($format, $date);
      return $d && $d->format($format) === $date;
   }

   // Check and parse data type
   function parse_data_type($data){

      // Declear result variable
      $result_data ;

      // Check null data
      if($data != NULL || $data != ''){

            // Check numeric data
            if(is_numeric($data)){

               // Parse data to float value
               $result_data = floatval($data);
              
            }
            else if(validateDate($data)){ // Check data is Date format

               // แทนที่เครื่องหมาย "/" ด้วย "-"
               $datee = str_replace('/', '-', $data );

               // แปลงรูปแบบของวันที่เป็น ปี-เดือน-วัน
               $date2 = date("Y-m-d", strtotime($datee)); 

               // Parse data to String 
               $result_data = '"'.$date2.'"';
            }
            else{

               // Parse data to String
               $result_data = '"'.strval($data).'"';
            }
         
      }
      else{

         // Check data is 0 (String format)
         if(strval($data) == '0'){

            // Set result
            $result_data = '"'.'0'.'"';
         }
         else{

            // Parse data to String
            $result_data = '"'.strval($data).'"';
         }
      }

      // Return value
      return $result_data;
   }

   // Restructure object to match Template task 
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

         // Set object is Template task
         $new_obj->{$task} = $obj_data->{$task};
      }

      return $new_obj;
   }

   // Upload data to database
   function uplaod_data($data,$task_name,$connectDB){

      // Declear result variable
      $result ;

      // SQL code
      $sql_task_fields = 'SELECT * FROM '.'`'.$task_name.'`';

      // Query
      $query_task_fields = mysqli_query($connectDB,$sql_task_fields);

      // SQL code
      $sql_insert = 'INSERT INTO '.'`'.$task_name.'` (';

      // Count fields
      $fields_count = mysqli_num_fields($query_task_fields);

      // // Loop fields 
      for($i =1 ; $i <= $fields_count-1; $i++){

         // Check last field
         if($fields_count-1 == $i){
            $sql_insert .= ' h'.$i.')';
         }
         else{
            $sql_insert .= ' h'.$i.',';
         }
      }

   
      // Append SQL code
      $sql_insert.= ' VALUES (';

      // แปลง object เป็น array
      $parse_to_array = get_object_vars($data);

      // เก็บ keys ของ Object
      $key_obj = array_keys($parse_to_array);

      // นับจำนวนรายการ
      $count_row = count($data->{$key_obj[0]});

      // Loop row (Record) 
      for($i = 0 ; $i <= $count_row-1 ; $i++){

         // Set value SQL code
         $sql_loop_insert = $sql_insert;
         
         // Loop key object (Column)
         for($j = 0 ; $j <= count($key_obj)-1 ; $j++){

            // Check column is ลำดับที่
            if($key_obj[$j] == "ลำดับที่"){

               // Check last column
               if($j+1 == count($key_obj)){

                  $sql_loop_insert .=' "'.strval($data->{$key_obj[$j]}[$i]).'"';
               }  
               else{
   
                  $sql_loop_insert .=' "'.strval($data->{$key_obj[$j]}[$i]).'" ,';
               }
            }
            else{

               // Check last column
               if($j+1 == count($key_obj)){

                  // Parse data
                  $sql_loop_insert .=' '.parse_data_type($data->{$key_obj[$j]}[$i]);
               }  
               else{
   
                  $sql_loop_insert .=' '.parse_data_type($data->{$key_obj[$j]}[$i]).' ,';
               }
            }
         }

         // Close SQL code
         $sql_loop_insert .= ')';

         // Query (Insert)
         mysqli_query($connectDB,$sql_loop_insert);
         
         //echo $sql_loop_insert."\n";
      }
   }

   function upload_data_2($data,$task_name,$connectDB){

      // Declear result variable
      $result ;

      // SQL code
      $sql_task_fields = 'SELECT * FROM '.'`'.$task_name.'`';

      // Query
      $query_task_fields = mysqli_query($connectDB,$sql_task_fields);

      $sql_insert = 'INSERT INTO '.'`'.$task_name.'` (';

      // Count fields
      $fields_count = mysqli_num_fields($query_task_fields);

      $i = 1 ;

      while($fields = mysqli_fetch_field($query_task_fields)){

         if($fields->name == 'table_name_id'){
            $i++;
         }
         else{
            if($fields_count == $i){

               $sql_insert .= $fields->name.')';
            }
            else{
               $sql_insert .= $fields->name.',';
            }

            $i++;
         }
         
      }

      // Append SQL code
      $sql_insert.= ' VALUES (';

      // แปลง object เป็น array
      $parse_to_array = get_object_vars($data);

      // เก็บ keys ของ Object
      $key_obj = array_keys($parse_to_array);

      // นับจำนวนรายการ
      $count_row = count($data->{$key_obj[0]});

      // Loop row (Record) 
      for($i = 0 ; $i <= $count_row-1 ; $i++){

         // Set value SQL code
         $sql_loop_insert = '';
         $sql_loop_insert = $sql_insert;
         
         // Loop key object (Column)
         for($j = 0 ; $j <= count($key_obj)-1 ; $j++){

            // Check column is ลำดับที่
            if($key_obj[$j] == "ลำดับที่"){

               // Check last column
               if($j+1 == count($key_obj)){

                  $sql_loop_insert .=' "'.strval($data->{$key_obj[$j]}[$i]).'"';
               }  
               else{
   
                  $sql_loop_insert .=' "'.strval($data->{$key_obj[$j]}[$i]).'" ,';
               }
            }
            else if($key_obj[$j] == "รายการ"){
               // Check last column
               if($j+1 == count($key_obj)){

                  //$sql_loop_insert .=' "'.strval($data->{$key_obj[$j]}[$i]).'"';

                  $numberr = mb_substr($data->{$key_obj[$j]}[$i],0,2,'UTF-8');
                        
                  if(is_numeric($numberr)){
                     $strr = mb_substr($data->{$key_obj[$j]}[$i],2);
                     $data_push = $strr;
               
                     $sql_loop_insert .=' "'.$numberr.'",';
                     $sql_loop_insert .=' "'.$strr.'"';
                  }
                  else{
                     $data_push = $data->{$key_obj[$j]}[$i];
                    
                     $sql_loop_insert .=' "",';
                     $sql_loop_insert .=' "'.$data_push.'"';
                  }

               }  
               else{
                  $numberr = mb_substr($data->{$key_obj[$j]}[$i],0,2,'UTF-8');
                        
                  if(is_numeric($numberr)){
                     $strr = mb_substr($data->{$key_obj[$j]}[$i],2);
                     $data_push = $strr;
               
                     $sql_loop_insert .=' "'.$numberr.'",';
                     $sql_loop_insert .=' "'.$strr.'",';
                  }
                  else{
                     $data_push = $data->{$key_obj[$j]}[$i];
                    
                     $sql_loop_insert .=' "",';
                     $sql_loop_insert .=' "'.$data_push.'",';
                  }

                  //$sql_loop_insert .=' "'.strval($data->{$key_obj[$j]}[$i]).'" ,';
               }
            }
            else{

               // Check last column
               if($j+1 == count($key_obj)){

                  // Parse data
                  $sql_loop_insert .=' '.parse_data_type($data->{$key_obj[$j]}[$i]);
               }  
               else{
   
                  $sql_loop_insert .=' '.parse_data_type($data->{$key_obj[$j]}[$i]).' ,';
               }
            }
         }

         // Close SQL code
         $sql_loop_insert .= ')';

         // Query (Insert)
         mysqli_query($connectDB,$sql_loop_insert);
      }
   }

   // Call configDB.php 
   require_once("configDB.php");

   // Set variable (Connect database)
   $conn = $DBconnect;

   // JSON ที่แปลงเป็น String  และแปลงเป็ฯ Object
   $parse_object_data = json_decode($_POST['data']);

   // ชื่องาน
   $task_id =  $_POST['task_id'];

   $task_name;

   $sql_task_user  = 'SELECT * FROM task_user WHERE task_user_id = '.$task_id;
   
   $query = mysqli_query($conn,$sql_task_user);

   // Loop get task name
   while($row = mysqli_fetch_row($query)){
      $task_name = $row[2];
   }
  
   // Restructure object 
   $new_obj = reConstruct_object_data($parse_object_data,$conn,$task_id);

   // Upload data
   upload_data_2($new_obj,$task_name,$conn);

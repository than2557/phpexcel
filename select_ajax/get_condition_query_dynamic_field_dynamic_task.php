<?php
   // return main sql condition
   function generate_main_sql_condition($conditions,$fields_json){

      $sql = '';

      // ตรวจสอบเงื่อนไขแรก จะไม่มี AND และ OR
      if(empty($conditions['oplist'])){

         $sql.= ' ';
      }
      else{
         $sql.= ' '.$conditions['oplist'];
      }  

      if($conditions['fieldlist'] == 'รายการ'){

         $array_key = array_keys($fields_json, "รายการ");
         
         $field_header = $array_key[0]+1;

         if($conditions['value_type'] == 'con_value'){

            if(is_numeric($conditions['valuelist'])){
               $sql.= ' ( h'.$field_header.'_1';
            }
            else{
               $sql.= ' ( h'.$field_header.'_2';
            }
         
         }
         else{
            $sql.= ' ( h'.$field_header.'_1';
         }

         //$sql.= ' ( h'.$field_header.'_1';
              
      }
      else{
         $array_key = array_keys($fields_json, $conditions['fieldlist']);

         $field_header = $array_key[0]+1;

         $sql.= ' ( h'.$field_header;
      }

      // ต่อข้อความ
      $sql.= ' '.$conditions['condition_opv'];

      // ตรวจสอบ ชนิดของค่าเงื่อนไข ถ้าเป็น ตัวเลขหรือตัวอักษร
      if($conditions['value_type'] == 'con_value'){

         // ถ้าค่าเป็นตัวเลข
         if(is_numeric($conditions['valuelist'])){
            $sql.= ' '.$conditions['valuelist'];
         }
         else{
            $sql.= ' '.'"'.$conditions['valuelist'].'"';
         }
      }
      else{

         // ถ้าค่าของเงื่อนไขเป็นฟีลด์ และมีค่าเป็น h2
         if($conditions['valuelist'] == 'รายการ'){

            $array_key = array_keys($fields_json, "รายการ");
            
            $field_header = $array_key[0]+1;

            $sql.= ' h'.$field_header.'_1';
         }
         else{
            $array_key = array_keys($fields_json, $conditions['valuelist']);

            $field_header = $array_key[0]+1;

            $sql.= ' h'.$field_header;
         }

      }

      if($conditions['fieldlist'] == 'รายการ'){

         $array_key = array_keys($fields_json, "รายการ");
         
         $field_header = $array_key[0]+1;

         if($conditions['value_type'] == 'con_value'){

            if(is_numeric($conditions['valuelist'])){
               $sql.= ' AND h'.$field_header.'_1 != "" )';
            }
            else{
               $sql.= ' )';
            }
         
         }
         else{
            $sql.= ' AND h'.$field_header.'_1 != "" )';
         }

      }
      else{
         $sql.= ' )';
      }

      return $sql;
   }

   // return sub sql condition
   function generate_sub_sql_condition($conditions,$fields_json){

      // ตัวเชื่อมระหว่างเงื่อนไขหลักกับเงื่อนไขรอง
      $sql = ' '.$conditions['conjection_condition'];

      $sql .= ' (';
      
      // วนลูปตามจำนวนของเงื่อนไขย่อย
      foreach($conditions['sub_con'] as $sub_con){

         if(empty($sub_con['sub_op_list'])){
            $sql.= '';
         }
         else{
            $sql.= ' '.$sub_con['sub_op_list'];
         }  

         if($sub_con['sub_field_list'] == 'รายการ'){

            $array_key = array_keys($fields_json, "รายการ");
             
            $field_header = $array_key[0]+1;
   
            if($sub_con['sub_condition_value_type'] == 'con_value'){

               if(is_numeric($sub_con['sub_value_list'])){
                  $sql.= ' ( h'.$field_header.'_1';
               }
               else{
                  $sql.= ' ( h'.$field_header.'_2';
               }
                 
            }
            else{
               $sql.= ' ( h'.$field_header.'_1';
            }
   
            //$sql.= ' ( h'.$field_header.'_1';
          }
          else{
            $array_key = array_keys($fields_json, $sub_con['sub_field_list']);
   
            $field_header = $array_key[0]+1;
      
            $sql.= ' ( h'.$field_header;
          }
    
         $sql.= ' '.$sub_con['sub_condition_opv'];
    
         if($sub_con['sub_condition_value_type'] == 'con_value'){
    
            if(is_numeric($sub_con['sub_value_list'])){
               $sql.= ' '.$sub_con['sub_value_list'];
            }
            else{
               $sql.= ' '.'"'.$sub_con['sub_value_list'].'"';
            }
         }
         else{
 
            if($sub_con['sub_value_list'] == 'รายการ'){

               $array_key = array_keys($fields_json, "รายการ");
             
               $field_header = $array_key[0]+1;
   
               $sql.= ' h'.$field_header.'_1';
             }
            else{

               $array_key = array_keys($fields_json, $sub_con['sub_value_list']);
   
               $field_header = $array_key[0]+1;
      
               $sql.= ' h'.$field_header;
            }
         }

         if($sub_con['sub_field_list'] == 'รายการ'){

            $array_key = array_keys($fields_json, "รายการ");
             
            $field_header = $array_key[0]+1;
    
            if($sub_con['sub_condition_value_type'] == 'con_value'){

               if(is_numeric($sub_con['sub_value_list'])){

                  $sql.= ' AND h'.$field_header.'_1 != "" )';
               }
               else{
                  $sql.= ' )';
               }
              
            }
            else{
               $sql.= ' AND h'.$field_header.'_1 != "" )';
            }

            //$sql.= ' AND h'.$field_header.'_1 != "" )';
         }
         else{
            $sql.= ' )';
         }
      }
      
      $sql.= ' )';

      return $sql;
   }

   function generate_fields_WBS($fields_json){

      $sql = '';

      $array_key = array_keys($fields_json,"WBS");
      
      $field_header = $array_key[0]+1;

      $sql = 'count(*) as count,substr(h'.$field_header.',8,3) as WBS';
     
      return $sql;
   }

   function generate_fields($fields_json){

      $sql = ' table_name_id ,';
      
      $count_fields = count($fields_json);

      $i = 0;

      foreach($fields_json as $field){

         $field_header = '';

         if($count_fields-1 == $i){ // last field

            if($field == "รายการ"){

               $array_key = array_keys($fields_json,"รายการ");
         
               $field_header = $array_key[0]+1;

               $if_sql = ' h'.$field_header.'_1 ,';

               $if_sql .= 'h'.$field_header.'_2';
            }
            else{
               $array_key = array_keys($fields_json,$field);
         
               $field_header = $array_key[0]+1;

               $if_sql = ' h'.$field_header;
            }
   
            $sql .= $if_sql;
         }
         else{

            if($field == "รายการ"){

               $array_key = array_keys($fields_json,"รายการ");
         
               $field_header = $array_key[0]+1;

               $if_sql = ' h'.$field_header.'_1 ,';

               $if_sql .= ' h'.$field_header.'_2';
            }
            else{
               $array_key = array_keys($fields_json,$field);
         
               $field_header = $array_key[0]+1;

               $if_sql = ' h'.$field_header;
            }
   
            $sql .= $if_sql.' ,';
         }

      
         $i++;
      }
      

      return $sql;
   }

   //$sql.= ' GROUP BY substr(h3,8,3) ORDER BY `h3`  ASC';
 
   function generate_last_sql($fields_json){

      $sql = '';
      
      foreach($fields_json as $field){

         $field_header = '';

         if($field == "WBS"){

            $array_key = array_keys($fields_json,"WBS");
      
            $field_header = $array_key[0]+1;

            $sql = ' GROUP BY substr(h'.$field_header.',8,3) ORDER BY `h'.$field_header.'`  ASC';
         }

      }
   
      return $sql;
   }

   function generate_where_condition_WBS_fields($fields_json){

      $sql = '';
      // รับข้อมูล JSON ข้อมูลจำนวนเงื่อนไขของเงื่อนไขย่อย
      $sub_row_data_count = json_decode($_POST['sub_row_data_count']);
    
      $loop_count_main_con = 0; // ตัวแปรลูปของเงื่อนไขหลัก
      $loop_count_sub_con = 0; // ตัวแปรลูปของเงื่อนไขย่อย
      $loop_count_all_con = 0; // ตัวแปรลูปของเงื่อนไขทั้งหมด main/sub
      $loop_conjection_condition_count = 0 ; // ตัวแปรลูปของตัวเชื่อมเงื่อนไขย่อย
    
      $sql .= ' WHERE'; 
    
      $array_main_con = array(); // ประกาศตัวแปร array
      $array_sub_con = array(); // ประกาศตัวแปร array
    
      // ลูปเงื่อนไขทั้งหมด
      foreach($_POST['condition_type_row'] as $condition_type){
         
         // ถ้าเป็นเงื่อนไขหลัก
         if($condition_type == "main_con"){
   
            // เก็บค่าเงื่อนไข ชนิด array
            $loop_array_main = array(
               'oplist' =>$_POST['main_oplist'][$loop_count_main_con], 
               'fieldlist' =>$_POST['main_fieldlist'][$loop_count_main_con],
               'condition_opv' =>$_POST['main_condition_opv'][$loop_count_main_con],
               'valuelist' => $_POST['main_condition_value_input'][$loop_count_main_con],
               'value_type' => $_POST['main_condition_value_type'][$loop_count_main_con]
            );
         
            $loop_count_main_con++;
            $loop_count_all_con++;
   
            // ต่อข้อความด้วยเรียกใช้ฟังก์ชั่น
            $sql .= generate_main_sql_condition($loop_array_main,$fields_json);
   
         }
         else if($condition_type == "main_row_sub_con"){
          
            $loop_array_sub = array();
            $loop_array_sub2 = array();
      
            $loop_count_all_con++;
   
            $number_of_sub_condition = $sub_row_data_count->{"sub_con".$loop_count_all_con};
   
            $loop_array_sub['conjection_condition'] = $_POST['sub_con_optlist'][$loop_conjection_condition_count];
   
            for( $i =1 ; $i <= $number_of_sub_condition ; $i++){
   
               $sub_con = array(
                  'sub_op_list' =>$_POST['sub_oplist'][$loop_count_sub_con], 
                  'sub_field_list' =>$_POST['sub_fieldlist'][$loop_count_sub_con],
                  'sub_condition_opv' =>$_POST['sub_condition_opv'][$loop_count_sub_con],
                  'sub_value_list' => $_POST['sub_condition_value_input'][$loop_count_sub_con],
                  'sub_condition_value_type' => $_POST['sub_condition_value_type'][$loop_count_sub_con]
               );
   
               $loop_count_sub_con++;
   
               array_push($loop_array_sub2,$sub_con);
            }
   
            $loop_conjection_condition_count++;
   
            $loop_array_sub['sub_con'] = $loop_array_sub2;
          
            $sql.= generate_sub_sql_condition($loop_array_sub,$fields_json);
         }
      }
      return $sql;
   }

   require('configDB.php'); // เรียกไฟล์ configDB.php

   $conn = $DBconnect; // ตัวแปรเชื่อมต่อฐานข้อมูล
 
   $table = $_POST['table_nameeeeeeeee']; // ตัวแปรชื่อตาราง
 
   $response = array(); // ตัวแปร response ชนิด array
 
   $fields_json = json_decode($_POST['fields_count']);

   $sql = '';

   $sql_where = '';

   if(in_array("WBS",$fields_json)){ // ตรวจถ้ามีฟีลด์ชื่อว่า WBS 

      $sql .= 'SELECT '.generate_fields_WBS($fields_json) . ' FROM '.'`'.$table.'`';

      if(!empty($_POST['condition_type_row'])){
            
         $sql_where = generate_where_condition_WBS_fields($fields_json);

         $sql_last_sql = generate_last_sql($fields_json);

         $sql_get_WBS = $sql.$sql_where.$sql_last_sql;

         $result = mysqli_query($conn,$sql_get_WBS);

         $query_data = new stdClass();

         $array_key = array_keys($fields_json,"WBS");
      
         $field_header = $array_key[0]+1;

         if($result){

            $rowcount=mysqli_num_rows($result);

            if($rowcount > 0){
               while($row = mysqli_fetch_row($result)){
               
                  $sql_loop = 'SELECT '.generate_fields($fields_json). ' FROM '.'`'.$table.'`'.$sql_where.' AND substr(h'.$field_header.',8,3) = "'.$row[1].'"';
   
                  $result2 = mysqli_query($conn,$sql_loop);
                  
                  $query_data->{$row[1]} = array();
   
                  while($row2 = mysqli_fetch_row($result2)){
   
                     $i = 0 ;
   
                     $row_data = new stdClass();
      
                     $row_data->{'primary_key'} = $row2[$i];
      
                     foreach($fields_json as $field){
   
                        $i++;
   
                        if($field == "รายการ"){
   
                           $row_data->{$field} = $row2[$i].$row2[$i+1];
   
                           $i++;
                        }
                        else{
                           $row_data->{$field} = $row2[$i];
                        }
      
                     }
                     array_push($query_data->{$row[1]},$row_data);
   
                  }  
                  $response['inner_loop_sql'] = $sql_loop;
               }  
               
               $response['query_data'] = $query_data;
            }
            else{
               $response['query_data'] = false;
            }
         }
         else{
            $response['query_data'] = false;
         }

        // $response['outer_loop_sql'] = $sql_get_WBS;

         /*
          เก็บ WBS ไว้ในตัวแปร global
          foreach $WBS และ query WBS แต่ละอันว่ามีงานอะไรบ้างที่ตรง โดยอิงเงื่อนไขตามที่ User กำหนดมาจาก form
          และ เก็บข้อมูลอยูาในรูปแบบ JSON Oject
         "WBS" => "AYY"{
                        0:{dsd:zxc,dasds:12323},
                        1:{dsd:zxc,dasds:12323},
                        1:{dsd:zxc,dasds:12323}
                     }, 
                     "KNN"{
                        ,,
                     }
         
         ถ้างานไหนไม่มี WBS ให้ WBS = false
          */
      }
      else{

         $sql_get_WBS = $sql.generate_last_sql($fields_json);

         $result = mysqli_query($conn,$sql_get_WBS);

         $query_data = new stdClass();

         $array_key = array_keys($fields_json,"WBS");
      
         $field_header = $array_key[0]+1;

         if($result){

            $rowcount=mysqli_num_rows($result);

            if($rowcount > 0){

               while($row = mysqli_fetch_row($result)){
               
                  $sql_loop = 'SELECT '.generate_fields($fields_json). ' FROM '.'`'.$table.'` WHERE substr(h'.$field_header.',8,3) = "'.$row[1].'"';
   
                  $result2 = mysqli_query($conn,$sql_loop);
                  
                  $query_data->{$row[1]} = array();
   
                  while($row2 = mysqli_fetch_row($result2)){
   
                     $i = 0 ;
   
                     $row_data = new stdClass();
      
                     $row_data->{'primary_key'} = $row2[$i];
      
                     foreach($fields_json as $field){
   
                        $i++;
   
                        if($field == "รายการ"){
   
                           $row_data->{$field} = $row2[$i].$row2[$i+1];
   
                           $i++;
                        }
                        else{
                           $row_data->{$field} = $row2[$i];
                        }
      
                        
                     }
                     array_push($query_data->{$row[1]},$row_data);
   
                  }
   
                  $response['inner_loop_sql'] = $sql_loop;
               }
   
               $response['query_data'] = $query_data;
            }
            else{
               $response['query_data'] = false;
            }

         }
         else{
            $response['query_data'] = false;
         }
        
      }

      $sql.= $sql_where;
      
      $response['task_type'] = "WBS_task";
   }
   else{

      $sql .= 'SELECT '.generate_fields($fields_json) . ' FROM '.'`'.$table.'`';

      if(!empty($_POST['condition_type_row'])){

         // รับข้อมูล JSON ข้อมูลจำนวนเงื่อนไขของเงื่อนไขย่อย
         $sub_row_data_count = json_decode($_POST['sub_row_data_count']);
       
         $loop_count_main_con = 0; // ตัวแปรลูปของเงื่อนไขหลัก
         $loop_count_sub_con = 0; // ตัวแปรลูปของเงื่อนไขย่อย
         $loop_count_all_con = 0; // ตัวแปรลูปของเงื่อนไขทั้งหมด main/sub
         $loop_conjection_condition_count = 0 ; // ตัวแปรลูปของตัวเชื่อมเงื่อนไขย่อย
       
         $sql .= ' WHERE'; 
       
         $array_main_con = array(); // ประกาศตัวแปร array
         $array_sub_con = array(); // ประกาศตัวแปร array
       
         // ลูปเงื่อนไขทั้งหมด
         foreach($_POST['condition_type_row'] as $condition_type){
            
            // ถ้าเป็นเงื่อนไขหลัก
            if($condition_type == "main_con"){
      
               // เก็บค่าเงื่อนไข ชนิด array
               $loop_array_main = array(
                  'oplist' =>$_POST['main_oplist'][$loop_count_main_con], 
                  'fieldlist' =>$_POST['main_fieldlist'][$loop_count_main_con],
                  'condition_opv' =>$_POST['main_condition_opv'][$loop_count_main_con],
                  'valuelist' => $_POST['main_condition_value_input'][$loop_count_main_con],
                  'value_type' => $_POST['main_condition_value_type'][$loop_count_main_con]
               );
            
               $loop_count_main_con++;
               $loop_count_all_con++;
      
               // ต่อข้อความด้วยเรียกใช้ฟังก์ชั่น
               $sql .= generate_main_sql_condition($loop_array_main,$fields_json);
      
            }
            else if($condition_type == "main_row_sub_con"){
             
               $loop_array_sub = array();
               $loop_array_sub2 = array();
         
               $loop_count_all_con++;
      
               $number_of_sub_condition = $sub_row_data_count->{"sub_con".$loop_count_all_con};
      
               $loop_array_sub['conjection_condition'] = $_POST['sub_con_optlist'][$loop_conjection_condition_count];
      
               for( $i =1 ; $i <= $number_of_sub_condition ; $i++){
      
                  $sub_con = array(
                     'sub_op_list' =>$_POST['sub_oplist'][$loop_count_sub_con], 
                     'sub_field_list' =>$_POST['sub_fieldlist'][$loop_count_sub_con],
                     'sub_condition_opv' =>$_POST['sub_condition_opv'][$loop_count_sub_con],
                     'sub_value_list' => $_POST['sub_condition_value_input'][$loop_count_sub_con],
                     'sub_condition_value_type' => $_POST['sub_condition_value_type'][$loop_count_sub_con]
                  );
      
                  $loop_count_sub_con++;
      
                  array_push($loop_array_sub2,$sub_con);
               }
      
               $loop_conjection_condition_count++;
      
               $loop_array_sub['sub_con'] = $loop_array_sub2;
             
               $sql.= generate_sub_sql_condition($loop_array_sub,$fields_json);
            }
         }

         $result = mysqli_query($conn,$sql);

         $query_data = array();
   
         if($result){
   
            $rowcount=mysqli_num_rows($result);

            if($rowcount > 0){

               while($row = mysqli_fetch_row($result)){
   
                  $i = 0 ;
      
                  $row_data = new stdClass();
      
                  $row_data->{'primary_key'} = $row[$i];
      
                  foreach($fields_json as $field){
   
                     $i++;
   
                     $row_data->{$field} = $row[$i];
      
                  }
      
                  array_push($query_data,$row_data);
      
               }
      
               $response['query_data'] = $query_data;
            }
            else{
               $response['query_data'] = false;
            }

         }
         else{
            $response['query_data'] = false;
         }
      }
      else{
         $result = mysqli_query($conn,$sql);

         $query_data = array();
   
         if($result){
   
            $rowcount=mysqli_num_rows($result);

            if($rowcount > 0){

               while($row = mysqli_fetch_row($result)){
   
                  $i = 0 ;
      
                  $row_data = new stdClass();
      
                  $row_data->{'primary_key'} = $row[$i];
      
                  foreach($fields_json as $field){
   
                     $i++;
   
                     $row_data->{$field} = $row[$i];
   
                  }
      
                  array_push($query_data,$row_data);
                  
               }
      
               $response['query_data'] = $query_data;
            }
            else{
               $response['query_data'] = false;
            }

         }
         else{
   
            $response['query_data'] = false;
   
         }
      }
      
      $response['task_type'] = "other_task";
   }

   if(in_array("WBS",$fields_json)){
      $sql.= generate_last_sql($fields_json);
   }

   $response['sql'] = $sql;

   $response['HTTP_post'] = $_POST;

   echo json_encode($response);
?>
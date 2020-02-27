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


   // query data
   function query_data($sql,$conn,$fields){

      $row_data = array();
      $row_raw_data = array();
      $query_data = array();

      $result = mysqli_query($conn,$sql);

      if($result){

         $rowcount = mysqli_num_rows($result);

         if($rowcount > 0){

            while($row = mysqli_fetch_row($result)){

               $data = new stdClass();

               $raw_data = new stdClass();

               $raw_data->{'primary_key'} = $row[0];

               foreach($fields as $field){

                  $keys = array_keys($fields, $field);

                  if($field == "รายการ"){

                     $data->{$field} = $row[intval($keys[0])+1]."".$row[intval($keys[0])+2];

                     $raw_data->{$field} = $row[intval($keys[0])+1]."".$row[intval($keys[0])+2];
                  }
                  else{

                     $data->{$field} = $row[intval($keys[0])+1];

                     $raw_data->{$field} = $row[intval($keys[0])+1];
                  }
                 

                 
               }
               
               // $data['ลำดับที่'] = $row[1];
               // $data['รายการ'] = $row[2]."".$row[3];
               // $data['WBS'] = $row[4];
               // $data['วงเงินงบประมาณปัจจุบัน'] = $row[5];
               // $data['รวมจ่ายจริงถึงสิ้นปีก่อนหน้า'] = $row[6];
               // $data['รวมจ่ายจริงปีปัจจุบัน'] = $row[7];
               // $data['รวมจ่ายจริง'] = $row[8];
               // $data['เงินล่วงหน้าปีก่อนหน้า'] = $row[9];
               // $data['เงินประกันปีก่อนหน้า'] = $row[10];
               // $data['เงินล่วงหน้าปีปัจจุบัน'] = $row[11];
               // $data['เงินประกันปีปัจจุบัน'] = $row[12];
               // $data['เงินล่วงหน้าคงเหลือ'] = $row[13];
               // $data['เงินประกันค้างจ่าย'] = $row[14];
               // $data['รวมจ่ายทั้งสิ้นปีก่อนหน้า'] = $row[15];
               // $data['รวมจ่ายทั้งสิ้นปีปัจจุบัน'] = $row[16];
               // $data['รวมจ่ายทั้งสิ้น'] = $row[17];
               // $data['งบประมาณหักรวมจ่ายทั้งสั้น'] = $row[18];
               // $data['PO_หัก_รวมจ่ายจริง_PO'] = $row[19];
               // $data['งบประมาณหักรวมจ่ายจริง'] = $row[20];
               // $data['IR_คงเหลือ'] = $row[21];
               // $data['GR_คงเหลือ'] = $row[22];
               // $data['PO_คงเหลือ'] = $row[23];
               // $data['PR_คงเหลือ'] = $row[24];
               // $data['วงเงินคงเหลือยังไม่ดำเนินการ'] = $row[25];
               // $data['สถานะ'] = $row[26];
               // $data['วันที่สร้าง'] = $row[27];
               // $row_data[] = $data;
               // $data['primary_key'] = $row[0];

               $row_raw_data[] = $raw_data;
               $row_data[] = $data;
            }

            $query_data['result_data'] = $row_data;

            $query_data['raw_data'] = $row_raw_data;

            return $query_data;
         }
         else{
            return false;
         }
      }
      else{
         return false;
      }
   }

   require('configDB.php'); // เรียกไฟล์ configDB.php

   $conn = $DBconnect; // ตัวแปรเชื่อมต่อฐานข้อมูล

   $table = $_POST['table_nameeeeeeeee']; // ตัวแปรชื่อตาราง

   $response = array(); // ตัวแปร response ชนิด array
   
   $sql = ''; // ตัวแปร sql ว่าง

   $fields_json = json_decode($_POST['fields_count']);

   if(!empty($_POST['condition_type_row'])){
     
      // รับข้อมูล JSON ข้อมูลจำนวนเงื่อนไขของเงื่อนไขย่อย
      $sub_row_data_count = json_decode($_POST['sub_row_data_count']);
 
      $loop_count_main_con = 0; // ตัวแปรลูปของเงื่อนไขหลัก
      $loop_count_sub_con = 0; // ตัวแปรลูปของเงื่อนไขย่อย
      $loop_count_all_con = 0; // ตัวแปรลูปของเงื่อนไขทั้งหมด main/sub
      $loop_conjection_condition_count = 0 ; // ตัวแปรลูปของตัวเชื่อมเงื่อนไขย่อย
 
      $sql .= 'SELECT * FROM '.'`'.$table.'`'.' WHERE'; 
 
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
      
	   $response['query_data'] = query_data($sql,$conn,$fields_json);
	   $response['json_count'] = $fields_json;
      $response['HTTP_post_data'] = $_POST;
      $response['result_sql'] = $sql;
      $response['message'] = "success";
      $response['error'] = false;
   }
   else{
    
      $sql = 'SELECT * FROM '.'`'.$table.'`';

      $response['query_data'] = query_data($sql,$conn,$fields_json);
      $response['HTTP_post_data'] = $_POST;
      $response['result_sql'] = $sql;
      $response['message'] = "success";
      $response['error'] = false;

   }
 
   echo json_encode($response);
?>
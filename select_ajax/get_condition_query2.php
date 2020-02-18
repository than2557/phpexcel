<?php

   // SELECT DISTINCT(SUBSTR(h3,8,3)) as WBS FROM `tb_test2`

// return main sql condition
function generate_main_sql_condition($conditions){
   $sql = '';

   // ตรวจสอบเงื่อนไขแรก จะไม่มี AND และ OR
   if(empty($conditions['oplist'])){
     $sql.= ' ';
   }
   else{
      $sql.= ' '.$conditions['oplist'];
   }  

   // ตรวจสอบถ้าเลือกฟีลด์ h2 ให้เลือก attributes h2_1
   if($conditions['fieldlist'] == 'h2'){
      $sql.= ' h2_1';
   }
   else{
      $sql.= ' '.$conditions['fieldlist'];
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
      if($conditions['valuelist'] == 'h2'){
         $sql.= ' h2_1';
      }
      else{
         $sql.= ' '.$conditions['valuelist'];
      }
   }
   return $sql;
}

// return sub sql condition
function generate_sub_sql_condition($conditions){

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
 
       if($sub_con['sub_field_list'] == 'h2'){
          $sql.= ' h2_1';
       }
       else{
          $sql.= ' '.$sub_con['sub_field_list'];
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
          if($sub_con['sub_value_list'] == 'h2'){
             $sql.= ' h2_1';
          }
          else{
             $sql.= ' '.$sub_con['sub_value_list'];
          }
       }
   }
   
   $sql.= ' )';

   return $sql;
}

// query data
function query_data($sql,$conn){

   $row_data = array();
   $row_raw_data = array();
   $query_data = array();

   $result = mysqli_query($conn,$sql);

   if($result){

      $rowcount=mysqli_num_rows($result);

      $data = array();

      if($rowcount > 0){

         while($row = mysqli_fetch_row($result)){

            $data = array();
      
            $data['ลำดับที่'] = $row[1];
      
            // if($row[2] != 0){
            //    $data['รายการ'] = "0".$row[2]."".$row[3];
            // }
            // else{
            //    $data['รายการ'] = $row[3];
            // }

            $data['รายการ'] = $row[2]."".$row[3];
            
            $data['WBS'] = $row[4];
            $data['วงเงินงบประมาณปัจจุบัน'] = $row[5];
            $data['รวมจ่ายจริงถึงสิ้นปีก่อนหน้า'] = $row[6];
            $data['รวมจ่ายจริงปีปัจจุบัน'] = $row[7];
            $data['รวมจ่ายจริง'] = $row[8];
            $data['เงินล่วงหน้าปีก่อนหน้า'] = $row[9];
            $data['เงินประกันปีก่อนหน้า'] = $row[10];
            $data['เงินล่วงหน้าปีปัจจุบัน'] = $row[11];
            $data['เงินประกันปีปัจจุบัน'] = $row[12];
            $data['เงินล่วงหน้าคงเหลือ'] = $row[13];
            $data['เงินประกันค้างจ่าย'] = $row[14];
            $data['รวมจ่ายทั้งสิ้นปีก่อนหน้า'] = $row[15];
            $data['รวมจ่ายทั้งสิ้นปีปัจจุบัน'] = $row[16];
            $data['รวมจ่ายทั้งสิ้น'] = $row[17];
            $data['งบประมาณหักรวมจ่ายทั้งสั้น'] = $row[18];
            $data['PO_หัก_รวมจ่ายจริง_PO'] = $row[19];
            $data['งบประมาณหักรวมจ่ายจริง'] = $row[20];
            $data['IR_คงเหลือ'] = $row[21];
            $data['GR_คงเหลือ'] = $row[22];
            $data['PO_คงเหลือ'] = $row[23];
            $data['PR_คงเหลือ'] = $row[24];
            $data['วงเงินคงเหลือยังไม่ดำเนินการ'] = $row[25];
            $data['สถานะ'] = $row[26];
            $data['วันที่สร้าง'] = $row[27];

            $row_data[] = $data;
      
            $data['primary_key'] = $row[0];

            $row_raw_data[] = $data;
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

   if(!empty($_POST['condition_type_row'])){

      // รับข้อมูล JSON ข้อมูลจำนวนเงื่อนไขของเงื่อนไขย่อย
      $sub_row_data_count = json_decode($_POST['sub_row_data_count']);
 
      $loop_count_main_con = 0; // ตัวแปรลูปของเงื่อนไขหลัก
      $loop_count_sub_con = 0; // ตัวแปรลูปของเงื่อนไขย่อย
      $loop_count_all_con = 0; // ตัวแปรลูปของเงื่อนไขทั้งหมด main/sub
      $loop_conjection_condition_count = 0 ; // ตัวแปรลูปของตัวเชื่อมเงื่อนไขย่อย
 
      $sql .= 'SELECT * FROM '.$table.' WHERE'; 
 
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
            $sql .= generate_main_sql_condition($loop_array_main);

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
          
            $sql.= generate_sub_sql_condition($loop_array_sub);
         }
      }
      
      //$response['query_data'] = query_data($sql,$conn);
      //$response['HTTP_post_data'] = $_POST;
      $response['result_sql'] = $sql;
      $response['message'] = "success";
      $response['error'] = false;
   }
   else{

      $sql = 'SELECT * FROM '.$table.' WHERE 1=1';

      //$response['query_data'] = query_data($sql,$conn);
     // $response['HTTP_post_data'] = $_POST;
      $response['result_sql'] = $sql;
      $response['message'] = "success";
      $response['error'] = false;

      // $response['result_sql'] = $sql;
      // $response['message'] = "ไม่พบข้อมูล";
      // $response['error'] = true;
   }

   if(!empty($_POST['row_id'])){

      $sql .= ' AND table_name_id IN (';
      
      $record_count = count($_POST['row_id']);
      $i = 0 ;

      foreach($_POST['row_id'] as $row_id){

         if ($i == $record_count - 1) {  // ตรวจสอบถ้าเป็นข้อมูลรายการสุดท้าย   ///  column แรก fixed เป็นลำดับที่  ///
          
            $sql .= ' '.$row_id;
         }
         else{
           $sql .= ' '.$row_id.' ,'; 
         }

         $i++;
      }

      $sql .=')';
     
      //$response['query_data'] = query_data($sql,$conn);
      //$response['HTTP_post_data'] = $_POST;
      $response['result_sql'] = $sql;
      $response['message'] = "success";
      $response['error'] = false;
   }  

   echo json_encode($response);
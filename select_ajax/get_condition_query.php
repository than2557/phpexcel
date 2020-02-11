<?php
require('configDB.php');
$conn = $DBconnect;
$table = $_POST['table_nameeeeeeeee'];
$response = array();
$row_data = array();
$row_raw_data = array();
// $condition_data  = array();
$sql = '';

// sql select count 3 condition
//$sql = 'SELECT DISTINCT(SELECT COUNT(*) as count1 FROM tb_test2 WHERE h16 = 0),( SELECT COUNT(*) as count2 FROM tb_test2 WHERE h16 > 0 AND h16 = h4) ,(SELECT COUNT(*) as count2 FROM tb_test2 WHERE h16 > 0 AND h16 < h4) FROM tb_test2 ORDER BY table_name_id';
// $condition_loop_data = array();

// check empty input 
if( (!empty($_POST['fieldlist'] ) && !empty($_POST['condition_opv'] ) && !empty($_POST['condition_value_input']) && !empty($_POST['condition_value_type'])) || !empty($_POST['oplist'])  ){

   // count number of condition
   $count_condition = count($_POST['fieldlist']);

   $sql .= 'SELECT * FROM '.$table.' WHERE ';

   // loop for count condition
   for($i = 0 ; $i<= $count_condition-1 ; $i++){

      //  ถ้าเป็นเงื่อนไงแรก ให้ คำสั่งไม่มี AND/OR 
      if($i == 0){

         // ถ้าค่าของเงื่อนไขเป็น ตัวเลขหรือตัวอักษร
         if($_POST['condition_value_type'][$i] == 'con_value'){


            // ถ้าค่า เป็นตัวเลข
            if(is_numeric($_POST['condition_value_input'][$i])){

               // ถ้าเลือกฟีลด์ "รายการ"
               if($_POST['fieldlist'][$i] == 'h2'){
                  $sql.= 'h2_1 '.$_POST['condition_opv'][$i].' '.$_POST['condition_value_input'][$i];
               } 
               else{ // ถ้าเลือกฟีลด์อื่นๆ
                  $sql.= $_POST['fieldlist'][$i].' '.$_POST['condition_opv'][$i].' '.$_POST['condition_value_input'][$i];
               }
               
            }
            else{   // ถ้าค่าไม่ใช่ตัวเลข

               // ถ้าเลือกฟีลด์ "รายการ"
               if($_POST['fieldlist'][$i] == 'h2'){
                  $sql.= 'h2_1 '.$_POST['condition_opv'][$i].' '.'"'.$_POST['condition_value_input'][$i].'"';
               }
               else{ // ถ้าเลือกฟีลด์อื่นๆ
                  $sql.= $_POST['fieldlist'][$i].' '.$_POST['condition_opv'][$i].' '.'"'.$_POST['condition_value_input'][$i].'"';
               }    
            }
         }
         else{ // ถ้าค่าของเงื่อนไขเป็นฟีลด์

            // ถ้าเลือกฟีลด์ "รายการ"
            if($_POST['fieldlist'][$i] == 'h2'){
               $sql.= 'h2_1 '.$_POST['condition_opv'][$i];
            }
            else{ // ถ้าเลือกฟีลด์อื่นๆ
               $sql.= $_POST['fieldlist'][$i].' '.$_POST['condition_opv'][$i];
            }

             // ถ้าค่าของเงื่อนไขเป็นฟีลด์ และ เท่ากับ "h2"
            if($_POST['condition_value_input'][$i] == 'h2'){
               $sql.= ' h2_1';
            }
            else{ // ถ้าเลือกฟีลด์อื่นๆ
               $sql.=' '.$_POST['condition_value_input'][$i];
            }
         }
      }
      else{ // เงื่อนไขถัดไป

         // ถ้าค่าของเงื่อนไขเป็น ตัวเลขหรือตัวอักษร 
         if($_POST['condition_value_type'][$i] == 'con_value'){

             // ถ้าค่า เป็นตัวเลข
            if(is_numeric($_POST['condition_value_input'][$i])){

                // ถ้าเลือกฟีลด์ "รายการ"
               if($_POST['fieldlist'][$i] == 'h2'){
                  $sql.= ' '.$_POST['oplist'][$i].' h2_1 '.$_POST['condition_opv'][$i].' '.$_POST['condition_value_input'][$i];
               }
               else{ // ถ้าเลือกฟีลด์อื่นๆ
                  $sql.= ' '.$_POST['oplist'][$i].' '.$_POST['fieldlist'][$i].' '.$_POST['condition_opv'][$i].' '.$_POST['condition_value_input'][$i];
               }
            }
            else{ // ถ้าค่าไม่ใช่ตัวเลข

               // ถ้าเลือกฟีลด์ "รายการ"
               if($_POST['fieldlist'][$i] == 'h2'){
                  $sql.= ' '.$_POST['oplist'][$i].' h2_1 '.$_POST['condition_opv'][$i].' '.'"'.$_POST['condition_value_input'][$i].'"';
               }
               else{  // ถ้าเลือกฟีลด์อื่นๆ
                  $sql.= ' '.$_POST['oplist'][$i].' '.$_POST['fieldlist'][$i].' '.$_POST['condition_opv'][$i].' '.'"'.$_POST['condition_value_input'][$i].'"';
               }
            }  
         }
         else{ // ถ้าค่าของเงื่อนไขเป็นฟีลด์

              // ถ้าเลือกฟีลด์ "รายการ"
            if($_POST['fieldlist'][$i] == 'h2'){
               $sql.= ' '.$_POST['oplist'][$i].' h2_1 '.$_POST['condition_opv'][$i];
            }
            else{ // ถ้าเลือกฟีลด์อื่นๆ
               $sql.= ' '.$_POST['oplist'][$i].' '.$_POST['fieldlist'][$i].' '.$_POST['condition_opv'][$i];
            } 

            // ถ้าค่าของเงื่อนไขเป็นฟีลด์ และ เท่ากับ "h2"
            if($_POST['condition_value_input'][$i] == 'h2'){
               $sql.= ' h2_1';
            }
            else{ // ถ้าเลือกฟีลด์อื่นๆ
               $sql.= ' '.$_POST['condition_value_input'][$i];
            } 
         } 
      }
      // $row_condition = array(
      //    'oplist' =>$_POST['oplist'][$i], 
      //    'fieldlist' =>$_POST['fieldlist'][$i],
      //    'condition_opv' =>$_POST['condition_opv'][$i],
      //    'valuelist' => $_POST['condition_value_input'][$i]
      // );
      // array_push($condition_loop_data,$row_condition);
      
   } 

   // $condition_data['condition_data'] = $condition_loop_data;

   // $condition_data['table_name'] = $table;

   //echo json_encode($sql);
}
else{
   $sql .= 'SELECT * FROM '.$table;
   //echo json_encode($sql);
}

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

      $response['data'] = $row_data;
      $response['raw_data'] = $row_raw_data;
      $response['sql'] = $sql;
      $response['error'] = false;
   }
   else{
      $response['sql'] = $sql;
      $response['message'] = "ไม่พบรายการ";
      $response['error'] = true;
   }   
}
else{
   $response['sql'] = $sql;
   $response['message'] = "ไม่พบรายการ";
   $response['error'] = true;
}
echo json_encode($response);
 
?>
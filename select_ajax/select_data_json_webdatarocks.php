<?php
   include '../configDB.php';

   $select_sql = 'SELECT * FROM tb_test45 WHERE h2_1 <= "02" AND h2_1 != "" ORDER BY table_name_id';

   $conn = $DBconnect;
 
   $response = array();

   if(!empty($_POST['sql'])){

      $sql = $_POST['sql'];

      $fields = $_POST['fields'];
      // data
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
            
               $row_raw_data[] = $raw_data;
               $row_data[] = $data;
            }

            // $query_data['result_data'] = $row_data;

            // $query_data['raw_data'] = $row_raw_data;

            $response['data'] = $row_data;
            $response['raw_data'] = $row_raw_data;
   
            $response['error'] = false;
            $response['message'] = "success";
         }
         else{
            $response['error'] = true;
            $response['message'] = "ไม่พบข้อมูล";
         }
      }
      else{
         $response['error'] = true;
         $response['message'] = "ไม่สามารถเรียกข้อมูลได้";
      }
   }   
   else{
      $response['error'] = true;
      $response['message'] = "ไม่สามารถเรียกข้อมูลได้";
   }
 
   echo json_encode($response,JSON_UNESCAPED_UNICODE); // แสดงข้อมูลแบบ json
?>
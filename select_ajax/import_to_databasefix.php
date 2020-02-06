<?php
   require_once $_SERVER['DOCUMENT_ROOT']."/phpexcel/lib/PHPExcel-1.8/Classes/PHPExcel.php"; //เรียกใช้ไลบรารี่ PHPExcel
   include_once "DB_helper_fix.php"; // ใช้ class DB_helper

   $con_obj = new DB_helper_fix; // ประกาศตัวแปร object เก็บ Instance จาก class DB_helper

   $response  = array();

   if(!empty($_FILES['excel_file'])){

      $file_array = explode(".", $_FILES["excel_file"]["name"]);  // ตัดข้อมูลโดยใช้ตัวอักษร . (Dot) //เก็บนามสกุลไฟล์

      if($file_array[1] == "xls" || $file_array[1] == "xlsx" || $file_array[1] == "XLSX"){  //ตรวจสอบนามสกุลไฟล์
          
         $tmpfname = $_FILES["excel_file"]["tmp_name"]; 
         // ตั้งค่าไลบรารี่ PHPExcel
         $inputFileType = PHPExcel_IOFactory::identify($tmpfname);  
         $objReader = PHPExcel_IOFactory::createReader($inputFileType);  
         $objReader->setReadDataOnly(false);  

         $objPHPExcel = $objReader->load($tmpfname);  // โหลดไฟล์
         $objWorksheet = $objPHPExcel->setActiveSheetIndex(0); // เรียกใช้เฉพาะ sheet แรก
         $num_row = 1 ; // กำหนดจำนวนแถว = 1
      
         //---------------------------------------------------------//
         set_time_limit(600); // เพิ่มเวลาให้สามรถประมวลผลได้นานขึ้น จากปกติ 30 วินาที
         //---------------------------------------------------------//
      
         $highestRow = $objWorksheet->getHighestRow(); // เก็บค่าจำนวนรายการ (Row)
         $highestColumn = $objWorksheet->getHighestColumn(); // เก็บค่าชื่อคอลัมภ์ เช่น 'F'
         //echo "row:".$highestRow." col:".$highestColumn;
 
         $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn)-1; // แปลงค่าชื่อคอลัมภ์ เป็นตัวเลข เช่น จาก "F" เป็น 6
         //echo $highestColumnIndex;
        
         $table_name = $_POST['tb_name'];
 
         $row_array = array();

         if($con_obj->create_table("tb_".$table_name, $table_name)){

            for($i = 2 ; $i <= $highestRow ; $i++ ){

               $col_array = array();
   
               for($j = 0; $j <= $highestColumnIndex ; $j++){
   
                  $data = $objWorksheet->getCellByColumnAndRow($j, $i)->getValue(); 
   
                  $data_push;
   
                  if($data != NULL || $data != ''){

                     if($j == 0){
                        array_push($col_array,strval($data));
                     }
                     else if($j == 1){
                 
                        $numberr = mb_substr($data,0,2,'UTF-8');
                        
                        if(is_numeric($numberr)){
                           $strr = mb_substr($data,2);
                           $data_push = $strr;
                           array_push($col_array,$numberr);
                           array_push($col_array,$strr);
 
                        }
                        else{
                           $data_push = $data;
                           array_push($col_array,"");
                           array_push($col_array,$data_push);
                        }
      
                     }
                     else if($j == 24){
                        array_push($col_array,strval($data));
                     }
                     else if($j == 25){
   
                        $cell_data = $objWorksheet->getCellByColumnAndRow($j, $i);
   
                        if(PHPExcel_Shared_Date::isDateTime($cell_data)){
                           $date_data = date($format = "d/m/Y", PHPExcel_Shared_Date::ExcelToPHP($data));
                           
                           $date = str_replace('/', '-', $date_data ); // แทนที่เครื่องหมาย "/" ด้วย "-"
                           $result = date("Y-m-d", strtotime($date)); // แปลงรูปแบบของวันที่เป็น ปี-เดือน-วัน
                           $data_push = $result;
                        }
                        else{
                           $data_push = $data;
                        }
                        array_push($col_array,$data_push);
                     }
                     else{
      
                        $cell_data = floatval(preg_replace('/[^\d.]/', '', $data));
                        if(is_numeric($cell_data)){
                           $data_push = floatval($cell_data);
                        }
                        else{
                           $data_push = strval($cell_data);
                        }
                        
                        array_push($col_array,$data_push);
                     }
                  }
                  else{
                     if(strval($data) == '0'){
                        array_push($col_array,'0');
                     }
                     else{
                        array_push($col_array,strval($data));
                     }
                  }
  
               }
               array_push($row_array,$col_array);
   
            }

            $con_obj->insert_data("tb_".$table_name,$row_array);
            $response['error'] = false;

         }
         else{
            $response['message'] = "ไม่สามารถเพิ่มตารางในฐานข้อมูลได้";
            $response['error'] = true; 
         } 
      }
      else{
         $response['message'] = "นามสกุลไฟล์ผิด";
         $response['error'] = true;
      }
   }
   else{
      $response['message'] = "ไม่พบไฟล์ที่อัพโหลด";
      $response['error'] = true;
   }

   echo json_encode($response);





?>
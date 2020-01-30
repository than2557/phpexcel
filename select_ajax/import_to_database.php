<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/phpexcel/lib/PHPExcel-1.8/Classes/PHPExcel.php"; //เรียกใช้ไลบรารี่ PHPExcel
    include_once "../DB_helper.php"; // ใช้ class DB_helper

    $con_obj = new DB_helper; // ประกาศตัวแปร object เก็บ Instance จาก class DB_helper

    if(!empty($_FILES["excel_file"])){ // ตรวจสอบไฟล์ได้อัพโหลดหรือไม่
      
      $file_array = explode(".", $_FILES["excel_file"]["name"]);  // ตัดข้อมูลโดยใช้ตัวอักษร . (Dot) //เก็บนามสกุลไฟล์

      if($file_array[1] == "xls" || $file_array[1] == "xlsx"){  //ตรวจสอบนามสกุลไฟล์

         $tmpfname = $_FILES["excel_file"]["tmp_name"]; 

         // ตั้งค่าไลบรารี่ PHPExcel
         $inputFileType = PHPExcel_IOFactory::identify($tmpfname);  
         $objReader = PHPExcel_IOFactory::createReader($inputFileType);  
         $objReader->setReadDataOnly(false);  

         $objPHPExcel = $objReader->load($tmpfname);  // โหลดไฟล์
         $objWorksheet = $objPHPExcel->setActiveSheetIndex(0); // เรียกใช้เฉพาะ sheet แรก
         $num_row = 1 ; // กำหนดจำนวนแถว = 1

         $col_name = array(); // array เก็บชื่อคอลัมภ์
         $output = ''; // ประกาศตัวแปร output ใช้ในการแสดงผลลัพธ์จากไฟล์ที่อัพโหลด
         $output.= '<label class="text-sucess text-center">'."ชื่อไฟล์ ".$_FILES["excel_file"]["name"].'</label><br><table class="table">';
         
         //---------------------------------------------------------//
         set_time_limit(600); // เพิ่มเวลาให้สามรถประมวลผลได้นานขึ้น จากปกติ 30 วินาที
         //---------------------------------------------------------//

         $highestRow = $objWorksheet->getHighestRow(); // เก็บค่าจำนวนรายการ (Row)
         $highestColumn = $objWorksheet->getHighestColumn(); // เก็บค่าชื่อคอลัมภ์ เช่น 'F'
         //echo "row:".$highestRow." col:".$highestColumn;

         $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn)-1; // แปลงค่าชื่อคอลัมภ์ เป็นตัวเลข เช่น จาก "F" เป็น 6

         $output .='<table class="table">';

         $array_col_name = array(); // array เก็บชื่อคอลัมภ์

         $table_name = "tb_".$_POST['tb_name']; // เก็บชื่อตาราง
         
         $arr_type = array(); // array เก็บข้อมูลแต่ละแถว
         // loop แรก จัดเตรียมตารางและฟีลด์ต่างๆ
         for($row = 1; $row <= 2; $row++){

            if($row == 1){

               for($col = 0; $col <= $highestColumnIndex ; $col++){
                  $data = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();  // เก็บค่าในเซลล์

                  if($data != NULL || $data != ''){ //ตรวจสอบเมื่อค่าในตัวแปร data ไม่ว่าง
                     $output .='<th>' .$data . '</th>';
                     array_push($array_col_name,$data); //นำค่าแต่ละเซลล์ เก็บไว้ใน array
                  }  
               }
               
               //echo "<pre>".var_dump($array_col_name)."</pre>";

               $con_obj->insert_tb_header($array_col_name,$table_name);
            }
            else if($row == 2){

               for ($col = 0; $col <= $highestColumnIndex; $col++) { // วนลูปคอร์ลัมภ์

                  $data = $objWorksheet->getCellByColumnAndRow($col, $row);   

                  $InvDate = $data->getValue();
  
                  if($InvDate != NULL || $InvDate != ''){

                     if($col == 0){
                        array_push($arr_type,"string");
                     }
                     else{

                        if(PHPExcel_Shared_Date::isDateTime($data)) { // ตรวจสอบค่าของเซลล์ เป็นชนิดวันที่หรือไม่
                        
                           // แปลงค่าวันที่ ที่เกิดจาก excel เก็บค่าวันที่อยู่ในรูปแบบ excel serial date
                           //$InvDate = date($format = "d/m/Y", PHPExcel_Shared_Date::ExcelToPHP($InvDate));
   
                           //$output .='<td>'.$InvDate.'</td>';  
   
                           array_push($arr_type,"date");
                        }
                        else{
                           if(is_numeric($InvDate)){
                              array_push($arr_type,gettype($InvDate));
                           }
                           else{
                              array_push($arr_type,"string");
                           }
                        }
                     }
                  }
                  else{
                     if(strval($InvDate) == '0'){
                        array_push($arr_type,"double");
                     }
                     else{
                        array_push($arr_type,"string");
                     }
                    
                  }
                 
               }

               $con_obj->create_table($arr_type,$table_name);



               //echo "<pre>".var_dump($arr_type)."</pre>";

               //$con_obj->test_read_data($arr_type);

               // $con_obj->insert_table($array_col_name, $table_name,$array_data);
               // // method insert_table คือ สร้างตาราง ตามชื่อตารางที่กรอกในช่อง tb_name
               // $con_obj->insert_data($array_data,$table_name); // insert data            
            }
            else{ break; }
         }

         // loop ที่สอง บันทึกข้อมูลลงฐานข้อมูลตามตารางที่กำหนดไว้
         $row_array = array();

         for($row_data = 2 ; $row_data <= $highestRow; $row_data++){

            $col_array = array();

            for($col_data = 0 ; $col_data <= $highestColumnIndex ; $col_data++){

               $data = $objWorksheet->getCellByColumnAndRow($col_data, $row_data);   

               $cell_data = $data->getValue();

               if($cell_data != NULL || $cell_data != ''){

                  if($col_data == 0){
                     array_push($col_array,strval($cell_data));
                  }
                  else{

                     if(PHPExcel_Shared_Date::isDateTime($data)){
                        // แปลงค่าวันที่ ที่เกิดจาก excel เก็บค่าวันที่อยู่ในรูปแบบ excel serial date
                        $date_data = date($format = "d/m/Y", PHPExcel_Shared_Date::ExcelToPHP($cell_data));

                        array_push($col_array,$date_data);
                     }
                     else{

                        if(is_numeric($cell_data)){
                           $data = floatval($cell_data);
                           array_push($col_array,$data);
                        }
                        else{
                           $data = strval($cell_data);
                           array_push($col_array,$data);
                        }
                     }
                  } 
               }
               else{

                  if(strval($cell_data) == '0'){
                     array_push($col_array,'0');
                  }
                  else{
                     array_push($col_array,strval($cell_data));
                  }
               }
            } 
         
            array_push($row_array,$col_array);
            //echo "<br>";
         }
         //echo json_encode($row_array);
         //$con_obj->test_read_data($row_array,$arr_type);
         $con_obj->upload_data($row_array,$arr_type);



         // for ($row = 1; $row <= $highestRow; $row++) { //วนลูปตามจำนวนรายการ (Row)   

         //    $output .='<tr>';

         //    if($row == 1){ // หัวตาราง
         //       for ($col = 0; $col <= $highestColumnIndex; $col++) { // วนลูปคอร์ลัมภ์

         //          $data = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();  // เก็บค่าในเซลล์

         //          if($data != NULL || $data != ''){ //ตรวจสอบเมื่อค่าในตัวแปร data ไม่ว่าง
         //             $output .='<th>' .$data . '</th>';
         //             array_push($array_col_name,$data); //นำค่าแต่ละเซลล์ เก็บไว้ใน array
         //          }  
                  
         //       }

         //       // เรียกใช้ method insert_tb_header
         //       // method insert_tb_header จะ insert ข้อมูลหัวตาราง
         //       $con_obj->insert_tb_header($array_col_name,"tb_".$table_name);
         //    }
         //    else if($row == 2){ // ข้อมูลในตาราง
         //       $array_data = array(); // array เก็บข้อมูลแต่ละแถว

         //       for ($col = 0; $col <= $highestColumnIndex; $col++) { // วนลูปคอร์ลัมภ์

         //          $data = $objWorksheet->getCellByColumnAndRow($col, $row);   

         //          $InvDate = $data->getValue();
  
         //          if($InvDate != NULL || $InvDate != ''){

         //             if(PHPExcel_Shared_Date::isDateTime($data)) { // ตรวจสอบค่าของเซลล์ เป็นชนิดวันที่หรือไม่
                        
         //                // แปลงค่าวันที่ ที่เกิดจาก excel เก็บค่าวันที่อยู่ในรูปแบบ excel serial date
         //                $InvDate = date($format = "d/m/Y", PHPExcel_Shared_Date::ExcelToPHP($InvDate));

         //                $output .='<td>'.$InvDate.'</td>';  

         //                array_push($array_data,$InvDate);
         //             }
         //             else{

         //                $output .='<td>'.$InvDate.'</td>';

         //                array_push($array_data,$InvDate);
         //             }
         //          }
         //          else{

         //             if(strval($InvDate) == '0'){

         //                $output .='<td>0</td>'; 

         //                array_push($array_data,'0');

         //             }
         //             else{

         //                $output .='<td>'.strval($InvDate).'</td>'; 

         //                array_push($array_data,strval($InvDate));
                        
         //             }
                    
         //          }
                 
         //       }
         //       $con_obj->insert_table($array_col_name, "tb_".$table_name,$array_data);
         //       // method insert_table คือ สร้างตาราง ตามชื่อตารางที่กรอกในช่อง tb_name
         //       $con_obj->insert_data($array_data,"tb_".$table_name); // insert data            
         //    }
         //    else{ // ข้อมูลในตาราง
         //       $array_data = array(); // array เก็บข้อมูลแต่ละแถว
         //       for ($col = 0; $col <= $highestColumnIndex; $col++) { // วนลูปคอร์ลัมภ์
         //          $data = $objWorksheet->getCellByColumnAndRow($col, $row);   
         //          $InvDate = $data->getValue();
         //          if($InvDate != NULL || $InvDate != ''){
         //             if(PHPExcel_Shared_Date::isDateTime($data)) {
         //                $InvDate = date($format = "d/m/Y", PHPExcel_Shared_Date::ExcelToPHP($InvDate)); 
         //                $output .='<td>'.$InvDate.'</td>';       
         //                array_push($array_data,$InvDate);
         //             }
         //             else{
         //                $output .='<td>'.$InvDate.'</td>';   
         //                array_push($array_data,$InvDate);
         //             }
         //          }
         //          else{
         //             if(strval($InvDate) == '0'){
         //                $output .='<td>0</td>'; 
         //                array_push($array_data,0);
         //             }
         //             else{
         //                $output .='<td>'.strval($InvDate).'</td>'; 
         //                array_push($array_data,strval($InvDate));
         //             }
         //          }
                 
         //       }
         //       $con_obj->insert_data($array_data,"tb_".$table_name); // insert data 
         //    }
           
         //    $output .='</tr>';
         // }




         $output .='</table>';
         //echo $output;

      }
      else{
         echo "error";
      }
   }
?>
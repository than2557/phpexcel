<?php
    require_once $_SERVER['DOCUMENT_ROOT']."/import_excel/lib/PHPExcel-1.8/Classes/PHPExcel.php"; //เรียกใช้ไลบรารี่ PHPExcel
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

         $table_name = $_POST['tb_name']; // เก็บชื่อตาราง
         
         for ($row = 1; $row <= $highestRow; $row++) { //วนลูปตามจำนวนรายการ (Row)   

            $output .='<tr>';

            if($row == 1){ // หัวตาราง
               for ($col = 0; $col <= $highestColumnIndex; $col++) { // วนลูปคอร์ลัมภ์

                  $data = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();  // เก็บค่าในเซลล์

                  if($data != NULL || $data != ''){ //ตรวจสอบเมื่อค่าในตัวแปร data ไม่ว่าง
                     $output .='<th>' .$data . '</th>';
                     array_push($array_col_name,$data); //นำค่าแต่ละเซลล์ เก็บไว้ใน array
                  }  
                  
               }

               // เรียกใช้ method insert_tb_header
               // method insert_tb_header จะ insert ข้อมูลหัวตาราง
               $con_obj->insert_tb_header($array_col_name,"tb_".$table_name);
            }
            else if($row == 2){ // ข้อมูลในตาราง
               $array_data = array(); // array เก็บข้อมูลแต่ละแถว

               for ($col = 0; $col <= $highestColumnIndex; $col++) { // วนลูปคอร์ลัมภ์

                  $data = $objWorksheet->getCellByColumnAndRow($col, $row);   

                  $InvDate = $data->getValue();
  
                  if($InvDate != NULL || $InvDate != ''){

                     if(PHPExcel_Shared_Date::isDateTime($data)) { // ตรวจสอบค่าของเซลล์ เป็นชนิดวันที่หรือไม่
                        
                        // แปลงค่าวันที่ ที่เกิดจาก excel เก็บค่าวันที่อยู่ในรูปแบบ excel serial date
                        $InvDate = date($format = "d/m/Y", PHPExcel_Shared_Date::ExcelToPHP($InvDate));

                        $output .='<td>'.$InvDate.'</td>';  

                        array_push($array_data,$InvDate);
                     }
                     else{

                        $output .='<td>'.$InvDate.'</td>';

                        array_push($array_data,$InvDate);
                     }
                  }
                  else{

                     if(strval($InvDate) == '0'){

                        $output .='<td>0</td>'; 

                        array_push($array_data,'0');

                     }
                     else{

                        $output .='<td>'.strval($InvDate).'</td>'; 

                        array_push($array_data,strval($InvDate));
                        
                     }
                    
                  }
                 
               }
               $con_obj->insert_table($array_col_name, "tb_".$table_name,$array_data);
               // method insert_table คือ สร้างตาราง ตามชื่อตารางที่กรอกในช่อง tb_name
               $con_obj->insert_data($array_data,"tb_".$table_name); // insert data            
            }
            else{ // ข้อมูลในตาราง
               $array_data = array(); // array เก็บข้อมูลแต่ละแถว
               for ($col = 0; $col <= $highestColumnIndex; $col++) { // วนลูปคอร์ลัมภ์
                  $data = $objWorksheet->getCellByColumnAndRow($col, $row);   
                  $InvDate = $data->getValue();
                  if($InvDate != NULL || $InvDate != ''){
                     if(PHPExcel_Shared_Date::isDateTime($data)) {
                        $InvDate = date($format = "d/m/Y", PHPExcel_Shared_Date::ExcelToPHP($InvDate)); 
                        $output .='<td>'.$InvDate.'</td>';       
                        array_push($array_data,$InvDate);
                     }
                     else{
                        $output .='<td>'.$InvDate.'</td>';   
                        array_push($array_data,$InvDate);
                     }
                  }
                  else{
                     if(strval($InvDate) == '0'){
                        $output .='<td>0</td>'; 
                        array_push($array_data,0);
                     }
                     else{
                        $output .='<td>'.strval($InvDate).'</td>'; 
                        array_push($array_data,strval($InvDate));
                     }
                  }
                 
               }
               $con_obj->insert_data($array_data,"tb_".$table_name); // insert data 
            }
           
            $output .='</tr>';
         }
         $output .='</table>';
         echo $output;

         // foreach ($objWorksheet->getRowIterator() as $row) {     //วนลูปตามจำนวนรายการ (Row)   
         //    $cellIterator = $row->getCellIterator(); 
         //    $cellIterator->setIterateOnlyExistingCells(false);

           
         //    if($num_row == 1){ // หัวตาราง
         //       $output.= '<thead class="thead-dark"><tr>';
         //       foreach ($cellIterator as $cell) { // วนลูปคอร์ลัมภ์
         //          $output.='<th>'.$cell->getValue().'</th>';
         //          array_push($col_name,$cell->getValue()); //นำค่าแต่ละเซลล์ เก็บไว้ใน array
         //       }
         //       $output.= '</tr></thead>';
         //       $con_obj->insert_tb_header($col_name,"tb_".$_POST['tb_name']);

         //       $num_row++;
         //    }
         //    else if($num_row == 2){
         //       $output.= '<tbody><tr>';
         //       $array_data = array(); // array เก็บข้อมูลแต่ละแถว
         //       foreach ($cellIterator as $cell) { // วนลูปคอร์ลัมภ์
         //          $output.='<td>'.$cell->getValue().'</td>';
         //          $celll = $cell->getValue();

         //          array_push($array_data,$celll); //นำค่าแต่ละเซลล์ เก็บไว้ใน array
         //       }

         //       $con_obj->insert_table($col_name, "tb_".$_POST['tb_name'],$array_data); //ใช้ method insert_table 
               
         //       $output.= '</tr>';

         //       $con_obj->insert_data($array_data,"tb_".$_POST['tb_name']); // insert data 
         //       // method insert_table คือ สร้างตาราง ตามชื่อตารางที่กรอกในช่อง tb_name
         //       $num_row++;
         //    }
         //    else{ // ข้อมูลในตาราง
         //       $output.= '<tr>';
         //       $array_data = array(); // array เก็บข้อมูลแต่ละแถว
         //       foreach ($cellIterator as $cell) { // วนลูปคอร์ลัมภ์
         //          $output.='<td>'.$cell->getValue().'</td>';
         //          $celll = $cell->getValue();

         //          array_push($array_data,$celll); //นำค่าแต่ละเซลล์ เก็บไว้ใน array
         //       }
         //       $output.= '</tr></tbody>';
         //       $num_row++;
         //       $con_obj->insert_data($array_data,"tb_".$_POST['tb_name']); // insert data 
 
         //    }
         // }
         // $output.= '</table>';
         // echo $output;  
      }
      else{
         echo "error";
      }
   }
?>
<?php
   require_once "phpexcel-1.8\Classes\PHPExcel.php"; //เรียกใช้ไลบรารี่ PHPExcel
   include_once "connectDB.php"; // ใช้ class connectDB

   $con_obj = new connectDB;

   if(!empty($_FILES["excel_file"])){ // ตรวจสอบไฟล์ได้อัพโหลดหรือไม่
      
      $file_array = explode(".", $_FILES["excel_file"]["name"]);  //เก็บนามสกุลไฟล์
      if($file_array[1] == "xls" || $file_array[1] == "xlsx"){  //ตรวจสอบนามสกุลไฟล์
         $tmpfname = $_FILES["excel_file"]["tmp_name"]; 
         $inputFileType = PHPExcel_IOFactory::identify($tmpfname);  
         $objReader = PHPExcel_IOFactory::createReader($inputFileType);  
         ///$objReader->setReadDataOnly(true);  

         $objPHPExcel = $objReader->load($tmpfname);  // โหลดไฟล์
         $objWorksheet = $objPHPExcel->setActiveSheetIndex(0); // เรียกใช้เฉพาะ sheet ที่เปิด
         $num_row = 1 ; // กำหนดจำนวนแถว = 1

         $col_name = array(); // array เก็บชื่อคอร์ลัมภ์
         $output = '';
         $output.= '<label class="text-sucess text-center" >'."ชื่อไฟล์ ".$_FILES["excel_file"]["name"].'</label><br><table class="table">';
         set_time_limit(120);
         foreach ($objWorksheet->getRowIterator() as $row) {     //วนลูปตามจำนวนรายการ (Row)   
            $cellIterator = $row->getCellIterator(); 
            $cellIterator->setIterateOnlyExistingCells(false);
            
            if($num_row == 1){ // หัวตาราง
               $output.= '<thead class="thead-dark"><tr>';
               foreach ($cellIterator as $cell) { // วนลูปคอร์ลัมภ์
                  $output.='<th>'.$cell->getValue().'</th>';
                  array_push($col_name,$cell->getValue()); //นำค่าแต่ละเซลล์ เก็บไว้ใน array
               }
               $output.= '</tr></thead>';
               $con_obj->insert_table($col_name, "tb_".$_POST['tb_name']); //ใช้ method insert_table 
               // method insert_table คือ สร้างตาราง ตามชื่อตารางที่กรอกในช่อง tb_name
               $num_row++;
            }
            else{ // ข้อมูลในตาราง
               $output.= '<tbody><tr>';
               $array_data = array(); // array เก็บข้อมูลแต่ละแถว
               foreach ($cellIterator as $cell) { // วนลูปคอร์ลัมภ์
                  $output.='<td>'.$cell->getValue().'</td>';
                  $celll = (string)$cell->getValue();

                  array_push($array_data,$celll); //นำค่าแต่ละเซลล์ เก็บไว้ใน array
               }
               // echo '<pre>';
               // var_dump($array_data);
               // echo '</pre>';
               $output.= '</tr></tbody>';
               $num_row++;
               $con_obj->insert_data($array_data,"tb_".$_POST['tb_name']); // insert data 
 
            }
         }
         echo $output;  
      }
      else{
         echo "error";
      }
   }
 
 ?> 
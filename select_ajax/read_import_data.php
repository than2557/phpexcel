<?php

   function get_data($file_data,$hrow,$hcol){

      // row_data object
      $row_data_obj = new stdClass();
            
      // header table
      $header_data = array();

      // Loop data
      for($i = 1 ; $i <= $hrow ; $i++){

         // First row (header)
         if($i == 1){

            for($j = 0 ; $j <= $hcol ; $j++){

               // Get data
               $data = $file_data->getCellByColumnAndRow($j, $i)->getValue();

               // Declear object is Array
               $row_data_obj ->{$data} = array();
               
               // Push data
               array_push($header_data,$data);
            }
         }
         else{  // Second row

            for($j = 0 ; $j <= $hcol ; $j++){

               // get value in cell
               $data = $file_data->getCellByColumnAndRow($j, $i)->getValue();

               // get object in cell
               $data_obj = $file_data->getCellByColumnAndRow($j, $i);

               if($data != NULL || $data != ''){ //ตรวจสอบเมื่อค่าในตัวแปร data ไม่ว่าง

                  if($data == 0){
                     array_push($row_data_obj ->{$header_data[$j]},strval($data));
                  }
                  else{

                     if(PHPExcel_Shared_Date::isDateTime($data_obj)){
                        
                        // parse to Date
                        $date_data = date($format = "d/m/Y", PHPExcel_Shared_Date::ExcelToPHP($data));
                        
                        // push data
                        array_push($row_data_obj ->{$header_data[$j]},$date_data);
                     }
                     else{

                        if(is_numeric($data)){
                           $cell_data = floatval($data);
                           array_push($row_data_obj ->{$header_data[$j]},$cell_data);
                        }
                        else{
                           $cell_data = strval($data);
                           array_push($row_data_obj ->{$header_data[$j]},$cell_data);
                        }
                     }
                  }  
               }  
               else{
                  
                  // check null value is equal 0
                  if(strval($data) == '0'){
                     array_push($row_data_obj ->{$header_data[$j]},'0');
                  }
                  else{
                     array_push($row_data_obj ->{$header_data[$j]},strval($data));
                  }
                   
               }
            }
         }
      }
      return $row_data_obj;
   }

   function show_result($data){

      // HTML code
      $html = ''; 
      
      // Parse object To Array
      $array_parse = get_object_vars($data);

      // get Array keys
      $key_obj = array_keys($array_parse);

      // Count row
      $row_count = count($data->{$key_obj[0]});

      // HTML code
      $html.= '<table class="table table-sm table-bordered"><thead>';

      $html.='<tr>';

      // Populate Header
      foreach($key_obj as $header){
         $html.='<th><input class="checkcol" type="checkbox" id="checkcol" name="checkcol[]" value="'.$header.'">   '.$header.'</th>';
      }

      $html.='</tr></thead><tbody>';

      // Populate data
      for($i = 0 ; $i <= $row_count-1 ; $i++){

         $html.='<tr>';

         for($j = 0 ; $j <= count($key_obj)-1 ; $j++){
            $html.='<td class="'.$key_obj[$j].'">'.$data->{$key_obj[$j]}[$i].'</td>';
         }

         $html.='</tr>';
      }

      $html.= '<tbody></table>';

      return $html;
   }

   require_once $_SERVER['DOCUMENT_ROOT']."/MyPhpSpreadsheet/lib/PHPExcel-1.8/Classes/PHPExcel.php"; //เรียกใช้ไลบรารี่ PHPExcel
 
   $response  = array();

   if(!empty($_FILES['file_input'])){
 
      $file_array = explode(".", $_FILES["file_input"]["name"]);

      if($file_array[1] == "xls" || $file_array[1] == "xlsx" || $file_array[1] == "XLSX" || $file_array[1] == "xlsx"){

         $tmpfname = $_FILES["file_input"]["tmp_name"]; 

         // ตั้งค่าไลบรารี่ PHPExcel
         $inputFileType = PHPExcel_IOFactory::identify($tmpfname);  
         $objReader = PHPExcel_IOFactory::createReader($inputFileType);  
         $objReader->setReadDataOnly(false);  

         $objPHPExcel = $objReader->load($tmpfname);  // โหลดไฟล์
         $objWorksheet = $objPHPExcel->setActiveSheetIndex(0); // เรียกใช้เฉพาะ sheet แรก
        
         //---------------------------------------------------------//
         set_time_limit(600); // เพิ่มเวลาให้สามรถประมวลผลได้นานขึ้น จากปกติ 30 วินาที
         //---------------------------------------------------------//
         
         $highestRow = $objWorksheet->getHighestRow(); // เก็บค่าจำนวนรายการ (Row)
         $highestColumn = $objWorksheet->getHighestColumn(); // เก็บค่าชื่อคอลัมภ์ เช่น 'F'
         $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn)-1; 
         
         // get data from User upload (Raw data)
         $result_data = get_data($objWorksheet, $highestRow,$highestColumnIndex);

         // get HTML code result+data (Table)
         $response['result_table'] = show_result($result_data);

         $response['raw_data'] = $result_data;

         $response['error'] = false;

      }
      else{
         $response['error'] = true;
      }
   }
   else{
      $response['error'] = true;
   }

   echo json_encode($response);
?>
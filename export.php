 <?php  
 //export.php  

         require_once 'phpexcel-1.8\Classes\PHPExcel.php'; 
         include 'phpexcel-1.8\Classes\PHPExcel\IOFactory.php';

 if(!empty($_FILES["excel_file"]))  
 {  
 	//print_r( $_FILES["excel_file"]);

      $file_array = explode(".", $_FILES["excel_file"]["name"]);  
      if($file_array[1] == "xls"|| $file_array[1]=="xlsx"||$file_array[1]=="csv")  
      {  
           
  				
           $tmp_data =$_FILES["excel_file"]["tmp_name"];
          $inputFileType = PHPExcel_IOFactory::identify($tmp_data);  
         $objReader = PHPExcel_IOFactory::createReader($inputFileType);  
         $objReader->setReadDataOnly(true);  

         $objPHPExcel = $objReader->load($tmp_data); //pathdiritory  :: load static
          $output = ''; 

          foreach ( $objPHPExcel->getWorksheetIterator() as $worksheet) {
          	# code...
          	 $highestRow = $worksheet->getHighestRow();  
          	 $highestColumn = $worksheet->getHighestColumn(); 
          	 $highestColumnIndex = PHPExcel_Cell::columnIndexFromString( $highestColumn); 
          	 echo $highestColumnIndex;


          	 for($row=2;$row<=$highestRow;$row++){
          	 		for($i=0;$row<=$highestRow;$i++){

          	 		//$getdata = $worksheet->getCellByColumnAndRow($i, $row)->getValue();



          	 		}
          	 }
          }
          
 }

}

 ?>  
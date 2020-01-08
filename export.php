 <?php  
 //export.php  
 if(!empty($_FILES["excel_file"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "", "test");  
      $file_array = explode(".", $_FILES["excel_file"]["name"]);  
      if($file_array[1] == "xls"|| $file_array[1]=="xlsx"||$file_array[1]=="csv")  
      {  
           include("phpexcel-1.8\Classes\PHPExcel.php");  
           $output = '';  
           $output .= "  
           <label class='text-success'>Data Inserted</label>  
                <table class='table table-bordered'>  
                     <tr>  
                          <th>Customer Name</th>  
                          <th>Address</th>  
                          <th>City</th>  
                          <th>Postal Code</th>  
                          <th>Country</th>  
                     </tr>  
                     ";  
           $object = PHPExcel_IOFactory::load($_FILES["excel_file"]["tmp_name"]);  
           foreach($object->getWorksheetIterator() as $worksheet)  
           {  
                $highestRow = $worksheet->getHighestRow();  
                for($row=2; $row<=$highestRow; $row++)  
                {  
                     $name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());  
                     $address = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());  
                     $city = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());  
                     $postal_code = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());  
                     $country = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());  

                      
  				$sql= 'CREATE TABLE IF NOT EXISTS $object["excel_file"](  

 					 "CustomerID" int(11) NOT NULL AUTO_INCREMENT,  
   					"CustomerName" varchar(250) NOT NULL,  
  					"Address" text NOT NULL,  
 					"City" varchar(250) NOT NULL,  
   					"PostalCode" varchar(30) NOT NULL,  
   					"Country" varchar(100) NOT NULL,  
  					PRIMARY KEY ("CustomerID")  
 		) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 '; 
 		mysqli_query($connect, $sql);  

                     $query = "  
                     INSERT INTO tbl_customer  
                     (CustomerName, Address, City, PostalCode, Country)   
                     VALUES ('".$name."', '".$address."', '".$city."', '".$postal_code."', '".$country."')  
                     ";  
                     mysqli_query($connect, $query);  
                     $output .= '  
                     <tr>  
                          <td>'.$name.'</td>  
                          <td>'.$address.'</td>  
                          <td>'.$city.'</td>  
                          <td>'.$postal_code.'</td>  
                          <td>'.$country.'</td>  
                     </tr>  
                     ';  
                }  
           }  
           $output .= '</table>';  
           echo $output;  
      }  
      else  
      {  
           echo '<label class="text-danger">Invalid File</label>';  
      }  
 }  
 ?>  
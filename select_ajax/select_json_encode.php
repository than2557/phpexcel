<?php
   include '../configDB.php';

   $conn = $DBconnect;

   $response = array();

   if(isset($_POST['table_name'])){

      $tb_name = $_POST['table_name']; 

      $sql = "SELECT * FROM ".$tb_name;

      $sql2 = "SELECT * FROM `data_dic_ref` WHERE `tb_ref_name` = "."'".$tb_name."'";
      
      // header
      $header_array = array();
      array_push($header_array,'primary_key'); // คอลัมภ์แรก

      $result = mysqli_query($conn,$sql2);

      if($result){  
         while($row = mysqli_fetch_row($result)){ // push หัวตาราง
            array_push($header_array,$row[1]);
         }
      }

      // data
      $result = mysqli_query($conn,$sql);
      if($result){
         while($row = mysqli_fetch_row($result)){  // push ข้อมูล
            $i = 0 ;
            $data = array();
            foreach($row as $cell){
               if($i ==1){
                  $data[$header_array[$i]] = strval($cell);
                  $i++;
               }
               else{
                  if(is_numeric($cell)){
                     $data[$header_array[$i]] = floatval($cell);
                  }
                  else{
                     $data[$header_array[$i]] = $cell;
                  }
                  $i++;
               }
               
            }
            $response[] = $data;
         }
      }
   }   
   echo json_encode($response,JSON_UNESCAPED_UNICODE); // แสดงข้อมูลแบบ json
?>
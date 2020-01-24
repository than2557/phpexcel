<?php

   session_start();

	include_once("../configDB.php");

   $conn = $DBconnect;
   
   $user_id = $_SESSION['id_user'];
   
   $root_folder = 'phpexcel';

   $ip = '127.0.0.1';

   if(isset($_POST['file_name']) && isset($_POST['data'])){

      $data = $_POST['data'];

      $date_time = $_POST['time_stamp'];  // post datetime form

      $datetime = new DateTime($date_time); // create obj datetime
   
      $date = $datetime->format('Y-m-d'); // split date and time
   
      $time = $datetime->format('H:i:s'); // split date and time

      $file_name = $_POST['file_name'];

      $response = array();
      
      $newFileName = '../export/'.$file_name.".html"; // path ไฟล์ใหม่
      $javascript_file_path = 'export/'.$file_name.'.html'; // path ไฟล์สำหรับแสดงใน javascript

     
      if (file_put_contents($newFileName, $data) !== false) { // ใส่เนื้อหา ที่รับค่ามาจาก method POST
         
         chmod($newFileName,0755); // แก้ไข permission

         $database_file_path = $ip.'/'.$root_folder.'/export/'. $file_name.'.html';

         $tokenname = $_POST['token_name'];

         $nametb = $_POST['table_name'];

         $groublinename = $_POST['group_name'];

         $sql = "INSERT INTO `alert`(`user_id`, `token_name`, `table_name`, `alert_date`, `alert_time`, `line_group_name`, `file_alert_path`) VALUES ('$user_id','$tokenname','$nametb','$date','$time','$groublinename','$database_file_path')";

         //echo $sql;
         $query =  mysqli_query($conn,$sql);
         //$query = 1;
         if($query){
            $response['error'] = false;
            $response['message'] = "สร้างไฟล์ " . basename($newFileName) . " แล้ว";
            $response['javascript_file_path'] = $javascript_file_path;
            $response['count'] = $_POST['count_data'];
         }
         else{
            $response['error'] = true;
            $response['message'] = "ไม่สามารถสร้างไฟล์ " . basename($newFileName) . " ได้";
         }
      } 
      else {

         $response['error'] = true;
         $response['message'] = "ไม่สามารถสร้างไฟล์ " . basename($newFileName) . " ได้";

      }
      echo json_encode($response);
   }
  
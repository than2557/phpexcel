<?php

   require('configDB.php'); // เรียกไฟล์ configDB.php

   $conn = $DBconnect; // ตัวแปรเชื่อมต่อฐานข้อมูล

   $table = $_POST['table_nameeeeeeeee']; // ตัวแปรชื่อตาราง

   $response = array(); // ตัวแปร response ชนิด array

   $fields_json = json_decode($_POST['fields_count']);


   $response["HTTP_post"] = $_POST;
   
   echo json_encode($response);
?>
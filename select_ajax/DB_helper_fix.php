<?php

   class DB_helper_fix{

      public $conn;

      function __construct() { // constructor method

         include 'configDB.php';  // เรียกใช้ไฟล์ configDB.php
         $this->conn = $DBconnect; // กำนหนดค่าตัวแปร $conn เท่ากับค่าตัวแปร $DBconnect 
         // ตัวแปร $DBconnect เก็บผลลัพธ์การเชื่อมต่อฐานข้อมูลจากไฟล์ configDB.php

      }
      function insert_task_user($user_id,$table_name){
         $sql = "INSERT INTO task_user (table_name,user_id) VALUES('".$table_name."','".$user_id."')";
 
         mysqli_query($this->conn,$sql);
      }
      function create_table($table_name,$task_name){

         $sql_create_table = "CREATE TABLE `test_import_excel`.`$table_name` ( 
            `table_name_id` INT NOT NULL AUTO_INCREMENT COMMENT 'primary_key' , 
            `h1` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ลำดับที่' , 
            `h2_1` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'เลขที่รายการ' , 
            `h2_2` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '   ' , 
            `h3` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'WBS' , 
            `h4` DOUBLE NOT NULL COMMENT 'วงเงินงบประมาณปัจจุบัน' , 
            `h5` DOUBLE NOT NULL COMMENT 'รวมจ่ายจริงถึงสิ้นปีก่อนหน้า' , 
            `h6` DOUBLE NOT NULL COMMENT 'รวมจ่ายจริงปีปัจจุบัน' , 
            `h7` DOUBLE NOT NULL COMMENT 'รวมจ่ายจริง' , 
            `h8` DOUBLE NOT NULL COMMENT 'เงินล่วงหน้าปีก่อนหน้า' , 
            `h9` DOUBLE NOT NULL COMMENT 'เงินประกันปีก่อนหน้า' , 
            `h10` DOUBLE NOT NULL COMMENT 'เงินล่วงหน้าปีปัจจุบัน' , 
            `h11` DOUBLE NOT NULL COMMENT 'เงินประกันปีปัจจุบัน' , 
            `h12` DOUBLE NOT NULL COMMENT 'เงินล่วงหน้าคงเหลือ' , 
            `h13` DOUBLE NOT NULL COMMENT 'เงินประกันค้างจ่าย' , 
            `h14` DOUBLE NOT NULL COMMENT 'รวมจ่ายทั้งสิ้นปีก่อนหน้า' , 
            `h15` DOUBLE NOT NULL COMMENT 'รวมจ่ายทั้งสิ้นปีปัจจุบัน' , 
            `h16` DOUBLE NOT NULL COMMENT 'รวมจ่ายทั้งสิ้น' , 
            `h17` DOUBLE NOT NULL COMMENT 'งบประมาณหักรวมจ่ายทั้งสั้น' , 
            `h18` DOUBLE NOT NULL COMMENT 'PO หัก รวมจ่ายจริง PO' , 
            `h19` DOUBLE NOT NULL COMMENT 'งบประมาณหักรวมจ่ายจริง' , 
            `h20` DOUBLE NOT NULL COMMENT 'IR-คงเหลือ' , 
            `h21` DOUBLE NOT NULL COMMENT 'GR-คงเหลือ' , 
            `h22` DOUBLE NOT NULL COMMENT 'PO-คงเหลือ' , 
            `h23` DOUBLE NOT NULL COMMENT 'PR-คงเหลือ' , 
            `h24` DOUBLE NOT NULL COMMENT 'วงเงินคงเหลือยังไม่ดำเนินการ' , 
            `h25` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'สถานะ' , 
            `h26` DATE NOT NULL COMMENT 'วันที่สร้าง' , 
            PRIMARY KEY (`table_name_id`)
         ) ENGINE = InnoDB COMMENT = '$task_name';";

         if(mysqli_query($this->conn,$sql_create_table)){
            return TRUE;
         }
         else{
            return FALSE;
         }
      }

      function insert_data($table_name,$data){

         $sql_insert_data = "";

         foreach($data as $row){

            $sql_insert_data = "INSERT INTO `$table_name`(`h1`, `h2_1`, `h2_2`, `h3`, `h4`, `h5`, `h6`, `h7`, `h8`, `h9`, `h10`, `h11`, `h12`, `h13`, `h14`, `h15`, `h16`, `h17`, `h18`, `h19`, `h20`, `h21`, `h22`, `h23`, `h24`, `h25`, `h26`) VALUES (";
           
            $i = 0;
      
            $len = count($row); //นับจำนวน array ข้อมูลแต่ละรายการ (Row)
            
            foreach($row as $cell){
              //echo $cell." ";
              if ($i == $len - 1) {  // ตรวจสอบถ้าเป็นข้อมูลรายการสุดท้าย   ///  column แรก fixed เป็นลำดับที่  ///
                
                $sql_insert_data .= "'".$cell."'";

              }
              else{

                $sql_insert_data .= "'".$cell."',"; 

              }
              $i++;
            }
            $sql_insert_data .= ")";
 
            mysqli_query($this->conn,$sql_insert_data);

          }
      }
   }
 
<?php

class DB_helper{
    
  public $insert_sql = "";
  public $conn;

  function __construct() { // constructor method
    include 'configDB.php';  // เรียกใช้ไฟล์ configDB.php
    $this->conn = $DBconnect; // กำนหนดค่าตัวแปร $conn เท่ากับค่าตัวแปร $DBconnect 
    // ตัวแปร $DBconnect เก็บผลลัพธ์การเชื่อมต่อฐานข้อมูลจากไฟล์ configDB.php
  }
  
  function insert_data($arr_row,$tb_name){
    // $arr_row ตัวแปรเก็บข้อมูลของรายการ (Row)
    // $tb_name ตัวแปรชื่อตาราง

    $sql = $this->insert_sql." VALUES (";

    $i = 0; 

    $len = count($arr_row); //นับจำนวน array ข้อมูลแต่ละรายการ (Row)

    foreach($arr_row as $row){ // วนลูปตามจำนวนรายการ (Row)
      if ($i == $len - 1) {  // ตรวจสอบถ้าเป็นข้อมูลรายการสุดท้าย
        if($this->validateDate($row)){ // ตรวจสอบข้อมูลที่เป็น วันที่ เช่น "13/01/2563"
          $origDate = $row; 
          $date = str_replace('/', '-', $origDate ); // แทนที่เครื่องหมาย "/" ด้วย "-"
          $newDate = date("Y-m-d", strtotime($date)); // แปลงรูปแบบของวันที่เป็น ปี-เดือน-วัน
          $sql .= "'".$newDate."'";
        }
        else{
          $sql .= "'".$row."'";
        }
      }
      else{    
        if($this->validateDate($row)){ // ตรวจสอบข้อมูลที่เป็น วันที่ เช่น "13/01/2563"
          $origDate = $row;
          $date = str_replace('/', '-', $origDate ); // แทนที่เครื่องหมาย "/" ด้วย "-"
          $newDate = date("Y-m-d", strtotime($date)); // แปลงรูปแบบของวันที่เป็น ปี-เดือน-วัน
          $sql .= "'".$newDate."',";
        }
        else{
          $sql .= "'".$row."',";
        }
      }
      $i++;
    }
 
    $sql.=")";
    mysqli_query($this->conn, $sql); 
    //echo $sql."<br>";
  }
  
  function insert_table($arr_col,$tb_name,$data_example){
    // $arr_col คือตัวแปรที่เก็บรายการ (Row) แรกของไฟล์ที่ อัพโหลด 
    // $tb_name // คือตัวแปรชื่อตาราง
    // $data_example // คือตัวแปรเก็บตัวอย่างข้อมูล เพื่อใช้ในการตรวจสอบชนิดของข้อมูล

    $sql = "CREATE TABLE ".$tb_name." (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,";
    
    $this->insert_sql = "INSERT INTO ".$tb_name."(";
    $i = 0; // array_count
    $j = 1; // col_counter
    $len = count($arr_col); //นับจำนวน array

    foreach ($arr_col as $item) { // วนลูปตามจำนวนคอร์ลัมภ์

      //   กำจัดช่องว่างของคอลัมภ์และแทนที่ด้วยเครื่องหมาย "_" Unde score      //
      $cell_col = trim($item); // ตัดช่องว่างหน้าและหลัง 
      $col_name = str_replace('-', '_', $cell_col); // แทนที่ - ด้วย _ (Under score)
      $col_name2 = str_replace(' ', '_', $col_name); // แทนที่ช่องว่าง (Space) ด้วย _ (Under score)

      if ($i == $len - 1) {  // ตรวจสอบถ้าเป็นข้อมูลรายการสุดท้าย   ///  column แรก fixed เป็นลำดับที่  ///

        $this->insert_sql .= "h".$j;

        if(is_numeric($data_example[$i])){ // ตรวจสอบชนิดของข้อมูลเป็น เป็นตัวเลขหรือไม่
          $pos = strpos($data_example[$i],'.');
          if($pos !== FALSE){
            $sql.="h".$j."  VARCHAR(255) NOT NULL";     
          }
          else{
            $sql.="h".$j." double NOT NULL";
          }
          
        }
        else{
          if(strval($data_example[$i]) == '0'){ // ถ้าข้อมูลเป็น string และเท่ากับ "0" ให้กำหนดชนิดข้อมูลเป็น double
            $sql.="h".$j." double NOT NULL"; 
          }
          else if($this->validateDate($data_example[$i])){ // ถ้าข้อมูลเป็นวันที่ ให้กำหนดชนิดข้อมูลเป็น date
            $sql.="h".$j." DATE NOT NULL"; 
          }
          else{
            $sql.="h".$j." VARCHAR(255) NOT NULL";  // ถ้าข้อมูลเป็น string ให้กำหนดชนิดข้อมูลเป็น double
          }
        }      

      }
      else{ 
        if($j == 1){
          $this->insert_sql .= "h".$j.",";
          $sql.="h".$j."  VARCHAR(255) NOT NULL,"; 
        }
        else{
          $this->insert_sql .= "h".$j.",";

          if(is_numeric($data_example[$i])){   
            $pos = strpos($data_example[$i],'.');
            if($pos !== FALSE){
              $sql.="h".$j."  VARCHAR(255) NOT NULL,"; 
            }
            else{
              $sql.="h".$j." double NOT NULL,"; 
            }
            
          }
          else{
            if(strval($data_example[$i]) == '0'){
              $sql.="h".$j." double NOT NULL,"; 
            }
            else if($this->validateDate($data_example[$i])){
              $sql.="h".$j." DATE NOT NULL,"; 
            }
            else{
              $sql.="h".$j." VARCHAR(255) NOT NULL,"; 
            }
          }
        }

      }
      $i++; 
      $j++; 
    }
    //echo $i;
    $this->insert_sql.=")";
    $sql.=")";
    mysqli_query($this->conn, $sql); 
    //echo $sql."<br>";
    // echo $this->insert_sql."<br>";
  }
  function insert_tb_header($tb_header,$tb_name){ // field => column_order เริ่มที่ 1 เนื่องจาก 0 คือ primary key ของตาราง
    // $tb_header ตัวแปรหัวตาราง ชนิด array
    // $tb_name ตัวแปรชื่อตาราง

    $tb_name2 = $tb_name;
    $col_order = 1 ; // ตัวแปรลำดับของหัวตาราง 

    foreach($tb_header as $col_name){ // วนลูปตามจำนวนหัวตารางของตัวแปร  $tb_header

      $cell_col = trim($col_name); // ตัดช่องว่างหน้าและหลัง 
      $col_name = str_replace('-', '_', $cell_col); // แทนที่ - ด้วย _ (Under score)
      $col_name2 = str_replace(' ', '_', $col_name); // แทนที่ช่องว่าง (Space) ด้วย _ (Under score)

      $sql = "INSERT INTO `data_dic_ref`(`field_name`, `column_order`, `tb_ref_name`) VALUES ('$col_name2','$col_order','$tb_name2')";
      
      mysqli_query($this->conn, $sql); 
      //echo $sql."<br>";
      $col_order++;
    }
    //echo $sql;
    //echo count($tb_header);
  }
  function create_table($var_type,$table_name){

    $i = 0; // array_count
    $j = 1; // col_counter
    $len = count($var_type); //นับจำนวน array

    $sql = "CREATE TABLE ".$table_name." (
      table_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,";
    
    $this->insert_sql = "INSERT INTO ".$table_name."(";

    foreach($var_type as $cell){

      if ($i == $len - 1) {  // ตรวจสอบถ้าเป็นข้อมูลรายการสุดท้าย   ///  column แรก fixed เป็นลำดับที่  ///
        //$sql.="h".$j."  VARCHAR(255) NOT NULL,"; 
        $this->insert_sql .= "h".$j;
        $sql.= "h".$j." ".$this->return_sql_attr_type($var_type[$i],$cell)." NOT NULL";
      }
      else{
        $this->insert_sql .= "h".$j.",";
        $sql.= "h".$j." ".$this->return_sql_attr_type($var_type[$i],$cell)." NOT NULL,";
      }
      $i++;
      $j++;
    }
    $sql.=")";
    $this->insert_sql.=")";

    mysqli_query($this->conn,$sql);
    //echo $sql;
    //echo $this->insert_sql;
  }

  function validateDate($date, $format = 'd/m/Y'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
  }
  function test_read_data($array_row,$var_type){
    foreach($array_row as $row){
      $i = 0;
      foreach($row as $cell){
        echo $this->parse_var($var_type[$i],$cell)." ";
        $i++;
      }
      echo "<br>";
      
    }

  }
  function upload_data($row_array,$var_type){
    
    foreach($row_array as $row){
      $sql = $this->insert_sql." VALUES (";
      $i = 0;

      $len = count($row); //นับจำนวน array ข้อมูลแต่ละรายการ (Row)
      
      foreach($row as $cell){
        
        if ($i == $len - 1) {  // ตรวจสอบถ้าเป็นข้อมูลรายการสุดท้าย   ///  column แรก fixed เป็นลำดับที่  ///
          
          $sql .= "'".$this->parse_var($var_type[$i],$cell)."'";
        }
        else{
          $sql .= "'".$this->parse_var($var_type[$i],$cell)."',"; 
        }
        $i++;
      }
      $sql .= ")";
      //echo $sql."<br>";
    mysqli_query($this->conn,$sql);
    }
  }
  function parse_var($var_type,$data){
    $result;

    switch ($var_type) {
      case "integer":
        $result = intval($data);
        break;
      case "double":
        $result = floatval($data);
        break;
      case "string":
        $result = strval($data);
        break;
      case "date":
        $date = str_replace('/', '-', $data ); // แทนที่เครื่องหมาย "/" ด้วย "-"
        $result = date("Y-m-d", strtotime($date)); // แปลงรูปแบบของวันที่เป็น ปี-เดือน-วัน
        break;
      default:
        $result = "";
    }

    return $result;

  }

  function return_sql_attr_type($var_type,$data){
    $result;
    switch ($var_type) {
      case "integer":
        $result = "INT";
        break;
      case "double":
        $result = "double";
        break;
      case "string":
        $result = "VARCHAR(255)";
        break;
      case "date":
        $result = "DATE";
        break;
      default:
        $result = "VARCHAR(255)";
    }
    return $result;
  }


}
?>
<?php
  class connectDB{
    public $insert_sql = "";
    public function conntect_database(){
      $con = mysqli_connect("localhost","root","","line") or die("Error: " . mysqli_error($con));
 
      mysqli_query($con, "SET NAMES 'utf8' ");

      return $con;
    }
    public function insert_data($arr_row,$tb_name){
      $conn = $this->conntect_database(); //เรียกใช้ method conntect_database

      $sql = $this->insert_sql." VALUES (";
      $i = 0;
      $len = count($arr_row); //นับจำนวน array
      foreach($arr_row as $row){ // วนลูปตามจำนวนรายการ (Row)
        if ($i == $len - 1) {  // ตรวจสอบถ้าเป็นข้อมูลรายการสุดท้าย
          $sql .= "'".$row."'";
        }
        else{    
          $sql .= "'".$row."',";
        }
        $i++;
      }

      $sql.=")";
      return mysqli_query($conn, $sql); 
      mysqli_close($conn);
      //echo $sql."<br>";
    }
    
    public function insert_table($arr_col,$tb_name){
      $conn = $this->conntect_database(); //เรียกใช้ method conntect_database

      $sql = "CREATE TABLE ".$tb_name." (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,";
      echo $sql;
      $this->insert_sql = "INSERT INTO ".$tb_name."(";
      $i = 0;
      $len = count($arr_col); //นับจำนวน array
      foreach ($arr_col as $item) { // วนลูปตามจำนวนคอร์ลัมภ์
        $cell_col = trim($item);
        $col_name = str_replace('-', '_', $cell_col); // แทนที่ช่องว่าง (Space) ด้วย _ (Under score)
        $col_name2 = str_replace(' ', '_', $col_name); // แทนที่ช่องว่าง (Space) ด้วย _ (Under score)

        if ($i == $len - 1) {  // ตรวจสอบถ้าเป็นข้อมูลรายการสุดท้าย
          $this->insert_sql .=$col_name2;
          $sql.="$col_name2"." VARCHAR(255) NOT NULL";
        }
        else{
          $this->insert_sql .=$col_name2.",";
          $sql.="$col_name2"." VARCHAR(255) NOT NULL,";
        }
        $i++;  
      }
      $this->insert_sql.=")";
      $sql.=")";
      return mysqli_query($conn, $sql); 
      mysqli_close($conn);
      echo $sql."<br>";
    }

    // public function select_data($query){
    //   return $output;
    // }
  }
?>
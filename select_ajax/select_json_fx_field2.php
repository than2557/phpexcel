<?php
    include '../configDB.php';

   $select_sql = 'SELECT * FROM tb_test45 WHERE h2_1 <= "02" AND h2_1 != "" ORDER BY table_name_id';

    $conn = $DBconnect;
 
    $response = array();

    $row_data = array();

    $row_raw_data = array();

    if(isset($_POST['sql'])){

      //$tb_name = $_POST['table_name']; 

      $sql = $_POST['sql'];

      // header
      $header_array = array();

      // array_push($header_array,'primary_key'); // คอลัมภ์แรก

      // $result = mysqli_query($conn,$sql2);

      // if($result){  
      //    while($row = mysqli_fetch_row($result)){ // push หัวตาราง
      //       array_push($header_array,$row[1]);
      //    }
      // }

      // data
      $result = mysqli_query($conn,$sql);
         
      if($result){
         while($row = mysqli_fetch_row($result)){  // push ข้อมูล
           
            $data = array();

            $data['ลำดับที่'] = $row[1];

            if($row[2] != 0){
               $data['รายการ'] = "0".$row[2]."".$row[3];
            }
            else{
               $data['รายการ'] = $row[3];
            }
           
            $data['WBS'] = $row[4];
            $data['วงเงินงบประมาณปัจจุบัน'] = $row[5];
            $data['รวมจ่ายจริงถึงสิ้นปีก่อนหน้า'] = $row[6];
            $data['รวมจ่ายจริงปีปัจจุบัน'] = $row[7];
            $data['รวมจ่ายจริง'] = $row[8];
            $data['เงินล่วงหน้าปีก่อนหน้า'] = $row[9];
            $data['เงินประกันปีก่อนหน้า'] = $row[10];
            $data['เงินล่วงหน้าปีปัจจุบัน'] = $row[11];
            $data['เงินประกันปีปัจจุบัน'] = $row[12];
            $data['เงินล่วงหน้าคงเหลือ'] = $row[13];
            $data['เงินประกันค้างจ่าย'] = $row[14];
            $data['รวมจ่ายทั้งสิ้นปีก่อนหน้า	'] = $row[15];
            $data['รวมจ่ายทั้งสิ้นปีปัจจุบัน	'] = $row[16];
            $data['รวมจ่ายทั้งสิ้น'] = $row[17];
            $data['งบประมาณหักรวมจ่ายทั้งสั้น'] = $row[18];
            
            $data['PO_หัก_รวมจ่ายจริง_PO'] = $row[19];
            $data['งบประมาณหักรวมจ่ายจริง'] = $row[20];
            $data['IR_คงเหลือ'] = $row[21];
            $data['GR_คงเหลือ'] = $row[22];
            $data['PO_คงเหลือ'] = $row[23];
            $data['PR_คงเหลือ'] = $row[24];
            $data['วงเงินคงเหลือยังไม่ดำเนินการ	'] = $row[25];
            $data['สถานะ'] = $row[26];
            $data['วันที่สร้าง'] = $row[27];
            $row_data[] = $data;

            $data['primary_key'] = $row[0];
            $row_raw_data[] = $data;
         }
      }
   }   
   $response['data'] = $row_data;
   $response['raw_data'] = $row_raw_data;
   echo json_encode($response,JSON_UNESCAPED_UNICODE); // แสดงข้อมูลแบบ json
?>
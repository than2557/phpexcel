<?php
require('configDB.php');
$conn=$DBconnect;


$task_name=$_POST['task_name'];
$user_id = $_POST['id_user'];

$sql ="INSERT INTO `task_user`(`user_id`,`task_name`) VALUES ('$user_id','$task_name')";
    $Query = mysqli_query($conn,$sql);
    $task_user_id = mysqli_insert_id($conn);


$numrow = count($_POST['colum']);
$row =$numrow-1;

for ($i=0; $i <=$row;$i++) { 
   $datatype =$_POST['datatype'][$i];
   $colum =$_POST['colum'][$i];


//echo $task_user_id;
$sql2 = "INSERT INTO `template_tb`(`task_user_id`, `colum_name`,`datatype`) VALUES ($task_user_id,'$colum','$datatype')";
$Query = mysqli_query($conn,$sql2);
//echo $sql2;
}


$a = 1;

$sql_create_table = "CREATE TABLE `test_import_excel`.`$task_name` ( 
   `table_name_id` INT NOT NULL AUTO_INCREMENT, ";
   

for ($a;$a<=$row+1;$a++) {
   
   $head = "h".$a;
   
   if($a == $row+1){

      if($_POST['colum'][$a-1] == "รายการ"){
         $sql_create_table.= "`".$head."_1` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,";
         $sql_create_table.= "`".$head."_2` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL";
       
      }
      else{
         $sql_create_table.= "`$head` ".$_POST['datatype'][$a-1]."  NOT NULL";
      }
      
   }
   else{
      if($_POST['colum'][$a-1] == "รายการ"){
         $sql_create_table.= "`".$head."_1` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,";
         $sql_create_table.= "`".$head."_2` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,";
      }
      else{
         $sql_create_table.= "`$head`  ".$_POST['datatype'][$a-1]." NOT NULL,";
      }
      
   }
      
}

$sql_create_table.= " ,PRIMARY KEY (`table_name_id`)
) ENGINE = InnoDB DEFAULT CHARSET=utf8;";

//$Query = mysqli_query($conn,$sql_create_table);
 echo $sql_create_table;

//mysqli_query($conn,$sql_create_table);

?>
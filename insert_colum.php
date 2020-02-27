<?php
require('configDB.php');
$conn=$DBconnect;



$user_id = $_POST['id_user'];
$task_user_id= $_POST['select_task'];



$sql2 = "SELECT * FROM task_user WHERE  task_user_id= '$task_user_id'";
$resultask = $conn->query($sql2);
$task = $resultask->fetch_assoc();
$taskarr =array_values($task );
echo "<br>";
echo $sql2;
echo "<br>";

$taskname = $taskarr[2];

$sql = "SELECT * FROM template_tb WHERE task_user_id='$task_user_id'";
$resulttb = $conn->query($sql);
$tb = $resulttb->fetch_assoc();
echo "<br>";
echo $sql;


$count_sql = count($tb);
$rowsql = $count_sql;
echo "<br>";
echo "rowsql".$rowsql.'<br>';
$h =$count_sql-1;

$head_before = 'h'.$h;
echo "<br>";
echo $head_before;


$numrow = count($_POST['colum']);
echo "<br>";
echo "numrow".$numrow.'<br>';

for($i=$rowsql;$i<=$numrow+3;$i++){

    $head = "h".$i;
    $data = $_POST['datatype'][$i-4];
    print_r($head).'\n';  
    print_r($data).'\n';  
    $colum =$_POST['colum'][$i-4];
   
    $sql3 ="ALTER TABLE `$taskname` ADD `$head` $data CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL AFTER $head_before;";
    echo $sql3;
    $Query = mysqli_query($conn,$sql3);



    $inserttem = "INSERT INTO `template_tb`(`task_user_id`, `colum_name`, `datatype`) VALUES ('$task_user_id','$colum','$data')";
    $Query = mysqli_query($conn,$inserttem);
}


// $count_sql = count($_POST['$Query']);
// $sql ="INSERT INTO `task_user`(`user_id`,`task_name`) VALUES ('$user_id','$task_name')";
//     $Query = mysqli_query($conn,$sql);
//     $task_user_id = mysqli_insert_id($conn);



// for ($i=0; $i <=$row;$i++) { 
//    $datatype =$_POST['datatype'][$i];
//    $colum =$_POST['colum'][$i];


// //echo $task_user_id;
// $sql2 = "INSERT INTO `template_tb`(`task_user_id`, `colum_name`,`datatype`) VALUES ($task_user_id,'$colum','$datatype')";
// $Query = mysqli_query($conn,$sql2);
// //echo $sql2;
// }
// $a = 1;

// $sql_create_table = "CREATE TABLE `test_import_excel`.`$task_name` ( 
//    `table_name_id` INT NOT NULL AUTO_INCREMENT, ";
   

// for ($a;$a<=$row+1;$a++) {
   
//    $head = "h".$a;
   
//    if($a == $row+1){

//       if($_POST['colum'][$a-1] == "รายการ"){
//          $sql_create_table.= "`".$head."_1` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,";
//          $sql_create_table.= "`".$head."_2` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL";
       
//       }
//       else{
//          $sql_create_table.= "`$head` ".$_POST['datatype'][$a-1]."  NOT NULL";
//       }
      
//    }
//    else{
//       if($_POST['colum'][$a-1] == "รายการ"){
//          $sql_create_table.= "`".$head."_1` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,";
//          $sql_create_table.= "`".$head."_2` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,";
//       }
//       else{
//          $sql_create_table.= "`$head`  ".$_POST['datatype'][$a-1]." NOT NULL,";
//       }
      
//    }
      
// }

// $sql_create_table.= " ,PRIMARY KEY (`table_name_id`)
// ) ENGINE = InnoDB;";

// //$Query = mysqli_query($conn,$sql_create_table);
//  //echo $sql_create_table;

// mysqli_query($conn,$sql_create_table);

?>
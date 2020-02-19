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


echo $task_user_id;
$sql2 = "INSERT INTO `template_tb`(`task_user_id`, `colum_name`,`datatype`) VALUES ($task_user_id,'$colum','$datatype')";
$Query = mysqli_query($conn,$sql2);
echo $sql2;
}
$a = 1;

for ($a;$a<=$row+1;$a++) {
   $head = "h".$a.'<br>';
   echo $head;
$sql="CREATE TABLE $task_name (
    `tb_id` int(11) NOT NULL,
    `head` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
   
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
   
}



?>
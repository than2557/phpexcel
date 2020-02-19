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
// for ($j=0; $j <=$row ; $j++) { 
//     $datatype =$_POST['datatype'][$i];
//     $colum =$_POST['colum'][$i]; 

//     $headtb = 

// }



?>
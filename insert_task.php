<?php
require('configDB.php');
$conn=$DBconnect;


$task_name=$_POST['task_name'];
$user_id = $_POST['id_user'];

echo $task_name;
echo $user_id;

$sql ="INSERT INTO `task_user`(`user_id`,`task_name`) VALUES ('$user_id','$task_name')";
 $Query = mysqli_query($conn,$sql);
    echo $sql;
?>
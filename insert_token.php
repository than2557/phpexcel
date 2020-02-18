<?php
 session_start();
require('configDB.php');
$conn=$DBconnect;
$id_user=$_SESSION['id_user'];
$token=$_POST['tokenname'];
$namegroup_line=$_POST['groublinename'];
$task_id=$_POST['task_id'];
print_r($_POST);
$sql ="INSERT INTO `token_line`(`token`,`task_id`,`id_user`,`namegroup_line`) VALUES ('$token','$task_id','$id_user','$namegroup_line')";
$Query = mysqli_query($conn,$sql);

?>
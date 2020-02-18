<?php
require('configDB.php');
$conn=$DBconnect;


$task_name=$_POST['task_name'];
$user_id = $_POST['id_user'];

$i = 0;
$sql ="INSERT INTO `task_user`(`user_id`,`task_name`) VALUES ('$user_id','$task_name')";
    $Query = mysqli_query($conn,$sql);

foreach($_POST['colum']as $vaulecol){

    
    // settype($vaulecol, "string");

    echo "Array Index [$i] : ".$vaulecol."<br/>";
    $i++;

    $task_user_id = mysqli_insert_id($conn);
    $sql2 = "INSERT INTO `template_tb`(`task_user_id`, `colum_name`) VALUES ($task_user_id,'$vaulecol')";
    $Query = mysqli_query($conn,$sql2);
    echo $sql2;
}

?>
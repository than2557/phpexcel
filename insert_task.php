<?php
require('configDB.php');
$conn=$DBconnect;


$task_name=$_POST['task_name'];
$user_id = $_POST['id_user'];

// $sql ="INSERT INTO `task_user`(`user_id`,`task_name`) VALUES ('$user_id','$task_name')";
//     $Query = mysqli_query($conn,$sql);
    $i=0;
foreach($_POST['colum']as$vaulecol){

$countcolum[$i] = count($vaulecol[$i]);
$i++;
print_r($countcolum);


}
for($i=0;$i<=$countcolum;$i++){

    $datatype=$_POST['datatype'][$i];
    $task_user_id = mysqli_insert_id($conn);
    $sql2 = "INSERT INTO `template_tb`(`task_user_id`, `colum_name`,`datatype`) VALUES ($task_user_id,'$vaulecol','$datatype')";
    $Query = mysqli_query($conn,$sql2);
    echo $sql2;
}

?>
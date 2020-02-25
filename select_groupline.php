<?php

require('configDB.php');
$conn=$DBconnect;


$task_user_id= $_POST['task_user_id'];
// echo $task_user_id;


$p_id = isset($task_user_id) ? $task_user_id : "";

$sql2 ="SELECT * FROM task_user WHERE $p_id";
$result2 = $conn->query($sql2);
$row = $result2->fetch_assoc();

$tbb = $row['task_name'];

$sqltb = "SELECT * FROM $tbb";
 

$sql = "SELECT * FROM token_line  WHERE  task_id ='$p_id' ";
$result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
		?>
        <option value="<?php $row['id']; ?>">
        <?php echo $row['namegroup_line'];?> 
        </optio>

   <?php }?>
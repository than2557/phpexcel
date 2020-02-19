<?php

require('configDB.php');
$conn=$DBconnect;


$task_user_id= $_POST['task_user_id'];
// echo $task_user_id;


$p_id = isset($task_user_id) ? $task_user_id : "";


$sql = "SELECT * FROM token_line  WHERE  task_id ='$p_id' ";
$result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
		?>
        <option value="<?php $row['id']; ?>">
        <?php echo $row['token'];?> 
        </optio>

   <?php }?>
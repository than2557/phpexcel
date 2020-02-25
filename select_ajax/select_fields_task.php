<?php
   require('configDB.php');
   $conn=$DBconnect;

   $json = array();

   $task_user_id= $_POST['task_id'];


   $p_id = isset($task_user_id) ? $task_user_id : "";


   $sql2 ="SELECT * FROM template_tb WHERE task_user_id = '$p_id'";
    
   $result = mysqli_query($conn,$sql2);

   while($row = mysqli_fetch_row($result)){
      $json[] = $row[2];
   }

   echo json_encode($json);
   // $result2 = $conn->query($sql2);
   // $row = $result2->fetch_assoc();

   // $tbb = $row['task_name'];

   // $sqltb = "SELECT * FROM $tbb";
   // $resulttb = $conn->query($sqltb);
   // $tb = $resulttb->fetch_assoc();
   // $numrow = count($tb);
   // $row =$numrow-1;
   // $test=array_values($tb);
 
   
   // for($i=0;$i<=$row;$i++){
   // echo $test[$i];
   // }
?>
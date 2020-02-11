<?php
require('configDB.php');

$table = $_POST['table_nameeeeeeeee'];
// foreach($_POST as $post){
//    var_dump($post);
$oplist[] = $_POST['oplist'];
$fieldlist[] = $_POST['fieldlist'];
$condition_opv[] = $_POST['condition_opv'];

// }
 $arr = array('1'=>$oplist,'2'=>$fieldlist,'3'=>$condition_opv);
 echo json_encode($arr[2]);
//  $sql = "SELECT * FORM $table WHERE $arr[2]";
//  echo $sql;
//  $result=$conn->query($sql);

?>
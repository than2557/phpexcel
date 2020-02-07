<?php

include '../configDB.php';

$conn = $DBconnect;



$table_name = $_POST['table_name'];

$sql = "SELECT * FROM ".$table_name;

$result = mysqli_query($conn, $sql);

$finfo = mysqli_fetch_fields($result);

foreach ($finfo as $val) {
  echo "<option value='".$val->name."'>".$val->name."</option>";
   
}
mysqli_free_result($result);


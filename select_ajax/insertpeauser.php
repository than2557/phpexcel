<?php
	include_once("configDB.php");
    $conn =  $DBconnect;
    
$username = $_POST["username"];
$name = $_POST["name"];
$lastname = $_POST["lastname"];
$Department = $_POST["Department"];
$Position = $_POST["Position"];
$levelpea = $_POST["levelpea"];

$sql = "INSERT INTO `userpea`(`username`, `name`, `lastname`, `Department`, `Position`, `levelpea`) VALUES ('$username','$name','$lastname','$Department','$Position','$levelpea')";
$Query=$conn->query($sql);
  

?>


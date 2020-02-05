<?php
	include_once("configDB.php");
    $conn =  $DBconnect;
    
$username = $_POST["username"];
$name = $_POST["name"];
$lastname = $_POST["lastname"];
$Department = $_POST["Department"];
$Position = $_POST["Position"];
$levelpea = $_POST["levelpea"];
$img_em= null;
$password = md5($username);
$sql = "INSERT INTO `userpea`(`username`, `name`, `lastname`, `Department`, `Position`, `levelpea`) VALUES ('$username','$name','$lastname','$Department','$Position','$levelpea')";
$Query=$conn->query($sql);
  
$sql2 = "INSERT INTO `empolyee`(`username`,`password`,`name`,`leveltest`,`img_em`) VALUES('$username','$password','$name','0','$img_em')";
$Query=$conn->query($sql2);
echo $sql2;

?>


<?php
//connect.php

$conn = new mysqli("localhost","root","","line");
if($conn->connect_error){
	die("Connection failed:".$conn->connect_error);
}
$conn->query("SET NAMES UTF8"); 

?>	

<!DOCTYPE html> <html>
<head>
	<title></title>
</head>
<body>
<?php

require_once("connect.php");

$username=$_POST['username'];
$password=md5($_POST['password']);
$name=$_POST['name'];
// $img_em=$_POST['img_em'];

if(move_uploaded_file($_FILES["img_em"]["tmp_name"],"upload/".$_FILES['img_em']["name"]))
{
	echo "copy/Upload Complete<br>";
	$picture=$_FILES["img_em"]["name"];



	$sql = "INSERT INTO `empolyee`(`username`, `password`, `name`, `leveltest`, `img_em`)VALUES('$username','$password','$name',0,'$picture')";

	$Query =$conn->query($sql);
	echo $sql;
	
}



?>

</body>
<!-- <meta http-equiv="refresh" content="0;URL=addem.php"> -->
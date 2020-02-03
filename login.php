<?php
 session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="icon" type="img/png" href="iconpea.png"/>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<title></title>
</head>
<body>
	<?php
		include_once("configDB.php");

		$conn = $DBconnect;

		include("session_check.php"); 

		//require_once("inc/db_connect.php"); 
		$username=$_POST["username"];
		$password=md5($_POST["password"]);
		$sql="select * from empolyee where username='$username' and password='$password'";
		$Query= mysqli_query($conn,$sql);
		//echo $sql;
		$rows = mysqli_num_rows($Query);
		//echo $rows;
		$result = $Query->fetch_assoc();
		if($rows>0 && $result['leveltest']==0)
		{
			$_SESSION['username']=$username;
			$_SESSION['id_user']=$result['id_user'];
            $_SESSION['name']=$result['name'];
            
            $filename  = $result["img_em"];
            $destination = "upload/" . $result["img_em"]; 
            // move_uploaded_file($filename, $destination); 

            $_SESSION['img_em']=  $destination;
			//echo "USER";
			?>
				<meta http-equiv="refresh" content= "0; url=index_test.php">    
			<?php
		}
		else if($rows>0 && $result['leveltest']==1)
		{
			$_SESSION['username']=$username;
			$_SESSION['id_user']=$result['id_user'];
			$_SESSION['name']=$result['name'];
			//echo "ADMIN";
		?>
				<meta http-equiv="refresh" content= "0; url=index_admin.php">
			<?php
		}
		else
		{ ?>
			<p>

			<?php	echo "Login fail."; ?>
				<meta http-equiv="refresh" content= "0; url=loginfail.php">
				<!--<meta http-equiv="refresh" content= "2; url=index_real.php">-->

		<?php } ?>


		


</body>
</html>
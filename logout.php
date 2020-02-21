<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title>ออกจากระบบ</title>
</head>
<body>
<meta  http-equiv="refresh" content="0; url=login.php"> 
<script type="text/javascript">
	window.location.href="loginform.php"
</script>
</body>
</html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
<script type="text/JavaScript">


//   -->
</script>
</head>

<body>

</body>
</html>
<?php

date_default_timezone_set("Asia/Bangkok");
$date_stamp =  date("Y-m-d G:i");
echo "date_stamp".$date_stamp.'<br>';

$timeline = $_POST['dateaert'];
$tokenline = $_POST['line_group_name'];
echo "timeline".$timeline.'<br>';

if($timeline == $date_stamp ){	
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	date_default_timezone_set("Asia/Bangkok");

	$sToken = "$tokenline";
	$sMessage = "testส่งข้อมูลตามเวลา....";

	
	$chOne = curl_init(); 
	curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt( $chOne, CURLOPT_POST, 1); 
	curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
	$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
	curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
	curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec( $chOne ); 

	//Result error 
	if(curl_error($chOne)) 
	{ 
		echo 'error:' . curl_error($chOne); 
	} 
	else { 
		$result_ = json_decode($result, true); 
		echo "status : ".$result_['status']; echo "message : ". $result_['message'];
	} 
	curl_close( $chOne );   
}


	elseif($date_stamp != $timeline)
	{
		$page = $_SERVER['PHP_SELF'];
		$sec = "5";
		header("Refresh: $sec; url=$page");
		$newdate_stamp =  date("Y-m-d G:i");
		echo "date_stamp".$newdate_stamp.'<br>';


	}
	else{

		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		date_default_timezone_set("Asia/Bangkok");
	
		$sToken = "$tokenline";
		$sMessage = "testส่งข้อมูลตามเวลา....";
	
		
		$chOne = curl_init(); 
		curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
		curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
		curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
		curl_setopt( $chOne, CURLOPT_POST, 1); 
		curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
		$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
		curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
		curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
		$result = curl_exec( $chOne ); 
	
		//Result error 
		if(curl_error($chOne)) 
		{ 
			echo 'error:' . curl_error($chOne); 
		} 
		else { 
			$result_ = json_decode($result, true); 
			echo "status : ".$result_['status']; echo "message : ". $result_['message'];
		} 
		curl_close( $chOne );   
	}
	


?>
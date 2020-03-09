<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
<script type="text/JavaScript">

function timedRefresh(timeoutPeriod) {
	setTimeout("location.reload(true);",timeoutPeriod);
}
//   -->
</script>
</head>

<body onLoad="JavaScript:timedRefresh(3000);">

</body>
</html>
<?php
$page = $_SERVER['PHP_SELF'];
$sec = "10";
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
	elseif($date_stamp != $timeline){

		// echo "datastamp !=".":".$date_stamp;
		// echo "timeline !=".":".$timeline;
if($date_stamp > $timeline){
	while($date_stamp != $timeline){
		$i=0;
		$i++;
		$newtimeline = date('Y-m-d H:i',strtotime('+0 hour +$i minutes',strtotime($timeline)));
		echo 'newtimeline'.$newtimeline;
	
	}
	
}
elseif($date_stamp < $timeline){
	while($date_stamp != $timeline){
		$j=0;
		$newdate_stamp = date('Y-m-d H:i',strtotime('+0 hour +$j minutes',strtotime($date_stamp)));
		echo 'newdate_stamp'.$newdate_stamp;
		$j++;
	}
}	

	}
	


?>
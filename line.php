<?php
require('configDB.php');
$token = $_POST["token"];
$alert_id =$_POST["alert_id"];
$message = $_POST["record"];

$file_path = $_POST['file_path'];

$root_folder = 'phpexcel/';

$host= gethostname();

$ip = gethostbyname($host);


$ip = $ip.'/';

$line_file_path = $ip.$root_folder.$file_path;

$sql ="UPDATE `alert` SET `status`= 1 WHERE $alert_id";
$Query=$conn->query($sql);

header('Content-Type: text/html; charset=utf-8');

 $line_api = "https://notify-api.line.me/api/notify";

 $queryData = array('message' => "จำนวนรายการ ".$message."\n".$line_file_path);
 $queryData = http_build_query($queryData,'','&');
 $headerOptions = array( 
         'http'=>array(
             'method'=>'POST',
             'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                     ."Authorization: Bearer ".$token."\r\n"
                     ."Content-Length: ".strlen($queryData)."\r\n",
             'content' => $queryData
         ),
 );
 $context = stream_context_create($headerOptions);
 $result = file_get_contents($line_api,FALSE,$context);
 $res = json_decode($result);

?>
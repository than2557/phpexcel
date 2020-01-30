<?php
$token = $_POST["token"];

$message = $_POST["record"];
<<<<<<< Updated upstream

$file_path = $_POST['file_path'];

$root_folder = 'phpexcel/';

$ip = '127.0.0.1/';

$line_file_path = $ip.$root_folder.$file_path;

header('Content-Type: text/html; charset=utf-8');
<<<<<<< Updated upstream
=======
//  echo $token."<br>";
//  echo $message;
>>>>>>> Stashed changes
=======

>>>>>>> Stashed changes
 $line_api = "https://notify-api.line.me/api/notify";

 $queryData = array('message' => $message."\n".$line_file_path);
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
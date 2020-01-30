<?php
$token = $_POST["token"];

$message = $_POST["record"];
<<<<<<< Updated upstream

header('Content-Type: text/html; charset=utf-8');
=======
//  echo $token."<br>";
//  echo $message;
>>>>>>> Stashed changes
 $line_api = "https://notify-api.line.me/api/notify";

 $queryData = array('message' => $message);
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
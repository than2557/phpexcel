<?php

//print_r($_POST);

$get_psot = $_POST;

$t=time();

$file_name = $t.".".$get_psot['name'];

$file_path = '../webdatarocks_saves/'.$file_name;

//echo 
if(file_put_contents($file_path,$get_psot['report']) !== false){
   chmod($file_path,0755); // แก้ไข permission
}

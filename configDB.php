<?php
define('DB_SERVER', 'localhost'); // ประกาศตัวแปรค่าคงที่ชื่อ DB_SERVER
define('DB_USERNAME', 'root'); // ประกาศตัวแปรค่าคงที่ชื่อ DB_USERNAME
define('DB_PASSWORD', ''); // ประกาศตัวแปรค่าคงที่ชื่อ DB_PASSWORD
define('DB_NAME', 'test_import_excel'); // ประกาศตัวแปรค่าคงที่ชื่อ DB_NAME
$DBconnect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$DBconnect) {
    die("การเชื่อมต่อล้มเหลว" . mysqli_connect_error());
}

return $DBconnect;
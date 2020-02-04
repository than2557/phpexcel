<?php
	include("idm-service.php");
	$service = new IDMService();
$username = $_POST["username"];

echo $username;

$results1 = $service->getEmployeeInfoByUsername("93567815-dfbb-4727-b4da-ce42c046bfca",$username);
$_SESSION['FirstName']= $results1['GetEmployeeInfoByUserName']['ResultObject']['FirstName'];
$_SESSION['LastName']= $results1['GetEmployeeInfoByUserName']['ResultObject']['LastName'] ;

echo $_SESSION['FirstName'];
echo $_SESSION['LastName'];

?>
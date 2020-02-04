<?php
	require_once("idm-service.php");
	$service = new IDMService();
$username = $_POST["username"];

echo $username;

$results1 = $service->getEmployeeInfoByUsername("93567815-dfbb-4727-b4da-ce42c046bfca",$username);

echo '<pre>';
var_dump($results1);
echo '</pre>';

 $_SESSION["Username"]= $results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["Username"];
 $_SESSION["FirstName"]= $results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["FirstName"];
 $_SESSION["LastName"]= $results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["LastName"];
 $_SESSION["Position"]= $results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["Position"];
 $_SESSION["LevelDesc"]= $results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["LevelDesc"];


 
 echo $_SESSION["Username"];
 echo $_SESSION["FirstName"];
 echo $_SESSION["LastName"];
 echo $_SESSION["Position"];
 echo $_SESSION["LevelDesc"];
?>
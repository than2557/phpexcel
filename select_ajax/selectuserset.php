<?php
	require_once("idm-service.php");
	$service = new IDMService();
$username = $_POST["username"];

<<<<<<< Updated upstream
// echo $username;

$results1 = $service->getEmployeeInfoByUsername("93567815-dfbb-4727-b4da-ce42c046bfca",$username);

// echo '<pre>';
// var_dump($results1);
// echo '</pre>';

//  $_SESSION["Username"]= $results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["Username"];
//  $_SESSION["FirstName"]= $results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["FirstName"];
//  $_SESSION["LastName"]= $results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["LastName"];
//  $_SESSION["Position"]= $results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["Position"];
//  $_SESSION["LevelDesc"]= $results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["LevelDesc"];


$arr = array('1'=>$results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["Username"],
'2'=>$results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["FirstName"],
'3'=>$results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["LastName"],
'4'=>$results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["PositionDescShort"],
'5'=>$results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["LevelDesc"],
'6'=>$results1["GetEmployeeInfoByUsernameResult"]["ResultObject"]["DepartmentShort"]
);


echo json_encode($arr);
=======
//echo $username;

$results1 = $service->getEmployeeInfoByUsername("93567815-dfbb-4727-b4da-ce42c046bfca",$username);
// $_SESSION['FirstName']= $results1['GetEmployeeInfoByUserName']['ResultObject']['FirstName'];
// $_SESSION['LastName']= $results1['GetEmployeeInfoByUserName']['ResultObject']['LastName'] ;

// echo $_SESSION['FirstName'];
// echo $_SESSION['LastName'];
>>>>>>> Stashed changes

print_r($results1);

?>	
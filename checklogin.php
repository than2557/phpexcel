<?php 
	

	require_once("idm-service.php");
	
	$service = new IDMService();
	$authenKey = "3a243291-44d0-4171-8b17-347cfc1472ea";
	$userName = $_POST['txtUserName'];
	$password = $_POST['txtPassword'];
	
	//$conn = new PDO($db_dns, $db_user, $db_password);

  
	
//echo $userName."1".$password;
	if($userName!="" && $password!=""){
		//echo $userName."2".$password;
//		 $results = $service->login('76A167DD-3936-4443-A1EB-198E71456E27',$userName, $password); 
		 // $results = $service->login('e3358fc1-99ad-4b21-8237-7c9c8ba1c5dc',$userName, $password);
		 $results = $service->login($authenKey,$userName, $password);
		 $ResponseCode=$results['LoginResult']['ResponseCode'];	
		 $ResponseMsg=$results['LoginResult']['ResponseMsg']; 

		 $err = $results['LoginResult']['ResultObject']['Result'];
		if ($err=="false") {
			
			echo '<script type="text/javascript">alert("'.$ResponseMsg.'"); window.location.href = "login.php";</script>';

		}
		
		else{//login ok
			//echo "err";
		  // $ResponseCode=$results['LoginResult']['ResponseCode'];	
		  // $ResponseMsg=$results['LoginResult']['ResponseMsg'];
		  // echo "ResponseCode".$ResponseCode;
		  // echo "ResponseMsg".$ResponseMsg;
		 //print_r($results);
		 if($ResponseMsg=="Success" and $ResponseCode=="WSV0000"){
			 
   $empno = $userName;

		
		
		
			//echo "ok";
			$userId = $results['LoginResult']['ResultObject']['UserId'];
			$results1 = $service->getEmployeeInfoByUserId("93567815-dfbb-4727-b4da-ce42c046bfca",$userId); 
			$_SESSION['isLogin'] = "Y";
			
			$sessionId= $results['LoginResult']['ResultObject']['SessionId'];
			$_SESSION['Username']= $results1['GetEmployeeInfoByUserIdResult']['ResultObject']['Username'] ;
			$_SESSION['FirstName']= $results1['GetEmployeeInfoByUserIdResult']['ResultObject']['FirstName'] ;
			$_SESSION['LastName']= $results1['GetEmployeeInfoByUserIdResult']['ResultObject']['LastName'] ;
			$_SESSION['Peacode']= $results1['GetEmployeeInfoByUserIdResult']['ResultObject']['Peacode'];
			$_SESSION['Peaname']= $results1['GetEmployeeInfoByUserIdResult']['ResultObject']['Peaname'];
			 
			$uid=$_SESSION['Username'];
			
			
			
			////////////// check table user
		/*
				 $qr = "SELECT * FROM [KpitDB].[dbo].[MM_USER] where MM_USER  = '$uid'";  
        
$stmt = sqlsrv_query($conn, $qr);

while ($res = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
	
	//echo  $res['MM_USER'];
if(isset($res['MM_USER'])){
	//	header("Location: admin.php");
	/*
	if($uid='505972'){
		$_SESSION['Peacode'] = 'G08101';
		
	}
	*/
	
	$office = $res['OfficePlant'];
$_SESSION['code'] = substr($res['OfficePlant'],0,4);
	$_SESSION['area'] = substr($office,0,1);

		if(substr($_SESSION['Peacode'],1,3)=='000'){
			header("Location: admin.php");
		}
		else {
			header("Location: report.php");
		}
		
	}
	else{
		header("Location:index.php");
	}	
}
?>
 <!-- The Modal -->
 <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">แจ้งเตือน</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         คุณไม่มีสิทธิ์ กรุณาติดต่อแอดมิน
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
		<a href="logout.php" class="btn btn-danger" role="button">ตกลง</a>
        </div>
        
      </div>
	  </div>
	  </div>
	  <button type="button" id="btn" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
   x
  </button>

	  <?php
	  echo "<script>";
	  echo "$( document ).ready(function() {";
	  echo "document.getElementById('btn').click();";
	  echo "});</script>";
echo "คุณไม่มีสิทธิ์";
//header("Location:logout.php");
////////////////////


		
	}else{
		echo "idm error";
	}	
		 
		
		}
	}else{
		header("Location: login.php");
	}

?>


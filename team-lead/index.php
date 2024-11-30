<?php
ob_start();
include"config.php";



$current_file = $_SERVER['SCRIPT_NAME'];
@$http_referer = $_SERVER['HTTP_REFERER'];
if($http_referer === $http_referer){
$http_ref="index.php";
}else{
$http_ref=$http_referer;	
}

$loader = new Loader();
$time = time(); 
$update_time = date('Y-m-d');
$update = date('Y-m-d');

if(isset($_SESSION['password']) AND !empty($_SESSION['username']))
{
   
   $loader->query='SELECT * FROM `0_team_lead` WHERE `password`="'.$_SESSION['password'].'" AND `username`="'.$_SESSION['username'].'"';
		
		 if($result = $loader->query_result()){
	 
		
			foreach($result as $row)
			{
					
			$admincode    =  $row['admincode']; 
			$marketer_code=  $row['team_lead_id'];  
			$photo        =  $row['photo']; 
			$username     =  $row['username'];
			$password     =  $row['password'];
			$fullname     =  $row['fullname'];
			$phone        =  $row['phone'];
			$date_reg     =  $row['date_reg'];
			$token        =  $row['token'];
			$bank_name    =  $row['bank_name'];
			$acct_name    =  $row['acct_name'];
			$acct_number  =  $row['acct_number']; 
			$sub_start    =  $row['date_reg'];
			$agent_approved_by  =  $row['agent_approved_by'];
			$contract_expire    =  $row['contract_expire'];
			$contract_expire    =  $row['contract_expire'];
			$agent_firm_name    =  $row['agent_firm_name'];
 
 
			}
	 
	 
   
	         include 'homepage.php';
	 
		 }

		 if(empty($username)){
			header("Location: logout.php");
		 }
 
} 
else 
{
	 include "login_core.php";
}


?>
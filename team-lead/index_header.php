<?php
ob_start();
include("config.php");



 
$Loader = new Loader();
$time = time(); 
$update_time = date('Y-m-d');
$update = date('Y-m-d');

if(isset($_SESSION['password']) AND !empty($_SESSION['username']))
{
  
   $Loader->query='SELECT * FROM `0_team_lead` WHERE `password`="'.$_SESSION['password'].'" AND `username`="'.$_SESSION['username'].'"';
		
		 if($result = $Loader->query_result()){
	 
		
			foreach($result as $row)
			{
					
			$photo        =  $row['photo']; 
			$admincode    =  $row['admincode']; 
			$marketer_code=  $row['team_lead_id']; 
			$username     =  $row['username'];
			$password     =  $row['password'];
			$fullname     =  $row['fullname'];
			$phone        =  $row['phone'];
			$date_reg     =  $row['date_reg'];
			$token        =  $row['token'];
			$bank_name    =  $row['bank_name'];
			$acct_name    =  $row['acct_name'];
			$acct_number  =  $row['acct_number'];
			$agent_approved_by  =  $row['agent_approved_by'];
			$contract_expire    =  $row['contract_expire'];
			$contract_expire    =  $row['contract_expire'];
			$agent_firm_name    =  $row['agent_firm_name'];
		 
		     //UNIT BANK 0032393701 FREEDOM APOSTOLIC
 
 
			}
	 
	 
   
	         
	 
		 }


		 if(empty($username)){
			header("Location: logout.php");
		 }
 
} 
else 
{
	 header("Location: index.php");
}


?>
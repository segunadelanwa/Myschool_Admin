<?php
ob_start();
include("config.php");



 
$Loader = new Loader();
$time = time(); 
$update_time = date('Y-m-d');
$update = date('Y-m-d');

if(isset($_SESSION['password']) AND !empty($_SESSION['username']))
{
  
   $Loader->query='SELECT * FROM `0_marketer_reg` WHERE `password`="'.$_SESSION['password'].'" AND `username`="'.$_SESSION['username'].'"';
		
		 if($result = $Loader->query_result()){
	 
		
			foreach($result as $row)
			{
					
			$photo        =  $row['photo']; 
			$admincode    =  $row['admincode']; 
			$marketer_code=  $row['marketer_code']; 
			$username     =  $row['username'];
			$password     =  $row['password'];
			$fullname     =  $row['fullname'];
			$phone        =  $row['phone'];
			$date_reg     =  $row['date_reg'];
			$token        =  $row['token'];
			$bank_name    =  $row['bank_name'];
			$acct_name    =  $row['acct_name'];
			$acct_number  =  $row['acct_number'];
		 
		 
 
 
			}
	 
	 
   
	         
	 
		 }

		 if(empty($username)){
			header("Location: logout.php");
		 } 
 
} 
else 
{
	header("Location: logout.php");
}


?>
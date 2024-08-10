<?php
ob_start();
include("../config.php");



 
$Loader = new Loader();
$time = time(); 
$update_time = date('Y-m-d');
$update = date('Y-m-d');

if(isset($_SESSION['password']) AND !empty($_SESSION['username']))
{
  
   $Loader->query='SELECT * FROM `00admin_login_table` WHERE `password`="'.$_SESSION['password'].'" AND `username`="'.$_SESSION['username'].'"';
		
		 if($result = $Loader->query_result()){
	 
		
			foreach($result as $row)
			{
					
			$photo        =  $row['photo']; 
			$admincode    =  $row['admincode'];
			$username     =  $row['username'];
			$password     =  $row['password'];
			$fullname     =  $row['fullname'];
			$phone        =  $row['phone'];
			$gender       =  $row['gender'];
			$department   =  $row['department'];  
			$acct_level   =  $row['acct_level']; 
			$token        =  $row['token']; 
			$registrar    =  $row['registrar'];
			$sub_start    =  $row['date_reg'];
 
 
			}
	 
	 
   
	         
	 
		 }
 
} 
else 
{
	 header("Location: index.php");
}


?>
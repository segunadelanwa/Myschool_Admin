<?php
ob_start();
include"../config.php";



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
   
   $loader->query='SELECT * FROM `00admin_login_table` WHERE `password`="'.$_SESSION['password'].'" AND `username`="'.$_SESSION['username'].'"';
		
		 if($result = $loader->query_result()){
	 
		
			foreach($result as $row)
			{
					
			$admincode    =  $row['admincode']; 
			$photo        =  $row['photo']; 
			$username     =  $row['username'];
			$password     =  $row['password'];
			$fullname     =  $row['fullname'];
			$phone        =  $row['phone'];
			$gender       =  $row['gender'];
			$department   =  $row['department'];  
			$acct_level   =  $row['acct_level'];
			$registrar    =  $row['registrar'];
			$sub_start    =  $row['date_reg'];
 
 
			}
	 
	 
   
	         include 'homepage.php';
	 
		 }
 
} 
else 
{
	 include "login_core.php";
}


?>
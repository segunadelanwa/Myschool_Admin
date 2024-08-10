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

if(isset($_SESSION['token']) AND !empty($_SESSION['username']))
{
   
   $loader->query='SELECT * FROM `2_teacher_reg` WHERE `token`="'.$_SESSION['token'].'" AND `username`="'.$_SESSION['username'].'"';
		
		 if($result = $loader->query_result()){
	 
		
			foreach($result as $row)
			{
					
				$photo	        = $row['photo'];
				$token	        = $row['token'];
				$school_code	= $row['school_code'];
				$teacher_code	= $row['teacher_code']; 
				$username	    = $row['username'];
				$password	    = $row['password'];
				$fullname	    = $row['fullname'];
				$gender	        = $row['gender'];
				$phone      	= $row['phone'];
				$address	    = $row['address'];
				$salary	        = $row['salary'];
				$stipend_earn	= $row['stipend_earn'];
				$last_pay_day   = $row['last_pay_day'];
				$account_name	= $row['account_name'];
				$account_number	= $row['account_number'];
				$bank_name	    = $row['bank_name'];
				$registrar	    = $row['registrar'];
				$teacher_rank	= $row['teacher_rank'];
				$subject	    = $row['subject'];
				$reg_date       = $row['reg_date'];
			}
	 
				$loader->query='SELECT * FROM `1_school_reg` WHERE   `school_code`="'.$school_code.'"';
				$result = $loader->query_result(); 
				foreach($result as $rows)
				{
					$school_name       = $rows['school_name'];
					$school_address    = $rows['school_address'];
					$school_bgcolor    = $rows['school_bgcolor'];
					$school_status     = $rows['school_status'];
					 
				}


				if($school_status ==  'active')
				{
	   
				 include 'homepage.php';
	
				}
				else{
	
					header("Location: logout.php");
				}
	 
		 }
 
} 
else 
{
	 include "login_core.php";
}


?>
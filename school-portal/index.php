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

if(isset($_SESSION['token']) AND !empty($_SESSION['school_email']))
{
   
   $loader->query='SELECT * FROM `1_school_reg` WHERE `token`="'.$_SESSION['token'].'" AND `school_email`="'.$_SESSION['school_email'].'"';
		
		 if($result = $loader->query_result()){
	 
		
			foreach($result as $row)
			{
				
				

				$token                =  $row['token'];		
				$admincode            =  $row['admincode'];		
				$fadmin_code          =  $row['fadmin_code'];	
				$school_code          =  $row['school_code'];		
				$school_name          =  $row['school_name'];		
				$school_photo         =  $row['school_photo'];		
				$photo                =  $row['school_logo'];	    	
				$username             =  $row['school_email'];		
				$school_website       =  $row['school_website'];		
				$school_password      =  $row['school_password'];		
				$school_phone         =  $row['school_phone'];		
				$school_address       =  $row['school_address'];		
				$school_motor         =  $row['school_motor'];		
				$school_bgcolor       =  $row['school_bgcolor'];		
				$text_code            =  $row['text_code'];	 
				$school_week          =  $row['school_week'];	 	
				$last_pay_date        =  $row['last_pay_date'];	 
				$bank_name            =  $row['bank_name'];	 
				$account_name         =  $row['account_name'];		
				$account_number       =  $row['account_number'];		
				$school_status        =  $row['school_status'];	
				$schl_propritor_name  =  $row['schl_propritor_name'];		
				$schl_propritor_photo =  $row['schl_propritor_photo'];		
				$schl_propritor_msg   =  $row['schl_propritor_msg'];		
				$schl_head_name       =  $row['schl_head_name'];		
				$schl_head_photo      =  $row['schl_head_photo'];		
				$schl_head_msg        =  $row['schl_head_msg'];		
				$date_reg             =  $row['date_reg'];	
				$exam_score           =  $row['exam_score'];		
				$test_score           =  $row['test_score'];		
				$exam_time            =  $row['exam_time'];		
				$test_time            =  $row['test_time'];		
				$revenue              =  $row['revenue'];	 
				$term_earn            =  $row['term_earn'];	 	
				$current_term         =  $row['current_term'];	 
				$session              =  $row['session'];
 
 
			}
	 
			if($school_status ==  'active')
			{
   
	         include 'homepage.php';

			}
			else{

				header("Location: logout.php");
			}
	 
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
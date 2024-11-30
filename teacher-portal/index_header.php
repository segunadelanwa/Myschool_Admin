<?php
ob_start();
include("config.php");

require("../topUrl.php");

 
$Loader = new Loader();
$time = time(); 
$update_time = date('Y-m-d');
$update = date('Y-m-d');

if(!empty($_SESSION['token']) AND !empty($_SESSION['username']))
{
  
   $Loader->query='SELECT * FROM `2_teacher_reg` WHERE `token`="'.$_SESSION['token'].'" AND `username`="'.$_SESSION['username'].'"';
		
		 if($result = $Loader->query_result()){
	 
		
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
				$school_type    = $row['school_type'];
 
			}
	 

			$Loader->query='SELECT * FROM `1_school_reg` WHERE school_code ="'.$school_code.'"';
			$result = $Loader->query_result(); 
			foreach($result as $rows)
			{
					$school_name          =  $rows['school_name'];
					$school_address       =  $rows['school_address'];
					$school_bgcolor       =  $rows['school_bgcolor'];
					$text_code	          =  $rows['text_code'];
					$school_photo         =  $rows['school_photo'];
					$schl_propritor_name  =  $rows['schl_propritor_name'];		
					$schl_propritor_photo =  $rows['schl_propritor_photo'];		
					$schl_propritor_msg   =  $rows['schl_propritor_msg'];		
					$schl_head_name       =  $rows['schl_head_name'];		
					$schl_head_photo      =  $rows['schl_head_photo'];		
					$schl_head_msg        =  $rows['schl_head_msg']; 	 
					$school_logo          =  $rows['school_logo'];	    	
					$school_email         =  $rows['school_email'];		
					$school_website       =  $rows['school_website'];	 		
					$school_phone         =  $rows['school_phone'];		 	
					$school_motor         =  $rows['school_motor'];		 
					$date_reg             =  $rows['date_reg'];	
					$exam_score           =  $rows['exam_score'];		
					$test_score           =  $rows['test_score'];		
					$exam_time            =  $rows['exam_time'];		
					$test_time            =  $rows['test_time'];	  	
					$current_term         =  $rows['current_term'];	 
					$session              =  $rows['session'];
				 
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
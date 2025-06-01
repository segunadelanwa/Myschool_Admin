<?php
ob_start();
include("config.php");



 
$Loader = new Loader();
$time = time(); 
$update_time = date('Y-m-d');
$update = date('Y-m-d');

if(isset($_SESSION['token']) AND !empty($_SESSION['username']))
{
  
	$Loader->query='SELECT * FROM `1_school_admins` WHERE `password`="'.$_SESSION['token'].'" AND `username`="'.$_SESSION['username'].'"';
		
	if($result = $Loader->query_result()){ 
			foreach($result as $row)
			{

				$photo	        = $row['photo'];
				$token	        = $row['token']; 
				$school_code	= $row['school_code'];
				$username	    = $row['username'];  
				$password	    = $row['password'];
				$fullname	    = $row['fullname'];
				$gender	        = $row['gender'];
				$phone      	= $row['phone'];
				$address	    = $row['address'];
				$admin_depart   = $row['admin_depart'];
				$registrar   	= $row['registrar'];
				$admin_access   = $row['admin_access'];
				$admin_account_name	  = $row['account_name'];
				$admin_account_number = $row['account_number'];
				$admin_bank_name	  = $row['bank_name'];  
				$reg_date             = $row['date']; 


			}
 

		    $Loader->query='SELECT * FROM `1_school_reg` WHERE   `school_code`="'.$school_code.'"'; 
			$result = $Loader->query_result(); 
			foreach($result as $row)
			{
					
				 
				$admincode            =  $row['admincode'];		
				$fadmin_code          =  $row['fadmin_code'];  		
				$school_name          =  $row['school_name'];		
				$school_photo         =  $row['school_photo'];		
				$school_logo          =  $row['school_logo'];	    	
				$school_email         =  $row['school_email'];		
				$school_website       =  $row['school_website']; 		
				$school_phone         =  $row['school_phone'];		
				$school_address       =  $row['school_address'];		
				$school_motor         =  $row['school_motor'];		
				$school_bgcolor       =  $row['school_bgcolor'];		
				$text_code            =  $row['text_code'];	 
				$school_week          =  $row['school_week'];	 	 
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
				$current_term         =  $row['current_term'];	 
				$session              =  $row['session'];
				$id_card_type         =  $row['id_card_type'];
				$school_type          =  $row['school_type'];
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
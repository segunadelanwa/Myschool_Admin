<?php
require("../topUrl.php");
 


include("config.php"); 
$loader = new Loader();
 
include("../connect2.php"); 
 
// $m=mb_strimwidth(date('m'), 1, 1); 
// $d=date('d');
// $auth_code = mb_strimwidth(time(), 7, 3); 
// $marketerCode="MAR$d$m$auth_code";
//echo $_SESSION['username'];
// <script>
// function GoBackHandler(){
// history.go(-1)
// }	

// //onclick="GoBackHandler()";
// </script>
//$current_datetime = date("Y-m-d");
//TO ADJEST SUBJECT THESE ARE SECTION TO ALTER
//1 subjectSetup

	if(!empty($_SESSION['password']) AND !empty($_SESSION['username']))
	{
	
	$loader->query='SELECT * FROM 0_marketer_reg WHERE `0_marketer_reg`.`password` ="'.$_SESSION['password'].'" AND `0_marketer_reg`.`username`="'.$_SESSION['username'].'"';
			
			if($result = $loader->query_result()){ 
				foreach($result as $row)
				{
						
				$photo        =  $row['photo']; 
				$username     =  $row['username'];
				$tokenpasskey =  $row['token'];
				$password     =  $row['password'];
				$acc_fullname =  $row['fullname'];
				$phone        =  $row['phone']; 
				$admincode    =  $row['marketer_code']; 
			 
	
				}
		
		
	
				
		
			}
	
	} 
 


	$current_date  = date('Y-m-d');	
	$ip_address = $_SERVER['REMOTE_ADDR'];
	$current_datetime = date("d/m/Y");
	$time = date("H:i:s", STRTOTIME(date('h:i:sa')));

 
if(isset($_POST['page'])){
 
	if($_POST['page'] == 'admin_signup_page')
	{
		 
		 
		if($_POST['action'] == 'check_school')
		{
			$loader->query = "
			SELECT * FROM field_admin_reg 
			WHERE username = '".trim($_POST["email"])."'
			";

			$total_row = $loader->total_row();

			if($total_row == 0)
			{
				$output = array(
					'success'		=>	true
				);
				echo json_encode($output);
			}
		}
       

		if($_POST['action'] == 'school_signup_action')
	    {
			 
		 
             $date_init=date('Y-m-d');
 
				  
				 
				$schoolCode          =  trim($_POST['school_id']); 

				$source = "school/$schoolCode";
				$folder = "../myschoolapp_api/school/$schoolCode";
											
			if(!file_exists("$folder"))
			{
			
			 
					if( mkdir("$folder", 0777, true) )
					{
					
					



						$marketer_code       =  trim($_POST['marketer_code']); 
						$school_name         =  trim($_POST['school_name']); 
						$school_email        =  trim($_POST['school_email']);
						$website             =  trim($_POST['website']);
						$raw_password        =  trim($_POST['school_password']);
						$school_password     =	password_hash(trim($_POST['school_password']), PASSWORD_DEFAULT);
						$school_phone        =  trim($_POST['school_phone']);
						$school_address      =  trim($_POST['school_address']);
						$school_motor        =  trim($_POST['school_motor']);
						$school_bgcolor      =  trim($_POST['school_bgcolor']);
						$text_code           =  trim($_POST['text_code']); 
						$school_week         =  trim($_POST['school_week']); 
						$bank_name           =  trim($_POST['bank_name']);
						$account_name        =  trim($_POST['account_name']);
						$account_number      =  trim($_POST['account_number']);   
						$schl_propritor_name =  trim($_POST['schl_propritor_name']); 
						$schl_propritor_msg  =  trim($_POST['schl_propritor_msg']);
						$schl_head_name      =  trim($_POST['schl_head_name']); 
						$schl_head_msg       =  trim($_POST['schl_head_msg']); 
						$exam_score          =  trim($_POST['exam_score']); 
						$test_score          =  trim($_POST['test_score']); 
						$exam_time           =  trim($_POST['exam_time']); 
						$test_time           =  trim($_POST['test_time']); 
						$current_term        =  trim($_POST['current_term']); 
						$session             =  trim($_POST['session']); 
						$passkey             =  MD5("$raw_password$school_email");	
						
						

						
						$loader->filedata=$_FILES['school_photo'];
						$school_photo               = $loader->UploadPhoto($source);
						$loader->filedata=$_FILES['school_logo'];
						$school_logo               = $loader->UploadPhoto($source);
						$loader->filedata=$_FILES['schl_propritor_photo'];
						$schl_propritor_photo      = $loader->UploadPhoto($source);
						$loader->filedata=$_FILES['schl_head_photo']; 
						$schl_head_photo           = $loader->UploadPhoto($source);


									
									$query_wallet =("INSERT INTO 1_school_reg VALUE ( 
										'',    
										'".mysqli_real_escape_string($homedb, $passkey)."',   
										'".mysqli_real_escape_string($homedb, $admincode)."',   
										'".mysqli_real_escape_string($homedb, $marketer_code)."',    
										'".mysqli_real_escape_string($homedb, $schoolCode)."',   
										'".mysqli_real_escape_string($homedb, $school_name)."',   
										'".mysqli_real_escape_string($homedb, $school_photo)."',   
										'".mysqli_real_escape_string($homedb, $school_logo)."',   
										'".mysqli_real_escape_string($homedb, $school_email)."',   
										'".mysqli_real_escape_string($homedb, $website)."',   
										'".mysqli_real_escape_string($homedb, $school_password)."',   
										'".mysqli_real_escape_string($homedb, $school_phone)."',   
										'".mysqli_real_escape_string($homedb, $school_address)."',   
										'".mysqli_real_escape_string($homedb, $school_motor)."',   
										'".mysqli_real_escape_string($homedb, $school_bgcolor)."',   
										'".mysqli_real_escape_string($homedb, $text_code)."',   
										'".mysqli_real_escape_string($homedb, $school_week)."',   
										'".mysqli_real_escape_string($homedb, '0000-00-00')."',   
										'".mysqli_real_escape_string($homedb, $bank_name)."',   
										'".mysqli_real_escape_string($homedb, $account_name)."',   
										'".mysqli_real_escape_string($homedb, $account_number)."',   
										'".mysqli_real_escape_string($homedb, 'active')."',   
										'".mysqli_real_escape_string($homedb, $schl_propritor_name)."',   
										'".mysqli_real_escape_string($homedb, $schl_propritor_photo)."',   
										'".mysqli_real_escape_string($homedb, $schl_propritor_msg)."',   
										'".mysqli_real_escape_string($homedb, $schl_head_name)."',   
										'".mysqli_real_escape_string($homedb, $schl_head_photo)."',   
										'".mysqli_real_escape_string($homedb, $schl_head_msg)."',     
										'".mysqli_real_escape_string($homedb, $date_init)."',
										'".mysqli_real_escape_string($homedb, $exam_score)."',
										'".mysqli_real_escape_string($homedb, $test_score)."',
										'".mysqli_real_escape_string($homedb, $exam_time)."',
										'".mysqli_real_escape_string($homedb, $test_time)."',
										'".mysqli_real_escape_string($homedb, '')."',
										'".mysqli_real_escape_string($homedb, '')."',
										'".mysqli_real_escape_string($homedb, $current_term)."',
										'".mysqli_real_escape_string($homedb, $session)."' 
										)");
										if(mysqli_query($homedb,$query_wallet))
										{
														
							
							
							
											$subject = 'SCHOOL ACCOUNT SETUP';
										
											$body = "
												<div style='width:100%;height:5px;background: #c908bd'></div><br> 
												<div style='font-size:14px;color:black;font-family:lucida sans;'>
												
													<center >
														<img src=\'cid:logo\'  style='text-align:center;height:150px;'/> <br> 
														<h1> SCHOOL ACCOUNT SETUP</h1>
														
													</center><br>

																
												<p>
												Hi $school_name your school registeration account has been setup. Please find below your login details
												</p>
												
													<p>
														Username: $school_email  <br />
														Password: $raw_password  <br />
														
													</p>
													
													
													<span style='font-size:15px;text-align:center;'> School Account Setup <span><br>
													<div style='width:100%;height:5px;background: blue'></div>  
													
													
													</div><br><br>
												</div>			
												";
							
											// $loader->send_email($_POST['user_email_address'], $subject, $body);
				
											$loader->SchoolNoGeneratorUpdate();


												$output = array(
													'success'		=>	'success',
													'feedback'		=>	' School account setup successfully!!. Check your email for login details and change your dashboard password '
												);

								

										}
										else
										{
											
												$output = array(
													'success'		=>	'failed',
													'feedback'		=>	"Newtwork error"
												);
										}
					

						
					}
					else
					{
						
							$output = array(
								'success'		=>	'failed',
								'feedback'		=>	"Newtwork error"
							);
					}
					
			 
		      	 
			 
		    }
			else
			{
				
					$output = array(
						'success'		=>	'failed',
						'feedback'		=>	"Newtwork error. file folder exist"
					);
			}
 
 
         echo json_encode($output);
		}
	
	}
	

	if($_POST['page'] == 'login')
	{
 

		if($_POST['action'] == 'login_check')
		{

			$token =  $_POST["user_password"];
             
			$loader->query ="SELECT * FROM  `0_marketer_reg` WHERE token = '$token'"; 
			$outputtotal_row = $loader->total_row();
			$output = $loader->query_result();
			foreach($output as $row){
			$user = $row['username'];
			}




			$loader->data = array(
				':user_email_address'	=>	$_POST['user_email_address']
			);

			$loader->query = "
			SELECT * FROM 0_marketer_reg 
			WHERE username = :user_email_address
			";

			$total_row = $loader->total_row();

			if($outputtotal_row == 1)
			{

			
				if($total_row > 0)
				{
					$result = $loader->query_result();

					foreach($result as $row)
					{
						
						 
								$_SESSION['username'] = $row['username'];
								$_SESSION['password'] = $row['password'];

								$output = array(
									'success'	=>	true
								);
					 
				
					}
				}
				else
				{
					$output = array(
						'error'		=>	'This email address is not registered. <br/>Please register below to get started'
					);
				}
			}
			else
			{
				$output = array(
					'error'		=>	"Invalid data passed " 
				);
			}
			echo json_encode($output);
		}



		
 	}
 
	
	if($_POST['page'] == 'updateUserData')
	{



		if($_POST['action'] == 'field_admin')
		{
			 
  
		 


					$marketer_code   =  trim($_POST['fieldAdminCode']);
					$fullname        =  trim($_POST['fullname']);
					$phone           =  trim($_POST['phone']);
					$address         =  trim($_POST['address']);
					$acct_number     =  trim($_POST['acct_number']);
					$user_email      =  trim($_POST['user_email_address']);
					$acct_name       =  trim($_POST['acct_name']);
					$bank_name       =  trim($_POST['bank_name']); 
					
					
					$loader->query ="SELECT * FROM 0_marketer_reg WHERE marketer_code = '$marketer_code'";  
					$output = $loader->query_result();
					foreach($output as $row){
					$photo = $row['photo'];
					}
						 
						$loader->filedata= $_FILES['field_operator_photo']; 
						@$field_photo     = $loader->UploadPhoto('field_admin'); 

					if(!empty($field_photo)){

						@@unlink("../$FielAdmin/$photo");

						$query_wallet ="UPDATE `0_marketer_reg` SET    
						`photo`       =  '$field_photo',
						`fullname`    =  '$fullname',
						`phone`       =  '$phone',
						`address`     =  '$address',
						`acct_number` =  '$acct_number',
						`acct_name`   =  '$acct_name',
						`bank_name`   =  '$bank_name'
						WHERE `0_marketer_reg`.`marketer_code` = '$marketer_code' "; 


					}
					else
					{
						$query_wallet ="UPDATE `0_marketer_reg` SET 
						`fullname`    =  '$fullname',
						`phone`       =  '$phone',
						`address`     =  '$address',
						`acct_number` =  '$acct_number',
						`acct_name`   =  '$acct_name',
						`bank_name`   =  '$bank_name'
						WHERE `0_marketer_reg`.`marketer_code` = '$marketer_code' "; 
					}

 
			if(mysqli_query($homedb,$query_wallet))
			{

					$data= array(
						'success'		=>	'success',
						'feedback'		=>	'Field admin data updated successfully!! '
					);

		   }
		   else
		   {
					$data= array(
						'success'		=>	'success',
						'feedback'		=>	'Field admin data updated failed!! '
					);			
		   }
			
		}

 
 
		echo json_encode($data);
	}


 
	if($_POST["page"] === 'updateAcctPassword')
	{


		if($_POST['action'] == 'updateAcctPassword')
		{

			$current_datetime = date("d-m-Y");
			$pwd_1   = $_POST['pwd_1'];
			$pwd_2   = $_POST['pwd_2'];
			
			$hash_pass  =	password_hash(trim($pwd_2), PASSWORD_DEFAULT);	

			$token      =  MD5("$pwd_1$username");	

	  
									$query =("UPDATE `0_marketer_reg` SET  
									`token`    = '$token',
									`password`    = '$hash_pass'
									WHERE `0_marketer_reg`.`username` = '$username'"); 
									if(mysqli_query($homedb,$query))
									{
						
											$data= array(
												'success'		=>	'success',
												'feedback'		=>	'Password data updated successfully, you will be auto loutout. Please log in with new password  '
											);
						
								   }
								   else
								   {
											$data= array(
												'success'		=>	'success',
												'feedback'		=>	'Password data updated failed!! '
											);			
								   }
		 
					   echo json_encode($data);
        
        }
    }


}
 





?>

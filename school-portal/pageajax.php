<?php

require("../topUrl.php");
 


include("config.php"); 
$loader = new Loader();
$mailer = new PHPMailer;
include("../connect2.php"); 
 
 

	if(!empty($_SESSION['token']) AND !empty($_SESSION['school_email']))
	{
	
	$loader->query='SELECT * FROM 1_school_reg WHERE `1_school_reg`.`token` ="'.$_SESSION['token'].'" AND `1_school_reg`.`school_email`="'.$_SESSION['school_email'].'"';
			
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
					$download_result      =  $row['download_result'];
					$school_payment       =  $row['school_payment'];
			 
	
				}
		
		
	
				
		
			}
	
	} 
 


	$current_date  = date('Y-m-d');	
	$ip_address = $_SERVER['REMOTE_ADDR'];
	$current_datetime = date("d/m/Y");
	$time = date("H:i:s", STRTOTIME(date('h:i:sa')));

 
if(isset($_POST['page'])){
 

	if($_POST['page'] == 'login')
	{
 

		if($_POST['action'] == 'login_check')
		{

			$token =  $_POST["user_password"];
             
			$loader->query ="SELECT * FROM  `1_school_reg` WHERE token = '$token'"; 
			$outputtotal_row = $loader->total_row();
			$output = $loader->query_result();
			foreach($output as $row){
			$user = $row['school_email'];
			}




			$loader->data = array(
				':user_email_address'	=>	$_POST['user_email_address']
			);

			$loader->query = "
			SELECT * FROM 1_school_reg 
			WHERE school_email = :user_email_address
			";

			$total_row = $loader->total_row();

			if($outputtotal_row == 1)
			{

			
				if($total_row > 0)
				{
					$result = $loader->query_result();

					foreach($result as $row)
					{
						
						if($row['school_status'] ==  'active')
						{
								$_SESSION['school_email'] = $row['school_email'];
								$_SESSION['token'] = $row['token'];

								$output = array(
									'success'	=>	true
								);
						}
						else
						{
							$output = array(
								'error'		=>	"".$row['school_name']." account has been suspended. Please kindly contact us to lift the suspension "
							);
						}
				
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
 
 
	if($_POST["page"] === 'updateAcctPassword')
	{


		if($_POST['action'] == 'updateAcctPassword')
		{

			$current_datetime = date("d-m-Y");
			$pwd_1   = $_POST['pwd_1'];
			$pwd_2   = $_POST['pwd_2'];
			
			$hash_pass  =	password_hash(trim($pwd_2), PASSWORD_DEFAULT);	

			$token      =  MD5("$pwd_1$username");	

			 
									$query =("UPDATE `1_school_reg` SET  
									`token`            = '$token',
									`school_password`  = '$hash_pass'
									WHERE `1_school_reg`.`school_email` = '$username'"); 
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


	if($_POST['action'] == 'check_teacher_account')
	{
		$loader->query = "
		SELECT * FROM 2_teacher_reg 
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

			  
			 
			 

			$source = "school/$school_code";
			$folder = "../myschoolapp_api/school/$school_code";
										
	 
 
					@$website             =  trim($_POST['website']); 
					@$school_motor        =  trim($_POST['school_motor']); 
					@$school_week         =  trim($_POST['school_week']);      
					@$schl_propritor_msg  =  trim($_POST['schl_propritor_msg']); 
					@$schl_head_msg       =  trim($_POST['schl_head_msg']); 
					@$exam_score          =  trim($_POST['exam_score']); 
					@$test_score          =  trim($_POST['test_score']); 
					@$exam_time           =  trim($_POST['exam_time']); 
					@$test_time           =  trim($_POST['test_time']); 
					@$current_term        =  trim($_POST['current_term']); 
					@$session             =  trim($_POST['session']);  	
					
					

 
					@$loader->filedata=$_FILES['schl_propritor_photo'];
					$schl_propritor_photo      = $loader->UploadPhoto($source);
					@$loader->filedata=$_FILES['schl_head_photo']; 
					$schl_head_photo           = $loader->UploadPhoto($source);


								
								 
									$query_wallet ="UPDATE `1_school_reg` SET    
									`schl_propritor_photo`= '$schl_propritor_photo', 
									`schl_head_photo`     = '$schl_head_photo', 
									`school_website`      = '$website', 
									`school_motor`        = '$school_motor', 
									`school_week`         = '$school_week',     
									`schl_propritor_msg`  = '$schl_propritor_msg', 
									`schl_head_msg`       = '$schl_head_msg', 
									`exam_score`          = '$exam_score', 
									`test_score`          = '$test_score', 
									`exam_time`           = '$exam_time', 
									`test_time`           = '$test_time', 
									`current_term`        = '$current_term', 
									`session`             = '$session'  
									WHERE `1_school_reg`.`school_code` = '$school_code' "; 
									if(mysqli_query($homedb,$query_wallet))
									{
													
									 

											$output = array(
												'success'		=>	'success',
												'feedback'		=>	"School todo list updated successfully!!.  "
											);

							

									}
									else
									{
										
											$output = array(
												'success'		=>	'failed',
												'feedback'		=>	"Newtwork error"
											);
									}
				

					
		 
				
		 
			   
		 
	 

	 echo json_encode($output);
	}




	if($_POST['action'] == 'teacher_account_setup')
	{
	 
		


		     $date_init=date('d-m-Y');



				$teacher_code         =  trim($_POST['teacher_id']);
				$user                 =  trim($_POST['user_email_address']);
				$raw_password         =  trim($_POST['password']);
				$password             =  MD5($_POST['password']);
				$salary               =  trim($_POST['salary']);				 
				$fullname             =  trim($_POST['fullname']);					  
				$teacher_rank         =  trim($_POST['teacher_rank']);
				$subject              =  trim($_POST['subject']);
				$gender               =  trim($_POST['gender']);
				$phone                =  trim($_POST['phone']);
				$address              =  trim($_POST['address']);
				$acct_number          =  trim($_POST['acct_number']);
				$acct_name            =  trim($_POST['acct_name']);
				$bank_name            =  trim($_POST['bank_name']); 
				$sch_code             =  trim($_POST['sch_code']);
				$school_type          =  trim($_POST['school_type']);

				$passkey             =   MD5("$raw_password$user");	
						
				$source = "school/$sch_code";
				 $loader->filedata     = $_FILES['field_operator_photo'];
				$field_operator_photo = $loader->UploadPhoto($source);
	
				$loader->query = "SELECT * FROM `2_teacher_reg` WHERE `2_teacher_reg`.`teacher_rank` = 'head' AND `2_teacher_reg`.`school_code` ='$school_code'";  
				$result_total_row = $loader->total_row();
				
				if( $result_total_row == 0  ) 
				{
					$query_wallet =("INSERT INTO 2_teacher_reg VALUE (
						'', 									 
						'".mysqli_real_escape_string($homedb, $field_operator_photo)."', 
						'".mysqli_real_escape_string($homedb, $passkey)."',  
						'".mysqli_real_escape_string($homedb, $sch_code)."', 		 
						'".mysqli_real_escape_string($homedb, $teacher_code)."', 		 
						'".mysqli_real_escape_string($homedb, $user)."',
						'".mysqli_real_escape_string($homedb, $password)."',
						'".mysqli_real_escape_string($homedb, $fullname)."',  
						'".mysqli_real_escape_string($homedb, $gender)."',
						'".mysqli_real_escape_string($homedb, $phone)."',     
						'".mysqli_real_escape_string($homedb, $address)."',   
						'".mysqli_real_escape_string($homedb, $salary)."',   
						'".mysqli_real_escape_string($homedb, '0')."',   
						'".mysqli_real_escape_string($homedb, '0000-00-00')."',   
						'".mysqli_real_escape_string($homedb, $acct_name)."',   
						'".mysqli_real_escape_string($homedb, $acct_number)."',   
						'".mysqli_real_escape_string($homedb, $bank_name)."',   
						'".mysqli_real_escape_string($homedb, $username)."',   
						'".mysqli_real_escape_string($homedb, $teacher_rank)."',   
						'".mysqli_real_escape_string($homedb, $subject)."',   
						'".mysqli_real_escape_string($homedb, $date_init)."',
						'".mysqli_real_escape_string($homedb, $school_type)."'
						)");
						if(mysqli_query($homedb,$query_wallet))
						{
										
			
			
							$sch_logo="/$school_code/$photo";
							$subject = 'TEACHER PORTAL SETUP';
						
							$body = "
							<div style='width:100%;height:5px;background:$school_bgcolor'></div><br> 
								<div style='font-size:18px;color:black;font-family:lucida sans;'>
							 
										 <center>
											 
											 <div style='text-decoration:uppercase;font-size:30px;font-weight:bold'>
											 <img src='cid:logo'  style='text-align:center;height:150px;'/>  <br/>
											 $school_name
											 </div>

											 <div>
											 
											 $school_address<br/>
											 $school_website<br/>
											 $school_motor</br/>
											  
											 </div>  
										 </center>  

										 
										 <img src='cid:logo2'style='width:100%' /> <br/> <br/><br/>

													 
										 <p>
										<h3 style='text-decoration:underline'>Teacher Portal Setup  </h3>
										 Hi $fullname, welcome to  <b>$school_name</b> portals management and CBT integration application software.<br/> 
										 Your teacher portal has been fully setup for online class activities. Please find below your login details
										 </p><br/>
									 

										 <p>
										 <a href='https://adminportal.com.ng/login/teacher-portal/' >  Kindly click here </a> and login to teacher portal or 
										 if  link is disabled  on your device copy this link https://adminportal.com.ng/login/teacher-portal  and past to your browser . 
										 </p>
												 


										 <p>
										 <img src='cid:logo3'  style='width:100%' /> <br> <br>
										 <b style='text-decoration:underline'>Portal Login Details </b><br/>
											 Username: $user  <br />
											 Password: $raw_password  <br /> 
										 </p> <br />  <br /> 
										 
										 <p>
											 <b style='text-decoration:underline'> To Access Teacher Portals URL </b><br/>
											 <a href='https://adminportal.com.ng/login/teacher-portal/'><b>School Portal</b>: https://adminportal.com.ng/login/teacher-portal/ </a>(Web App)  <br /> <br />
															  
										 </p>




										 
										 <div>School Portal Admin</div>   
										 <div><b>$schl_head_name</b></div>    
										  


								 </div><br><br>
							 </div>				
								";
			
							 $loader->send_email($_POST['user_email_address'], $subject, $body,$sch_logo,$username,$school_name);
							$loader->TeacherNoGeneratorUpdate();

								$output = array(
									'success'		=>	'success',
									'feedback'		=>	'Teacher Account Setup successfully!!. Check your email for login details'
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
			    else if( $teacher_rank == 'teacher'  )
				{	

                                    $query_wallet =("INSERT INTO 2_teacher_reg VALUE (
									'', 									 
									'".mysqli_real_escape_string($homedb, $field_operator_photo)."', 
									'".mysqli_real_escape_string($homedb, $passkey)."',  
									'".mysqli_real_escape_string($homedb, $sch_code)."', 		 
									'".mysqli_real_escape_string($homedb, $teacher_code)."', 		 
									'".mysqli_real_escape_string($homedb, $user)."',
									'".mysqli_real_escape_string($homedb, $password)."',
									'".mysqli_real_escape_string($homedb, $fullname)."',  
									'".mysqli_real_escape_string($homedb, $gender)."',
									'".mysqli_real_escape_string($homedb, $phone)."',     
									'".mysqli_real_escape_string($homedb, $address)."',   
									'".mysqli_real_escape_string($homedb, $salary)."',   
									'".mysqli_real_escape_string($homedb, '0')."',   
									'".mysqli_real_escape_string($homedb, '0000-00-00')."',   
									'".mysqli_real_escape_string($homedb, $acct_name)."',   
									'".mysqli_real_escape_string($homedb, $acct_number)."',   
									'".mysqli_real_escape_string($homedb, $bank_name)."',   
									'".mysqli_real_escape_string($homedb, $username)."',   
									'".mysqli_real_escape_string($homedb, $teacher_rank)."',   
									'".mysqli_real_escape_string($homedb, $subject)."',   
									'".mysqli_real_escape_string($homedb, $date_init)."',
									'".mysqli_real_escape_string($homedb, $school_type)."'
									)");
									if(mysqli_query($homedb,$query_wallet))
									{
													
						
						
						
										$sch_logo="/$school_code/$photo";
										$subject = 'TEACHER PORTAL SETUP';
									
										$body = "
										<div style='width:100%;height:5px;background:$school_bgcolor'></div><br> 
											<div style='font-size:18px;color:black;font-family:lucida sans;'>
										 
													 <center>
														 
														 <div style='text-decoration:uppercase;font-size:30px;font-weight:bold'>
														 <img src='cid:logo'  style='text-align:center;height:150px;'/>  <br/>
														 $school_name
														 </div>
		 
														 <div>
														 
														 $school_address<br/>
														 $school_website<br/>
														 $school_motor</br/>
														  
														 </div>  
													 </center>  


													 <img src='cid:logo2'style='width:100%' /> <br/> <br/><br/>
		 
																 
													 <p>
													<h3 style='text-decoration:underline'>Teacher Portal Setup  </h3>
													 Hi $fullname, welcome to  <b>$school_name</b> portals management and CBT integration application software.<br/> 
													 Your teacher portal has been fully setup for online class activities. Please find below your login details
													 </p><br/>
												 
		 
													 <p>
													 <a href='https://adminportal.com.ng/login/teacher-portal/' >  Kindly click here </a> and login to teacher portal or 
													 if  link is disabled  on your device copy this link https://adminportal.com.ng/login/teacher-portal  and past to your browser . 
													 </p>
															 
		 
		 
													 <p>
													 <img src='cid:logo3'  style='width:100%' /> <br> <br>
													 <b style='text-decoration:underline'>Portal Login Details </b><br/>
														 Username: $user  <br />
														 Password: $raw_password  <br /> 
													 </p> <br />  <br /> 
													 
													 <p>
														 <b style='text-decoration:underline'> To Access Teacher Portals URL </b><br/>
														 <a href='https://adminportal.com.ng/login/teacher-portal/'><b>School Portal</b>: https://adminportal.com.ng/login/teacher-portal/ </a>(Web App)  <br /> <br />
																		  
													 </p>
		 
		 
		 
		 
													 
													 <div>School Portal Admin</div>   
													 <div><b>$schl_head_name</b></div>    
													  
		 
		 
											 </div><br><br>
										 </div>				
											";
						
										 $loader->send_email($_POST['user_email_address'], $subject, $body,$sch_logo,$username,$school_name);

										 
										
										$loader->TeacherNoGeneratorUpdate();

											$output = array(
												'success'		=>	'success',
												'feedback'		=>	'Teacher Account Setup successfully!!. Check your email for login details'
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
							'feedback'		=>	"You can only have one head teacher registered, if insisted update current head teacher to teaching staff and continue"
						);
				}


		 echo json_encode($output);
		 		 
		 
	} 

	if($_POST['action'] == 'check_parrent_reg')
	{
		$loader->query = "
		SELECT * FROM 3_parent_reg 
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

 
	if($_POST['action'] == 'parent_signup_action')
	{
			
		
			$date_init=date('d-m-Y');



		

			
				$parrent_code    =  trim($_POST['parent_id']); 
				$sch_code        =  trim($_POST['sch_code']); 
				$guidance_name   =  trim($_POST['guidance_name']);
				$parent_pass     =  trim($_POST['parent_pass']);
				$address         =  trim($_POST['home_address']);
				$email           =  trim($_POST['parent_email']);
				$parent_phone    =  trim($_POST['parent_phone']);

				$passkey         =   MD5("$parent_pass");	
			
				$total_row = $loader->ParentNameExist($parrent_code);	
				
				if($total_row == 0){
							$query_wallet =("INSERT INTO 3_parent_reg VALUE (
							'', 									 
							'".mysqli_real_escape_string($homedb, $passkey)."',
							'".mysqli_real_escape_string($homedb, $admincode)."',		 									 
							'".mysqli_real_escape_string($homedb, $sch_code)."',		 									 
							'".mysqli_real_escape_string($homedb, $parent_phone)."', 									 
							'".mysqli_real_escape_string($homedb, $parrent_code)."',
							'".mysqli_real_escape_string($homedb, $guidance_name)."',
							'".mysqli_real_escape_string($homedb, $address)."',   
							'".mysqli_real_escape_string($homedb, $email)."',      
							'".mysqli_real_escape_string($homedb, $date_init)."'
							)");
							if(mysqli_query($homedb,$query_wallet))
							{
										
								$loader->ParentNoGeneratorUpdate();
									$output = array(
										'success'		=>	'success',
										'feedback'		=>	"Student parent account setup successfully!!. Parent code is '$parrent_code'"
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
							'feedback'		=>	"Dublicate parent account detected"
						);
				}

			
	
			
			echo json_encode($output);
			
			
			
	}
	
	if($_POST['action'] == 'parent_student_action')
	{
		 
		 
		 $date_init=date('d-m-Y');
		 $date_term=date('Y');



	 
				$password          =  MD5($_POST['password']); 	
				$admincode         =  $username;
				$schl_stu_no       =  trim($_POST['schl_stu_no']);
				$student_code      =  trim($_POST['student_code']);
				$school_code       =  trim($_POST['school_code']);
				$teacher_code      =  trim($_POST['teacher_code']);
				$parent_code       =  trim($_POST['parent_code']);
				$student_name      =  trim($_POST['student_name']);
				$student_name      =  trim($_POST['student_name']);
				$stu_gender        =  trim($_POST['stu_gender']);
				$cur_term          =  trim($_POST['cur_term']);
				$student_class     =  trim($_POST['student_class']);
				$class_rep         =  trim($_POST['class_rep']); 
				$payment_status    =  trim($_POST['payment_status']);
				$school_type       =  trim($_POST['school_type']);


			$ConfirmStudentExist = $loader->ConfirmStudentExist($student_code);
			$ParentNameExist = $loader->ParentNameExist($parent_code);
			$SchoolNameExist = $loader->SchoolNameExist($school_code);
			$ConfirmTeacherExist = $loader->ConfirmTeacherExist($teacher_code);
						 
			if($SchoolNameExist == 1)
			{

				$loader->query ="SELECT * FROM  `1_school_reg` WHERE school_code = '$school_code'";  
				$output = $loader->query_result();
				foreach($output as $row){
				$fadmin_code = $row['fadmin_code'];
				$admincode = $row['admincode'];
				}

						if($ParentNameExist == 1)
						{
								if($ConfirmTeacherExist == 1)
								{


									if($ConfirmStudentExist == 0)
									{
												$source = "school/$school_code";
												$loader->filedata  =  $_FILES['student_photo'];
												$student_photo     =  $loader->UploadPhoto($source);											
										
												$query_wallet =("INSERT INTO 4_student_reg VALUE (
													'', 									 
													'".mysqli_real_escape_string($homedb, $student_photo)."',		 									 
													'".mysqli_real_escape_string($homedb, $password)."', 									 
													'".mysqli_real_escape_string($homedb, $teacher_code)."', 									 
													'".mysqli_real_escape_string($homedb, $student_code)."', 									 
													'".mysqli_real_escape_string($homedb, $schl_stu_no)."',
													'".mysqli_real_escape_string($homedb, $school_code)."',
													'".mysqli_real_escape_string($homedb, $parent_code)."',
													'".mysqli_real_escape_string($homedb, $student_name)."',   
													'".mysqli_real_escape_string($homedb, $stu_gender)."',   
													'".mysqli_real_escape_string($homedb, $student_class)."',      
													'".mysqli_real_escape_string($homedb, $class_rep)."',             
													'".mysqli_real_escape_string($homedb, $payment_status)."',      
													'".mysqli_real_escape_string($homedb, '')."',      
													'".mysqli_real_escape_string($homedb, 'inactive')."',      
													'".mysqli_real_escape_string($homedb, 'passive')."',      
													'".mysqli_real_escape_string($homedb, 'passive')."',      
													'".mysqli_real_escape_string($homedb, $date_init)."',
													'',
													'".mysqli_real_escape_string($homedb, $fadmin_code)."',
													'".mysqli_real_escape_string($homedb, $admincode)."',
													''
													)");
													if(mysqli_query($homedb,$query_wallet))
													{
																
												 
															   $query_wallet =("INSERT INTO 41_student_subjects VALUE (
																'', 									 
																'".mysqli_real_escape_string($homedb, $admincode)."',
																'".mysqli_real_escape_string($homedb, $parent_code)."',		 									 
																'".mysqli_real_escape_string($homedb, $school_code)."', 									 
																'".mysqli_real_escape_string($homedb, $student_code)."', 									 
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',      
																'',       
																'',       
																'',       
																'',       
																'',       
																'',       
																'',       
																'',       
																'',       
																'',       
																'',       
																'',       
																'',       
																'',       
																'',       
																'',          
																''
																)");
																mysqli_query($homedb,$query_wallet);
																	
																
																$query_wallet =("INSERT INTO student_exam_result VALUE (
																	'', 									 
																	'".mysqli_real_escape_string($homedb, $date_term)."',
																	'".mysqli_real_escape_string($homedb, 'active')."',		 									 
																	'".mysqli_real_escape_string($homedb, $cur_term)."',		 									 
																	'".mysqli_real_escape_string($homedb, $parent_code)."', 									 
																	'".mysqli_real_escape_string($homedb, $school_code)."', 									 
																	'".mysqli_real_escape_string($homedb, $student_code)."',   
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',
																	'".mysqli_real_escape_string($homedb, $school_type)."'
																	)");
																	mysqli_query($homedb,$query_wallet);


																	$query_wallet =("INSERT INTO student_test_result VALUE (
																	'', 									 
																	'".mysqli_real_escape_string($homedb, $date_term)."',
																	'".mysqli_real_escape_string($homedb, 'active')."',		 									 
																	'".mysqli_real_escape_string($homedb, $cur_term)."',		 									 
																	'".mysqli_real_escape_string($homedb, $parent_code)."', 									 
																	'".mysqli_real_escape_string($homedb, $school_code)."', 									 
																	'".mysqli_real_escape_string($homedb, $student_code)."',  
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',
																	'".mysqli_real_escape_string($homedb, $school_type)."'
																	)");


																	mysqli_query($homedb,$query_wallet);
																	$query_wallet =("INSERT INTO student_weekly_assesment  VALUE (
																	'', 									 
																	'".mysqli_real_escape_string($homedb, $date_term)."',
																	'".mysqli_real_escape_string($homedb, 'active')."',		 									 
																	'".mysqli_real_escape_string($homedb, $cur_term)."',		 									 
																	'".mysqli_real_escape_string($homedb, $parent_code)."', 									 
																	'".mysqli_real_escape_string($homedb, $school_code)."', 									 
																	'".mysqli_real_escape_string($homedb, $student_code)."',  
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',      
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',       
																	'',
																	'".mysqli_real_escape_string($homedb, $school_type)."'
																	)");
																	mysqli_query($homedb,$query_wallet);


															$loader->StudentNoGeneratorUpdate();

															$output = array(
																'success'		=>	'success',
																'feedback'		=>	"Student Account Setup successfully!!. "
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
															'feedback'		=>	"This $schl_stu_no has already been taken. Please confirm this $schl_stu_no registration thanks"
														);					
										
									}
															
								}
								else
								{
									$output = array(
										'success'		=>	'failed',
										'feedback'		=>	"This $teacher_code code does not exist "
									);					

								} 
						}
						else
						{
							$output = array(
								'success'		=>	'failed',
								'feedback'		=>	"This $parent_code code does not exist "
							);					

						} 
					 


			 }
			 else
			 {
				$output = array(
					'success'		=>	'failed',
					'feedback'		=>	"This $school_code code does not exist "
				);					

			 } 
		 
		 echo json_encode($output);
		 
		 
		 
	}
	


	if($_POST['page'] == 'delete')
	{
		if($_POST['action'] == 'delete')
		{
			
			//REGISTERED SUBJECTS
			
			
			$name          = trim($_POST['name']) ;
		    $delete_id     = trim($_POST['delete_id']) ;
			 
			$success=""; 
			$failed="";

			if($name == 'student')
			{
						 
				   $online_stu_id = trim($_POST['delete_id']) ;

					$loader->query = "SELECT * FROM `4_student_reg` WHERE  `4_student_reg`.`online_stu_id` ='$delete_id' ";  
					$result_row = $loader->total_row();
					$result_user_wallet = $loader->query_result();
					foreach($result_user_wallet as $row){

						$photo          =  $row['photo'];      
						$parent_code    =  $row['parent_code'];   
						$sch_code       =  $row['school_code'];   
						$student_name   =  $row['student_name'];   
						$schl_stu_no    =  $row['schl_stu_no'];   
						$online_stu_id  =  $row['online_stu_id'];   
						$student_class  =  $row['student_class'];   
						$sub_status     =  $row['sub_status'];   
						$stu_gender     =  $row['stu_gender'];   
						$date           =  $row['date'];   
					
					  }	
					
				
				  

						//$schoolName = $loader-> SchoolName($school_code);	
						$parent_name = $loader-> ParentName($parent_code);

				 
						if($result_row == 1 && $sch_code == $school_code){
					           echo $success =' 
						 
									<div style="text-align:center;font-wweight:bold;font-size:20px">
								   <div card-header>
									  <h2 style="text-decoration:underline;color:green">'.$student_name.' </h2>
									</div>
									
									 
										<div class="form-group">	
										<label style="color:red"> <b> '.$online_stu_id.' </b> </label><br />
										<img src="../'.$SchoolIMG.'/'.$sch_code.'/'.$photo.'"  style="height: 200px;border-radius:500px" />
										</div>
									
										<div>School Name: '.$school_name.'</div>
										<div>Parent Name: '.$parent_name.'</div>
										<div>Student Name:  '.$student_name.'</div>
										<div>Gender: '.$stu_gender.'</div>
										<div>Student NO: '.$schl_stu_no.'</div>
										<div>Class: '.$student_class.'</div>
										<div>Payment Status: '.$sub_status.'</div>

									
									<h2 style="text-decoration:underline;margin-bottom:20px;color:red">ARE YOU SURE YOU WANT TO  DELETE THIS ACCOUNT?</h2>
									<p style="color:red">Please do note that <span style="color:black">'.$student_name.' </span>account will be deleted once the Delete Now button is clicked
									and this proccess can not be reversed, however all informations of <span style="color:black">'.$student_name.' </span> will be deleted from our database
									</p><br/>



									<form method="POST"   action="#">
									<div class="form-group">
									  <input type="text" class="form-control" name="passcode" id="passcode"  placeholder="Enter your password to delete ">
									 </div> 
								  </form>
									';
                                     
									echo"<div class='btn btn-danger'  onclick='deletAccount(\"$name\",\"$delete_id\",\"$token\",\"$username\")'> Delete Now</div>
									
									</div>";

						}else{

							echo $output = " Invalid code/ID passed";
							}
 		  
									// echo "<script> alert(' Message sent Failed!!.Please Try again')</script>";
									// echo "<script> window.history.back(); </script>";


			}
			else if($name == 'parent') 
			{
				
				
	      
				   
					$loader->query = "SELECT * FROM `3_parent_reg` WHERE  `3_parent_reg`.`parent_code` ='$delete_id' ";  
					$result_row = $loader->total_row();
					$result_user_wallet = $loader->query_result();
					foreach($result_user_wallet as $row){

						$guidance_name     =  $row['guidance_name'];       
						$parent_address    =  $row['address'];      
						$parent_phone      =  $row['username'];      
						$parent_email      =  $row['email'];      
						$sch_code          =  $row['sch_code'];      
					
					  }	
					
			 
				 if($result_row == 1 && $sch_code == $school_code){
					
					           echo $success =' 
						 
									<div style="text-align:center;font-wweight:bold;font-size:20px">
								 
									
									  
										<div>Parent Name: '.$guidance_name.'</div>
										<div>Parent Phone: '.$parent_phone.'</div>
										<div>Address:  '.$parent_address.'</div> 
										<div>Email :  '.$parent_email.'</div> 

									
									<h2 style="text-decoration:underline;margin-bottom:20px;color:red">ARE YOU SURE YOU WANT TO  DELETE THIS ACCOUNT?</h2>
									<p style="color:red">Please do note that <span style="color:black">'.$guidance_name.' </span>account will be deleted once the Delete Now button is clicked
									along side with all students account connected
									and this proccess can not be reversed, however all informations of <span style="color:black">'.$guidance_name.' </span> will be deleted from our database
									</p><br/>



									<form method="POST"   action="#">
									<div class="form-group">
									  <input type="text" class="form-control" name="passcode" id="passcode"  placeholder="Enter your password to delete ">
									 </div> 
								  </form>
									';
                                     
									echo"<div class='btn btn-danger'  onclick='deletAccount(\"$name\",\"$delete_id\",\"$token\",\"$username\")'> Delete Now</div>
									
									</div>";


				 }
				 else
				 {

					echo $output = " Invalid delete ID passed";
				 }
				
				
			} 			
			else  if($name == 'teacher')
			{
				$loader->query = "SELECT * FROM `2_teacher_reg` WHERE  `2_teacher_reg`.`teacher_code` ='$delete_id' ";  
				$result_row = $loader->total_row();
				$result_user_wallet = $loader->query_result();
				foreach($result_user_wallet as $row){

					$fullname    =  $row['fullname'];       
					$fd_address  =  $row['address'];            
					$fd_phone    =  $row['phone'];      
					$fd_email    =  $row['username'];      
					$sch_code    =  $row['school_code'];      
				
				  }	
				
		 
			 if($result_row == 1 && $sch_code == $school_code)
			 {
				
						   echo $success =' 
					 
								<div style="text-align:center;font-wweight:bold;font-size:20px">
							 
								
								  
									<div>Teacher Name: '.$fullname.'</div>
									<div>Teacher Phone: '.$fd_phone.'</div>
									<div>Address:  '.$fd_address.'</div> 
									<div>Email :  '.$fd_email.'</div> 

								
								<h2 style="text-decoration:underline;margin-bottom:20px;color:red">ARE YOU SURE YOU WANT TO  DELETE THIS ACCOUNT?</h2>
								<p style="color:red">Please do note that <span style="color:black">'.$fullname.' </span>account will be deleted once the Delete Now button is clicked
								
								and this proccess can not be reversed, however all informations of <span style="color:black">'.$fullname.' </span> will be deleted from our database
								</p><br/>



								<form method="POST"   action="#">
								<div class="form-group">
								  <input type="text" class="form-control" name="passcode" id="passcode"  placeholder="Enter your password to delete ">
								 </div> 
							  </form>
								';
								 
								echo"<div class='btn btn-danger'  onclick='deletAccount(\"$name\",\"$delete_id\",\"$token\",\"$username\")'> Delete Now</div>
								
								</div>";


			 }else{

				echo $output = " Invalid delete ID";
			 }

			}
	 
					
	 
		}	

		


		if($_POST['action'] == 'deleteAccount')
		{
			
			//REGISTERED SUBJECTS
			
			
			$category      = trim($_POST['category']) ;
		    $delete_id     = trim($_POST['delete_id']) ;
			 
			$success=""; 
			$failed="";

			if($category == 'student')
			{
						 

					$loader->query = "SELECT * FROM `4_student_reg` WHERE  `4_student_reg`.`online_stu_id` ='$delete_id' ";  
					$result_row = $loader->total_row();
					$result_query = $loader->query_result();
					foreach($result_query as $row){ 
						$photo         =  $row['photo'];   
						$student_name  =  $row['student_name'];   
						$sch_code      =  $row['school_code'];   
					}	
					
				
								if($result_row == 1 && $sch_code == $school_code)
								{

									unlink("../$SchoolIMG/$sch_code/$photo");

									$loader->query = "DELETE FROM `4_student_reg` WHERE `4_student_reg`.`online_stu_id` = '$delete_id' ";
									$loader->execute_query();
								

									$loader->query = "DELETE FROM `41_student_subjects` WHERE `41_student_subjects`.`student_code` = '$delete_id' ";
									$loader->execute_query();


									$loader->query = "DELETE FROM `student_exam_result` WHERE `student_exam_result`.`student_code` = '$delete_id' ";
									$loader->execute_query();
								


									$loader->query = "DELETE FROM `student_test_result` WHERE `student_test_result`.`student_code` = '$delete_id' ";
									$loader->execute_query();
									
									echo $success ="$student_name account has been deleted from database";
								}
								else
								{
									echo $output ="Invalid delete ID passed";
								}
 
			}
			else if($category == 'parent') 
			{
				


					$loader->query = "SELECT * FROM `3_parent_reg` WHERE  `3_parent_reg`.`parent_code` ='$delete_id' ";  
					$result_row = $loader->total_row();
					$result_query = $loader->query_result();
					foreach($result_query as $row){  
					$guidance_name   =  $row['guidance_name']; 
					$sch_code   =  $row['school_code'];   
					}	



				if($result_row == 1 && $sch_code == $school_code)
				{
							$loader->query = "SELECT * FROM `4_student_reg` WHERE  `4_student_reg`.`parent_code` ='$delete_id' ";   
							$result_query = $loader->query_result();
							foreach($result_query as $row){ 
							$photo      =  $row['photo'];   
							@@unlink("../$SchoolIMG/$sch_code/$photo");
							}	
				


								

								$loader->query = "DELETE FROM `3_parent_reg` WHERE `3_parent_reg`.`parent_code` = '$delete_id' ";
								$loader->execute_query();


								$loader->query = "DELETE FROM `4_student_reg` WHERE `4_student_reg`.`parent_code` = '$delete_id' ";
								$loader->execute_query();
							

								$loader->query = "DELETE FROM `41_student_subjects` WHERE `41_student_subjects`.`parent_code` = '$delete_id' ";
								$loader->execute_query();


								$loader->query = "DELETE FROM `student_exam_result` WHERE `student_exam_result`.`parent_code` = '$delete_id' ";
								$loader->execute_query();
							


								$loader->query = "DELETE FROM `student_test_result` WHERE `student_test_result`.`parent_code` = '$delete_id' ";
								$loader->execute_query();
								
								echo $success ="$guidance_name account has been deleted with all connected accounts from database";

								echo"<a href='index.php'  class='btn btn-danger'> Continue </a>";
									

				}
				else
				{
					echo $success ="Invalid code passed";
				}
				
				
				
			} 
			else  if($category == 'teacher')
			{


				$loader->query = "SELECT * FROM  `2_teacher_reg` WHERE `2_teacher_reg`.`teacher_code`  ='$delete_id' ";  
				$result_row = $loader->total_row(); 
				$result_user_wallet = $loader->query_result();
				foreach($result_user_wallet as $row){

				$sch_code =  $row['school_code'];        
				$photo    =  $row['photo'];        
				}
	 
							if($result_row == 1 && $sch_code == $school_code)
							{

								 
								unlink("../myschoolapp_api/school/$sch_code/$photo");
								$loader->query = "DELETE FROM `2_teacher_reg` WHERE `2_teacher_reg`.`teacher_code` = '$delete_id' ";
								$loader->execute_query();


							 
								
								echo $success ="Techer Account has been deleted with all connected accounts from database";

								echo"<a href='index.php'  class='btn btn-danger'> Continue </a>";
									

							}
							else
							{
								echo $success ="Invalid code passed";
							}
			}	 		
			else  if($category == 'dropQuestion')
			{
 

				$loader->query = "SELECT * FROM `50_question_table` WHERE  `50_question_table`.`id` ='$delete_id' ";   
				$question_table = $loader->query_result();
				foreach($question_table as $row){

					$cbt_subject    =  $row['cbt_subject'];         
					$subject_id    =  $row['subject_id'];         
				
				  }	

				 $subject_name =  $loader->FecthSingleSubject($cbt_subject);
				  $query_wallet ="UPDATE `50_question_table` SET    
				  `cbt_status`   =  'general'
				  WHERE `50_question_table`.`subject_id` ='$subject_id' "; 
				 if(mysqli_query($homedb,$query_wallet)){

					$loader->query = "DELETE FROM `exam_access_code` WHERE `exam_access_code`.`access_code` = '$subject_id' ";
					$loader->execute_query();

					echo $success ="All $subject_name questions dropped";
				 }

				

				 


 
		    }	
			else  if($category == 'deleteQuestion')
			{
 

				$loader->query = "SELECT * FROM `50_question_table` WHERE  `50_question_table`.`id` ='$delete_id' ";   
				$question_table = $loader->query_result();
				foreach($question_table as $row){

					$raw_teacher_code    =  $row['teacher_code'];         
					$raw_school_code     =  $row['school_code'];         
				
				  }	

				 if($school_code === $raw_school_code){

							$loader->query = "DELETE FROM `50_question_table` WHERE `50_question_table`.`id` = '$delete_id' ";
							$loader->execute_query();


							$loader->query = "DELETE FROM `51_question_option` WHERE `51_question_option`.`question_id` = '$delete_id' ";
							$loader->execute_query();



							echo $success ="Questions deleted successfully";

				 }else{
					echo $success ="Questions deleted failed due to level of accessibility";
				 }


 
		    }	
			else  if($category == 'sceheme_of_work')
			{
 
 
				$loader->query = "DELETE FROM `scheme_of_uploader` WHERE `scheme_of_uploader`.`id` = '$delete_id' ";
				if($loader->execute_query())
				{
					 
					$output = array(
						'success'   =>	'success', 
						'feedback'	=>	'Scheme of work deleted successfully!!. '
					);
				 }
				 else
				 {
					$output = array(
						'success'   =>	'failed', 
						'feedback'	=>	'Scheme of work deleted failed!!. '
					);
				 }


				 echo json_encode($output);
		    }	
		}

	}	
	

 

	if($_POST['page'] == 'updateUserData')
	{

 
		if($_POST['action'] == 'parent')
		{
	 
					$guidance_name   =  trim($_POST['guidance_name']);
					$parent_code     =  trim($_POST['parent_code']);
					$sch_code        =  trim($_POST['sch_code']);
					$home_address    =  trim($_POST['home_address']);
					$parent_phone    =  trim($_POST['parent_phone']);
					$parent_email    =  trim($_POST['parent_email']);  
		 
            if($sch_code  == $school_code)
			{
						$query_wallet ="UPDATE `3_parent_reg` SET    
						`sch_code`       =  '$sch_code',
						`username`       =  '$parent_phone',
						`parent_code`    =  '$parent_code',
						`guidance_name`  =  '$guidance_name',
						`address`        =  '$home_address',
						`email`          =  '$parent_email'
					    WHERE `3_parent_reg`.`parent_code` = '$parent_code' ";  	 
						if(mysqli_query($homedb,$query_wallet))
						{

								$data= array( 
									'success'		=>	'success',
									'feedback'		=>	'Parent data updated successfully!!'
								);

						}
						else
						{
								$data= array(
									'success'		=>	'success',
									'feedback'		=>	'Parent data updated failed!!'
								);			
						}
			}
			else
			{
					$data= array(
						'success'		=>	'success',
						'feedback'		=>	'Invalid code passed'
					);			
			}
			echo json_encode($data);
		}

		if($_POST['action'] == 'student')
		{
			  
 

					$student_code   =  trim($_POST['student_code']);
					$school_id      =  trim($_POST['school_code']);
					$parent_code    =  trim($_POST['parent_code']);
					$teacher_code   =  trim($_POST['teacher_code']);
					$schl_stu_no    =  trim($_POST['schl_stu_no']);
					$student_name   =  trim($_POST['student_name']);
					$stu_gender     =  trim($_POST['stu_gender']);
					$student_class  =  trim($_POST['student_class']);
					$class_rep      =  trim($_POST['class_rep']); 
					$payment_status =  trim($_POST['payment_status']); 


					$loader->query ="SELECT * FROM 4_student_reg WHERE online_stu_id = '$student_code'";  
					$output = $loader->query_result();
					foreach($output as $row){
					$photo    = $row['photo'];
					$sch_code = $row['school_code'];
					}
            if($sch_code == $school_code)
			{
					    $location          = "school/$sch_code";
						$loader->filedata  = $_FILES['student_photo'];
						$field_photo       = $loader->UploadPhoto($location); 

					if(!empty($field_photo)){

						@@unlink("../$SchoolIMG/$school_code/$photo");

						$query_wallet ="UPDATE `4_student_reg` SET   
						`photo`            =  '$field_photo',
						`student_name`     =  '$student_name',
						`stu_gender`       =  '$stu_gender',
						`teacher_code`     =  '$teacher_code',
						`student_class`    =  '$student_class',
						`class_rep`        =  '$class_rep',
						`school_fee`       =  '$payment_status' 
						WHERE `4_student_reg`.`online_stu_id` = '$student_code' "; 


					}
					else
					{
						$query_wallet ="UPDATE `4_student_reg` SET    
						`student_name`     =  '$student_name',
						`stu_gender`       =  '$stu_gender',
						`student_class`    =  '$student_class',
						`class_rep`        =  '$class_rep',
						`school_fee`       =  '$payment_status' 
						WHERE `4_student_reg`.`online_stu_id` = '$student_code' "; 
					}


					if(mysqli_query($homedb,$query_wallet))
					{

					$data= array(
						'success'		=>	'success',
						'feedback'		=>	'Student data updated successfully!! '
					);

					}
					else
					{
					$data= array(
						'success'		=>	'success',
						'feedback'		=>	'Student data updated failed!! '
					);			
					}
			}
			else
			{
				$data= array(
					'success'		=>	'success',
					'feedback'		=>	'Invalid code passed '
				);			
			}

			echo json_encode($data);
		}

		if($_POST['action'] == 'teacher')
		{
			 
 
					
					 
					$teacher_code          =  trim($_POST['teacher_code']);
					$user_email_address    =  trim($_POST['user_email_address']);
					$fullname              =  trim($_POST['fullname']);
					$gender                =  trim($_POST['gender']);
					$phone                 =  trim($_POST['phone']);
					$address               =  trim($_POST['address']);
					$salary                =  trim($_POST['salary']);
					$teacher_rank          =  trim($_POST['teacher_rank']);
					$subject               =  trim($_POST['subject']);
					$acct_name             =  trim($_POST['acct_name']);
					$acct_number           =  trim($_POST['acct_number']);
					$bank_name             =  trim($_POST['bank_name']);   


					$loader->query ="SELECT * FROM 2_teacher_reg WHERE teacher_code = '$teacher_code'";  
					$output = $loader->query_result();
					foreach($output as $row){
					$photo    = $row['photo'];
					$sch_code = $row['school_code']; 
					}

					$loader->query = "SELECT * FROM `2_teacher_reg` WHERE `2_teacher_reg`.`teacher_rank` = 'head' AND `2_teacher_reg`.`school_code` ='$school_code'";  
					$result_total_row = $loader->total_row();			


						if($sch_code == $school_code)
						{
							///This section blocks two head teacher account update
							if( $result_total_row == 0  )
							{
							        $location          = "school/$school_code";
									$loader->filedata  = $_FILES['field_operator_photo'];
									$field_photo       = $loader->UploadPhoto($location); 

									if(!empty($field_photo))
									{

										@@unlink("../$SchoolIMG/$school_code/$photo");

										$query_wallet ="UPDATE `2_teacher_reg` SET   
										`photo`           =  '$field_photo',
										`fullname`        =  '$fullname',
										`gender`          =  '$gender',
										`phone`           =  '$phone',
										`address`         =  '$address',
										`salary`          =  '$salary',
										`subject`         =  '$subject',
										`account_name`    =  '$acct_name',
										`account_number`  =  '$acct_number', 
										`bank_name`       =  '$bank_name',
										`teacher_rank`    =  '$teacher_rank' 
										WHERE `2_teacher_reg`.`teacher_code` = '$teacher_code' "; 


									}
									else
									{
										$query_wallet ="UPDATE `2_teacher_reg` SET    
										`fullname`        =  '$fullname',
										`gender`          =  '$gender',
										`phone`           =  '$phone',
										`address`         =  '$address',
										`salary`          =  '$salary',
										`subject`         =  '$subject',
										`account_name`    =  '$acct_name',
										`account_number`  =  '$acct_number', 
										`bank_name`       =  '$bank_name',
										`teacher_rank`    =  '$teacher_rank' 
										WHERE `2_teacher_reg`.`teacher_code` = '$teacher_code' "; 
									}


									if(mysqli_query($homedb,$query_wallet))
									{

										$data= array(
											'success'		=>	'success',
											'feedback'		=>	'Teacher admin data updated successfully!! '
										);

									}
									else
									{
										$data= array(
											'success'		=>	'success',
											'feedback'		=>	'Teacher admin data updated failed!! '
										);			
									}

							}
							else if($teacher_rank == 'teacher')
							{
								
								$location          = "school/$school_code";
								$loader->filedata  = $_FILES['field_operator_photo'];
								$field_photo       = $loader->UploadPhoto($location); 

								if(!empty($field_photo))
								{

									@@unlink("../$SchoolIMG/$school_code/$photo");

									$query_wallet ="UPDATE `2_teacher_reg` SET   
									`photo`           =  '$field_photo',
									`fullname`        =  '$fullname',
									`gender`          =  '$gender',
									`phone`           =  '$phone',
									`address`         =  '$address',
									`salary`          =  '$salary',
									`subject`         =  '$subject',
									`account_name`    =  '$acct_name',
									`account_number`  =  '$acct_number', 
									`bank_name`       =  '$bank_name',
									`teacher_rank`    =  'teacher' 
									WHERE `2_teacher_reg`.`teacher_code` = '$teacher_code' "; 


								}
								else
								{
									$query_wallet ="UPDATE `2_teacher_reg` SET    
									`fullname`        =  '$fullname',
									`gender`          =  '$gender',
									`phone`           =  '$phone',
									`address`         =  '$address',
									`salary`          =  '$salary',
									`subject`         =  '$subject',
									`account_name`    =  '$acct_name',
									`account_number`  =  '$acct_number', 
									`bank_name`       =  '$bank_name',
									`teacher_rank`    =  'teacher' 
									WHERE `2_teacher_reg`.`teacher_code` = '$teacher_code' "; 
								}


								if(mysqli_query($homedb,$query_wallet))
								{

									$data= array(
										'success'		=>	'success',
										'feedback'		=>	'Teacher admin data updated successfully!! '
									);

								}
								else
								{
									$data= array(
										'success'		=>	'success',
										'feedback'		=>	'Teacher admin data updated failed!! '
									);			
								}
							}
							else
							{

								$data = array(
									'success'		=>	'failed',
									'feedback'		=>	"You can only have one head teacher registered, if insisted update current head teacher account to teaching staff and continue"
								);
							}								
					}
					else
					{
						$data= array(
							'success'		=>	'failed',
							'feedback'		=>	'Invalid code passed '
						);			
					}


					echo json_encode($data);
		}


		if($_POST['action'] == 'school')
		{

			$school_id           =  trim($_POST['school_id']); 
			$marketer_code       =  trim($_POST['marketer_code']); 
			$school_name         =  trim($_POST['school_name']);
			$school_email        =  trim($_POST['school_email']);
			$school_website      =  trim($_POST['school_website']);
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

			$loader->query ="SELECT * FROM 1_school_reg WHERE school_code = '$school_id'";  
			$output = $loader->query_result();
			foreach($output as $row){
				$school_photo_raw     = $row['school_photo'];
				$school_logo_raw      = $row['school_logo'];
				$sch_code             = $row['school_code'];
				$raw_propritor_photo  = $row['schl_propritor_photo'];
				$raw_head_photo      = $row['schl_head_photo'];
			}

					$location          = "school/$sch_code";

					$loader->filedata  = $_FILES['school_photo'];
					$school_photo      = $loader->UploadPhoto($location);  
					if(!empty($school_photo)){
					 		
						 @@unlink("../$SchoolIMG/$sch_code/$school_photo_raw");

						$query_wallet ="UPDATE `1_school_reg` SET  
						`school_photo` =  '$school_photo'
						WHERE `1_school_reg`.`school_code` = '$sch_code' ";	
						mysqli_query($homedb,$query_wallet);
					}////////////////////////////////////////////////////////
                if($sch_code == $school_code)
				{
								$loader->filedata  = $_FILES['school_logo'];
								$school_logo      = $loader->UploadPhoto($location);  
								if(!empty($school_logo)){
										
									@@unlink("../$SchoolIMG/$school_code/$school_logo_raw");

									$query_wallet ="UPDATE `1_school_reg` SET  
									`school_logo` =  '$school_logo'
									WHERE `1_school_reg`.`school_code` = '$school_code' ";	
									mysqli_query($homedb,$query_wallet);
								}///////////////////////////////////////////////////////// 
									$loader->filedata       = $_FILES['schl_propritor_photo'];
									$schl_propritor_photo   = $loader->UploadPhoto($location); 
								if(!empty($schl_propritor_photo)){
									@@unlink("../$SchoolIMG/$school_code/$raw_propritor_photo");
									
									$query_wallet ="UPDATE `1_school_reg` SET  
									`schl_propritor_photo` =  '$schl_propritor_photo'
									WHERE `1_school_reg`.`school_code` = '$school_code' ";	
									mysqli_query($homedb,$query_wallet);
								}///////////////////////////////////////////////////////// 
									$loader->filedata  = $_FILES['schl_head_photo'];
									$schl_head_photo   = $loader->UploadPhoto($location); 	
								if(!empty($schl_head_photo)){
									@@unlink("../$SchoolIMG/$school_code/$raw_head_photo");
									
									$query_wallet ="UPDATE `1_school_reg` SET  
									`schl_head_photo` =  '$schl_head_photo'
									WHERE `1_school_reg`.`school_code` = '$school_code' ";	
									mysqli_query($homedb,$query_wallet);					
								}


					$query_wallet ="UPDATE `1_school_reg` SET  
					`school_name`         =  '$school_name',
					`school_email`        =  '$school_email',
					`school_website`      =  '$school_website',
					`school_phone`        =  '$school_phone',
					`school_address`      =  '$school_address',
					`school_motor`        =  '$school_motor',
					`school_bgcolor`      =  '$school_bgcolor',
					`text_code`           =  '$text_code', 
					`school_week`         =  '$school_week', 
					`bank_name`           =  '$bank_name',
					`account_name`        =  '$account_name',
					`account_number`      =  '$account_number',   
					`schl_propritor_name` =  '$schl_propritor_name', 
					`schl_propritor_msg`  =  '$schl_propritor_msg',
					`schl_head_name`      =  '$schl_head_name', 
					`schl_head_msg`       =  '$schl_head_msg',
					`exam_score`          =  '$exam_score',
					`test_score`          =  '$test_score',
					`exam_time`           =  '$exam_time',
					`test_time`           =  '$test_time',
					`current_term`        =  '$current_term',
					`session`             =  '$session'
					WHERE `1_school_reg`.`school_code` = '$school_code' ";
    
					if(mysqli_query($homedb,$query_wallet))
					{

							$data= array(
								'success'		=>	'success',
								'feedback'		=>	'school account updated successfully!! '
							);

					}
					else
					{
								$data= array(
									'success'		=>	'success',
									'feedback'		=>	'school account updated failed!! '
								);			
					}

				}
				else
				{
							$data= array(
								'success'		=>	'success',
								'feedback'		=>	'Invalid code passed '
							);			
				}
		

		    echo json_encode($data);
        }

	}

	if($_POST['page'] == 'subjectSetup')
	{	
	
            
			if($_POST['action'] == 'searchStudentResult')
			{
				
				
				
				$online_stu_id = trim($_POST['stu_online_id']) ;
			 
				$date_maintain = date('Y-m-d');
				$success=""; 
				$failed="";

				
							 

						$loader->query = "SELECT * FROM `4_student_reg` WHERE  `4_student_reg`.`online_stu_id` ='$online_stu_id' ";  
						$result_row = $loader->total_row();
						$result_user_wallet = $loader->query_result();
						foreach($result_user_wallet as $row){

							$photo          =  $row['photo'];   
							 
							$parent_code    =  $row['parent_code'];   
							$sch_code    =  $row['school_code'];   
							$student_name   =  $row['student_name'];   
							$schl_stu_no    =  $row['schl_stu_no'];   
							$online_stu_id  =  $row['online_stu_id'];   
							$student_class  =  $row['student_class'];   
							$sub_status     =  $row['sub_status'];   
							$date           =  $row['date'];   
						
						}	
						
					
						
						if($result_row == 1 && $sch_code == $school_code)
						{
							//$i=0;
							 $result = $loader->GetAllSubjects();
							$schoolName = $loader-> SchoolName($school_code);	
									  
 
					 
						
					     	echo $success =' 
							 
										<div style="text-align:center;font-wweight:bold;font-size:20px">
									   <div card-header>
										  <h4 style="text-decoration:underline;">STUDENT RESULT UPDATE </h4>
										</div>
										
										  <a href="student_subject_check.php?student_id='.$online_stu_id.'">
											<div class="form-group">	
											<label>Student ID  <b> '.$online_stu_id.' </b> </label><br />
											<img src="../'.$SchoolIMG.'/'.$school_code.'/'.$photo.'"  style="height: 200px;border-radius:900pcdcdx" />
											</div>
										 </a>
										    <div>'.$schoolName.'</div>
                                            <div>'.$student_name.'</div> 
                                            <div>'.$student_class.'</div>
										
										<h4 style="text-decoration:underline;margin-bottom:10px">Subject Results </h4>
										</div>





							 
								  ';



			 					   foreach($result as $row)
									{

										$sub_title    = $row['sub_title']; 
										$subject_id   = $row['subject_id']; 
											 
											
											echo$data="
											<div card-header>
											
											</div>
											<div style='display:flex;font-size: 20px'>  
											
											<div style='width:5%'>  $subject_id   </div>
											<div style='width:70%; text-transform:capitalize'  id='sub_title'> $sub_title   </div>
											<div style='width:20%'  onclick='addSubject(\"$subject_id\",\"$online_stu_id\")' class='btn btn-danger'>Update   </div>
											</div><hr>
											";
										  
									}	
						}
						else
						{
							
							
							echo $failed ='
										<div class="col-xl- col-md-6">
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
										   
										 Invalid Online Student ID  inserted.  
										 
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
							</div>  
					</div>';
							 
							
							
							
						}
						
						
		 
			}
	

 

			if($_POST['action'] == 'searchStudent')
			{
				
				
				
				$online_stu_id = trim($_POST['stu_online_id']) ;
			 
				$date_maintain = date('Y-m-d');
				$success=""; 
				$failed="";

				
							 

						$loader->query = "SELECT * FROM `4_student_reg` WHERE  `4_student_reg`.`online_stu_id` ='$online_stu_id' ";  
						$result_row = $loader->total_row();
						$result_user_wallet = $loader->query_result();
						foreach($result_user_wallet as $row){

							$photo          =  $row['photo'];   
							 
							$parent_code    =  $row['parent_code'];   
							$sch_code       =  $row['school_code'];   
							$student_name   =  $row['student_name'];   
							$schl_stu_no    =  $row['schl_stu_no'];   
							$online_stu_id  =  $row['online_stu_id'];   
							$student_class  =  $row['student_class'];   
							$sub_status     =  $row['sub_status'];   
							$date           =  $row['date'];   
						
						}	
						
					
						
						if($result_row == 1 && $school_code  == $sch_code)
						{
							//$i=0;
							 $result = $loader->GetAllSubjects();
							$schoolName = $loader-> SchoolName($school_code);	
									  
 
					 
						
						      echo $success =' 
							 
										<div style="text-align:center;font-wweight:bold;font-size:20px">
									   <div card-header>
										  <h2 style="text-decoration:underline;">STUDENT INFOMATION </h2>
										</div>
										
										  <a href="student_subject_check.php?student_id='.$online_stu_id.'">
											<div class="form-group">	
											<label>Student ID  <b> '.$online_stu_id.' </b> </label><br />
											<img src="../'.$SchoolIMG.'/'.$school_code.'/'.$photo.'"  style="height: 200px;border-radius:900pcdcdx" />
											</div>
										 </a>
										    <div>School Name: '.$schoolName.'</div>
                                            <div>Fullname:  '.$student_name.'</div> 
                                            <div>Current Class: '.$student_class.'</div>
										
										<h2 style="text-decoration:underline;margin-bottom:10px">Subject Registration </h2>
										</div>





							 
								  ';



			 					   foreach($result as $row)
									{

										$sub_title    = $row['sub_title']; 
										$subject_id   = $row['id']; 
											 
											
											echo$data="
											<div card-header>
											
											</div>
											<div style='display:flex;font-size: 20px'>  
											
											<div style='width:5%'>  $subject_id   </div>
											<div style='width:70%; text-transform:capitalize'  id='sub_title'> $sub_title   </div>
											<div style='width:20%'  onclick='addSubject(\"$subject_id\",\"$online_stu_id\")' class='btn btn-success'>Add Subject    </div>
											</div><hr>
											";
										  
									}	
						}
						else
						{
							
							
							echo $failed ='
										<div class="col-xl- col-md-6">
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
										   
										 Invalid Online Student ID  inserted. 
										 
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
							</div>  
					        </div>';
							 
							
							
							
						}
						
						
		 
			}
	

			if($_POST['action'] == 'resetStudentScore')
			{
				
                      $resultType    = trim($_POST['resultType']) ;
                      $stuScore      = trim($_POST['stuScore']) ;
                      $stu_online_id = trim($_POST['stu_online_id']) ;
                      $sub_id        = trim($_POST['subject_id']) ;

					  $loader->query = "SELECT * FROM `4_student_reg` WHERE  `4_student_reg`.`online_stu_id` ='$stu_online_id' ";  
					  $result_row = $loader->total_row();
					  $result_user_wallet = $loader->query_result();
					  foreach($result_user_wallet as $row){
   
						  $sch_code       =  $row['school_code'];     
					  
					  }	
					  
 
				if($school_code  == $sch_code)
				{
                    if($resultType == 'exam')
					{
						$query_wallet ="UPDATE `student_exam_result` SET   
						`$sub_id`     = 'null' 		 
						WHERE `student_exam_result`.`student_code` = '$stu_online_id' "; 

						if(mysqli_query($homedb,$query_wallet))
						{ 
							echo$feedback		=	"Student exam reset "; 
						}
						else
						{  
							echo $feedback		=	"Newtwork error"; 
						}
					}
					else if($resultType == 'test')
					{
						$query_wallet ="UPDATE `student_test_result` SET   
						`$sub_id`     = 'null' 		 
						WHERE `student_test_result`.`student_code` = '$stu_online_id' "; 

						if(mysqli_query($homedb,$query_wallet))
						{ 
							echo$feedback		=	"Student mid-term test reset ";  
						}
						else
						{  
							echo $feedback		=	"Newtwork error"; 
						}

					}


				}
				else
				{
					
					
					echo $feedback ='
								<div class="col-xl- col-md-6">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
								   
								 Invalid Online Student ID  inserted. 
								 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>  
					</div>';
					 
					
					
					
				}
				
					
				 
	 
							
				 	
							
			}

			if($_POST['action'] == 'updateStudentScore')
			{
				
                      $resultType    = trim($_POST['resultType']) ;
                      $stuScore      = trim($_POST['stuScore']) ;
                      $stu_online_id = trim($_POST['stu_online_id']) ;
                      $sub_id    = trim($_POST['subject_id']) ;

					  $loader->query = "SELECT * FROM `4_student_reg` WHERE  `4_student_reg`.`online_stu_id` ='$stu_online_id' ";   
					  $result_user_wallet = $loader->query_result();
					  foreach($result_user_wallet as $row){
   
						  $sch_code       =  $row['school_code'];     
					  
					  }	
 
				if($school_code  == $sch_code)
				{
                    if($resultType == 'exam')
					{
						$query_wallet ="UPDATE `student_exam_result` SET   
						`$sub_id`     = '$stuScore' 		 
						WHERE `student_exam_result`.`student_code` = '$stu_online_id' "; 

						if(mysqli_query($homedb,$query_wallet))
						{ 
							echo$feedback		=	"Student score updated  "; 
						}
						else
						{  
							echo $feedback		=	"Newtwork error"; 
						}
					}
					else if($resultType == 'test')
					{
						$query_wallet ="UPDATE `student_test_result` SET   
						`$sub_id`     = '$stuScore' 		 
						WHERE `student_test_result`.`student_code` = '$stu_online_id' "; 

						if(mysqli_query($homedb,$query_wallet))
						{ 
							echo$feedback		=	"Student score updated  "; 
						}
						else
						{  
							echo $feedback		=	"Newtwork error"; 
						}

					}


				}
				else
				{
					
					
					echo $feedback ='
								<div class="col-xl- col-md-6">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
								   
								 Invalid Online Student ID  inserted. 
								 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>  
					</div>';
					 
					
					
					
				}
					
					
				 
	 
							
				 	
							
			}
			 

			if($_POST['action'] == 'updateSubjectID')
			{
				
                      $stu_online_id = trim($_POST['stu_online_id']) ;
                      $subject_id    = trim($_POST['subject_id']) ;

					$loader->query = "SELECT * FROM `40_all_subject` WHERE `40_all_subject`.`id` ='$subject_id'"; 
					$result_user_wallet = $loader->query_result();
					foreach($result_user_wallet as $row){
   
					$sub_title   =  $row['sub_title'];      
					$sub_id      =  $row['sub_id'];      
					}
			


					$loader->query = "SELECT * FROM `4_student_reg` WHERE  `4_student_reg`.`online_stu_id` ='$stu_online_id' ";   
					$result_user_wallet = $loader->query_result();
					foreach($result_user_wallet as $row){
 
						$sch_code       =  $row['school_code'];     
					
					}	
										$query_wallet ="UPDATE `41_student_subjects` SET   
										`$sub_id`     = '$sub_title' 		 
										WHERE `41_student_subjects`.`student_code` = '$stu_online_id' "; 


							if($school_code  == $sch_code)
							{
										if(mysqli_query($homedb,$query_wallet))
										{
	  
												$query_wallet ="UPDATE `student_exam_result` SET   
												`$sub_id`     = 'null' 		 
												WHERE `student_exam_result`.`student_code` = '$stu_online_id' "; 
												mysqli_query($homedb,$query_wallet);

                                                $query_wallet ="UPDATE `student_test_result` SET   
												`$sub_id`     = 'null' 		 
												WHERE `student_test_result`.`student_code` = '$stu_online_id' "; 
												mysqli_query($homedb,$query_wallet);


                                                $query_wallet ="UPDATE `student_weekly_assesment` SET   
												`$sub_id`     = 'null' 		 
												WHERE `student_weekly_assesment`.`student_code` = '$stu_online_id' "; 
												mysqli_query($homedb,$query_wallet);


										    	echo$feedback		=	"$sub_title has been added to student subject list";
											 

										}
										else
										{ 
											 
											echo $feedback		=	"Newtwork error";
											 
										}

							}
							else
							{
								
								
								echo $feedback ='
											<div class="col-xl- col-md-6">
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
												
												Invalid Online Student ID  inserted. 
												
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
								</div>  
								</div>';
									
								
								
								
							}
					
				 
	 
							
				 	
							
			}
			 


			 
		
			if($_POST['action'] == 'checkSubjects')
			{
				
				 
				
				$online_stu_id = trim($_POST['stu_online_id']) ;
			 
				$date_maintain = date('Y-m-d');
				$success=""; 
				$failed="";

				
							 

						$loader->query = "SELECT * FROM `4_student_reg` WHERE  `4_student_reg`.`online_stu_id` ='$online_stu_id' ";  
						$result_row = $loader->total_row();
						$result_user_wallet = $loader->query_result();
						foreach($result_user_wallet as $row){

							$photo          =  $row['photo'];      
							$parent_code    =  $row['parent_code'];   
							$sch_code    =  $row['school_code'];   
							$student_name   =  $row['student_name'];   
							$schl_stu_no    =  $row['schl_stu_no'];   
							$online_stu_id  =  $row['online_stu_id'];   
							$student_class  =  $row['student_class'];   
							$sub_status     =  $row['sub_status'];   
							$stu_gender     =  $row['stu_gender'];   
							$date           =  $row['date'];   
						
						}	
						
					
						
						if($result_row == 1 && $sch_code == $school_code)
						{
									//$i=0;
									$result = $loader->GetStudentSubject($online_stu_id);

									$schoolName = $loader-> SchoolName($sch_code);	
									$parent_name = $loader-> ParentName($parent_code);

							
								
								echo $success =' 
							 
										<div style="text-align:center;font-wweight:bold;font-size:20px">
									   <div card-header>
										  <h2 style="text-decoration:underline;color:green">'.$student_name.' </h2>
										</div>
										
										 
											<div class="form-group">	
											<label style="color:red"> <b> '.$online_stu_id.' </b> </label><br />
											<img src="../'.$SchoolIMG.'/'.$sch_code.'/'.$photo.'"  style="height: 200px;border-radius:500px" />
											</div>
										
                                            <div>School Name: '.$schoolName.'</div>
                                            <div>Parent Name: '.$parent_name.'</div>
                                            <div>Student Name:  '.$student_name.'</div>
                                            <div>Gender: '.$stu_gender.'</div>
                                            <div>Student NO: '.$schl_stu_no.'</div>
											<div>Class: '.$student_class.'</div>
											<div>Payment Status: '.$sub_status.'</div>
											 <a href="update_student_data.php?student_id='.$online_stu_id.'">
											<div class="btn btn-success"> Update Student Data</div>
											</a>
										
										<h2 style="text-decoration:underline;margin-bottom:20px;color:red"> REGISTERED SUBJECTS  </h2>
										</div>





							 
								  ';

								  foreach($result as $row)
								  {
								  
										 $newOnlineId = $online_stu_id; // substr($online_stu_id, 3);   //I HAD TO REMOVE THE 3 FIRST LETTERS 

										  


		   


					   

										 if(!empty($row['sub_1'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_1']."  </div>
										  <div style='width:10%'   onclick='removeSubject(1, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }



										 if(!empty($row['sub_2'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_2']."  </div>
										  <div style='width:10%'   onclick='removeSubject(2, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }

										 if(!empty($row['sub_3'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_3']."  </div>
										  <div style='width:10%'   onclick='removeSubject(3, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }

										 if(!empty($row['sub_4'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_4']."  </div>
										  <div style='width:10%'   onclick='removeSubject(4, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }

										 if(!empty($row['sub_5'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_5']."  </div>
										  <div style='width:10%'   onclick='removeSubject(5, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }

										 if(!empty($row['sub_6'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_6']."  </div>
										  <div style='width:10%'   onclick='removeSubject(6, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }

										  
										 if(!empty($row['sub_7'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_7']."  </div>
										  <div style='width:10%'   onclick='removeSubject(7, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }

										 if(!empty($row['sub_8'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_8']."  </div>
										  <div style='width:10%'   onclick='removeSubject(8, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_9'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_9']."  </div>
										  <div style='width:10%'   onclick='removeSubject(9, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_10'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_10']."  </div>
										  <div style='width:10%'   onclick='removeSubject(10, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_11'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_11']."  </div>
										  <div style='width:10%'   onclick='removeSubject(11, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_12'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_12']."  </div>
										  <div style='width:10%'   onclick='removeSubject(12, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_13'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_13']."  </div>
										  <div style='width:10%'   onclick='removeSubject(13, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_14'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_14']."  </div>
										  <div style='width:10%'   onclick='removeSubject(14, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_15'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_15']."  </div>
										  <div style='width:10%'   onclick='removeSubject(15, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_16'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_16']."  </div>
										  <div style='width:10%'   onclick='removeSubject(16, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_17'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_17']."  </div>
										  <div style='width:10%'   onclick='removeSubject(17, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_18'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_18']."  </div>
										  <div style='width:10%'   onclick='removeSubject(18, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_19'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_19']."  </div>
										  <div style='width:10%'   onclick='removeSubject(19, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_20'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_20']."  </div>
										  <div style='width:10%'   onclick='removeSubject(20, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_21'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_21']."  </div>
										  <div style='width:10%'   onclick='removeSubject(21, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_22'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_22']."  </div>
										  <div style='width:10%'   onclick='removeSubject(22, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_23'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_23']."  </div>
										  <div style='width:10%'   onclick='removeSubject(23, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_24'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_24']."  </div>
										  <div style='width:10%'   onclick='removeSubject(24, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_25'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_25']."  </div>
										  <div style='width:10%'   onclick='removeSubject(25, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_26'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_26']."  </div>
										  <div style='width:10%'   onclick='removeSubject(26, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_27'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_27']."  </div>
										  <div style='width:10%'   onclick='removeSubject(27, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_28'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_28']."  </div>
										  <div style='width:10%'   onclick='removeSubject(28, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_28'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_28']."  </div>
										  <div style='width:10%'   onclick='removeSubject(28, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_29'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_29']."  </div>
										  <div style='width:10%'   onclick='removeSubject(29, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_30'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_30']."  </div>
										  <div style='width:10%'   onclick='removeSubject(30, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_31'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_31']."  </div>
										  <div style='width:10%'   onclick='removeSubject(31, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_32'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_32']."  </div>
										  <div style='width:10%'   onclick='removeSubject(32, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_33'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_33']."  </div>
										  <div style='width:10%'   onclick='removeSubject(33, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_34'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_34']."  </div>
										  <div style='width:10%'   onclick='removeSubject(34, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_35'])){ 
										 
											echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_35']."  </div>
										  <div style='width:10%'   onclick='removeSubject(35, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_36'])){ 
										 
											  echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_36']."  </div>
										  <div style='width:10%'   onclick='removeSubject(36, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											  ";										  
										  }
										  if(!empty($row['sub_37'])){ 
										  
											  echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_37']."  </div>
										  <div style='width:10%'   onclick='removeSubject(37, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											  ";										  
										  }
										  if(!empty($row['sub_38'])){ 
										  
											  echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_38']."  </div>
										  <div style='width:10%'   onclick='removeSubject(38, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											  ";										  
										  }
										  if(!empty($row['sub_39'])){ 
										  
											  echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_39']."  </div>
										  <div style='width:10%'   onclick='removeSubject(39, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											  ";										  
										  }
										  if(!empty($row['sub_40'])){ 
										  
											  echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_40']."  </div>
										  <div style='width:10%'   onclick='removeSubject(40, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											  ";										  
										  }
										  if(!empty($row['sub_41'])){ 
										  
											  echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_41']."  </div>
										  <div style='width:10%'   onclick='removeSubject(41, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											  ";										  
										  }
										  if(!empty($row['sub_42'])){ 
										  
											  echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_42']."  </div>
										  <div style='width:10%'   onclick='removeSubject(42, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											  ";										  
										  }
										  if(!empty($row['sub_43'])){ 
										  
											  echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_43']."  </div>
										  <div style='width:10%'   onclick='removeSubject(43, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											  ";										  
										  }
										  if(!empty($row['sub_44'])){ 
										  
											  echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_44']."  </div>
										  <div style='width:10%'   onclick='removeSubject(44, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											  ";										  
										  }
										  if(!empty($row['sub_45'])){ 
										  
											  echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_45']."  </div>
										  <div style='width:10%'   onclick='removeSubject(45, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											  ";										  
										  }
										  if(!empty($row['sub_46'])){ 
										  
											  echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_46']."  </div>
										  <div style='width:10%'   onclick='removeSubject(46, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											  ";										  
										  }
										  if(!empty($row['sub_47'])){ 
										  
											  echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_47']."  </div>
										  <div style='width:10%'   onclick='removeSubject(47, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											  ";										  
										  }
										  if(!empty($row['sub_48'])){ 
										  
											  echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_48']."  </div>
										  <div style='width:10%'   onclick='removeSubject(48, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											  ";										  
										  }
										  if(!empty($row['sub_49'])){ 
										  
											  echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_49']."  </div>
										  <div style='width:10%'   onclick='removeSubject(49, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											  ";										  
										  }
										  if(!empty($row['sub_50'])){ 
										  
											  echo$data="
										  <div style='display:flex;font-size: 20px'>   
										  <div style='width:85%;text-transform:capitalize'  id='sub_title'>  ".$row['sub_50']."  </div>
										  <div style='width:10%'   onclick='removeSubject(50, \"$newOnlineId\")'   class='btn btn-danger'>Remove Subject?   </div>
										  </div>
										  <hr>											  
											  ";										  
										  }

										

								  

							  
										
								  }
								  
						}
						else
						{
							
							
							echo $failed ='
										<div class="col-xl- col-md-6">
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
										   
										 Invalid Online Student ID  inserted. Please check table below to get  Online Student ID
										 
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
							</div>  
					       </div>';
							 
							
							
							
						}
						
						
		 
			}



			if($_POST['action'] == 'checkResult')
			{
				
			 
				
				$online_stu_id = trim($_POST['stu_online_id']) ;
			 
				$date_maintain = date('Y-m-d');
				$success=""; 
				$failed="";

				
							 

						$loader->query = "SELECT * FROM `4_student_reg` WHERE  `4_student_reg`.`online_stu_id` ='$online_stu_id' ";  
						$result_row = $loader->total_row();
						$result_user_wallet = $loader->query_result();
						foreach($result_user_wallet as $row){

							$photo          =  $row['photo'];      
							$parent_code    =  $row['parent_code'];   
							$sch_code       =  $row['school_code'];   
							$student_name   =  $row['student_name'];   
							$schl_stu_no    =  $row['schl_stu_no'];      
							$student_class  =  $row['student_class'];   
							$sub_status     =  $row['sub_status'];   
							$stu_gender     =  $row['stu_gender'];   
							$date           =  $row['date'];   
						
						}	


						// $api_object->query = "SELECT * FROM `student_exam_result` WHERE student_code = '143978' AND school_code ='SCH143091' "; 
						$loader->query = "SELECT * FROM student_exam_result  WHERE student_code = '$online_stu_id'  "; 
						$result = $loader->query_result();  
						foreach($result as $row) 
						{
								

								
							$stuExam_1 =  $row['sub_1'];
							$stuExam_2 =  $row['sub_2'];
							$stuExam_3 =  $row['sub_3']; 
							$stuExam_4 =  $row['sub_4'];
							$stuExam_5 =  $row['sub_5'];
							$stuExam_6 =  $row['sub_6'];
							$stuExam_7 =  $row['sub_7'];
							$stuExam_8 =  $row['sub_8'];
							$stuExam_9 =  $row['sub_9']; 
							$stuExam_10 =  $row['sub_10'];  
							$stuExam_11 =  $row['sub_11'];  
							$stuExam_12 =  $row['sub_12'];  
							$stuExam_13 =  $row['sub_13'];  
							$stuExam_14 =  $row['sub_14'];  
							$stuExam_15 =  $row['sub_15'];  
							$stuExam_16 =  $row['sub_16'];  
							$stuExam_17 =  $row['sub_17'];  
							$stuExam_18 =  $row['sub_18'];  
							$stuExam_19 =  $row['sub_19'];  
							$stuExam_20 =  $row['sub_20'];  
							$stuExam_21 =  $row['sub_21'];  
							$stuExam_22 =  $row['sub_22'];  
							$stuExam_23 =  $row['sub_23'];  
							$stuExam_24 =  $row['sub_24'];  
							$stuExam_25 =  $row['sub_25'];  
							$stuExam_26 =  $row['sub_26'];  
							$stuExam_27 =  $row['sub_27'];  
							$stuExam_28 =  $row['sub_28'];  
							$stuExam_29 =  $row['sub_29'];  
							$stuExam_30 =  $row['sub_30'];  
							$stuExam_31 =  $row['sub_31'];  
							$stuExam_32 =  $row['sub_32'];  
							$stuExam_33 =  $row['sub_33'];  
							$stuExam_34 =  $row['sub_34'];  
							$stuExam_35 =  $row['sub_35'];        
							$stuExam_36 =  $row['sub_36'];        
							$stuExam_37 =  $row['sub_37'];        
							$stuExam_38 =  $row['sub_38'];        
							$stuExam_39 =  $row['sub_39'];        
							$stuExam_40 =  $row['sub_40'];        
							$stuExam_41 =  $row['sub_41'];        
							$stuExam_42 =  $row['sub_42'];        
							$stuExam_43 =  $row['sub_43'];        
							$stuExam_44 =  $row['sub_44'];        
							$stuExam_45 =  $row['sub_45'];        
							$stuExam_46 =  $row['sub_46'];        
							$stuExam_47 =  $row['sub_47'];        
							$stuExam_48 =  $row['sub_48'];        
							$stuExam_49 =  $row['sub_49'];        
							$stuExam_50 =  $row['sub_50'];      
						}
 


                        $loader->query = "SELECT * FROM `student_test_result` WHERE student_code = '$online_stu_id' ";
                        $result_que = $loader->query_result();  
						foreach($result_que as $row_2) 
						{ 
							$stuTest_1 =  $row_2['sub_1'];
							$stuTest_2 =  $row_2['sub_2'];
							$stuTest_3 =  $row_2['sub_3']; 
							$stuTest_4 =  $row_2['sub_4'];
							$stuTest_5 =  $row_2['sub_5'];
							$stuTest_6 =  $row_2['sub_6'];
							$stuTest_7 =  $row_2['sub_7'];
							$stuTest_8 =  $row_2['sub_8'];
							$stuTest_9 =  $row_2['sub_9']; 
							$stuTest_10 =  $row_2['sub_10'];  
							$stuTest_11 =  $row_2['sub_11'];  
							$stuTest_12 =  $row_2['sub_12'];  
							$stuTest_13 =  $row_2['sub_13'];  
							$stuTest_14 =  $row_2['sub_14'];  
							$stuTest_15 =  $row_2['sub_15'];  
							$stuTest_16 =  $row_2['sub_16'];  
							$stuTest_17 =  $row_2['sub_17'];  
							$stuTest_18 =  $row_2['sub_18'];  
							$stuTest_19 =  $row_2['sub_19'];  
							$stuTest_20 =  $row_2['sub_20'];  
							$stuTest_21 =  $row_2['sub_21'];  
							$stuTest_22 =  $row_2['sub_22'];  
							$stuTest_23 =  $row_2['sub_23'];  
							$stuTest_24 =  $row_2['sub_24'];  
							$stuTest_25 =  $row_2['sub_25'];  
							$stuTest_26 =  $row_2['sub_26'];  
							$stuTest_27 =  $row_2['sub_27'];  
							$stuTest_28 =  $row_2['sub_28'];  
							$stuTest_29 =  $row_2['sub_29'];  
							$stuTest_30 =  $row_2['sub_30'];  
							$stuTest_31 =  $row_2['sub_31'];  
							$stuTest_32 =  $row_2['sub_32'];  
							$stuTest_33 =  $row_2['sub_33'];  
							$stuTest_34 =  $row_2['sub_34'];  
							$stuTest_35 =  $row_2['sub_35'];   
							$stuTest_36 =  $row_2['sub_36'];   
							$stuTest_37 =  $row_2['sub_37'];   
							$stuTest_38 =  $row_2['sub_38'];   
							$stuTest_39 =  $row_2['sub_39'];   
							$stuTest_40 =  $row_2['sub_40'];   
							$stuTest_41 =  $row_2['sub_41'];   
							$stuTest_42 =  $row_2['sub_42'];   
							$stuTest_43 =  $row_2['sub_43'];   
							$stuTest_44 =  $row_2['sub_44'];   
							$stuTest_45 =  $row_2['sub_45'];   
							$stuTest_46 =  $row_2['sub_46'];   
							$stuTest_47 =  $row_2['sub_47'];   
							$stuTest_48 =  $row_2['sub_48'];   
							$stuTest_49 =  $row_2['sub_49'];   
							$stuTest_50 =  $row_2['sub_50'];   
                                 

                        }


						$result_1  = intval($stuExam_1) + intval($stuTest_1); 
						$result_2  = intval($stuExam_2) + intval($stuTest_2); 
						$result_3  = intval($stuExam_3) + intval($stuTest_3);  
						$result_4  = intval($stuExam_4) + intval($stuTest_4); 
						$result_5  = intval($stuExam_5) + intval($stuTest_5); 
						$result_6  = intval($stuExam_6) + intval($stuTest_6); 
						$result_7  = intval($stuExam_7) + intval($stuTest_7); 
						$result_8  = intval($stuExam_8) + intval($stuTest_8); 
						$result_9  = intval($stuExam_9) + intval($stuTest_9);  
						$result_10 = intval($stuExam_10) + intval($stuTest_10);  
						$result_11 = intval($stuExam_11) + intval($stuTest_11);  
						$result_12 = intval($stuExam_12) + intval($stuTest_12);  
						$result_13 = intval($stuExam_13) + intval($stuTest_13);  
						$result_14 = intval($stuExam_14) + intval($stuTest_14);  
						$result_15 = intval($stuExam_15) + intval($stuTest_15);  
						$result_16 = intval($stuExam_16) + intval($stuTest_16);  
						$result_17 = intval($stuExam_17) + intval($stuTest_17);  
						$result_18 = intval($stuExam_18) + intval($stuTest_18);  
						$result_19 = intval($stuExam_19) + intval($stuTest_19);  
						$result_20 = intval($stuExam_20) + intval($stuTest_20);  
						$result_21 = intval($stuExam_21) + intval($stuTest_21);  
						$result_22 = intval($stuExam_22) + intval($stuTest_22);  
						$result_23 = intval($stuExam_23) + intval($stuTest_23);  
						$result_24 = intval($stuExam_24) + intval($stuTest_24);  
						$result_25 = intval($stuExam_25) + intval($stuTest_25);  
						$result_26 = intval($stuExam_26) + intval($stuTest_26);  
						$result_27 = intval($stuExam_27) + intval($stuTest_27);  
						$result_28 = intval($stuExam_28) + intval($stuTest_28);  
						$result_29 = intval($stuExam_29) + intval($stuTest_29);  
						$result_30 = intval($stuExam_30) + intval($stuTest_30);  
						$result_31 = intval($stuExam_31) + intval($stuTest_31);  
						$result_32 = intval($stuExam_32) + intval($stuTest_32);  
						$result_33 = intval($stuExam_33) + intval($stuTest_33);  
						$result_34 = intval($stuExam_34) + intval($stuTest_34);  
						$result_35 = intval($stuExam_35) + intval($stuTest_35); 
						$result_36 = intval($stuExam_36) + intval($stuTest_36); 
						$result_37 = intval($stuExam_37) + intval($stuTest_37); 
						$result_38 = intval($stuExam_38) + intval($stuTest_38); 
						$result_39 = intval($stuExam_39) + intval($stuTest_39); 
						$result_40 = intval($stuExam_40) + intval($stuTest_40); 
						$result_41 = intval($stuExam_41) + intval($stuTest_41); 
						$result_42 = intval($stuExam_42) + intval($stuTest_42); 
						$result_43 = intval($stuExam_43) + intval($stuTest_43); 
						$result_44 = intval($stuExam_44) + intval($stuTest_44); 
						$result_45 = intval($stuExam_45) + intval($stuTest_45); 
						$result_46 = intval($stuExam_46) + intval($stuTest_46); 
						$result_47 = intval($stuExam_47) + intval($stuTest_47); 
						$result_48 = intval($stuExam_48) + intval($stuTest_48); 
						$result_49 = intval($stuExam_49) + intval($stuTest_49); 
						$result_50 = intval($stuExam_50) + intval($stuTest_50); 
                     

            	
						
						if($result_row == 1 && $sch_code == $school_code)
						{
							//$i=0;
							 $result = $loader->GetStudentSubject($online_stu_id);

							$schoolName = $loader-> SchoolName($sch_code);	
							$parent_name = $loader-> ParentName($parent_code);

					 
						
						     echo $success =' 
							 
										<div style="text-align:center;font-wweight:bold;font-size:20px">
									   <div card-header>
										  <h2 style="text-decoration:underline;color:green">'.$student_name.' </h2>
										</div>
										
										 
											<div class="form-group">	
											<label style="color:red"> <b> '.$online_stu_id.' </b> </label><br />
											<img src="../all_photo/'.$photo.'"  style="height: 200px;border-radius:500px" />
											</div>
										
                                            <div>School Name: '.$schoolName.'</div>
                                            <div>Parent Name: '.$parent_name.'</div>
                                            <div>Student Name:  '.$student_name.'</div>
                                            <div>Gender: '.$stu_gender.'</div>
                                            <div>Student NO: '.$schl_stu_no.'</div>
											<div>Class: '.$student_class.'</div>
											<div>Payment Status: '.$sub_status.'</div>
											 <a href="update_student_data.php?student_id='.$online_stu_id.'">
											<div class="btn btn-success">Download Student Result</div>
											</a>
										
										<h2 style="text-decoration:underline;margin-bottom:20px;color:green">RESULT </h2>
										</div>



										<div style="display:flex;font-size: 20px;justify-content:space-around;text-align:left" class="btn btn-success mb-3">   
										<div style="width:55%;font-weight:bold;"> Subjects </div>
										<div style="width:10%;font-weight:bold;"> CA </div>
										<div style="width:10%;font-weight:bold;"> Exam  </div>
										<div style="width:10%;font-weight:bold;"> Aggregate </div>
										<div style="width:10%;font-weight:bold;"> Grade </div>
										</div>

							 
								  ';



								  foreach($result as $row)
								  {
								  
										$newOnlineId = $online_stu_id; // substr($online_stu_id, 3);   //I HAD TO REMOVE THE 3 FIRST LETTERS 

										  


		   


					   

										 if(!empty($row['sub_1'])){ 
										 
										  $grade = $loader->GradeCal($result_1);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_1']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_1." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_1." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_1." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }



										 if(!empty($row['sub_2'])){ 
										 
										  $grade = $loader->GradeCal($result_2);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_2']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_2." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_2." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_2." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }

										 if(!empty($row['sub_3'])){ 
										 
										  $grade = $loader->GradeCal($result_3);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_3']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_3." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_3." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_3." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }

										 if(!empty($row['sub_4'])){ 
										 
										  $grade = $loader->GradeCal($result_4);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_4']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_4." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_4." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_4." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";											  
										 }

										 if(!empty($row['sub_5'])){ 
										 
										  $grade = $loader->GradeCal($result_5);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_5']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_5." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_5." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_5." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }

										 if(!empty($row['sub_6'])){ 
										 
										  $grade = $loader->GradeCal($result_6);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_6']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_6." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_6." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_6." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";											  
										 }

										  
										 if(!empty($row['sub_7'])){ 
										 
										  $grade = $loader->GradeCal($result_7);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_7']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_7." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_7." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_7." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }

										 if(!empty($row['sub_8'])){ 
										 
										  $grade = $loader->GradeCal($result_8);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_8']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_8." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_8." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_8." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_9'])){ 
										 
										  $grade = $loader->GradeCal($result_9);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_9']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_9." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_9." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_9." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";											  
										 }
										 if(!empty($row['sub_10'])){ 
										 
										  $grade = $loader->GradeCal($result_10);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_10']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_10." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_10." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_10." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_11'])){ 
										 
										  $grade = $loader->GradeCal($result_11);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_11']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_11." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_11." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_11." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_12'])){ 
										 
										  $grade = $loader->GradeCal($result_12);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_12']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_12." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_12." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_12." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_13'])){ 
										 
										  $grade = $loader->GradeCal($result_13);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_13']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_13." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_13." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_13." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";											  
										 }
										 if(!empty($row['sub_14'])){ 
										 
										  $grade = $loader->GradeCal($result_14);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_14']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_14." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_14." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_14." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";											  
										 }
										 if(!empty($row['sub_15'])){ 
										 
										  $grade = $loader->GradeCal($result_15);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_15']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_15." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_15." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_15." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_16'])){ 
										 
										  $grade = $loader->GradeCal($result_16);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_16']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_16." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_16." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_16." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";											  
										 }
										 if(!empty($row['sub_17'])){ 
										 
										  $grade = $loader->GradeCal($result_17);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_17']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_17." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_17." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_17." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";											  
										 }
										 if(!empty($row['sub_18'])){ 
										 
										  $grade = $loader->GradeCal($result_18);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_18']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_18." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_18." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_18." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";											  
										 }
										 if(!empty($row['sub_19'])){ 
										 
										  $grade = $loader->GradeCal($result_19);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_19']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_19." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_19." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_19." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";											  
										 }
										 if(!empty($row['sub_20'])){ 
										 
										  $grade = $loader->GradeCal($result_20);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_20']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_20." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_20." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_20." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";											  
										 }
										 if(!empty($row['sub_21'])){ 
										 
										  $grade = $loader->GradeCal($result_21);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_21']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_21." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_21." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_21." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_22'])){ 
										 
										  $grade = $loader->GradeCal($result_22);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_22']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_22." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_22." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_22." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";											  
										 }
										 if(!empty($row['sub_23'])){ 
										 
										  $grade = $loader->GradeCal($result_23);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_23']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_23." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_23." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_23." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_24'])){ 
										 
										  $grade = $loader->GradeCal($result_24);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_24']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_24." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_24." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_24." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";											  
										 }
										 if(!empty($row['sub_25'])){ 
										 
										  $grade = $loader->GradeCal($result_25);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_25']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_25." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_25." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_25." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_26'])){ 
										 
										  $grade = $loader->GradeCal($result_26);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_26']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_26." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_26." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_26." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";											  
										 }
										 if(!empty($row['sub_27'])){ 
										 
										  $grade = $loader->GradeCal($result_27);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_27']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_27." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_27." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_27." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_28'])){ 
										 
										  $grade = $loader->GradeCal($result_28);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_28']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_28." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_28." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_28." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";											  
										 }
										  
										 if(!empty($row['sub_29'])){ 
										 
										  $grade = $loader->GradeCal($result_29);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_29']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_29." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_29." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_29." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_30'])){ 
										 
										  $grade = $loader->GradeCal($result_30);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_30']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_30." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_30." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_30." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";											  
										 }
										 if(!empty($row['sub_31'])){ 
										 
										  $grade = $loader->GradeCal($result_31);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_31']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_31." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_31." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_31." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";											  
										 }
										 if(!empty($row['sub_32'])){ 
										 
										  $grade = $loader->GradeCal($result_32);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_32']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_32." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_32." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_32." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";											  
										 }
										 if(!empty($row['sub_33'])){ 
										 
										  $grade = $loader->GradeCal($result_33);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_33']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_33." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_33." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_33." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";											  
										 }
										 if(!empty($row['sub_34'])){ 
										 
										  $grade = $loader->GradeCal($result_34);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_34']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_34." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_34." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_34." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";											  
										 }
										 if(!empty($row['sub_35'])){ 
										 
										  $grade = $loader->GradeCal($result_35);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_35']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_35." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_35." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_35." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_36'])){ 
										 
										  $grade = $loader->GradeCal($result_36);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_36']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_36." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_36." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_36." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_37'])){ 
										 
										  $grade = $loader->GradeCal($result_37);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_37']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_37." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_37." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_37." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_38'])){ 
										 
										  $grade = $loader->GradeCal($result_38);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_38']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_38." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_38." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_38." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_39'])){ 
										 
										  $grade = $loader->GradeCal($result_39);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_39']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_39." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_39." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_39." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_40'])){ 
										 
										  $grade = $loader->GradeCal($result_40);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_40']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_40." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_40." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_40." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_41'])){ 
										 
										  $grade = $loader->GradeCal($result_41);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_41']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_41." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_41." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_41." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_42'])){ 
										 
										  $grade = $loader->GradeCal($result_42);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_42']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_42." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_42." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_42." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_43'])){ 
										 
										  $grade = $loader->GradeCal($result_43);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_43']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_43." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_43." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_43." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_44'])){ 
										 
										  $grade = $loader->GradeCal($result_44);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_44']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_44." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_44." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_44." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_45'])){ 
										 
										  $grade = $loader->GradeCal($result_45);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_45']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_45." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_45." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_45." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_46'])){ 
										 
										  $grade = $loader->GradeCal($result_46);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_46']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_46." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_46." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_46." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_47'])){ 
										 
										  $grade = $loader->GradeCal($result_47);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_47']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_47." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_47." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_47." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_48'])){ 
										 
										  $grade = $loader->GradeCal($result_48);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_48']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_48." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_48." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_48." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_49'])){ 
										 
										  $grade = $loader->GradeCal($result_49);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_49']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_49." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_49." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_49." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }
										 if(!empty($row['sub_50'])){ 
										 
										  $grade = $loader->GradeCal($result_50);
											echo$data="
										  <div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
										  <div style='width:55%'  style='text-transform:capitalize'>  ".$row['sub_50']."  </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuTest_50." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$stuExam_50." </div>
										  <div style='width:10%'  class='btn btn-danger'> ".$result_50." </div>
										  <div style='width:10%'  class='btn btn-info'> ".$grade." </div>
										  </div>
										  <hr>											  
											   ";										  
										 }

										
									  echo $data ='  
									  <div class="card p-3" tyle="display:flex;width:100%">

												  <div style="display:flex;font-size: 20px;justify-content:space-around;text-align:left" class="btn btn-dark mb-3">   
													  <div style="width:20%;font-size:14px"> Range Of Score </div>
													  <div style="width:10%;font-size:14px"> Grade </div>
													  <div style="width:20%;font-size:14px"> Remark  </div>
												  
													  <div style="width:20%;font-size:14px"> Range Of Score </div>
													  <div style="width:10%;font-size:14px"> Grade </div>
													  <div style="width:20%;font-size:14px"> Remark  </div>
												  </div>

												  
												  <div class="mb-4" style="width:100%">

														  <div style="display:flex;font-size: 20px;justify-content:space-around;text-align:left" >   
															  <div style="width:20%;font-size:14px">85% - 100% </div>
															  <div style="width:10%;font-size:14px"> A1+ </div>
															  <div style="width:20%;font-size:14px"> Outstanding </div>
														  
															  <div style="width:20%;font-size:14px">80% - 84% </div>
															  <div style="width:10%;font-size:14px"> A1 </div>
															  <div style="width:20%;font-size:14px"> Excellent </div>
														  </div>
												  </div>
											  
												  <div class="mb-4" style="width:100%">

														  <div style="display:flex;font-size: 20px;justify-content:space-around;text-align:left" >   
															  <div style="width:20%;font-size:14px">75% - 79% </div>
															  <div style="width:10%;font-size:14px"> B2+ </div>
															  <div style="width:20%;font-size:14px"> Ver Good </div>
														  
															  <div style="width:20%;font-size:14px">65% - 69% </div>
															  <div style="width:10%;font-size:14px"> C4 </div>
															  <div style="width:20%;font-size:14px"> Credit </div>
														  </div>
												  </div>
												  
												  <div class="mb-4" style="width:100%">

														  <div style="display:flex;font-size: 20px;justify-content:space-around;text-align:left" >   
															  <div style="width:20%;font-size:14px">60% - 64% </div>
															  <div style="width:10%;font-size:14px"> C5 </div>
															  <div style="width:20%;font-size:14px"> Ver Good </div>
														  
															  <div style="width:20%;font-size:14px">55% - 59% </div>
															  <div style="width:10%;font-size:14px"> C6 </div>
															  <div style="width:20%;font-size:14px"> Credit </div>
														  </div>
												  </div>
												  
												  <div class="mb-4" style="width:100%">

														  <div style="display:flex;font-size: 20px;justify-content:space-around;text-align:left" >   
															  <div style="width:20%;font-size:14px">50% - 54% </div>
															  <div style="width:10%;font-size:14px"> D7 </div>
															  <div style="width:20%;font-size:14px"> Fair </div>
														  
															  <div style="width:20%;font-size:14px">45% - 49% </div>
															  <div style="width:10%;font-size:14px"> E8 </div>
															  <div style="width:20%;font-size:14px"> Pass </div>
														  </div>
												  </div>
												  
												  <div class="mb-4" style="width:100%">

														  <div style="display:flex;font-size: 20px;justify-content:space-around;text-align:left" >   
															  <div style="width:20%;font-size:14px">0% - 44% </div>
															  <div style="width:10%;font-size:14px"> F9 </div>
															  <div style="width:20%;font-size:14px"> Fail </div>

															  <div style="width:20%;font-size:14px"></div>
															  <div style="width:10%;font-size:14px"></div>
															  <div style="width:20%;font-size:14px"></div>
														  
														  </div>
												  </div>
									  </div>
									  ';
							  
										
								  }	
						}
						else
						{
							
							
							echo $failed ='
										<div class="col-xl- col-md-6">
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
										   
										 Invalid Online Student ID  inserted.  
										 
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
							</div>  
					        </div>';
							 
							
							
							
						}
						
						
		 
			}

			
			if($_POST['action'] == 'removeSubjectID')
			{
			
					$stu_online_id = trim($_POST['stu_online_id']) ;
					$subject_id    = trim($_POST['subject_id']) ; 

					$loader->query = "SELECT * FROM `4_student_reg` WHERE  `4_student_reg`.`online_stu_id` ='$stu_online_id' "; 
					$result_row = $loader->total_row();  
					$result_user_wallet = $loader->query_result();
					foreach($result_user_wallet as $row){   
						$sch_code       =  $row['school_code']; 
					}

				$loader->query = "SELECT * FROM `40_all_subject` WHERE `40_all_subject`.`id` ='$subject_id'"; 
				$result_user_wallet = $loader->query_result();
				foreach($result_user_wallet as $row){

				$sub_title   =  $row['sub_title'];     
				$sub_id      =  $row['sub_id'];      
				}
		
		
				
				if($result_row == 1 && $sch_code == $school_code)
				{		
									$query_wallet ="UPDATE `41_student_subjects` SET   
									`$sub_id`     = '' 		 
									WHERE `41_student_subjects`.`student_code` = '$stu_online_id' "; 
									if(mysqli_query($homedb,$query_wallet))
									{
										$query_wallet ="UPDATE `student_exam_result` SET   
										`$sub_id`     = '' 		 
										WHERE `student_exam_result`.`student_code` = '$stu_online_id' "; 
										mysqli_query($homedb,$query_wallet);

										$query_wallet ="UPDATE `student_test_result` SET   
										`$sub_id`     = '' 		 
										WHERE `student_test_result`.`student_code` = '$stu_online_id' "; 
										mysqli_query($homedb,$query_wallet);

										echo$feedback		=	"$sub_title removed from  student subject list";
											

									}
									else
									{ 
											
										echo $feedback		=	"Newtwork error";
											
									}

				}
				else
				{ 
						
					echo $feedback ='
					<div class="col-xl- col-md-6">
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
						
					No student ID found.

					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>  
					</div> 
					';
						
				}
				

						
			
												

						
				
						
			}
            

	}
			


			

	if($_POST["page"] === 'approveEresultDownload')
	{


		if($_POST['action'] == 'approveEresultDownload')
		{

			 
			$approve_status    = $_POST['approve_status']; 
				

	 

			@$loader->query = "SELECT * FROM `1_school_reg` WHERE  `school_code` ='$school_code' ";  
			$resultquery = $loader->query_result(); 
			foreach($resultquery as $row)
			{
				$sch_code      =  $row['school_code'];	 
			}

	
						if(@$sch_code === $school_code )
						{

							 
									$queryletter =("UPDATE `1_school_reg` SET   
									`download_result`   = '$approve_status'
									WHERE `1_school_reg`.`school_code` = '$sch_code'"); 
								   mysqli_query($homedb, $queryletter);
							 
							 
						}							
						else
						{
							
							
									echo $data ='
										<div class="col-xl- col-md-6">
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
											
										Invalid approval.

										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
										</div>  
										</div> 
										';
						}


			
		
		
		}
	}



	if($_POST["page"] === 'approvePayment')
	{


		if($_POST['action'] == 'approvePayment')
		{

			$current_datetime = date("d-m-Y");
			$approve_status    = $_POST['approve_status'];
			$student_code      = $_POST['student_code'];
				

			$loader->query = "SELECT * FROM `4_student_reg` WHERE  online_stu_id = '$student_code' "; 
			$total_row = $loader->total_row(); 
			$result = $loader->query_result(); 
			foreach($result as $rows)
			{
					
				$sub_pay_date  =  $rows['sub_pay_date'];	 	
				$sch_code      =  $rows['school_code'];	 	
				$sub_status    =  $rows['sub_status'];	 	
				$student_class =  $rows['student_class']; 	
				$student_name  =  $rows['student_name']; 	
			}

			@$loader->query = "SELECT * FROM `1_school_reg` WHERE  school_code ='$sch_code' ";  
			$resultquery = $loader->query_result(); 
			foreach($resultquery as $row)
			{
				$schoolName     =  $row['school_name'];
				$school_logo    =  $row['school_logo'];
				$school_address =  $row['school_address'];
				$current_term   =  $row['current_term'];
				$school_email   =  $row['school_email'];
				$school_website =  $row['school_website'];
				$school_phone   =  $row['school_phone'];
				
				
			}

	
						if(@$sch_code === $school_code )
						{

								if($approve_status == 'active')
								{
									$queryletter =("UPDATE `4_student_reg` SET  
									`sub_status`    = '$approve_status',
									`sub_trans_id`  = '$username',
									`sub_pay_date`   = '$current_datetime'
									WHERE `4_student_reg`.`online_stu_id` = '$student_code'");

										if(mysqli_query($homedb, $queryletter))
										{

											echo $data ='
											<div class="col-xl- col-md-6">
											<div class="alert alert-success alert-dismissible fade show" role="alert">
											<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
												
											'.$student_name.' CBT Payment Approved.
					
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
											</div>  
											</div> 
											';

										}
										else
										{
											echo $data ='
											<div class="col-xl- col-md-6">
											<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
												
											Network err.
					
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
											</div>  
											</div> 
											';
										}
								} 
								else  if($approve_status == 'status')
								{
										
										$dataPayStatus  = "$sub_status";
										$dataPayDate    = "$sub_pay_date";

								
											echo $data ='   
													<div class="col-xl- col-md-12">
														<div class="alert alert-danger alert-dismissible fade show" role="alert">
														<strong style="text-align:center"> SUBSCRIPTION PAYMENT RECEIPT </strong><br />


													<div class="card mb-4">

													<div class="card-body">
															<div class="table-responsive">
															<table class="table table-bordered"   width="100%" cellspacing="0">
															
														
																				<thead>
																				<tr>
																				
																					
																					
																					<th style="width:5%;"> 
																					<img src="../'.$SchoolIMG.'/'.$school_code.'/'.$school_logo.'"  style="width:100px;margin-top:-150px" /> 
																					
																					<th>  
																					<div style="display:flex">
																					
																						<div  style="margin-left:20px">
																						
																						<h3 style="text-transform:capitalize;"> '.$schoolName.'   </h3> 
																						<h6 >Address: <span style="text-transform:lowercase;">'.$school_address.'  </span> </h6>
																						<h6 style="text-transform:lowercase;">School Email:'.$school_email.'</h6>
																						<h6 style="text-transform:lowercase;">School Website:'.$school_website.' Questions </h6>
																						<h6 style="text-transform:capitalize;">School Phone: '.$school_phone.'. </h6>
																						</div>
																					</div>	
																				
																					
																					</th>  
																					
																				</tr>
																			</thead>  
																			<tbody>  
																				<tr role="row" class="odd">
																				
																				<td> 
																				<b>Student Name:  </b> <hr/>
																				<b>Student Class: </b> <hr/>
																				<b>App Sub Status: </b> <hr/>
																				<b>Payment date: </b>
																				</td> 
																				

																				<td>
																				<h6 style="text-transform:capitalize;padding:15px""> '.$student_name.' </h6> <hr/>
																				<h6 style="text-transform:capitalize;padding:15px"> '.$student_class.' </h6>  <hr/>
																				<h6 style="text-transform:capitalize;padding:18px"> '.$dataPayStatus.' </h6>  <hr/>
																				<h6 style="text-transform:capitalize;padding:18px"> '.$dataPayDate.' </h6> 
																				</td>
																															
																				</tr>
																							
																			</tbody>
																		</table>
																	</div>
																</div>
															</div>

																								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
														</div>  
														</div> 
											'; 
		

									}
									else  if($approve_status == 'inactive')
									{

									$dataPayStatus  = "$sub_status";
									$dataPayDate    = "$sub_pay_date";


									$queryletter =("UPDATE `4_student_reg` SET  
									`sub_status`    = 'inactive',
									`sub_trans_id`  = '',
									`sub_pay_date`   = ''
									WHERE `4_student_reg`.`online_stu_id` = '$student_code'");
									if(mysqli_query($homedb, $queryletter))
									{

										echo $data ='
											<div class="col-xl- col-md-6">
											<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
												
											Payment disapproved.
					
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
											</button>
											</div>  
											</div> 
											';
									}
									else
									{
											echo $data ='
													<div class="col-xl- col-md-6">
													<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
														
													Network error. Please try again

													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
													</div>  
													</div> 
											';									
									}
						
						
					
					

							
								}
						}							
						else
						{
							
							
									echo $data ='
										<div class="col-xl- col-md-6">
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
											
										No student ID found.

										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
										</div>  
										</div> 
										';
						}


			
		
		
		}
	}





			if($_POST["page"] === 'approveResetPassword')
			{
		
		
				if($_POST['action'] == 'approveResetPassword')
				{
		
					$current_datetime = date("d-m-Y");
					$approve_status    = $_POST['approve_status'];
					$account_code      = $_POST['account_code'];
				
				
				
					 
                   
 
		
		 
								if($approve_status === 'teacher' )
								{
		
										$resetPwd = mb_strimwidth(time(), 3, 6); 

										$loader->query = "SELECT * FROM `2_teacher_reg` WHERE  teacher_code = '$account_code' AND school_code = '$school_code' ";  
										$result = $loader->query_result(); 
										foreach($result as $rows)
										{ 	 	 	
											$sch_code  =  $rows['school_code'];	   	
											$user      =  $rows['username'];	   	
											$fullname  =  $rows['fullname'];	   	
										}


	


										if(@$sch_code  == $school_code)
										{

											$token      =  MD5("$resetPwd$user");	
											$password   =  MD5($resetPwd);


												$queryletter =("UPDATE `2_teacher_reg` SET   
												`token`    = '$token',
												`password` = '$current_datetime'
												WHERE `2_teacher_reg`.`username` = '$user'");
		
												if(mysqli_query($homedb, $queryletter))
												{
		
													echo $data ='
													<div class="col-xl- col-md-6">
													<div class="alert alert-success alert-dismissible fade show" role="alert">
													<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
														
													'.$fullname.' password has been reset to '.$resetPwd.'
							
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
													</div>  
													</div> 
													';
		
												}
												else
												{
													echo $data ='
													<div class="col-xl- col-md-6">
													<div class="alert alert-danger alert-dismissible fade show" role="alert">
													<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
														
													Network err.
							
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
													</div>  
													</div> 
													';
												}
										} 
										else   
									    {
											   	echo $data ='   
														 <div class="col-xl- col-md-12">
																<div class="alert alert-danger alert-dismissible fade show" role="alert">
																<strong style="text-align:center"> Notification! </strong><br />
		
		                                                         An error has occured or invalid input. Please try again. 
		
																 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;</span>
																</button>
																</div>  
																</div> 
												         	'; 
				 
										} 


								
								} 
	                            else if($approve_status === 'student') 
								{

									$resetPwd = mb_strimwidth(time(), 3, 6); 

									$loader->query = "SELECT * FROM `4_student_reg` WHERE  online_stu_id = '$account_code' AND school_code = '$school_code' ";  
									$result = $loader->query_result(); 
									foreach($result as $rows)
									{ 	 	 	
										$sch_code       = $rows['school_code']; 	   	
										$fullname       = $rows['student_name'];	   	
										$online_stu_id  = $rows['online_stu_id'];	   	
									}
 
									    $token      =  MD5("$resetPwd");	 
 
									if(@$sch_code  == $school_code)
									{
											$query ="UPDATE 4_student_reg SET   
											`token`    = '$token' 
											WHERE online_stu_id = '$online_stu_id'"; 
											if(mysqli_query($homedb, $query))
											{
	
												echo $data ='
												<div class="col-xl- col-md-6">
												<div class="alert alert-success alert-dismissible fade show" role="alert">
												<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
													
												'.$fullname.' password has been reset to '.$resetPwd.'
						
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
												</div>  
												</div> 
												';
	
											}
											else
											{
												echo $data ='
												<div class="col-xl- col-md-6">
												<div class="alert alert-danger alert-dismissible fade show" role="alert">
												<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
													
												Network err.
						
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
												</div>  
												</div> 
												';
											}
									} 
									else   
									{
											   echo $data ='   
													 <div class="col-xl- col-md-12">
															<div class="alert alert-danger alert-dismissible fade show" role="alert">
															<strong style="text-align:center"> Notification! </strong><br />
	
															 An error has occured or invalid input. Please try again. 
	
															 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
															</div>  
															</div> 
														 '; 
			 
									} 



								}
	                            else if($approve_status === 'parent') 
								{

									$resetPwd = mb_strimwidth(time(), 3, 6); 

									$loader->query = "SELECT * FROM `3_parent_reg` WHERE  parent_code = '$account_code' AND sch_code = '$school_code' ";  
									$result = $loader->query_result(); 
									foreach($result as $rows)
									{ 	 	 	
										$sch_code       = $rows['sch_code']; 	   	
										$guidance_name  = $rows['guidance_name'];	 	   	
									}
 
									    $token      =  MD5("$resetPwd");	 
 
									if(@$sch_code  == $school_code)
									{
											$query ="UPDATE 3_parent_reg SET   
											`token`    = '$token' 
											WHERE parent_code = '$account_code'"; 
											if(mysqli_query($homedb, $query))
											{
	
												echo $data ='
												<div class="col-xl- col-md-6">
												<div class="alert alert-success alert-dismissible fade show" role="alert">
												<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
													
												'.$guidance_name.' password has been reset to '.$resetPwd.'
						
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
												</div>  
												</div> 
												';
	
											}
											else
											{
												echo $data ='
												<div class="col-xl- col-md-6">
												<div class="alert alert-danger alert-dismissible fade show" role="alert">
												<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
													
												Network err.
						
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
												</div>  
												</div> 
												';
											}
									} 
									else   
									{
											   echo $data ='   
													 <div class="col-xl- col-md-12">
															<div class="alert alert-danger alert-dismissible fade show" role="alert">
															<strong style="text-align:center"> Notification! </strong><br />
	
															 An error has occured or invalid input. Please try again. 
	
															 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
															</div>  
															</div> 
														 '; 
			 
									} 



								}
		
				 
			 
				
				}
			}


 

			if($_POST['page'] == 'NewsletterOps')
			{
				   
				if($_POST['action'] == 'NewsletterOps')
				{
					
				  
	 
					 $post_id   =  htmlentities($_POST['post_id']); 
					 $post_cat  =  htmlentities($_POST['post_cat']);   		
		
										if($post_cat == 'live')  
										{
											$query_wallet ="UPDATE `school_newsletter` SET  
											`post_review`     =  'live'   
											WHERE  `school_newsletter`.`id` = '$post_id' ";
											if(mysqli_query($homedb,$query_wallet))
											{
															
								
												
													$output = array(
														'success'		=>	'success',
														'feedback'		=>	'Success!. Newsletter pushed to live mode '
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
										else  if($post_cat == 'pending') 
										{

											$query_wallet ="UPDATE `school_newsletter` SET  
											`post_review`     =  'pending'   
											WHERE  `school_newsletter`.`id` = '$post_id' ";
											if(mysqli_query($homedb,$query_wallet))
											{
															
								
												
													$output = array(
														'success'		=>	'success',
														'feedback'		=>	'Success!. Newsletter pushed to review mode '
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

 
						 echo json_encode($output);
						 
			   
					 
				}
			}	


			if($_POST['page'] == 'UpdatePost')
			{
				   
				if($_POST['action'] == 'UpdatePost')
				{
					
				  
					 
					$current_date  = date('Y-m-d');	 
					$current_year  = date("Y");
					$current_month = date("M");
					$current_day   = date("D"); 
					$format_date   = "$current_month $current_day, $current_year"; 
					  
					 $news_title   =  htmlentities($_POST['post_title']); 
					 $img_url      =  htmlentities($_POST['post_img']); 
					 $body         =  htmlentities($_POST['post_text_area']); 		
					 $post_id      =  htmlentities($_POST['post_id']); 		
		
			 		   
										   $query_wallet ="UPDATE `school_newsletter` SET 
										   `header`   =  '$news_title',   
										   `img_url`  =  '$img_url',    
										   `body`     =  '$body',   
										   `date`     =  '$format_date',   
										   `edit_by`  =  '$schl_head_name'   
										   WHERE  `school_newsletter`.`id` = '$post_id' ";
										   if(mysqli_query($homedb,$query_wallet))
										   {
														   
							   
											   
												   $output = array(
													   'success'		=>	'success',
													   'feedback'		=>	'Blog post updated successfully!!. '
												   );
	   
										   }
										   else
										   {
											   
												   $output = array(
													   'success'		=>	'failed',
													   'feedback'		=>	"Newtwork error"
												   );
										   }
	    
			   
			   
								   
							
							 
						 
						 echo json_encode($output);
						 
			   
					 
				}
			}	
		 	   
			if($_POST['page'] == 'AddNewsletter')
			{
				   
				if($_POST['action'] == 'AddNewsletter')
				{
				   //May 14, 2024
				   $current_date  = date('Y-m-d');	 
				   $current_year  = date("Y");
				   $current_month = date("M");
				   $current_day   = date("D"); 
				   $format_date   = "$current_month $current_day, $current_year"; 
					 
					$news_title                        =  htmlentities($_POST['news_title']); 
					$img_url                           =  htmlentities($_POST['news_img']); 
					$post_text_area                    =  htmlentities($_POST['post_text_area']); 
					 	
					
 
		
			
									 
									
									
								   
									   $query_wallet =("INSERT INTO `school_newsletter` VALUE (
										   '',
										   '".mysqli_real_escape_string($homedb, $school_code)."',	 									 
										   '".mysqli_real_escape_string($homedb, $school_code)."', 									 
										   '".mysqli_real_escape_string($homedb, $schl_head_name)."',
										   '".mysqli_real_escape_string($homedb, $photo)."',  
										   '".mysqli_real_escape_string($homedb, $school_name)."',
										   '".mysqli_real_escape_string($homedb, $school_address)."',
										   '".mysqli_real_escape_string($homedb, $news_title)."', 
										   '".mysqli_real_escape_string($homedb, $img_url)."', 
										   '".mysqli_real_escape_string($homedb, $post_text_area)."', 
										   '".mysqli_real_escape_string($homedb, 'pending')."', 
										   '".mysqli_real_escape_string($homedb, $format_date)."',
										   '' 
										   
										   )");
										   if(mysqli_query($homedb,$query_wallet))
										   {
														   
							   
											   
												   $output = array(
													   'success'   =>	'success', 
													   'feedback'	=>	'School newsletter uploaded successfully!!. '
												   );
	   
										   }
										   else
										   {
											   
												   $output = array(
													   'success'		=>	'failed',
													   'feedback'		=>	"Newtwork error"
												   );
										   }
	   
			   
										   
										   
			   
							
			   
			   
								   
							
							 
						 
						 echo json_encode($output);
						 
			   
					 
				}
			}	


			if($_POST['page'] == 'CreateTicket')
			{
				   
				if($_POST['action'] == 'CreateTicket')
				{
				   //May 14, 2024
				   $date = date('H:i:s');
				   $current_date  = date('Y-m-d');	 
				   $current_year  = date("Y");
				   $current_month = date("m");
				   $current_day   = date("d"); 
				   $format_date   = "$current_day/$current_month/$current_year($date)"; 
					 
					$school_code         =  htmlentities($_POST['school_code']); 
					$post_text_area      =  htmlentities($_POST['post_text_area']); 
					$ticket_id           =  htmlentities($_POST['ticket_id']); 
					$sender_email        =  htmlentities($_POST['sender_email']); 
					$sender_name         =  htmlentities($_POST['sender_name']); 
					$ticket_subject      =  htmlentities($_POST['ticket_subject']); 
					 	
					
 
		
			
									 
									
									
								   
									   $query_wallet =("INSERT INTO `ticket` VALUE (
										   '',
										   '".mysqli_real_escape_string($homedb, $ticket_id)."',	 									 
										   '".mysqli_real_escape_string($homedb, $school_code)."',	 									 
										   '".mysqli_real_escape_string($homedb, $schl_head_name)."',	 									 
										   '".mysqli_real_escape_string($homedb, $sender_email)."', 									 
										   '".mysqli_real_escape_string($homedb, 'open')."',
										   '".mysqli_real_escape_string($homedb, 'agent')."',  
										   '".mysqli_real_escape_string($homedb, $admincode)."',  
										   '".mysqli_real_escape_string($homedb, 'pending')."',
										   '".mysqli_real_escape_string($homedb, $ticket_subject)."',
										   '".mysqli_real_escape_string($homedb, $post_text_area)."', 
										   '".mysqli_real_escape_string($homedb, $format_date)."',
										   '".mysqli_real_escape_string($homedb, $current_date)."',
										   '".mysqli_real_escape_string($homedb, '0')."'
										   )");
										   if(mysqli_query($homedb,$query_wallet))
										   {
														   
							   
											$subject =  $ticket_subject;
												
											$body = "
											<div style='width:100%;'> 
												
													<center > 
															<h1> 
															HEBZIHUB NIG LTD
															</h1>
															<small>(RC: 7892845)</small><br/><br/> 
													</center>

												    <h3>$ticket_id</h3>
												 
													
													<p> $post_text_area  </p><br/>

 
												</div>			
												";

							 
											@@$loader->send_email_ticket($school_email, $subject, $body,);
							
										 

												   $output = array(
													   'success'   =>	'success', 
													   'feedback'	=>	"New ticket ID $ticket_id created successfully!!. "
												   );
	   
										   }
										   else
										   {
											   
												   $output = array(
													   'success'		=>	'failed',
													   'feedback'		=>	"Newtwork error"
												   );
										   }
	   
			   
										   
										   
			   
							
			   
			   
								   
							
							 
						 
						 echo json_encode($output);
						 
			   
					 
				}
			}	


			if($_POST['page'] == 'getReplyData')
			{
				   
				if($_POST['action'] == 'getReplyData')
				{ 
					 
					$date = date('H:i:s');
					$current_date  = date('Y-m-d');	 
					$current_year  = date("Y");
					$current_month = date("m");
					$current_day   = date("d"); 
					$format_date   = "$current_day/$current_month/$current_year($date)";
					
					$textData  =  htmlentities($_POST['textData']); 
					$idData    =  htmlentities($_POST['idData']); 
					 	 
														   
					$loader->query = "SELECT * FROM `ticket` WHERE  `id` = '$idData'";  
					$result = $loader->query_result(); 
					foreach($result as $rows)
					{ 	 	 	
						$school_code         =  $rows['school_code'];  
						$ticket_id           =  $rows['ticket_id']; 
						$sender_email        =  $rows['email'];  
						$ticket_subject      =  $rows['subject'];  	   	
						$team_lead           =  $rows['team_lead'];  	   	
					}

										 

				if($sender_email == $username)	
				{								
													   
							$query =("INSERT INTO `ticket` VALUE (
							'',
							'".mysqli_real_escape_string($homedb, $ticket_id)."',	 									 
							'".mysqli_real_escape_string($homedb, $school_code)."',	 									 
							'".mysqli_real_escape_string($homedb, $schl_head_name)."',	 									 
							'".mysqli_real_escape_string($homedb, $sender_email)."', 									 
							'".mysqli_real_escape_string($homedb, 'open')."',
							'".mysqli_real_escape_string($homedb, 'agent')."',  
							'".mysqli_real_escape_string($homedb, $team_lead)."',  
							'".mysqli_real_escape_string($homedb, 'pending')."',
							'".mysqli_real_escape_string($homedb, $ticket_subject)."',
							'".mysqli_real_escape_string($homedb, $textData)."', 
							'".mysqli_real_escape_string($homedb, $format_date)."',
							'".mysqli_real_escape_string($homedb, $current_date)."',
							'".mysqli_real_escape_string($homedb, '0')."'
							)");  
							if(mysqli_query($homedb,$query))
							{ 
								$output = array(
									'success'   =>	'success'
								); 
							}
							else
							{ 
								$output = array(
									'success'		=>	'failed'
								);
							}

				}
				else
				{ 
					$output = array(
						'failed'		=>	'failed',
						'feedback'		=>	"Only $sender_email has access to reply to this ticket"
					);
				}
						 echo json_encode($output);
						 
			   
					 
				}
			}	
	   


			if($_POST['page'] == 'RateTicket')
			{
				   
				if($_POST['action'] == 'RateTicket')
				{ 
					  
					$rate  =  htmlentities($_POST['rate']); 
					$id    =  htmlentities($_POST['id']); 
					 	 
														   
					$query ="UPDATE `ticket` SET `rate` = '$rate' WHERE `ticket`.`id` = '$id'"; 
					if(mysqli_query($homedb,$query))
					{ 
						$output = array(
							'success'   =>	'success'
						); 
					}
					else
					{ 
						$output = array(
							'success'		=>	'failed'
						);
					}

			    
						 echo json_encode($output);
						 
			   
					 
				}
			}	
	   
			if($_POST['page'] == 'DelPost')
			{
				   
				if($_POST['action'] == 'DelPost')
				{ 
					 
					$delpost     =  trim($_POST['delValue']); 
					$loader->query = " SELECT * FROM school_newsletter  WHERE id = '$delpost' ";   
			 
					   
						
						if($loader->total_row() == 1){
									   
									
									$query_wallet ="DELETE FROM `school_newsletter`  	 
									WHERE `school_newsletter`.`id` = '$delpost' "; 
									if(mysqli_query($homedb,$query_wallet))
									{
									 
											   
												   $output = array(
													   'success'   =>	'success', 
													   'feedback'	=>	'Newsletter post deleted successfully!!. '
												   );
	   
								   }
								   else
								   {
									   
										   $output = array(
											   'success'		=>	'failed',
											   'feedback'		=>	"Newtwork error"
										   );
								   }
	   
			   
										   
				   }else{
					   $output = array(
						   'success'   =>	'success', 
						   'feedback'	=>	'Post deleted already or does not exist '
					   );
				   }				
			   
							
			   
			   
								   
							
							 
						 
						 echo json_encode($output);
						 
			   
					 
				}
			}	
	   


			if($_POST["page"] === 'printQuestion')
			{
		
		
				if($_POST['action'] == 'printQuestion')
				{
		
					 
							$subject_id    = $_POST['subject_id']; 
		
							@@$loader->query = "SELECT * FROM `50_question_table`  WHERE subject_id = '$subject_id' AND school_code ='$school_code'"; 
							$total_row = $loader->total_row(); 
							@@$result = $loader->query_result(); 
							foreach($result as $rows)
							{
								$schoolName    =  $loader-> SchoolName($rows['school_code']);
								$subject       =  $loader-> FecthSingleSubject($rows['cbt_subject']);	
								$school_code   =  $rows['school_code'];	
								$cbt_status    =  $rows['cbt_status'];	
								$student_class =  $rows['student_class'];	
							}
							@$loader->query = "SELECT * FROM `1_school_reg` WHERE  school_code ='$school_code' ";  
							$resultquery = $loader->query_result(); 
							foreach($resultquery as $row)
							{
								$school_logo     =  $row['school_logo'];
								$school_address  =  $row['school_address'];
								$current_term    =  $row['current_term'];
								$session         =  $row['session'];
							 
							}
		
							if($cbt_status    == 'general'){
								$new_cbt_status = 'General';
							}else if($cbt_status    == 'test'){
								$new_cbt_status = 'Mid-Term Test'; 
							}else if($cbt_status    == 'exam'){
								$new_cbt_status = 'Examination'; 
							}else if($cbt_status    == 'assessment'){
								$new_cbt_status = 'Weekly Assessment';
							}

					if($total_row > 0 )
					{
		
				
					echo $data ='   
						<div class="card mb-4">
		
							<div class="card-body">
								<div class="table-responsive">
											<table class="table table-bordered"   width="100%" cellspacing="0">
											
										
																<thead>
																<tr>
																
																	
																	
																	<th style="width:5%;"> 
																	 <img src="../'.$SchoolIMG.'/'.$school_code.'/'.$school_logo.'"  style="width:100px;margin-top:-150px" /> 
																	
																	<th>  
																	<div style="display:flex">
																	  
																		<div  style="margin-left:20px">
																		
																		<h3 style="text-transform:capitalize;"> '.$schoolName.'   </h3>
																		<h6 style="text-transform:capitalize;"> '.$school_address.'   </h6>
																		<h6 style="text-transform:capitalize;"> '.$new_cbt_status.': '.$subject.' Questions </h6>
																		<h6 style="text-transform:capitalize;"> Class:  '.$student_class.'. Term: '.$current_term.'. Session:  '.$session.' </h6>
																		</div>
																	</div>	
																	<div>
																				 
																		 
																			<input  placeholder="Student Name:"    type="text"   class="form-control" style="color:#f2f2f2"  readonly/>
																		 
																		</div>
																	
																	</th>  
																	
																</tr>
															</thead>  
															<tbody> ';
															$d=0;
															foreach($result as $active)
															{
																$d++;
		
																	$question_id   = $active['id'];
																	$loader->query = "SELECT * FROM `51_question_option` WHERE  question_id ='$question_id'"; 
																	$result        = $loader->query_result();
		
																
																	if($active['question_image'] == '')
																	{
																			$QuesImg ='';
																			$optionLabelAdjest = '		
																			<div style="margin-top:45px;text-align:center;border-radius:900px;border:1px solid #777777 " >	 
																			A
																			</div>
																			<div style="margin-top:25px;text-align:center;border-radius:500px;border:1px solid #777777">
																			B
																			</div>
																			<div style="margin-top:20px;text-align:center;border-radius:500px;border:1px solid #777777">
																			C
																			</div>
																			<div style="margin-top:15px;text-align:center;border-radius:500px;border:1px solid #777777">
																			D
																			</div>
																			';
																	}
																	else
																	{
																		$QuesImg ='<img src="../'.$MainquesImg .'/'.$active['question_image'].'"  style="height:100%;border-radius:1500px"';
																		$optionLabelAdjest = '	
																		<div style="margin-top:170px;text-align:center;border-radius:500px;border:1px solid #777777"> 
																		A 
																		</div>
																		<div style="margin-top:25px;text-align:center;border-radius:500px;border:1px solid #777777">
																		B
																		</div>
																		<div style="margin-top:20px;text-align:center;border-radius:500px;border:1px solid #777777">
																		C
																		</div>
																		<div style="margin-top:15px;text-align:center;border-radius:500px;border:1px solid #777777">
																		D
																		</div>
																		'; 
															}
																
																echo'<tr role="row" class="odd">
																
																<td>
																<b>Question<br/> '.$d.' </b>
		
																 
																</td>
															
																
																
																		<td> 
																			<span>
																			'.$QuesImg.' 
																			</span> <br/>
																			<b>'.$active['question_title'].' </b>
																			
		
																			<div style="font-size:14px">
																			';
																			
																			$i=0;
																			foreach($result as $row)
																			{ 
																			echo $optionData[$i]  = '<div style="margin-top:25px;text-align:left">'.$row['option_title'].'</div>';
																			$i++;
																			} 
																			echo'
																			</div>
																		</td> 
													
																													
																</tr>
																';
														
		
		
																		
															} 					
													echo'</tbody>
										</table>
									</div>
								</div>
							</div>'; 
		
					}							
					else
					{
						
						
								echo $data ='
									<div class="col-xl- col-md-6">
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
										
									   No question found.
		
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
									</div>  
									</div> 
									';
					}
		
				 
			 
				}
			}


			if($_POST['page'] == 'idCardSelectionUpdate')
			{
				   
				if($_POST['action'] == 'idCardSelectionUpdate')
				{ 
					  
					$idCardOption  =  htmlentities($_POST['idCardOption']); 
					
			  
		
							$query ="UPDATE `1_school_reg` SET `id_card_type` = '$idCardOption' WHERE `1_school_reg`.`school_code` = '$school_code'"; 
							if(mysqli_query($homedb,$query))
							{ 
								$output = array(
									'success'   =>	'success', 
								); 
							}
							else
							{ 
								$output = array(
									'success'		=>	'failed', 
								);
							}
				 
						 echo json_encode($output);
						 
			   
					 
				}
			}	
		

}
?>

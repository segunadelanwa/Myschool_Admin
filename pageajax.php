<?php

 


include("config.php");



$loader = new Loader();
 
include("connect2.php"); 
 

if(isset($_SESSION['password']) AND !empty($_SESSION['username']))
{
  
   $loader->query='SELECT * FROM `00admin_login_table` WHERE  `username`="'.$_SESSION['username'].'"';
		
		 if($result = $loader->query_result()){
	 
		
			foreach($result as $row)
			{
					
			$photo        =  $row['photo']; 
			$username     =  $row['username'];
			$password     =  $row['password'];
			$acc_fullname =  $row['fullname'];
			$phone        =  $row['phone'];
			$gender       =  $row['gender'];
			$department   =  $row['department'];  
			$acct_level   =  $row['acct_level']; 
			$admincode    =  $row['admincode']; 
			$registrar    =  $row['registrar'];
			$sub_start    =  $row['date_reg'];
 
			}
	 
	 
   
	         
	 
		 }
 
} 
 


	$current_date  = date('Y-m-d');	
	$ip_address = $_SERVER['REMOTE_ADDR'];
	$current_datetime = date("Y-m-d");
	$time = date("H:i:s", STRTOTIME(date('h:i:sa')));



if(isset($_POST['page']))
{
	if($_POST['page'] == 'admin_signup_page')
	{
		
		
		if($_POST['action'] == 'check_email')
		{
			$loader->query = "
			SELECT * FROM 00admin_login_table 
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
		
		


	    if($_POST['action'] == 'admin_signup_action')
	    {
			 
			 $m=mb_strimwidth(date('m'), 1, 1); 
			 $d=date('d');
			 $auth_code = mb_strimwidth(time(), 7, 3); 
			 $admincode="ADM$d$m$auth_code";
             $date_init=date('d-m-Y');
 
  

		 
			$department       =  trim($_POST['department']);
			$phone            =  trim($_POST['phone']);
			$fullname         =  trim($_POST['fullname']);
			$username         =  trim($_POST['user_email_address']);
			$raw_password     =  trim($_POST['password']);
			$passkey         =   MD5("$raw_password$username");
			$user_password    =	password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

 
							
					if($acct_level === 'tier1' )
					{
							 
							   $query_wallet =("INSERT INTO 00admin_login_table VALUE (
								'',
								'".mysqli_real_escape_string($homedb, $passkey)."',	 									 
								'".mysqli_real_escape_string($homedb, $admincode)."',	 									 
								'".mysqli_real_escape_string($homedb, 'placeholder.jpg')."',	 									 
								'".mysqli_real_escape_string($homedb, $username)."', 									 
								'".mysqli_real_escape_string($homedb, $user_password)."',
								'".mysqli_real_escape_string($homedb, $fullname)."',
								'".mysqli_real_escape_string($homedb, $phone)."',
								'".mysqli_real_escape_string($homedb, '')."',  
								'".mysqli_real_escape_string($homedb, $department)."',
								'".mysqli_real_escape_string($homedb, 'tier3')."',     
								'".mysqli_real_escape_string($homedb, $fullname)."',   
								'".mysqli_real_escape_string($homedb, $date_init)."'
								)");
								if(mysqli_query($homedb,$query_wallet))
								{
												
					 
					 
					
								    $subject = ' Staff / Admin Registeration';
								
								     $body = "
										<div style='width:100%;height:5px;background: #c908bd'></div><br> 
										<div style='font-size:14px;color:black;font-family:lucida sans;'>
										
											 <center >
												 <img src=\'cid:logo\'  style='text-align:center;height:150px;'/> <br> 
												 <h1>HEPZIHUB NIG LTD </h1>
												 <h1>Staff / Admin Registeration </h1>
											 </center><br>

														 
										   <p>
										   Hi $fullname your registeration account has been setup. Please find below your login details
										   </p>
										   
											<p>
												 Username: $username  <br />
												 Password: $raw_password  <br />
												 
											</p>
											
											
											<span style='font-size:15px;text-align:center;'> ADMIN OPERATOR ACCOUNT SETUP <span><br>
											<div style='width:100%;height:5px;background: blue'></div>  
											
											
											</div><br><br>
										 </div>			
										 ";
					
						              // $loader->send_email($_POST['user_email_address'], $subject, $body);
		 

										$output = array(
											'success'		=>	'success',
											'feedback'		=>	' Admin operator account setup successfully!!.Check your email for login details'
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
								'feedback'		=>	"Sorry $acc_fullname, your are not authorized to setup an account "
							);
					}


				
	 
			 
			 echo json_encode($output);
			 
			 
			 
		}

        /////////////////////////////////////////////////////////
		if($_POST['action'] == 'check_marketer')
		{
			$loader->query = "
			SELECT * FROM 0_marketer_reg 
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

 

 	    if($_POST['action'] == 'marketer_signup_action')
	    {
			 
			 $m=mb_strimwidth(date('m'), 1, 1); 
			 $d=date('d');
			 $auth_code = mb_strimwidth(time(), 7, 3); 
			 $marketerCode="MAR$d$m$auth_code";
             $date_init=date('d-m-Y');
 
  
					$loader->filedata     = $_FILES['field_operator_photo'];
					$field_operator_photo = $loader->Upload_SignPhoto();   
		 
					$fullname        =  trim($_POST['fullname']);
					$phone           =  trim($_POST['phone']);
					$address         =  trim($_POST['address']);
					$acct_number     =  trim($_POST['acct_number']);
					$acct_name       =  trim($_POST['acct_name']);
					$bank_name       =  trim($_POST['bank_name']);
					$username        =  trim($_POST['user_email_address']);
					$raw_password    =  trim($_POST['password']);
					$passkey         =   MD5("$raw_password$username");
					$user_password   =	password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

 
							
					if($acct_level === 'tier1' )
					{
							 
							   $query_wallet =("INSERT INTO 0_marketer_reg VALUE (
								'',
								'".mysqli_real_escape_string($homedb, $passkey)."',	 									 
								'".mysqli_real_escape_string($homedb, $admincode)."',	 									 
								'".mysqli_real_escape_string($homedb, $marketerCode)."',	 									 
								'".mysqli_real_escape_string($homedb, $field_operator_photo)."',	 									 
								'".mysqli_real_escape_string($homedb, $username)."', 									 
								'".mysqli_real_escape_string($homedb, $user_password)."',
								'".mysqli_real_escape_string($homedb, $fullname)."',
								'".mysqli_real_escape_string($homedb, $phone)."',
								'".mysqli_real_escape_string($homedb, $address)."',  
								'".mysqli_real_escape_string($homedb, '0')."',
								'".mysqli_real_escape_string($homedb, '0')."',     
								'".mysqli_real_escape_string($homedb, '0000-00-00')."',     
								'".mysqli_real_escape_string($homedb, $acct_number)."',   
								'".mysqli_real_escape_string($homedb, $acct_name)."',   
								'".mysqli_real_escape_string($homedb, $bank_name)."',   
								'".mysqli_real_escape_string($homedb, $date_init)."'
								)");
								if(mysqli_query($homedb,$query_wallet))
								{
												
					 
					 
					
								    $subject = ' Marketer Registeration';
								
								     $body = "
										<div style='width:100%;height:5px;background: #c908bd'></div><br> 
										<div style='font-size:14px;color:black;font-family:lucida sans;'>
										
											 <center >
												 <img src=\'cid:logo\'  style='text-align:center;height:150px;'/> <br> 
												 <h1>HEPZIHUB NIG LTD </h1>
												 <h1>Marketer Account  Registeration </h1>
											 </center><br>

														 
										   <p>
										   Hi $fullname your registeration account has been setup. Please find below your login details
										   </p>
										   
											<p>
												 Username: $username  <br />
												 Password: $raw_password  <br />
												 
											</p>
											
											
											<span style='font-size:15px;text-align:center;'> MARKETER ACCOUNT SETUP <span><br>
											<div style='width:100%;height:5px;background: blue'></div>  
											
											
											</div><br><br>
										 </div>			
										 ";
					
						              // $loader->send_email($_POST['user_email_address'], $subject, $body);
		 

										$output = array(
											'success'		=>	'success',
											'feedback'		=>	' my school App freelance marketer account setup successfully!!. Check your email for login details'
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
								'feedback'		=>	"Sorry $acc_fullname, your are not authorized to setup an account "
							);
					}


				
	 
			 
			 echo json_encode($output);
			 
			 
			 
		}
 		
		////////////////////////////////////////////////////////
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
			 
			 $m=mb_strimwidth(date('m'), 1, 1); 
			 $d=date('d');
			 $auth_code = mb_strimwidth(time(), 7, 3); 
			 $schoolCode="SCH$d$m$auth_code";
             $date_init=date('Y-m-d');
 
					//$loader->filedata = $_FILES['banner_img2'];
					//$event_ban = $loader->Upload_file();	
  
         
			 
				$loader->filedata=$_FILES['school_photo'];
				$school_photo               = $loader->Upload_SignPhoto();
				$loader->filedata=$_FILES['school_logo'];
				$school_logo               = $loader->Upload_SignPhoto();
				$loader->filedata=$_FILES['schl_propritor_photo'];
				$schl_propritor_photo      = $loader->Upload_SignPhoto();
				$loader->filedata=$_FILES['schl_head_photo']; 
				$schl_head_photo           = $loader->Upload_SignPhoto();
				
				

				 
				$marketer_code       =  trim($_POST['marketer_code']); 
				$school_name         =  trim($_POST['school_name']); 
				$school_email        =  trim($_POST['school_email']);
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
				$passkey             =   MD5("$raw_password$school_email");		

					if($acct_level === 'tier1' )
					{
							 
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
								'".mysqli_real_escape_string($homedb, $date_init)."'
								)");
								if(mysqli_query($homedb,$query_wallet))
								{
												
					 
					 
					
								    $subject = ' School Account Setup';
								
								     $body = "
										<div style='width:100%;height:5px;background: #c908bd'></div><br> 
										<div style='font-size:14px;color:black;font-family:lucida sans;'>
										
											 <center >
												 <img src=\'cid:logo\'  style='text-align:center;height:150px;'/> <br> 
												 <h1>HEPZIHUB NIG LTD </h1>
												 <h1>School Account Setup </h1>
											 </center><br>

														 
										   <p>
										   Hi $school_name your school registeration account has been setup. Please find below your login details
										   </p>
										   
											<p>
												 Username: $school_email  <br />
												 Password: $raw_password  <br />
												 
											</p>
											
											
											<span style='font-size:15px;text-align:center;'> SCHOOL ACCOUNT SETUP <span><br>
											<div style='width:100%;height:5px;background: blue'></div>  
											
											
											</div><br><br>
										 </div>			
										 ";
					
						              // $loader->send_email($_POST['user_email_address'], $subject, $body);
		 

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
								'feedback'		=>	"Sorry $acc_fullname, your are not authorized to setup an account "
							);
					}


				
	 
			 
			 echo json_encode($output);
			 
			 
			 
		}
        ////////////////////////////////////////////////////////




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

 

 	    if($_POST['action'] == 'teacher_account_setup')
	    {
			 
			 $m=mb_strimwidth(date('m'), 1, 1); 
			 $d=date('d'); 
             $date_init=date('d-m-Y');
 
  

		 
					$username             = trim($_POST['user_email_address']);
					$raw_password        = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);  
					$user_password        = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);  
					$loader->filedata     = $_FILES['field_operator_photo'];
					$field_operator_photo = $loader->Upload_SignPhoto();   
					$fullname             =  trim($_POST['fullname']);
					$gender               =  trim($_POST['gender']);
					$phone                =  trim($_POST['phone']);
					$address              =  trim($_POST['address']);
					$acct_number          =  trim($_POST['acct_number']);
					$acct_name            =  trim($_POST['acct_name']);
					$bank_name            =  trim($_POST['bank_name']);
					$registrar            =  trim($_POST['registrar']);
					$sch_code             =  trim($_POST['sch_code']);

					$passkey             =   MD5("$raw_password$username");	
							
				 
							 
							   $query_wallet =("INSERT INTO 2_teacher_reg VALUE (
								'', 									 
								'".mysqli_real_escape_string($homedb, $passkey)."', 
								'".mysqli_real_escape_string($homedb, $field_operator_photo)."',
								'".mysqli_real_escape_string($homedb, $sch_code)."', 		 
								'".mysqli_real_escape_string($homedb, $username)."',
								'".mysqli_real_escape_string($homedb, $user_password)."',
								'".mysqli_real_escape_string($homedb, $fullname)."',  
								'".mysqli_real_escape_string($homedb, $gender)."',
								'".mysqli_real_escape_string($homedb, $phone)."',     
								'".mysqli_real_escape_string($homedb, $address)."',   
								'".mysqli_real_escape_string($homedb, '0')."',   
								'".mysqli_real_escape_string($homedb, '0000-00-00')."',   
								'".mysqli_real_escape_string($homedb, $acct_name)."',   
								'".mysqli_real_escape_string($homedb, $acct_number)."',   
								'".mysqli_real_escape_string($homedb, $bank_name)."',   
								'".mysqli_real_escape_string($homedb, $registrar)."',   
								'".mysqli_real_escape_string($homedb, $date_init)."'
								)");
								if(mysqli_query($homedb,$query_wallet))
								{
												
					 
					 
					
								    $subject = ' Teacher Account Setup';
								
								     $body = "
										<div style='width:100%;height:5px;background: #c908bd'></div><br> 
										<div style='font-size:14px;color:black;font-family:lucida sans;'>
										
											 <center >
												 <img src=\'cid:logo\'  style='text-align:center;height:150px;'/> <br> 
												 <h1>HEPZIHUB NIG LTD </h1>
												 <h1>Teacher Account Setup   </h1>
											 </center><br>

														 
										   <p>
										   Hi $fullname your   account has been setup. Please find below your login details
										   </p>
										   
											<p>
												 Username: $username  <br />
												 Password: $raw_password  <br />
												 
											</p>
											
											
											<span style='font-size:15px;text-align:center;'> FIELD ACCOUNT SETUP <span><br>
											<div style='width:100%;height:5px;background: blue'></div>  
											
											
											</div><br><br>
										 </div>			
										 ";
					
						              // $loader->send_email($_POST['user_email_address'], $subject, $body);
		 

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
	 


				
	 
			 
			 echo json_encode($output);
			 
			 
			 
		} 
 


	
			////////////////////////////////////////////////////////
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

 

 	    if($_POST['action'] == 'parrent_signup_action')
	    {
			 
			 $m=mb_strimwidth(date('m'), 1, 1); 
			 $d=date('d');
			 $auth_code  = mb_strimwidth(time(), 7, 3); 
			 $parrent_code="PAR$d$m$auth_code";
             $date_init=date('d-m-Y');
 
  

		 

					$admin_code      =  trim($_POST['admin_code']);
					$sch_code        =  trim($_POST['sch_code']); 
					$guidance_name   =  trim($_POST['guidance_name']);
					$address         =  trim($_POST['home_address']);
					$email           =  trim($_POST['parent_email']);

					$passkey             =   MD5("$sch_code$parrent_code");	
				
							 
							   $query_wallet =("INSERT INTO 3_parent_reg VALUE (
								'', 									 
								'".mysqli_real_escape_string($homedb, $passkey)."',
								'".mysqli_real_escape_string($homedb, $sch_code)."',		 									 
								'".mysqli_real_escape_string($homedb, $phone)."', 									 
								'".mysqli_real_escape_string($homedb, $parrent_code)."',
								'".mysqli_real_escape_string($homedb, $guidance_name)."',
								'".mysqli_real_escape_string($homedb, $address)."',   
								'".mysqli_real_escape_string($homedb, $email)."',      
								'".mysqli_real_escape_string($homedb, $date_init)."'
								)");
								if(mysqli_query($homedb,$query_wallet))
								{
											

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
				
				
	 
			 
			 echo json_encode($output);
			 
			 
			 
		}
        ////////////////////////////////////////////////////////
	


	////////////////////////////////////////////////////////
	
 

 	    if($_POST['action'] == 'parent_student_action')
	    {
			 
			 $m=mb_strimwidth(date('m'), 1, 1); 
			 $d=date('d');
			 $auth_code  = mb_strimwidth(time(), 5, 3); 
			 $online_stu_id="$d$m$auth_code";
             $date_init=date('d-m-Y');
 
  

		 

					$admincode         =  trim($_POST['admincode']);
					$schl_stu_no       =  trim($_POST['schl_stu_no']);
					$school_code       =  trim($_POST['school_code']);
					$parent_code       =  trim($_POST['parent_code']);
					$student_name      =  trim($_POST['student_name']);
					$student_name      =  trim($_POST['student_name']);
					$stu_gender        =  trim($_POST['stu_gender']);
					$student_class     =  trim($_POST['student_class']);
					$class_rep         =  trim($_POST['class_rep']);
					$student_teacher   =  trim($_POST['student_teacher']);
					$payment_status    =  trim($_POST['payment_status']);

 
				$ConfirmStudentExist = $loader->ConfirmStudentExist($school_code,$schl_stu_no);
				$ParentNameExist = $loader->ParentNameExist($parent_code);
				$SchoolNameExist = $loader->SchoolNameExist($school_code);
							 
				if($SchoolNameExist == 1)
				{

							if($ParentNameExist == 1)
							{


										if(!$ConfirmStudentExist >= 1)
										{
											
													$loader->filedata  =  $_FILES['student_photo'];
													$student_photo     =  $loader->Upload_SignPhoto();											
											
													$query_wallet =("INSERT INTO 4_student_reg VALUE (
														'', 									 
														'".mysqli_real_escape_string($homedb, $admincode)."',
														'".mysqli_real_escape_string($homedb, $student_photo)."',		 									 
														'".mysqli_real_escape_string($homedb, $schl_stu_no)."', 									 
														'".mysqli_real_escape_string($homedb, $online_stu_id)."', 									 
														'".mysqli_real_escape_string($homedb, $school_code)."',
														'".mysqli_real_escape_string($homedb, $parent_code)."',
														'".mysqli_real_escape_string($homedb, $student_name)."',   
														'".mysqli_real_escape_string($homedb, $stu_gender)."',   
														'".mysqli_real_escape_string($homedb, $student_class)."',      
														'".mysqli_real_escape_string($homedb, $class_rep)."',      
														'".mysqli_real_escape_string($homedb, $student_teacher)."',      
														'".mysqli_real_escape_string($homedb, $payment_status)."',      
														'".mysqli_real_escape_string($homedb, $date_init)."'
														)");
														if(mysqli_query($homedb,$query_wallet))
														{
																	
													 
																   $query_wallet =("INSERT INTO 41_student_subjects VALUE (
																	'', 									 
																	'".mysqli_real_escape_string($homedb, $admincode)."',
																	'".mysqli_real_escape_string($homedb, $parent_code)."',		 									 
																	'".mysqli_real_escape_string($homedb, $school_code)."', 									 
																	'".mysqli_real_escape_string($homedb, $online_stu_id)."', 									 
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
        ////////////////////////////////////////////////////////
	
	
	}
	

	if($_POST['page'] == 'login')
	{
 

		if($_POST['action'] == 'login_check')
		{

			$token =  $_POST["user_password"];
             
			$loader->query ="SELECT * FROM 00admin_login_table WHERE passkey = '$token'"; 
			$outputtotal_row = $loader->total_row();
			$output = $loader->query_result();
			foreach($output as $row){
			$user = $row['username'];
			}




			$loader->data = array(
				':user_email_address'	=>	$_POST['user_email_address']
			);

			$loader->query = "
			SELECT * FROM 00admin_login_table 
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
					'error'		=>	'Invalid data passed'
				);
			}
			echo json_encode($output);
		}



		
 	}



	if($_POST['page'] == 'subjectSetup')
	{	
	
            /////////////////////////////////////////
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
							$admincode      =  $row['admincode'];   
							$parent_code    =  $row['parent_code'];   
							$school_code    =  $row['school_code'];   
							$student_name   =  $row['student_name'];   
							$schl_stu_no    =  $row['schl_stu_no'];   
							$online_stu_id  =  $row['online_stu_id'];   
							$student_class  =  $row['student_class'];   
							$sub_status     =  $row['sub_status'];   
							$date           =  $row['date'];   
						
						}	
						
					
						
						if($result_row == 1)
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
											<img src="http://127.0.0.1/schoolproject.com/all_photo/'.$photo.'"  style="height: 200px;border-radius:900pcdcdx" />
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
										$subject_id   = $row['subject_id']; 
											 
											
											echo$data="
											<div card-header>
											
											</div>
											<div style='display:flex;font-size: 20px'>  
											
											<div style='width:5%'>  $subject_id   </div>
											<div style='width:70%'  id='sub_title'> $sub_title   </div>
											<div style='width:20%'  onclick='addSubject($subject_id,$online_stu_id)' class='btn btn-success'>Add Subject    </div>
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
										   
										 Invalid Online Student ID  inserted. Please check table below to get  Online Student ID
										 
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

					$loader->query = "SELECT * FROM `40_all_subject` WHERE `40_all_subject`.`subject_id` ='$subject_id'"; 
					$result_user_wallet = $loader->query_result();
					foreach($result_user_wallet as $row){
   
					$sub_title   =  $row['sub_title'];      
					}
			

										$query_wallet ="UPDATE `41_student_subjects` SET   
										`$subject_id`     = '$sub_title' 		 
										WHERE `41_student_subjects`.`student_code` = '$stu_online_id' "; 
										if(mysqli_query($homedb,$query_wallet))
										{
	  
										 
											echo$feedback		=	"$sub_title has been added to student subject list";
											 

										}
										else
										{ 
											 
											echo $feedback		=	"Newtwork error";
											 
										}

				
					
				 
	 
							
				 	
							
				}
			//////////////////////////////////////////


			/////////////////////////////////////////
			if($_POST['action'] == 'checkSubjects')
			{
				
				//REGISTERED SUBJECTS
				
				$online_stu_id = trim($_POST['stu_online_id']) ;
			 
				$date_maintain = date('Y-m-d');
				$success=""; 
				$failed="";

				
							 

						$loader->query = "SELECT * FROM `4_student_reg` WHERE  `4_student_reg`.`online_stu_id` ='$online_stu_id' ";  
						$result_row = $loader->total_row();
						$result_user_wallet = $loader->query_result();
						foreach($result_user_wallet as $row){

							$photo          =  $row['photo'];   
							$admincode      =  $row['admincode'];   
							$parent_code    =  $row['parent_code'];   
							$school_code    =  $row['school_code'];   
							$student_name   =  $row['student_name'];   
							$schl_stu_no    =  $row['schl_stu_no'];   
							$online_stu_id  =  $row['online_stu_id'];   
							$student_class  =  $row['student_class'];   
							$sub_status     =  $row['sub_status'];   
							$stu_gender     =  $row['stu_gender'];   
							$date           =  $row['date'];   
						
						}	
						
					
						
						if($result_row == 1)
						{
							//$i=0;
							 $result = $loader->GetStudentSubject($online_stu_id);

							$schoolName = $loader-> SchoolName($school_code);	
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
											<div class="btn btn-success"> Update Student Data</div>
											</a>
										
										<h2 style="text-decoration:underline;margin-bottom:20px;color:red"> REGISTERED SUBJECTS  </h2>
										</div>





							 
								  ';



			 					   foreach($result as $row)
									{
                                    
									$newOnlineId = $online_stu_id; // substr($online_stu_id, 3);   //I HAD TO REMOVE THE 3 FIRST LETTERS 

											
											
										   if(!empty($row['1'])){ 
										   $subject_id = 1;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['1']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['2'])){ 
										   $subject_id = 2;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['2']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['3'])){ 
										   $subject_id = 3;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['3']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['4'])){ 
										   $subject_id = 4;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['4']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['5'])){ 
										   $subject_id = 5;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['5']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }



										   if(!empty($row['6'])){ 
										   $subject_id = 6;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['6']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['7'])){ 
										   $subject_id = 7;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['7']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['8'])){ 
										   $subject_id = 8;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['8']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['9'])){ 
										   $subject_id = 9;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['9']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['10'])){ 
										   $subject_id = 10;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['10']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

											
										   if(!empty($row['11'])){ 
										   $subject_id = 11;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['11']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['12'])){ 
										   $subject_id = 12;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['12']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['13'])){ 
										   $subject_id = 13;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['13']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['14'])){ 
										   $subject_id = 14;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['14']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['15'])){ 
										   $subject_id =15;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['15']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }



										   if(!empty($row['16'])){ 
										   $subject_id = 16;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['16']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['17'])){ 
										   $subject_id = 17;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['17']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['18'])){ 
										   $subject_id = 18;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['18']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['19'])){ 
										   $subject_id = 19;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['19']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['20'])){ 
										   $subject_id = 20;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['20']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }



                                           if(!empty($row['21'])){ 
										   $subject_id = 21;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['21']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['22'])){ 
										   $subject_id = 22;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['22']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['23'])){ 
										   $subject_id = 23;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['23']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['24'])){ 
										   $subject_id = 24;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['24']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['25'])){ 
										   $subject_id = 25;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['25']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }



										   if(!empty($row['26'])){ 
										   $subject_id = 26;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['26']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['27'])){ 
										   $subject_id = 27;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['27']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['28'])){ 
										   $subject_id = 28;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['28']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['29'])){ 
										   $subject_id = 29;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['29']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['30'])){ 
										   $subject_id = 30;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['30']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }



										   if(!empty($row['31'])){ 
										   $subject_id =31;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['31']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['32'])){ 
										   $subject_id = 32;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['32']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['33'])){ 
										   $subject_id = 33;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['33']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['34'])){ 
										   $subject_id = 34;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['34']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
											</div>
											<hr>											  
                                                 ";										  
										   }

										   if(!empty($row['35'])){ 
										   $subject_id = 35;
											  echo$data="
											<div style='display:flex;font-size: 20px'>   
											<div style='width:85%'  id='sub_title'>  ".$row['35']."  </div>
											<div style='width:10%'   onclick='removeSubject($subject_id, $newOnlineId)'   class='btn btn-danger'>Remove Subject?   </div>
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
			
			
			if($_POST['action'] == 'removeSubjectID')
			{
				
                      $stu_online_id = trim($_POST['stu_online_id']) ;
                      $subject_id    = trim($_POST['subject_id']) ; 

					$loader->query = "SELECT * FROM `40_all_subject` WHERE `40_all_subject`.`subject_id` ='$subject_id'"; 
					$result_user_wallet = $loader->query_result();
					foreach($result_user_wallet as $row){
   
					$sub_title   =  $row['sub_title'];      
					}
			
			
			                
										$query_wallet ="UPDATE `41_student_subjects` SET   
										`$subject_id`     = '' 		 
										WHERE `41_student_subjects`.`student_code` = '$stu_online_id' "; 
										if(mysqli_query($homedb,$query_wallet))
										{
	  
										 
											echo$feedback		=	"$sub_title removed from  student subject list";
											 

										}
										else
										{ 
											 
											echo $feedback		=	"Newtwork error";
											 
										}

				
					
 
	 
							
				 	
							
				}
            /////////////////////////////////////////
	
	}


 

 


}










?>

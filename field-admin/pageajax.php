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
				$admincode    =  $row['admincode']; 
				$marketer_code =  $row['marketer_code']; 
			 
	
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
			 

			$school_email        =  trim($_POST['school_email']);
			$loader->query = "SELECT * FROM `1_school_reg` WHERE  `1_school_reg`.`school_email` ='$school_email' ";  
			$total_row_row = $loader->total_row();


		 
             $date_init=date('Y-m-d');
			 $date_sub = strtotime('+1 year', strtotime($date_init));
				  
				 
				$schoolCode          =  trim($_POST['school_id']); 

				$source = "school/$schoolCode";
				$folder = "../myschoolapp_api/school/$schoolCode";
						
			if($total_row_row == 0)
			{
					if(!file_exists("$folder"))
					{
					
					
							if( mkdir("$folder", 0777, true) )
							{
							
							



								$marketer_code       =  trim($_POST['marketer_code']); 
								$school_name         =  trim($_POST['school_name']);  
								@$website             =  trim($_POST['website']);
								$raw_password        =  trim($_POST['school_password']);
								$school_password     =	password_hash(trim($_POST['school_password']), PASSWORD_DEFAULT);
								$school_phone        =  trim($_POST['school_phone']);
								$school_address      =  trim($_POST['school_address']);
								@$school_motor        =  trim($_POST['school_motor']);
								$school_bgcolor      =  trim($_POST['school_bgcolor']);
								$text_code           =  trim($_POST['text_code']); 
								@$school_week         =  trim($_POST['school_week']); 
								@$bank_name           =  trim($_POST['bank_name']);
								@$account_name        =  trim($_POST['account_name']);
								@$account_number      =  trim($_POST['account_number']);   
								$schl_propritor_name =  trim($_POST['schl_propritor_name']); 
								@$schl_propritor_msg  =  trim($_POST['schl_propritor_msg']);
								$schl_head_name      =  trim($_POST['schl_head_name']); 
								@$schl_head_msg       =  trim($_POST['schl_head_msg']); 
								@$exam_score          =  trim($_POST['exam_score']); 
								@$test_score          =  trim($_POST['test_score']); 
								@$exam_time           =  trim($_POST['exam_time']); 
								@$test_time           =  trim($_POST['test_time']); 
								@$current_term        =  trim($_POST['current_term']); 
								@$session             =  trim($_POST['session']); 
								$passkey             =  MD5("$raw_password$school_email");	
								
								

								
								$loader->filedata=$_FILES['school_photo'];
								$school_photo               = $loader->UploadPhoto($source);
								$loader->filedata=$_FILES['school_logo'];
								$school_logo               = $loader->UploadPhoto($source);
								@$loader->filedata=$_FILES['schl_propritor_photo'];
								$schl_propritor_photo      = $loader->UploadPhoto($source);
								@$loader->filedata=$_FILES['schl_head_photo']; 
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
												'".mysqli_real_escape_string($homedb, $session)."',
												'".mysqli_real_escape_string($homedb, 'inactive')."',
												'".mysqli_real_escape_string($homedb, 'unpaid')."',
												'".mysqli_real_escape_string($homedb, '')."',
												'".mysqli_real_escape_string($homedb, $passkey)."',
												'".mysqli_real_escape_string($homedb, '0')."'
												)");
												if(mysqli_query($homedb,$query_wallet))
												{
																
									
														$query_wallet =("INSERT INTO api_for_question VALUE ( 
														'',    
														'".mysqli_real_escape_string($homedb, $passkey)."',   
														'".mysqli_real_escape_string($homedb, $schoolCode)."',   
														'".mysqli_real_escape_string($homedb, $date_sub)."',    
														'".mysqli_real_escape_string($homedb, 'fixed')."',   
														'".mysqli_real_escape_string($homedb, $date_init)."' 
														)");
														mysqli_query($homedb,$query_wallet);


									
													$subject = 'SCHOOL PORTALS MANAGEMENT & CBT INTEGRATION APPLICATION SOFTWARE';
												
													$body = "
													<div style='width:100%;height:5px;background: #000000'></div><br> 
														<div style='font-size:14px;color:black;font-family:lucida sans;'>
														
															<center >
																	
																	<h1>
																	<img src='cid:logo'  style='text-align:center;height:50px;'/> <br/> 
																	HEBZIHUB NIG LTD
																	</h1>
																	<small>(RC: 7892845)</small><br/><br/>


																	<img src='cid:logo2' style='width:100%' />
															</center>

																		
															<p>
															Hi $schl_propritor_name, your school $school_name portal first phase setup was successful and your school portal has been setup for operations.<br/>
															To complete the final setup of school portals management & CBT integration system software,
															you need to login with your school admin login credential below
															
															</p><br/>
															
															<p>
															Please, find below your school login credentials and should incase you forgot your portal password for security and future purpose, send a mail 
															to support@hebzihubnigltd.com.ng with this your registered email for fast response.
															</p><br/>


															<p>
																<a href='https://adminportal.com.ng/login/school-portal/' >  Kindly click here </a> and login to school admin portal dashboard  or 
																if  link is disabled  on your device copy this link https://adminportal.com.ng/login/school-portal  and past to your browser . 
															</p>
														
															<p>
															 <img src='cid:logo3' style='width:100%' />

															 <b style='text-decoration:underline'>Portal Login Details </b><br/>
																Username: $school_email  <br />
																Password: $raw_password  <br />
																
															</p><br/>
															

															<p>
                                                                <b style='text-decoration:underline'> To Access Other Sofware Portals URLS </b><br/>
																<a href='https://adminportal.com.ng/login/school-portal/'><b>School Portal</b>: https://adminportal.com.ng/login/school-portal/ </a>(Web App)  <br /> <br />
																<a href='https://adminportal.com.ng/login/teacher-portal'><b>Teacher Portal</b>: https://adminportal.com.ng/login/teacher-portal </a> (Web App)<br /> <br />
																<a href='https://cbt-portal.com.ng'><b>Student Portal</b>: https://cbt-portal.com.ng </a> (Web App)<br /> <br />
																<a href='https://parent-portal.com.ng'><b>Parent Portal</b>: https://parent-portal.com.ng </a> (Web App) <br /> <br />
																<a href='https://play.google.com/store/apps/details?id=com.parentappmobile'><b>Parent Portal App (Andriod Playstore) Url </b>: https://play.google.com/store/apps/details?id=com.parentappmobile </a> (Mobile App) <br />
																 
							
															</p>



															
															<br /><br /><br /><br />
															<div> Account Setup Team </div>   
															<div><b>$acc_fullname ($admincode)</b></div>   
															<div><b>$phone</b></div> 
															<div> https://hebzihubnigltd.com.ng </div>  
															
															
															</div><br><br>
														</div>			
														";

									 
													$loader->send_email($school_email, $subject, $body,$schl_propritor_name);
						
													$loader->SchoolNoGeneratorUpdate();


														$output = array(
															'success'		=>	'success',
															'feedback'		=>	"School account setup successfully!!. School operation login credentials sent to $school_email"
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
			}
			else
			{
				
					$output = array(
						'success'		=>	'failed',
						'feedback'		=>	"School account with $school_email already exist"
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
				$sender_name         =  $rows['sender_name'];  
				$school_code         =  $rows['school_code'];  
				$ticket_id           =  $rows['ticket_id']; 
				$sender_email        =  $rows['email'];  
				$ticket_subject      =  $rows['subject'];  	   	
				$team_lead           =  $rows['team_lead'];  	   	
				$unit               =  $rows['unit'];  	   	
			}

								 

		if($unit == 'agent')	
		{								
											   
					$query =("INSERT INTO `ticket` VALUE (
					'',
					'".mysqli_real_escape_string($homedb, $ticket_id)."',	 									 
					'".mysqli_real_escape_string($homedb, $school_code)."',	 									 
					'".mysqli_real_escape_string($homedb, $sender_name)."',	 									 
					'".mysqli_real_escape_string($homedb, $sender_email)."', 									 
					'".mysqli_real_escape_string($homedb, 'open')."',
					'".mysqli_real_escape_string($homedb, 'agent')."',  
					'".mysqli_real_escape_string($homedb, $admincode)."',  
					'".mysqli_real_escape_string($homedb, $acc_fullname)."',
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
				'feedback'		=>	"You can not reply to this ticket. This ticket has been escalated to Technical Unit"
			);
		}
				 echo json_encode($output);
				 
	   
			 
		}
	}	


	if($_POST['page'] == 'TicketEscalation')
	{
		   
		if($_POST['action'] == 'TicketEscalation')
		{ 
			  
			$unit  =  htmlentities($_POST['unit']); 
			$id    =  htmlentities($_POST['id']); 
			
	 
			$loader->query = "SELECT * FROM `ticket` WHERE  `id` = '$id'";  
			$result = $loader->query_result(); 
			foreach($result as $rows)
			{ 	 	 	 
				$ticket_id        =  $rows['ticket_id'];   	   	
				$sender_email     =  $rows['email'];   	   	
				$unit_table       =  $rows['unit'];   	   	
			}

			

			if($unit_table == 'agent')
			{


					$query ="UPDATE `ticket` SET `unit` = '$unit' WHERE `ticket`.`ticket_id` = '$ticket_id'"; 
					if(mysqli_query($homedb,$query))
					{ 
						$output = array(
							'success'   =>	'success',
							'feedback'   =>	'Ticket has been escalated successfully'
						); 
					}
					else
					{ 
						$output = array(
							'success'		=>	'failed',
							'feedback'   =>	'An err occured during ticket escalation. please try again'
						);
					}

			}else{

				$output = array(
					'success'   =>	'success',
					'feedback'   =>	'Ticket already escalated'
				); 
			}		
				 echo json_encode($output);
				 
	   
			 
		}
	}	


}
 





?>

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
	
	$loader->query='SELECT * FROM `0_team_lead`  WHERE `0_team_lead`.`password` ="'.$_SESSION['password'].'" AND `0_team_lead`.`username`="'.$_SESSION['username'].'"';
			
			if($result = $loader->query_result()){ 
				foreach($result as $row)
				{
						
				$photo        =  $row['photo']; 
				$username     =  $row['username'];
				$tokenpasskey =  $row['token'];
				$password     =  $row['password'];
				$acc_fullname =  $row['fullname'];
				$phone        =  $row['phone']; 
				$marketer_code=  $row['team_lead_id']; 
			    $admincode    =  $row['admincode']; 
				$agent_firm_name    =  $row['agent_firm_name'];
	
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
             
			$loader->query ="SELECT * FROM  `0_team_lead` WHERE token = '$token'"; 
			$outputtotal_row = $loader->total_row();
			$output = $loader->query_result();
			foreach($output as $row){
			$user = $row['username'];
			}




			$loader->data = array(
				':user_email_address'	=>	$_POST['user_email_address']
			);

			$loader->query = "
			SELECT * FROM 0_team_lead 
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



		if($_POST['action'] == 'team_lead')
		{
			 
  
		 


					$marketer_code   =  trim($_POST['fieldAdminCode']);
					$fullname        =  trim($_POST['fullname']);
					$phone           =  trim($_POST['phone']);
					$address         =  trim($_POST['address']);
					$acct_number     =  trim($_POST['acct_number']);
					$user_email      =  trim($_POST['user_email_address']);
					$acct_name       =  trim($_POST['acct_name']);
					$bank_name       =  trim($_POST['bank_name']); 
					
					
					$loader->query ="SELECT * FROM 0_team_lead WHERE team_lead_id = '$marketer_code'";  
					$output = $loader->query_result();
					foreach($output as $row){
					$photo = $row['photo'];
					}
						 
						$loader->filedata= $_FILES['field_operator_photo']; 
						@$field_photo     = $loader->UploadPhoto('team_lead'); 

					if(!empty($field_photo)){

						@@unlink("../$Teamlead/$photo");

						$query_wallet ="UPDATE `0_team_lead` SET    
						`photo`       =  '$field_photo',
						`fullname`    =  '$fullname',
						`phone`       =  '$phone',
						`address`     =  '$address',
						`acct_number` =  '$acct_number',
						`acct_name`   =  '$acct_name',
						`bank_name`   =  '$bank_name'
						WHERE `0_team_lead`.`team_lead_id` = '$marketer_code' "; 


					}
					else
					{
						$query_wallet ="UPDATE `0_team_lead` SET 
						`fullname`    =  '$fullname',
						`phone`       =  '$phone',
						`address`     =  '$address',
						`acct_number` =  '$acct_number',
						`acct_name`   =  '$acct_name',
						`bank_name`   =  '$bank_name'
						WHERE `0_team_lead`.`team_lead_id` = '$marketer_code' "; 
					}

 
			if(mysqli_query($homedb,$query_wallet))
			{

					$data= array(
						'success'		=>	'success',
						'feedback'		=>	'Team Lead data updated successfully!! '
					);

		   }
		   else
		   {
					$data= array(
						'success'		=>	'success',
						'feedback'		=>	'Team Lead data updated failed!! '
					);			
		   }
			
		}

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

	  
									$query =("UPDATE `0_team_lead` SET  
									`token`    = '$token',
									`password`    = '$hash_pass'
									WHERE `0_team_lead`.`username` = '$username'"); 
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
		 
		
		 $date_init=date('d-m-Y');


				$loader->filedata     = $_FILES['field_operator_photo'];
				$field_operator_photo = $loader->UploadPhoto('field_admin');   
	 
				$fullname        =  trim($_POST['fullname']);
				$phone           =  trim($_POST['phone']);
				$address         =  trim($_POST['address']);
				$fieldAdminCode  =  trim($_POST['fieldAdminCode']);
				$acct_number     =  trim($_POST['acct_number']);
				$acct_name       =  trim($_POST['acct_name']);
				$bank_name       =  trim($_POST['bank_name']);
				$user_email      =  trim($_POST['user_email_address']);
				$raw_password    =  trim($_POST['password']);
				$passkey         =   MD5("$raw_password$user_email");
				$user_password   =	password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

				$total_row = $loader->AllFieldAdminExist($fieldAdminCode);

						
		if($total_row == 0 )
		{
				 
						 
						   $query_wallet =("INSERT INTO 0_marketer_reg VALUE (
							'',
							'".mysqli_real_escape_string($homedb, $passkey)."',	 									 
							'".mysqli_real_escape_string($homedb, $marketer_code)."',	 									 
							'".mysqli_real_escape_string($homedb, $fieldAdminCode)."',	 									 
							'".mysqli_real_escape_string($homedb, $field_operator_photo)."',	 									 
							'".mysqli_real_escape_string($homedb, $user_email)."', 									 
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
											
				 
				 
				
								$subject = 'Field Admin Recruit';
										
								$body = "
									<div style='width:100%;height:5px;background: orange'></div><br> 
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
											   <h3 style='text-decoration:underline;color:black'>Field Admin Operational Dashboard Setup </h3>

												Hi $fullname you have been recruited for the role of Field Admin from Hebzihub Nigeria Limited via our top Team $agent_firm_name. 
												Your Field Admin operational account has been setup, you can start onboarding both primary schools and secondary schools to deploy our 
												SCHOOL PORTALS MANAGEMENT & CBT INTEGRATION APPLICATION SOFTWARE to their school system operation.
											</p>


											<p>
											   <h3 style='text-decoration:underline'>Field Admin Primary Objectives</h3> 
												* Be comfortable to work with your team ($agent_firm_name) speed <br/>
												* Onboard new school and give follow up on each onboarded school <br/>
												* Train onboarded schools teaching staffs to know how to operate our software effectively <br/>
												* As a Field Admin you will monitor your onboarded schools termly payment subscription on our software deployment<br/>
												* As a Field Admin you will be able to attend to all ticket/enquiries raised for resolutions from your onboarded schools team<br/>
												* Remunerations will be paid by Team $agent_firm_name <br/><br/>
											</p>
									
											<p>
											 <img src='cid:logo3' style='width:100%' /><br/><br/>
												<b style='text-decoration:underline'>Operational Login Details </b><br/>
												Username: $user_email  <br />
												Default Password: $raw_password  <br />

											</p>

											<p>
												<a href='https://adminportal.com.ng/login/field-admin/' >  Kindly click here </a> and login to your Field Admin dashboard  or 
												if  link is disabled  on your device copy this link https://adminportal.com.ng/login/field-admin/  and past to your browser . 
											</p> <br />

 										
									
									
									
									
									
												<br /><br /><br /><br />
												<div>TEAM LEAD ($marketer_code) </div>   
												<div><b>$agent_firm_namee</b></div>   
												<div><b>($acc_fullname)</b></div>   
													 
												
												
												</div><br><br>



																							 
										</div><br><br>
									</div>			
									";
				
									$loader->send_email($user_email, $subject, $body,$agent_firm_name);
									 $loader->FieldAdminNoGeneratorUpdate();
	 

									$output = array(
										'success'		=>	'success',
										'feedback'		=>	'Field admin account setup successfully!!. Check your email for login details'
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
					'feedback'		=>	"$fieldAdminCode account already setup"
				);
		}


			
 
		 
		 echo json_encode($output);
		 
		 
		 
	}



	if($_POST["page"] === 'approveResetPassword')
	{


		if($_POST['action'] == 'approveResetPassword')
		{

			$current_datetime  = date("d-m-Y");
			$approve_status    = $_POST['approve_status'];
			$account_code      = $_POST['account_code'];
		
			if($approve_status === 'field_admin')
			{
				$resetPwd = mb_strimwidth(time(), 3, 6); 

					$loader->query = "SELECT * FROM `0_marketer_reg` WHERE  marketer_code = '$account_code'   ";  
					$total_row = $loader->total_row();
					$result = $loader->query_result(); 
					foreach($result as $rows)
					{ 	 	 	
						$marketer_code  =  $rows['marketer_code'];	   	
						$user      =  $rows['username'];	   	
						$fullname  =  $rows['fullname'];	   	
					}



				if($total_row  >= 1)
				{

				 
						$token      =  MD5("$resetPwd$user");	
						$password   =  password_hash($resetPwd, PASSWORD_DEFAULT);


							$queryletter =("UPDATE `0_marketer_reg` SET   
							`token`    = '$token',
							`password` = '$password'
							WHERE `0_marketer_reg`.`username` = '$user'");

							if(mysqli_query($homedb, $queryletter))
							{

								echo $data ='
								<div class="col-xl- col-md-6">
								<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
									
								'.$fullname.' password has been reset to '.$resetPwd.' Your login details has been sent 
								to '.$user.'
		
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
								</div>  
								</div> 
								';


								$subject = ' Field Admin Password reset';
					
								$body = "
									<div style='width:100%;height:5px;background: #c908bd'></div><br> 
									<div style='font-size:14px;color:black;font-family:lucida sans;'>
									
										<center >
												<h1>PASSWORD RESET</h1>
												<h2>Field Admin  Account  </h2>
										</center><br>

													
										<p>
										Hi $fullname, kindly note that your Field Admin account dashboard  password has been reset.
										You will find below your new login details to access your Field Admin account dashboard  
										</p>
										
										<p>
											Username: $user  <br />
											Password: $resetPwd  <br />
											
										</p>
										
											
										
										
										</div><br><br>
									</div>			
									";
				
									@@$loader->send_email($user, $subject, $body);

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


	if($_POST['page'] == 'delete')
	{
		if($_POST['action'] == 'delete')
		{
			
			//REGISTERED SUBJECTS
			
			
			$name          = trim($_POST['name']) ;
		    $delete_id     = trim($_POST['delete_id']) ;
			 
			$success=""; 
			$failed="";

		  if($name == 'fieldAdmin')
			{
				$loader->query = "SELECT * FROM `0_marketer_reg` WHERE  `0_marketer_reg`.`marketer_code` ='$delete_id' ";  
				$result_row = $loader->total_row();
				$result_user_wallet = $loader->query_result();
				foreach($result_user_wallet as $row){

					$fullname     =  $row['fullname'];       
					$fd_address    =  $row['address'];            
					$fd_phone      =  $row['phone'];      
					$fd_email     =  $row['username'];      
				
				  }	
				
		 
			 if($result_row == 1){
				
						   echo $success =' 
					 
								<div style="text-align:center;font-wweight:bold;font-size:20px">
							 
								
								  
									<div>Field Admin Name: '.$fullname.'</div>
									<div>Field Phone: '.$fd_phone.'</div>
									<div>Address:  '.$fd_address.'</div> 
									<div>Email :  '.$fd_email.'</div> 

								
								<h2 style="text-decoration:underline;margin-bottom:20px;color:red">ARE YOU SURE YOU WANT TO  DELETE THIS ACCOUNT?</h2>
								<p style="color:red">Please do note that <span style="color:black">'.$fullname.' </span>account will be deleted once the Delete Now button is clicked
								along side with all students account connected
								and this proccess can not be reversed, however all informations of <span style="color:black">'.$fullname.' </span> will be deleted from our database
								</p><br/>



								<form method="POST"   action="#">
								<div class="form-group">
								  <input type="text" class="form-control" name="passcode" id="passcode"  placeholder="Enter your password to delete ">
								 </div> 
							  </form>
								';
								 
								echo"<div class='btn btn-danger'  onclick='deletAccount(\"$name\",\"$delete_id\",\"$tokenpasskey\",\"$username\")'> Delete Now</div>
								
								</div>";


			 }else{

				echo $output = " Invalid delete ID";
			 }

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

		if($category == 'fieldAdmin')
		{
				$loader->query = "SELECT * FROM  `0_marketer_reg` WHERE `0_marketer_reg`.`marketer_code`  ='$delete_id' ";  
				$result_row = $loader->total_row(); 
				$result_user_wallet = $loader->query_result();
				foreach($result_user_wallet as $row){

					$fullname     =  $row['fullname'];             
					$photo      =  $row['photo'];          
				
				}	
					if($result_row == 1)
					{

						 

						$loader->query = "DELETE FROM `0_marketer_reg` WHERE `0_marketer_reg`.`marketer_code` = '$delete_id' ";
						$loader->execute_query();


						unlink("../myschoolapp_api/field_admin/$photo");
						
						echo $success ="Account has been deleted with all connected accounts from database<br/>";

						echo"<a href='index.php'  class='btn btn-danger'> Continue </a>";
							

					}
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
				$sender_email    =  $rows['email']; 
				$ticket_id       =  $rows['ticket_id'];   	   	
				$unit_table      =  $rows['unit'];   	   	
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

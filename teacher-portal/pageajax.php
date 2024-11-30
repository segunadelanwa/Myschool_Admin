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

	if(!empty($_SESSION['token']) AND !empty($_SESSION['username']))
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

			$token =  trim($_POST["user_password"]);
			$user_email_address =  trim($_POST["user_email_address"]);
             
			$loader->query ="SELECT * FROM  `2_teacher_reg` WHERE token = '$token' AND username = '$user_email_address'"; 
			$outputtotal_row = $loader->total_row();
			$output = $loader->query_result();
			foreach($output as $row){
			$sch_code = $row['school_code'];
			$teacher_token = $row['token'];  
			}





			if($outputtotal_row == 1)
			{


				$loader->data = array(
					':user_email_address' => $_POST['user_email_address'],
					':school_code'        => $sch_code
				);
	

				$loader->query = " SELECT * FROM `2_teacher_reg` INNER JOIN `1_school_reg` ON `2_teacher_reg`.`school_code` = `1_school_reg`.`school_code` WHERE `2_teacher_reg`.`username` = :user_email_address AND `2_teacher_reg`.`school_code` = :school_code";
				$total_row = $loader->total_row();		

				if($total_row > 0)
				{
					$result = $loader->query_result();

					foreach($result as $row)
					{
						
						if($row['school_status'] ==  'active')
						{
						 
							    $_SESSION['username'] = $row['username'];
							    $_SESSION['token'] = $teacher_token;
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

		// if($_POST['action'] == 'login_checkold')
		// {

		// 	$token =  $_POST["user_password"];
             
		// 	$loader->query ="SELECT * FROM  `2_teacher_reg` WHERE token = '$token'"; 
		// 	$outputtotal_row = $loader->total_row();
	 




		// 	$loader->data = array(
		// 		':user_email_address'	=>	$_POST['user_email_address']
		// 	);

		// 	$loader->query = "
		// 	SELECT * FROM 2_teacher_reg 
		// 	WHERE username = :user_email_address
		// 	";

		// 	$total_row = $loader->total_row(); 
		// 	if($outputtotal_row == 1)
		// 	{

			
		// 		if($total_row > 0)
		// 		{
		// 			$result = $loader->query_result(); 
		// 			foreach($result as $row)
		// 			{
		// 				$school_code = $row['school_code'];
		// 				$user        = $row['username'];
		// 				$tokenRaw    = $row['token'];
        //              }

		// 			//  $loader->query ="SELECT * FROM `1_school_reg` WHERE `1_school_reg`.`school_code` ='$school_code'";
		// 			//  $resData = $loader->query_result();   
		// 			// foreach($resData as $rows)
		// 			// { 
		// 			// 	$school_status   = $rows['school_status']; 
		// 			// 	$school_name     = $rows['school_name']; 
		// 			// }


		// 			// 				if($school_status  ==  'active')
		// 			// 				{

		// 								$_SESSION['username'] = $user;
		// 								$_SESSION['token']    = $tokenRaw;

		// 								$output = array(
		// 									'success'	=>	true
		// 								);
							
		// 							// }
		// 							// else
		// 							// {
		// 							// 	$output = array(
		// 							// 		'error'		=>	"$school_name account has been suspended. Please kindly contact us to lift the suspension "
		// 							// 	);
		// 							// }
 
				
					
		// 		}
		// 		else
		// 		{
		// 			$output = array(
		// 				'error'		=>	'This email address is not registered. <br/>Please register below to get started'
		// 			);
		// 		}
		// 	}
		// 	else
		// 	{
		// 		$output = array(
		// 			'error'		=>	"Invalid data passed " 
		// 		);
		// 	}
		// 	echo json_encode($output);
		// }

	 

 	}
 
 
	if($_POST["page"] === 'updateAcctPassword')
	{


		if($_POST['action'] == 'updateAcctPassword')
		{

			$current_datetime = date("d-m-Y");
			$pwd_1   = $_POST['pwd_1'];
			$pwd_2   = $_POST['pwd_2'];
			
			 
			$token      =  MD5("$pwd_1$username");	
			$pass       =  MD5("$pwd_1");	

	  
									$query =("UPDATE `2_teacher_reg` SET  
									`token`            = '$token',
									`password`  = '$pass'
									WHERE `2_teacher_reg`.`username` = '$username'"); 
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


 
	if($_POST['page'] == 'updateUserData')
	{

  
		if($_POST['action'] == 'teacher')
		{
			 
 
					
					$teacher_code          =  trim($_POST['teacher_code']);
					$user_email_address    =  trim($_POST['user_email_address']);
					$fullname              =  trim($_POST['fullname']);
					$gender                =  trim($_POST['gender']);
					$phone                 =  trim($_POST['phone']);
					$address               =  trim($_POST['address']); 
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

					if($sch_code == $school_code)
					{
								$location          = "school/$school_code";
								$loader->filedata  = $_FILES['field_operator_photo'];
								$field_photo       = $loader->UploadPhoto($location); 

							if(!empty($field_photo)){

								@@unlink("../$SchoolIMG/$school_code/$photo");

								$query_wallet ="UPDATE `2_teacher_reg` SET   
								`photo`           =  '$field_photo',
								`fullname`        =  '$fullname',
								`gender`          =  '$gender',
								`phone`           =  '$phone',
								`address`         =  '$address', 
								`subject`         =  '$subject',
								`account_name`    =  '$acct_name',
								`account_number`  =  '$acct_number', 
								`bank_name`       =  '$bank_name' 
								WHERE `2_teacher_reg`.`teacher_code` = '$teacher_code' "; 


							}
							else
							{
								$query_wallet ="UPDATE `2_teacher_reg` SET    
								`fullname`        =  '$fullname',
								`gender`          =  '$gender',
								`phone`           =  '$phone',
								`address`         =  '$address', 
								`subject`         =  '$subject',
								`account_name`    =  '$acct_name',
								`account_number`  =  '$acct_number', 
								`bank_name`       =  '$bank_name' 
								WHERE `2_teacher_reg`.`teacher_code` = '$teacher_code' "; 
							}


								if(mysqli_query($homedb,$query_wallet))
								{

									$data= array(
										'success'		=>	'success',
										'feedback'		=>	'Teacher  data updated successfully!! '
									);

								}
								else
								{
									$data= array(
										'success'		=>	'success',
										'feedback'		=>	'Teacher data update failed!! '
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

		if($_POST['action'] == 'comment')
		{
			  
 

					$student_code   =  trim($_POST['student_code']);
					$school_id      =  trim($_POST['school_code']);  
					$teacher_comment    =  trim($_POST['teacher_comment']); ; 


					$loader->query ="SELECT * FROM 4_student_reg WHERE online_stu_id = '$student_code'";  
					$output = $loader->query_result();
					foreach($output as $row){ 
					$sch_code = $row['school_code'];
					}
            if($sch_code == $school_code)
			{
					  
 
						$query_wallet ="UPDATE `4_student_reg` SET     
						`teacher_term_comment` =  '$teacher_comment' 
						WHERE `4_student_reg`.`online_stu_id` = '$student_code' ";  
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
							$sch_code       =  $row['school_code'];   
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

				
					 

						$loader->query = "SELECT * FROM `4_student_reg` WHERE  `4_student_reg`.`online_stu_id` ='$online_stu_id' AND teacher_code = '$teacher_code' AND school_code = '$school_code' ";  
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
					else if($resultType == 'assessment')
					{
						$query_wallet ="UPDATE `student_weekly_assesment` SET   
						`$sub_id`     = 'null' 		 
						WHERE `student_weekly_assesment`.`student_code` = '$stu_online_id' "; 

						if(mysqli_query($homedb,$query_wallet))
						{ 
							echo$feedback		=	"Student student_weekly_assesment reset ";  
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

				
							 

						$loader->query = "SELECT * FROM `4_student_reg` WHERE  `4_student_reg`.`online_stu_id` ='$online_stu_id' AND teacher_code = '$teacher_code' AND school_code = '$school_code' ";  
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
											 <a href="edit_data.php?data_id='.$online_stu_id.'&name=student">
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
			


	if($_POST["page"] === 'printQuestion')
	{


		if($_POST['action'] == 'printQuestion')
		{

	 


					$school_code   = $_POST['school_code'];
					$T_username    = $_POST['username']; 
					$subject_id    = $_POST['subject_id']; 

					$loader->query = "SELECT * FROM `50_question_table` WHERE  teacher_code='$T_username' AND subject_id = '$subject_id'  AND school_code = '$school_code' "; 
					$total_row = $loader->total_row(); 
					$result = $loader->query_result(); 
					foreach($result as $rows)
					{
						$schoolName    =  $loader-> SchoolName($school_code);
						$subject       =  $loader-> FecthSingleSubject($rows['cbt_subject']);	 
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



			if($total_row > 0 )
			{		 

					if($cbt_status    == 'general'){
						$new_cbt_status = 'General';
					}else if($cbt_status    == 'test'){
						$new_cbt_status = 'Mid-Term Test'; 
					}else if($cbt_status    == 'exam'){
						$new_cbt_status = 'Examination'; 
					}else if($cbt_status    == 'assessment'){
						$new_cbt_status = 'Weekly Assessment';
					}


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
																<h6 style="text-transform:capitalize;">'.$new_cbt_status.': '.$subject.' Questions </h6>
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
																	<div style="margin-top:45px;text-align:center;border-radius:500px;border:1px solid #777777 ">	 
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
																<div style="margin-top:190px;text-align:center;border-radius:500px;border:1px solid #777777"> 
																A 
																</div>
																<div style="margin-top:20px;text-align:center;border-radius:500px;border:1px solid #777777">
																B
																</div>
																<div style="margin-top:18px;text-align:center;border-radius:500px;border:1px solid #777777">
																C
																</div>
																<div style="margin-top:15px;text-align:center;border-radius:500px;border:1px solid #777777">
																D
																</div>
																'; 
													}
														
														echo'<tr role="row" class="odd">
														
														<td>
														<b>Question <br/> '.$d.' </b> 
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
																	echo $optionData[$i]  = '<div style="margin-top:25px;text-align:left; ">'.$row['option_title'].'</div>';
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

	if($_POST["page"] === 'uploadQuestion')
	{
	 
		  if($_POST['action'] == 'question')
		   {
			$question_img = '';
			$date = date("Y-m-d");
			$query = "SELECT MAX(id) as last_id FROM `50_question_table` ";
			$result =mysqli_query($homedb, $query); 
			$row = mysqli_fetch_array($result);
            $last_id = $row['last_id'];
			$new_id = $last_id + 1;

 
			  
	          if($_POST['answer'] == 'A'){
				$correct_answer = $_POST['option_a'];
			  } else if($_POST['answer'] == 'B'){
				$correct_answer = $_POST['option_b'];
			  } else if($_POST['answer'] == 'C'){
				$correct_answer = $_POST['option_c'];
			  } else if($_POST['answer'] == 'D'){
				$correct_answer = $_POST['option_d'];
			  }
			  $quest_link_img =	 "./question_img";
			  @$loader->filedata  = $_FILES['question_img'];
			  $quesimg      = $loader->UploadPhoto($quest_link_img);  
			 
 
	           
					$query = "INSERT INTO `51_question_option`  
					(question_id,option_title)  
					VALUES
					 ('".$new_id."','(A) ".$_POST['option_a']."'),
					 ('".$new_id."','(B) ".$_POST['option_b']."'),
					 ('".$new_id."','(C) ".$_POST['option_c']."'),
					 ('".$new_id."','(D) ".$_POST['option_d']."')  
					 ";  
					mysqli_query($homedb, $query);
			
			 
				    $queryletter =("INSERT INTO `50_question_table` VALUES (
					'".mysqli_real_escape_string($homedb, $new_id)."', 
					'".mysqli_real_escape_string($homedb, $_POST['subject'])."',
					'".mysqli_real_escape_string($homedb, $_POST['access_code'])."',
					'".mysqli_real_escape_string($homedb, $quesimg)."', 
					'".mysqli_real_escape_string($homedb, $_POST['question'])."',
					'".mysqli_real_escape_string($homedb, $correct_answer)."',
					'".mysqli_real_escape_string($homedb, $_POST['class'])."',
					'".mysqli_real_escape_string($homedb, $_POST['type'])."',
					'".mysqli_real_escape_string($homedb, $_POST['school_code'])."',
					'".mysqli_real_escape_string($homedb, $username)."',
					'".mysqli_real_escape_string($homedb, $date)."'
					)");
					if(mysqli_query($homedb, $queryletter)){ 
						
						

						
					if($loader->ExamAccessCode($_POST['access_code']) == 0){


							$queryletter =("INSERT INTO `exam_access_code` VALUES (
							'',  
							'".mysqli_real_escape_string($homedb, $_POST['access_code'])."',
							'".mysqli_real_escape_string($homedb, $_POST['access_code'])."',
							'".mysqli_real_escape_string($homedb, $username)."',
							'".mysqli_real_escape_string($homedb, $date)."'
							)");
							mysqli_query($homedb, $queryletter);


					}


					$data= array(
						'success'		=>	'success',
						'feedback'		=>	'question uploaded successfully'
					);
				
			echo json_encode($data);
	
	        }

 
	       }

	
	}

	if($_POST["page"] === 'uploadSchemeOfWork')
	{
	 
		  if($_POST['action'] == 'uploadSchemeOfWork')
		   {
			 
			$date = date("Y-m-d");
			$loader->query = "SELECT * FROM `scheme_of_uploader` WHERE  teacher_id='".$_POST['teacher_code']."' AND subject_id = '".$_POST['subject']."' AND class = '".$_POST['class']."' AND scheme_term = '".$_POST['term_selection']."' AND week = '".$_POST['week']."'"; 
			$total_row = $loader->total_row(); 
 
			if($total_row = $loader->total_row() == 0)
			{

			
				    $queryletter =("INSERT INTO `scheme_of_uploader` VALUES (
					'', 
					'".mysqli_real_escape_string($homedb, $_POST['teacher_code'])."',
					'".mysqli_real_escape_string($homedb, $_POST['school_code'])."',
					'".mysqli_real_escape_string($homedb, $photo)."', 
					'".mysqli_real_escape_string($homedb, $_POST['subject'])."', 
					'".mysqli_real_escape_string($homedb, $_POST['class'])."',
					'".mysqli_real_escape_string($homedb, $_POST['week'])."',
					'".mysqli_real_escape_string($homedb, $_POST['topic'])."', 
					'".mysqli_real_escape_string($homedb, $_POST['content'])."', 
					'".mysqli_real_escape_string($homedb, $date)."',
					'".mysqli_real_escape_string($homedb, $_POST['term_selection'])."'
					)");
					if(mysqli_query($homedb, $queryletter))
					{ 

						$data= array(
						'success'		=>	'success',
						'feedback'		=>	'question uploaded successfully'
						);

					
					}else{

						$data= array(
						'success'		=>	'failed',
						'feedback'		=>	'Scheme of work  uploaded failed'
						);

					}
			}
			else
			{

				$data= array(
				'success'		=>	'failed',
				'feedback'		=>	'Scheme of work already exist'
				);

			}
                   echo json_encode($data);
	       }

	
	}


	if($_POST["page"] === 'updateSchemeOfWork')
	{
	 
		  if($_POST['action'] == 'updateSchemeOfWork')
		   {
			 
			$date = date("Y-m-d");
		 

			$teacher_code   = $_POST['teacher_code'];
			$school_code    = $_POST['school_code']; 
			$subject        = $_POST['subject'];
			$class          = $_POST['class'];
			$week           = $_POST['week'];  
			$topic          = $_POST['topic'];  
			$content        = $_POST['content']; 
			$term_selection = $_POST['term_selection'];
			$sow_id         = $_POST['sow_id'];

			
			
				    $queryletter ="UPDATE `scheme_of_uploader` SET  
					`teacher_id`   = '$teacher_code',
					`school_code`    = '$school_code',  
					`teacher_photo`          = '$photo',  
					`subject_id`        = '$subject', 
					`class`          = '$class',
					`week`           = '$week',
					`topic`          = '$topic', 
					`content`        = '$content',  
					`scheme_term` = '$term_selection'
					WHERE  `scheme_of_uploader`.`id` = '$sow_id' ";
					if(mysqli_query($homedb, $queryletter))
					{ 

						$data= array(
						'success'		=>	'success',
						'feedback'		=>	'question uploaded successfully'
						);

					
					}else{

						$data= array(
						'success'		=>	'failed',
						'feedback'		=>	'Scheme of work  uploaded failed'
						);

					}
		 
                   echo json_encode($data);
	       }

	
	}

  
	if($_POST["page"] === 'AlterQuestion')
	{
	 
		  if($_POST['action'] == 'question')
		   {
			$quesimg = '';
			$date = date("Y-m-d");
 

 
			  
 
			  $quest_link_img    ="./question_img";
			  $loader->filedata  = $_FILES['question_img'];
			  $quesimg           = $loader->UploadPhoto($quest_link_img);  


			  $img_hidden   = htmlentities($_POST['question_img_hidden']);
			  $optID_0      = htmlentities($_POST['optID_0']);
              $optTXT_0     = htmlentities($_POST['optTXT_0']);
			  $optID_1      = htmlentities($_POST['optID_1']);
              $optTXT_1     = htmlentities($_POST['optTXT_1']);
			  $optID_2      = htmlentities($_POST['optID_2']);
              $optTXT_2     = htmlentities($_POST['optTXT_2']);
			  $optID_3      = htmlentities($_POST['optID_3']);
              $optTXT_3     = htmlentities($_POST['optTXT_3']);
			  $subject      = htmlentities($_POST['subject']);
			  $access_code  = htmlentities($_POST['access_code']);
			  $question     = htmlentities($_POST['question']);
			  $answer       = htmlentities($_POST['answer']);
			  $class        = htmlentities($_POST['class']);
			  $type         = htmlentities($_POST['type']);
			  $question_id  = htmlentities($_POST['question_id']);

			  $loader->query ="SELECT * FROM 50_question_table WHERE id = '$question_id'";  
			  $output = $loader->query_result();
			  foreach($output as $row){
				  $ques_image     = $row['question_image']; 
			  }
  
			 
			         $loader->query ="UPDATE `51_question_option` SET 
					 `option_title` = '$optTXT_0'
					 WHERE  `51_question_option`.`id` = '$optID_0' ";
                     $loader->execute_query();


                    $loader->query ="UPDATE `51_question_option` SET 
					 `option_title` = '$optTXT_1'
					 WHERE  `51_question_option`.`id` = '$optID_1' ";
                     $loader->execute_query();


                     $loader->query ="UPDATE `51_question_option` SET 
					 `option_title` = '$optTXT_2'
					 WHERE  `51_question_option`.`id` = '$optID_2' ";
                     $loader->execute_query();


                    $loader->query ="UPDATE `51_question_option` SET 
					 `option_title` = '$optTXT_3'
					 WHERE  `51_question_option`.`id` = '$optID_3' ";
                     $loader->execute_query();


 
					if(empty($quesimg)){
                        //No new image clicked

						$queryletter =("UPDATE  `50_question_table` SET 
						`cbt_subject`    = '$subject',
						`subject_id`     = '$access_code', 
						`question_title` = '$question',
						`answer_option`  = '$answer',
						`student_class`  = '$class', 
						`cbt_status`     = '$type'
						WHERE `50_question_table`.`id` = '$question_id'");
						
					}else {
                         //New image clicked

                            @unlink("myschoolapp_api/question_img/$ques_image");

							$queryletter =("UPDATE  `50_question_table` SET 
							`cbt_subject`    = '$subject',
							`subject_id`     = '$access_code', 
							`question_image` = '$quesimg',
							`question_title` = '$question',
							`answer_option`  = '$answer',
							`student_class`  = '$class', 
							`cbt_status`     = '$type'
							WHERE `50_question_table`.`id` = '$question_id'");

					}

					   

					if(mysqli_query($homedb, $queryletter)){ 
						
						

						
					if($loader->ExamAccessCode($_POST['access_code']) == 0){


							$queryletter =("INSERT INTO `exam_access_code` VALUES (
							'',  
							'".mysqli_real_escape_string($homedb, $_POST['access_code'])."',
							'".mysqli_real_escape_string($homedb, $_POST['access_code'])."',
							'".mysqli_real_escape_string($homedb, $username)."',
							'".mysqli_real_escape_string($homedb, $date)."'
							)");
							mysqli_query($homedb, $queryletter);


					}


					$data= array(
						'success'  =>	'success',
						'feedback' =>	"question uploaded successfully"
					);
				
			echo json_encode($data);
	
	        
		   }
 
	       }

	
	}

	if($_POST["page"] === 'delete')
	{

		if($_POST['action'] == 'deleteAccount')
		{
			
			//REGISTERED SUBJECTS
			
			
			$category      = trim($_POST['category']) ;
		    $delete_id     = trim($_POST['delete_id']) ;
			 
			$success=""; 
			$failed="";

	        if($category == 'dropQuestion')
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

				 if($username === $raw_teacher_code || $school_code === $raw_school_code){

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
								   `edit_by`  =  '$fullname'  
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


	if($_POST['page'] == 'FetchNumberOfQuestion')
	{
		   
		if($_POST['action'] == 'FetchNumberOfQuestion')
		{
			
		   
			  
			 $subject_id   = $_POST['sub_id_id'];  
			$loader->query ="SELECT * FROM `50_question_table` WHERE `subject_id` = '$subject_id' AND `school_code` = '$school_code' "; 
			$total_row = $loader->total_row();   
            
			if($total_row > 0){
				$output = array(
					'success'		=>	'success',
					'feedback'		=>	"$total_row"
				);				
			}else{
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
								   '".mysqli_real_escape_string($homedb, $teacher_code)."', 									 
								   '".mysqli_real_escape_string($homedb, $fullname)."',
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


	if($_POST['page'] == 'updateStudentScore')
	{
		   
		if($_POST['action'] == 'updateStudentScore')
		{
	 
			 
			$schCode   =  htmlentities($_POST['schCode']); 
			$stuCode   =  htmlentities($_POST['stuCode']); 
			$score     =  htmlentities($_POST['score']); 
			$type      =  htmlentities($_POST['type']); 
			$subject   =  htmlentities($_POST['subject']); 
				 
			


	
							 
							
			if($type == 'examScore'){

				$query =("UPDATE `student_exam_result` SET  
				`$subject`  = '$score' 
				WHERE `student_exam_result`.`student_code` = '$stuCode'"); 
				if(mysqli_query($homedb,$query))
				{
					 					   
						$output = array(
							'success'   =>	'success' 
						);
	
				}
				else
				{ 
						$output = array(
							'success'		=>	'failed',
							'feedback'		=>	"Newtwork error"
						);
				}


			}else if($type == 'testScore'){

				$query =("UPDATE `student_test_result` SET  
				`$subject`  = '$score' 
				WHERE `student_test_result`.`student_code` = '$stuCode'"); 
				if(mysqli_query($homedb,$query))
				{
					 					   
						$output = array(
							'success'   =>	'success'
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
				 
			


	
							 
							
			       $teamLead =$loader-> FecthTecketTeamLead($school_code);
						   
							   $query_wallet =("INSERT INTO `ticket` VALUE (
								   '',
								   '".mysqli_real_escape_string($homedb, $ticket_id)."',	 									 
								   '".mysqli_real_escape_string($homedb, $school_code)."',	 									 
								   '".mysqli_real_escape_string($homedb, $fullname)."',	 									 
								   '".mysqli_real_escape_string($homedb, $sender_email)."', 									 
								   '".mysqli_real_escape_string($homedb, 'open')."',
								   '".mysqli_real_escape_string($homedb, 'agent')."',  
								   '".mysqli_real_escape_string($homedb, $teamLead )."',  
								   '".mysqli_real_escape_string($homedb, 'pending')."',
								   '".mysqli_real_escape_string($homedb, $ticket_subject)."',
								   '".mysqli_real_escape_string($homedb, $post_text_area)."', 
								   '".mysqli_real_escape_string($homedb, $format_date)."',
								   '".mysqli_real_escape_string($homedb, $current_date)."',
								   '".mysqli_real_escape_string($homedb, '0')."'
								   )");
								   if(mysqli_query($homedb,$query_wallet))
								   {
											 

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

								 

										 
											   
			$query =("INSERT INTO `ticket` VALUE (
			'',
			'".mysqli_real_escape_string($homedb, $ticket_id)."',	 									 
			'".mysqli_real_escape_string($homedb, $school_code)."',	 									 
			'".mysqli_real_escape_string($homedb, $fullname)."',	 									 
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
					'failed'	=>	'failed',
					'feedback'	=>	'Network Err'
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




}
?>

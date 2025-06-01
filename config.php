<?php
ob_start();
session_start();

 


$current_datetime = date("Y-m-d");
$time = date("H:i:s", STRTOTIME(date('h:i:sa')));


class Loader{
	
	
	
	
	var $host; 
	var $username;
	var $password;
	var $database;
	var $connect;
	var $home_page;
	var $query;
	var $data;
	var $statement;
	var $filedata;
	var $teacher_per    = 30;
	var $HeadTeach_per  = 4;
	var $fieldAdmin_per = 4;
	var $companyEarn_per= 38;
	var $comLabMain_per = 4;
	var $schoolEarn_per = 20;
	var $agentEarn      = 20;
	
	
	
	function __construct()
	{
		
		require("connect.php");
		$this->connect = new PDO("mysql:host=$this->host; dbname=$this->database", "$this->username", "$this->password");
       	 
	}

	function execute_query()
	{
		$this->statement = $this->connect->prepare($this->query);
		$this->statement->execute($this->data);
	}
  

  

	function total_row()
	{
		$this->execute_query();
		return $this->statement->rowCount();
	}

	function query_result()
	{
		$this->execute_query();
		return $this->statement->fetchAll();
	}

 
  
			function send_email($receiver_email, $subject, $body)
			{
			require("phpmailer/PHPMailerAutoload.php");
			$mail = new PHPMailer;

					//$mail->IsSMTP();

					//$mail->Host = 'smtp host';

					//$mail->Port = '587';

					//$mail->SMTPAuth = true;

					//$mail->Username = '';

					//$mail->Password = '';

					//$mail->SMTPSecure = ''; 
					$mail->SMTPDebug = 0;  
					$mail->setFrom('noreply@hebzihubnigltd.com.ng', 'SCHOOL PORTALS MANAGEMENT & CBT INTEGRATION APPLICATION SOFTWARE');

					$mail->FromName = 'HEBZIHUB NIG LTD';
					
					$mail->AddReplyTo = 'support@hebzihubnigltd.com.ng';

					$mail->AddAddress('support@hebzihubnigltd.com.ng', '');
					$mail->AddAddress($receiver_email, '');

					$mail->IsHTML(true);

					$mail->Subject = $subject;

					$mail->Body = $body;
					
					$mail->AddEmbeddedImage('gen_img/logo_b.png', 'logo', 'gen_img/logo_b.png'); 
					$mail->AddEmbeddedImage('all_photo/team-lead.png', 'logo2', 'all_photo/team-lead.png'); 
					$mail->AddEmbeddedImage('all_photo/login.png', 'logo3', 'all_photo/login.png'); 

					$mail->Send();		
			}	
			
			
			function redirect()
			{
				header('location:  index.php');
				exit;
			}

			function admin_session_private()
			{
				if(!isset($_SESSION['admin_id']))
				{
					$this->redirect('login.php');
				}
			}

			function admin_session_public()
			{
				if(isset($_SESSION['admin_id']))
				{
					$this->redirect('index.php');
				}
			}

 

	 
			function Upload_file($user)
			{
				
				$serverPhoto = $this->ProfilePhotoUpdate($user);
				
				
				if(!empty($this->filedata['name']))
				{
					$extension = pathinfo($this->filedata['name'], PATHINFO_EXTENSION);

					$new_name = uniqid() . '.' . $extension;

					$_source_path = $this->filedata['tmp_name'];

					$target_path = 'profile_img/' . $new_name;

					if(move_uploaded_file($_source_path, $target_path)){
						
						
						$this->query ="UPDATE `login_table` SET   
						`photo`  = '$new_name'		 
						WHERE `login_table`.`username` = '$user' ";
						$this->execute_query();
						
						
						
						if($serverPhoto == 'placeholder.jpg'){
							
						 							
						}else{
							
                         unlink("profile_img/$serverPhoto");

						}							
							
							
						return 1;
						
					}else{
						
						return 0;
					}

					
				}
			}
	
        	function UploadPhoto($location)
			{
				
			 
				
				
				if(!empty($this->filedata['name']))
				{
					//$extension = pathinfo($this->filedata['name'], PATHINFO_EXTENSION);
					
					$new_name = uniqid() . '.' . 'jpg';

					$_source_path = $this->filedata['tmp_name'];
					$type         = $this->filedata['type'];
					$image_size   = @filesize($_source_path);

					$target_path = "myschoolapp_api/$location/" . $new_name;
					if($type=='image/jpeg' || $type == 'image/png'){
						                  //41943040 5mb 
						if($image_size  < 125829120 )
						{

								if(move_uploaded_file($_source_path, $target_path))
								{
										
									return $new_name;
									
								}
								else
								{
									
									return 0;
								}

						}
						else
						{
							return $output = "$image_size.jpg";
						}
				  }
				  else
				  {
					return $output = "badfileupload.jpg";
				  }

				}
			}
 
			function AccessCodeVerify($access_code)
			{
 
		 
				$this->query = " SELECT * FROM  `login_table` WHERE `login_table`.`level_code` = '$access_code'   ";
				 
				$output = $this->query_result();
				 
				return $output;

			}

			function ExamAccessCode($access_code)
			{
 
		 
				$this->query = " SELECT * FROM  `exam_access_code` WHERE `exam_access_code`.`access_code` = '$access_code'   ";
				 
				$output = $this->total_row();
				 
				return $output;

			}


 			function ProfilePhotoUpdate($user)
			{
				$this->query = "SELECT * FROM `login_table` WHERE `login_table`.`username` ='$user' ";
		 		$result = $this->query_result();

				foreach($result as $row)
				{
					$output = $row['photo'];
				}
				return $output;
			}

 
 

 			function DisplayTotalSchoolRow()
			{
				 
				 
				$this->query = "SELECT * FROM `1_school_reg` ";
		 
				$output = $this->total_row();
				 
				return $output;
			}


			function DisplayTeachersRow()
			{
				 
				 
				$this->query = "SELECT * FROM `2_teacher_reg` ";
		 
				$output = $this->query_result();
				 
				return $output;
			}

  
			
     	
 		     
 		 
 			function QuestionAccessSuggestion()
			{
				$new_name = uniqid();
				$this->query ="SELECT * FROM `50_question_table` WHERE `50_question_table`.`subject_id` = '$new_name'";
				$output = $this->total_row();
                if($output == 0){
					return $new_name;
				}else{
					return $new_name =uniqid().'321';
				}
				
			}
 		 
 		 
 			function ParentNameExist($parent_code)
			{
				 
				$this->query ="SELECT * FROM `3_parent_reg` WHERE `3_parent_reg`.`parent_code` = '$parent_code'";
				$output = $this->total_row();
 
				return $output;
			}
 		 
 			function ParentName($name)
			{
				 
				$this->query ="SELECT * FROM `3_parent_reg` WHERE `3_parent_reg`.`parent_code` = '$name'";
				$output = $this->query_result();
				foreach($output as $row)
				{
				$guidance_name =	$row['guidance_name'];
				}
				 
				return $guidance_name;
			}


			function SchoolNameExist($school_code)
			{
				 
				$this->query ="SELECT * FROM `1_school_reg` WHERE `1_school_reg`.`school_code` = '$school_code'";
				$total_row = $this->total_row();
	
					 return $total_row;
			 
				
			}


			function SchoolName($name)
			{
				 
				$this->query ="SELECT * FROM `1_school_reg` WHERE `1_school_reg`.`school_code` = '$name'";
				$total_row = $this->total_row();
				$output = $this->query_result();
				foreach($output as $row)
				{
				$schlName =	$row['school_name'];
				}
				 
				 if($total_row >= 1){
					 return $schlName;
				 }else{
					 return null;
				 }
				
			}

		
			function SchoolStudentNummber($school_code)
			{
				 
				$this->query ="SELECT * FROM  `4_student_reg` WHERE school_code ='$school_code'  ";
				$output = $this->total_row();
		  
				 
				return $output;
			}
   		
			function ConfirmStudentExist($stuCode)
			{
				 
			 
					$this->query = "SELECT * FROM `4_student_reg` WHERE `4_student_reg`.`online_stu_id` = '$stuCode' "; 
					$output = $this->total_row();  
					return $output;
				 
			}
   
			function ConfirmTeacherExist($teacher_code)
			{
				 
			 
					$this->query = "SELECT * FROM `2_teacher_reg` WHERE `2_teacher_reg`.`teacher_code` = '$teacher_code' "; 
					$output = $this->total_row();  
					return $output;
				 
			}
   

  


		
			function FecthAllSubject()
			{
				 
				$this->query ="SELECT * FROM `40_all_subject`";
				$output = $this->query_result();
		  
				 
				return $output;
			}	
			function FetchBank()
			{
				 
				$this->query ="SELECT * FROM `bank_code`";
				$output = $this->query_result();
		  
				 
				return $output;
			}	

			function FetchBankName($bank_code)
			{
				 
				$this->query ="SELECT * FROM `bank_code` WHERE `bank_code` = '$bank_code' ";
				$total_row = $this->total_row();
				$result = $this->query_result();
				foreach($result as $row){ 
					$output  =  $row['bank_name'];
				}
		        if($total_row == 1){
					return $output;
				}else{
					return $output = 'Error';
				}
				 
				
			}
			function FecthSingleSubject($subject)
			{
				 
				$this->query ="SELECT * FROM `40_all_subject`  WHERE sub_id ='$subject'";
				$output = $this->query_result();
				foreach($output as $row){ 
					$output =  $row['sub_title'];
				} 
			 
				return $output;
			}		
			
			function DisplayMarketerRow()
			{
				 
				 
				$this->query = "SELECT * FROM `0_marketer_reg` ";
		 
				$output = $this->total_row();
				 
				return $output;
			}
			function DisplayTeamLeadRow()
			{
				 
				 
				$this->query = "SELECT * FROM `0_team_lead` ";
		 
				$output = $this->total_row();
				 
				return $output;
			}

 

		
			function AllFieldAdminExist($name)
			{
				 
				$this->query ="SELECT * FROM `0_marketer_reg` WHERE  `0_marketer_reg`.`marketer_code` = '$name'";
				$output = $this->total_row();
		  
				 
				return $output;
			}		
 		
			
			function AllTeamLead()
			{
				 
				$this->query ="SELECT * FROM `0_team_lead`";
				$output = $this->query_result();
		  
				 
				return $output;
			}
			function AllFieldAdmin()
			{
				 
				$this->query ="SELECT * FROM `0_marketer_reg`";
				$output = $this->query_result();
		  
				 
				return $output;
			}
		
			function AllStudent()
			{
				 
				$this->query ="SELECT * FROM `4_student_reg`";
				$output = $this->query_result();
		  
				 
				return $output;
			}
			function RegisteredSubjects($online_stu_id,$school_code)
			{
				 
                    $this->query ="SELECT * FROM `41_student_subjects` WHERE  `41_student_subjects`.`student_code` = '$online_stu_id' AND  `41_student_subjects`.`school_code` = '$school_code' ";
                    $output_result = $this->query_result();
                    $total_row = $this->total_row();
                    
                    if($total_row > 0 )
                    {
                        
                        foreach($output_result as $row){
                        $data[$i] = $row;
                        $i++; 
                        }
                    
                    }else{
                        
                        $data[] = array(
                        'success'     =>  '0',
                        'feedback'   => "$online_stu_id |$school_code No registered subject found for student"
                        );				   
                    
                    }
				
			
	                return $data;
		  
				 
				return $output;
			}

		
			function SchoolActivities()
			{
				 
				$this->query ="SELECT * FROM `1_school_reg` ";
				$output = $this->query_result();
		  
				 
				return $output;
			}
			function FadminOnboardedSchools($code)
			{
				 
				$this->query ="SELECT * FROM `1_school_reg` WHERE `1_school_reg`.`fadmin_code` = '$code'";
				$output = $this->query_result();
		  
				 
				return $output;
			}
			function TeamLeadOnboardedSchools($code)
			{
				 
				$this->query ="SELECT * FROM `1_school_reg` WHERE `1_school_reg`.`team_lead` = '$code'";
				$output = $this->query_result();
		  
				 
				return $output;
			}


			function ActiveSchoolStudentEarn($school_code,$marketer_code)
			{
				 
				$this->query ="SELECT * FROM  `4_student_reg` WHERE school_code ='$school_code' AND sub_status='active'AND fadmin_code='$marketer_code' ";
				 
		  
				 				 
				$result =  $this->total_row() * $this->AdminSettings();
				
                $output =  $result / 100 * 4;  
				
				return $output ;//= 500;
			}
			function AllRegisteredParent()
			{
				 
				$this->query ="SELECT * FROM  `3_parent_reg` ";
				$output = $this->query_result();
		  
				 
				return $output;
			}

			function SchoolMarketed($code)
			{
				 
				$this->query ="SELECT * FROM  `1_school_reg` WHERE fadmin_code ='$code'";
				$output = $this->total_row(); 
				return $output;

			}
			
			function AdminSettings()
			{
				 
				$this->query ="SELECT * FROM  settings "; 
				$result = $this->query_result();
				foreach($result as $row){
				    
					$output =  $row['cbt_fee'];
				} 
				 
				return $output;
			}
			
			
			function ActiveStudent($school_code)
			{
				 
				$this->query ="SELECT * FROM  `4_student_reg` WHERE school_code ='$school_code' AND sub_status='active' ";
				$output =$this->total_row();
		  
				 
				return $output ;
			}
			function AllTeachers()
			{
				 
				$this->query ="SELECT * FROM  `2_teacher_reg`  ";
				$output = $this->total_row();
		  
				 
				return $output;
			}
			function TotalNumOfSchlTeachers($school_code)
			{
				 
				$this->query ="SELECT * FROM  2_teacher_reg  WHERE school_code ='$school_code' AND teacher_rank='teacher'";
				$output = $this->total_row();
		  
				 
				return $output;
			}
			
			function SchoolRevenue($schoolCode)
			{
				//number of active or paid student  * CBT TERM FEE
				$result = $this->ActiveStudent($schoolCode) * $this->AdminSettings();
				
                $output =  $result;

				return $output;
			}
			

			function SchoolRevenuePayment($schoolCode)
			{
				//Confirm if school remit Application payment from parent
				$this->query ="SELECT * FROM  `1_school_reg` WHERE `1_school_reg`.`school_payment` = 'paid' ";
				$total_row = $this->total_row();


				if($total_row > 0){

				//number of active or paid student  * CBT TERM FEE
				$result = $this->ActiveStudent($schoolCode) * $this->AdminSettings();
				// SCHOOL TAKES 20%
                $output =  $result / 100 * $this->schoolEarn_per;


						return $output;
				}else{
					return $output= 0;
				}

			}


			function SchoolEarn($schoolCode)
			{
				//number of active or paid student  * CBT TERM FEE
				$result = $this->ActiveStudent($schoolCode) * $this->AdminSettings();
				// SCHOOL TAKES 20%
                $output =  $result / 100 * $this->schoolEarn_per;

				return $output;
			}
			function TeacherEarn($schoolCode)
			{
				//number of active or paid student  * CBT TERM FEE
				$result = $this->ActiveStudent($schoolCode) * $this->AdminSettings();
				//All SCHOOL TEACHERS TAKE 30%
                $output =  $result / 100 * $this->teacher_per; 


				return $output;
			}
			
			function EachTeacherEarn($schoolCode)
			{
				//number of active or paid student  * CBT TERM FEE
				$result = $this->ActiveStudent($schoolCode) * $this->AdminSettings();
				//All SCHOOL TEACHERS TAKE 30%
                $out =  $result / 100 * $this->teacher_per;
                // ALL SCHOOL TEACHER EARN IS DIVIED BY NUMBER OF TEACHERS
				$teah = $this->TotalNumOfSchlTeachers($schoolCode);
                $output = $out / $teah;


				return $output;
			}

			function EachTeacherEarnPayment($teacher_code , $schoolCode)
			{
				//Confirm if school remit Application payment from parent
				$this->query ="SELECT * FROM  `2_teacher_reg` INNER JOIN `1_school_reg` ON `1_school_reg`.`school_code` =  `2_teacher_reg`.`school_code`  WHERE `2_teacher_reg`.`teacher_code`='$teacher_code' AND  `1_school_reg`.`school_payment` = 'paid'  ";
				$total_row = $this->total_row();


				if($total_row > 0){
						//number of active or paid student  * CBT TERM FEE
						$result = $this->ActiveStudent($schoolCode) * $this->AdminSettings();
						//All SCHOOL TEACHERS TAKE 30%
						$out =  $result / 100 * $this->teacher_per;
						// ALL SCHOOL TEACHER EARN IS DIVIED BY NUMBER OF TEACHERS
						$teah = $this->TotalNumOfSchlTeachers($schoolCode);
						$output = $out / $teah;


						return $output;
				}else{
					return $output= 0;
				}

			}
			function HeadTeacherEarn($schoolCode)
			{
				//number of active or paid student  * CBT TERM FEE
				$result = $this->ActiveStudent($schoolCode) * $this->AdminSettings();
				//HEAD TEACHERS TAKE 4%
                $output =  $result / 100 * 4;  
				return $output;
			}
			function HeadTeacherEarnPayment($teacher_code , $schoolCode)
			{
				//Confirm if school remit Application payment from parent
				$this->query ="SELECT * FROM  `2_teacher_reg` INNER JOIN `1_school_reg` ON `1_school_reg`.`school_code` =  `2_teacher_reg`.`school_code`  WHERE `2_teacher_reg`.`teacher_code`='$teacher_code' AND  `1_school_reg`.`school_payment` = 'paid'  ";
				$total_row = $this->total_row();


				if($total_row > 0){
					//Confirm number of active student in the school
					$result = $this->ActiveStudent($schoolCode)* $this->AdminSettings();
					//HEAD TEACHERS TAKE 4%
					$output =  $result / 100 * $this->HeadTeach_per;  
					return $output;
				}else{
					return $output= 0;
				}

			}
			function FieldAdminEarn($schoolCode)
			{
				//number of active or paid student  * CBT TERM FEE
				$result = $this->ActiveStudent($schoolCode) * $this->AdminSettings(); 
				//HEAD TEACHERS TAKE 4%
                $output =  $result / 100 * $this->fieldAdmin_per;  
				return $output;
			}
			function FieldAdminNetEarn($marketer_code)
			{ 
				$this->query ="SELECT * FROM  `4_student_reg` INNER JOIN `1_school_reg` ON `1_school_reg`.`fadmin_code` =  `4_student_reg`.`fadmin_code`  WHERE `4_student_reg`.`fadmin_code`='$marketer_code' AND `4_student_reg`.`sub_status`='active' AND `1_school_reg`.`school_payment` = 'paid'  ";
				$result = $this->total_row()* $this->AdminSettings();
                $output =  $result / 100 * $this->fieldAdmin_per;  
				return $output;
			}
 
			function CompanyEarn($schoolCode)
			{
				//number of active or paid student  * CBT TERM FEE
				$result = $this->ActiveStudent($schoolCode) * $this->AdminSettings();
				//HEAD TEACHERS TAKE 4%
                $output =  $result / 100 * $this->companyEarn_per;  
				return $output;
			}
			function ComLabMaint($schoolCode)
			{
				//number of active or paid student  * CBT TERM FEE
				$result = $this->ActiveStudent($schoolCode) * $this->AdminSettings();
				//HEAD TEACHERS TAKE 4%
                $output =  $result / 100 * $this->comLabMain_per;  
				return $output;
			}

			function PassiveStudent($school_code)
			{
				 
				$this->query ="SELECT * FROM  `4_student_reg` WHERE school_code ='$school_code' AND sub_status='inactive' ";
				$output = $this->total_row();
		  
				 
				return $output;
			}


			function DisplayAllStudentRow()
			{
				 
			 
				$this->query = "SELECT * FROM `4_student_reg` ";
		 
				$output = $this->total_row();
				 
				return $output;
			}



	 
 
 /////////////////////////////////////////////////////////////////
 
 
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
			

			function GetAllSubjects()
			{
				$this->query = "SELECT * FROM `40_all_subject` ";
		 
				$result = $this->query_result();
			 
				return $result;
			}


			
			function ParentStudentList($parent_code)
			{
				$this->query = "SELECT * FROM `4_student_reg` WHERE  `4_student_reg`.`parent_code` = '$parent_code' ";
		 
				$result = $this->query_result();
			 
				return $result;
			}


			function SchoolTeachers($school_code)
			{
				$this->query = "SELECT * FROM `2_teacher_reg` WHERE  `2_teacher_reg`.`school_code` = '$school_code' ";
		 
				$result = $this->query_result();
			 
				return $result;
			}

			function TeacherStudentList($teacher_code)
			{
				$this->query = "SELECT * FROM `4_student_reg` WHERE  `4_student_reg`.`teacher_code` = '$teacher_code' ";
		 
				$result = $this->query_result();
			 
				return $result;
			}
			function SchoolStudentList($school_code)
			{
				$this->query = "SELECT * FROM `4_student_reg` WHERE  `4_student_reg`.`school_code` = '$school_code' ";
		 
				$result = $this->query_result();
			 
				return $result;
			}
			function PaymentHistory($payee_id)
			{
				$this->query = "SELECT * FROM `trans_history` WHERE  `trans_history`.`trans_user` = '$payee_id' ";
		 
				$result = $this->query_result();
			 
				return $result;
			}
			function PaymentHistoryCount($payee_id)
			{
				$this->query = "SELECT * FROM `trans_history` WHERE  `trans_history`.`trans_user` = '$payee_id' ";
		 
				$result = $this->total_row();
			 
				return $result;
			}


			function GetStudentSubject($online_stu_id)
			{
				$this->query = "SELECT * FROM `41_student_subjects` WHERE  `41_student_subjects`.`student_code` = '$online_stu_id' ";
		 
				$result = $this->query_result();
			 
				return $result;
			}


			function FetchSchoolName($schoolCode)
			{
 
				$output =$this->SchoolName($schoolCode);
		 
	 
				return $output;
			}


			function StudentNoGenerator()
			{
				$this->query = "SELECT * FROM settings  "; 
				$result = $this->query_result();
				foreach($result as $row){ 
					$stu_code_gen  =  $row['stu_code_gen'];
				}

				$result = $stu_code_gen + 1;
				if(strlen($result) == 1){
					$output = "STUD000$result";

				}else if(strlen($result) == 2){
					$output = "STUD00$result"; 

				}else if(strlen($result) == 3){
					$output = "STUD0$result";

				}else if(strlen($result) == 4){
					$output = "STUD$result";
				}

				return $output;
			}
			function FieldAdminNoGenerator()
			{
				$this->query = "SELECT * FROM settings  "; 
				$result = $this->query_result();
				foreach($result as $row){ 
					$field_admin  =  $row['field_admin'];
				}

				$result = $field_admin + 1;
				if(strlen($result) == 1){
					$output = "FAD000$result";

				}else if(strlen($result) == 2){
					$output = "FAD00$result"; 

				}else if(strlen($result) == 3){
					$output = "FAD0$result";

				}else if(strlen($result) == 4){
					$output = "FAD$result";
				}

				return $output;
			}

			function TeamLeadNoGenerator()
			{
			 
					$this->query = "SELECT * FROM settings  "; 
					$result = $this->query_result();
					foreach($result as $row){ 
						$field_admin  =  $row['team_lead'];
					}
	
					$result = $field_admin + 1;
					if(strlen($result) == 1){
						$output = "TL000$result";
	
					}else if(strlen($result) == 2){
						$output = "TL00$result"; 
	
					}else if(strlen($result) == 3){
						$output = "TL0$result";
	
					}else if(strlen($result) == 4){
						$output = "TL$result";
					}
	
					return $output;
			 
				 
			}

			
			function AgentAdminNoGenerator()
			{
				$this->query = "SELECT * FROM settings  "; 
				$result = $this->query_result();
				foreach($result as $row){ 
					$agent_admin  =  $row['agent_admin'];
				}

				$result = $agent_admin + 1;
				if(strlen($result) == 1){
					$output = "AGT000$result";

				}else if(strlen($result) == 2){
					$output = "AGT00$result"; 

				}else if(strlen($result) == 3){
					$output = "AGT0$result";

				}else if(strlen($result) == 4){
					$output = "AGT$result";
				}

				return $output;
			}
			function SchoolNoGenerator()
			{
				$this->query = "SELECT * FROM settings  "; 
				$result = $this->query_result();
				foreach($result as $row){ 
					$school_count  =  $row['school_count'];
				}

				$result = $school_count + 1;
				if(strlen($result) == 1){
					$output = "SCH000$result";

				}else if(strlen($result) == 2){
					$output = "SCH00$result"; 

				}else if(strlen($result) == 3){
					$output = "SCH0$result";

				}else if(strlen($result) == 4){
					$output = "SCH$result";
				}

				return $output;
			}
			function ParentNoGenerator()
			{
				$this->query = "SELECT * FROM settings  "; 
				$result = $this->query_result();
				foreach($result as $row){ 
					$parent_count  =  $row['parent_count'];
				}

				$result = $parent_count + 1;
				if(strlen($result) == 1){
					$output = "PAR000$result";

				}else if(strlen($result) == 2){
					$output = "PAR00$result"; 

				}else if(strlen($result) == 3){
					$output = "PAR0$result";

				}else if(strlen($result) == 4){
					$output = "PAR$result";
				}

				return $output;
			}
			function TeacherNoGenerator()
			{
				$this->query = "SELECT * FROM settings  "; 
				$result = $this->query_result();
				foreach($result as $row){ 
					$teacher_count  =  $row['teacher_count'];
				}

				$result = $teacher_count + 1;
				if(strlen($result) == 1){
					$output = "TEA000$result";

				}else if(strlen($result) == 2){
					$output = "TEA00$result"; 

				}else if(strlen($result) == 3){
					$output = "TEA0$result";

				}else if(strlen($result) == 4){
					$output = "TEA$result";
				}

				return $output;
			}


			function StudentNoGeneratorUpdate()
			{
				$this->query = "SELECT * FROM settings  "; 
				$result = $this->query_result();
				foreach($result as $row){ 
					$stu_code_gen  =  $row['stu_code_gen'];
				}

				$result = $stu_code_gen + 1;

				$this->query ="UPDATE `settings` SET  
				  `stu_code_gen`  = '$result'
				 WHERE `settings`.`id` = '1' ";
				$this->execute_query();
				 
			}
			function FieldAdminNoGeneratorUpdate()
			{
				$this->query = "SELECT * FROM settings  "; 
				$result = $this->query_result();
				foreach($result as $row){ 
					$field_admin  =  $row['field_admin'];
				}

				$result = $field_admin + 1;

				$this->query ="UPDATE `settings` SET  
				  `field_admin`  = '$result'
				 WHERE `settings`.`id` = '1' ";
				$this->execute_query();
				 
			}
			function TeamLeadNoGeneratorUpdate()
			{
				$this->query = "SELECT * FROM settings  "; 
				$result = $this->query_result();
				foreach($result as $row){ 
					$team_lead  =  $row['team_lead'];
				}

				$result = $team_lead + 1;

				$this->query ="UPDATE `settings` SET  
				  `team_lead`  = '$result'
				 WHERE `settings`.`id` = '1' ";
				$this->execute_query();
				 
			}


			function SchoolNoGeneratorUpdate()
			{
				$this->query = "SELECT * FROM settings  "; 
				$result = $this->query_result();
				foreach($result as $row){ 
					$school_count  =  $row['school_count'];
				}

				$result = $school_count + 1;

				$this->query ="UPDATE `settings` SET  
				  `school_count`  = '$result'
				 WHERE `settings`.`id` = '1' ";
				$this->execute_query();
				 
			}
			function ParentNoGeneratorUpdate()
			{
				$this->query = "SELECT * FROM settings  "; 
				$result = $this->query_result();
				foreach($result as $row){ 
					$parent_count  =  $row['parent_count'];
				}

				$result = $parent_count + 1;

				$this->query ="UPDATE `settings` SET  
				  `parent_count`  = '$result'
				 WHERE `settings`.`id` = '1' ";
				$this->execute_query();
				 
			}
			function TeacherNoGeneratorUpdate()
			{
				$this->query = "SELECT * FROM settings  "; 
				$result = $this->query_result();
				foreach($result as $row){ 
					$teacher_count  =  $row['teacher_count'];
				}

				$result = $teacher_count + 1;

				$this->query ="UPDATE `settings` SET  
				  `teacher_count`  = '$result'
				 WHERE `settings`.`id` = '1' ";
				$this->execute_query();
				 
			}




			function GradeCal($score)
			{
				// switch ($score) {
				// 	case $score  >  84;
				// 	  $output = 'A1+';
				// 	  break;
				// 	case $score  > 74  && $score <= 84:
				// 	  $output = 'A1';
				// 	  break;
				// 	case $score  > 69  && $score <= 74:
				// 	  $output = 'B2';
				// 	  break;
				// 	  case $score  > 64 && $score <= 69:
				// 		$output = 'B3';
				// 	  break;
				// 	  case $score  > 59 && $score <= 64:
				// 		$output = 'C4';
				// 	  break; 
				// 	  case $score  > 54 && $score <= 59:
				// 		$output = 'C5';
				// 	  break;
				// 	  case $score  > 49 && $score <= 54:
				// 		$output = 'C6';
				// 	  break;
				// 	  case $score  > 45 && $score <= 49:
				// 		$output = 'D7';
				// 	  break;
				// 	  case $score  > 39 && $score <= 45:
				// 		$output = 'E8';
				// 	  break;  
				// 	  case $score  > 0 && $score <= 39: 
				// 		$output = 'F9';
				// 	  break;  
				// 	  case $score  === 0 : 
				// 		$output = '';
				// 	  break;  
	 
				// 	default: $output = 'Nil';
				//   }



		 
					if($score  >  84){
					  $output = 'A1+';

					 }else if($score  > 74  && $score <= 84){
					  $output = 'A1';
					  
					}else if($score  > 69  && $score <= 74){
					  $output = 'B2'; 

					}else if($score  > 64 && $score <= 69){
						$output = 'B3';
					   
					}else if($score  > 59 && $score <= 64){
						$output = 'C4';
					    
					}else if($score  > 54 && $score <= 59){
						$output = 'C5';
					   
					}else if($score  > 49 && $score <= 54){
						$output = 'C6';
					   
					}else if($score  > 45 && $score <= 49){
						$output = 'D7';
					   
					}else if($score  > 39 && $score <= 45){
						$output = 'E8';
					     
					}else if($score  > 0 && $score <= 39){ 
						$output = 'F9';
					     
					}else if($score  == 0 ){
						$output = '...';
					}     
	 
				 
				return $output;
			}



	
	
		 public function LoginDataFiles($schoolCode , $parentCode)
	    {
	     
 
						
		 
                ///////////////////////////////////////////////////////////////////////////////////////
                             
	 
				$this->query = "SELECT * FROM `4_student_reg` WHERE parent_code ='$parentCode'";
				$result_user_wallet = $this->query_result();
				foreach($result_user_wallet as $row){
				    
                        $admincode           =  $row['admincode'];
                        $photo               =  $row['photo'];
                        $schl_stu_no         =  $row['schl_stu_no'];
                        $online_stu_id       =  $row['online_stu_id'];
                        $school_code         =  $row['school_code'];
                        $parent_code         =  $row['parent_code'];
                        $student_name        =  $row['student_name'];
                        $stu_gender          =  $row['stu_gender'];
                        $student_class       =  $row['student_class'];
                        $class_rep           =  $row['class_rep'];
                        $student_teacher     =  $row['student_teacher'];
                        $sub_status          =  $row['sub_status'];
                        $date                =  $row['date']; 
                             
				}
								
								
				$this->query = "SELECT * FROM `3_parent_reg` WHERE `parent_code` ='$parentCode'";
				$result_user_wallet = $this->query_result();
				foreach($result_user_wallet as $row){
				    
                        $admin_code           = $row['admin_code'];
                        $sch_code             = $row['sch_code'];
                        $username             = $row['username'];
                        $parent_code          = $row['parent_code'];
                        $guidance_name        = $row['guidance_name'];
                        $address              = $row['address'];
                        $email                = $row['email'];  
                             
				}
				
	    
				
				///////////////////////////////////////////////////////////////////////////
                $this->query = " SELECT * FROM 1_school_reg  WHERE school_code = '$schoolCode'"; 
                $total_row = $this->total_row();
				$result = $this->query_result();

				foreach($result as $row)
				{
				 
				 
				     	$data[] = array(
				     	    
                                    'success'             =>  'ok', 
                                    'admincode'           =>  $row['admincode'],
                                    'marketer_code'       =>  $row['fadmin_code'],
                                    'fadmin_code'         =>  $row['fadmin_code'],
                                    'school_code'         =>  $row['school_code'],
                                    'school_name'         =>  $row['school_name'],
                                    'school_photo'        =>  $row['school_photo'],
                                    'school_logo'         =>  $row['school_logo'],
                                    'school_email'        =>  $row['school_email'],
                                    'school_password'     =>  $row['school_password'],
                                    'school_phone'        =>  $row['school_phone'],
                                    'school_address'      =>  $row['school_address'],
                                    'school_motor'        =>  $row['school_motor'],
                                    'school_bgcolor'      =>  $row['school_bgcolor'],
                                    'text_code'           =>  $row['text_code'],
                                    'school_week'         =>  $row['school_week'],
                                    'last_pay_date'       =>  $row['last_pay_date'],
                                    'bank_name'           =>  $row['bank_name'],
                                    'account_name'        =>  $row['account_name'],
                                    'account_number'      =>  $row['account_number'],
                                    'school_status'       =>  $row['school_status'],
                                    'schl_propritor_name' =>  $row['schl_propritor_name'],
                                    'schl_propritor_photo'=>  $row['schl_propritor_photo'],
                                    'schl_propritor_msg'  =>  $row['schl_propritor_msg'],
                                    'schl_head_name'      =>  $row['schl_head_name'],
                                    'schl_head_photo'     =>  $row['schl_head_photo'],
                                    'schl_head_msg'       =>  $row['schl_head_msg'],
                                    'date_reg'            =>  $row['date_reg'],
                                                                        
           //////////////////////////////////PARENT BLOCK /////////////////////////////
      
                                    'admin_code'         =>$admin_code,
                                    'sch_code'           =>$sch_code,
                                    'username'           =>$username,
                                    'parent_code'        =>$parent_code,
                                    'guidance_name'      =>$guidance_name,
                                    'address'            =>$address,
                                    'email'              =>$email,  

             //////////////////////////////////STUDENT BLOCK /////////////////////////////                                                    
                                                    
                                    'admincode'           =>  $admincode,
                                    'photo'               =>  $photo,
                                    'schl_stu_no'         =>  $schl_stu_no,
                                    'online_stu_id'       =>  $online_stu_id,
                                    'school_code'         =>  $school_code,
                                    'parent_code'         =>  $parent_code,
                                    'student_name'        =>  $student_name,
                                    'stu_gender'          =>  $stu_gender,
                                    'student_class'       =>  $student_class,
                                    'class_rep'           =>  $class_rep,
                                    'student_teacher'     =>  $student_teacher,
                                    'sub_status'          =>  $sub_status,
                                    'date'                =>  $date,                                                     
							);
									
		         }
 
	  return $data;
	 }
 


	 function FetchPaymentRefererence()
	 {
		 $result="";
		 
		 $curMonth = date("M");
		 $curYear  = date("Y");

		 $firstTerm  = ["Sep", "Oct", "Nov", "Dec"]; 
		 $secondTerm = ["Jan", "Feb", "Mar", "Apr"]; 
		 $thirdTerm  = ["May", "Jun", "Jul", "Aug"]; 

		 
		 if(in_array($curMonth, $firstTerm)){
			 
		   $result = "$curMonth $curYear First Term ";
		 
		 }else if(in_array($curMonth, $secondTerm)){
		  
		   $result = "$curMonth $curYear Second Term ";
		  
		 }elseif(in_array($curMonth, $thirdTerm)){
		 
		  $result =  "$curMonth $curYear Third Term ";
		 
		 } 
 
	         return $result;
		 
	 
	 }
	 
	 
 	
	 function ClosedTicket($team_lead)
	 {//SELECT DISTINCT country

		 $this->query = "SELECT * FROM `ticket`  WHERE `team_lead` = '$team_lead' AND `status` = 'close'";
  
		 $result = $this->total_row();
	  
		 return $result;
	 }
	 function OpenTicket($team_lead)
	 {//SELECT DISTINCT country

		 $this->query = "SELECT * FROM `ticket`  WHERE `team_lead` = '$team_lead' AND `status` = 'open'";
  
		 $result = $this->total_row();
	  
		 return $result;
	 }

	 function FetchTicket()
	 {//SELECT DISTINCT country

		 $this->query = "SELECT `ticket_id`,`unit`,`answered_date`,`subject`,`school_code` FROM `ticket`  WHERE  `status` = 'open' GROUP BY ticket_id ORDER BY `id` DESC";
  
		 $result = $this->query_result();
	  
		 return $result;
	 }
	 function FetchClosedTicket($team_lead)
	 {//SELECT DISTINCT country

		 $this->query = "SELECT `ticket_id`,`unit`,`answered_date`,`subject`,`school_code` FROM `ticket`  WHERE `team_lead` = '$team_lead' AND `status` = 'close' GROUP BY ticket_id ORDER BY `id` DESC";
  
		 $result = $this->query_result();
	  
		 return $result;
	 }
	 function FetchTicketByID($id)
	 {
		 $this->query = "SELECT * FROM `ticket` WHERE `ticket_id` = '$id' ORDER BY `id` DESC";
  
		 $result = $this->query_result();
	  
		 return $result;
	 }
		
	 

	 function AllRegisteredAdmin()
	 {
		  
		 $this->query ="SELECT * FROM  `1_school_admins`    ";
		 $output = $this->query_result();
   
		  
		 return $output;
	 }



 }
?>
 
 
 
 
 
 
 
 
 
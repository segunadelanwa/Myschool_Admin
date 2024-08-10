<?php
ob_start();
session_start();

 

require("../phpmailer/PHPMailerAutoload.php");
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
	
	
	
	function __construct()
	{
		
		require("../connect.php");
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
				
		      	$mail = new PHPMailer;

					//$mail->IsSMTP();

					//$mail->Host = 'smtp host';

					//$mail->Port = '587';

					//$mail->SMTPAuth = true;

					//$mail->Username = '';

					//$mail->Password = '';

					//$mail->SMTPSecure = '';
					$mail->SMTPDebug = 0;  
					$mail->setFrom('noreply@owambextra.com', 'MY SCHOOL APP');

					$mail->FromName = ' MY SCHOOL APP';
					
					$mail->AddReplyTo = 'surpport@owambextra.com';

					$mail->AddAddress($receiver_email, '');

					$mail->IsHTML(true);

					$mail->Subject = $subject;

					$mail->Body = $body;
					
					$mail->AddEmbeddedImage('images/logo.png', 'logo', 'images/logo.png'); 

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
			//////////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////////



			function AllStudent($school_code)
			{
				 
				$this->query ="SELECT * FROM `4_student_reg`WHERE `4_student_reg`.`school_code` = '$school_code'";
				$output = $this->query_result();
		  
				 
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
			function TeacherName($name)
			{
				 
				$this->query ="SELECT * FROM `2_teacher_reg` WHERE `2_teacher_reg`.`teacher_code` = '$name'";
				$output = $this->query_result();
				foreach($output as $row)
				{
				$guidance_name =	$row['fullname'];
				}
				 
				return $guidance_name;
			}



			function DisplayTeachersRow($name)
			{
				 
				 
				$this->query = "SELECT * FROM `2_teacher_reg`WHERE `2_teacher_reg`.`school_code` = '$name'";
		 
				$output = $this->query_result();
				 
				return $output;
			}

			function SchoolRevenue($schoolCode)
			{
				//number of active or paid student  * CBT TERM FEE
				$result = $this->ActiveStudent($schoolCode) * $this->AdminSettings();
				
                $output =  $result;

				return $output;
			}

			
			function MyUploadedExam($school_code,$username)
			{
				 
				 
				$this->query = "SELECT * FROM `50_question_table` WHERE school_code = '$school_code' AND teacher_code = '$username' AND cbt_status ='exam' ";
		 
				$output = $this->total_row();
				 
				return $output;
			}
			function MyUploadedTest($school_code,$username)
			{
				 
				 
				$this->query = "SELECT * FROM `50_question_table` WHERE school_code = '$school_code' AND teacher_code = '$username' AND cbt_status ='test' ";
		 
				$output = $this->total_row();
				 
				return $output;
			}

			function EachTeacherEarn($schoolCode)
			{
				//number of active or paid student  * CBT TERM FEE
				$result = $this->ActiveStudent($schoolCode) * $this->AdminSettings();
				//All SCHOOL TEACHERS TAKE 30%
                $out =  $result / 100 * 30;
                // ALL SCHOOL TEACHER EARN IS DIVIED BY NUMBER OF TEACHERS
				$teah = $this->TotalNumOfSchlTeachers($schoolCode);
                $output = $out / $teah;


				return $output;
			}

			function ExamAccessCode($access_code)
			{
 
		 
				$this->query = " SELECT * FROM  `exam_access_code` WHERE `exam_access_code`.`access_code` = '$access_code'   ";
				 
				$output = $this->total_row();
				 
				return $output;

			}
			function ActiveStudent($school_code)
			{
				 
				$this->query ="SELECT * FROM  `4_student_reg` WHERE school_code ='$school_code' AND sub_status='active' ";
				$output = $this->total_row(); 
				return $output;
			}

			function PassiveStudent($school_code)
			{
				 
				$this->query ="SELECT * FROM  `4_student_reg` WHERE school_code ='$school_code' AND sub_status='inactive' ";
				$output = $this->total_row(); 
				return $output;
			}
			
        	function UploadPhoto($location)
			{
				
			 
				
				
				if(!empty($this->filedata['name']))
				{
					//$extension = pathinfo($this->filedata['name'], PATHINFO_EXTENSION);
					
					$new_name = uniqid() . '.' . 'jpg';

					$_source_path = $this->filedata['tmp_name'];
					$type        = $this->filedata['type'];
					$image_size   = filesize($_source_path);

					$target_path = "../myschoolapp_api/$location/" . $new_name;
					if($type=='image/jpeg' || $type == 'image/png'){
						                  //41943040 5mb 
						if($image_size  < 125829120 )
						{

								if(@@move_uploaded_file($_source_path, $target_path))
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

			function AllRegisteredParent($school_code)
			{
				 
				$this->query ="SELECT * FROM  `3_parent_reg`  WHERE sch_code ='$school_code'  ";
				$output = $this->query_result();
		  
				 
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


			function FecthAllSubject()
			{
				 
				$this->query ="SELECT * FROM `40_all_subject`";
				$output = $this->query_result();
		  
				 
				return $output;
			}
 
 
 
			
			function ConfirmStudentExist($stuCode)
			{
				 
			 
					$this->query = "SELECT * FROM `4_student_reg` WHERE `4_student_reg`.`online_stu_id` = '$stuCode' "; 
					$output = $this->total_row();  
					return $output;
				 
			}

  
 
			function GetStudentSubject($online_stu_id)
			{
				$this->query = "SELECT * FROM `41_student_subjects` WHERE  `41_student_subjects`.`student_code` = '$online_stu_id' ";
		 
				$result = $this->query_result();
			 
				return $result;
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



			function GetAllSubjects()
			{
				$this->query = "SELECT * FROM `40_all_subject` ";
		 
				$result = $this->query_result();
			 
				return $result;
			}

			function FetchStudentInClass($school_code,$teacher_code)
			{
				 
				 
				$this->query = "SELECT * FROM `4_student_reg` WHERE teacher_code='$teacher_code' AND school_code = '$school_code' ";
		 
				$output = $this->total_row();
				 
				return $output;
			}



			function DisplayTotalSchoolParentRow($school_code)
			{
				 
				 
				$this->query = "SELECT * FROM `3_parent_reg` WHERE `3_parent_reg`.`sch_code` = '$school_code'";
		 
				$output = $this->total_row();
				 
				return $output;
			}

			function TotalNumOfSchlTeachers($school_code)
			{
				 
				$this->query ="SELECT * FROM  2_teacher_reg  WHERE school_code ='$school_code' ";
				$output = $this->total_row();
		  
				 
				return $output;
			}
			



			function TeacherEarn($schoolCode)
			{
				//number of active or paid student  * CBT TERM FEE
				$result = $this->ActiveStudent($schoolCode) * $this->AdminSettings();
				//All SCHOOL TEACHERS TAKE 30%
                $output =  $result / 100 * 30; 


				return $output;
			}
	
 

			function FecthSingleSubject($subject)
			{
				 
				$this->query ="SELECT * FROM 40_all_subject  WHERE sub_id ='$subject'";
				$output = $this->query_result();
				foreach($output as $row){ 
					$output =  $row['sub_title'];
				} 
			 
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
	 


			function ParentStudentList($parent_code,$school_code)
			{
				$this->query = "SELECT * FROM `4_student_reg` WHERE  parent_code = '$parent_code' AND  school_code = '$school_code' ";
		 
				$result = $this->query_result();
			 
				return $result;
			}
			function ParentStudentListCheck($parent_code,$school_code)
			{
				$this->query = "SELECT * FROM `4_student_reg` WHERE  parent_code = '$parent_code' AND  school_code = '$school_code' ";
				$result = $this->total_row();
			 
				return $result;
			}


			function TeacherStudentList($teacher_code)
			{
				$this->query = "SELECT * FROM `4_student_reg` WHERE  `4_student_reg`.`teacher_code` = '$teacher_code' ";
		 
				$result = $this->query_result();
			 
				return $result;
			}


			function TeacherStudentListCheck($teacher_code,$school_code)
			{
				$this->query = "SELECT * FROM `4_student_reg` WHERE  teacher_code = '$teacher_code' AND  school_code = '$school_code' ";
				$result = $this->total_row();
			 
				return $result;
			}

 

			function PaymentHistory($payee_id)
			{
				$this->query = "SELECT * FROM `trans_history` WHERE  `trans_history`.`trans_user` = '$payee_id' ";
		 
				$result = $this->query_result();
			 
				return $result;
			}
			function PaymentHistoryCount($payee_id,$school_code)
			{
				$this->query = "SELECT * FROM `trans_history` WHERE  trans_user = '$payee_id' AND  school_code = '$school_code' ";
		 
				$result = $this->total_row();
			 
				return $result;
			}



			function FetchPostReview($school_code)
			{
				$this->query = "SELECT * FROM `school_newsletter` WHERE `school_code` = '$school_code'";
		 
				$result = $this->query_result();
			 
				return $result;
			}
		
 
 

			function FetchPost($id,$school_code)
			{
				$this->query = "SELECT * FROM `school_newsletter` WHERE `school_code` = '$school_code' AND id = '$id'";
		 
				$result = $this->query_result();
			 
				return $result;
			}
			
 


 
	 
 
 }
?>
 
 
 
 
 
 
 
 
 
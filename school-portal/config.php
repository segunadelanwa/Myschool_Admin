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

 
  
			function send_email($receiver_email, $subject, $body,$sch_logo,$username,$school_name)
			{
				
		      	$mail = new PHPMailer;
 
					$mail->SMTPDebug = 0;  
					$mail->setFrom('noreply@hebzihubnigltd.com.ng', "$school_name"); 
					$mail->FromName = "$school_name"; 
					$mail->AddReplyTo = "$username";  
					$mail->AddAddress($receiver_email, '');

					$mail->IsHTML(true);

					$mail->Subject = $subject;

					$mail->Body = $body;
					
					$mail->AddEmbeddedImage("$sch_logo", 'logo', "$sch_logo");  
					$mail->AddEmbeddedImage('../all_photo/ai_welcome.png', 'logo2', 'all_photo/ai_welcome.png'); 
					$mail->AddEmbeddedImage('../all_photo/tea_p.png', 'logo3', 'all_photo/tea_p.png'); 
					
					$mail->Send();		
			}	
			function send_email_ticket($receiver_email, $subject, $body)
			{
				
		      	$mail = new PHPMailer;
 
					$mail->SMTPDebug = 0;  
					$mail->setFrom('noreply@hebzihubnigltd.com.ng', 'Ticket');  
					$mail->AddAddress($receiver_email, '');

					$mail->IsHTML(true);

					$mail->Subject = $subject;

					$mail->Body = $body; 
					
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

 
 

			function AllStudent($school_code)
			{
				 
				$this->query ="SELECT * FROM `4_student_reg`WHERE `4_student_reg`.`school_code` = '$school_code'";
				$output = $this->query_result();
		  
				 
				return $output;
			}
			function StartNewTerm($student_code)
			{
				 
				$this->query ="SELECT * FROM `4_student_reg`WHERE `4_student_reg`.`online_stu_id` = '$student_code'";
				 
				$result = $this->query_result();
				foreach($result as $row)
				{
				$test_status =	$row['test_status'];
				$exam_status =	$row['exam_status'];
				}

				 if($test_status == 'active' && $exam_status == 'active'){
                    $output = 'success';
				 }else{
					$output = 'inactive';
				 }
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
			function TeacherNameByEmail($name)
			{
				 
				$this->query ="SELECT * FROM `2_teacher_reg` WHERE `2_teacher_reg`.`username` = '$name'";
				$output = $this->query_result();
				foreach($output as $row)
				{
				$guidance_name =	$row['fullname'];
				}
				 
				return @@$guidance_name;
			}



			function DisplayTeachersRow($name)
			{
				 
				 
				$this->query = "SELECT * FROM `2_teacher_reg`WHERE `2_teacher_reg`.`school_code` = '$name'";
		 
				$output = $this->query_result();
				 
				return $output;
			}

			function DisplayTeachersRowCount($school_code)
			{
				 
				 
				$this->query = "SELECT * FROM `2_teacher_reg` WHERE `2_teacher_reg`.`school_code` = '$school_code'";
		 
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


				$dataInt = (int)$teacher_count;
				$result = $dataInt + 1;

				if($result  <= 9){
					$output = "TEA000$result";

				}else if($result > 9 && $result < 100){
					$output = "TEA00$result"; 
				
				 }else if($result > 99 && $result < 1000){
				 	$output = "TEA0$result";

				 }else if($result > 999 ){
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
			function FecthClassTeacher($school_code)
			{
				 
				$this->query ="SELECT * FROM `2_teacher_reg` WHERE `2_teacher_reg`.`school_code` = '$school_code' ";
				$output = $this->query_result();
		  				 
				return $output;
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


			function ParentNoGenerator()
			{
				$this->query = "SELECT * FROM settings  "; 
				$result = $this->query_result();
				foreach($result as $row){ 
					$parent_count  =  $row['parent_count'];
				}



				$dataInt = (int)$parent_count;
				$result = $dataInt + 1;

				if($result  <= 9){
					$output = "PAR000$result";

				}else if($result > 9 && $result < 100){
					$output = "PAR00$result"; 
				
				 }else if($result > 99 && $result < 1000){
				 	$output = "PAR0$result";

				 }else if($result > 999 ){
				 	$output = "PAR$result";
				 }


 

				return $output;
			}	
			
			
			function StudentNoGenerator()
			{
				$this->query = "SELECT * FROM settings  "; 
				$result = $this->query_result();
				foreach($result as $row){ 
					$stu_code_gen  =  $row['stu_code_gen'];
				}


				$dataInt = (int)$stu_code_gen;
				$result  = $dataInt + 1;

				if($result  <= 9){
					$output = "STU000$result";

				}else if($result > 9 && $result < 100){
					$output = "STU00$result"; 
				
				 }else if($result > 99 && $result < 1000){
				 	$output = "STU0$result";

				 }else if($result > 999 ){
				 	$output = "STU$result";
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
			
			function ConfirmStudentExist($stuCode)
			{
				 
			 
					$this->query = "SELECT * FROM `4_student_reg` WHERE `4_student_reg`.`online_stu_id` = '$stuCode' "; 
					$output = $this->total_row();  
					return $output;
				 
			}

			function SchoolNameExist($school_code)
			{
				 
				$this->query ="SELECT * FROM `1_school_reg` WHERE `1_school_reg`.`school_code` = '$school_code'";
				$total_row = $this->total_row();
	
					 return $total_row;
			 
				
			}

			function ConfirmTeacherExist($teacher_code)
			{
				 
			 
					$this->query = "SELECT * FROM `2_teacher_reg` WHERE `2_teacher_reg`.`teacher_code` = '$teacher_code' "; 
					$output = $this->total_row();  
					return $output;
				 
			}
   
			function DisplayTotalSchoolRow($school_code)
			{
				 
				 
				$this->query = "SELECT * FROM `4_student_reg` WHERE `4_student_reg`.`school_code` = '$school_code'";
		 
				$output = $this->total_row();
				 
				return $output;
			}

			function DisplayTotalSchoolParentRow($school_code)
			{
				 
				 
				$this->query = "SELECT * FROM `3_parent_reg` WHERE `3_parent_reg`.`sch_code` = '$school_code'";
		 
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
			
			function SchoolEarn($schoolCode)
			{
				//number of active or paid student  * CBT TERM FEE
				$result = $this->ActiveStudent($schoolCode) * $this->AdminSettings();
				// SCHOOL TAKES 20%
                $output =  $result / 100 * 20;

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


			//////////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////////


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
	
			
 			function ParentNameExist($parent_code)
			{
				 
				$this->query ="SELECT * FROM `3_parent_reg` WHERE `3_parent_reg`.`parent_code` = '$parent_code'";
				$output = $this->total_row();
 
				return $output;
			}
			
			

			function HeadTeacherEarn($schoolCode)
			{
				//number of active or paid student  * CBT TERM FEE
				$result = $this->ActiveStudent($schoolCode) * $this->AdminSettings();
				//HEAD TEACHERS TAKE 4%
                $output =  $result / 100 * 4;  
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
			function FetchTicket($school_code)
			{//SELECT DISTINCT country

				$this->query = "SELECT `status`,`ticket_id`,`unit`,`answered_date`,`subject` FROM `ticket`  WHERE `school_code` = '$school_code' GROUP BY ticket_id ORDER BY `id` DESC";
		 
				$result = $this->query_result();
			 
				return $result;
			}
			function FetchTicketByID($id,$school_code)
			{
				$this->query = "SELECT * FROM `ticket` WHERE `school_code` = '$school_code' AND `ticket_id` = '$id' ORDER BY `id` DESC";
		 
				$result = $this->query_result();
			 
				return $result;
			}
			function FetchPost($id,$school_code)
			{
				$this->query = "SELECT * FROM `school_newsletter` WHERE `school_code` = '$school_code' AND id = '$id'";
		 
				$result = $this->query_result();
			 
				return $result;
			}


			public function Generateslug($title)
			{
 
                  $slug = strtolower($title);
                  $slug = preg_replace('/[^a-z0-9-]+/','-', $slug);
                  $slug = trim($slug, '-');
              
                return $slug;		 
   	
	 
	 

			}
			public function GenerateTicket()
			{

				$rand = rand(100, 100000); 
				$auth_code = mb_strimwidth(time(), 4, 7); 
				$output = "SCH-$auth_code-$rand"; 
                
                return $output;		 
   	
	 
	 

			}




			function ParentResultDownload($parent_id, $token)
			{
				 
				$this->query ="SELECT * FROM `3_parent_reg` WHERE `3_parent_reg`.`parent_code` = '$parent_id' AND `3_parent_reg`.`token` = '$token'  AND `3_parent_reg`.`download_result` = 'active'";
				$output = $this->total_row(); 
				$result = $this->query_result();
				foreach($result as $row){ 
				$download_result =  $row['download_result'];
				} 
			 
				if($download_result == 'active'){
					return $download_result;
				}else if($download_result == 'inactive'){
					return $download_result;
				}else{
					return $output;
				}
				
			}


			function StudentName($studentCode)
			{
				 
				$this->query ="SELECT * FROM 4_student_reg  WHERE online_stu_id ='$studentCode'";
				$result = $this->query_result();
				foreach($result as $row){ 
					$student_name =  $row['student_name'];
				} 
			 
				return $student_name;
			}
			function DownloadStudentResultStatus($school_code)
			{
				 
				$this->query ="SELECT * FROM 1_school_reg  WHERE school_code ='$school_code'";
				$result = $this->query_result();
				foreach($result as $row){ 
					$output =  $row['download_result'];
				} 
			 
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

			function FetchSchemeOfWork($school_code)
			{
				$this->query = "SELECT * FROM `scheme_of_uploader` WHERE  `school_code` = '$school_code' ";
		 
				$result = $this->query_result();
			 
				return $result;
			}


			function FetchSchemeOfWorkEdit($school_code,$sow_id)
			{
				$this->query = "SELECT * FROM `scheme_of_uploader` WHERE `school_code` = '$school_code' AND  `id` = '$sow_id' ";
		 
				$result = $this->query_result();
			 
				return $result;
			}
		
 
			function FetchTeacherName($teacher_id)
			{
				 
				$this->query ="SELECT * FROM `2_teacher_reg` WHERE `teacher_code` = '$teacher_id' "; 
				$result = $this->query_result();
				foreach($result as $row){ 
					$fullname  =  $row['fullname'];
				} 
					return $output = $fullname;
				
				 
				
			}
			function FetchSubject($subject_id)
			{
				 
				$this->query ="SELECT * FROM `40_all_subject` WHERE `sub_id` = '$subject_id' "; 
				$result = $this->query_result();
				foreach($result as $row){ 
					$sub_title  =  $row['sub_title'];
				} 
					return $output = $sub_title;
				
				 
				
			}
			//////////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////////
			//////////////////////////////////////////////////////////////////////////////////////////



		
 
 

 
			
 


 
	 
 
 }
?>
 
 
 
 
 
 
 
 
 
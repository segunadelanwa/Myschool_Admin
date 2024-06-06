<?php
ob_start();
session_start();

 

require"phpmailer/PHPMailerAutoload.php";
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
		
		require"connect.php";
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
			$mail->setFrom('noreply@owambextra.com', 'GST MY SCHOOL APP');

			$mail->FromName = 'GST MY SCHOOL APP';
			
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
	
        	function Upload_SignPhoto()
			{
				
			 
				
				
				if(!empty($this->filedata['name']))
				{
					//$extension = pathinfo($this->filedata['name'], PATHINFO_EXTENSION);

					$new_name = uniqid() . '.' . 'jpg';

					$_source_path = $this->filedata['tmp_name'];

					$target_path = 'all_photo/' . $new_name;

					if(move_uploaded_file($_source_path, $target_path))
					{
						 	
						return $new_name;
						
					}else
					{
						
						return 0;
					}

					
				}
			}


			function AccessCodeVerify($access_code)
			{
 
		 
				$this->query = " SELECT * FROM  `login_table` WHERE `login_table`.`level_code` = '$access_code'   ";
				 
				$output = $this->query_result();
				 
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
   		
			function ConfirmStudentExist($school_code,$student_code)
			{
				 
				$this->query ="SELECT * FROM  `4_student_reg` WHERE school_code ='$school_code' AND schl_stu_no ='$student_code' ";
				$output = $this->total_row();
		  
				 
				return $output;
			}
   

  
			function DisplayFieldOpRow()
			{
				$this->query = "SELECT * FROM `2_field_operator_reg`";
		 
				$result = $this->total_row();
			 
				return $result;
			}


		
			function AllFieldMarketer()
			{
				 
				$this->query ="SELECT * FROM `0_marketer_reg`";
				$output = $this->query_result();
		  
				 
				return $output;
			}		
			
			function AllFieldAdmin()
			{
				 
				$this->query ="SELECT * FROM `2_field_operator_reg`";
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



			function AllRegisteredParent()
			{
				 
				$this->query ="SELECT * FROM  `3_parent_reg` ";
				$output = $this->query_result();
		  
				 
				return $output;
			}

			function SchoolMarketed($code)
			{
				 
				$this->query ="SELECT * FROM  `1_school_reg` WHERE marketer_code ='$code'";
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


			function DisplayAllStudentRow()
			{
				 
			 
				$this->query = "SELECT * FROM `4_student_reg` ";
		 
				$output = $this->total_row();
				 
				return $output;
			}


 			function DisplayMarketerRow()
			{
				 
				 
				$this->query = "SELECT * FROM `0_marketer_reg` ";
		 
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


			
			function GetStudentSubject($online_stu_id)
			{
				$this->query = "SELECT * FROM `41_student_subjects` WHERE  `41_student_subjects`.`student_code` = '$online_stu_id' ";
		 
				$result = $this->query_result();
			 
				return $result;
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
                                    'marketer_code'       =>  $row['marketer_code'],
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
 
 }
?>
 
 
 
 
 
 
 
 
 
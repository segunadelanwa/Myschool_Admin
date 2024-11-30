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
	var $agentEarn  = 40;
	
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

 
  
			function send_email($receiver_email, $subject, $body,$agent_firm_name)
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
					$mail->setFrom('noreply@hebzihubnigltd.com.ng', $agent_firm_name);

					$mail->FromName = 'HEBZIHUB NIG LTD';
					
					$mail->AddReplyTo = 'support@hebzihubnigltd.com.ng';

					$mail->AddAddress('support@hebzihubnigltd.com.ng', '');
					$mail->AddAddress($receiver_email, '');

					$mail->IsHTML(true);

					$mail->Subject = $subject;

					$mail->Body = $body;
					
					$mail->AddEmbeddedImage('../gen_img/logo_b.png', 'logo', '../gen_img/logo_b.png'); 
					$mail->AddEmbeddedImage('../all_photo/field-admin.png', 'logo2', '../all_photo/field-admin.png'); 
					$mail->AddEmbeddedImage('../all_photo/login.png', 'logo3', '../all_photo/login.png'); 

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

 
			function AdminSettings()
			{
				 
				$this->query ="SELECT * FROM  settings "; 
				$result = $this->query_result();
				foreach($result as $row){
				    
					$output =  $row['cbt_fee'];
				} 
				 
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

 
			function ActiveSchoolStudentEarn($school_code,$marketer_code)
			{
				 
				$this->query ="SELECT * FROM  `4_student_reg` WHERE school_code ='$school_code' AND sub_status='active'AND fadmin_code='$marketer_code' ";
				 
		  
				 				 
				$result =  $this->total_row() * $this->AdminSettings();
				
                $output =  $result / 100 * 4;  
				
				return $output ;//= 500;
			}

			function ActiveStudent($fadmin_code)
			{
				 
				$this->query ="SELECT * FROM  `4_student_reg` WHERE fadmin_code ='$fadmin_code' AND sub_status='active' ";
				$output = $this->total_row();
		  
				 
				return $output ;//= 500;
			}

			function PassiveStudent($school_code)
			{
				 
				$this->query ="SELECT * FROM  `4_student_reg` WHERE school_code ='$school_code' AND sub_status='inactive' ";
				$output = $this->total_row();
		  
				 
				return $output;
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



		
			function SchoolActivities($code)
			{
				 
				$this->query ="SELECT * FROM `1_school_reg` WHERE admincode = '$code' ";
				$output = $this->query_result();
		  
				 
				return $output;
			}

			function AllFieldAdmin($code)
			{
				 
				$this->query ="SELECT * FROM `0_marketer_reg` WHERE admincode = '$code' ";
				$output = $this->query_result();
		  
				 
				return $output;
			}
			function AllFieldAdminCount($code)
			{
				 
				$this->query ="SELECT * FROM `0_marketer_reg` WHERE admincode = '$code' ";
				$output = $this->total_row();
		  
				 
				return $output;
			}

			function SchoolMarketed($code)
			{
				 
				$this->query ="SELECT * FROM  `1_school_reg` WHERE admincode ='$code'";
				$output = $this->total_row();
		  
				 
				return $output;
			}

			function FieldAdminSchoolEarn($fadmin_code)
			{
				//number of active or paid student  * CBT TERM FEE
				$result = $this->ActiveStudent($fadmin_code) * $this->AdminSettings();
				//HEAD TEACHERS TAKE 4%
                $output =  $result / 100 * 4;  
				return $output;
			}
 
 
			function FieldAdminNetEarn($fadmin_code)
			{
				//$this->query ="SELECT * FROM  `4_student_reg` INNER JOIN `1_school_reg` ON `1_school_reg`.`fadmin_code` =  `4_student_reg`.`fadmin_code`  WHERE `4_student_reg`.`fadmin_code`='$fadmin_code' AND `4_student_reg`.`sub_status`='active' AND `1_school_reg`.`school_status` = 'active'  ";
				  $this->query ="SELECT * FROM  `4_student_reg` JOIN `1_school_reg` ON `1_school_reg`.`fadmin_code` = `4_student_reg`.`fadmin_code` WHERE `4_student_reg`.`fadmin_code`='$fadmin_code' AND `4_student_reg`.`sub_status`='active' AND `1_school_reg`.`school_status` = 'active'";
				 

				//  $arr = array($result);
				// return$sum = array_sum($arr);
				$result = $this->total_row()* $this->AdminSettings();
                $output =  $result / 100 * 4;  
				return $output;
			}


		 

			function SchoolStudentNummber($school_code)
			{
				 
				$this->query ="SELECT * FROM  `4_student_reg` WHERE school_code ='$school_code'  ";
				$output = $this->total_row();
		  
				 
				return $output;
			}

			function FadminOnboardedSchools($code)
			{
				 
				$this->query ="SELECT * FROM `1_school_reg` WHERE `1_school_reg`.`fadmin_code` = '$code'";
				$output = $this->query_result();
		  
				 
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


			function FetchBank()
			{
				 
				$this->query ="SELECT * FROM `bank_code`";
				$output = $this->query_result();
		  
				 
				return $output;
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


			function AllFieldAdminExist($name)
			{
				 
				$this->query ="SELECT * FROM `0_marketer_reg` WHERE  `0_marketer_reg`.`marketer_code` = '$name'";
				$output = $this->total_row();
		  
				 
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
 
			function FetchTicket($team_lead)
			{//SELECT DISTINCT country

				$this->query = "SELECT `ticket_id`,`unit`,`answered_date`,`subject`,`school_code` FROM `ticket`  WHERE `team_lead` = '$team_lead' AND `status` = 'open' GROUP BY ticket_id ORDER BY `id` DESC";
		 
				$result = $this->query_result();
			 
				return $result;
			}
			function FetchClosedTicket($team_lead)
			{//SELECT DISTINCT country

				$this->query = "SELECT `ticket_id`,`unit`,`answered_date`,`subject`,`school_code` FROM `ticket`  WHERE `team_lead` = '$team_lead' AND `status` = 'close' GROUP BY ticket_id ORDER BY `id` DESC";
		 
				$result = $this->query_result();
			 
				return $result;
			}
			function FetchTicketByID($id,$team_lead)
			{
				$this->query = "SELECT * FROM `ticket` WHERE `team_lead` = '$team_lead' AND `ticket_id` = '$id' ORDER BY `id` DESC";
		 
				$result = $this->query_result();
			 
				return $result;
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

			/////////////////////////////////////////////////
			/////////////////////////////////////////////////
			/////////////////////////////////////////////////
			/////////////////////////////////////////////////
			/////////////////////////////////////////////////
			/////////////////////////////////////////////////
			/////////////////////////////////////////////////


 
	 
 
 }
?>
 
 
 
 
 
 
 
 
 
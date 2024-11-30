<?php
				include("index_header.php");
				?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("../header.php");
		require("../topUrl.php");
		$year = date("Y");
		$month = date("M");
				if(isset($_GET["student_id"])){
		$student_id ='';
                   $studID = $_GET["student_id"];
				   
					if(!empty($studID))
					{
						$student_id = $_GET["student_id"];
					}else{
						$student_id = "";
					}
				
				}

		?>
			<title> 
		<?php echo$stu_name = $_GET["name"]; ?> Result
	</title>	
    </head>
	
 

	<script>
		function GoBackHandler(){
		history.go(-1)
		}	
	</script>
	
 

  <body class="sb-nav-fixed">

 	
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
				<?php
				require("dashboard_head.php");
				?>
        </nav>
	
	
	
       
		
        <div id="layoutSidenav">
		
            <div id="layoutSidenav_nav">

			<?php
				require("sidebar.php");
			?>
			 
				
		  </div>
           
		   <div id="layoutSidenav_content">
		   
                <main>
                    <div class="container-fluid">
					
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item" onclick="GoBackHandler();">Back</li>
                   
                            <li class="breadcrumb-item active" >Reset Student Exam</li>
                        </ol>
                  
					 
  
						   <div class="col-md-12">  
												
												<div class="card-body">
													
													<div class="table-responsive">
														
 
		   
		   
																<div id="otpResetbox" style="background-color:white; padding:50px;">
																		<?php
																			// 	if(isset($_GET["student_id"]))
																			// {
																				
																			// 	//REGISTERED SUBJECTS
																				
																			// 	$online_stu_id = trim($_GET["student_id"]) ;
																				
																			// 	$date_maintain = date('Y-m-d');
																			// 	$success=""; 
																			// 	$failed="";

																				
																								

																			// 			$Loader->query = "SELECT * FROM `4_student_reg` WHERE  `4_student_reg`.`online_stu_id` ='$online_stu_id' ";  
																			// 			$result_row = $Loader->total_row();
																			// 			$result_user_wallet = $Loader->query_result();
																			// 			foreach($result_user_wallet as $row){

																			// 				$photo          =  $row['photo'];      
																			// 				$parent_code    =  $row['parent_code'];   
																			// 				$school_code    =  $row['school_code'];   
																			// 				$student_name   =  $row['student_name'];   
																			// 				$schl_stu_no    =  $row['schl_stu_no'];   
																			// 				$online_stu_id  =  $row['online_stu_id'];   
																			// 				$student_class  =  $row['student_class'];   
																			// 				$sub_status     =  $row['sub_status'];   
																			// 				$stu_gender     =  $row['stu_gender'];   
																			// 				$date           =  $row['date'];   
																						
																			// 			}	

																			// 			$Loader->query = "SELECT * FROM `1_school_reg` WHERE  `1_school_reg`.`school_code` ='$school_code' ";  
																			// 			$result_user_wallet = $Loader->query_result();
																			// 			foreach($result_user_wallet as $row){

																			// 				$school_photo   =  $row['school_photo'];    
																			// 				$school_logo    =  $row['school_logo']; 
																			// 				$school_address =  $row['school_address'];     
																			// 				$school_motor   =  $row['school_motor'];     
																			// 				$school_phone   =  $row['school_phone'];     
																			// 				$school_email   =  $row['school_email'];     
																			// 				$school_website =  $row['school_website'];     
																			// 				$current_term   =  $row['current_term'];     
																			// 				$school_bgcolor =  $row['school_bgcolor'];     
																			// 				$text_color     =  $row['text_code'];     
																			// 				$session        =  $row['session'];     
																						
																			// 			}	


																			// 			// $api_object->query = "SELECT * FROM `student_exam_result` WHERE student_code = '143978' AND school_code ='SCH143091' "; 
																			// 			$Loader->query = "SELECT * FROM student_exam_result  WHERE student_code = '$online_stu_id'  "; 
																			// 			$result = $Loader->query_result();  
																			// 			foreach($result as $row) 
																			// 			{
																								

																								
																			// 						$term =  $row['term'];
																			// 						$date_session =  $row['date'];
																			// 						$stuExam_1 =  $row['sub_1'];
																			// 						$stuExam_2 =  $row['sub_2'];
																			// 						$stuExam_3 =  $row['sub_3']; 
																			// 						$stuExam_4 =  $row['sub_4'];
																			// 						$stuExam_5 =  $row['sub_5'];
																			// 						$stuExam_6 =  $row['sub_6'];
																			// 						$stuExam_7 =  $row['sub_7'];
																			// 						$stuExam_8 =  $row['sub_8'];
																			// 						$stuExam_9 =  $row['sub_9']; 
																			// 						$stuExam_10 =  $row['sub_10'];  
																			// 						$stuExam_11 =  $row['sub_11'];  
																			// 						$stuExam_12 =  $row['sub_12'];  
																			// 						$stuExam_13 =  $row['sub_13'];  
																			// 						$stuExam_14 =  $row['sub_14'];  
																			// 						$stuExam_15 =  $row['sub_15'];  
																			// 						$stuExam_16 =  $row['sub_16'];  
																			// 						$stuExam_17 =  $row['sub_17'];  
																			// 						$stuExam_18 =  $row['sub_18'];  
																			// 						$stuExam_19 =  $row['sub_19'];  
																			// 						$stuExam_20 =  $row['sub_20'];  
																			// 						$stuExam_21 =  $row['sub_21'];  
																			// 						$stuExam_22 =  $row['sub_22'];  
																			// 						$stuExam_23 =  $row['sub_23'];  
																			// 						$stuExam_24 =  $row['sub_24'];  
																			// 						$stuExam_25 =  $row['sub_25'];  
																			// 						$stuExam_26 =  $row['sub_26'];  
																			// 						$stuExam_27 =  $row['sub_27'];  
																			// 						$stuExam_28 =  $row['sub_28'];  
																			// 						$stuExam_29 =  $row['sub_29'];  
																			// 						$stuExam_30 =  $row['sub_30'];  
																			// 						$stuExam_31 =  $row['sub_31'];  
																			// 						$stuExam_32 =  $row['sub_32'];  
																			// 						$stuExam_33 =  $row['sub_33'];  
																			// 						$stuExam_34 =  $row['sub_34'];  
																			// 						$stuExam_35 =  $row['sub_35'];        
																			// 			}



																			// 			$Loader->query = "SELECT * FROM `student_test_result` WHERE student_code = '$online_stu_id' ";
																			// 			$result_que = $Loader->query_result();  
																			// 			foreach($result_que as $row_2) 
																			// 			{ 
																			// 				$stuTest_1 =  $row_2['sub_1'];
																			// 				$stuTest_2 =  $row_2['sub_2'];
																			// 				$stuTest_3 =  $row_2['sub_3']; 
																			// 				$stuTest_4 =  $row_2['sub_4'];
																			// 				$stuTest_5 =  $row_2['sub_5'];
																			// 				$stuTest_6 =  $row_2['sub_6'];
																			// 				$stuTest_7 =  $row_2['sub_7'];
																			// 				$stuTest_8 =  $row_2['sub_8'];
																			// 				$stuTest_9 =  $row_2['sub_9']; 
																			// 				$stuTest_10 =  $row_2['sub_10'];  
																			// 				$stuTest_11 =  $row_2['sub_11'];  
																			// 				$stuTest_12 =  $row_2['sub_12'];  
																			// 				$stuTest_13 =  $row_2['sub_13'];  
																			// 				$stuTest_14 =  $row_2['sub_14'];  
																			// 				$stuTest_15 =  $row_2['sub_15'];  
																			// 				$stuTest_16 =  $row_2['sub_16'];  
																			// 				$stuTest_17 =  $row_2['sub_17'];  
																			// 				$stuTest_18 =  $row_2['sub_18'];  
																			// 				$stuTest_19 =  $row_2['sub_19'];  
																			// 				$stuTest_20 =  $row_2['sub_20'];  
																			// 				$stuTest_21 =  $row_2['sub_21'];  
																			// 				$stuTest_22 =  $row_2['sub_22'];  
																			// 				$stuTest_23 =  $row_2['sub_23'];  
																			// 				$stuTest_24 =  $row_2['sub_24'];  
																			// 				$stuTest_25 =  $row_2['sub_25'];  
																			// 				$stuTest_26 =  $row_2['sub_26'];  
																			// 				$stuTest_27 =  $row_2['sub_27'];  
																			// 				$stuTest_28 =  $row_2['sub_28'];  
																			// 				$stuTest_29 =  $row_2['sub_29'];  
																			// 				$stuTest_30 =  $row_2['sub_30'];  
																			// 				$stuTest_31 =  $row_2['sub_31'];  
																			// 				$stuTest_32 =  $row_2['sub_32'];  
																			// 				$stuTest_33 =  $row_2['sub_33'];  
																			// 				$stuTest_34 =  $row_2['sub_34'];  
																			// 				$stuTest_35 =  $row_2['sub_35'];   
																									

																			// 			}


																			// 			$result_1  = intval($stuExam_1) + intval($stuTest_1); 
																			// 			$result_2  = intval($stuExam_2) + intval($stuTest_2); 
																			// 			$result_3  = intval($stuExam_3) + intval($stuTest_3);  
																			// 			$result_4  = intval($stuExam_4) + intval($stuTest_4); 
																			// 			$result_5  = intval($stuExam_5) + intval($stuTest_5); 
																			// 			$result_6  = intval($stuExam_6) + intval($stuTest_6); 
																			// 			$result_7  = intval($stuExam_7) + intval($stuTest_7); 
																			// 			$result_8  = intval($stuExam_8) + intval($stuTest_8); 
																			// 			$result_9  = intval($stuExam_9) + intval($stuTest_9);  
																			// 			$result_10 = intval($stuExam_10) + intval($stuTest_10);  
																			// 			$result_11 = intval($stuExam_11) + intval($stuTest_11);  
																			// 			$result_12 = intval($stuExam_12) + intval($stuTest_12);  
																			// 			$result_13 = intval($stuExam_13) + intval($stuTest_13);  
																			// 			$result_14 = intval($stuExam_14) + intval($stuTest_14);  
																			// 			$result_15 = intval($stuExam_15) + intval($stuTest_15);  
																			// 			$result_16 = intval($stuExam_16) + intval($stuTest_16);  
																			// 			$result_17 = intval($stuExam_17) + intval($stuTest_17);  
																			// 			$result_18 = intval($stuExam_18) + intval($stuTest_18);  
																			// 			$result_19 = intval($stuExam_19) + intval($stuTest_19);  
																			// 			$result_20 = intval($stuExam_20) + intval($stuTest_20);  
																			// 			$result_21 = intval($stuExam_21) + intval($stuTest_21);  
																			// 			$result_22 = intval($stuExam_22) + intval($stuTest_22);  
																			// 			$result_23 = intval($stuExam_23) + intval($stuTest_23);  
																			// 			$result_24 = intval($stuExam_24) + intval($stuTest_24);  
																			// 			$result_25 = intval($stuExam_25) + intval($stuTest_25);  
																			// 			$result_26 = intval($stuExam_26) + intval($stuTest_26);  
																			// 			$result_27 = intval($stuExam_27) + intval($stuTest_27);  
																			// 			$result_28 = intval($stuExam_28) + intval($stuTest_28);  
																			// 			$result_29 = intval($stuExam_29) + intval($stuTest_29);  
																			// 			$result_30 = intval($stuExam_30) + intval($stuTest_30);  
																			// 			$result_31 = intval($stuExam_31) + intval($stuTest_31);  
																			// 			$result_32 = intval($stuExam_32) + intval($stuTest_32);  
																			// 			$result_33 = intval($stuExam_33) + intval($stuTest_33);  
																			// 			$result_34 = intval($stuExam_34) + intval($stuTest_34);  
																			// 			$result_35 = intval($stuExam_35) + intval($stuTest_35); 
																						

																				
																						
																			// 			if($result_row == 1)
																			// 			{
																			// 				//$i=0;
																			// 					$result = $Loader->GetStudentSubject($online_stu_id);

																			// 				$schoolName = $Loader-> SchoolName($school_code);	
																			// 				$parent_name = $Loader-> ParentName($parent_code);

																						
																						
																			// 			echo $success =' 

																			// 			<div  class="card p-3 mb-5" style="background-color:'.$school_bgcolor.';color:'.$text_color.'">   
																			// 			<div style="display:flex;justify-content:space-around;text-align:left">   
																			// 			<div style="width:20%;"> <img src="../'.$SchoolIMG.'/'.$school_code.'/'.$school_logo.'"  style="height: 120px;width:120px" /> </div> 
																			// 			<div style="width:60%;"> 
																			// 			<div style="font-size: 30px;font-weight:bold">'.$schoolName.'</div>
																			// 			<p>'.$school_address.'<br>
																			// 			<span style="margin-right:20px">Tel:'.$school_phone.' </span>  <span>Motor: '.$school_motor.'</span> <br>
																			// 			<span style="margin-right:20px">Email:'.$school_email.' </span>  <span>Website:'.$school_website.' </span>
																			// 			</p>
																			// 			</div> 
																			// 			<div style="width:20%;"><img src="../'.$SchoolIMG.'/'.$school_code.'/'.$photo.'"  style="height: 120px;width:120px" /> </div>
																			// 			</div>
																			// 			</div>

																						   
																			// 			<div class="card p-3" style="">

																			// 						<div style="display:flex;font-size: 20px;justify-content:space-around;text-align:left;background-color:'.$school_bgcolor.';color:'.$text_color.'" class="btn mb-3">   
																			// 							<div style="width:10%;font-size:14px"> Student ID </div>
																			// 							<div style="width:20%;font-size:14px"> Student Name</div>
																			// 							<div style="width:10%;font-size:14px"> Class  </div>
																									
																			// 							<div style="width:10%;font-size:14px"> Gender </div>
																			// 							<div style="width:10%;font-size:14px"> Online ID </div>
																			// 							<div style="width:10%;font-size:14px"> Term  </div>
																			// 							<div style="width:20%;font-size:14px"> Session  </div>
																			// 						</div>

																									
																			// 						<div class="mb-4" style="width:100%">

																			// 								<div style="display:flex;font-size: 20px;justify-content:space-around;text-align:left" >   
																			// 								<div style="width:10%;font-size:14px"> '.$schl_stu_no.' </div>
																			// 								<div style="width:20%;font-size:14px;text-transform:capitalize"> '.$student_name.' </div>
																			// 								<div style="width:10%;font-size:14px;text-transform:capitalize"> '.$student_class.'  </div>
																											
																			// 									<div style="width:10%;font-size:14px">'.$stu_gender.' </div>
																			// 									<div style="width:10%;font-size:14px">'.$online_stu_id.' </div>
																			// 									<div style="width:10%;font-size:14px"> '.$current_term.' </div>
																			// 									<div style="width:20%;font-size:14px"> '.$session.' </div>
																			// 								</div>
																			// 						</div>
																			// 			</div>		
																			// 							<div style="text-align:center;font-wweight:bold;font-size:20px"> 
																			// 							<h2 style=" margin:20px;color:red">
																										 
																			// 							  RESET EXAMINATION  </h2>
																			// 							</div>


                                                                            //             <div class="card mb-5">
																			// 							<div style="display:flex;font-size: 20px;justify-content:space-around;text-align:left;background-color:'.$school_bgcolor.';color:'.$text_color.'" class="btn mb-3">   
																			// 							<div style="width:55%;"> Subjects </div>
																			// 							<div style="width:10%;text-align:center"> Exam  </div> 
																			// 							<div style="width:10%;text-align:center"> Submit </div>
																			// 							<div style="width:10%;text-align:center;">Grade </div>
																			// 							</div> ';



																			// 						foreach($result as $row)
																			// 						{
																									
																			// 						        $newOnlineId = $online_stu_id; 
 

																			// 								if(!empty($row['sub_1'])){ 
																											
																			// 								$grade     = $Loader->GradeCal($result_1); 
																			// 								$data      ='sub_1'; 
																			// 								$dataSub   = $row['sub_1']; 
																			// 								$stuExam   =$stuExam_1; 
																			// 								echo$data="
																			// 								<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 								<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 								<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																											
																			// 								<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 								<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 								</div>
																			// 								<hr>											  
																			// 								";

																			// 								}



																			// 								if(!empty($row['sub_2'])){ 
																			// 									$grade     = $Loader->GradeCal($result_2); 
																			// 									$data      ='sub_2'; 
																			// 									$dataSub   = $row['sub_2']; 
																			// 									$stuExam   =$stuExam_2; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}

																			// 								if(!empty($row['sub_3'])){ 
																			// 									$grade     = $Loader->GradeCal($result_3); 
																			// 									$data      ='sub_3'; 
																			// 									$dataSub   = $row['sub_3']; 
																			// 									$stuExam   =$stuExam_3; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}

																			// 								if(!empty($row['sub_4'])){ 
																			// 									$grade     = $Loader->GradeCal($result_4); 
																			// 									$data      ='sub_4'; 
																			// 									$dataSub   = $row['sub_4']; 
																			// 									$stuExam   =$stuExam_4; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";											  
																			// 								}

																			// 								if(!empty($row['sub_5'])){ 
																			// 									$grade     = $Loader->GradeCal($result_5); 
																			// 									$data      ='sub_5'; 
																			// 									$dataSub   = $row['sub_5']; 
																			// 									$stuExam   =$stuExam_5; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}

																			// 								if(!empty($row['sub_6'])){ 
																			// 									$grade     = $Loader->GradeCal($result_6); 
																			// 									$data      ='sub_6'; 
																			// 									$dataSub   = $row['sub_6']; 
																			// 									$stuExam   =$stuExam_6; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}

																											
																			// 								if(!empty($row['sub_7'])){ 
																			// 									$grade     = $Loader->GradeCal($result_7); 
																			// 									$data      ='sub_7'; 
																			// 									$dataSub   = $row['sub_7']; 
																			// 									$stuExam   =$stuExam_7; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}

																			// 								if(!empty($row['sub_8'])){ 
																			// 									$grade     = $Loader->GradeCal($result_8); 
																			// 									$data      ='sub_8'; 
																			// 									$dataSub   = $row['sub_8']; 
																			// 									$stuExam   =$stuExam_8; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_9'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_9); 
																			// 									$data      ='sub_9'; 
																			// 									$dataSub   = $row['sub_9']; 
																			// 									$stuExam   =$stuExam_9; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";											  
																			// 								}
																			// 								if(!empty($row['sub_10'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_10); 
																			// 									$data      ='sub_10'; 
																			// 									$dataSub   = $row['sub_10']; 
																			// 									$stuExam   =$stuExam_10; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";									  
																			// 								}
																			// 								if(!empty($row['sub_11'])){ 
																			// 									$grade     = $Loader->GradeCal($result_11); 
																			// 									$data      ='sub_11'; 
																			// 									$dataSub   = $row['sub_11']; 
																			// 									$stuExam   =$stuExam_11; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_12'])){ 
																			// 									$grade     = $Loader->GradeCal($result_12); 
																			// 									$data      ='sub_12'; 
																			// 									$dataSub   = $row['sub_12']; 
																			// 									$stuExam   =$stuExam_12; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_13'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_13); 
																			// 									$data      ='sub_13'; 
																			// 									$dataSub   = $row['sub_13']; 
																			// 									$stuExam   =$stuExam_13; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";											  
																			// 								}
																			// 								if(!empty($row['sub_14'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_14); 
																			// 									$data      ='sub_14'; 
																			// 									$dataSub   = $row['sub_14']; 
																			// 									$stuExam   =$stuExam_14; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";											  
																			// 								}
																			// 								if(!empty($row['sub_15'])){ 
																			// 									$grade     = $Loader->GradeCal($result_15); 
																			// 									$data      ='sub_15'; 
																			// 									$dataSub   = $row['sub_15']; 
																			// 									$stuExam   =$stuExam_15; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_16'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_16); 
																			// 									$data      ='sub_16'; 
																			// 									$dataSub   = $row['sub_16']; 
																			// 									$stuExam   =$stuExam_16; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";											  
																			// 								}
																			// 								if(!empty($row['sub_17'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_17); 
																			// 									$data      ='sub_17'; 
																			// 									$dataSub   = $row['sub_17']; 
																			// 									$stuExam   =$stuExam_17; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";											  
																			// 								}
																			// 								if(!empty($row['sub_18'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_18); 
																			// 									$data      ='sub_18'; 
																			// 									$dataSub   = $row['sub_18']; 
																			// 									$stuExam   =$stuExam_18; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";											  
																			// 								}
																			// 								if(!empty($row['sub_19'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_19); 
																			// 									$data      ='sub_19'; 
																			// 									$dataSub   = $row['sub_19']; 
																			// 									$stuExam   =$stuExam_19; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";											  
																			// 								}
																			// 								if(!empty($row['sub_20'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_20); 
																			// 									$data      ='sub_20'; 
																			// 									$dataSub   = $row['sub_20']; 
																			// 									$stuExam   =$stuExam_20; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";											  
																			// 								}
																			// 								if(!empty($row['sub_21'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_21); 
																			// 									$data      ='sub_21'; 
																			// 									$dataSub   = $row['sub_21']; 
																			// 									$stuExam   =$stuExam_21; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_22'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_22); 
																			// 									$data      ='sub_22'; 
																			// 									$dataSub   = $row['sub_22']; 
																			// 									$stuExam   =$stuExam_22; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";											  
																			// 								}
																			// 								if(!empty($row['sub_23'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_23); 
																			// 									$data      ='sub_23'; 
																			// 									$dataSub   = $row['sub_23']; 
																			// 									$stuExam   =$stuExam_23; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_24'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_24); 
																			// 									$data      ='sub_24'; 
																			// 									$dataSub   = $row['sub_24']; 
																			// 									$stuExam   =$stuExam_24; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";											  
																			// 								}
																			// 								if(!empty($row['sub_25'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_25); 
																			// 									$data      ='sub_25'; 
																			// 									$dataSub   = $row['sub_25']; 
																			// 									$stuExam   =$stuExam_25; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_26'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_26); 
																			// 									$data      ='sub_26'; 
																			// 									$dataSub   = $row['sub_26']; 
																			// 									$stuExam   =$stuExam_26; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_27'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_27); 
																			// 									$data      ='sub_27'; 
																			// 									$dataSub   = $row['sub_27']; 
																			// 									$stuExam   =$stuExam_27; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_28'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_28); 
																			// 									$data      ='sub_28'; 
																			// 									$dataSub   = $row['sub_28']; 
																			// 									$stuExam   =$stuExam_28; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																											
																			// 								if(!empty($row['sub_29'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_20); 
																			// 									$data      ='sub_20'; 
																			// 									$dataSub   = $row['sub_20']; 
																			// 									$stuExam   =$stuExam_20; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_30'])){ 
																			// 									$grade     = $Loader->GradeCal($result_30); 
																			// 									$data      ='sub_30'; 
																			// 									$dataSub   = $row['sub_30']; 
																			// 									$stuExam   =$stuExam_30; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";											  
																			// 								}
																			// 								if(!empty($row['sub_31'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_31); 
																			// 									$data      ='sub_31'; 
																			// 									$dataSub   = $row['sub_31']; 
																			// 									$stuExam   =$stuExam_31; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_32'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_32); 
																			// 									$data      ='sub_32'; 
																			// 									$dataSub   = $row['sub_32']; 
																			// 									$stuExam   =$stuExam_32; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";											  
																			// 								}
																			// 								if(!empty($row['sub_33'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_33); 
																			// 									$data      ='sub_33'; 
																			// 									$dataSub   = $row['sub_33']; 
																			// 									$stuExam   =$stuExam_33; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";											  
																			// 								}
																			// 								if(!empty($row['sub_34'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_34); 
																			// 									$data      ='sub_34'; 
																			// 									$dataSub   = $row['sub_34']; 
																			// 									$stuExam   =$stuExam_34; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_35'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_35); 
																			// 									$data      ='sub_35'; 
																			// 									$dataSub   = $row['sub_35']; 
																			// 									$stuExam   =$stuExam_35; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_36'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_36); 
																			// 									$data      ='sub_36'; 
																			// 									$dataSub   = $row['sub_36']; 
																			// 									$stuExam   =$stuExam_36; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_37'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_37); 
																			// 									$data      ='sub_37'; 
																			// 									$dataSub   = $row['sub_37']; 
																			// 									$stuExam   =$stuExam_37; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_38'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_38); 
																			// 									$data      ='sub_38'; 
																			// 									$dataSub   = $row['sub_38']; 
																			// 									$stuExam   =$stuExam_38; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_39'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_39); 
																			// 									$data      ='sub_39'; 
																			// 									$dataSub   = $row['sub_39']; 
																			// 									$stuExam   =$stuExam_39; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_40'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_40); 
																			// 									$data      ='sub_40'; 
																			// 									$dataSub   = $row['sub_40']; 
																			// 									$stuExam   =$stuExam_40; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_41'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_41); 
																			// 									$data      ='sub_41'; 
																			// 									$dataSub   = $row['sub_41']; 
																			// 									$stuExam   =$stuExam_41; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_42'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_42); 
																			// 									$data      ='sub_42'; 
																			// 									$dataSub   = $row['sub_42']; 
																			// 									$stuExam   =$stuExam_42; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_43'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_43); 
																			// 									$data      ='sub_43'; 
																			// 									$dataSub   = $row['sub_43']; 
																			// 									$stuExam   =$stuExam_43; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_44'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_44); 
																			// 									$data      ='sub_44'; 
																			// 									$dataSub   = $row['sub_44']; 
																			// 									$stuExam   =$stuExam_44; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_45'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_45); 
																			// 									$data      ='sub_45'; 
																			// 									$dataSub   = $row['sub_45']; 
																			// 									$stuExam   =$stuExam_45; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_46'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_46); 
																			// 									$data      ='sub_46'; 
																			// 									$dataSub   = $row['sub_46']; 
																			// 									$stuExam   =$stuExam_46; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_47'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_47); 
																			// 									$data      ='sub_47'; 
																			// 									$dataSub   = $row['sub_47']; 
																			// 									$stuExam   =$stuExam_47; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_48'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_48); 
																			// 									$data      ='sub_48'; 
																			// 									$dataSub   = $row['sub_48']; 
																			// 									$stuExam   =$stuExam_48; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_49'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_49); 
																			// 									$data      ='sub_49'; 
																			// 									$dataSub   = $row['sub_49']; 
																			// 									$stuExam   =$stuExam_49; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}
																			// 								if(!empty($row['sub_50'])){ 
																											
																			// 									$grade     = $Loader->GradeCal($result_50); 
																			// 									$data      ='sub_50'; 
																			// 									$dataSub   = $row['sub_50']; 
																			// 									$stuExam   =$stuExam_50; 
																			// 									echo$data="
																			// 									<div style='display:flex;font-size: 20px;justify-content:space-around;text-align:left'>   
																			// 									<div style='width:55%;text-transform:capitalize;'>  ".$dataSub."  </div>
																			// 									<div style='width:10%'  class='btn btn-white'> ".$stuExam." </div>
																												
																			// 									<div style='width:10%'  onclick='addSubject(\"$data\",\"$newOnlineId\")' class='btn btn-danger'>Reset</div>
																			// 									<div style='width:10%;font-size:18px'  class='btn' ><b> ".$grade." </b></div>
																			// 									</div>
																			// 									<hr>											  
																			// 									";										  
																			// 								}


																											

																								
																											
																			// 						}	
																									
																			// 		echo'</div>';	
																			// 						echo $data ='  
																			// 							<div class="card" tyle="display:flex;width:100%">
																										  

																			// 										<div style="display:flex;font-size: 20px;justify-content:space-around;text-align:left;background-color:'.$school_bgcolor.';color:'.$text_color.'" class="btn mb-3">   
																			// 											<div style="width:20%;font-size:14px"> Range Of Score </div>
																			// 											<div style="width:10%;font-size:14px"> Grade </div>
																			// 											<div style="width:20%;font-size:14px"> Remark  </div>
																													
																			// 											<div style="width:20%;font-size:14px"> Range Of Score </div>
																			// 											<div style="width:10%;font-size:14px"> Grade </div>
																			// 											<div style="width:20%;font-size:14px"> Remark  </div>
																			// 										</div>
																			// 					<div class="p-3">
																													
																			// 										<div class="mb-4" style="width:100%">

																			// 												<div style="display:flex;font-size: 20px;justify-content:space-around;text-align:left" >   
																			// 													<div style="width:20%;font-size:14px">75% - 100% </div>
																			// 													<div style="width:10%;font-size:14px"> A1 </div>
																			// 													<div style="width:20%;font-size:14px"> Excellent </div>
																															
																			// 													<div style="width:20%;font-size:14px">70% - 74% </div>
																			// 													<div style="width:10%;font-size:14px"> B2 </div>
																			// 													<div style="width:20%;font-size:14px"> very Good </div>
																			// 												</div>
																			// 										</div>
																												
																			// 										<div class="mb-4" style="width:100%">

																			// 												<div style="display:flex;font-size: 20px;justify-content:space-around;text-align:left" >   
																			// 													<div style="width:20%;font-size:14px">65% - 69% </div>
																			// 													<div style="width:10%;font-size:14px"> B3 </div>
																			// 													<div style="width:20%;font-size:14px">Good </div>
																															
																			// 													<div style="width:20%;font-size:14px">60% - 64% </div>
																			// 													<div style="width:10%;font-size:14px"> C4 </div>
																			// 													<div style="width:20%;font-size:14px"> Credit </div>
																			// 												</div>
																			// 										</div>
																													
																			// 										<div class="mb-4" style="width:100%">

																			// 												<div style="display:flex;font-size: 20px;justify-content:space-around;text-align:left" >   
																			// 													<div style="width:20%;font-size:14px">55% - 59% </div>
																			// 													<div style="width:10%;font-size:14px"> C5 </div>
																			// 													<div style="width:20%;font-size:14px"> Good </div>
																															
																			// 													<div style="width:20%;font-size:14px">50% - 54% </div>
																			// 													<div style="width:10%;font-size:14px"> C6 </div>
																			// 													<div style="width:20%;font-size:14px"> Credit </div>
																			// 												</div>
																			// 										</div>
																													
																			// 										<div class="mb-4" style="width:100%">

																			// 												<div style="display:flex;font-size: 20px;justify-content:space-around;text-align:left" >   
																			// 													<div style="width:20%;font-size:14px">45% - 49% </div>
																			// 													<div style="width:10%;font-size:14px"> D7 </div>
																			// 													<div style="width:20%;font-size:14px"> Fair </div>
																															
																			// 													<div style="width:20%;font-size:14px">40% - 45% </div>
																			// 													<div style="width:10%;font-size:14px"> E8 </div>
																			// 													<div style="width:20%;font-size:14px"> Pass </div>
																			// 												</div>
																			// 										</div>
																													
																			// 										<div class="mb-4" style="width:100%">

																			// 												<div style="display:flex;font-size: 20px;justify-content:space-around;text-align:left" >   
																			// 													<div style="width:20%;font-size:14px">0% - 39% </div>
																			// 													<div style="width:10%;font-size:14px"> F9 </div>
																			// 													<div style="width:20%;font-size:14px"> Fail </div>

																			// 													<div style="width:20%;font-size:14px"></div>
																			// 													<div style="width:10%;font-size:14px"></div>
																			// 													<div style="width:20%;font-size:14px"></div>
																															
																			// 												</div>
																			// 										</div>
																			// 							    </div>
																			// 							</div>
																			// 							';
																			// 			}
																			// 			else
																			// 			{
																							
																							
																			// 				echo $failed ='
																			// 							<div class="col-xl- col-md-6">
																			// 				<div class="alert alert-white alert-dismissible fade show" role="alert">
																			// 				<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
																											
																			// 								Invalid Online Student ID  inserted. Please check table below to get  Online Student ID
																											
																			// 				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																			// 				<span aria-hidden="true">&times;</span>
																			// 				</button>
																			// 				</div>  
																			// 		</div>';
																								
																							
																							
																							
																			// 			}
																						
																						
																			
																			// }

																		?>
																
																		<?php

																			$online_stu_id = trim($_GET["student_id"]);
																			include("../e_result_server.php");  
																			$ResultServer = new ResultServer();		

																			echo $ResultServer-> EserverStudentResetTest($online_stu_id)
																		?>
															</div>
			 
 

				   
													</div>
										
										</div>
										 
					  
	                       </div>

 
		  
				 
 
				  </div>
                </main>
               
			  
				
				
            </div>
			
        </div>
    
    
     
   
 
    </body>
</html>


<script>
     
 
		function addSubject(sub_id,stu_code) {
			
		

			
			
					$.ajax({
						url:"pageajax.php",
						method:"POST", 
						data:{
							resultType:'exam',       
							stu_online_id:stu_code,   
							subject_id:sub_id,   
							page:'subjectSetup',
							action:'resetStudentScore'
							}, 
						success:function(data)
						{  
						window.location.reload();
								
						}
					});	
		
		



		}
 </script>


 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 




<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
        require("../topUrl.php");
        include("index_header.php");
		require("../header.php");
		 
 

		
            
            $data_id     = $_GET['data_id'];
            $name       = $_GET['name'];  
            if(empty($data_id) && empty($name) ){
                
                header("Location: index.php");
            }


             if($name == 'field_admin'){
                $output = 'Field Admin';
				$Loader->query ="SELECT * FROM `0_marketer_reg` WHERE marketer_code = '$data_id'";
				$result = $Loader->query_result();
          
                    foreach($result as $row)
                    {

                    
                    $id             = $row['id'];  	 	
                    $admincode      = $row['admincode']; 		
                    $marketer_code  = $row['marketer_code']; 		
                    $photo          = $row['photo']; 		
                    $password       = $row['password'];  		
                    $username       = $row['username'];  		
                    $fullname       = $row['fullname']; 		
                    $phone          = $row['phone']; 	 
                    $address        = $row['address']; 	   	 
                    $acct_number    = $row['acct_number']; 		
                    $acct_name      = $row['acct_name']; 	
                    $bank_name      = $row['bank_name'];  
                    $password      = $row['password'];  
                    }
        }else if($name == 'parent'){
            $output = 'Parent Account';

            $Loader->query ="SELECT * FROM `3_parent_reg` WHERE parent_code = '$data_id'";
            $result = $Loader->query_result();
      
                foreach($result as $row)
                {

                
                $id             = $row['id'];  	 	
                $admin_code     = $row['admin_code']; 		
                $parent_code    = $row['parent_code']; 		
                $sch_code       = $row['sch_code'];   		
                $username       = $row['username'];  		
                $fullname       = $row['guidance_name']; 	 
                $address        = $row['address']; 	   	 
                $email          = $row['email']; 	  
                }
        
        }else if($name == 'student'){
            $output = 'Student Account';

            $Loader->query ="SELECT * FROM `4_student_reg` WHERE online_stu_id = '$data_id'";
            $result = $Loader->query_result();
      
                foreach($result as $row)
                { 
                $id             = $row['id'];  	   	  
                $photo          = $row['photo'];  	   	  
                $online_stu_id  = $row['online_stu_id'];  	   	  
                $schl_stu_no    = $row['schl_stu_no'];  	   	  
                $parent_code    = $row['parent_code'];  	   	  
                $school_code    = $row['school_code'];  	   	  
                $teacher_code   = $row['teacher_code'];  	   	  
                $school_fee     = $row['school_fee'];  	   	  
                $fullname       = $row['student_name'];  	   	  
                $stu_gender     = $row['stu_gender'];  	   	  
                $student_class  = $row['student_class'];  	   	  
                $class_rep      = $row['class_rep'];  	   	  
                }
        }else if($name == 'school'){
            
            $output = 'School Account';
            $Loader->query ="SELECT * FROM `1_school_reg` WHERE school_code = '$data_id'";
            $result = $Loader->query_result();
      
                foreach($result as $row)
                { 

                $id                    = $row['id'];  	   	  
                $fadmin_code           = $row['fadmin_code'];  	 	   	  
                $school_photo          = $row['school_photo'];  	 	   	  
                $school_name           = $row['school_name'];  	 	   	  
                $school_code           = $row['school_code'];  	 	   	  
                $school_logo           = $row['school_logo'];  	 	   	  
                $school_email          = $row['school_email'];  	 	   	  
                $school_website        = $row['school_website'];  	 	   	  
                $school_phone          = $row['school_phone'];  	 	   	  
                $school_address        = $row['school_address'];  	 	   	  
                $school_motor          = $row['school_motor'];  	 	   	  
                $school_bgcolor        = $row['school_bgcolor'];  	 	   	  
                $text_code             = $row['text_code'];  	 	   	  
                $school_week           = $row['school_week'];  	 	   	  
                $bank_name             = $row['bank_name'];  	 	   	  
                $account_name          = $row['account_name'];  	 	   	  
                $account_number        = $row['account_number'];  	 	   	  
                $schl_propritor_name   = $row['schl_propritor_name'];  	 	   	  
                $schl_propritor_photo  = $row['schl_propritor_photo'];  	 	   	  
                $schl_propritor_msg    = $row['schl_propritor_msg'];  	 	   	  
                $schl_head_name        = $row['schl_head_name'];  	 	   	  
                $schl_head_photo       = $row['schl_head_photo'];  	 	   	  
                $schl_head_msg         = $row['schl_head_msg'];  	 	   	  
                $exam_score            = $row['exam_score'];  	 	   	  
                $test_score            = $row['test_score'];  	 	   	  
                $exam_time             = $row['exam_time'];  	 	   	  
                $test_time             = $row['test_time'];  	 	   	  
                $current_term          = $row['current_term'];  	 	   	  
                $session               = $row['session'];  	 	   	  
   	   	  
                }
        
        }else if($name == 'teacher'){
            $output = 'Teacher Account';

            $Loader->query ="SELECT * FROM `2_teacher_reg` WHERE teacher_code = '$data_id'";
            $result = $Loader->query_result();
      
                foreach($result as $row)
                { 
                $id             = $row['id'];  	   	  
                $photo          = $row['photo'];  	   	  
                $school_code    = $row['school_code'];  	   	  
                $teacher_code   = $row['teacher_code'];  	   	  
                $username       = $row['username'];  	   	  
                $fullname       = $row['fullname'];  	   	  
                $gender         = $row['gender'];  	   	  
                $phone          = $row['phone'];  	   	  
                $address        = $row['address'];  	   	  
                $salary         = $row['salary'];  	   	  
                $subject        = $row['subject'];  	   	  
                $account_name   = $row['account_name'];  	   	  
                $account_number = $row['account_number'];  	   	  
                $bank_name      = $row['bank_name'];  	   	  
                $teacher_rank   = $row['teacher_rank'];  	   	  
   	   	  
                }

				$subJect = $Loader->FecthSingleSubject($subject);
        }else if($name == 'subject'){
          
            $Loader->query ="SELECT * FROM `40_all_subject` WHERE id = '$data_id'";
            $result = $Loader->query_result();
      
                foreach($result as $row)
                { 
                $id        = $row['id'];  	  	   	   	   	  
                $sub_id    = $row['sub_id'];  	  	   	   	   	  
                $sub_title = $row['sub_title'];  	   	   	   	  
   	   	  
                }
                $output = $sub_title;

				 	 
        }




?> 	
<title>Edit Data</title>
    </head>
 <script>
 function GoBackHandler(){
 history.go(-1)
 }
 </script>
    <body class="sb-nav-fixed">

 	
	<div id="modal" class="modal-backdrop loaderDisplayNone"  >  
			<?php
			require("../loader.php");
			?>
		
	</div>
 

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
                        <h3 class="mt-4">
						
						 Editing <?php echo $output; ?>  
						</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item" onclick="GoBackHandler()"> Back</li>
                            <li class="breadcrumb-item active"> <?php echo $output; ?></li>
                        </ol>
                  
					  

                       

						   <div class="col-xl-6"> 
						 

										<div class="card mb-4">
												<div class="card-header">
													<i class="fas fa-user"></i>
												  Fill all fields correctly
												</div>
												<div class="card-body">
													<div class="table-responsive">



														<?php
														
														if($name == 'field_admin'){
															$FielAdminNew = "../$FielAdmin/$photo";
															echo' <form method="POST"   id="user_register_form">
															

																<div class="form-group">
																<label>Field Admin ID </label>
																<input class="form-control py-4" value="'.$marketer_code.'"   type="text" name="fieldAdminCode" id="fieldAdminCode" class="form-control" readonly /> 
																</div>


																<div class="form-group">	
																<label>Username (email address)  </label>
																<input class="form-control py-4"  value="'.$username.'"   type="email" name="user_email_address" id="user_email_address" class="form-control"  readonly />

																</div>


																<div class="form-group">	
																<label>Field Admin Photo  </label>
																<img src="'.$FielAdminNew.'"  style="height:100px"> 
																<input class="form-control py-4"     type="file" name="field_operator_photo" id="field_operator_photo" class="form-control"    />
																<br/>
																</div>

														
																
																<div class="form-group">			
																<label>Fullname  </label>
																<input type="text" name="fullname"  value="'.$fullname.'"  id="fullname" class="form-control py-4"    />
																</div>


																<div class="form-group">			
																<label>Phone  </label>
																<input type="text" name="phone"  value="'.$phone.'"  id="phone" class="form-control py-4"    />
																</div>
																
																
																<div class="form-group">			
																<label>Home Address  </label>
																<input type="text" name="address"  value="'.$address.'"  id="address" class="form-control py-4"    />
																</div>



																<div class="form-group">			
																<label>Account Name  </label>
																<input type="text" name="acct_name"  value="'.$acct_name.'" id="acct_name" class="form-control py-4"   />
																</div>

																<div class="form-group">			
																<label>Account Number  </label>
																<input type="text" name="acct_number" value="'.$acct_number.'"  id="acct_number" class="form-control py-4"   />
																</div>

																<div class="form-group">			
																<label>Bank Name  </label>
																<input type="text" name="bank_name" value="'.$bank_name.'"  id="bank_name" class="form-control py-4"   />
																</div>

	
																	
																	
																		<input type="hidden" name="page"   value="updateUserData" />
																		<input type="hidden" name="action" value="field_admin" />

																		<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Update Data">
																	</div>
																</form>';
														}
														else if($name == 'parent'){
															echo'
																													
															<form method="POST"   id="user_register_form">
															
															
																<div class="form-group">
																<label>Parent Code</label>
																<input type="text" name="parent_code"  value="'.$parent_code.'" id="parent_code" class="form-control"  readonly/>
																</div>


																<div class="form-group">
																<label>School Code</label>
																<input type="text" name="sch_code"  value="'.$sch_code.'" id="sch_code" class="form-control"  readonly/>
																</div>

																<div class="form-group">			
																<label>Parent Fullname  </label>
																<input type="text" name="guidance_name"   value="'.$fullname.'"  id="guidance_name" class="form-control py-4"    />
																</div>



																<div class="form-group">			
																<label>Home Address    </label>
																<input type="text" name="home_address" value="'.$address.'"  id="home_address" class="form-control py-4"    />
																</div>


																
																<div class="form-group">	
																<label>Parent Phone </label>
																<input class="form-control py-4" value="'.$username.'"   type="text" name="parent_phone" id="parent_phone" class="form-control"   />

																</div>
	


																<div class="form-group">			
																<label>Parent email (optional)   </label>
																<input type="email" name="parent_email" value="'.$email.'"  id="parent_email" class="form-control py-4"     />
																</div>


		
																		
																		
																		<input type="hidden" name="page"   value="updateUserData" />
																		<input type="hidden" name="action" value="parent" />

																		<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Update">
																	</div>
																</form>
															';
														}
														else if($name == 'student'){
															$StuPhoto = "../$SchoolIMG/$school_code/$photo";
															echo'
																<form method="POST"   id="user_register_form">														  
																<div class="form-group">	
																<label>Student ID </label>
																<input class="form-control py-4" value="'.$online_stu_id.'"   type="text" name="student_code" id="student_code" class="form-control" readonly />
	
																</div>
	


																<div class="form-group">	
																<label>School Code </label>
																<input class="form-control py-4" value="'.$school_code.'"   type="text" name="school_code" id="school_code" class="form-control" readonly />

																</div>




																<div class="form-group">	
																<label>Parent Code </label>
																<input class="form-control py-4" value="'.$parent_code.'"   type="text" name="parent_code" id="parent_code" class="form-control"   />

																</div>


																<div class="form-group">	
																<label>Teacher Code </label>
																<input class="form-control py-4" value="'.$teacher_code.'"   type="text" name="teacher_code" id="teacher_code" class="form-control"   />

																</div>
																
							
																
																<div class="form-group">	
																<label>Student Photo   </label>
																<img src="'.$StuPhoto.'"  style="height:100px">
																<input class="form-control py-4"    type="file" name="student_photo" id="student_photo" class="form-control"   />

																</div>
																
																
																<div class="form-group">	
																<label>School Student No </label>
																<input class="form-control py-4" value="'.$schl_stu_no.'"   type="text" name="schl_stu_no" id="schl_stu_no" class="form-control"   />

																</div>
																

																



																<div class="form-group">	
																<label>Student Fullname </label>
																<input class="form-control py-4" value="'.$fullname.'"   type="text" name="student_name" id="student_name" class="form-control"  />

																</div>
																

																<div class="form-group">	
																<label>Student Gender </label>
															<select   name="stu_gender"  id="stu_gender" class="form-control "   >
																<option  value="'.$stu_gender.'"> '.$stu_gender.'  </option>
																<option>Male </option>
																<option>Female </option> 
																
																</select> 
																</div>
																
																
																
																
																<div class="form-group">	
																<label>Student Class </label>
																<input class="form-control py-4" value="'.$student_class.'"   type="text" name="student_class" id="student_class" class="form-control"  />

																</div>
																															
																<div class="form-group">	
																<label>Class Rep</label>
																<input class="form-control py-4" value="'.$class_rep.'"   type="text" name="class_rep" id="class_rep" class="form-control"  />

																</div>
																
																
					

	


																<div class="form-group">			
																<label>School Fee Status  </label>
																<select   name="payment_status"  id="payment_status" class="form-control "   >
																<option  value="'.$school_fee.'">Fully '.$school_fee.' </option>
																<option value="paid">Fully paid  </option>
																<option  value="unpaid">Unpaid/part paid  </option>  
																</select> 
																</div>


															
	

																<div class="form-group">	 
																<input type="hidden" name="tier1" value="tier1"  id="tier1" class="form-control"  />
																</div>


																<input type="hidden" name="page"   value="updateUserData" />
																<input type="hidden" name="action" value="student" />		

																
																<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Setup Student">
																		
																		
																	</div>
																</form>
															';
														}
														else if($name == 'teacher'){
															$StuPhoto = "../$SchoolIMG/$school_code/$photo";
															echo'
																
															<form method="POST"   id="user_register_form">
																<div class="form-group">
																<label>School Code</label>
																<input type="text" name="sch_code" value="'.$school_code.'"  id="sch_code" class="form-control"  readonly/>
																</div>

																<div class="form-group">	
																<label>Teacher Code </label>
																<input  type="text" class="form-control py-4" value="'.$teacher_code.'"   name="teacher_code" id="teacher_code" class="form-control" readonly />

																</div>


																<div class="form-group">	
																<label>Username (email address)  </label>
																<input class="form-control py-4" value="'.$username.'"   type="email" name="user_email_address" id="user_email_address" class="form-control"  readonly />

																</div>



																
																<div class="form-group">			
																<label>Teacher Photo  </label>
																<img src="'.$StuPhoto.'"  style="height:100px">
																<input type="file" name="field_operator_photo" placeholder="field_operator_photo"  id="photo" class="form-control py-4"     />
																</div>

														


																<div class="form-group">			
																<label>Fullname  </label>
																<input type="text" name="fullname" value="'.$fullname.'"  id="fullname" class="form-control py-4"    />
																</div>


																<div class="form-group">			
																<label>Gender  </label>
																<input type="text" name="gender" value="'.$gender.'"  id="gender" class="form-control py-4"    />
																</div>

																<div class="form-group">			
																<label>Phone  </label>
																<input type="text" name="phone" value="'.$phone.'"  id="phone" class="form-control py-4"    />
																</div>
																
																
																<div class="form-group">			
																<label>Home Address  </label>
																<input type="text" name="address" value="'.$address.'"  id="address" class="form-control py-4"    />
																</div>


																<div class="form-group">	
																<label>Teacher Subject </label>
																<select id="subject" name="subject" class="form-control" >
																<option disabled="disabled" selected="selected">'.$subJect.'</option>

																';		
																$result = $Loader-> FecthAllSubject();
																foreach($result as $data)
																{
																$sub_title=$data['sub_title'];
																$sub_id=$data['sub_id'];  
																echo"<option  value='$sub_id'> $sub_title </option>";
																}


																echo'	</select>	

																</div>



																<div class="form-group">	
																<label>Teacher Rank </label>
															<select   name="teacher_rank"  id="teacher_rank" class="form-control "   >
																<option  value="'.$teacher_rank.'"> '.$teacher_rank.'  </option>
																<option  value="teacher">Teaching staff </option>
																<option  value="head">Head teacher </option> 
																
																</select> 
																</div>
																

																<div class="form-group">			
																<label>Teacher Salary </label>
																<input type="number" name="salary" value="'.$salary.'" id="salary" class="form-control py-4"   />
																</div>

																

																<div class="form-group">			
																<label>Account Name  </label>
																<input type="text" name="acct_name" value="'.$account_name.'"  id="acct_name" class="form-control py-4"   />
																</div>

																<div class="form-group">			
																<label>Account Number  </label>
																<input type="text" name="acct_number" value="'.$account_number.'"  id="acct_number" class="form-control py-4"   />
																</div>

																<div class="form-group">			
																<label>Bank Name  </label>
																<input type="text" name="bank_name" value="'.$bank_name.'"   ="bank_name" class="form-control py-4"   />
																</div>

											
	
													
																	
																		<input type="hidden" name="page"   value="updateUserData" />
																		<input type="hidden" name="action" value="teacher" />

																		<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Update Data ">
																	</div>
																</form>
															';
														}
														else if($name == 'school'){

															$school_photo_img     ="../$SchoolIMG/$school_code/$school_photo";
															$school_logo_img      ="../$SchoolIMG/$school_code/$school_logo";
															$schl_head_photo_img  ="../$SchoolIMG/$school_code/$schl_head_photo";
															$img_propritor_photo  ="../$SchoolIMG/$school_code/$schl_propritor_photo";

														  echo'
															<form method="POST"   id="user_register_form">


															<div class="form-group">
																<label>School ID/Code </label>
																<input class="form-control py-4" value="'.$school_code.'"   type="text" name="school_id" id="school_id" class="form-control" readonly /> 
																</div>


			

															
																<div class="form-group">	
																<label>Field Admin Code  </label>
																<input class="form-control py-4" value="'.$fadmin_code.'"   type="text" name="marketer_code" id="marketer_code" class="form-control"  readonly />

																</div>

																


																<div class="form-group">	
																<label>School Name </label>
																<input class="form-control py-4" value="'.$school_name.'"   type="text" name="school_name" id="school_name" class="form-control"   />

																</div>

															
	


																<div class="form-group">	
																<label>School Photo   </label>
																<img src="'.$school_photo_img.'"  style="height:100px">
																<input class="form-control py-4"   type="file" name="school_photo" id="school_photo" class="form-control"   />

																</div>


																<div class="form-group">	
																<label>School Logo  </label>
																<img src="'.$school_logo_img.'"  style="height:100px">
																<input class="form-control py-4"   type="file" name="school_logo" id="school_logo" class="form-control"    />
																</div>

																<div class="form-group">	
																<label>School Email   </label>
																<input class="form-control py-4" value="'.$school_email.'"   type="email" name="school_email" id="school_email" class="form-control"   />
																</div>
																											
																<div class="form-group">	
																<label>School Website  </label>
																<input class="form-control py-4" value="'.$school_website.'"   type="text" name="school_website" id="school_website" class="form-control"   />
																</div>
																											
															
																
																<div class="form-group">			
																<label>School Phone  </label>
																<input type="text" name="school_phone" value="'.$school_phone.'"  id="school_phone" class="form-control py-4"     />
																</div>


																										
																
																<div class="form-group">			
																<label>School Address  </label>
																<input type="text" name="school_address" value="'.$school_address.'"  id="school_address" class="form-control py-4"     />
																</div>



																<div class="form-group">			
																<label>School Motor  </label>
																<input type="text" name="school_motor"   value="'.$school_motor.'"  id="school_motor" class="form-control py-4"    />
																</div>



																<div class="form-group">			
																<label>School BacKground Color  </label>
																<input type="text" name="school_bgcolor" value="'.$school_bgcolor.'"  id="school_bgcolor" class="form-control py-4"    />
																</div>
																
																

																<div class="form-group">			
																<label>Text Code  </label>
																<input type="text" name="text_code"     value="'.$text_code.'"  id="text_code" class="form-control py-4"    />
																</div>															

																<div class="form-group">			
																<label>School Week </label>
																<input type="text" name="school_week"   value="'.$school_week.'"  id="school_week" class="form-control py-4"    />
																</div>
																
																
															
																<div class="form-group">			
																<label>School Bank Name  </label>
																<input type="text" name="bank_name"    value="'.$bank_name.'"  id="bank_name" class="form-control py-4"    />
																</div>
																
																

																<div class="form-group">			
																<label>Account Name  </label>
																<input type="text" name="account_name" value="'.$account_name.'"  id="account_name" class="form-control py-4"    />
																</div>															


																<div class="form-group">			
																<label>Account Number</label>
																<input type="text" name="account_number" value="'.$account_number.'"  id="account_number" class="form-control py-4"    />
																</div>

														
													
													
																<div class="form-group">			
																<label>School Propritor/proprietress Name</label>
																<input type="text" name="schl_propritor_name" value="'.$schl_propritor_name.'"  id="schl_propritor_name" class="form-control py-4"   />
																</div>
													
													
																<div class="form-group">			
																<label>School Propritor/proprietress Photo</label>
																<img src="'.$img_propritor_photo.'"  style="height:100px">
																<input type="file" name="schl_propritor_photo" value="'.$schl_propritor_photo.'"  id="schl_propritor_photo" class="form-control py-4"    />
																</div>
	
													
													
																<div class="form-group">			
																<label>School Propritor/proprietress Message</label>
																<input type="text" name="schl_propritor_msg" value="'.$schl_propritor_msg.'"  id="schl_propritor_msg" class="form-control py-4"   />
																</div>

																							
																<div class="form-group">			
																<label>School Head Teachers Name</label>
																<input type="text" name="schl_head_name" value="'.$schl_head_name.'"  id="schl_head_name" class="form-control py-4"   />
																</div>
													
													
																<div class="form-group">			
																<label>School Head Teachers Photo</label>
																<img src="'.$schl_head_photo_img.'"  style="height:100px">
																<input type="file" name="schl_head_photo"   id="schl_head_photo" class="form-control py-4"    />
																</div>
	
													
													
																<div class="form-group">			
																<label>School Head Teachers Message</label>
																<input type="text" name="schl_head_msg" value="'.$schl_head_msg.'"  id="schl_head_msg" class="form-control py-4"   />
																</div><hr>



																<div class="form-group">			
																<label>Exam Score</label>
																<input type="number" name="exam_score" value="'.$exam_score.'"  id="exam_score" class="form-control py-4"  required />
																</div>


																<div class="form-group">			
																<label>Test Score</label>
																<input type="number" name="test_score" value="'.$test_score.'"  id="test_score" class="form-control py-4"  required />
																</div>

													
																<div class="form-group">			
																<label>Exam Time</label>
																<input type="number" name="exam_time" value="'.$exam_time.'"  id="exam_time" class="form-control py-4"  required />
																</div>

													
																	
																<div class="form-group">			
																<label>Test Time</label>
																<input type="number" name="test_time" value="'.$test_time.'"  id="test_time" class="form-control py-4"  required />
																</div>

													
													
																<div class="form-group">			
																<label>Current Term</label>
																<input type="text" name="current_term" value="'.$current_term.'"  id="current_term" class="form-control py-4"  required />
																</div>

													
													
																<div class="form-group">			
																<label>Session</label>
																<input type="text" name="session" value="'.$session.'"  id="session" class="form-control py-4"  required />
																</div>

													
													
																	
																		
																		<input type="hidden" name="page"   value="updateUserData" />
																		<input type="hidden" name="action" value="school" />

																		<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Update Data">
																	</div>
																</form>
														  ';
														}
														else if($name == 'subject'){
															echo'
															<form method="POST"   id="user_register_form">






															<div class="form-group">			
															<label>Add Subject    </label>
															<input type="text" name="subject" value="'.$sub_title.'"  id="subject" class="form-control py-4"   required />
															</div>







															<input type="hidden" name="sub_id"   value="'.$sub_id.'" />
															<input type="hidden" name="id"   value="'.$id.'" />
															<input type="hidden" name="page"   value="EditSubject" />
															<input type="hidden" name="action" value="EditSubject" />

															<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Update Subject">
															</div>
															</form>

															';
														}

														?>
													</div>
												</div>
														 
					 				
						 </div>
					  
	                    
		  
				 
				  </div>
                </main>
  
				
            </div>
        </div>
    
    
        <script src="../js/scripts.js"></script>
    
   
 
    </body>
</html>


<script>
 
 


 $(document).ready(function(){

  var elementmodal = document.getElementById('modal');


 

   

  $('#user_register_form').on('submit', function(event){
    event.preventDefault();



 


   
			  $.ajax({
				url:'../pageajax.php',
				method:"POST",
				data:new FormData(this),
				dataType:"json",
				contentType:false,
				cache:false,
				processData:false, 
				beforeSend:function()
				{
					
				elementmodal.classList.remove('loaderDisplayNone');
				elementmodal.classList.add('loaderDisplayblock');
				  
				},
				success:function(data)
				{
					 
					  
					  if(data.success == 'success')
						  {
							 
							elementmodal.classList.remove('loaderDisplayblock');
							elementmodal.classList.add('loaderDisplayNone');	
							   alert(data.feedback);
							 
							
					 
						  }else{
							   
							elementmodal.classList.remove('loaderDisplayblock');
							elementmodal.classList.add('loaderDisplayNone');	
							alert(data.feedback);
							//window.location.reload();

						   
						  }



				}
				
				
			  })
  

  });
	
});




</script>






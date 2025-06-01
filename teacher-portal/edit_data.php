
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
        require("../topUrl.php");
        include("index_header.php");
		require("../header.php");
		require("../header.php");
		 
 

		
            
            $data_id     = $_GET['data_id'];
            $name       = $_GET['name'];  
            if(empty($data_id) && empty($name) ){
                
                header("Location: index.php");
            }


     if($name == 'teacher')
	 {
            $output = "Teacher's Account";

            $Loader->query ="SELECT * FROM `2_teacher_reg` WHERE teacher_code = '$data_id'";
            $result = $Loader->query_result();
      
                foreach($result as $row)
                { 
                $id             = $row['id'];  	   	  
                $photo          = $row['photo'];  	   	  
                $sch_code       = $row['school_code'];  	   	  
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
        }
		else if($name == 'student')
		{
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
        }
        else if($name == 'comment')
		{
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
                $teacher_term_comment      = $row['teacher_term_comment'];  

                }
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
 

	<div>
			<?php
			require("dashboard_head.php");
			?>
	</div> 
		
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
						
						 Edit <?php echo $output; ?>  
						</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item" onclick="GoBackHandler()"> Back</li>
                            <li class="breadcrumb-item active"> <?php echo $output; ?></li>
                        </ol>
                  
					  

                       

						   <div class="col-xl-6"> 
						 

										<div class="card mb-4">
												<div class="card-header" style="text-align:center;font-size:20px">
													<i class="fas fa-user"></i>
												  <?php echo $fullname; ?>
												</div>
												<div class="card-body">
													<div class="table-responsive">



														<?php
														 
												 
													     if($name == 'teacher' && @$sch_code == $school_code)
														 {
															$StuPhoto = "../$SchoolIMG/$sch_code/$photo";
															$sub_title = $Loader-> FecthSingleSubject($subject);
															echo'
																
															<form method="POST"   id="user_register_form">
																<div class="form-group">
																<label>School Code</label>
																<input type="text" name="sch_code" value="'.$sch_code.'"  id="sch_code" class="form-control"  readonly/>
																</div>

																<div class="form-group">	
																<label>Teacher Code </label>
																<input  type="text" class="form-control" value="'.$teacher_code.'"   name="teacher_code" id="teacher_code" class="form-control" readonly />

																</div>


																<div class="form-group">	
																<label>Username (email address)  </label>
																<input class="form-control  " value="'.$username.'"   type="email" name="user_email_address" id="user_email_address" class="form-control"  readonly />

																</div>

															 

																<div class="form-group">
																<label>Teacher Subject</label>
																<input type="text"   value="'.$sub_title.'"   class="form-control"  readonly/>
																<input type="hidden" name="subject" value="'.$subject.'"  id="subject" class="form-control"  readonly/>
																</div>
																
																<div class="form-group">			
																<label>Teacher Photo  </label>
																<img src="'.$StuPhoto.'"  style="height:100px">
																<input type="file" name="field_operator_photo" placeholder="field_operator_photo"  id="photo" class="form-control"     />
																</div>

														


																<div class="form-group">			
																<label>Fullname  </label>
																<input type="text" name="fullname" value="'.$fullname.'"  id="fullname" class="form-control"    />
																</div>


																<div class="form-group">			
																<label>Gender  </label>
																<input type="text" name="gender" value="'.$gender.'"  id="gender" class="form-control"    />
																</div>

																<div class="form-group">			
																<label>Phone  </label>
																<input type="text" name="phone" value="'.$phone.'"  id="phone" class="form-control"    />
																</div>
																
																
																<div class="form-group">			
																<label>Home Address  </label>
																<input type="text" name="address" value="'.$address.'"  id="address" class="form-control"    />
																</div>


											 

 
																
																<div class="form-group">	
																
																		<label>Select Bank Name </label>
																		<select id="bank_name" name="bank_name" class="form-control" > 
																		<option  value="'.$bank_name.'"   selected="selected">'; echo $Loader->FetchBankName($bank_name); echo'</option>';
																			
																			$result = $Loader-> FetchBank();
																			foreach($result as $data)
																			{
																			$bank_name=$data['bank_name'];
																			$bank_code=$data['bank_code'];  
																			echo"<option  value='$bank_code'> $bank_name </option>";
																			}

																  echo' </select>	

																</div>
																<div class="form-group">			
																<label>Account Name  </label>
																<input type="text" name="acct_name" value="'.$account_name.'"  id="acct_name" class="form-control"   />
																</div>

																<div class="form-group">			
																<label>Account Number  </label>
																<input type="text" name="acct_number" value="'.$account_number.'"  id="acct_number" class="form-control"   />
																</div>

														 
											
	
													
																	
																		<input type="hidden" name="page"   value="updateUserData" />
																		<input type="hidden" name="action" value="teacher" />

																		<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Update Data ">
																	</div>
																</form>
															';
														 } 
														 else if($name == 'student'){
															$StuPhoto = "../$SchoolIMG/$school_code/$photo";
															echo'
																<form method="POST"   id="user_register_form">	
																<center><img src="'.$StuPhoto.'"  style="height:200px">	</center>												  
																<div class="form-group">	
																<label>Student ID </label>
																<input class="form-control" value="'.$online_stu_id.'"   type="text" name="student_code" id="student_code" class="form-control" readonly />
	
																</div>
	


																<div class="form-group">	 
																<input class="form-control" value="'.$school_code.'"   type="text" name="school_code" id="school_code" class="form-control" hidden />

																</div>




																<div class="form-group">	
																<label>Parent Code </label>
																<input class="form-control" value="'.$parent_code.'"   type="text" name="parent_code" id="parent_code" class="form-control"   readonly/>

																</div>


																<div class="form-group">	
																<label>Teacher\'s Code </label>
																<input class="form-control" value="'.$teacher_code.'"   type="text" name="teacher_code" id="teacher_code" class="form-control"   readonly/>

																</div>
																
							
																
																<div class="form-group">	
																<label>Student Photo   </label>
																
																<input class="form-control"    type="file" name="student_photo" id="student_photo" class="form-control"   />

																</div>
																
																
																<div class="form-group">	
																<label>School Student No </label>
																<input class="form-control" value="'.$schl_stu_no.'"   type="text" name="schl_stu_no" id="schl_stu_no" class="form-control"  hidden />

																</div>
																

																



																<div class="form-group">	
																<label>Student Fullname </label>
																<input class="form-control" value="'.$fullname.'"   type="text" name="student_name" id="student_name" class="form-control"  />

																</div>
																

																<div class="form-group">	
																<label>Student Gender </label>
															<select   name="stu_gender"  id="stu_gender" class="form-control "   >
																<option  value="'.$stu_gender.'"> '.$stu_gender.'  </option>
																<option>Male </option>
																<option>Female </option> 
																
																</select> 
																</div>
																 ';
																
																
																
																 if($school_type == 'primary')
																 {
																			 echo'
																																		 
																			 <div class="form-group">	
																			  <label>Student Class </label>
																			  <select  name="student_class" id="student_class"  class="form-control "    >
																			 <option  value="'.$student_class.'" selected="selected">'.$student_class.'</option>
																			 <option value="primary1">Primary 1 </option> 
																			 <option value="primary2">Primary 2 </option> 
																			 <option value="primary3">Primary 3 </option> 
																			 <option value="primary4">Primary 4 </option> 
																			 <option value="primary5">Primary 5 </option> 
																			 <option value="primary6">Primary 6 </option>  
																			 </select>
																			 </div>
																			 ';
																 }
																 else if($school_type == 'secondary')
																 {
																				 echo'
																																			 
																			 <div class="form-group">	
																			 <label>Student Class </label>
																			 <select  name="student_class" id="student_class"  class="form-control "    >
																			 <option  value="'.$student_class.'" selected="selected">'.$student_class.'</option>
																				 
																				 <option value="jss1">JSS 1 </option> 
																				 <option value="jss2">JSS 2 </option> 
																				 <option value="jss3">JSS 3 </option> 
																				 <option value="ss1">SS 1 </option> 
																				 <option value="ss2">SS 2 </option> 
																				 <option value="ss3">SS 3 </option>  
																				 </select>
																				 </div>
																				 ';
																 }
																															
																 
																 

																echo'<div class="form-group">			
																<label>Class Badge </label>
																<select   name="class_rep"  id="class_rep" class="form-control "   >
																<option  value="'.$class_rep.'">'.$class_rep.' </option>
																<option value="Captain">Class Captain  </option>
																<option  value="Regular">Regular  </option>  
																</select> 
																</div>


																<div class="form-group">			
																 
																<select   name="payment_status"  id="payment_status" class="form-control "  hidden >
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

																
																<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Update Data">
																		
																		
																	</div>
																</form>
															';
														 }
														 else if($name == 'comment'){
															$StuPhoto = "../$SchoolIMG/$school_code/$photo";
															echo'
																<form method="POST"   id="user_register_form">	
																<center><img src="'.$StuPhoto.'"  style="height:200px">	</center>												  
																<div class="form-group">	
																<label>Student ID </label>
																<input class="form-control" value="'.$online_stu_id.'"   type="text" name="student_code" id="student_code" class="form-control" readonly />
	
																</div>
	


																<div class="form-group">	 
																<input class="form-control" value="'.$school_code.'"   type="text" name="school_code" id="school_code" class="form-control" hidden />

																</div>




																<div class="form-group">	
																<label>Parent Code </label>
																<input class="form-control" value="'.$parent_code.'"   type="text" name="parent_code" id="parent_code" class="form-control"   readonly/>

																</div>


																<div class="form-group">	
																<label>Teacher\'s Code </label>
																<input   value="'.$teacher_code.'"   type="text" name="teacher_code" id="teacher_code" class="form-control"   readonly/>

																</div>

																<div class="form-group">	
																<label>Teacher\'s Comment </label>
											                     <textarea  class="form-control" value="'.$teacher_term_comment.'" name="teacher_comment" id="teacher_comment">'.$teacher_term_comment.''.$fullname.'</textarea>
																</div>
														 
									 
												 

							 


																<input type="hidden" name="page"   value="updateUserData" />
																<input type="hidden" name="action" value="comment" />		

																
																<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Update Data">
																		
																		
																	</div>
																</form>
															';
														 }
														 else
														 {
															
															
															echo $failed ='
																		<div class="col-xl- col-md-6">
															<div class="alert alert-danger alert-dismissible fade show" role="alert">
															<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
																		   
																		 Invalid URL. 
																		 
															<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
															</div>  
															</div>';
															 
															
															
															
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
				url:'pageajax.php',
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
							 window.location='index.php';
							
					 
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







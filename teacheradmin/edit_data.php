
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


     if($name == 'teacher'){
            $output = 'Teacher Account';

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
														
												 
													     if($name == 'teacher' && @$sch_code == $school_code){
															$StuPhoto = "../$SchoolIMG/$sch_code/$photo";
															echo'
																
															<form method="POST"   id="user_register_form">
																<div class="form-group">
																<label>School Code</label>
																<input type="text" name="sch_code" value="'.$sch_code.'"  id="sch_code" class="form-control"  readonly/>
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
																<option disabled="disabled"  value='.$subject.'selected="selected">'.$subJect.'</option>

																';		
																$result = $Loader-> FecthAllSubject();
																foreach($result as $data)
																{ 
																echo"<option  value=".$data['sub_id']."> ".$data['sub_title']." </option>";
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
														else if($name == 'school' && @$sch_code == $school_code){

															$school_photo_img     ="../$SchoolIMG/$sch_code/$school_photo";
															$school_logo_img      ="../$SchoolIMG/$sch_code/$school_logo";
															$schl_head_photo_img  ="../$SchoolIMG/$sch_code/$schl_head_photo";
															$img_propritor_photo  ="../$SchoolIMG/$sch_code/$schl_propritor_photo";

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
																<label>School Theme Background Color  </label>
																<input type="text" name="school_bgcolor" value="'.$school_bgcolor.'"  id="school_bgcolor" class="form-control py-4"    />
																</div>
																
																

																<div class="form-group">			
																<label> School Theme Text Color  </label>
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
							 window.location.reload();
							
					 
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







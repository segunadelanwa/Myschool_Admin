
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		require("../header.php");
		?>
			
    </head>
	
		<?php
		require("index_header.php");
		?>
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
                        <h1 class="mt-4">
						
						New School Setup
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active"> New School Registeration</li>
                        </ol>
                  
					  

                       

						   <div class="col-xl-6"> 
						 

										<div class="card mb-4">
												<div class="card-header">
													<i class="fas fa-user"></i>
												  SCHOOL INFO
												</div>
												<div class="card-body">
													<div class="table-responsive">
														  <form method="POST"   id="user_register_form">


														  <div class="form-group">
														      <label>New School ID/Code </label>
															  <input class="form-control py-4" value="<?php echo$result=$Loader->SchoolNoGenerator(); ?>"   type="text" name="school_id" id="school_id" class="form-control" readonly /> 
															  </div>


															<div class="form-group">			
															<label>Account Officer Code</label>
															<input type="text" name="registrar" value="<?php echo $admincode; ?>"  id="registrar" class="form-control py-4" Readonly />
															</div>


														  
															<div class="form-group">	
															<label>Field Admin Code  </label>
                                                            <input class="form-control py-4" placeholder="Marketer code"   type="text" name="marketer_code" id="marketer_code" class="form-control"  required />

															</div>

														 

															<div class="form-group">	
															<label> School Name  </label>
                                                            <input class="form-control py-4" placeholder="School Name"   type="text" name="school_name" id="school_name" class="form-control" required />

															</div>



															<div class="form-group">	
															<label>School Photo   </label>
                                                            <input class="form-control py-4" placeholder="School Name"   type="file" name="school_photo" id="school_photo" class="form-control" required />

															</div>


															<div class="form-group">	
															<label>School Logo  </label>
                                                            <input class="form-control py-4" placeholder="school_logo"   type="file" name="school_logo" id="school_logo" class="form-control"  required />
															</div>

															<div class="form-group">	
															<label>School Email   </label>
                                                            <input class="form-control py-4" placeholder="School Name"   type="email" name="school_email" id="school_email" class="form-control"  required/>
															</div>

															<div class="form-group">	
															<label>School Website  (optional) </label>
                                                            <input class="form-control py-4" placeholder="School Name"   type="text" name="website" id="website" class="form-control"   />
															</div>

															<div class="form-group">
															<label>School Default Password</label>
															<input type="text" name="school_password" value="000000"  id="school_password" class="form-control" required Readonly/>
															</div>
															
															<div class="form-group">			
															<label>School Phone  </label>
															<input type="text" name="school_phone" placeholder="School Phone"  id="school_phone" class="form-control py-4"   required />
															</div>


	                                                                                                  
															
															<div class="form-group">			
 															<label>School Address  </label>
															<input type="text" name="school_address" placeholder="School Address"  id="school_address" class="form-control py-4"   required />
															</div>



															<div class="form-group">			
															<label>School Motor  </label>
															<input type="text" name="school_motor" placeholder="Account name"  id="school_motor" class="form-control py-4"  required />
															</div>

																<div class="card-header mt-5 mb-3">
																<i class="fas fa-tag"></i>
																APPLICATION SETTINGS
																</div>

															<div class="form-group">			
															<label>School Background Color  </label>
															<input type="text" name="school_bgcolor" placeholder="School BacKground Color"  id="school_bgcolor" class="form-control py-4"  required />
															</div>
															
															

															<div class="form-group">			
															<label>Text Code  </label>
															<input type="text" name="text_code" placeholder="Text Code"  id="text_code" class="form-control py-4"  required />
															</div>															

															<div class="form-group">			
															<label>School Week </label>
															<input type="text" name="school_week" placeholder="Text Code"  id="school_week" class="form-control py-4"  required />
															</div>
															
															
															<div class="card-header mt-5 mb-3">
																<i class="fas fa-tag"></i>
																SCHOOL BANK DETAILS
														    </div>		
															
															
														 
															
															<div class="form-group">	
																
																<label>School Bank Name </label>
																<select id="bank_name" name="bank_name" class="form-control" > 

																<?php		
																$result = $Loader-> FetchBank();
																foreach($result as $data)
																{
																$bank_name=$data['bank_name'];
																$bank_code=$data['bank_code'];  
																echo"<option  value='$bank_code'> $bank_name </option>";
																}

                                                                 ?>

																</select>	

															</div>

															<div class="form-group">			
															<label>Account Name  </label>
															<input type="text" name="account_name" placeholder="Account Name"  id="account_name" class="form-control py-4"  required />
															</div>															

															<div class="form-group">			
															<label>Account Number</label>
															<input type="text" name="account_number" placeholder="Account Number"  id="account_number" class="form-control py-4"  required />
															</div>

												 
															 
															<div class="card-header mt-5 mb-3">
																<i class="fas fa-tag"></i>
																SCHOOL PROPRIETOR DETAILS
														    </div>													 
												 
															<div class="form-group">			
															<label>School Propritor/proprietress Name</label>
															<input type="text" name="schl_propritor_name" placeholder="School Propritor Name"  id="schl_propritor_name" class="form-control py-4"  required />
															</div>
												 
												 
															<div class="form-group">			
															<label>School Propritor/proprietress Photo</label>
															<input type="file" name="schl_propritor_photo" placeholder="School Propritor Photo"  id="schl_propritor_photo" class="form-control py-4"  required />
															</div>
 
												 
												 
															<div class="form-group">			
															<label>School Propritor/proprietress Message</label>
															<input type="text" name="schl_propritor_msg" placeholder="School Propritor Message"  id="schl_propritor_msg" class="form-control py-4"  required />
															</div>

															<div class="card-header mt-5 mb-3">
																<i class="fas fa-tag"></i>
																SCHOOL HEAD TEACHER DETAILS
														    </div>	
															
															
															<div class="form-group">			
															<label>School Head Teachers Name</label>
															<input type="text" name="schl_head_name" placeholder="School Head Name"  id="schl_head_name" class="form-control py-4"  required />
															</div>
												 
												 
															<div class="form-group">			
															<label>School Head Teachers Photo</label>
															<input type="file" name="schl_head_photo" placeholder="School Head Photo"  id="schl_head_photo" class="form-control py-4"  required />
															</div>
 
												 
												 
															<div class="form-group">			
															<label>School Head Teachers Message</label>
															<input type="text" name="schl_head_msg" placeholder="School Head Message"  id="schl_head_msg" class="form-control py-4"  required />
															</div>

												
															<div class="card-header mt-5 mb-3">
																<i class="fas fa-tag"></i>
																SCHOOL ACTIVITIES DETAILS
														    </div>	

															<div class="form-group">			
																<label>Exam Score</label>
																<input type="number" name="exam_score" placeholder="0"  id="exam_score" class="form-control py-4"  required />
																</div>


																<div class="form-group">			
																<label>Test Score</label>
																<input type="number" name="test_score" placeholder="0"  id="test_score" class="form-control py-4"  required />
																</div>

													
																<div class="form-group">			
																<label>Exam Time</label>
																<input type="number" name="exam_time" placeholder="0"  id="exam_time" class="form-control py-4"  required />
																</div>

													
																	
																<div class="form-group">			
																<label>Test Time</label>
																<input type="number" name="test_time" placeholder="0"  id="test_time" class="form-control py-4"  required />
																</div>

													
													
																<div class="form-group ">
																<label> Current Term</label>
																<select   id="current_term"  name="current_term"   class="form-control" >
																	<option value="" selected="selected">-- Select current term--</option>   
																	<option value="First Term">First Term</option>   
																	<option value="Second Term">Second Term</option>   
																	<option value="Third Term">Third Term</option>     
																</select>
															</div>
													
													
													
																<div class="form-group">			
																<label>Session</label>
																<input type="text" name="session" placeholder="session"  id="session" class="form-control py-4"  required />
																</div>


															<div class="form-group">	 
															<input type="hidden" name="tier1" value="tier1"  id="tier1" class="form-control" required />
															</div>

 
												 
																   
																	
																	<input type="hidden" name="page"   value='admin_signup_page' />
																	<input type="hidden" name="action" value="school_signup_action" />

																	<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Signup New School">
																</div>
															</form>
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


 

  $('#user_register_form').parsley();

  $('#user_register_form').on('submit', function(event){
    event.preventDefault();



    $('#phone_no').attr('required', 'required');

    $('#gender').attr('required', 'required');

    $('#department').attr('required', 'required');

 


    if($('#user_register_form').parsley().validate())
    {
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
							  // window.location="../";
							
					 
						  }else{
							   
							elementmodal.classList.remove('loaderDisplayblock');
							elementmodal.classList.add('loaderDisplayNone');	
							alert(data.feedback);
							//window.location.reload();

						   
						  }



				}
		
      })
    }

  });
	
});


/*
$(document).ready(function(){

  
  $('#user_profile_todo').parsley();
 
 
 $('#user_profile_todo').on('submit', function(event){
	        
	alert("Clicked");	  
		  
    event.preventDefault();

    $('#phone_no').attr('required', 'required');

    $('#gender').attr('required', 'required');

    $('#department').attr('required', 'required');

      $.ajax({
        url:"../pageajax.php", 
        method:"POST",
        data:new FormData(this),
        dataType:"json",
        contentType:false,
        cache:false,
        processData:false,
        beforeSend:function()
        {
			
		   // btn.innerHTML = '<div class="loader-bg">  <div class="loader-bar">  </div>  </div>';
          $('#admin_signup').attr('disabled', 'disabled');
		  $('#admin_signup').addClass('btn-info');
          $('#admin_signup').val('Please wait...');
		  
        },
        success:function(data)
        {
          if(data.success)
          {
			     alert(data.feedback);
				location.href='index.php'; 
          }
          else
          {
              alert(data.feedback);
		 
          }


        }
      })
    

  });


 
});
*/

</script>






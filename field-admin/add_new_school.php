
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
															<label>Account Officer Code</label>
															<input type="text" name="registrar" value="<?php echo $admincode; ?>"  id="registrar" class="form-control " Readonly />
															</div>


														  
															<div class="form-group">	
															<label>Field Admin ID/Code  </label>
                                                            <input class="form-control " value="<?php echo $marketer_code; ?>"    type="text" name="marketer_code" id="marketer_code" class="form-control"  Readonly />

															</div>

															<div class="form-group">
															<label>New School ID/Code </label>
															<input class="form-control " value="<?php echo$result=$Loader->SchoolNoGenerator(); ?>"   type="text" name="school_id" id="school_id" class="form-control" readonly /> 
															</div>														 

															<div class="form-group">	
															<label> School Name  </label>
                                                            <input class="form-control " placeholder="School Name"   type="text" name="school_name" id="school_name" class="form-control" required />

															</div>



															<div class="form-group">	
															<label>School Photo   </label>
                                                            <input class="form-control " placeholder="School Name"   type="file" name="school_photo" id="school_photo" class="form-control" required />

															</div>


															<div class="form-group">	
															<label>School Logo  </label>
                                                            <input class="form-control " placeholder="school_logo"   type="file" name="school_logo" id="school_logo" class="form-control"  required />
															</div>

															<div class="form-group">	
															<label>School Email   </label>
                                                            <input class="form-control " placeholder="School Name"   type="email" name="school_email" id="school_email" class="form-control"  required/>
															</div>

															 

															<div class="form-group">
															<label>School Default Password</label>
															<input type="text" name="school_password" value="000000"  id="school_password" class="form-control" required Readonly/>
															</div>
															
															<div class="form-group">			
															<label>School Phone  </label>
															<input type="text" name="school_phone" placeholder="School Phone"  id="school_phone" class="form-control "   required />
															</div>


	                                                                                                  
															
															<div class="form-group">			
 															<label>School Address  </label>
															<input type="text" name="school_address" placeholder="School Address"  id="school_address" class="form-control "   required />
															</div>

 

																<div class="card-header mt-5 mb-3">
																<i class="fas fa-tag"></i>
																APPLICATION SETTINGS
																</div>

															<div class="form-group">			
															<label>School Theme Background Color   </label>
															<input type="color" name="school_bgcolor" value="#000000"   id="school_bgcolor" class="form-control  "  required />
															</div>
															
															

															<div class="form-group">			
															<label>School Theme Text color  </label>
															<input type="color" name="text_code"  value="#ffffff"  id="text_code" class="form-control  "  required />
															</div>															

															 
															
															 <div class="card-header mt-5 mb-3">
																<i class="fas fa-tag"></i>
																SCHOOL TYPE
														    </div>		
															 
														 
															
														     <div class="form-group">	
																
																<label>Select School </label>
																<select id="school_type" name="school_type" class="form-control" > 

																 <option  value='primary'> Primary School </option>
																 <option  value='secondary'>Secondary / High School </option>
															 

															    </select>	

															</div>

					 
												 
															 
														 
									 

															<div class="card-header mt-5 mb-3">
																<i class="fas fa-tag"></i>
																SCHOOL ADMINISTRATOR
														    </div>	
															
															
															<div class="form-group">			
															<label>Admin Fullname</label>
															<input type="text" name="schl_head_name" placeholder="Admin Name"  id="schl_head_name" class="form-control "  required />
															</div>

															<div class="form-group">			
															<label>Admin Username</label>
															<input type="email" name="adminhead_email" placeholder="Admin Email"  id="adminhead_email" class="form-control "  required />
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
							   window.location="index.php";
							
					 
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


 
</script>







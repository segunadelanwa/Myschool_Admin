
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		require("../header.php");
		require("title.php");
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
                        <h3 class="mt-4">
						
						 Field Admin Account Signup
						</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active"> Field Admin  Registeration</li>
                        </ol>
                  
					  

                       

						   <div class="col-xl-6"> 
						 

										<div class="card mb-4">
												<div class="card-header">
													<i class="fas fa-user"></i>
												  Fill all fields correctly
												</div>
												<div class="card-body">
													<div class="table-responsive">
														  <form method="POST"   id="user_register_form">
														  
														      <div class="form-group">
														      <label>Field Admin ID </label>
															  <input class="form-control py-4" value="<?php echo$result=$Loader->FieldAdminNoGenerator(); ?>"   type="text" name="fieldAdminCode" id="fieldAdminCode" class="form-control" readonly /> 
															  </div>


															<div class="form-group">	
															<label>Username (email address)  </label>
                                                            <input class="form-control py-4" placeholder="Marketer Username"   type="email" name="user_email_address" id="user_email_address" class="form-control" data-parsley-checkemail data-parsley-checkemail-message='<span style="color:red;">This marketer email address already taken</span>' required />

															</div>


															<div class="form-group">	
															<label>Marketer Photo  </label>
                                                            <input class="form-control py-4" placeholder="Marketer Username"   type="file" name="field_operator_photo" id="field_operator_photo" class="form-control"  required />

															</div>

															<div class="form-group">
															<label>Password   Deafult</label>
															<input type="text" name="password" value="000000"  id="password" class="form-control" required Readonly/>
															</div>
															
															<div class="form-group">			
															<label>Fullname  </label>
															<input type="text" name="fullname" placeholder="fullname"  id="fullname" class="form-control py-4"   required />
															</div>


															<div class="form-group">			
 															<label>Phone  </label>
															<input type="text" name="phone" placeholder="phone"  id="phone" class="form-control py-4"   required />
															</div>
															
															
															<div class="form-group">			
 															<label>Home Address  </label>
															<input type="text" name="address" placeholder="address"  id="address" class="form-control py-4"   required />
															</div>



															<div class="form-group">			
															<label>Account Name  </label>
															<input type="text" name="acct_name" placeholder="Account name"  id="acct_name" class="form-control py-4"  required />
															</div>

															<div class="form-group">			
															<label>Account Number  </label>
															<input type="text" name="acct_number" placeholder="Account number"  id="acct_number" class="form-control py-4"  required />
															</div>

															<div class="form-group">			
															<label>Bank Name  </label>
															<input type="text" name="bank_name" placeholder="Bank Name"  id="bank_name" class="form-control py-4"  required />
															</div>

															<div class="form-group">			
															<label>Account Registrar  </label>
															<input type="text" name="registrar" value="<?php echo $admincode; ?>"  id="registrar" class="form-control py-4" Readonly />
															</div>

															<div class="form-group">	 
															<input type="hidden" name="tier1" value="tier1"  id="tier1" class="form-control" required />
															</div>

 
												 
																   
																	
																	<input type="hidden" name="page"   value='admin_signup_page' />
																	<input type="hidden" name="action" value="marketer_signup_action" />

																	<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Signup Marketer">
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


  window.ParsleyValidator.addValidator('checkemail', {
    validateString: function(value){
      return $.ajax({
        url:'../pageajax.php',
        method:'POST',
        data:{page:'admin_signup_page', action:'check_marketer', email:value},
        dataType:"json",
        async: false,
        success:function(data)
        {
          return true;
        }
      });
    }
  });

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
							   window.location="index.php";
							
					 
						  }else{
							   
							elementmodal.classList.remove('loaderDisplayblock');
							elementmodal.classList.add('loaderDisplayNone');	
							alert(data.feedback);
						   window.location.reload();

						   
						  }



				}
				
				
			  })
    }

  });
	
});




</script>







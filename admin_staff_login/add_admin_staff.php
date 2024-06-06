				<?php
				require("index_header.php");
				?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		require("../header.php");
		require("title.php");
		?>
			
    </head>
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
						
						 New Staff / Admin Registeration
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Staff Registeration</li>
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
															<label>Username (email address)  </label>
                                                            <input class="form-control py-4" placeholder="Staff/Admin Username"   type="email" name="user_email_address" id="user_email_address" class="form-control" data-parsley-checkemail data-parsley-checkemail-message='<span style="color:red;">Email address already taken</span>' required />

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
															<label>Department  </label>
															<input type="text" name="department" placeholder="department"  id="department" class="form-control py-4"  required />
															</div>

															<div class="form-group">			
															<label>Account Registrar  </label>
															<input type="text" name="registrar" value="<?php echo $fullname; ?>"  id="registrar" class="form-control py-4" Readonly />
															</div>

															<div class="form-group">	 
															<input type="hidden" name="tier1" value="tier1"  id="tier1" class="form-control" required />
															</div>

 
												 
																   
																	
																	<input type="hidden" name="page"   value='admin_signup_page' />
																	<input type="hidden" name="action" value="admin_signup_action" />

																	<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Signup Admin">
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
        data:{page:'admin_signup_page', action:'check_email', email:value},
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



</script>







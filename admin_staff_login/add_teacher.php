				<?php
				require("index_header.php");
				?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		require("../header.php");
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
						
						Teacher's Signup
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active"> Teacher  Registeration</li>
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
															<label>School Code</label>
															<input type="text" name="sch_code"   id="sch_code" class="form-control"  />
															</div>


															<div class="form-group">	
															<label>Username (email address)  </label>
                                                            <input class="form-control py-4" placeholder="Field Admin Username"   type="email" name="user_email_address" id="user_email_address" class="form-control" data-parsley-checkemail data-parsley-checkemail-message='<span style="color:red;">This field admin email address already taken</span>' required />

															</div>

															<div class="form-group">
															<label>Password   Deafult</label>
															<input type="text" name="password" value="000000"  id="password" class="form-control" required Readonly/>
															</div>
															
															<div class="form-group">			
															<label>Field Operator Photo  </label>
															<input type="file" name="field_operator_photo" placeholder="field_operator_photo"  id="photo" class="form-control py-4"   required />
															</div>

													 


															<div class="form-group">			
															<label>Fullname  </label>
															<input type="text" name="fullname" placeholder="fullname"  id="fullname" class="form-control py-4"   required />
															</div>


															<div class="form-group">			
 															<label>Gender  </label>
															<input type="text" name="gender" placeholder="Gender"  id="gender" class="form-control py-4"   required />
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

										 
 
												 
																   
																	
																	<input type="hidden" name="page"   value='admin_signup_page' />
																	<input type="hidden" name="action" value="teacher_account_setup" />

																	<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Signup Field Admin">
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
        data:{page:'admin_signup_page', action:'check_teacher_account', email:value},
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







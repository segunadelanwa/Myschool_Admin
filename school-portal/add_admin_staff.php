 
<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php
		require("../topUrl.php");
		require("../header.php");
	
		require("index_header.php");
		
        $output ="../'.$SchoolIMG.'/'.$school_code.'/'.$photo.'";
	?>
        <title>  <?php echo $output = strtoupper($school_name); ?>  </title>
        <link rel="apple-touch-icon" href="<?php echo$output; ?>" />
        <link rel="shortcut icon"    href="<?php echo$output; ?>" />
			
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
						
						 New Admin Registeration
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
															<label>New Admin Username </label>
                                                            <input class="form-control py-4" placeholder=" This must be email address"   type="email" name="user_email_address" id="user_email_address" class="form-control" data-parsley-checkemail data-parsley-checkemail-message='<span style="color:red;">Email address already taken</span>' required />

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
 															<label>Address  </label>
															<input type="text" name="address" placeholder="Home Address"  id="address" class="form-control py-4"   required />
															</div>


															<div class="form-group">	
															<label>Gender </label>
														   <select   name="gender"  id="gender" class="form-control "   required>
															   <option  value=""> SELECT OPTION  </option> 
															   <option value='female'>Female </option>  
															   <option value='male'>Male </option>  
															</select> 
															</div>
															
															<div class="form-group">			
															<label>Admin Photo  </label>
															<input type="file" name="photo"    id="photo" class="form-control py-4"   required />
															</div>	

															<div class="form-group">			
 															<label>Phone  </label>
															<input type="text" name="phone" placeholder="phone"  id="phone" class="form-control py-4"   required />
															</div>

															<div class="form-group">
															<label>Admin Department  </label>
															<input type="text" name="admin_depart"    id="admin_depart" class="form-control py-4"   required />
															</div>	
                                                                      


 
															<div class="form-group">	
															<label>Admin Role </label>
														   <select   name="admin_level"  id="admin_level" class="form-control "   required>
															   <option value=""> SELECT OPTION  </option>
															   <option value='proprietor'>School Proprietor/Proprietress</option>
															   <option value='head'>School Head </option>  
															   <option value='admin'>School Admin </option>  
															</select> 
															</div>
															
															 
  																   
																	
																	<input type="hidden" name="page"   value='admin_signup_page' />
																	<input type="hidden" name="action" value="admin_signup_action" />

																	<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Setup Admin">
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
        url:'pageajax.php',
        method:'POST',
        data:{page:'admin_signup_page', action:'check_email_admin', email:value},
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







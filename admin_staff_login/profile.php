				<?php
				require("index_header.php");
				?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		require("../header.php");
		?>
			<title>ECMT Account Profile</title>
    </head>
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
                        <h1 class="mt-4">
						
						<?php echo"$fullname" ; ?>
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                  
					  
					      <center>
                            <div class="col-xl-3">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <i class="fas fa-user"></i>
                                     Profile Photo
                                    </div>
                                    <div class="card-body">
									 <img src="profile_img/<?php echo $photo; ?>" style="height:150px"   />
									</div>
									  <?php echo $username; ?>
                                </div>
                            </div>
                            </center> 
                       
                    
					      <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               Profile Data
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered"   width="50%" cellspacing="0">
                                 
                            
                                        <tbody>
                                          
                                            
                                            <tr style="width:100%;">
                                                <td style="width:20%;">Name</td> 
                                                <td style="width:80%;"><?php echo $fullname; ?></td> 
                                            </tr>

                                            <tr style="width:100%;">
                                                 <td style="width:20%;">Username:</td> 
                                                 <td style="width:80%;"><?php echo $username; ?></td> 
                                            </tr>
											
                                            <tr style="width:100%;">
                                                 <td style="width:20%;">Phone no:</td> 
                                                 <td style="width:80%;"> <?php echo $phone; ?></td> 
                                            </tr>

                                             <tr style="width:100%;">
                                                 <td style="width:20%;">Gender:</td> 
                                                 <td style="width:80%;"> <?php echo $gender; ?></td> 
                                            </tr>
											
                                             <tr style="width:100%;">
                                                 <td style="width:20%;">Department:</td> 
                                                 <td style="width:80%;"><?php echo $department; ?></td> 
                                            </tr>

                                            <tr style="width:100%;">
                                                 <td style="width:20%;">Account Status:</td> 
                                                 <td style="width:80%;"> <?php echo $acct_level; ?></td> 
                                            </tr>
											
                                             <tr style="width:100%;">
                                                 <td style="width:20%;">Access  Code:</td> 
                                                 <td style="width:80%;"><?php echo $level_code; ?></td> 
                                            </tr>

                                             <tr style="width:100%;">
                                                 <td style="width:20%;">Account Registrar:</td> 
                                                 <td style="width:80%;"><?php echo $registrar; ?></td> 
                                            </tr>

                                             <tr style="width:100%;">
                                                 <td style="width:20%;">Register Date: </td> 
                                                 <td style="width:80%;"><?php echo $sub_start; ?></td> 
                                            </tr>
                                          
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
  
						   <div class="col-xl-6"> 
						
										<div class="card mb-4">
												<div class="card-header">
													<i class="fas fa-user"></i>
												   Update Profile Photo
												</div>
												<div class="card-body">
													<div class="table-responsive">
													<span id="message"></span>
														 <form method="POST"   id="user_profile_update">
														 
																<div class="form-group"> 
																<input type="file" name="banner_img2" placeholder="emaill address"  id="banner_img2" class="form-control" required />
																</div>

															 
																
												 
																   
																	
																	<input type="hidden" name="username"   value='<?php echo"$username"; ?>' />
																	<input type="hidden" name="page"   value='profile' />
																	<input type="hidden" name="action" value="update_profile" />

																	<input type="submit" name="user_login" id="user_login" class="btn btn-primary" value="Update Photo">
																</div>
															</form>
					 
													</div>
												</div>
									   


										<div class="card mb-4">
												<div class="card-header">
													<i class="fas fa-user"></i>
												   Update Profile Data 
												</div>
												<div class="card-body">
													<div class="table-responsive">
														  <form method="POST"   id="user_profile_todo">
														  
															<div class="form-group">	
															<label>Phone no  </label>
															<input type="text" name="phone_no" placeholder="Phone Number"  id="phone_no" class="form-control" required />
															</div>

															<div class="form-group">
															<label>Gender  </label>
															<input type="text" name="gender" placeholder="Gender"  id="gender" class="form-control" required />
															</div>
															
															<div class="form-group">			
															<label>Department  </label>
															<input type="text" name="department" placeholder="Department"  id="Department" class="form-control" required />
															</div>

 
												 
																   
																	
																	<input type="hidden" name="page"   value='profile' />
																	<input type="hidden" name="action" value="todo_profile" />

																	<input type="submit" name="user_todo" id="user_todo" class="btn btn-primary" value="Update Data">
																</div>
															</form>
													</div>
												</div>
									
					 
					 
					 
										<div class="card mb-4">
												<div class="card-header">
													<i class="fas fa-user"></i>
												   Upgrade Account Statuss
												</div>
												<div class="card-body">
													<div class="table-responsive">
														

				   
				   
				   														  <form method="POST"   id="user_profile_upgrade">
														  
															<div class="form-group">	
															<label>Account Username   </label>
															<input type="text" name="acct_email" placeholder="Account email"  id="acct_email" class="form-control" required />
															</div>

													   <div class="form-group">
														   <label for="name">Level Upgrade</label>
															<select id="upgrade_level" name="upgrade_level"  class="form-control" required>
															 
														 
															<option value="">Select Option</option>
															<option value="Tier2">Tier2</option>
															<option value="Tier3">Tier3</option> 
															</select>
													   </div>

 
												 
																   
																	
																	<input type="hidden" name="page"   value='profile' />
																	<input type="hidden" name="action" value="upgrade_profile" />

																	<input type="submit" name="user_upgrade" id="user_upgrade" class="btn btn-primary" value="Upgrade Account">
																</div>
															</form>
															
															

				   
													</div>
												</div>
										</div>
					  
	                       </div>
		  
				 
				  </div>
                </main>
               
			   <footer class="py-4 bg-light mt-auto">
                   <?php 
				   require("../footer.php"); 
				   ?>
                </footer>
				
				
            </div>
        </div>
    
    
        <script src="../js/scripts.js"></script>
    
   
 
    </body>
</html>


<script>
 


$(document).ready(function(){

  $('#user_profile_update').parsley();
  $('#user_profile_todo').parsley();
  $('#user_profile_upgrade').parsley();

  $('#user_profile_update').on('submit', function(event){
	        
		  
		  
    event.preventDefault();

    $('#banner_img2').attr('required', 'required'); 

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
          $('#user_login').attr('disabled', 'disabled');
		  $('#user_login').addClass('btn-info');
          $('#user_login').val('Please wait...');
		  
        },
        success:function(data)
        {
          if(data.success)
          {
			  
				location.href='profile.php';
				$('#user_login').attr('disabled', false);

				$('#user_login').val('Profile update Success!!');
          }
          else
          {
			  
				$(btn).html('<div>    </div>');
				$('#message').html('<div class="alert alert-danger">Profile update Failed!! <br>'+data.error+'</div>');

				$('#user_login').attr('disabled', false);

				$('#user_login').val('Sign In');
				$('#user_login').addClass('btn-primary');
		 
		        //alert("Login Failed!!");
		       //window.location.reload();
		 
          }


        }
      })
    

  });
 



 $('#user_profile_todo').on('submit', function(event){
	        
		  
		  
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
          $('#user_todo').attr('disabled', 'disabled');
		  $('#user_todo').addClass('btn-info');
          $('#user_todo').val('Please wait...');
		  
        },
        success:function(data)
        {
          if(data.success)
          {
			  
				location.href='profile.php'; 
          }
          else
          {
              alert(data.feedback);
		 
          }


        }
      })
    

  });


 $('#user_profile_upgrade').on('submit', function(event){
	        
		  
		  
    event.preventDefault();

    $('#acct_email').attr('required', 'required');

    $('#upgrade_level').attr('required', 'required');
 

      $.ajax({
        url:"pageajax.php", 
        method:"POST",
        data:new FormData(this),
        dataType:"json",
        contentType:false,
        cache:false,
        processData:false,
        beforeSend:function()
        {
			
		 // btn.innerHTML = '<div class="loader-bg">  <div class="loader-bar">  </div>  </div>';
         // $('#user_upgrade').attr('disabled', 'disabled');
		  $('#user_upgrade').addClass('btn-info');
          $('#user_upgrade').val('Please wait...');
		  
        },
        success:function(data)
        {
          if(data.success == 'success')
          {
			  
				alert(data.feedback);
				window.location="profile.php";
          }
          else
          {
              alert(data.feedback);
				 

				//$('#user_upgrade').attr('enabled', 'enabled');
				$('#user_upgrade').addClass('btn btn-primary');
				$('#user_upgrade').val('Upgrade Account');
		 
          }


        }
      })
    

  });

});


</script>







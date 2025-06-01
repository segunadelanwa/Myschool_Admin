 
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
						
                         Edit Data
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Edit Data</li>
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
														 
														  <center>	
															 <?php  if(empty($photo)){
															echo' <img src="image/profile.jpg"  style="width:90px;border-radius:500px"/> ';
															}else{
															echo' <img src="../'.$SchoolIMG.'/'.$school_code.'/'.$photo.'"  style="width:90px;border-radius:500px"/> '; 
															}
															?>
														</center>
														  <div class="form-group">			
															<label>Update Photo  </label>
															<input type="file" name="photo"    id="photo" class="form-control  "     />
															</div>	
			 
															<div class="form-group">	
															<label>Admin Username </label>
                                                            <input class="form-control py-4" value="<?php echo$username; ?>"   type="email" name="user_email_address" id="user_email_address" class="form-control" data-parsley-checkemail data-parsley-checkemail-message='<span style="color:red;">Email address already taken</span>' readonly />

															</div>
 
															<div class="form-group">			
															<label>Fullname  </label>
															<input type="text" name="fullname"  value="<?php echo$fullname; ?>"  id="fullname" class="form-control py-4"   required />
															</div>

															<div class="form-group">			
 															<label>Address  </label>
															<input type="text" name="address" value="<?php echo$address; ?>"  id="address" class="form-control py-4"   required />
															</div>


															<div class="form-group">	
															<label>Gender </label>
														   <select   name="gender"  id="gender" class="form-control "   required>
															   <option  value="<?php echo$gender; ?>" selected> <?php echo$gender; ?>  </option> 
															   <option value='female'>Female </option>  
															   <option value='male'>Male </option>  
															</select> 
															</div>
															


															<div class="form-group">			
 															<label>Phone  </label>
															<input type="text" name="phone" value="<?php echo$phone; ?>"  id="phone" class="form-control py-4"   required />
															</div>

															<div class="form-group">
															<label>Admin Department  </label>
															<input type="text" name="admin_depart"    value="<?php echo$admin_depart; ?>"  id="admin_depart" class="form-control py-4"   required />
															</div>	
                                                                      


 
															<div class="form-group">	
															<label>Admin Role </label>
															<input type="text" name="admin_level"    value="<?php echo$data ="$admin_access $bank_name"; ?>"  id="admin_level" class="form-control py-4"     readonly/>
															</div>	 


															<div class="form-group">	
															<label>Bank Name </label>
															<input type="text" name="bank_name"    value="<?php echo$admin_bank_name; ?>"  id="bank_name" class="form-control  "      /> 
															</div>	 
															<div class="form-group">	
															<label>Account Name</label>
															<input type="text" name="account_name"    value="<?php echo$admin_account_name; ?>"  id="account_name" class="form-control  "      />
															</div>	 
															<div class="form-group">	
															<label>Account Number </label>
															<input type="text" name="account_number"    value="<?php echo$admin_account_number; ?>"  id="account_number" class="form-control  "      />
															</div>	 
															
															 
  																   
																	
																	<input type="hidden" name="page"   value='admin_edit_page' />
																	<input type="hidden" name="action" value="admin_edit_action" />

																	<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Update Data">
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
					   window.location="my_profile_data.php";
					
			 
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







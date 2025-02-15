 
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
						Staff Profile Data
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Profile Data</li>
                        </ol>
                  
					  

                       

						   <div class="col-xl-6"> 
						 

										<div class="card mb-4">
												<div class="card-header">
													<i class="fas fa-user"></i>
													<?php echo$fullname; ?> Profile Info
												</div>
												<div class="card-body">
													<div class="table-responsive">
													
														 
															<?php
															$StuPhoto = "../$SchoolIMG/$school_code/$photo";
															?>
														  <center>	
                                                            <img src="<?php echo$StuPhoto?>"  style="height:300px"><br/><br/>
                                                          <a href="edit_admin_profile.php"><div class="btn btn-danger text-white"> Edit Data?</div></a>
                                                        </center>
														 
															<div class="form-group">	
															<label>Admin Username </label>
                                                            <input class="form-control py-4" value="<?php echo$username; ?>"   type="email" name="user_email_address" id="user_email_address" class="form-control" data-parsley-checkemail data-parsley-checkemail-message='<span style="color:red;">Email address already taken</span>' readonly />

															</div>
 
															<div class="form-group">			
															<label>Fullname  </label>
															<input type="text" name="fullname"  value="<?php echo$fullname; ?>"  id="fullname" class="form-control py-4"   readonly />
															</div>

															<div class="form-group">			
 															<label>Address  </label>
															<input type="text" name="address" value="<?php echo$address; ?>"  id="address" class="form-control py-4"   readonly />
															</div>


															<div class="form-group">	
															<label>Gender </label> 
                                                            <input type="text" name="address" value="<?php echo$gender; ?>"  id="address" class="form-control py-4"   readonly />
														 
														 


															<div class="form-group">			
 															<label>Phone  </label>
															<input type="text" name="phone" value="<?php echo$phone; ?>"  id="phone" class="form-control py-4"   readonly />
															</div>

															<div class="form-group">
															<label>Admin Department  </label>
															<input type="text" name="admin_depart"    value="<?php echo$admin_depart; ?>"  id="admin_depart" class="form-control py-4"   readonly />
															</div>	
                                                                      


 
															<div class="form-group">	
															<label>Admin Role </label>
															<input type="text" name="admin_level"    value="<?php echo$admin_access; ?>"  id="admin_level" class="form-control py-4"     readonly/>
															</div>	 


															<div class="form-group">	
															<label>Bank Name </label>
															<input type="text" name="bank_name"    value="<?php echo$admin_bank_name; ?>"  id="bank_name" class="form-control  "     readonly /> 
															</div>	 
															<div class="form-group">	
															<label>Account Name</label>
															<input type="text" name="account_name"    value="<?php echo$admin_account_name; ?>"  id="account_name" class="form-control  "      readonly/>
															</div>	 
															<div class="form-group">	
															<label>Account Number </label>
															<input type="text" name="account_number"    value="<?php echo$admin_account_number; ?>"  id="account_number" class="form-control  "      readonly/>
															</div>	 
															
															 
  																   
																	
															 
															
                                                           
                                                            
																</div>
															 
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


 






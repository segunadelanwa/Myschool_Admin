 

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

 <script>

	function GoBackHandler(){
	history.go(-1);
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
                        <h1 class="mt-4">
						
						Teacher's Signup
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item" onclick="GoBackHandler()">Back</li>
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
														   <label>New Teacher ID/Code </label>
														   <input class="form-control py-4" value="<?php echo$result=$Loader->TeacherNoGenerator(); ?>"   type="text" name="teacher_id" id="teacher_id" class="form-control" readonly /> 
														   </div>

														    <div class="form-group">
															<label>School Code</label>
															<input type="text" name="sch_code"   id="sch_code" class="form-control" value="<?php echo$school_code; ?>" readonly/>
															</div>

														    <div class="form-group">			
															<label>Teacher Photo  </label>
															<input type="file" name="field_operator_photo"    id="photo" class="form-control py-4"   required />
															</div>	


															<div class="form-group">	
															<label>Username (email address)  </label>
                                                            <input class="form-control py-4" placeholder=""   type="email" name="user_email_address" id="user_email_address" class="form-control" data-parsley-checkemail data-parsley-checkemail-message='<span style="color:red;">This field admin email address already taken</span>' required />

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
															<label>Gender </label>
														   <select   name="gender"  id="gender"  class="form-control"   required>
															   <option disabled="disabled" selected="selected" > Select Option  </option>
															   <option  value="Male">Male </option>
															   <option  value="Female">Female </option> 
															
															</select> 
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
															<label>Teacher Core Subject </label>
															<select id='subject' name='subject' class="form-control" >
															        <option disabled="disabled" selected="selected">---Select Subject----</option>
				 
																	<?php
																		$result = $Loader-> FecthAllSubject();
																		foreach($result as $data)
																		{
																		$sub_title=$data['sub_title'];
																		$sub_id=$data['sub_id'];  
																		echo"<option  value='$sub_id'> $sub_title </option>";
																		}
																	?>
																
																</select>	
															
															</div>



															<div class="form-group">	
															<label>Teacher Rank </label>
														   <select   name="teacher_rank"  id="teacher_rank"  class="form-control"   required>
															   <option disabled="disabled" selected="selected" > Select Option  </option>
															   <option  value="teacher">Teaching staff </option>
															   <option  value="head">Head teacher </option> 
															
															</select> 
															</div>


															<div class="form-group">			
															 
															<input type="hidden" name="salary" value="0" id="salary" class="form-control py-4"  />
															</div>


															<div class="form-group">	
																
																<label>Bank Name </label>
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
															<input type="text" name="acct_name" placeholder="Account name"  id="acct_name" class="form-control py-4"  required />
															</div>

															<div class="form-group">			
															<label>Account Number  </label>
															<input type="text" name="acct_number" placeholder="Account number"  id="acct_number" class="form-control py-4"  required />
															</div>

													 
										 
 
												 
																   
																	
																	<input type="hidden" name="page"   value='admin_signup_page' />
																	<input type="hidden" name="action" value="teacher_account_setup" />

																	<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Signup ">
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
							window.location.reload();

						   
						  }



				}
		
		
      })
    }

  });
	
});


 

</script>







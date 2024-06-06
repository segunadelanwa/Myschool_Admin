
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
						
						Student Signup
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active"> Student Registeration</li>
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
															<label>School Code </label>
                                                            <input class="form-control py-4" placeholder="School Code"   type="text" name="school_code" id="school_code" class="form-control" required />

															</div>

															<div class="form-group">	
															<label>Parent Code </label>
                                                            <input class="form-control py-4" placeholder="parent Code"   type="text" name="parent_code" id="parent_code" class="form-control" required />

															</div>
															
															
															<div class="form-group">	
															<label>Student Photo   </label>
                                                            <input class="form-control py-4"    type="file" name="student_photo" id="student_photo" class="form-control" required />

															</div>
															
															
															<div class="form-group">	
															<label>School Student No </label>
                                                            <input class="form-control py-4" placeholder="School Code"   type="text" name="schl_stu_no" id="schl_stu_no" class="form-control" data-parsley-checkemail data-parsley-checkemail-message='<span style="color:red;">Student code already taken</span>' required />

															</div>
															

															



															<div class="form-group">	
															<label>Student Fullname </label>
                                                            <input class="form-control py-4" placeholder="student fullname"   type="text" name="student_name" id="student_name" class="form-control" required />

															</div>
															

															<div class="form-group">	
															<label>Student Gender </label>
														   <select   name="stu_gender"  id="stu_gender" class="form-control "   required>
															   <option  value=""> SELECT OPTION  </option>
															   <option>Male </option>
															   <option>Female </option> 
															
															</select> 
															</div>
															
															
															
															
															<div class="form-group">	
															<label>Student Class </label>
                                                            <input class="form-control py-4" placeholder="student class"   type="text" name="student_class" id="student_class" class="form-control" required />

															</div>
																														
															<div class="form-group">	
															<label>Class Rep</label>
                                                            <input class="form-control py-4" placeholder="class rep"   type="text" name="class_rep" id="class_rep" class="form-control" required />

															</div>
															
															
															
												 


															<div class="form-group">			
 															<label>Student Teacher   </label>
															<input type="text" name="student_teacher" placeholder="teacher"  id="student_teacher" class="form-control py-4"   required />
															</div>


															<div class="form-group">			
 															<label>Student Payment Status  </label>
															<select   name="payment_status"  id="payment_status" class="form-control "   required>
															<option  value=""> SELECT OPTION  </option>
															<option value="Active"> Student Payment Confirmed  </option>
															<option  value="Inactive"> Student Payment Unconfirmed   </option> 
															
															</select> 
															</div>


														

 

															<div class="form-group">			
															<label>Account Registrar  </label>
															<input type="text" name="admincode" value="<?php echo $admincode; ?>"  id="admincode" class="form-control py-4" Readonly />
															</div>

															<div class="form-group">	 
															<input type="hidden" name="tier1" value="tier1"  id="tier1" class="form-control" required />
															</div>

															
																	
																	<input type="hidden" name="page"   value='admin_signup_page' />
																	<input type="hidden" name="action" value="parent_student_action" />
																	<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Signup Student">
																	
																	
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
							
					 
						  }
						  else
						  {
							   
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







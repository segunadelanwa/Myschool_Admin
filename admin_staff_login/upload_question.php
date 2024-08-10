
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		require("../header.php");
		require("title.php");
        require("index_header.php");
		?>
			
    </head>
<style>

.QuestionWithImage{
display:none
}
.QuestionWithNoImage{
display:none
}

</style>


	
<script type="text/javascript">
 
 function GoBackHandler(){
 history.go(-1)
 }	


 

function calender(calend) {
     var calend        = document.getElementById(calend);
     const main_d_btn  = document.querySelector('.QuestionWithImage');
	 const hours_d_btn = document.querySelector('.QuestionWithNoImage');
	 
  
	 if(calend.value == "withImage"){
		 
	     main_d_btn.style.display="block";
		 hours_d_btn.style.display="none";
		 
	 }else if(calend.value == "withNoImage"){
		 
		 hours_d_btn.style.display="block";
		 main_d_btn.style.display="none";
	 }
	 
 
}


 
</script> 
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
						Upload Question
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item" onclick="GoBackHandler()">Back</li>
                            <li class="breadcrumb-item active"> Upload Question</li>
                        </ol>
                  
					  

                       

						   <div class="col-xl-6"> 
						 

										<div class="card mb-4">
												<div class="card-header">
													<i class="fas fa-user"></i>
												 SCHOOL QUESTION UPLOAD
												</div>

												<div class="card-body">
													<div class="table-responsive">
													

                                                        <div class="form-group ">
															<label for="name">Question Type</label>
															<select class="form-control" id="categories_selection"  name="categories_selection" onchange="calender(this.id)" required>
															<option value="">Select Question Option</option>
															<option value="withImage"> Question with image</option>
															<option value="withNoImage">Question with no image</option> 
															</select>
														 </div>


														  <form method="POST"   id="user_register_form1" class="QuestionWithImage"  enctype='multipart/form-data'>

                                                          <div class="form-group">
														    <label>School Code </label>
                                                          
                                                            <input type="text" name='school_code' id='school_code' placeholder="school code"  i class="form-control py-4"   required />
														   </div>



                                                            <br/>
                                                            <div class="card-header">
                                                            <i class="fas fa-user"></i>
                                                           QUESTION SECTION
                                                            </div> <br/>

                                                          <div class="form-group">	
																<label>Question Subject </label>
																<select id="subject" name="subject" class="form-control" >
																<option disabled="disabled" selected="selected">Select Subject</option>

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
														    <label>Select Question Image </label>
                                                            <input type="file" name='question_img' id='question_img' style='height:50px;' class='form-control ' required/> 
														   </div> 

                                                           <div class="form-group">
														    <label>Type Question </label>
                                                            <input type="text" name='question' id='question' style='height:50px;' class='form-control ' required/> 
														   </div> 

                                                            <div class="form-group">			
															<label style="color:green;font-weight:bold;">Option A  </label>
															<input type="text" name='option_a' id='option_a'   class="form-control py-4"   required />
															</div>
                                                            <div class="form-group">			
															<label style="color:green;font-weight:bold;">Option B  </label>
															<input type="text" name='option_b' id='option_b'   class="form-control py-4"   required />
															</div>
                                                            <div class="form-group">			
															<label style="color:green;font-weight:bold;">Option C  </label>
															<input type="text" name='option_c' id='option_c'  class="form-control py-4"   required />
															</div>
                                                            <div class="form-group">			
															<label style="color:green;font-weight:bold;">Option D  </label>
															<input type="text" name='option_d' id='option_d'   class="form-control py-4"   required />
															</div>

 
                                                            <div class="form-group">	
																<label style="color:red;font-weight:bold;">Correct Option </label>
															<select  name='answer' id='answer'  class="form-control "  required >
																<option  value="">--select correct answer option--</option>
																<option value="A">Option A </option> 
																<option value="B">Option B </option> 
																<option value="C">Option C </option> 
																<option value="D">Option D </option>    
																
																</select>
																</div>
                                                            <br/>
                                                           <div class="card-header">
                                                            <i class="fas fa-user"></i>
                                                           QUESTION SETTINGS
                                                            </div>



                                                            <div class="form-group">	
																<label>Question Class </label>
															<select  name='class' id='class'  class="form-control "  required >
																<option  value=""> select option </option>
																<option value="primary1">Primary 1 </option> 
																<option value="primary2">Primary 2 </option> 
																<option value="primary3">Primary 3 </option> 
																<option value="primary4">Primary 4 </option> 
																<option value="primary5">Primary 5 </option> 
																<option value="primary6">Primary 6 </option> 
																<option value="jss1">JSS 1 </option> 
																<option value="jss2">JSS 2 </option> 
																<option value="jss3">JSS 3 </option> 
																<option value="ss1">SS 1 </option> 
																<option value="ss2">SS 2 </option> 
																<option value="ss3">SS 3 </option> 
																
																</select>
																</div>


                                                            <div class="form-group">	
																<label>Question Type </label>
															<select  name='type' id='type'  class="form-control "  required >
																<option  value=""> select option </option> 
																<option value="test">Mid-Term Test </option> 
																<option value="exam">Exam </option> 
																
																</select>
																</div>






															<div class="form-group">			
															<label>Question Access Code  </label>
															<input type="text" name='access_code' id='access_code' placeholder=""   class="form-control"   required /><br/>
															Suggested access code: ( <?php echo$result = $Loader->QuestionAccessSuggestion();?> )
														    </div>


 
												 
																   
																	
																	<input type="hidden" name="page"   value='uploadQuestion' />
																	<input type="hidden" name="action" value="question" />

																	<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Upload Question">
																</div>
															</form>


														  <form method="POST"   id="user_register_form2"  class="QuestionWithNoImage" enctype='multipart/form-data'>

                                                          <div class="form-group">
														    <label>School Code </label>
                                                          
                                                            <input type="text" name='school_code' id='school_code' placeholder="school code"  i class="form-control py-4"   required />
														   </div>




                                                            <br/>
                                                            <div class="card-header">
                                                            <i class="fas fa-user"></i>
                                                           QUESTION SECTION
                                                            </div> <br/>
                                                          <div class="form-group">	
																<label>Question Subject </label>
																<select id="subject" name="subject" class="form-control" >
																<option disabled="disabled" selected="selected">Select Subject</option>

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
														    <label>Type Question </label>
                                                            <input type="text" name='question' id='question' style='height:50px;' class='form-control ' required/> 
														   </div> 

                                                            <div class="form-group">			
															<label style="color:green;font-weight:bold;">Option A  </label>
															<input type="text" name='option_a' id='option_a'   class="form-control py-4"   required />
															</div>
                                                            <div class="form-group">			
															<label style="color:green;font-weight:bold;">Option B  </label>
															<input type="text" name='option_b' id='option_b'   class="form-control py-4"   required />
															</div>
                                                            <div class="form-group">			
															<label style="color:green;font-weight:bold;">Option C  </label>
															<input type="text" name='option_c' id='option_c'  class="form-control py-4"   required />
															</div>
                                                            <div class="form-group">			
															<label style="color:green;font-weight:bold;">Option D  </label>
															<input type="text" name='option_d' id='option_d'   class="form-control py-4"   required />
															</div>

 
                                                            <div class="form-group">	
																<label style="color:red;font-weight:bold;">Correct Option </label>
															<select  name='answer' id='answer'  class="form-control "  required >
																<option  value="">--select correct answer option--</option>
																<option value="A">Option A </option> 
																<option value="B">Option B </option> 
																<option value="C">Option C </option> 
																<option value="D">Option D </option>    
																
																</select>
																</div>
                                                            <br/>
                                                           <div class="card-header">
                                                            <i class="fas fa-user"></i>
                                                           QUESTION SETTINGS
                                                            </div>



                                                            <div class="form-group">	
																<label>Question Class </label>
															<select  name='class' id='class'  class="form-control "  required >
																<option  value=""> select option </option>
																<option value="basic1">Basic 1 </option> 
																<option value="basic2">Basic 2 </option> 
																<option value="basic3">Basic 3 </option> 
																<option value="basic4">Basic 4 </option> 
																<option value="basic5">Basic 5 </option> 
																<option value="basic6">Basic 6 </option> 
																<option value="jss1">JSS 1 </option> 
																<option value="jss2">JSS 2 </option> 
																<option value="jss3">JSS 3 </option> 
																<option value="ss1">SS 1 </option> 
																<option value="ss2">SS 2 </option> 
																<option value="ss3">SS 3 </option> 
																
																</select>
																</div>


                                                            <div class="form-group">	
																<label>Question Type </label>
															<select  name='type' id='type'  class="form-control "  required >
																<option  value=""> select option </option> 
																<option value="test">Mid-Term Test </option> 
																<option value="exam">Exam </option> 
																
																</select>
																</div>






															<div class="form-group">			
															<label>Question Access Code  </label>
															<input type="text" name='access_code' id='access_code' placeholder=""   class="form-control"   required /><br/>
															Suggested access code: (<?php echo$result = $Loader->QuestionAccessSuggestion();?>)
														 </div>


 
												 
																   
																	
																	<input type="hidden" name="page"   value='uploadQuestion' />
																	<input type="hidden" name="action" value="question" />

																	<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Upload Question">
																</div>
															</form>



                                                            <div style="color:red;padding:20px">
                                                            Note:You must maintain the same  access code to upload specific subject Exam/Test questions. Each student will use 
															the access code to take the Exam/Test<br><br>

															Always keep your Exam/Test access code safe, else the Exam/Test won't be accessible by student 
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


 
<script>
 
 


 $(document).ready(function(){

  var elementmodal = document.getElementById('modal');



 

  $('#user_register_form2').on('submit', function(event){
    event.preventDefault();

 alert('good')
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


  });


  $('#user_register_form2').on('submit', function(event){
    event.preventDefault();

 alert('good')
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


  });
	
});

 
</script>







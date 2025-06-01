
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		require("../header.php");
		require("../title.php");
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


 

function tableSwitch(calend) {
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
						Upload Theory Question
						</h1>
                        <ol class="breadcrumb mb-4" >
                            <li class="breadcrumb-item" onclick="GoBackHandler()">Back </li>
							<li> / <a href="upload_question.php" style="text-decoration:none;"> Objective Question </a> / </li>  <li class="breadcrumb-item active"> Theory Question</li>
                        </ol>
                  
					  

                       

						   <div class="col-xl-6"> 
						 

										<div class="card mb-4">
												<div class="card-header">
													<i class="fas fa-user"></i>
												 THEORY QUESTION UPLOAD
												</div>

												<div class="card-body">
													<div class="table-responsive">
													





                                                        <div class="form-group ">
															<label for="name">Question Type</label>
															<select class="form-control" id="categories_selection"  name="categories_selection" onchange="tableSwitch(this.id)" required>
															<option value="">Select Question Option</option>
															<option value="withImage"> Question with image</option>
															<option value="withNoImage">Question with no image</option> 
															</select>
														 </div>

                                                    </div>


											<form method="POST"   id="user_register_form1" class="QuestionWithImage"  enctype='multipart/form-data'>


													<input type="hidden" name='school_code' id='school_code' value="<?php echo$school_code?>"  />




													<div class="card-header">
													<i class="fas fa-user"></i>
													Enter Access Code From Objective Question 
													</div>


													<div class="form-group">			 
													<input type="text" placeholder=""  name='access_code' id='access_code'   class="form-control" oninput=FetchQuesNumber(this.value)  required /><br/>
													

													<div id="dataCounElement1" class="text-color:success">
													 <div class="card-header">
													<i class="fas fa-user"></i>
													QUESTION INFO
													</div>
													You have <span  name='access_data1' id='access_data1' style="font-size:25px;font-weight:bold;color:green"> </span> question(s) uploaded on this access code<br/> 
 

													<div class="form-group"> 
														<div  id="QuestionAccess">  </div> 
													</div>

													<div class="form-group">
													<label>Select Question Image </label>
													<input type="file" name='question_img' id='question_img' style='height:50px;' class='form-control ' required/> 
													</div> 

													<div class="form-group">
													<label>Past Theory Questions </label> 
													<textarea name='question' id='question' style='height:200px;' class='form-control ' required></textarea>
													</div> 

													<br/>






													<input type="hidden" name="page"   value='uploadTheory' />
													<input type="hidden" name="action" value="question" />

													<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Upload Question">
													</div>


													</div>
													</div>







											</form>


											<form method="POST"   id="user_register_form2"  class="QuestionWithNoImage" enctype='multipart/form-data' style="padding:0px 15px 0px 15px">


													<input type="hidden" name='school_code' id='school_code' value="<?php echo$school_code; ?>"   />


													<div class="card-header">
													<i class="fas fa-user"></i>
													Enter Access Code From Objective Question 
													</div>



													<div class="form-group">	 
													<input type="text" placeholder="" name='access_code' id='access_code'  class="form-control" oninput=FetchQuesNumber(this.value)  required /><br/>
													

													<div id="dataCounElement" class="text-color:success">
												    <div class="card-header">
													<i class="fas fa-user"></i>
													QUESTION INFO
													</div>
													You have <span  name='access_data' id='access_data' style="font-size:25px;font-weight:bold;color:green"> </span> question(s) uploaded on this access code<br/> 
 													
													<div class="form-group"> 
														<div  id="QuestionAccess2">  </div> 
													</div>	

															<div class="form-group">
															<label>Past Theory Questions </label> 
															<textarea name='question' id='question' style='height:200px;' class='form-control ' required></textarea>
															</div> <br/> 
															





															<input type="hidden" name="page"   value='uploadTheory' />
															<input type="hidden" name="action" value="question" />

															<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Upload Question">
														</div>
													</div>
													 
													
										    </form>


                                                <div id="feedbackMsg" class="text-danger p-2">   </div>


													<small style="color:red;padding:20px">
													Upload Theory Question Must Read: 
													<br>1. Question uploader/Teacher must have the Objective question access code to upload the thoery part of the question 
													in order to have the questions objective and thoery combined
													<br><br>

												  </small>
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



 // Select the best option that fill in the gap.

//The students  _________________ are coming from the school 

 

  $('#user_register_form1').on('submit', function(event){
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


  });




});
	
var eleData = document.getElementById('dataCounElement');
var eleData1 = document.getElementById('dataCounElement1');
	
	  eleData.style.display="none";
	  eleData1.style.display="none";


  function FetchQuesNumber(val){
     FetchQuestionData(val);
	var eleData = document.getElementById('dataCounElement');
	var eleData1 = document.getElementById('dataCounElement1');
	
	 $.ajax({
        url:'pageajax.php',
        method:"POST",
		dataType:"json",
		data:{        
			sub_id_id:val,      
			page:'FetchNumberOfQuestion',
			action:'FetchNumberOfQuestion'
			},  
				success:function(data)
				{
					 
					  
					  if(data.success == 'success')
						  {
							eleData.style.display="block";
							eleData1.style.display="block";
							document.getElementById('access_data').innerHTML=data.feedback; 
							document.getElementById('access_data1').innerHTML=data.feedback; 
						  }else{
							   
							document.getElementById('feedbackMsg').innerHTML=data.feedback;
							 eleData.style.display="none";
							eleData1.style.display="none";
						  }
 
				}  

		
        })
         
  }
 

  function FetchQuestionData(val){
  $.ajax({
        url:'pageajax.php',
        method:"POST",
		dataType:"json",
		data:{        
			sub_id:val,      
			page:'QuestionAccessByID',
			action:'QuestionAccessByID'
			},  
				success:function(data)
				{ 
					document.getElementById('QuestionAccess').innerHTML=data.feedback;  
					document.getElementById('QuestionAccess2').innerHTML=data.feedback;  
				 
				}  

		
        })
  
		 
 }
</script>







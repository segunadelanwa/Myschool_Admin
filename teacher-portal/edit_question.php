 
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		require("../header.php");
		require("../title.php");
        require("index_header.php");
	 
		include("../topUrl.php"); 
	 
          
				if(isset($_GET["question_id"])){
		           
                    
				    $question_id ='';
					if(!empty($_GET["question_id"]))
					{
						$question_id = $_GET["question_id"];
					 
					}else{
						$question_id = "";
					}
				

					$Loader->query = "SELECT * FROM `50_question_table` WHERE  id='$question_id'"; 
					$total_row = $Loader->total_row(); 
					$result = $Loader->query_result(); 
					foreach($result as $rows)
					{
						$accesscode     = $rows['subject_id'];
						$sub_code       = $rows['cbt_subject'];
						$question_image = $rows['question_image'];
						$question_title = $rows['question_title'];
						$answer_option  = $rows['answer_option'];
						$student_class  = $rows['student_class'];
						$school_code    = $rows['school_code'];
						$cbt_status     = $rows['cbt_status'];
					}
					$subject =  $Loader-> FecthSingleSubject($sub_code);
					if($question_image == '')
					{
					  $Teaquestion_image ='';
					}else
					{	
					$Teaquestion_image  ="../$MainquesImg/$question_image";
					}




		} 


		?>
		
	<title> 
		 Questions
	</title>			
    </head>
 
	<script>
		function GoBackHandler(){
		history.go(-1)
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
                            <li class="breadcrumb-item"><a href="#"  onclick="GoBackHandler();">Back</a></li>
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
													

                                                    


														  <form method="POST"   id="user_register_form"  enctype='multipart/form-data'>
 
                                                          
                                                            <input type="hidden" name='school_code' id='school_code' value="<?php echo$school_code;?>"   readonly />
														  
                                                            <div class="card-header">
                                                            <i class="fas fa-user"></i>
                                                           QUESTION SECTION
                                                            </div> <br/>

                                                          <div class="form-group">	
																<label>Question Subject </label>
																<select id="subject" name="subject" class="form-control" >
																<option value="<?php echo$sub_code;?>" selected="selected"><?php echo$subject;?></option>

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
															<img src="<?php echo$Teaquestion_image;?>" style='height:120px;' />
															<input type="hidden" name='question_img_hidden' id='question_img_hidden'  value="<?php echo$question_image; ?>"  />
                                                            <input type="file" name='question_img' id='question_img' style='height:50px;' class='form-control '  /> 
														   </div> 

                                                           <div class="form-group">
														    <label>Type Question </label>
                                                            <input type="text" name='question' id='question' style='height:50px;' value="<?php echo$question_title;?>"  class='form-control '  /> 
														   </div> 

                                                   
                                                            <div class="form-group">			
															    <label>Question Options</label>
																<?php
																$Loader->query = "SELECT * FROM `51_question_option` WHERE  question_id ='$question_id'"; 
																$result = $Loader->query_result();
																$i=0;
																foreach($result as $row)
																{
																echo $optionData[$i]  =  '<input type="text" name="optTXT_'.$i.'"   value="'.$row['option_title'].'" class="form-control mb-4"     /><br/>';
																echo $optionData[$i]  =  '<input type="hidden" name="optID_'.$i.'"     value="'.$row['id'].'"      />';
																$i++;							
																

																
																} 
																?>
															</div>


                                                            <div class="form-group">	
																<label style="color:red;font-weight:bold;">Correct Option </label>
															<select  name='answer' id='answer'  class="form-control "    >
																<option  value="<?php echo$answer_option;?>" selected="selected"><?php echo$answer_option;?></option>
															   
																<?php

																	$i=0;
																	foreach($result as $rows)
																	{
																	echo $optionData[$i]  =  '<option>'.$rows['option_title'].' </option>';

																	$i++;
																	} 
																	?>
																</select>
																</div>
                                                            <br/>
                                                           <div class="card-header">
                                                            <i class="fas fa-user"></i>
                                                           QUESTION SETTINGS
                                                            </div>



                                                            <div class="form-group">	
																<label>Question Class </label>
															<select  name='class' id='class'  class="form-control "    >
															<option  value="<?php echo$student_class;?>" selected="selected"> <?php echo$student_class;?> </option> 
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
															<select  name='type' id='type'  class="form-control "    >
																<option  value="<?php echo$cbt_status;?>" selected="selected"> <?php echo$cbt_status;?> </option> 
																<option value="test">Mid-Term Test </option> 
																<option value="exam">Exam </option> 
																
																</select>
																</div>






															<div class="form-group">			
															<label>Question Access Code  </label>
															<input type="text" name='access_code' id='access_code' value="<?php echo$accesscode;?>"   class="form-control"   required /><br/>
															 
														    </div>


 
												 
																   
																	
																	<input type="hidden" name="question_id"   value='<?php echo$question_id; ?>' />
																	<input type="hidden" name="page"   value='AlterQuestion' />
																	<input type="hidden" name="action" value="question" />

																	<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Update Question">
																</div>
															</form>





                                                            <div style="color:red;padding:20px">
                                                            Note:Changing the access code of this subject Exam/Test questions will make you disassociate this question from other questions
															with this access code questions
															<br><br>

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



 

  $('#user_register_form').on('submit', function(event){
    event.preventDefault();


 
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
							window.location.reload();
							
					 
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



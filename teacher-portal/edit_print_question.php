<?php
			include("index_header.php");
			?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("../header.php"); 
		include("../topUrl.php"); 
	 
          
			 
						$teacher_code = $username;
						$subject_type        = $_GET["subject_id"];
					 
			             

					$Loader->query = "SELECT * FROM `50_question_table` WHERE  teacher_code='$teacher_code'"; 
					$total_row = $Loader->total_row(); 
					$result = $Loader->query_result(); 
					foreach($result as $active)
					{
						$schoolName    =  $Loader-> SchoolName($active['school_code']);
						$subject       =  $Loader-> FecthSingleSubject($active['cbt_subject']);	
						$cbt_status    =  $active['cbt_status'];	
						$student_class =  $active['student_class'];	
					}
 
		?>
		
	<title> 
		<?php echo $schoolName; ?> Questions
	</title>

    </head>
	
    <style>
    .myFont{
      font-size:12px
    
    }
    </style>


	
 

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
                        
                  
					 
  
						   <div class="col-md-12"> 
 				 
					 
					 
									 
										 
												
												<div class="card-body">
													
		 <div class="table-responsive">
														

 
		   
		   
		 <div id="otpupdatebox" style="background-color:white; padding:50px;margin-top:10px">
				 
					 
				 <div class="col-md-6"  id="formBox">

				  
					 <div class="form-group"  >			
					 <label>Enter question Access code   </label>
					 <input type="text" name='subject_id' id='subject_id'   class="form-control py-4"   required />
					 </div>						 

					 <div style="display:flex;justify-content:space-between">
						 <input type="submit"   id="categories_selection"  name="categories_selection" onclick="fetchQuestions()" class="btn btn-success" value="Fetch Question"> 
						 <div onclick="PrintDiv();" class="btn btn-info">Print Question </div>
						 <div onclick="RefreshDiv();" class="btn btn-dark">Refresh </div>
						 <a href="view_question.php" class="btn btn-success">Go Back </a>
					 </div>

				</div>
				  
				 <div id="printBox">

				 </div>
		   
			</div>



			</div>

			</div>


			</div>

 
		  
				 
 
				  </div>
                </main>
               
			   <footer class="py-4 bg-light mt-auto">
                   <?php 
				  // require("../footer.php"); 
				   ?>
                </footer>
				
				
            </div>
			
        </div>
    
    
     
		<?php 
			//BOTTOM JAVASCRIPT CODE 
			require("../footer2.php"); 
        ?>	 
 
 
    </body>
</html>

<script>
 




		function fetchQuestions() 
		{  


			var elementmodal = document.getElementById('modal');
			var subject_id     = document.getElementById('subject_id').value; 

			var username  = "<?php echo $username; ?>";
			var school_code          = "<?php echo$school_code; ?>"; 
			

		
					$.ajax({
						url:"pageajax.php",
						method:"POST", 
						data:{
									
							school_code:school_code,   
							username:username,   
							subject_id:subject_id,   
							page:'printQuestion',
							action:'printQuestion'
							}, 
						beforeSend:function()
						{
							
							elementmodal.classList.remove('loaderDisplayNone');
							elementmodal.classList.add('loaderDisplayblock');
						
						},
						success:function(data)
						{ 
							elementmodal.classList.remove('loaderDisplayblock');
							elementmodal.classList.add('loaderDisplayNone');
							$('#printBox').append(data);
								
						}
					});	

		}
	
 
		
	 var subject_type          = "<?php echo$subject_type; ?>";
		 

 if(!subject_type == ''){

  
	var elementmodal = document.getElementById('modal'); 

	var username  = "<?php echo $username; ?>";
	var school_code          = "<?php echo$school_code; ?>";


   
            $.ajax({
				url:"pageajax.php",
				method:"POST", 
				data:{
					        
					school_code:school_code,   
					username:username,   
					subject_id:subject_type,   
					page:'printQuestion',
					action:'printQuestion'
					}, 
				beforeSend:function()
				{
					
					elementmodal.classList.remove('loaderDisplayNone');
					elementmodal.classList.add('loaderDisplayblock');
				  
				},
				success:function(data)
				{ 
					elementmodal.classList.remove('loaderDisplayblock');
					elementmodal.classList.add('loaderDisplayNone');
					$('#printBox').append(data);
						   
				}
			});	
 

		}
 

 function PrintDiv() {  
	var formBox = document.getElementById('formBox'); 
	formBox.classList.add('loaderDisplayNone');
	window.print();
 }
 function RefreshDiv() {     
		window.location.reload();

 }



 

 </script>



 

 


 
 
 
 
 
 
 
 
 
 
 
 
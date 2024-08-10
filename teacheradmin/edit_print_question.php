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
						$type         = $_GET["type"];
					 
			             

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
				   <div style="display:flex; margin-bottom:20px;">
						<div onclick="PrintDiv();" class="btn btn-info" style="text-transform:uppercase;"> PRINT <?php echo $type; ?> QUESTION </div>
						<div onclick="RefreshDiv();" class="btn btn-dark">REFRESH </div>
					</div>

					<div style="display:flex">

				 	
															 
															<select  name='class' id='class_id'  class="form-control "    >
																<option  value="">--Select  class--</option>
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
					 


					 
												<select   id="categories_selection"  name="categories_selection" onchange="calender(this.id)"  class="form-control" >
													<option value="" selected="selected">--Select Subject--</option>

													<?php		
													$query = $Loader-> FecthAllSubject();
													foreach($query as $data)
													{
													$sub_title=$data['sub_title'];
													$sub_id=$data['sub_id'];  
													echo"<option  value='$sub_id'> $sub_title </option>";
													}

														?>
												</select>

			 

 
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
 




function calender(val) {  
	var elementmodal = document.getElementById('modal');
	var class_id     = document.getElementById('class_id').value; 
	var calend       = document.getElementById(val);

	var teacher_code  = "<?php echo $teacher_code; ?>";
	var type          = "<?php echo$type; ?>";
   // alert(calend.value);

	
            $.ajax({
				url:"../pageajax.php",
				method:"POST", 
				data:{
					     
					type:type,   
					class_id:class_id,   
					teacher_code:teacher_code,   
					subject_id:calend.value,   
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
	window.print();
 }
 function RefreshDiv() {     
		window.location.reload();

 }



 

 </script>



 

 


 
 
 
 
 
 
 
 
 
 
 
 
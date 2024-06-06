				<?php
				include("index_header.php");
				?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("../header.php");

				if(isset($_GET["student_id"])){
		$student_id ='';
                   $studID = $_GET["student_id"];
				   
					if(!empty($studID))
					{
						$student_id = $_GET["student_id"];
					}else{
						$student_id = "";
					}
				
				}

		?>
			
    </head>
	
<style>

#MaintenanceDate, #setdaily, #setmonthly,#setyearly{
display:none
}
#MaintenanceHours{
display:none
}

</style>


	
 

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
					          <i class="fas fa-book"></i> Registered Subjects   
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item">
							 
							<?php
									if(!empty($student_id))
									{
									echo" <a href='student_subject_setup.php?student_id=$student_id'>Add Subject</a>";
									}else{
									echo" <a href='student_subject_setup.php'>Add Subject</a>";
									}
							?>
							</li>
                            <li class="breadcrumb-item active">Student Subjects</li>
                        </ol>
                  
					 
  
						   <div class="col-md-12"> 
 				 
					 
					 
									 
												<div class="card-header">
													<i class="fas fa-briefcase"></i>
												Enter Student Online ID
												</div>
												
												<div class="card-body">
													
													<div class="table-responsive">
														

 		 	 <form id="searchForm" method="POST" Action="">
	 

			   <div class="form-row">
			   
				   <div class="form-group col-md-6">
					   <label for="name">Enter Student Online ID</label>
					   <input type="text" name="stu_online_id" class="form-control" id="stu_online_id" placeholder="Student Online ID" required>
				   </div>

 

			   </div>
             

			
			<input  type="submit" id="nameSearch" name="" class="btn btn-warning" value="Check Student Registerd Subject" /> 
			<a href="student_subject_check.php"  class="btn btn-primary">Refresh    </a>			
			

			
		   </form>
		   
		   
	   		<div id="otpupdatebox" style="background-color:white; padding:50px;margin-top:10px">


			</div>
			<div id="outputupdate">


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
    
    
     
  <script >



			function removeSubject(a, b) {

			 
				 
				
						$.ajax({
							url:"../pageajax.php",
							method:"POST", 
							data:{
								stu_online_id:b,      
								subject_id:a,   
								page:'subjectSetup',
								action:'removeSubjectID'
								}, 
							success:function(data)
							{
							          alert(data);
									  location.href='student_subject_check.php?student_id='+b;
												 
								 
							 
							}
						});	
			 
			 

			}



</script>
 
 
    </body>
</html>


<script>

 var	stu_online_id = "<?php echo $student_id; ?>";



		 
				$.ajax({
				url:"../pageajax.php",
				method:"POST",
				data:{
					stu_online_id:stu_online_id,   
					page:'subjectSetup',
					action:'checkSubjects'
					},
			
				success:function(data)
				{
				$('#otpupdatebox').append(data);
				
				$('#nameSearch').attr('disabled', true); 
				$('#nameSearch').removeClass('btn-warning');
				$('#nameSearch').addClass('btn-success');
				$('#nameSearch').text('Search success'); 
				 
				}
			});	






</script>



<script>


 	$(document).on('click', '#nameSearch', function(event){
    event.preventDefault();
	
    const	stu_onlineid = document.getElementById("stu_online_id").value; 
	//alert(searchNo);
	 
 	
			$.ajax({
				url:"../pageajax.php",
				method:"POST",
				data:{
					stu_online_id:stu_onlineid,   
					page:'subjectSetup',
					action:'checkSubjects'
					},
			
				success:function(data)
				{
				$('#otpupdatebox').append(data);
				
				$('#nameSearch').attr('disabled', true); 
				$('#nameSearch').removeClass('btn-warning');
				$('#nameSearch').addClass('btn-success');
				$('#nameSearch').text('Search success'); 
				 
				}
			});	
		 
		
	});






</script>



 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



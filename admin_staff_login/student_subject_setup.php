				<?php
				include("index_header.php");
				?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("../header.php");
		
				if(isset($_GET["student_id"])){
					
				$student_id = $_GET["student_id"];
				}

		?>
			
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    </head>
	
<style>

#MaintenanceDate, #setdaily, #setmonthly,#setyearly{
display:none
}
#MaintenanceHours{
display:none
}

</style>


	
<script type="text/javascript">

 

function calender(calend) {
     var calend = document.getElementById(calend);
     const main_d_btn = document.querySelector('#MaintenanceDate');
	 const hours_d_btn = document.querySelector('#MaintenanceHours');
	 
  
	 if(calend.value == "calender"){
		 
	     main_d_btn.style.display="block";
		 hours_d_btn.style.display="none";
		 
	 }else if(calend.value == "run_hour"){
		 
		 hours_d_btn.style.display="block";
		 main_d_btn.style.display="none";
	 }
	 
 
}





</script> 
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
					          <i class="fas fa-briefcase"></i>Subject Setup
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Student Subject Setup</li>
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
             

			
			<input  type="submit" id="nameSearch" name="" class="btn btn-warning" value="Search Student" /> 
			<a href="student_subject_setup.php"  class="btn btn-primary">Refresh    </a>			
			

			
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
    
    
        <script src="js/scripts.js"></script>
  <script>



function addSubject(val1,val2) {
	// const	stu_online_id = document.getElementById("stu_online_id").value; 
	
	 
	
 			$.ajax({
				url:"../pageajax.php",
				method:"POST", 
				data:{
					stu_online_id:val2,   
					subject_id:val1,   
					page:'subjectSetup',
					action:'updateSubjectID'
					}, 
				success:function(data)
				{
	                 
						  alert(data);
						  //location.href='student_subject_.php?student_id='+val2;
						  
					 
				 
				}
			});	
 
 

}



</script>
     
 
    </body>
</html>


<script>
 
 	$(document).on('click', '#nameSearch', function(event){
    event.preventDefault();
	
    const	stu_online_id = document.getElementById("stu_online_id").value; 
	 //alert(searchNo);
	 
 	
			$.ajax({
				url:"../pageajax.php",
				method:"POST",
				data:{
					stu_online_id:stu_online_id,   
					page:'subjectSetup',
					action:'searchStudent'
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

<script>

 var	stu_online_id = "<?php echo $student_id; ?>";

				$.ajax({
				url:"../pageajax.php",
				method:"POST",
				data:{
					stu_online_id:stu_online_id,   
					page:'subjectSetup',
					action:'searchStudent'
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




 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



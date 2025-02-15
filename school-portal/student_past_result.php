				<?php
				include("index_header.php");
				?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("../header.php");
  
		?>
			 <title>Student Past Result</title>	
    </head>
	
<style>

#MaintenanceDate, #setdaily, #setmonthly,#setyearly{
display:none
}
#MaintenanceHours{
display:none
}

</style>


<script>
 function GoBackHandler(){
 history.go(-1)
 }	


</script> 	
<style>
.loaderDisplayNone {
display:none;
}

</style>




  <body class="sb-nav-fixed">

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
                            <div id="headerfluid">
                                <h1 class="mt-4"> 
                                    <i class="fas fa-book-open"></i> Student Past Result   
                                </h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item"onclick="GoBackHandler();">Back</li>
                        
                                    <li class="breadcrumb-item active">Past Result</li>
                                </ol>
                            </div>
					 
  
						   <div class="col-md-12"> 
 				 
					 
					 
									 
											 
												
												<div class="card-body">
													
													<div class="table-responsive">
														

 		 	 <form id="searchForm" method="POST" Action="">
	  
				   <div class="form-group col-md-4">
					   <label for="name">Enter Student Online ID</label>
					   <input type="text" name="result_student" class="form-control" id="result_student" placeholder="Student ID" required>
				   </div>
 
       			 <div class="form-group col-md-4">
					   <label for="name">Result Year</label>
					   <input type="text" name="result_year" class="form-control" id="result_year" placeholder="2025" required>
				   </div>
                   
                   <div class="form-group  col-md-4">			
                       <label>Select Term </label>
                        <select   name="result_term"  id="result_term" class="form-control"   required>
                        <option  value="1st">First Term</option>   
                        <option  value="2nd">Second Term</option>   
                        <option  value="3rd">Third Term</option>   
                        </select> 
                    </div>

                <div class="form-group col-md-4">
                    <input  type="submit" id="nameSearch" name="" class="btn btn-warning" value="Fetch Result" /> 
                    <a href="student_past_result.php"  class="btn btn-primary">Refresh    </a>	<br/>	
                  	
                </div>
                 <div   class="btn btn-success" onclick="PrintDiv();">Click here to download result</div>
			
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
               
			   <footer class="py-4 bg-light mt-auto " id="footer">
                   <?php 
				   require("../footer.php"); 
				   require("../footer2.php"); 
				   ?>
                </footer>
				
				
            </div>
			
        </div>
    
    
     
 
 
 
    </body>
</html>

 


<script>


 	$(document).on('click', '#nameSearch', function(event){
    event.preventDefault();
	
    const	result_student = document.getElementById("result_student").value; 
    const	result_year = document.getElementById("result_year").value; 
    const	result_term = document.getElementById("result_term").value; 
	//alert(searchNo);
	 
 	
			$.ajax({
				url:"pageajax.php",
				method:"POST",
				data:{
					result_student:result_student,   
					result_year:result_year,   
					result_term:result_term,   
					page:'subjectSetup',
					action:'checkPastResult'
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




    function PrintDiv() {  
	var formBox = document.getElementById('searchForm'); 
	var layoutSidenav = document.getElementById('layoutSidenav'); 
	var layoutSidenav_nav = document.getElementById('layoutSidenav_nav'); 
	var headerfluid = document.getElementById('headerfluid'); 
	var footer = document.getElementById('footer'); 


	layoutSidenav.classList.add('loaderDisplayNone');
	layoutSidenav_nav.classList.add('loaderDisplayNone');
	formBox.classList.add('loaderDisplayNone');
	headerfluid.classList.add('loaderDisplayNone');
	footer.classList.add('loaderDisplayNone');
	window.print();
	// console.log(formBox)
 }


</script>



 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



<?php
			include("index_header.php");
			?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("../header.php"); 
		include("../topUrl.php"); 
	 
          
 


 
		?>
		
	<title> 
		UPDATE STUDENT CLASS TEACHER
	</title>

    </head>
	
    <style>
    .myFont{
      font-size:12px
    
    }
    </style>


	
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
					          <i class="fas fa-book"></i>Update class Teacher
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item" onclick="GoBackHandler()">Back</li>
                       
                            <li class="breadcrumb-item active">Update class Teacher   </li>
                        </ol>
                  
					 
  
						   <div class="col-md-12"> 
 				 
					 
					 
									 
										 
												
												<div class="card-body">
													
		 <div class="table-responsive">
														

 
		   
		   
	   		    <div id="otpupdatebox" style="background-color:white; padding:50px;margin-top:10px">
                   <div id="printBox">

                   </div>


                   <form id="searchForm" method="POST" Action="">
				     <p>To update student teacher, please kindly fill the form below correctly. Thanks <br/><br/><br/></p>
					<div class="form-group col-md-6"> 
                    <label>Student ID/Code   <l/abel>  
					<input class="form-control" placeholder=""   type="text" name="student_id" id="student_id" class="form-control"  required/>
					</div>


                    <div class="form-group col-md-6"> 
                    <label>School ID/Code   <l/abel>  
					<input class="form-control" placeholder=""   type="text" name="school_id" id="school_id" class="form-control"  required/>
					</div>


                    <div class="form-group col-md-6"> 
                    <label>Teacher  ID/Code <l/abel>  
					<input class="form-control" placeholder=""   type="text" name="teacher_id" id="teacher_id" class="form-control"  required/>
					</div>

                    <div class="form-group col-md-6"> 
                    <input  type="submit" id="nameSearch" name="" class="btn btn-success" value="Update Student Teacher" /> 
                    </div>

                    <form>

              
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


$(document).on('submit', '#searchForm', function(event){
event.preventDefault();

const	student_id = document.getElementById("student_id").value; 
const	school_id  = document.getElementById("school_id").value; 
const	teacher_id = document.getElementById("teacher_id").value; 

 

       $.ajax({
           url:"../pageajax.php",
           method:"POST",
           data:{
               student_id:student_id,   
               school_id:school_id,   
               teacher_id:teacher_id,   
               page:'updateStuTeacher',
               action:'updateStuTeacher'
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

 
 



 

 


 
 
 
 
 
 
 
 
 
 
 
 
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
		STUDENT ID CARD VALIDATION
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
                    <h1 class="mt-4"> 
					          <i class="fas fa-book"></i>Student ID Card Validation
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item" onclick="GoBackHandler()">Back</li>
                       
                            <li class="breadcrumb-item active">Student ID Card Validation  </li>
                        </ol>
                  
					 
  
						   <div class="col-md-12"> 
 				 
					 
					 
									 
										 
												
												<div class="card-body">
													
		 <div class="table-responsive">
														

 
		   
		   
	   		    <div id="otpupdatebox" style="background-color:white; padding:50px;margin-top:10px">
                   <div id="printBox">

                   </div>


                   <form id="searchForm" method="POST" Action="">

					


                    <div class="form-group col-md-6"> 
                    <label>Student ID  <l/abel>  
					<input class="form-control"    type="text" name="stud_id" id="stud_id" class="form-control"  required/>
					</div>


                    <div class="form-group col-md-6"> 
                    <label>Validate ID Card <l/abel>  
					<input class="form-control"   type="date" name="valid_date" id="valid_date" class="form-control"  required/>
					</div>
                     

                    <div class="form-group col-md-6"> 
                    <input  type="submit" id="nameSearch" name="" class="btn btn-success" value="Validate ID Card" /> 
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

    

 $(document).ready(function(){


  var elementmodal = document.getElementById('modal');

        $(document).on('submit', '#searchForm', function(event){
        event.preventDefault();

        const	stud_id = document.getElementById("stud_id").value; 
        const	valid_date  = document.getElementById("valid_date").value;  
       
        
            if(stud_id != '' && valid_date != '')
            {
                    $.ajax({
                        url:"pageajax.php",
                        method:"POST",
                        data:{
                            stud_id:stud_id,   
                            valid_date:valid_date,    
                            page:'validateIDcard',
                            action:'validateIDcard'
                        },
                        dataType:"json",
                        // contentType:false,
                        // cache:false,
                        // processData:false, 
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
                                    window.location='index.php';
                                    
                            
                                }else{
                                    
                                    elementmodal.classList.remove('loaderDisplayblock');
                                    elementmodal.classList.add('loaderDisplayNone');	
                                    alert(data.feedback);
                                    window.location.reload();

                                
                                }
                            
                        }
                    });	
            }
            else
            {
                alert('Data field must not be emptied, please try again')
            }
        
        });


});



</script>

 
 



 

 


 
 
 
 
 
 
 
 
 
 
 
 
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
		School Payment Update
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
										<h2 class="mt-4">    School Payment Update </h2>
										<ol class="breadcrumb mb-4">
											<li class="breadcrumb-item" onclick="GoBackHandler()">Back</li>
									
											<li class="breadcrumb-item active">School Payment Update   </li>
										</ol>
								
									
				
									<div class="col-md-12">  
										<div class="card-body"> 				
											<div class="table-responsive">
												
											  <div id="otpupdatebox" style="background-color:white; padding:50px;margin-top:10px">
												<div id="printBox">

												</div>


												<form id="searchForm" method="POST" Action="">
													<p>To update school payment, please kindly fill the form below correctly. Thanks <br/><br/><br/></p>
											

													<div class="form-group col-md-6"> 
													<label>School ID/Code   <l/abel>  
													<input class="form-control" placeholder=""   type="text" name="school_code" id="school_code" class="form-control"  required/>
													</div>


													<div class="form-group col-md-6"> 
													<label>Amount Paid <l/abel>  
													<input class="form-control" placeholder=""   type="number" name="amount_paid" id="amount_paid" class="form-control"  required/>
													</div>


													<div class="form-group col-md-6">
													<label>Approve option <l/abel> 
														<select   id="categories_selection"  name="categories_selection"   class="form-control" required>
															<option value="" selected="selected"> --Select Option-- </option>   
															<option value="paid">Approve school Payment</option>       
														</select>
												    </div>


													<div class="form-group col-md-6"> 
													<input  type="submit" id="nameSearch" name="" class="btn btn-success" value="Submit" /> 
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

const	school_code = document.getElementById("school_code").value; 
const	amount_paid  = document.getElementById("amount_paid").value; 
const	categories_selection = document.getElementById("categories_selection").value; 

 

       $.ajax({
           url:"../pageajax.php",
           method:"POST",
           data:{
               school_code:school_code,   
               amount_paid:amount_paid,   
               categories_selection:categories_selection,   
               page:'schoolPaymentApproval',
               action:'schoolPaymentApproval'
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

 
 



 

 


 
 
 
 
 
 
 
 
 
 
 
 
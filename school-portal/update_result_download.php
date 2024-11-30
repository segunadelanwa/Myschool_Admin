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
		STUDENT CBT APP PAYMENT APPROVE PAGE
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
                        
                  
					 
  
						   <div class="col-md-12"> 
 				 
					 
					 
									 
										 
												
												<div class="card-body">
													
		 <div class="table-responsive">
														

 
		   
		   
	   		    <div id="otpupdatebox" style="background-color:white; padding:50px;margin-top:10px">
					   <h3 style="text-align:center;">Student E-Result Sheet Release</h3>
					   <div style="display:flex">
					   <div   onclick="GoBackHandler()" class="btn btn-primary mr-4">BACK </div> 
						<div onclick="RefreshDiv();" class="btn btn-dark">REFRESH </div>
					</div><br/>

				    <div style=" ;margin-top:50px">
                    <?php
                   $result= $Loader->DownloadStudentResultStatus($school_code);

                   if( $result == 'inactive'){
                        echo '<div class="col-md-6 btn-danger" style="text-align:center;font-size:20px;padding:20px">E-Result Sheet Not Approved For  Download   </div>';
                   }if( $result == 'active'){
                        echo '<div class="col-md-6 btn-success" style="text-align:center;font-size:20px;padding:20px">E-Result Sheet Approved For  Download </div>';
                   }
                    ?>                        
					



					<div class="form-group col-md-6 mt-5">
					<select   id="categories_selection"  name="categories_selection" onchange="calender(this.id)"  class="form-control" >
						<option value="" selected="selected">--Select Command--</option>
						<option value="active">Enable E-Result Sheet for Download </option>  
						<option value="inactive">Disable E-Result Sheet for Download </option>  
					</select>
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
 




function calender(val) {  
	var elementmodal = document.getElementById('modal');
	var class_id     = document.getElementById('categories_selection').value;  


 
            $.ajax({
				url:"pageajax.php",
				method:"POST", 
				data:{   
					approve_status:class_id,   
					page:'approveEresultDownload',
					action:'approveEresultDownload'
					}, 
				beforeSend:function()
				{
					
					elementmodal.classList.remove('loaderDisplayNone');
					elementmodal.classList.add('loaderDisplayblock');
				  
				},
				success:function(data)
				{ 
                 window.location.reload();
						   
				}
			});	
 
 
 }



 

 
 function RefreshDiv() {     
		window.location.reload();

 }



 

 </script>



 

 


 
 
 
 
 
 
 
 
 
 
 
 
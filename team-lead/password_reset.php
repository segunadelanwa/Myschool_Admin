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
	RESET ALL ACCOUNT PASSWORD
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
				   <div style="display:flex">
					
						<div   class="btn btn-success mr-4">PASSWORD RESET </div>
						<div onclick="RefreshDiv();" class="btn btn-dark">REFRESH </div>
					</div><br/>
				<div style="display:flex">
					<div class="form-group col-md-6"> 
					<input class="form-control" placeholder=" Enter account ID/code"   type="text" name="class_id" id="class_id" class="form-control"  />
					</div>



					<div class="form-group col-md-6">
					<select   id="categories_selection"  name="categories_selection" onchange="calender(this.id)"  class="form-control" >
						<option value="" selected="selected">--Select Account--</option>
						<option value="field_admin">Field Admin Account</option>       
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
	var class_id     = document.getElementById('class_id').value; 
	var calend       = document.getElementById(val);


   if(class_id.length > 3){
            $.ajax({
				url:"pageajax.php",
				method:"POST", 
				data:{
					     
					  
					account_code:class_id,      
					approve_status:calend.value,   
					page:'approveResetPassword',
					action:'approveResetPassword'
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

   }else{

       alert('Student ID code field can not be empty' )
   }

	

 
 }



 function PrintDiv() {     
	window.print();
 }


 
 function RefreshDiv() {     
		window.location.reload();

 }



 

 </script>



 

 


 
 
 
 
 
 
 
 
 
 
 
 
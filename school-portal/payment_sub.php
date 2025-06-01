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
		STUDENT PORTAL ACTIVATION
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
					   <h3 style="text-align:left;">Student Portal Activation</h3>
					   <div style="display:flex;margin-top:50px">
					   <div   onclick="GoBackHandler()" class="btn btn-primary mr-4">BACK </div>
						<div onclick="PrintDiv();" class="btn btn-success mr-4">PRINT RECEIPT </div>
						<div onclick="RefreshDiv();" class="btn btn-dark">REFRESH </div>
					</div><br/>
				    <div style="display:flex">
					<div class="form-group col-md-6"> 
					<input class="form-control" placeholder="Student ID/Code"   type="text" name="class_id" id="class_id" class="form-control"  />
					</div>



					<div class="form-group col-md-6">
					<select   id="categories_selection"  name="categories_selection" onchange="calender(this.id)"  class="form-control" >
						<option value="" selected="selected">--Select Subject--</option>
						<option value="active">Approve payment </option>  
						<option value="status">Check Payment </option>  
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
					     
					  
					student_code:class_id,      
					approve_status:calend.value,   
					page:'approvePayment',
					action:'approvePayment'
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



 

 


 
 
 
 
 
 
 
 
 
 
 
 
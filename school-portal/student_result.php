<?php
				include("index_header.php");
				?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php

		include("../e_result_server.php");
		$ResultServer = new ResultServer();

		include("../header.php");
		require("../topUrl.php");
		$year = date("Y");
		$month = date("M");
				if(isset($_GET["student_id"]))
				{

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
			<title> 
		<?php echo$stu_name = $_GET["name"]; ?> Result
	</title>	
    </head>
	
 

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

 	

	
	
	
       
		
  <div id="layoutSidenav">
		
       
		<div id="layoutSidenav_content">
		 
				
					 
					 <div class="row mb-4 " id="formBox">
						 <div   class="btn btn-primary mr-5" onclick="GoBackHandler()" >Back</div> 
						 <div   class="btn btn-success" onclick="PrintDiv();">Click here to download result</div>
					  </div>
			   
				  

						<div class="col-md-12">  
				  
							 
							 <div lass="table-responsive p-5">
									



											<div id="otpupdatebox" style="background-color:white; padding:10px;">
													<?php
															if(isset($_GET["student_id"]))
														{
															
															$online_stu_id = trim($_GET["student_id"]);

															echo $ResultServer->EserverResultFetch($online_stu_id);
															
															
														}
														else
														{
															
															
															echo $failed ='
																		<div class="col-xl- col-md-6">
															<div class="alert alert-white alert-dismissible fade show" role="alert">
															<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
																			
																			Invalid Online Student ID  inserted. Please check table below to get  Online Student ID
																			
															<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
															</div>  
															</div>';
																
															
															
															
														}
																	
																	
														
													 

													?>
											</div>




								</div>
										
								 
	                       </div>
 
       	
            </div>
			
        </div>
    
    
     
   
 
    </body>
</html>


<script>
     
	 function PrintDiv() {  

		var formBox = document.getElementById('formBox'); 
		formBox.classList.add('loaderDisplayNone');
		window.print();

     }


</script>


 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



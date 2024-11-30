<?php
				include("index_header.php");
				?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("../header.php");
		require("../topUrl.php");
		$year = date("Y");
		$month = date("M");
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
			<title> 
		<?php echo$stu_name = $_GET["name"]; ?> Result
	</title>	
    </head>
	
 

	<script>
		function GoBackHandler(){
		history.go(-1)
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
                        
                        <ol class="breadcrumb mb-4">
                        <ol class="breadcrumb mb-4">
						<li class="breadcrumb-item" onclick="GoBackHandler();">Back</li>
                   
                            <li class="breadcrumb-item active" >Reset Student Test</li>
                        </ol>
                        </ol>
                  
					 
  
						   <div class="col-md-12">  
												
												<div class="card-body">
													
													<div class="table-responsive">
														
 
		   
		   
																<div id="otpResetbox" style="background-color:white; padding:50px;">
																	 
																		<?php

                                                                            $online_stu_id = trim($_GET["student_id"]);
																			include("../e_result_server.php");  
																			$ResultServer = new ResultServer();		
																			
																			echo $ResultServer-> EserverStudentResetTest($online_stu_id)
																		?>
																</div>
			 
 

				   
													</div>
										
										</div>
										 
					  
	                       </div>

 
		  
				 
 
				  </div>
                </main>
               
			  
				
				
            </div>
			
        </div>
    
    
     
   
 
    </body>
</html>


<script>
     
 

 function addSubject(sub_id,stu_code) {
	  
 
// console.log(stu_code)
// console.log(sub_id)
	 
	
 			$.ajax({
				url:"pageajax.php",
				method:"POST", 
				data:{
					resultType:'test',      
					stu_online_id:stu_code,   
					subject_id:sub_id,   
					page:'subjectSetup',
					action:'resetStudentScore'
					}, 
				success:function(data)
				{ 
				 window.location.reload();
						   
				}
			});	
 
 



 }
 </script>


 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



			<?php
			include("index_header.php");
			?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("../header.php"); 
	 
          
				if(isset($_GET["payee_id"])){
		           
                    
				    $payee_id ='';
					if(!empty($_GET["payee_id"]))
					{
						$payee_id = $_GET["payee_id"];
					}else{
						$payee_id = "";
					}
				
				} 
		?>

	<title> 
		<?php echo$payee_name = $_GET["name"]; ?>
	</title>

    </head>
	
 


	
 

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
                        <h1 class="mt-4"> 
					          <i class="fas fa-book"></i> Payment History  
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                       
                            <li class="breadcrumb-item active">Payment History </li>
                        </ol>
                  
					 
  
						   <div class="col-md-12"> 
 				 
					 
					 
									 
												<div class="card-header">
													<i class="fas fa-briefcase"></i>
												Enter Payee ID
												</div>
												
												<div class="card-body">
													
		 <div class="table-responsive">
														

 
		   
		   
	   		<div id="otpupdatebox" style="background-color:white; padding:50px;margin-top:10px">

				<?php 
							if(isset($_GET["payee_id"]))
							{
								
								
											$payee_id = $_GET["payee_id"]; 
											$payee_name = $_GET["name"]; 
											$result   = $Loader->PaymentHistory($payee_id);	 

											if($Loader->PaymentHistoryCount($payee_id,$school_code) > 0)
											{

											
											   echo'	 
											   <div class="card mb-4">
																		<div class="card-header bg bg-success text-white">
																			<i class="fas fa-table mr-1"></i>
																		<h3>'.$payee_name.' Payee History  </h3>
																		</div>
												<div class="card-body">
													<div class="table-responsive">
																<table class="table table-bordered" id="dataTable_5" width="100%" cellspacing="0">
																
															
																				<thead>
																					<tr>
																						<th>Transaction ID </th>  
																						<th>Payee ID</th> 
																						<th>Amount Paid</th>
																						<th>Status </th>
																						<th>Date</th> 
																						
																					</tr>
																				</thead> 
																				<tbody> ';
																				foreach($result as $active)
																				{ 
																				
																						echo'<tr role="row" class="odd">  
																							<td>'.$active['trans_id'].' </td>  
																							<td>'.$active['trans_user'].' </td> 
																							<td>N'.number_format($active['trans_amt'],2).' </td> 
																							<td>'.$active['trans_caption'].' </td> 
																							<td>'.$active['trans_date'].' </td>  
																						</tr>'; 
																				
																				}					
																		echo'</tbody>
															</table>
														</div>
													</div>
												</div>'; 

											}							
											else
											{
												
												
											echo $failed ='
												<div class="col-xl- col-md-6">
												<div class="alert alert-danger alert-dismissible fade show" role="alert">
												<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
													
												No payment history found or invalid URL

												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
												</div>  
												</div> 
												';
											}


							}
				?>
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
    
    
     
		<?php 
			//BOTTOM JAVASCRIPT CODE 
			require("../footer2.php"); 
        ?>	 
 
 
    </body>
</html>


 

 


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



<?php
			include("index_header.php");
			?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("../header.php");    
		?>
		
	<title> 
	TICKET BACKLOG
	</title>

    </head>
	
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
                        <h1 class="mt-4 transform-capitalize"> 
					          <i class="fas fa-briefcase"></i> Open Ticket Backlog
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item" onclick="GoBackHandler()"> Back</li>
                            <li class="breadcrumb-item active">  post</li>
                        </ol>
                  
					 
  
						   <div class="col-md-12"> 
 				 
					 
					 
									 
												<div class="card-header">
													<i class="fas fa-briefcase"></i>
                                                Ticket  Backlog
												</div>
												
												<div class="card-body">
													
													<div class="table-responsive">
														
 
 

				   
													</div>
										
										</div>
										 
					  
	                       </div>

						 <div class="card mb-4">
                         
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable_7" width="100%" cellspacing="0">
	          
                                        <thead>
                                            <tr> 
                                                 
                                                <th>Ticket ID</th> 
                                                <th>School / Ticket Title</th> 
                                                <th>Department</th>           
                                                <th>Ticket Status</th>           
                                                <th>Date </th> 
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
                                                    <?php 
                                                  
                                                  $result = $Loader-> FetchTicket($marketer_code);

                                                  foreach($result as $active)
                                                  {

											 
													if($active['unit'] == 'tech'){
														$inArray = "Technical Unit";
													  }else{
														$inArray = "Customer Service Desk";
													  }
													  if($active['status'] == 'open'){
														$status = "<div class='btn btn-danger mb-1'>Ticket Open  </div> ";
													}else if($active['status'] == 'close'){
													  $status = "<div class='btn btn-success mb-1'>Ticket Closed  </div> ";
													}

													  $school_name = $Loader->SchoolName($active['school_code']);
                                                      echo'
													  <tr role="row" class="odd">
														<td>   
															'.$active['ticket_id'].'<hr/> 
															<a  href="ticket_open.php?ticket='.$active['ticket_id'].'">
															<div class="btn btn-success mb-1">View Ticket</div>
															</a> 
														
														</td> 

														<td>  '.$school_name.' <hr/>'.$active['subject'].' </td>
														<td> '.$inArray.'</td>
														<td> '. $status.' </td>  
														<td>'.$active['answered_date'].' </td>   
                                                      </tr> 
                                                      ';
                                                


                                                    
                                                  } 	 
                                                ?>                     
                                        
                                          </tbody>
                                   
								                                    
								                    </table>
                               
                                </div>
                            </div>
               
						 </div>
						
                
				




					
				 
				 
 
				  </div>
                </main>
               
			   <footer class="py-4 bg-light mt-auto">
					<?php  
					require("../footer2.php"); 
					?>	
                </footer>
				
				
            </div>
			
        </div>
    
    
 
   
    </body>
</html>


<script>
 
 	 function postReviewOps(id, cat){
 
 
			$.ajax({
				url:"pageajax.php",
				method:"POST",
				dataType:"json",
				data:{
					post_id:id,   
					post_cat:cat,   
					page:'NewsletterOps',
					action:'NewsletterOps'
					},
			
				success:function(data)
				{
					if(data.success == 'success')
					{
						alert(data.feedback);
						location.href='post_review.php';
					}
					else
					{
						alert(data.feedback);
					
					}
 
				}
			});	
		 
		
}

 

</script>



 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



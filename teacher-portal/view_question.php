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
	 QUESTION REVIEW
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
					          <i class="fas fa-briefcase"></i>Question Review
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item" onclick="GoBackHandler()"> Back</li>
                            <li class="breadcrumb-item active">Question </li>
                        </ol>
                  
					 
  
						   <div class="col-md-12"> 
 				 
					 
					 
									 
												<div class="card-header">
													<i class="fas fa-briefcase"></i>
													Question Review
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
                                                 
                                                <th>Operation</th> 
                                                <th>Question Access Code</th> 
                                                <th>Question Class</th> 
                                                <th>Question Subject</th> 
                                                <th>Question Available</th> 
                                                <th>Date</th>   
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
                                                    <?php 
                                                  
                                                  $result = $Loader-> FetchQuestion($school_code,$username);
                                                 
                                                  foreach($result as $active)
                                                  {
                                                     $subject_id =  $active['subject_id'];
                                                       $sub_title = $Loader-> FecthSingleSubject($active['cbt_subject']);
                                                       $quesNo = $Loader-> FetchNumberOfQuestion($active['subject_id'],$school_code,$username);
                                                      echo'
													  <tr role="row" class="odd">
														<td>   
														 
															<a  href="edit_print_question.php?subject_id='.$active['subject_id'].'">
															<div class="btn btn-success mb-1">Expand Question</div>
															</a> <br/>';
															echo"<a  href='#' onclick='deleteSubject(\"$subject_id\")' >";
															 echo'<div class="btn btn-danger mb-1">Delete Question</div>
															</a> 
														
														</td> 

														<td> '.$active['subject_id'].'</td>  
														<td>'.$active['student_class'].' </td>   
														<td>'.$sub_title.' </td>   
														<td>'.$quesNo.' Question(s)</td>   
														<td>'.$active['date_uploaded'].' </td>   
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

 
     function deleteSubject(sub_id) {
         
     
      alert(sub_id)    
         
                //  $.ajax({
                //      url:"pageajax.php",
                //      method:"POST", 
                //      data:{        
                //          delete_id:sub_id,   
                //          category:'deleteQuestion',   
                //          page:'delete',
                //          action:'deleteAccount'
                //          }, 
                //      success:function(data)
                //      {  
                  
                //      alert(data)
                //       window.location.reload();
                             
                //      }
                // });	
   
     }
</script>



 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



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
	 SCHOOL NEWSLETTER
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
					          <i class="fas fa-briefcase"></i>Newsletter Post
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item" onclick="GoBackHandler()"> Back</li>
                            <li class="breadcrumb-item active">  post</li>
                        </ol>
                  
					 
  
						   <div class="col-md-12"> 
 				 
					 
					 
									 
												<div class="card-header">
													<i class="fas fa-briefcase"></i>
                                               Newsletter post
												</div>
												
												<div class="card-body">
													
													<div class="table-responsive">
														
 
 

				   
													</div>
										
										</div>
										 
					  
	                       </div>

						   <div class="card mb-4" name="DisplayEquipmentRow">
                             <div class="card-header bg bg-success text-white">
                                <i class="fas fa-table mr-1"></i>
                               <h3 style="text-transform:capitalize"> School Newsletter</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable_8" width="100%" cellspacing="0">
	          
                                        <thead>
                                            <tr> 
                                                 
                                                <th>Operations</th>
                                                <th>Uploader  </th>
                                                <th>Photo</th>    
                                                <th>Subject</th>
                                                <th>Body</th>
                                                <th>Post Status</th>
                                                <th>Date </th> 
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
                                                    <?php 
                                                  
                                                  $result = $Loader-> FetchPostReview($school_code);
                                                 
                                                  foreach($result as $active)
                                                  {
                                                     
                                                    if(!empty($active['img_url']))
													{
                                                     $photoUrl = '<img src="'.$active['img_url'].'"  style="height:150px"   />';
													}else{
													 $photoUrl = ''; 
													}


													if($active['post_review'] == 'live')
													{
                                                     $post_review = '<div class="btn btn-success mb-1" >Post Is Live</div>';
													}else{
													 $post_review = '<div class="btn btn-primary mb-1" >Post Is On Review </div>';
													}
                                                      
                                                      echo'
													  <tr role="row" class="odd">
														<td>  
														<a  href="post_read.php?post='.$active['id'].'"><div class="btn btn-success mb-1">Read</div></a>
														<a  href="post_edit.php?post='.$active['id'].'"><div class="btn btn-info mb-1">Edit</div></a>
														<div  onclick="postReviewOps('.$active['id'].',\'pending\')"   class="btn btn-dark mb-1">Push To Review</div></a>
														<div  onclick="postReviewOps('.$active['id'].',\'live\')"   class="btn btn-primary mb-1">Push To live</div></a>
														<a href="post_delete.php?post='.$active['id'].'"><div class="btn btn-danger mb-1" >Delete </div></a> 
														</td> 
                                                    
														<td>'.$active['uploader_name'].' </td>  
														<td> '.$photoUrl.'   </td>  
														<td>'.$active['header'].' </td>
														<td><div style="height:150px;overflow:hidden;">'.$active['body'].'</div>... continiue </td>
														<td>'.$post_review.' </td>
														<td>'.$active['date'].' </td>   
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



 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



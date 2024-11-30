 
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
	    include("index_header.php");
		include("../header.php");    
		?>
		
		<title> 
		SCHOOL SCHEME OF WORK
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
								<i class="fas fa-briefcase"></i>Scheme Of Work
							</h1>

							<ol class="breadcrumb mb-4">
								<li class="breadcrumb-item" onclick="GoBackHandler()"> Back</li>
								<li class="breadcrumb-item active">  post</li>
							</ol>
                  
					 
  
						   <div class="col-md-12"> 
 				 
					 
					 
									 
												<div class="card-header">
													<i class="fas fa-briefcase"></i>
                                                    Scheme Of Work
												</div>
												
												<div class="card-body">
													
													<div class="table-responsive">
														
 
 

				   
													</div>
										
										</div>
										 
					  
	                       </div>

						   <div class="card mb-4" name="DisplayEquipmentRow">
                             <div class="card-header bg bg-success text-white">
                                <i class="fas fa-table mr-1"></i>
                               <h3 style="text-transform:capitalize"> Scheme Of Work (SOW)</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable_8" width="100%" cellspacing="0">
	          
                                        <thead>
                                            <tr> 
                                                 
                                                <th>Operations</th>
                                                <th>SOW Uploader  </th>
                                                <th>Subject  </th>    
                                                <th>Term</th>
                                                <th>Class</th>
                                                <th>Week</th>
                                                <th>Topic</th>
                                                <th>Content</th>
                                                <th>Date </th> 
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
                                                    <?php 
                                                  
                                                  $result = $Loader-> FetchSchemeOfWork($school_code);
                                                 
                                                  foreach($result as $active)
                                                  {
                                                    $teacherName = $Loader-> FetchTeacherName($active['teacher_id']);
                                                    $subjectName = $Loader-> FetchSubject($active['subject_id']);
                                                    $data_id  = $active['id'];
                                            
                                                      echo'
													  <tr role="row" class="odd">
														<td>   
														<div class="btn btn-danger mb-1" data-toggle="modal" data-target="#scehme'.$active['id'].'">Delete</div> 
														</td> 
                                                    
														<td> 
                                                        <img src="../'.$SchoolIMG.'/'.$school_code.'/'.$active['teacher_photo'].'"  style="width:100px;height:100px;border-radius:800px"/>  <br/>
                                                        <b>'.$teacherName.'</b>
                                                        </td>  
														<td> '.$subjectName.'</td>  
														<td>'.$active['scheme_term'].' </td>   
														<td>'.$active['class'].' </td>   
														<td>Week '.$active['week'].' </td>   
														<td>'.$active['topic'].' </td>   
														<td>'.$active['content'].' </td>   
														<td>'.$active['date'].' </td>   
                                                    
                                                      
                                                


													  <div class="col-md-4 modal-grids  ">
													  <div class="modal fade" id="scehme'.$active['id'].'" tabindex="-1" role="dialog" aria-labelledby="scehme'.$active['id'].'Label">

													  <a href="#"  > <div class="btn btn-danger" data-toggle="modal" data-target="#disapproveMaintenance">Sceheme of work deletion</div></a>

													  <div class="modal-dialog" role="document">
													  <div class="modal-content">
													  <div class="modal-header">
													  <p class="text-danger">Are you sure you want to DELETE this scheme of work? </p>
													  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

													  </div>

															<div class="modal-body"> 
																<center >  

																		<p style="color:black"> 
																		TOPIC<br/> 
																		'.$active['topic'].' 
																		</p>
																		
																		<div>
																		<p> CONTENT</P>
																		'.$active['content'].'
																		</div>

																</center>

																	<div>
																		<div> <br/><br/>
																	';
																	echo" <input type='button' class='btn btn-primary' onclick='getExamscore(\"$data_id\")' value='Delete Sceheme of work'>";
																	echo'
																		</div>
																	</div>  


															</div>


													  </div> 
													  </div> 
													  </div> 
													  </div>
													  
													 
													   </tr>  ';
                                                    
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

function getExamscore(val) {

 
  
		$.ajax({
			url:"pageajax.php",
			method:"POST",
			dataType:"json",
			data:{
			  delete_id:val,    
			  category:'sceheme_of_work',    
			  page:'delete',
			  action:'deleteAccount'
			  },
			success:function(data)
			{
				if(data.success){
				  
				  window.location.reload();
				}
				else
				{
				  
				  alert(data.feedback);
				  
				}
			}
		  });	

 

}

</script>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



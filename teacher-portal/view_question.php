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
		 Questions
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
                        <h1 class="mt-4"> 
					          <i class="fas fa-book"></i>Teacher Questions  
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"onclick="GoBackHandler()"> Back</li>
                       
                            <li class="breadcrumb-item active">Teacher Questions </li>
                        </ol>
                  
					 
  
						   <div class="col-md-12"> 
 				 
					 
					 
									 
												<div class="card-header">
													<i class="fas fa-briefcase"></i>
                                                    Questions
												</div>
												
												<div class="card-body">
													
		 <div class="table-responsive">
														

 
		   
		   
	   		    <div id="otpupdatebox" style="background-color:white; padding:50px;margin-top:10px">

                    <?php 
                  
                        
                                    
                                   

                                    $Loader->query = "SELECT * FROM `50_question_table` WHERE  teacher_code='$username' AND cbt_status !='general'"; 
                                    $total_row = $Loader->total_row(); 
                                    $result = $Loader->query_result(); 
                             
                                    
                                    echo'	 
                                    <div class="card mb-4">
                                                                <div class="card-header bg bg-success text-white">
                                                                    <i class="fas fa-table mr-1"></i>
                                                                <h3>Questions   </h3>
                                                                </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                        <table class="table table-bordered" id="dataTable_5" width="100%" cellspacing="0">
                                                        
                                                    
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Operation </th> 
                                                                                <th>Image </th> 
                                                                                <th>Subject Details </th> 
                                                                                <th>Question</th>  
                                                                                <th>Option</th>  
                                                                                <th>Answer</th>  
                                                                                
                                                                            </tr>
                                                                        </thead>  
                                                                        <tbody> ';
                                                                        foreach($result as $active)
                                                                        {
                                                                          $question_id = $active['id'];
                                                                          $Loader->query = "SELECT * FROM `51_question_option` WHERE  question_id ='$question_id'  "; 
                                                                          $result = $Loader->query_result();
                                                                          $id = $active['id'];
                                                                           

                                                                          
                                                                        $schoolName =  $Loader-> SchoolName($active['school_code']);	 
                                                                        $subject =  $Loader-> FecthSingleSubject($active['cbt_subject']);	 

                                                                              if($active['question_image'] == '')
                                                                              {
                                                                                $QuesImg ='';
                                                                              }else
                                                                              {
                                                                              $QuesImg ='<img src="../'.$MainquesImg .'/'.$active['question_image'].'"  style="width:100px;height:100px;border-radius:1500px"';
                                                                              }
                                                                            
                                                                            echo'<tr role="row" class="odd">
                                                                                <td>  
                                                                                  <a href="edit_question.php?question_id='.$active['id'].'&type=edit"> 
                                                                                    <b class="btn btn-info myFont"> Edit  </b>
                                                                                  </a> ';
                                                                            echo"  
                                                                                  <div onclick='deleteSubject(\"$id\")'> 
                                                                                    <b class='btn btn-danger myFont'> Delete  </b>
                                                                                  </div>
                                                                                  <div onclick='dropAllSubject(\"$id\")'> 
                                                                                    <b class='btn btn-success myFont'> Drop  all $subject questions with access code ".$active['subject_id']."</b>
                                                                                  </div>
                                                                                  
                                                                                  "; 
                                                                           echo'    
                                                                                 </td>
                                                                            <td>
                                                                              '.$QuesImg.'
                                                                            </td>
                                                                              <td> 
                                                                              '.$subject.' <hr/>
                                                                              Access Code <b>'.$active['subject_id'].'</b><hr/> 
                                                                              Question Type <b style="text-transform:capitalize;">'.$active['cbt_status'].'</b> <hr/>
                                                                              Student Class <b style="text-transform:capitalize;">'.$active['student_class'].'</b> 
                                                                              </td>  
                                                                              
                                                                              <td> 
                                                                             '.$active['question_title'].' <br/> 
                                                                              </td> 
                                                                              <td style="font-size:11px"> 
                                                                              ';
                                                                              
                                                                              $i=0;
                                                                              foreach($result as $row)
                                                                              {
                                                                               echo $optionData[$i]  = $row['option_title'].'<hr/>';
                                                                               
                                                                               $i++;
                                                                              } 
                                                                             echo'
                                                                              </td>  
                                                                              <td> 
                                                                             '.$active['answer_option'].'</b> <br/> 
                                                                              </td>  
                                                                 
                                                                               
                                                                              
                                                                            </tr>
                                                                            ';
                                                                      
                        
                        
                                                                   					
                                                                        } 					
                                                                echo'</tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>'; 
 


                    ?>
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

<script>
     
 
     function deleteSubject(sub_id) {
         
     
          
         
                 $.ajax({
                     url:"pageajax.php",
                     method:"POST", 
                     data:{        
                         delete_id:sub_id,   
                         category:'deleteQuestion',   
                         page:'delete',
                         action:'deleteAccount'
                         }, 
                     success:function(data)
                     {  
                  
                     alert(data)
                      window.location.reload();
                             
                     }
                });	
   
     }
     function dropAllSubject(sub_id) {
         
     
          
         
                 $.ajax({
                     url:"pageajax.php",
                     method:"POST", 
                     data:{        
                         delete_id:sub_id,   
                         category:'dropQuestion',   
                         page:'delete',
                         action:'deleteAccount'
                         }, 
                     success:function(data)
                     {  
                  
                     alert(data)
                      window.location.reload();
                             
                     }
                });	
   
     }
</script>

 

 

 


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



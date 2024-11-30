<?php
			include("index_header.php");
			?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("../header.php"); 
		include("../topUrl.php"); 
	 
          
				if(isset($_GET["teacher_code"])){
		           
                    
				    $teacher_code ='';
					if(!empty($_GET["teacher_code"]))
					{
						$teacher_code = $_GET["teacher_code"];
					 
					}else{
						$teacher_code = "";
					}
				
				} 
		?>
		
	<title> 
		 All Subject
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
					          <i class="fas fa-book"></i>All Subjects
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"onclick="GoBackHandler()"> Back</li>
                       
                            <li class="breadcrumb-item active">Subjects </li>
                        </ol>
                  
					 
  
						   <div class="col-md-12"> 
 				 
					 
					 
									 
												<div class="card-header">
													<i class="fas fa-briefcase"></i>
                                                    Subjects
												</div>
												
												<div class="card-body">
													
		 <div class="table-responsive">
														

 
		   
		   
	   		    <div id="otpupdatebox" style="background-color:white; padding:50px;margin-top:10px">

                    <?php 
                 
                                   

                                  
                           
                                    
                                    echo'	 
                                    <div class="card mb-4">
                                                                <div class="card-header bg bg-success text-white">
                                                                    <i class="fas fa-table mr-1"></i>
                                                                <h3>All Subjects   </h3>
                                                                </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                        <table class="table table-bordered" id="dataTable_5" width="100%" cellspacing="0">
                                                        
                                                    
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Operation </th>   
                                                                                <th>subject title</th>   
                                                                                
                                                                            </tr>
                                                                        </thead>  
                                                                        <tbody> ';


                                                                            $Loader->query ="SELECT * FROM `40_all_subject` ";  
                                                                            $result = $Loader->query_result(); 
                                                                            foreach($result as $active)
                                                                            {
                                                                           
                                                                                $id = $active['id'];
                                                                                
                                                                          
                                                                    //  onclick='deletAccount(\"$name\",\"$delete_id\",\"$tokenpasskey\",\"$username\")'
                                                                            
                                                                            echo"<tr role='row' class='odd'>
                                                                                <td>  
                                                                                  <a href='edit_data.php?data_id=".$active['id']."&name=subject'> 
                                                                                    <b class='btn btn-info myFont'> Edit  </b>
                                                                                  </a> 
                                                                    
                                                                                </td>
                                                                            
                                                                              <td> 
                                                                              ".$active['sub_title']."
                                                                              </td>  
                                                                              
                                                                               
                                                                 
                                                                               
                                                                              
                                                                            </tr>
                                                                            ";
                                                                      
                        
                        
                                                                   					
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


 
 


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



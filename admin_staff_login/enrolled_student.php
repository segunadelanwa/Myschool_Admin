<?php
			include("index_header.php");
			?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("../header.php"); 
        require("../topUrl.php");
          
				if(isset($_GET["parent_code"])){
		           
                    
				    $parent_code ='';
					if(!empty($_GET["parent_code"]))
					{
						$parent_code = $_GET["parent_code"];
					}else{
						$parent_code = "";
					}
				
				} 
		?>
		
	<title> 
		<?php echo$payee_name = $_GET["name"]; ?> Pupils
	</title>

    </head>
	
 


	
 

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
					          <i class="fas fa-book"></i>Parent Pupils
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                       
                            <li class="breadcrumb-item active">Parent Pupils </li>
                        </ol>
                  
					 
  
						   <div class="col-md-12"> 
 				 
					  
												
												<div class="card-body">
													
		 <div class="table-responsive">
														

 
		   
		   
	   		    <div id="otpupdatebox" style="background-color:white; padding:50px;margin-top:10px">

                    <?php 
                    if(isset($_GET["parent_code"]))
                    {
                        
                        
                                    $parent_code = $_GET["parent_code"]; 
                                    $payee_name = $_GET["name"]; 
                                    $result   = $Loader->ParentStudentList($parent_code);	 

                                    if($Loader->ParentStudentList($parent_code) > 0)
                                    {

                                    
                                    echo'	 
                                    <div class="card mb-4">
                                                                <div class="card-header bg bg-success text-white">
                                                                    <i class="fas fa-table mr-1"></i>
                                                                <h3>'.$payee_name.' Pupils  </h3>
                                                                </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                        <table class="table table-bordered" id="dataTable_5" width="100%" cellspacing="0">
                                                        
                                                    
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Student Photo </th> 
                                                                                <th>School Details</th> 
                                                                                <th>Parent Name</th> 
                                                                                <th>Student Details</th>
                                                                                <th>Gender </th>
                                                                                <th>Class</th>
                                                                                <th>Teacher</th>
                                                                                <th>School Fee</th>
                                                                                <th>CBT Sub</th>
                                                                                <th>Reg Date / Admin</th>
                                                                                
                                                                            </tr>
                                                                        </thead>  
                                                                        <tbody> ';
                                                                        foreach($result as $active)
                                                                        {
                                                                        $schoolName = $Loader-> SchoolName($active['school_code']);	
                                                                        $parent_code = $Loader-> ParentName($active['parent_code']);	
                                                                          
                                                                            
                                                                            echo'<tr role="row" class="odd">
                                                                                  
                                                                              <td style="text-align:center;">
                                                                      
                                                                                 
                                                                                  <img src="../'.$SchoolIMG.'/'.$active['school_code'].'/'.$active['photo'].'"  style="width:100px;height:100px;border-radius:1500px"/>  <br/>
                                                                               
                                                               
                                                                              </td> 
                                                                              
                                                                              <td>
                                                                              School Name<br/><b>'.$schoolName.'</b> <hr/>
                                                                              School Code<br/><b>'.$active['school_code'].'</b> <br/>
                                                                              
                                                                              </td>  
                                                                              <td>'.$parent_code.' </td>
                                                                              <td>
                                                                              Student Name:<br/><b>'.$active['student_name'].'</b><hr>
                                                                              Student ID:<br/><b>'.$active['online_stu_id'].' </b> 
                                                                              </td> 
                                                                              <td>'.$active['stu_gender'].' </td> 
                                                                              <td>'.$active['student_class'].' </td> 
                                                                              <td>
                                                                                   
                                                                                  Teacher Code: <b>'.$active['parent_code'].'</b>
                                                                              </td> 
                                                                              <td>'.$active['school_fee'].' </td> 
                                                                              <td>'.$active['sub_status'].' </td> 
                                                                              <td>'.$active['date'].'<br /> </td> 
                                                                              
                                                                              
                                                                                
                                                                              </td> 
                                                                              
                                                                            </tr>
                                                                            ';
                                                                      
                        
                        
                                                                          
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
                                                     
                                                    Invalid Payee ID  inserted. Please confirm your Payee ID and try again

                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>  
                                                    </div> ';
                                    }


                    }
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


 

 


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



<?php
			include("index_header.php");
			?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("../header.php"); 
		include("../topUrl.php"); 
	 
          
				if(isset($_GET["school_code"])){
		           
                    
				    $school_code ='';
					if(!empty($_GET["school_code"]))
					{
						$school_code = $_GET["school_code"];
					}else{
						$school_code = "";
					}
				
				} 
		?>
		
	<title> 
		<?php echo$payee_name = $_GET["name"]; ?> Pupils
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
                        <h1 class="mt-4"> 
					          <i class="fas fa-book"></i>School Teachers
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item" onclick="GoBackHandler()">Back</li>
                       
                            <li class="breadcrumb-item active">School Teachers   </li>
                        </ol>
                  
					 
  
						   <div class="col-md-12"> 
 				 
					 
					 
									 
												<div class="card-header">
													<i class="fas fa-briefcase"></i>
                                                    School Teachers  
												</div>
												
												<div class="card-body">
													
		 <div class="table-responsive">
														

 
		   
		   
	   		    <div id="otpupdatebox" style="background-color:white; padding:50px;margin-top:10px">

                    <?php 
                    if(isset($_GET["school_code"]))
                    {
                        
                        
                                    $school_code = $_GET["school_code"]; 
                                    $payee_name = $_GET["name"]; 
                                    $result   = $Loader->SchoolTeachers($school_code);	 

                                    if($Loader->TeacherStudentList($school_code) > 0)
                                    {

                                    
                                    echo'	 
                                    <div class="card mb-4">
                                                                <div class="card-header bg bg-success text-white">
                                                                    <i class="fas fa-table mr-1"></i>
                                                                <h3>'.$payee_name.' TEACHERS  </h3>
                                                                </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                        <table class="table table-bordered" id="dataTable_5" width="100%" cellspacing="0">
                                                        
                                                    
                                                                            <thead>
                                                                            <tr>
                                                                                <th>Student Photo </th> 
                                                                                <th>Teacher ID</th> 
                                                                                <th> Name</th> 
                                                                                <th>Email</th>
                                                                                <th>Phone </th>
                                                                                <th>Address</th>  
                                                                                
                                                                            </tr>
                                                                        </thead>  
                                                                        <tbody> ';
                                                                        foreach($result as $active)
                                                                        {
                                                                        
                                                                            
                                                                            echo'<tr role="row" class="odd">
                                                                                  
  
                                                                              <td> <img src="../'.$SchoolIMG .'/'.$active['school_code'].'/'.$active['photo'].'"   style="width:100px;height:100px;border-radius:1500px"/>  <br/></td> 
                                                                              <td>'.$active['teacher_code'].' </td> 
                                                                              <td>'.$active['fullname'].' </td> 
                                                                              <td>'.$active['username'].' </td> 
                                                                              <td>'.$active['phone'].' </td> 
                                                                              <td>'.$active['address'].' </td> 
 
                                                                              
                                                                              
                                                                                
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


 

 


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



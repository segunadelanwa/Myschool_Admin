<?php
			include("index_header.php");
            require("../topUrl.php");
			?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("../header.php"); 
	 
          
				if(isset($_GET["fadmin"])){
		           
                    
				    $fadmin ='';
					if(!empty($_GET["fadmin"]))
					{
						$fadmin = $_GET["fadmin"];
					}else{
						$fadmin = "";
					}
				
				} 
		?>

	<title> 
		<?php echo$payee_name = $_GET["name"]; ?>
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
                        <h4 class="mt-4"> 
					          <i class="fas fa-book"></i> Field Admin Onboarded school 
						</h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item" onclick="GoBackHandler()">Back</li>
                       
                            <li class="breadcrumb-item active">Onboarded school  </li>
                        </ol>
                  
					 
  
						   <div class="col-md-12"> 
 				 
					 
					 
									 
										 
												
												<div class="card-body">
													
		 <div class="table-responsive">
														

 
		   
		   
	   		<div id="otpupdatebox" style="background-color:white; padding:50px;margin-top:10px">

               <div class="card mb-4" id="school">
                             <div class="card-header bg bg-primary text-white">
                                <i class="fas fa-table mr-1"></i>

                               <h3> All Registered  Schools  </h3>
     
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable_1" width="100%" cellspacing="0">
                                       
                                   
                                          <thead>
                                            <tr>
                                                
                                                <th>School Name</th> 
                                                <th>School Address</th> 
                                                <th>Total Students</th>
                                                <th>Paid Students </th>
                                                <th>Unpaid Students</th> 
                                                <th>School Earning</th> 
                                                <th>Date </th>
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
                                              <?php 


                                            $result = $Loader-> FadminOnboardedSchools($fadmin);
                                            foreach($result as $active)
                                            {
                                            $ActiveStudent  = $Loader-> ActiveStudent($active['school_code']);	
                                            $PassiveStudent = $Loader-> PassiveStudent($active['school_code']);	  	   	  
                                            $FieldAdminEarn = $Loader-> ActiveSchoolStudentEarn($active['school_code'],$fadmin);	  
                                            $total_row      = $Loader-> SchoolStudentNummber($active['school_code']);	
                                         
                                            //src="../'.$FielAdmin .'/'.$active['photo'].'"    
                                                echo'<tr role="row" class="odd">
                                              
                                          
                                                  
                                                  <td><img src="../'.$SchoolIMG .'/'.$active['school_code'].'/'.$active['school_logo'].'"  style="height:60px"/> <br/>'.$active['school_name'].' <br/> <b>School ID: '.$active['school_code'].' </b></td>
                                                  <td>'.$active['school_address'].' </td>
                                                  <td>'.$total_row.' </td>
                                                  <td>'.$ActiveStudent.' </td>
                                                  <td>'.$PassiveStudent.' </td> 
                                                  <td>N'.number_format($FieldAdminEarn,2).' </td>  
                                                  <td>'.$active['date_reg'].' </td> 
                                                  
                                                  
                                                    
                                                  </td> 
                                                  
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


 

 


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



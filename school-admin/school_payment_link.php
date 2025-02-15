 
<!DOCTYPE html>
<html lang="en">
    <head>
			<meta charset="utf-8" />
			<meta http-equiv="X-UA-Compatible" content="IE=edge" />
			<meta name="viewport" content="width=device-width, initial-scale=0.1, shrink-to-fit=no" />
			<meta name="description" content=" ADMIN MANAGEMENT SYSTEM" />
			<meta name="author" content="  ADMIN MANAGEMENT SYSTEM" /> 

			<link href="../css/styles.css" rel="stylesheet" />
			<link rel="apple-touch-icon" href="../gen_img/logo.png">
			<link rel="shortcut icon"    href="../gen_img/logo.png"/>		

			<script src="../js/all.min.js" crossorigin="anonymous"></script>
			<script src="../scripts/jquery.min.js"></script>
			<script src="../scripts/parsley.js"></script>
			<script src="../scripts/popper.min.js"></script>
			<script src="../scripts/bootstrap.min.js"></script>
			<script src="../scripts/jquery.dataTables.min.js"></script>
			<script src="../scripts/dataTables.bootstrap4.min.js"></script>
			
		<?php
        


         include("../e_result_server.php");
         include("../school-portal/config.php");
 
        $Loader = new Loader();
        $ResultServer = new ResultServer();

 
	 
		require("../topUrl.php");
		$year = date("Y");
		$month = date("M");


			if( isset($_GET["school_code"]))
			{
			 
						$school_code = strtolower($_GET["school_code"]);


                            $Loader->query = "SELECT * FROM `1_school_reg` WHERE school_code = '$school_code' ";    
                            $total_row = $Loader->total_row(); 
                                            
                            if( $total_row == 1)
                            { 								
                                $dataExist = "success";

                                        $result = $Loader->query_result(); 
                                        foreach($result as $row){  
                                        $payment_link =  $row['payment_link'];
                                        } 
                                        
                                      if( $payment_link == 'default')
                                        {							 
                                            $feedback = "active";     
                                        }
                                        else if( $payment_link == '')
                                        { 
                                            $feedback = "passive";   
                                        } 
                                        else
                                        { 
                                            header("Location: $payment_link");
                                        } 


                                       
                              
                            }
                            else
                            {
                                $dataExist = "failed";
                                
                                
                            }	
						
			}

		?>
			<title> SCHOOL ONLINE PAYMENT 	</title>	
    </head>
	
 

	<script>
		function GoBackHandler(){
		history.go(-1)
		}	
 
    </script>
	
	
 

    <body class="sb-nav-fixed">   
            <div id="layoutSidenav_content">


                
                    <div class="row mb-4 mt-4 ml-4">
                    <div   class="btn btn-primary mr-5" onclick="GoBackHandler()" >Back</div>

                     
                    </div>

                

                    <div class="col-md-12">  
                
                    

                            <div  style="width:794px;height:723px">

                                <?php

                                if($dataExist == 'success')
                                {
                                        
                                            if(  $feedback == "active" )
                                            {
                                                echo $ResultServer->EserverSchoolPaymentLink($school_code);
                                            }
                                            else
                                            {
                                                echo $failed ='
                                                <div class="col-xl- col-md-6">
                                                <div class="alert alert-white alert-dismissible fade show" role="alert">
                                                <strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
                                                
                                                   School online payment link disabled.Thanks
                                                
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>  
                                                </div>';  
                                            }

                                }
                                else if($dataExist == 'failed')
                                {
                                
                                
                                    echo $failed ='
                                    <div class="col-xl- col-md-6">
                                    <div class="alert alert-white alert-dismissible fade show" role="alert">
                                    <strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
                                    
                                    Invalid URL, please check the URL link and try again.Thanks
                                    
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>  
                                    </div>';
                                
                                
                                
                                
                                }
                                    
                                ?>
                                                          

                            </div>




                    </div>
                    
                
            </div>

 
     
   
 
    </body>
</html>


<script>
     
function PrintDiv() {     
	window.print();
 }
 </script>


 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



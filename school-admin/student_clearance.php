 
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


			if(isset($_GET["student_id"]) && isset($_GET["parent_id"]) && isset($_GET["token"]) && isset($_GET["school_code"]))
			{
			
						$student_id  = strtolower($_GET["student_id"]);
						$parent_id   = strtolower($_GET["parent_id"]);
						$token       = strtolower($_GET["token"]);
						$school_code = strtolower($_GET["school_code"]);


                            $Loader->query = "SELECT * FROM `4_student_reg` WHERE online_stu_id = '$student_id' AND token = '$token' AND school_code = '$school_code' ";    
                            $total_row = $Loader->total_row(); 
                                            
                            if( $total_row == 1)
                            { 								
                            
                                      
                                        
                                        $Loader->query ="SELECT * FROM `4_student_reg`  WHERE online_stu_id = '$student_id' ";  
                                        $result = $Loader->query_result(); 
                                        foreach($result as $row){  
                                        $school_fee =  $row['school_fee'];
                                        } 
                                        
                                      if( $school_fee == 'paid')
                                        {							 
                                            $payment = "active";     
                                        }
                                        else if( $school_fee == 'unpaid')
                                        { 
                                         $payment = "passive"; 
                                        } 



                                $dataExist = 'success';
                                $stu_name = $Loader->StudentName($student_id);
                            }
                            else
                            {
                                $dataExist = "failed";
                                $stu_name = "";
                                
                            }	
						
			}

		?>
			<title>  	<?php echo $stu_name ?> Payment Clearance 	</title>	
    </head>
	
 

	<script>
		function GoBackHandler(){
		history.go(-1)
		}	
 
    </script>
	
	
 

  <body class="sb-nav-fixed">

 	

	
	
	
       
		
<div id="layoutSidenav">


<div id="layoutSidenav_content">


    
        <div class="row mb-4 ">
        <div   class="btn btn-primary mr-5" onclick="GoBackHandler()" >Back</div>

        <div   class="btn btn-success" onclick="PrintDiv();">Click here to download payment clearance </div>
       
        </div>

    

        <div class="col-md-12">  
    
            
            <div lass="table-responsive p-5">
                



                 <div style="background-color:white; padding:10px;">

                        <?php

                        if($dataExist == 'success')
                        {
                                if($payment == 'active')
                                {
                                    echo $ResultServer->EserverPaymentClearanceSuccess($student_id);

                                
                                }
                                else if($payment == 'passive')
                                {                            
                                    echo $ResultServer->EserverPaymentClearanceFailed($student_id);   
                                                             
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


</div>

</div>
    
    
     
   
 
    </body>
</html>


<script>
     
function PrintDiv() {     
	window.print();
 }
 </script>


 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



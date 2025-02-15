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


                        $Loader->query = "SELECT * FROM 3_parent_reg WHERE parent_code = '$parent_id' AND token = '$token' AND sch_code = '$school_code'";    
                        $total_row = $Loader->total_row(); 
                                        
                        if( $total_row == 1)
                        { 								
                        
                                  
                                    
                                    $Loader->query ="SELECT * FROM `4_student_reg`  WHERE online_stu_id = '$student_id' ";  
                                    $result = $Loader->query_result(); 
                                    foreach($result as $row){  
                                    $school_fee =  $row['school_fee'];
                                    $student_id_data = $row["online_stu_id"];
                                    } 



                                    $Loader->query ="SELECT * FROM `1_school_reg`  WHERE school_code = '$school_code' ";  
                                    $result = $Loader->query_result(); 
                                    foreach($result as $rows){  
                                        $id_card_type =  $rows['id_card_type']; 
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
                            $payment = "failed"; 
                            
                        }	
                    
        }
		?>
			<title>  	<?php echo $stu_name ?> Student Identity Card 	</title>	
    </head>
	
 

	<script>
		function GoBackHandler(){
		history.go(-1)
		}	
 
    </script>
	
	
 
    <body class="sb-nav-fixed">   
            <div id="layoutSidenav_content">
		
       
		            <div id="layoutSidenav_content">
		    
                   
                        
								<div class="row mb-4 mt-4 ml-4">
									<div   class="btn btn-primary mr-5" onclick="GoBackHandler()" >Back</div>

									<div   class="btn btn-success" onclick="PrintDiv();">Click here to download payment clearance </div>

								</div>
					 
  
						       <div class="col-md-12">   
											<div   style="width:950px;height:1123px">
												<?php
                                                    if($payment == 'active'){
														  
															
																$online_stu_id = $student_id_data;
															if($id_card_type == '0'){
																

																	echo $failed ='
																	<div class=" col-md-12">
																		<div class="alert alert-danger alert-dismissible fade show" role="alert">
																			<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />

																			No ID CARD template selected yet. Please click here botton <br/><br/>

																			<a href="select_id_template.php">
																			<button type="button" class="btn btn-success"  >
																			Select ID Card
																			</button></a>
																			
																			<br/><br/>
																		</div>  
																	</div>';


															}else if($id_card_type == '1'){
																echo $ResultServer->EserverStudentIDCard_1($online_stu_id);

															}else  if($id_card_type == '2'){
																echo $ResultServer->EserverStudentIDCard_2($online_stu_id);
															
															}else  if($id_card_type == '3'){
																echo $ResultServer->EserverStudentIDCard_3($online_stu_id);
															
															}else  if($id_card_type == '4'){
																echo $ResultServer->EserverStudentIDCard_4($online_stu_id);

															}else  if($id_card_type == '5'){
																echo $ResultServer->EserverStudentIDCard_5($online_stu_id);

															}else  if($id_card_type == '6'){
																echo $ResultServer->EserverStudentIDCard_6($online_stu_id);
															}else  if($id_card_type == '7'){
																echo $ResultServer->EserverStudentIDCard_7($online_stu_id);
															}

											 
													}
													else if($payment == 'passive')
													{
													
													
															echo $failed ='
															<div class="col-xl- col-md-6">
															<div class="alert alert-white alert-dismissible fade show" role="alert">
															<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
															
																<h1> '.$stu_name .' Payment has not been acknowledged   </h1>
															
															<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
															</div>  
															</div>';
															
													
													
													
													}
													else 
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
  
    </body>
</html>


<script>
     
	 function PrintDiv() {  
 
	window.print(); 
 }


 </script>



 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



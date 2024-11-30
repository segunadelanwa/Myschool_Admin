<?php
			include("index_header.php");
			?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("../header.php"); 
        require("../topUrl.php");
          
				if(isset($_GET["section"])){
		           
                    
				    $section ='';
					if(!empty($_GET["section"]))
					{
						$section = $_GET["section"];
					}else{
						$section = "";
					}
				
				} 

                $curdate = date("d/M/Y");
                $curMonth = date("M");
		?>
		
	<title> 
		<?php echo$output=$Loader->FetchPaymentRefererence(); echo$section; ?> Payment
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
                        <h2 class="mt-4 " style="text-transform: capitalize"> 
                        <?php echo$output=$Loader->FetchPaymentRefererence(); echo$section; ?> Payment
						</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                       
                            <li class="breadcrumb-item active" style="text-transform: capitalize"><?php echo $section; ?> Payment </li>
                        </ol>
                  
					 
  
						   <div class="col-md-12"> 
 				 
					  
												
												<div class="card-body">
													
		 <div class="table-responsive">
														

 
		   
		   
	   		    <div id="otpupdatebox" style="background-color:white; padding:50px;margin-top:10px">

                    <?php 
                        // $Loader->query = " SELECT * FROM `0_marketer_reg` INNER JOIN `1_school_reg` ON `0_marketer_reg`.`marketer_code` = `1_school_reg`.`fadmin_code`  WHERE  `1_school_reg`.`school_status` = 'active'  "; 
                        // $output = $Loader->query_result();
                        // $d=0;
                        // foreach($result_1  as $row)
                        // {

                        // }
                        $Refererence=$Loader->FetchPaymentRefererence();

                   if($section == 'field-admins')
                    {
                         
 
                        $Loader->query = " SELECT * FROM `0_marketer_reg` "; 
                        $total_row = $Loader->total_row(); 
                        $result = $Loader-> query_result();	 
                        if($total_row  > 0)
                        {

                        
                           echo'	 
                             <div class="card mb-4">
                                                    <div class="card-header bg bg-success text-white">
                                                        <i class="fas fa-table mr-1"></i>
                                                    <h3 style="text-transform: capitalize">Bulk '.$Refererence.' '.$section.' Payment  </h3>
                                                    </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable_5" width="100%" cellspacing="0">
                                            
                                        
                                                                <thead>
                                                                <tr>
                                                                    <th>Row_No</th> 
                                                                    <th>PaymentAmount </th> 
                                                                    <th>PaymentDate</th> 
                                                                    <th>Reference</th> 
                                                                    <th>Remark</th>
                                                                    <th>VendorCode </th>
                                                                    <th>VendorName</th>
                                                                    <th>VendorAcctNumber</th>
                                                                    <th>VendorBankSortCode</th>  
                                                                    
                                                                </tr>
                                                            </thead>  
                                                            <tbody> ';
                                                            $d=0;
                                                            foreach($result as $active)
                                                            { 
                                                               
                                                                $FieldAdminNetEarn = $Loader-> FieldAdminNetEarn($active['marketer_code']);	  	
                                                                $bank_name = $Loader->FetchBankName($active['bank_name']); 
                                                                if( $FieldAdminNetEarn == 0){

                                                                }else{
                                                                    $d++;
                                                                echo'
                                                                <tr role="row" class="odd">
                                                                    
                                                                <td> '.$d.'</td>  
                                                                <td> '.number_format($FieldAdminNetEarn,2).'</td>  
                                                                <td> '.$curdate.'</td>   
                                                                <td> </td>     
                                                                <td> '.$Refererence.'</td>     
                                                                <td> '.$active['marketer_code'].'</td>   
                                                                <td> '.$active['acct_name'].'</td>     
                                                                <td> '.$active['acct_number'].'</td>     
                                                                <td> '.$active['bank_name'].'</td>   
                                                                </td> 
                                                                
                                                                </tr>
                                                                ';
                                                        
                                                                }
            
                                                            
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
                                        
                                    Empty Data 

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>  
                                        </div> 
                                        ';
                        }


                    }
                    else if($section == 'head-teachers')
                    {
                                     
                        $Loader->query = " SELECT * FROM `2_teacher_reg` WHERE `teacher_rank` ='head'"; 
                        $total_row = $Loader->total_row(); 
                        $result = $Loader-> query_result();	 
                        if($total_row  > 0)
                        {

                        
                           echo'	 
                             <div class="card mb-4">
                                                    <div class="card-header bg bg-success text-white">
                                                        <i class="fas fa-table mr-1"></i>
                                                    <h3 style="text-transform: capitalize">Bulk '.$output.' '.$section.' Payment  </h3>
                                                    </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable_5" width="100%" cellspacing="0">
                                            
                                        
                                                                <thead>
                                                                <tr>
                                                                    <th>Row_No</th> 
                                                                    <th>Reference</th> 
                                                                    <th>Beneficiary_Code</th> 
                                                                    <th>Beneficiary_Name</th> 
                                                                    <th>Account_Name</th>
                                                                    <th>Account_No </th>
                                                                    <th>Beneficiary_NUBAN</th>
                                                                    <th>Amount</th>
                                                                    <th>Sortcode</th>
                                                                    <th>Bank</th>
                                                                    <th>Payment_date</th>
                                                                    
                                                                </tr>
                                                            </thead>  
                                                            <tbody> ';
                                                            $d=0;
                                                            foreach($result as $active)
                                                            { 
                                                                	
                                                                    $bank_name       =  $Loader->FetchBankName($active['bank_name']);                                                               
                                                                    $HeadTeacherEarn =  $HeadTeacherEarn = $Loader-> HeadTeacherEarnPayment($active['teacher_code'], $active['school_code']);  
                                                                if( $HeadTeacherEarn == 0){

                                                                }else{
                                                                    $d++;
                                                                echo'
                                                                <tr role="row" class="odd">
                                                                    
                                                                    <td> '.$d.'</td>  
                                                                    <td> '.$Refererence.'</td>     
                                                                     <td> '.$active['school_code'].''.$active['teacher_code'].'</td>    
                                                                    <td> '.$active['account_name'].'</td>   
                                                                    <td> '.$active['account_name'].'</td>   
                                                                    <td> '.$active['account_number'].'</td>  
                                                                    <td> '.$active['account_number'].'</td>  
                                                                    <td> '.number_format($HeadTeacherEarn,2).'</td>  
                                                                    <td> '.$active['bank_name'].'</td>  
                                                                    <td> '.$bank_name.'</td>  
                                                                    <td> '.$curdate.'</td>   
                                                                    </td> 
                                                                
                                                                </tr>
                                                                ';
                                                        
                                                                }
            
                                                            
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
                                        
                                    Empty Data 

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>  
                                        </div> 
                                        ';
                        }

                    }
                    else if($section == 'teachers')
                    {
                        $Loader->query = " SELECT * FROM `2_teacher_reg` WHERE `teacher_rank` ='teacher'"; 
                        $total_row = $Loader->total_row(); 
                        $result = $Loader-> query_result();	 
                        if($total_row  > 0)
                        {

                        
                           echo'	 
                             <div class="card mb-4">
                                                    <div class="card-header bg bg-success text-white">
                                                        <i class="fas fa-table mr-1"></i>
                                                    <h3 style="text-transform: capitalize">Bulk '.$output.' '.$section.' Payment  </h3>
                                                    </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable_5" width="100%" cellspacing="0">
                                            
                                        
                                                                <thead>
                                                                <tr>
                                                                    <th>Row_No</th> 
                                                                    <th>Reference</th> 
                                                                    <th>Beneficiary_Code</th> 
                                                                    <th>Beneficiary_Name</th> 
                                                                    <th>Account_Name</th>
                                                                    <th>Account_No </th>
                                                                    <th>Beneficiary_NUBAN</th>
                                                                    <th>Amount</th>
                                                                    <th>Sortcode</th>
                                                                    <th>Bank</th>
                                                                    <th>Payment_date</th>
                                                                    
                                                                </tr>
                                                            </thead>  
                                                            <tbody> ';
                                                            $d=0;
                                                            foreach($result as $active)
                                                            { 
                                                                	
                                                                    $bank_name       =  $Loader->FetchBankName($active['bank_name']);                                                               
                                                                    $EachTeacherEarnPayment = $Loader-> EachTeacherEarnPayment($active['teacher_code'], $active['school_code']);  
                                                                if( $EachTeacherEarnPayment == 0){

                                                                }else{
                                                                    $d++;
                                                                echo'
                                                                <tr role="row" class="odd">
                                                                    
                                                                    <td> '.$d.'</td>  
                                                                    <td> '.$Refererence.'</td>     
                                                                    <td> '.$active['school_code'].''.$active['teacher_code'].'</td>   
                                                                    <td> '.$active['account_name'].'</td>   
                                                                    <td> '.$active['account_name'].'</td>   
                                                                    <td> '.$active['account_number'].'</td>  
                                                                    <td> '.$active['account_number'].'</td>  
                                                                    <td> '.number_format($EachTeacherEarnPayment,2).'</td>  
                                                                    <td> '.$active['bank_name'].'</td>  
                                                                    <td> '.$bank_name.'</td>  
                                                                    <td> '.$curdate.'</td>   
                                                                    </td> 
                                                                
                                                                </tr>
                                                                ';
                                                        
                                                                }
            
                                                            
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
                                        
                                    Empty Data 

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>  
                                        </div> 
                                        ';
                        }
                    }
                    else if($section == 'schools')
                    {
                        $Loader->query = "SELECT * FROM  `1_school_reg` WHERE `1_school_reg`.`school_payment` = 'paid'"; 
                        $total_row = $Loader->total_row(); 
                        $result = $Loader-> query_result();	 
                        if($total_row  > 0)
                        {

                        
                           echo'	 
                             <div class="card mb-4">
                                                    <div class="card-header bg bg-success text-white">
                                                        <i class="fas fa-table mr-1"></i>
                                                    <h3 style="text-transform: capitalize">Bulk '.$output.' '.$section.' Payment  </h3>
                                                    </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable_5" width="100%" cellspacing="0">
                                            
                                        
                                                                <thead>
                                                                <tr>
                                                                    <th>Row_No</th> 
                                                                    <th>Reference</th> 
                                                                    <th>Beneficiary_Code</th> 
                                                                    <th>Beneficiary_Name</th> 
                                                                    <th>Account_Name</th>
                                                                    <th>Account_No </th>
                                                                    <th>Beneficiary_NUBAN</th>
                                                                    <th>Amount</th>
                                                                    <th>Sortcode</th>
                                                                    <th>Bank</th>
                                                                    <th>Payment_date</th>
                                                                    
                                                                </tr>
                                                            </thead>  
                                                            <tbody> ';
                                                            $d=0;
                                                            foreach($result as $active)
                                                            { 
                                                                	
                                                                    $bank_name       =  $Loader->FetchBankName($active['bank_name']);                                                               
                                                                    $SchoolRevenue = $Loader-> SchoolRevenuePayment($active['school_code']);  
                                                                if( $SchoolRevenue == 0){

                                                                }else{
                                                                    $d++;
                                                                echo'
                                                                <tr role="row" class="odd">
                                                                    
                                                                    <td> '.$d.'</td>  
                                                                    <td> '.$Refererence.'</td>     
                                                                    <td> '.$active['school_code'].'</td>   
                                                                    <td> '.$active['account_name'].'</td>   
                                                                    <td> '.$active['account_name'].'</td>   
                                                                    <td> '.$active['account_number'].'</td>  
                                                                    <td> '.$active['account_number'].'</td>  
                                                                    <td> '.number_format($SchoolRevenue,2).'</td>  
                                                                    <td> '.$active['bank_name'].'</td>  
                                                                    <td> '.$bank_name.'</td>  
                                                                    <td> '.$curdate.'</td>   
                                                                    </td> 
                                                                
                                                                </tr>
                                                                ';
                                                        
                                                                }
            
                                                            
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
                                        
                                    Empty Data 

                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>  
                                        </div> 
                                        ';
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


 

 


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



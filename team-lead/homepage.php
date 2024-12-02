<!DOCTYPE html>
<html lang="en">
    <head>
				<?php
        require("../topUrl.php");
				require("../header.php");
			 
				?>
<title><?php echo $agent_firm_name; ?></title> 
    </head>
    <style>
    .myFont{
      font-size:12px
    
    }
    </style>
    <body class="sb-nav-fixed" >
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
				<?php
				require("dashboard_head.php");
				?>
        </nav>
		
        <div id="layoutSidenav">
		
            <div id="layoutSidenav_nav">

				<?php
				require("sidebar.php");
        $default_pass = "000000$username";
       $encrypt_pass = md5($default_pass) 
				?>
				
		  </div>
           
		   <div id="layoutSidenav_content">
		   
                <main>
                    <div class="container-fluid">
                        
						<?php  


                if($encrypt_pass == $token)
                {

                echo $data ='
                  <div class="col-xl- col-md-12">
                  <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size:14px">
                  <strong><i class="fa fa-user alert_head get_st"></i><br>URGENT!!  UPDATE</strong><br />

                Hi, '.$fullname.' you need to change your password from default password.
                To do that goto settings navigate to change password
                    
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  </div>  
                  </div> 
                  ';
              }
              
           
              
             	
              $historyCount =  $loader->PaymentHistoryCount($marketer_code);


       // $outNet = 'N'.number_format($FieldAdminNetEarn,2); 

            ?>

						<small>Welcome</small>  
						<h1><?php echo $agent_firm_name; ?></h1>  
						 
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">  HOME</li>
                        </ol>
                        <div class="row"  >
                            <div class="col-xl-3 col-md-3">
                                <div class="card bg-primary text-white mb-4">
								
                                    <div class="card-body"><center><h2 ><?php echo $loader-> SchoolMarketed($marketer_code); 	?> </h2></center>TEAM SCHOOL ONBOARDED</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#school">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
							
		 
            

                            <div class="col-xl-3 col-md-3"  >
                                <div class="card bg-success text-white mb-4">
								
                                    <div class="card-body"><center><h2 ><?php echo $loader-> ClosedTicket($marketer_code)  	?> </h2></center> CLOSED TICKET</div> 
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="ticket_closed.php">View ticket</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-md-3"  >
                                <div class="card bg-danger text-white mb-4">
								
                                    <div class="card-body"><center><h2 ><?php echo $loader-> OpenTicket($marketer_code)   	?> </h2></center> OPEN TICKET</div> 
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="ticket_review.php">View Backlog</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-md-3"  >
                                <div class="card bg-dark text-white mb-4">
								
                                    <div class="card-body"><center><h2 ><?php echo$historyCount =  $loader->AllFieldAdminCount($marketer_code);; 	?> </h2></center> FIELD OPERATION OFFICER</div> 
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#field_admin">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>


                        </div>
						
                        <div class="row">
						
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                      Field Operation Officer  Overview
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Onboarded Schools Overview
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
							
                        </div>
						
						
						
						
						
						
                        <div class="card mb-4" id="school">
                             <div class="card-header bg bg-primary text-white">
                                <i class="fas fa-table mr-1"></i>

                               <h3> Onboarded  Schools  </h3>
     
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable_1" width="100%" cellspacing="0">
                                       
                                   
                                          <thead>
                                            <tr>
                                                
                                                <th>School Name</th> 
                                                <th>School Address</th>  
                                                <th>School Status</th> 
                                                <th>Date </th>
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
                                              <?php 
                                            
                                            $result = $loader-> SchoolActivities($marketer_code);	
                                            
                                            foreach($result as $active)
                                            {
                                            $ActiveStudent  = $loader-> ActiveStudent($marketer_code);	
                                            $PassiveStudent = $loader-> PassiveStudent($marketer_code);	  	   	  
                                            $FieldAdminEarn = $loader-> ActiveSchoolStudentEarn($active['school_code'],$marketer_code);	  
                                            $total_row      = $loader-> SchoolStudentNummber($active['school_code']);	
                                         
                                            //src="../'.$FielAdmin .'/'.$active['photo'].'"    
                                                echo'<tr role="row" class="odd">
                                              
                                          
                                                  
                                                  <td><img src="../'.$SchoolIMG .'/'.$active['school_code'].'/'.$active['school_logo'].'"  style="height:60px"/> <br/>'.$active['school_name'].' <br/> <b>School ID: '.$active['school_code'].' </b></td>
                                                  <td>'.$active['school_address'].' </td> 
                                                  <td>'.$active['school_status'].' </td>  
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
 
 

                        <div class="card mb-4" id="field_admin">
                            <div class="card-header bg bg-dark text-white">
                                <i class="fas fa-table mr-1"></i>
                               <h3> Field Operation Officer  </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable_5" width="100%" cellspacing="0">
                                       
                                   
                                        <thead>
                                            <tr>
                                                <th>Operations</th>
                                                <th>Photo </th>
                                                <th>Username/ID</th>  
                                                <th>Phone </th>
                                                <th>Address</th> 
                                                <th>School Onboard</th> 
											                          <th>Bank Details</th>
                                                <th>Date</th>
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
                                            <?php 

                                            $result = $loader-> AllFieldAdmin($marketer_code);	
                                            
                                            foreach($result as $active)
                                            { 	 	
                                            
                                           $FieldAdminEarn = $loader-> FieldAdminNetEarn($active['marketer_code']);	
                                           
                                            $schoolGained = $loader-> SchoolMarketed($active['marketer_code']);	 	
                                            $bank_name = $loader->FetchBankName($active['bank_name']);
                                            echo' 
                                         
                                           <tr role="row" class="odd">
                                              
                                              <td style="text-align:center;"> 
                                                <a href="edit_data.php?data_id='.$active['marketer_code'].'&name=field_admin">   <b class="btn btn-dark myFont mb-2"> Edit Field Admin </b>   </a> 
                                                <a href="onboard_school.php?fadmin='.$active['marketer_code'].'&name=fieldAdmin">   <b class="btn btn-primary myFont mb-2">school Onboarded  </b>  </a>
                                                <a href="delete_account.php?delete_id='.$active['marketer_code'].'&name=fieldAdmin">   <b class="btn btn-danger myFont mb-2">Delete Account </b>  </a>
                                             </td> 
                                              <td style="text-align:center;">  <img src="../'.$FielAdmin .'/'.$active['photo'].'"  style="height:60px"/> <br/>   <b>'.$active['fullname'].' </b>  </td> 
                                              <td>'.$active['username'].' <br/> <hr/><b>Field Admin ID</b>: '.$active['marketer_code'].'</td>  
                                              <td>'.$active['phone'].' </td> 
                                              <td>'.$active['address'].' </td>  
                                              
                                              <td>'.$schoolGained.'</td> 
                                              
                                              <td><small>
                                                '.$bank_name.' <hr/>
                                              '.$active['acct_name'].'<hr/>
                                              '.$active['acct_number'].'
                                              </small>
                                              </td> 
                                                 <td>  <b>Date</b>:'.$active['date_reg'].'</td> 
                                                
                                                  
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



  $(document).on('click', '#approveEquip', function(event){
event.preventDefault();

const	equipment_id = document.getElementById("equip_id").value; 
 //alert(searchNo);
 

		$.ajax({
			url:"pageajax.php",
			method:"POST",
			dataType:"json",
			data:{
				equipment_id:equipment_id,   
				page:'setupMaint',
				action:'approve_maint'
				},
			success:function(data)
			{
				  if(data.success){
					  
					  alert(data.feedback);
					  location.href='approved_maint.php';
				  }
				  else
				  {
					  
					  alert(data.feedback);
					  
				  }
			}
		});	
	 
	
  
	
});
  



  $(document).on('click', '#approveDelete', function(event){
event.preventDefault();

const	equipment_id = document.getElementById("equip_id").value; 
 //alert(searchNo);
 

		$.ajax({
			url:"pageajax.php",
			method:"POST",
			dataType:"json",
			data:{
				equipment_id:equipment_id,   
				page:'setupMaint',
				action:'delete_maint'
				},
			success:function(data)
			{
				  if(data.success){
					  
					  alert(data.feedback);
					  location.href='index.php';
				  }
				  else
				  {
					  
					  alert(data.feedback);
					  
				  }
			}
		});	
	 
	
  
	
});
  
 </script> 
 
 
 <script> 
  
  
  
  

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example




var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
    datasets: [{
      label: "Maintenance",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [ 
	  ],
	  
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 10,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
});



</script>


<script>
// Set new default font family and font color to mimic Bootstrap's default styling





Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
       labels: ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"],
    datasets: [{
      label: "Maintenance Approval",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [
 
	  ],
	  
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 10,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

</script>
	

	
	
	

<!DOCTYPE html>
<html lang="en">
    <head>
				<?php
				require("../header.php");
				require("title.php");
				?>

    </head>
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
				?>
				
		  </div>
           
		   <div id="layoutSidenav_content">
		   
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">
						
						 ADMIN / STAFF
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">  HOME</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
								
                                    <div class="card-body"><center><h2 ><?php echo $loader-> DisplayTotalSchoolRow();	?> </h2></center>TOTAL NUMBER SCHOOLS</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
							
							 <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
							
                                    <div class="card-body">	<center><h2 ><?php echo $loader-> DisplayAllStudentRow();	?></h2></center> TOTAL NUMBER OF STUDENTS</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
								
                                    <div class="card-body"><center><h2 ><?php echo $loader-> DisplayFieldOpRow();	?> </h2></center>TOTAL NUMBER OF FIELD ADMIN</div> 
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
							
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
								
                                    <div class="card-body"><center><h2 ><?php echo $loader-> DisplayMarketerRow();	?> </h2></center> TOTAL NUMBER OF MARKETER</div> 
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
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
                                      School Fees Paymment
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                       Equipments Approval Overview
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
							
                        </div>
						
						
						
						
						
				    	<div class="card mb-4">
                             <div class="card-header bg bg-primary text-white">
                                <i class="fas fa-table mr-1"></i>
                               <h3> Schools / Activities </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                       
                                   
                                        <thead>
                                            <tr>
                                                <th>School Code </th> 
                                                <th>School Name</th> 
                                                <th>School Address</th> 
                                                <th>Total Student</th>
                                                <th>Active Student </th>
                                                <th>Passive Student</th>
                                                <th>Marketer</th>
											    <th>Field Admin</th>
											    <th>Date </th>
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
     <?php 
	
	$result = $loader-> SchoolActivities();	
	
	foreach($result as $active)
	{
	$ActiveStudent = $loader-> ActiveStudent($active['school_code']);	
	$PassiveStudent = $loader-> PassiveStudent($active['school_code']);	
		
	 $total_row = $loader-> SchoolStudentNummber($active['school_code']);	
			
			echo'<tr role="row" class="odd">
		 
				<td> '.$active['school_code'].'  </td> 
				
				<td>'.$active['school_name'].' </td>
				<td>'.$active['school_address'].' </td>
				<td>'.$total_row.' </td>
				<td>'.$ActiveStudent.' </td>
				<td>'.$PassiveStudent.' </td>
				<td>'.$active['marketer_code'].' </td>
				<td>'.$active['fadmin_code'].' </td> 
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
						
						
                        <div class="card mb-4">
                            <div class="card-header bg bg-success text-white">
                                <i class="fas fa-table mr-1"></i>
                               <h3> All Registered Students  </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable_2" width="100%" cellspacing="0">
                                       
                                   
                                        <thead>
                                            <tr>
                                                <th>Student Photo </th> 
                                                <th>School Code</th> 
                                                <th>Parent Code</th> 
                                                <th>Student Names</th>
                                                <th>Gender </th>
                                                <th>Class</th>
                                                <th>Teacher</th>
											    <th>Payment</th>
											    <th>Reg Date / Admin</th>
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
     <?php 
	
	$result = $loader-> AllStudent();	
	
	foreach($result as $active)
	{
	$schoolName = $loader-> SchoolName($active['school_code']);	
	$parent_code = $loader-> ParentName($active['parent_code']);	
		 
			
			echo'<tr role="row" class="odd">
		         
				<td style="text-align:center;">
					<a href="student_subject_check.php?student_id='.$active['online_stu_id'].'">
					  <b>'.$active['online_stu_id'].' </b> <br/> <img src="../all_photo/'.$active['photo'].'"  style="height:60px"/>  <br/> Check Student
					</a>
				</td> 
				
				<td>'.$schoolName.'  </td>  
				<td>'.$parent_code.' </td>
				<td>'.$active['student_name'].' </td> 
				<td>'.$active['stu_gender'].' </td> 
				<td>'.$active['student_class'].' </td> 
				<td>'.$active['student_teacher'].' </td> 
				<td>'.$active['sub_status'].' </td> 
				<td>'.$active['date'].'<br /> <b>Field Admin</b>: '.$active['admincode'].' </td> 
			   
			   
					 
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
       
	   
                        <div class="card mb-4">
                            <div class="card-header bg bg-danger text-white">
                                <i class="fas fa-table mr-1"></i>
                               <h3>Field Admins  </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                                       
                                   
                                        <thead>
                                            <tr>
                                                <th>Photo </th>
                                                <th>Username</th> 
                                                <th>Names</th>
                                                <th>Phone </th>
                                                <th>Address</th>
                                                <th>Gender</th>
											    <th>School Awarded</th>
											    <th>Reg Date / Admin</th>
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
     <?php 
	
	$result = $loader-> AllFieldAdmin();	
	
	foreach($result as $active)
	{
	$schoolName = $loader-> SchoolName($active['school_code']);	 	
		 
			
			echo'<tr role="row" class="odd">
		         
				<td style="text-align:center;">
					 
					  <b>'.$active['fadmin_code'].' </b> <br/> <img src="../all_photo/'.$active['photo'].'"  style="height:60px"/>   
				
				</td> 
				 
				<td>'.$active['username'].' </td> 
				<td>'.$active['fullname'].' </td> 
				<td>'.$active['phone'].' </td> 
				<td>'.$active['address'].' </td>  
				<td>'.$active['gender'].' </td> 
				<td><b>School Code</b>'.$active['school_code'].'<br /> <b>School Name</b>: '.$schoolName.' </td> 
				<td>'.$active['reg_date'].'<br /> <b> Reg Admin</b>: '.$active['registrar'].' </td> 
			   
			   
					 
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
                    
						
                        <div class="card mb-4">
                            <div class="card-header bg bg-warning text-white">
                                <i class="fas fa-table mr-1"></i>
                               <h3>  Freelance Marketers  </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                                       
                                   
                                        <thead>
                                            <tr>
                                                <th>Photo </th>
                                                <th>Username</th> 
                                                <th>Names</th>
                                                <th>Phone </th>
                                                <th>Address</th>
                                                <th>School Earned</th>
											    <th>Reg Date / Admin</th>
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
     <?php 
	
	$result = $loader-> AllFieldMarketer();	
	
	foreach($result as $active)
	{ 	 	
		 
		$schoolGained = $loader-> SchoolMarketed($active['marketer_code']);	 	
		
			echo'<tr role="row" class="odd">
		         
				<td style="text-align:center;">
					 
					  <b>'.$active['marketer_code'].' </b> <br/> <img src="../all_photo/'.$active['photo'].'"  style="height:60px"/> 				
				</td> 
				 
				<td>'.$active['username'].' </td> 
				<td>'.$active['fullname'].' </td> 
				<td>'.$active['phone'].' </td> 
				<td>'.$active['address'].' </td> 				
				<td>'.$schoolGained.' </td> 
				<td>'.$active['date_reg'].'<br /> <b> Reg Admin</b>: '.$active['admincode'].' </td> 
			   
			   
					 
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
                    
                       

					   <div class="card mb-4">
                            <div class="card-header bg bg-success text-white">
                                <i class="fas fa-table mr-1"></i>
                               <h3> Registered Parents </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable5" width="100%" cellspacing="0">
                                       
                                   
                                        <thead>
                                            <tr>
                                                <th>School Code </th>
                                                <th>Parent Code </th>
                                                <th>Guidance Name</th>
                                                <th>Phone Number</th> 
                                                <th>address </th>
                                                <th>email</th>  
											    <th>Reg Date / Admin</th>
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
     <?php 
	
	$result = $loader-> AllRegisteredParent();	
	
	foreach($result as $active)
	{ 	 	
		  	 	
		
			echo'<tr role="row" class="odd">
		         
			
				<td>'.$active['sch_code'].' </td> 
				<td>'.$active['parent_code'].' </td> 
				<td>'.$active['guidance_name'].' </td> 
				<td>'.$active['username'].' </td> 
				<td>'.$active['address'].' </td>    
				<td>'.$active['email'].' </td>    
				<td>'.$active['date'].'<br /> <b> Reg Admin</b>: '.$active['admin_code'].' </td> 
			   
			   
					 
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
    
       
        <script src="../s/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		
        <script src="../js/scripts.js"></script>
        <script src="../js/Chart.min.js" crossorigin="anonymous"></script>
        
       
		
        <script src="../js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="../js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
		  
		
		
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
       <?php echo $loader-> MaintenaneOverviewJAN();	?>,
       <?php echo $loader-> MaintenaneOverviewFEB();	?>,
       <?php echo $loader-> MaintenaneOverviewMAR();	?>,
       <?php echo $loader-> MaintenaneOverviewAPR();	?>,
       <?php echo $loader-> MaintenaneOverviewMAY();	?>,
       <?php echo $loader-> MaintenaneOverviewJUN();	?>,
       <?php echo $loader-> MaintenaneOverviewJUL();	?>,
       <?php echo $loader-> MaintenaneOverviewAUG();	?>,
       <?php echo $loader-> MaintenaneOverviewSEP();	?>,
       <?php echo $loader-> MaintenaneOverviewOCT();	?>,
       <?php echo $loader-> MaintenaneOverviewNOV();	?>,
	   <?php echo $loader-> MaintenaneOverviewDEC();	?>, 
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
       <?php echo $loader-> ApprovalMaintenaneOverviewJAN();	?>,
       <?php echo $loader-> ApprovalMaintenaneOverviewFEB();	?>,
       <?php echo $loader-> ApprovalMaintenaneOverviewMAR();	?>,
       <?php echo $loader-> ApprovalMaintenaneOverviewAPR();	?>,
       <?php echo $loader-> ApprovalMaintenaneOverviewMAY();	?>,
       <?php echo $loader-> ApprovalMaintenaneOverviewJUN();	?>,
       <?php echo $loader-> ApprovalMaintenaneOverviewJUL();	?>,
       <?php echo $loader-> ApprovalMaintenaneOverviewAUG();	?>,
       <?php echo $loader-> ApprovalMaintenaneOverviewSEP();	?>,
       <?php echo $loader-> ApprovalMaintenaneOverviewOCT();	?>,
       <?php echo $loader-> ApprovalMaintenaneOverviewNOV();	?>,
	   <?php echo $loader-> ApprovalMaintenaneOverviewDEC();	?>, 
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
	
	
	
	
	

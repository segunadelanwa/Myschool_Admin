<!DOCTYPE html>
<html lang="en">
    <head>
				<?php
        require("../topUrl.php");
				require("../header.php");
				require("../title.php");
				?>

    </head>
    <style>
    .myFont{
      font-size:12px
    
    }
    </style>
    <body class="sb-nav-fixed" >
       
    <div>
      <?php
      require("dashboard_head.php");
      ?>
    </div> 
       
		
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
                        <div class="mt-4">
                              <?php  


                                  if($encrypt_pass == $token)
                                  {

                                  echo $data ='
                                    <div class="col-xl- col-md-12">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size:14px">
                                    <strong><i class="fa fa-user alert_head get_st"></i><br>URGENT!!  UPDATE</strong><br />

                                  Hi, '.$schl_head_name.' you need to change your password from default password.
                                  To do that goto settings navigate to change password
                                      
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>  
                                    </div> 
                                    ';
                                }
                                
                              ?>
                              <h3><?php echo $school_name; 	?></h3>  
                              <h5><?php echo $school_address; 	?></h5>  
                              <h5> HI, <?php echo $schl_head_name; 	?></h5>  
						             </div>


                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">  HOME</li>
                        </ol>
                        <div class="row"  >
                            <div class="col-xl-3 col-md-3">
                                <div class="card bg-primary text-white mb-4">
                                
                                    <div class="card-body"><center><h2 ><?php echo $loader-> DisplayTotalSchoolRow($school_code);	?> </h2></center>SCHOOL STUDENTS</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">School Parents</a>
                                        <div class="small text-white"><?php echo $loader-> DisplayTotalSchoolParentRow($school_code);	?></div>
                                    </div>
                                </div>
                            </div>
							
		 
            

							
                            <div class="col-xl-3 col-md-3"  >
                                <div class="card bg-success text-white mb-4">
								
                                    <div class="card-body"><center><h2 ><?php  echo$loader->DisplayTeachersRowCount($school_code);	?> </h2></center>SCHOOL TEACHERS</div> 
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#teacher">Uploaded Question</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-md-3"  >
                                <div class="card bg-danger text-white mb-4">
                                
                                    <div class="card-body"><center><h2 ><?php echo$loader->ActiveStudent($school_code);	?> </h2></center> CBT ACTIVE STUDENTS</div> 
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#student">Passive Student:</a>
                                        <div class="small text-white"><?php echo$loader->DisplayTeachersRowCount($school_code);	?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-3"  >
                                <div class="card bg-dark text-white mb-4">
								
                                    <div class="card-body"><center><h2 ><?php echo  'N'.number_format($loader->SchoolEarn($school_code),2); 	?> </h2></center> SCHOOL EARN</div> 
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#history">School CBT App Revenue</a>
                                        <div class="small text-white"><?php echo  'N'.number_format($loader->SchoolRevenue($school_code),2); 	?></div>
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
                                        Exam/Mid-Term Test Overview
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
							
                        </div>
						
						
						
						
						
                        <div class="card mb-4"  id="student" >
                              <div class="card-header bg bg-success text-white">
                                  <i class="fas fa-table mr-1"></i>
                                <h3> All Registered Students  </h3>
                              </div>
                              <div class="card-body">
                                  <div class="table-responsive">
                                      <table class="table table-bordered" id="dataTable_3" width="100%" cellspacing="0">
                                        
                                    
                                          <thead>
                                              <tr>
                                                  <th>Operations</th> 
                                                  <th>Student Photo </th>  
                                                  <th>Student Name</th>
                                                  <th>Gender </th>
                                                  <th>Class Teacher</th> 
                                                  <th>School Fee</th>
                                                  <th>CBT Sub</th>
                                                  <th>Parent Name</th> 
                                                 
                                                  
                                              </tr>
                                          </thead> 

                                          <tbody> 
                                                  <?php 
                                                
                                                $result = $loader-> AllStudent($school_code);	
                                                
                                                foreach($result as $active)
                                                {
                                             
                                                $parent_name  = $loader-> ParentName($active['parent_code']);	
                                                $teacher_name = $loader->TeacherName($active['teacher_code']);	
                                                  
                                                    
                                                    echo'<tr role="row" class="odd">
                                                          
                                                      <td style="text-align:center;">
                                                        <a href="edit_data.php?data_id='.$active['online_stu_id'].'&name=student"> 
                                                          <b class="btn btn-dark myFont mb-2"> Edit Student </b>
                                                        </a><br/>
                                                        <a href="student_subject_setup.php?student_id='.$active['online_stu_id'].'"> 
                                                          <b class="btn btn-primary myFont mb-2">Add Subjects </b>
                                                        </a><br/>
                                                        <a href="student_subject_check.php?student_id='.$active['online_stu_id'].'"> 
                                                          <b class="btn btn-success myFont mb-2"> Student Subjects </b>
                                                        </a><br/>
                                                        <a href="student_result.php?student_id='.$active['online_stu_id'].'&name='.$active['student_name'].'"> 
                                                          <b class="btn btn-info myFont mb-2"> Student Result </b>
                                                        </a><br/>
                                                        <a href="delete_account.php?delete_id='.$active['online_stu_id'].'&name=student"> 
                                                          <b class="btn btn-danger myFont mb-2">Delete Account </b>
                                                        </a>
                                                      </td> 
                                                      <th>
                                                       <img src="../'.$SchoolIMG .'/'.$active['school_code'].'/'.$active['photo'].'"  style="width:100px;height:100px;border-radius:1500px"/>  <br/>
                                                      Student ID:<br/><b>'.$active['online_stu_id'].' </b> 
                                                      </td>
                                                      
                                                      <td>
                                                      '.$active['student_name'].'<br/> Class:'.$active['student_class'].' 
                                                      </td> 
                                                      <td>'.$active['stu_gender'].' </td> 
                                                      <td>'.$teacher_name.' </td> 
                                                      
                                                      <td>'.$active['school_fee'].' </td> 
                                                      <td>'.$active['sub_status'].' </td> 
                                                      <td>'.$parent_name.' </td>
                                                   
                                                      
                                                      
                                                        
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
 
                        
 
                        <div class="card mb-4"  id="teacher" >
                             <div class="card-header bg bg-dark text-white">
                                <i class="fas fa-table mr-1"></i>
                               <h3> All Registered  Teachers  </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable_2" width="100%" cellspacing="0">
                                       
                                   
                                          <thead>
                                            <tr>
                                                <th>Operations</th> 
                                                <th>School/Teachers </th>  
                                                <th>Teachers username</th> 
                                                <th>Teachers Name</th>
                                                <th>Gender </th>
                                                <th>Phone</th> 
                                                <th>Teachers Earn</th>
                                                <th>Acct Details</th>
                                                <th>Reg Date</th>
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
                                              <?php 
                                            
                                            $result = $loader-> DisplayTeachersRow($school_code);	
                                            
                                            foreach($result as $active)
                                            {
                                          //<td>N'.number_format($active['salary'] ,2).' </td>

                                            $EachTeacherEarn = $loader-> EachTeacherEarn($school_code);	 
                                            $HeadTeacherEarn = $loader-> HeadTeacherEarn($school_code);	 
                                            $subJect         = $loader-> FecthSingleSubject($active['subject']);
                                            if($active['teacher_rank'] == 'head'){
                                               $earn =  $HeadTeacherEarn;
                                            } else if($active['teacher_rank'] == 'teacher'){
                                               $earn =  $EachTeacherEarn;
                                            }   

                                                echo'<tr role="row" class="odd">
                                                  <td>
                                                    <a href="edit_data.php?data_id='.$active['teacher_code'].'&name=teacher">   <b class="btn btn-dark myFont mb-2"> Edit Teacher </b>   </a> 
                                                    <a href="student_list.php?teacher_code='.$active['teacher_code'].'&name='.$active['fullname'].'&type='.$active['subject'].'" class="btn btn-primary  myFont mb-2">  Teacher students  </a>
                                                    <a href="payment_history.php?payee_id='.$active['teacher_code'].'&name='.$active['fullname'].'" class="btn btn-success myFont mb-2">  Payment History </a>
                                                    <a href="delete_account.php?delete_id='.$active['teacher_code'].'&name=teacher">  <b class="btn btn-danger myFont mb-2">Delete Account </b>  </a>
                                                   </td> 
                                                  <td>
                                                  <img src="../'.$SchoolIMG .'/'.$active['school_code'].'/'.$active['photo'].'"  style="height:60px"/> <br/>
                                                  School ID: <b> '.$active['school_code'].'  </b>  <br/>
                                                  Teacher ID:<b> '.$active['teacher_code'].'</b> 
                                                  </td> 
                                                  
                                                  <td>
                                                  '.$active['username'].'<br/>
                                                   Status: <b> '.$active['teacher_rank'].'  </b><br/>
                                                   Subject: <b> '.$subJect.'  </b> 
                                                  </td> 
                                                  <td>'.$active['fullname'].' </td> 
                                                  <td>'.$active['gender'].' </td> 
                                                  <td>'.$active['phone'].' </td>  
                                                  <td>N'.number_format($earn,2).' </td> 
                                                  <td>'.$active['bank_name'].'<br/> '.$active['account_name'].'<br/>'.$active['account_number'].'<br/></td> 
                                                  <td>'.$active['reg_date'].' </td> 
                                                  
                                                    
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
                 

					              <div class="card mb-4" id="parent">
                            <div class="card-header bg bg-success text-white">
                                <i class="fas fa-table mr-1"></i>
                               <h3> Registered Parents </h3>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable_4" width="100%" cellspacing="0">
                                       
                                   
                                        <thead>
                                            <tr>
                                                <th>Operations </th>
                                                <th>Parent ID </th>
                                                <th>Guidance Name</th>
                                                <th>Phone Number</th> 
                                                <th>address </th>
                                                <th>email</th>  
											                          <th>Reg Date / Admin</th>
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
                                            <?php 
                                          
                                                $result = $loader-> AllRegisteredParent($school_code);	
                                                
                                                foreach($result as $active)
                                                { 	 	
                                                        
                                                  
                                                    echo'<tr role="row" class="odd">
                                                          
                                                    
                                                      <td>  
                                                        <a href="edit_data.php?data_id='.$active['parent_code'].'&name=parent">   <b class="btn btn-dark myFont mb-2"> Edit Parent </b>   </a> 
                                                        <a href="enrolled_student.php?parent_code='.$active['parent_code'].'&name='.$active['guidance_name'].'" class="btn btn-success myFont mb-3">
                                                        Enrolled Student 
                                                        </a><br/>

                                                        <a href="delete_account.php?delete_id='.$active['parent_code'].'&name=parent"> 
                                                        <b class="btn btn-danger myFont mb-2">Delete Account </b>
                                                        </a>
                                                      </td> 
                                                      <td>'.$active['parent_code'].' <br/> School ID:'.$active['sch_code'].'</td> 
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
	

	
	
	

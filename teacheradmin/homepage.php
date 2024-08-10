<!DOCTYPE html>
<html>
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

                                        Hi, '.$fullname.' you need to change your password from default password.
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
                                    <h5> HI, <?php echo $fullname; 	?></h5> 
                                    <h5 style="text-transform:capitalize">Teacher Subject : <?php echo $loader->FecthSingleSubject($subject) ?></h5> 

                              </div>


                              <ol class="breadcrumb mb-4">
                                  <li class="breadcrumb-item active">  HOME</li>
                              </ol>
                              <div class="row"  >
                                  <div class="col-xl-4 col-md-4">
                                      <div class="card bg-primary text-white mb-4">
                                      
                                          <div class="card-body"><center><h2 ><?php echo $loader-> FetchStudentInClass($school_code,$teacher_code);	?> </h2></center>STUDENT IN CLASS</div>
                                          <div class="card-footer d-flex align-items-center justify-content-between">
                                              <a class="small text-white stretched-link" href="#">Student In class </a>
                                              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                          </div>
                                      </div>
                                  </div>
                    
          
                  

                    
                                  <div class="col-xl-4 col-md-4"  >
                                      <div class="card bg-success text-white mb-4">
                      
                                          <div class="card-body"><center><h2 ><?php  echo$loader->MyUploadedExam($school_code,$username);	?> </h2></center>MY UPLOADED EXAM</div> 
                                          <div class="card-footer d-flex align-items-center justify-content-between">
                                              <a class="small text-white stretched-link" href="#teacher">Uploaded Question</a>
                                              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                          </div>
                                      </div>
                                  </div>


                  
                                  <div class="col-xl-4 col-md-4"  >
                                      <div class="card bg-dark text-white mb-4">
                      
                                          <div class="card-body"><center><h2 ><?php  echo$loader->MyUploadedTest($school_code,$username);	?> </h2></center> UPLOADED TEST</div> 
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
                  
                  
                  
                  
                  
                              <?php 
                        
                              
                                    
                                          $result   = $loader->TeacherStudentList($teacher_code);	 
                                        
                                      
                                          
                                          echo'	 
                                          <div class="card mb-4">
                                                                      <div class="card-header bg bg-success text-white">
                                                                          <i class="fas fa-table mr-1"></i>
                                                                      <h3>'.$fullname.' Pupils  </h3>
                                                                      </div>
                                              <div class="card-body">
                                                  <div class="table-responsive">
                                                              <table class="table table-bordered" id="dataTable_5" width="100%" cellspacing="0">
                                                              
                                                          
                                                                                  <thead>
                                                                                  <tr>
                                                                                      <th>Operations </th> 
                                                                                      <th>Student Photo </th> 
                                                                                      <th>Student Details</th>          
                                                                                      <th>School Details</th> 
                                                                                      <th>Parent Name</th> 
                                                                                      <th>Gender </th>
                                                                                      <th>Class</th> 
                                                                                      <th>School Fee</th>
                                                                                      <th>CBT Sub</th>
                                                                                      <th>Reg Date / Admin</th>
                                                                                      
                                                                                  </tr>
                                                                              </thead>  
                                                                              <tbody> ';
                                                                              foreach($result as $active)
                                                                              {
                                                                              $schoolName =  $loader-> SchoolName($active['school_code']);	
                                                                              $parent_code = $loader-> ParentName($active['parent_code']);	
                                                                              
                                                                                  
                                                                                  echo'<tr role="row" class="odd">
                                                                                      <td>  
                                                                                      <a href="student_result_test.php?student_id='.$active['online_stu_id'].'&name='.$active['student_name'].'"> 
                                                                                        <b class="btn btn-danger myFont"> Update Test Result </b>
                                                                                      </a><hr/>
                                                                                      <a href="student_result_exam.php?student_id='.$active['online_stu_id'].'&name='.$active['student_name'].'"> 
                                                                                        <b class="btn btn-danger myFont"> Update Exam Result </b>
                                                                                      </a>                                                                                <hr/>
                                                                                      <a href="student_reset_test.php?student_id='.$active['online_stu_id'].'&name='.$active['student_name'].'"> 
                                                                                        <b class="btn btn-success myFont"> Reset Test  </b>
                                                                                      </a><hr/>
                                                                                      <a href="student_reset_exam.php?student_id='.$active['online_stu_id'].'&name='.$active['student_name'].'"> 
                                                                                        <b class="btn btn-success myFont"> Reset Exam </b>
                                                                                      </a><hr/>

                                                                                      </td>
                                                                                    <td style="text-align:center;"> 
                                                                                    <img src="../'.$SchoolIMG .'/'.$active['school_code'].'/'.$active['photo'].'"  style="width:100px;height:100px;border-radius:1500px"/>  <hr/>
                                                                                          <a href="student_subject_check.php?student_id='.$active['online_stu_id'].'"> 
                                                                                          <b class="btn btn-info myFont"> View Subjects </b>
                                                                                          </a><hr/>
                                                                                          <a href="student_subject_setup.php?student_id='.$active['online_stu_id'].'"> 
                                                                                          <b class="btn btn-primary myFont">Add Subject </b>
                                                                                          </a><hr/>
                                                                                        <a href="student_result.php?student_id='.$active['online_stu_id'].'&name='.$active['student_name'].'"> 
                                                                                        <b class="btn btn-dark myFont"> Student Result </b>
                                                                                      </a>
                                                                                    </td> 
                                                                                    <td>
                                                                                      Student Name:<br/><b>'.$active['student_name'].'</b><hr>
                                                                                      Student ID:<br/><b>'.$active['online_stu_id'].' </b> 
                                                                                      </td> 
                                                                                    
                                                                                    <td>
                                                                                    School Name<br/><b>'.$schoolName.'</b> <hr/>
                                                                                    School Code<br/><b>'.$active['school_code'].'</b> <br/>
                                                                                    
                                                                                    </td>  
                                                                                    <td>'.$parent_code.' </td>
                                                                                    <td>'.$active['stu_gender'].' </td> 
                                                                                    <td>'.$active['student_class'].' </td>  
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

                        


                        
                          ?>
      
                

                    
          

                
                          </div>
                      </main>
                    
                        <footer class="py-4 bg-light mt-auto">
                        <?php 
                        require("../footer.php"); 
                        ?>
                        </footer>
               
            </div>
    
        
              <?php  
              require("../footer2.php"); 
              ?>	   
		
  </div> 
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
	

	
	
	

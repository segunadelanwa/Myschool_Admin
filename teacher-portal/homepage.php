<!DOCTYPE html>
<html>
    <head>
				<?php
        require("../topUrl.php");
				require("../header.php");
				 
				?>
 <title> WELCOME TO  <?php echo"$school_name"; ?>  </title>
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
                                    <h5 style="text-transform:capitalize">School Status: <?php echo $school_type ?></h5> 
                                    <h5 style="text-transform:capitalize">Teacher Subject : <?php echo $loader->FecthSingleSubject($subject) ?></h5> 
                                   

                              </div>


                              <ol class="breadcrumb mb-4">
                                  <li class="breadcrumb-item active">  HOME</li>
                              </ol>
                              <div class="row"  >
                                  <div class="col-xl-3 col-md-3">
                                      <div class="card bg-primary text-white mb-4">
                                      
                                          <div class="card-body"><center><h2 ><?php echo $loader-> FetchStudentInClass($school_code,$teacher_code);	?> </h2></center>STUDENT IN CLASS</div>
                                          <div class="card-footer d-flex align-items-center justify-content-between">
                                              <a class="small text-white stretched-link" href="#">Student In class </a>
                                              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                          </div>
                                      </div>
                                  </div>
                    
          
                  

                    
                                  <div class="col-xl-3 col-md-3"  >
                                      <div class="card bg-success text-white mb-4">
                      
                                          <div class="card-body"><center><h2 ><?php  echo$loader->MyUploadedExam($school_code,$username);	?> </h2></center>MY UPLOADED EXAM</div> 
                                          <div class="card-footer d-flex align-items-center justify-content-between">
                                              <a class="small text-white stretched-link" href="#teacher">Examination</a>
                                              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                          </div>
                                      </div>
                                  </div>


                  
                                  
                                  <div class="col-xl-3 col-md-3"  >
                                      <div class="card bg-dark text-white mb-4">
                      
                                          <div class="card-body"><center><h2 ><?php  echo$loader->MyUploadedTest($school_code,$username);	?> </h2></center> UPLOADED TEST</div> 
                                          <div class="card-footer d-flex align-items-center justify-content-between">
                                              <a class="small text-white stretched-link" href="#history">Mid-Term Test</a>
                                              <div class="small text-white"> </div>
                                          </div>
                                      </div>
                                  </div>


                                  <div class="col-xl-3 col-md-3"  >
                                      <div class="card bg-danger text-white mb-4">
                      
                                          <div class="card-body"><center><h2 ><?php  echo$loader->MyUploadedAssessment($school_code,$username);	?> </h2></center> UPLOADED ASSESSMENT</div> 
                                          <div class="card-footer d-flex align-items-center justify-content-between">
                                              <a class="small text-white stretched-link" href="#history">Assessment</a>
                                              <div class="small text-white"> </div>
                                          </div>
                                      </div>
                                  </div>

                              </div>
                  
                              <div class="row">
                  
                                  <div class="col-xl-6">
                                      <div class="card mb-4">
                                          <div class="card-header">
                                              <i class="fas fa-chart-area mr-1"></i>
                                             Examination  Overview
                                          </div>
                                          <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                      </div>
                                  </div>
                                  <div class="col-xl-6">
                                      <div class="card mb-4">
                                          <div class="card-header">
                                              <i class="fas fa-chart-bar mr-1"></i>
                                               Mid-Term Test Overview
                                          </div>
                                          <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                      </div>
                                  </div>
                    
                              </div>
                  
                  
                  
                  
                  
                              <?php 
                        
                                if($school_type == 'primary')
                                {                                   
                                         $result   = $loader->TeacherStudentList($teacher_code);	 
                                         
                                         echo'	 
                                          <div class="card mb-4">
                                                  <div class="card-header bg bg-primary text-white">
                                                      <i class="fas fa-table mr-1"></i>
                                                  <h3>'.$fullname.' Class  </h3>
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
                                                                                          <a href="student_reset_assessment.php?student_id='.$active['online_stu_id'].'&name='.$active['student_name'].'"> 
                                                                                            <b class="btn btn-success myFont"> Reset/View Assessment  </b>
                                                                                          </a><hr/>
                                                                                          <a href="student_reset_test.php?student_id='.$active['online_stu_id'].'&name='.$active['student_name'].'"> 
                                                                                            <b class="btn btn-success myFont"> Reset/View Test  </b>
                                                                                          </a><hr/>
                                                                                          <a href="student_reset_exam.php?student_id='.$active['online_stu_id'].'&name='.$active['student_name'].'"> 
                                                                                            <b class="btn btn-success myFont"> Reset/View Exam </b>
                                                                                          </a><hr/>
                                                                                          <a href="edit_data.php?data_id='.$active['online_stu_id'].'&name=student"> 
                                                                                            <b class="btn btn-dark myFont"> Edit Student</b>
                                                                                          </a> 

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
                                                                                              </a><hr/> 
                                                                                              <a href="edit_data.php?data_id='.$active['online_stu_id'].'&name=comment"> 
                                                                                              <b class="btn btn-primary myFont"> Add Comment  </b>
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

  
                                }
                                else if($school_type == 'secondary')
                                {

                                  $result   = $loader->TeacherStudentList($teacher_code);	 
                                         
                                  echo'	 
                                   <div class="card mb-4">
                                           <div class="card-header bg bg-primary text-white">
                                               <i class="fas fa-table mr-1"></i>
                                           <h3>'.$fullname.' Class  </h3>
                                           </div>

                                               <div class="card-body">
                                                        <div class="table-responsive">
                                                           <table class="table table-bordered" id="dataTable_5" width="100%" cellspacing="0">
                                                           
                                                       
                                                                               <thead>
                                                                               <tr>
                                                                                   <th>Operations </th> 
                                                                                   <th>Student Photo </th>           
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
                                                                                   <a href="student_reset_test.php?student_id='.$active['online_stu_id'].'&name='.$active['student_name'].'"> 
                                                                                     <b class="btn btn-success myFont"> Reset Test  </b>
                                                                                   </a><hr/>
                                                                                   <a href="student_reset_exam.php?student_id='.$active['online_stu_id'].'&name='.$active['student_name'].'"> 
                                                                                     <b class="btn btn-success myFont"> Reset Exam </b>
                                                                                   </a><hr/>
                                                                                   <a href="edit_data.php?data_id='.$active['online_stu_id'].'&name=student"> 
                                                                                     <b class="btn btn-dark myFont"> Edit Student</b>
                                                                                   </a> <hr/>  
                                                                                    <a href="edit_data.php?data_id='.$active['online_stu_id'].'&name=comment"> 
                                                                                       <b class="btn btn-primary myFont"> Add Comment  </b>
                                                                                   </a>
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

                                  $result   = $loader->TeacherSubjectStudentExam($school_code, $subject);	 
                                  $FectSubject   = $loader->FecthSingleSubject($subject);	 
                                  
                                   echo'	 
                                   <div class="card mb-4">
                                           <div class="card-header bg bg-danger text-white">
                                               <i class="fas fa-table mr-1"></i>
                                           <h3>My '.$FectSubject.' Exam Students  </h3>
                                           </div>

                                           <div class="card-body">
                                               <div class="table-responsive">
                                                           <table class="table table-bordered" id="dataTable_6" width="100%" cellspacing="0">
                                                           
                                                       
                                                                               <thead>
                                                                               <tr>
                                                                                   <th>Operations </th> 
                                                                                   <th>Student Details </th>    
                                                                                   <th>Student Score</th>  
                                                                               </tr>
                                                                           </thead>  
                                                                           <tbody> ';
                                                                           foreach($result as $active)
                                                                           {
                                                                               $schCode =  $active['school_code'];	 
                                                                               $stuCode =  $active['student_code'];
                                                                               $score =  $active["$subject"];
                                                                               
                                                                               $schoolName =  $loader-> SchoolName($active['school_code']);	 
                                                                               $StudentName = $loader-> StudentName($active['student_code']);	
                                                                               $StudentPhoto = $loader-> StudentPhoto($active['student_code']);	
                                                                               
                                                                               
                                                                               echo'<tr role="row" class="odd">
                                                                                 <td>  
                                                                                   
                                                                                     <b class="btn btn-success myFont" data-toggle="modal" data-target="#'.$active['student_code'].'">Edit Exam Score</b>
                                                                                    
                                                                                 </td>

                                                                                 <td style="display:flex;"> 
                                                                                     <img src="../'.$SchoolIMG .'/'.$active['school_code'].'/'.$StudentPhoto.'"  style="text-align:center;width:100px;height:100px;border-radius:1500px"/> 
                                                                                     <div style="margin-left:20px">
                                                                                     <b style="text-align:left;">Student Name: '.$StudentName.'</b><br/>
                                                                                     <b style="text-align:left;">Student ID: '.$active['student_code'].'</b>
                                                                                     </div>
                                                                                 </td>

                                                                                  
                                                                                 
                                                                                 <td style="font-size:25px"> 
                                                                                '.$active["$subject"].'  
                                                                                 </td>  
                                                                           
                                                                              
                                                                                 

                                                                               <div class="col-md-4 modal-grids  ">
                                                                               <div class="modal fade" id="'.$active['student_code'].'" tabindex="-1" role="dialog" aria-labelledby="'.$active['student_code'].'Label">

                                                                               <a href="#"  > <div class="btn btn-danger" data-toggle="modal" data-target="#disapproveMaintenance">Edit Score</div></a>

                                                                               <div class="modal-dialog" role="document">
                                                                               <div class="modal-content">
                                                                               <div class="modal-header">
                                                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                                               </div>

                                                                               <div class="modal-body"> 
                                                                               <center class="text-danger">  
                                                                               <p style="color:black"> '.$StudentName.' </p>
                                                                               <img src="../'.$SchoolIMG .'/'.$active['school_code'].'/'.$StudentPhoto.'"  style="text-align:center;width:100px;height:100px;border-radius:1500px"/> <br>
                                                                               Edit  '.$StudentName.'  Exam Score <br> 
                                                                               |<br>
                                                                               \/
                                                                               </center><hr />	

                                                                               <div>
                                                                                   <center>
                                                                                     <input type="text" class="form-control" value="'.$active["$subject"].'"      id="examScore'.$stuCode.'"      name="examScore"   /><br/>
                                                                               ';
                                                                             echo" <input type='button' class='btn btn-primary' onclick='getExamscore(\"$schCode\",\"$stuCode\",\"$score\",\"$subject\")' value='Update Score'>";
                                                                               echo'
                                                                                   </center>
                                                                               </div>  


                                                                               </div>


                                                                               </div> 
                                                                               </div> 
                                                                               </div> 
                                                                               </div>


                                               
                                                                               </tr>
                                                                               ';
                                                                         
                           
                           
                                                                             
                                                                           } 					
                                                                   echo'</tbody>
                                                       </table>
                                                   </div>
                                               </div>
                                            
                                  </div>'; 



                                  $result   = $loader->TeacherSubjectStudentTest($school_code, $subject);	 
                                  $FectSubject   = $loader->FecthSingleSubject($subject);	 
                                 
                                   echo'	 
                                   <div class="card mb-4">
                                           <div class="card-header bg bg-success text-white">
                                               <i class="fas fa-table mr-1"></i>
                                           <h3>My '.$FectSubject.' Mid-Term Test Students  </h3>
                                           </div>

                                           <div class="card-body">
                                               <div class="table-responsive">
                                                           <table class="table table-bordered" id="dataTable_7" width="100%" cellspacing="0">
                                                           
                                                       
                                                                               <thead>
                                                                               <tr>
                                                                                   <th>Operations </th> 
                                                                                   <th>Student Details </th>    
                                                                                   <th>Student Score</th>  
                                                                               </tr>
                                                                           </thead>  
                                                                           <tbody> ';
                                                                           foreach($result as $active)
                                                                           {

                                                                             $schCode =  $active['school_code'];	 
                                                                             $stuCode =  $active['student_code'];
                                                                             $score =  $active["$subject"];


                                                                           $schoolName =  $loader-> SchoolName($active['school_code']);	 
                                                                           $StudentName = $loader-> StudentName($active['student_code']);	
                                                                           $StudentPhoto = $loader-> StudentPhoto($active['student_code']);	
                                                                           
                                                                               
                                                                               echo'<tr role="row" class="odd">
                                                                                 <td>  
                                                                                 
                                                                                     <b class="btn btn-success myFont" data-toggle="modal" data-target="#test'.$active['id'].'">Edit Mid-Term Test Score</b>
                                                                                   
                                                                                 </td>

                                                                                 <td style="display:flex;"> 
                                                                                     <img src="../'.$SchoolIMG .'/'.$active['school_code'].'/'.$StudentPhoto.'"  style="text-align:center;width:100px;height:100px;border-radius:1500px"/> 
                                                                                     <div style="margin-left:20px">
                                                                                     <b style="text-align:left;">Student Name: '.$StudentName.'</b><br/>
                                                                                     <b style="text-align:left;">Student ID: '.$active['student_code'].'</b>
                                                                                     </div>
                                                                                 </td>

                                                                                 
                                                                                 
                                                                                 <td style="font-size:25px"> 
                                                                               '.$active["$subject"].'  
                                                                                 </td>  
                                                                           
                                                                             
                                                                                 <div class="col-md-4 modal-grids  ">
                                                                                 <div class="modal fade" id="test'.$active['id'].'" tabindex="-1" role="dialog" aria-labelledby="test'.$active['id'].'Label">

                                                                                 <a href="#"  > <div class="btn btn-danger" data-toggle="modal" data-target="#disapproveMaintenance">Edit Mid-Term Test Score</div></a>

                                                                                 <div class="modal-dialog" role="document">
                                                                                 <div class="modal-content">
                                                                                 <div class="modal-header">
                                                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                                                 </div>

                                                                                 <div class="modal-body"> 
                                                                                 <center class="text-danger">  
                                                                                 <p style="color:black"> '.$StudentName.' </p>
                                                                                 <img src="../'.$SchoolIMG .'/'.$active['school_code'].'/'.$StudentPhoto.'"  style="text-align:center;width:100px;height:100px;border-radius:1500px"/> <br>
                                                                                 Edit  '.$StudentName.'  Mid-Term Test Score <br> 
                                                                                 |<br>
                                                                                 \/
                                                                                 </center><hr />										
                                                                                 <div lass="row center">
                                                                                 <center>
                                                                                       <input type="text" class="form-control" value="'.$active["$subject"].'"      id="testScore'.$stuCode.'"      name="testScore"   /><br/>
                                                                                 ';
                                                                               echo" <input type='button' class='btn btn-primary' onclick='getTestscore(\"$schCode\",\"$stuCode\",\"$score\",\"$subject\")' value='Update Score'>";
                                                                                 echo'
                                                                                     </center>
                                                                                 </div>  
                                                                                 </div>


                                                                                 </div> 
                                                                                 </div> 
                                                                                 </div> 
                                                                                 </div>



                                                                               </tr>
                                                                               ';
                                                                         
                           
                           
                                                                             
                                                                           } 					
                                                                   echo'</tbody>
                                                       </table>
                                                   </div>
                                               </div>
                                           
                                   </div>'; 




                                   $result   = $loader->TeacherSubjectStudentAssesment($school_code, $subject);	 
                                  $FectSubject   = $loader->FecthSingleSubject($subject);	 
                                 
                                   echo'	 
                                   <div class="card mb-4">
                                           <div class="card-header bg bg-dark text-white">
                                               <i class="fas fa-table mr-1"></i>
                                           <h3>My '.$FectSubject.' Weekly Assessment  </h3>
                                           </div>

                                           <div class="card-body">
                                               <div class="table-responsive">
                                                           <table class="table table-bordered" id="dataTable_7" width="100%" cellspacing="0">
                                                           
                                                       
                                                                               <thead>
                                                                               <tr>
                                                                                   <th>Operations </th> 
                                                                                   <th>Student Details </th>    
                                                                                   <th>Student Score</th>  
                                                                               </tr>
                                                                           </thead>  
                                                                           <tbody> ';
                                                                           foreach($result as $active)
                                                                           {

                                                                             $schCode =  $active['school_code'];	 
                                                                             $stuCode =  $active['student_code'];
                                                                             $score =  $active["$subject"];


                                                                           $schoolName =  $loader-> SchoolName($active['school_code']);	 
                                                                           $StudentName = $loader-> StudentName($active['student_code']);	
                                                                           $StudentPhoto = $loader-> StudentPhoto($active['student_code']);	
                                                                           
                                                                               
                                                                               echo'<tr role="row" class="odd">
                                                                                 <td>  
                                                                                 
                                                                                     
                                                                                 </td>

                                                                                 <td style="display:flex;"> 
                                                                                     <img src="../'.$SchoolIMG .'/'.$active['school_code'].'/'.$StudentPhoto.'"  style="text-align:center;width:100px;height:100px;border-radius:1500px"/> 
                                                                                     <div style="margin-left:20px">
                                                                                     <b style="text-align:left;">Student Name: '.$StudentName.'</b><br/>
                                                                                     <b style="text-align:left;">Student ID: '.$active['student_code'].'</b>
                                                                                     </div>
                                                                                 </td>

                                                                                 
                                                                                 
                                                                                 <td style="font-size:25px"> 
                                                                               '.$active["$subject"].'  
                                                                                 </td>  
                                                                           
                                                                             
                                                                                 <div class="col-md-4 modal-grids  ">
                                                                                 <div class="modal fade" id="test'.$active['id'].'" tabindex="-1" role="dialog" aria-labelledby="test'.$active['id'].'Label">

                                                                                 <a href="#"  > <div class="btn btn-danger" data-toggle="modal" data-target="#disapproveMaintenance">Edit Mid-Term Test Score</div></a>

                                                                                 <div class="modal-dialog" role="document">
                                                                                 <div class="modal-content">
                                                                                 <div class="modal-header">
                                                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                                                 </div>

                                                                                 <div class="modal-body"> 
                                                                                 <center class="text-danger">  
                                                                                 <p style="color:black"> '.$StudentName.' </p>
                                                                                 <img src="../'.$SchoolIMG .'/'.$active['school_code'].'/'.$StudentPhoto.'"  style="text-align:center;width:100px;height:100px;border-radius:1500px"/> <br>
                                                                                 Edit  '.$StudentName.'  Mid-Term Test Score <br> 
                                                                                 |<br>
                                                                                 \/
                                                                                 </center><hr />										
                                                                                 <div lass="row center">
                                                                                 <center>
                                                                                     
                                                                                     </center>
                                                                                 </div>  
                                                                                 </div>


                                                                                 </div> 
                                                                                 </div> 
                                                                                 </div> 
                                                                                 </div>



                                                                               </tr>
                                                                               ';
                                                                         
                           
                           
                                                                             
                                                                           } 					
                                                                   echo'</tbody>
                                                       </table>
                                                   </div>
                                               </div>
                                           
                                   </div>'; 
                                }
                                
                                
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
  
  
  
  function getExamscore(a,b,c,d) {

    var	score = document.getElementById("examScore"+b).value;  
 
 
//  console.log(a);
//  console.log(b); 
//  console.log(score); 

 
 
  if(score > 0 && score < 71)
  {
		 
            $.ajax({
                url:"pageajax.php",
                method:"POST",
                dataType:"json",
                data:{
                  schCode:a,   
                  stuCode:b,   
                  subject:d,   
                  score:score,   
                  type:'examScore',
                  page:'updateStudentScoreMark',
                  action:'updateStudentScoreMark'
                  },
                success:function(data)
                {
                    if(data.success){
                      
                      window.location.reload();
                    }
                    else
                    {
                      
                      alert(data.feedback);
                      
                    }
                }
              });	

	  }else{
          alert('Score field must not be empty and must be less or equal to 70Marks');
    }
	 
 
}


  function getTestscore(a,b,c,d) {

    var	score = document.getElementById("testScore"+b).value;  
 
 
 
  
        if(score > 0 && score < 31)
          {
          
                  $.ajax({
                      url:"pageajax.php",
                      method:"POST",
                      dataType:"json",
                      data:{
                        schCode:a,   
                        stuCode:b,   
                        subject:d,
                        score:score,   
                        type:'testScore',
                        page:'updateStudentScoreMark',
                        action:'updateStudentScoreMark'
                        },
                      success:function(data)
                      {
                          if(data.success){
                            window.location.reload();
      
                          }
                          else
                          {
                            
                            alert(data.feedback);
                            
                          }
                      }
                    });	

          }else{
            alert('Score field must not be empty and must be less or equal to 30Marks');
          }
        
      
}


function restoreScoreAssessment(a,b,c,d) {

    var	score = document.getElementById("testScore"+b).value;  
 
 
 
  
    
          
                  $.ajax({
                      url:"pageajax.php",
                      method:"POST",
                      dataType:"json",
                      data:{
                        schCode:a,   
                        stuCode:b,   
                        subject:d,
                        score:score,   
                        type:'testScore',
                        page:'restoreScoreAssessment',
                        action:'restoreScoreAssessment'
                        },
                      success:function(data)
                      {
                          if(data.success){
                            window.location.reload();
      
                          }
                          else
                          {
                            
                            alert(data.feedback);
                            
                          }
                      }
                    });	

      
        
      
}

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
	

	
	
	

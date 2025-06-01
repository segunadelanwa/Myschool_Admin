<!DOCTYPE html>
<html lang="en">
    <head>
				<?php
        require("../topUrl.php");
				require("../header.php");
				require("title.php");
				?>

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

        $default_pass = '000000';
        echo$encrypt_pass = md5($default_pass) 

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
                        <div class="row"  >
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
								
                                    <div class="card-body"><center><h2 ><?php echo $loader-> DisplayTotalSchoolRow();	?> </h2></center>SCHOOLS</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#school">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
							
							 <div class="col-xl-3 col-md-6" >
                   
                              <div class="card bg-danger text-white mb-4">
              
                                  <div class="card-body"><center><h2 ><?php echo $loader-> AllTeachers();	?> </h2></center>TEACHERS </div> 
                                  <div class="card-footer d-flex align-items-center justify-content-between">
                                      <a class="small text-white stretched-link" href="#teacher">View Details</a>
                                      <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                  </div>
                              </div>
                          </div>
                     <div class="col-xl-3 col-md-6" >
                                <div class="card bg-success text-white mb-4">
							
                                    <div class="card-body">	<center><h2 ><?php echo $loader-> DisplayAllStudentRow();	?></h2></center> STUDENTS</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#student">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>

							
                            <div class="col-xl-3 col-md-6"  >
                                <div class="card bg-dark text-white mb-4">
								
                                    <div class="card-body"><center><h2 ><?php echo $loader-> DisplayTeamLeadRow();	?> </h2></center> TEAM LEAD</div> 
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#field_admin">Field Admin</a>
                                        <div class="small text-white"><?php echo $loader-> DisplayMarketerRow();	?></div>
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
                                        Approval Overview
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
							
                        </div>
						
						
						
						
						
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
                                                <th>Operations </th> 
                                                <th>School Name</th> 
                                                <th>School Address</th> 
                                                <th>Total Students</th>
                                                <th>Paid Students </th>
                                                <th>Unpaid Students</th>
                                                <th>Field Admin</th>            
                                                <th>School Revenue</th>
                                                <th>38% <br/>Company Earn</th>                           
                                                <th>20% <br/>School Earn</th>
                                                <th>30% <br/>Teacher Earn</th>
                                                <th>4% <br/>H-Teacher Earn</th>
                                                <th>4% <br/>F-Admin Earn</th>
                                                <th>4% <br/>Computer Lab-Maint</th>
                                                <th>Remitance</th>
                                                <th>Date </th>
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
                                              <?php 
                                            
                                            $result = $loader-> SchoolActivities();	
                                            
                                            foreach($result as $active)
                                            {
                                            $ActiveStudent  = $loader-> ActiveStudent($active['school_code']);	
                                            $PassiveStudent = $loader-> PassiveStudent($active['school_code']);	 
                                            $SchoolRevenue  = $loader-> SchoolRevenue($active['school_code']);	 
                                            $TeacherEarn    = $loader-> TeacherEarn($active['school_code']);	 
                                            $HeadTeacherEarn= $loader-> HeadTeacherEarn($active['school_code']);	 
                                            $SchoolEarn     = $loader-> SchoolEarn($active['school_code']);	 
                                            $FieldAdminEarn = $loader-> FieldAdminEarn($active['school_code']);	 
                                            $CompanyEarn    = $loader-> CompanyEarn($active['school_code']);	
                                            $total_row      = $loader-> SchoolStudentNummber($active['school_code']);	
                                            $ComLabMaint    = $loader-> ComLabMaint($active['school_code']);	
                                            //src="../'.$FielAdmin .'/'.$active['photo'].'"    
                                                echo'<tr role="row" class="odd">
                                              
                                                  <td> 
                                                  
                                                  <br/>
                                                  <a href="edit_data.php?data_id='.$active['school_code'].'&name=school">   <b class="btn btn-dark myFont mb-2"> Edit School </b>   </a> 
                                                 <a href="payment_history.php?payee_id='.$active['school_code'].'&name='.$active['school_name'].'" class="btn btn-success myFont mb-2">  Payment History  </a> 
                                                 <a href="teacher_school.php?school_code='.$active['school_code'].'&name='.$active['school_name'].'">  <b class="btn btn-info myFont mb-2">  Teachers </b>  </a>
                                                 <a href="school_students.php?school_code='.$active['school_code'].'&name='.$active['school_name'].'">  <b class="btn btn-info myFont mb-2">  Students </b>  </a>
                                                 <a href="delete_account.php?delete_id='.$active['school_code'].'&name=school">  <b class="btn btn-danger myFont mb-2">Delete Account </b>  </a>
                                                  </td> 
                                                  
                                                  <td><img src="../'.$SchoolIMG .'/'.$active['school_code'].'/'.$active['school_logo'].'"  style="height:60px"/> <br/>'.$active['school_name'].' <br/> <b>School ID: '.$active['school_code'].' </b></td>
                                                  <td>'.$active['school_address'].' <br/> '.$active['school_email'].'</td>
                                                  <td>'.$total_row.' </td>
                                                  <td>'.$ActiveStudent.' </td>
                                                  <td>'.$PassiveStudent.' </td>
                                                  <td>'.$active['fadmin_code'].' </td>
                                                  <td>N'.number_format($SchoolRevenue,2).' </td> 
                                                  <td>N'.number_format($CompanyEarn,2).' </td> 
                                                  <td>N'.number_format($SchoolEarn,2).' </td> 
                                                  <td>N'.number_format($TeacherEarn,2).' </td> 
                                                  <td>N'.number_format($HeadTeacherEarn,2).' </td>        
                                                  <td>N'.number_format($FieldAdminEarn,2).' </td> 
                                                  <td>N'.number_format($ComLabMaint,2).' </td> 
                                                  <td>'.$active['school_payment'].' </td> 
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
                                                <th>School Name</th> 
                                                <th>Teacher username</th> 
                                                <th>Teacher Name</th>
                                                <th>Gender </th> 
                                                <th>Acct Details</th>
                                                <th>Reg Date</th>
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
                                              <?php 
                                            
                                            $result = $loader-> DisplayTeachersRow();	
                                            
                                            foreach($result as $active)
                                            {
                                            $SchoolName     = $loader-> SchoolName($active['school_code']);	 
                                            $EachTeacherEarn = $loader-> EachTeacherEarn($active['school_code']);	 
                                            $HeadTeacherEarn = $loader-> HeadTeacherEarn($active['school_code']);	 
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
                                                  <td>'.$SchoolName.' </td>  
                                                  <td>
                                                  '.$active['username'].'<br/>
                                                   Status: <b> '.$active['teacher_rank'].'  </b><br/>
                                                   Subject: <b> '.$subJect.'  </b> 
                                                  </td> 
                                                  <td>'.$active['fullname'].' </td> 
                                                  <td>'.$active['gender'].' </td>  
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
                                                  <th>School Details</th> 
                                                  <th>Parent Name</th> 
                                                  <th>Student Details</th>
                                                  <th>Gender </th>
                                                  <th>Class</th> 
                                                  <th>School Fee</th>
                                                  <th>CBT Sub</th>
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
                                                        <a href="edit_data.php?data_id='.$active['online_stu_id'].'&name=student"> 
                                                          <b class="btn btn-dark myFont mb-2"> Edit Student </b>
                                                        </a> 
                                                        <a href="student_subject_setup.php?student_id='.$active['online_stu_id'].'"> 
                                                          <b class="btn btn-primary myFont mb-2"> View Subjects </b>
                                                        </a>
                                                        <a href="student_subject_check.php?student_id='.$active['online_stu_id'].'"> 
                                                          <b class="btn btn-success myFont mb-2"> Remove Subjects </b>
                                                        </a>
                                                        <a href="student_result.php?student_id='.$active['online_stu_id'].'&name='.$active['student_name'].'"> 
                                                          <b class="btn btn-info myFont mb-2"> Student Result </b>
                                                        </a>
                                                        <a href="delete_account.php?delete_id='.$active['online_stu_id'].'&name=student"> 
                                                          <b class="btn btn-danger myFont mb-2">Delete Account </b>
                                                        </a>
                                                      </td> 
                                                      <th>
                                                       <img src="../'.$SchoolIMG .'/'.$active['school_code'].'/'.$active['photo'].'"  style="width:100px;height:100px;border-radius:1500px"/>  <br/>
                                                      Student ID:<br/><b>'.$active['online_stu_id'].' </b> 
                                                      </td>
                                                      <td>
                                                      School Name<br/><b>'.$schoolName.'</b> <hr/>
                                                      School Code<br/><b>'.$active['school_code'].'</b> <br/>
                                                      
                                                      </td>  
                                                      <td>'.$parent_code.' </td>
                                                      <td>
                                                      Student Name:<br/><b>'.$active['student_name'].'</b>
                                                     
                                                      </td> 
                                                      <td>'.$active['stu_gender'].' </td> 
                                                      <td>'.$active['student_class'].' </td> 
                                              
                                                      <td>'.$active['school_fee'].' </td> 
                                                      <td>'.$active['sub_status'].' </td> 
                                                      <td>'.$active['date'].'<br /> </td> 
                                                      
                                                      
                                                        
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
                                          
                                                $result = $loader-> AllRegisteredParent();	
                                                
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
                    	
                        

                        <div class="card mb-4" id="field_admin">
                            <div class="card-header bg bg-dark text-white">
                                <i class="fas fa-table mr-1"></i>
                               <h3>Team Lead </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable_5" width="100%" cellspacing="0">
                                       
                                   
                                        <thead>
                                            <tr>
                                                <th>Operations</th>
                                                <th>Photo </th>
                                                <th>Username</th> 
                                                <th>Names</th>
                                                <th>Phone </th>
                                                <th>Address</th>
                                                <th>Term Earn</th>
                                                <th>School Onboard</th>
											                          <th>Net Earn</th>
											                          <th>Bank Details</th>
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
                                            <?php 

                                            $result = $loader-> AllTeamLead();	
                                            
                                            foreach($result as $active)
                                            { 	 	
                                              $FieldAdminNetEarn = $loader-> FieldAdminNetEarn($active['team_lead_id']);	
                                              $FieldAdminEarn = $loader-> FieldAdminEarn($active['team_lead_id']);	
                                            $schoolGained = $loader-> SchoolMarketed($active['team_lead_id']);	 	
                                            $bank_name = $loader->FetchBankName($active['bank_name']);
                                            echo'<tr role="row" class="odd">
                                                    
                                              <td style="text-align:center;"> 
                                                <a href="edit_data.php?data_id='.$active['team_lead_id'].'&name=TeamLead">   <b class="btn btn-dark myFont mb-2"> Edit Team Lead </b>   </a> 
                                                <a href="payment_history.php?payee_id='.$active['team_lead_id'].'&name='.$active['fullname'].'" class="btn btn-success  myFont mb-2">   Payment History   </a>
                                                <a href="onboard_school.php?officer='.$active['team_lead_id'].'&name=TeamLead">   <b class="btn btn-primary myFont mb-2">Schools Onboard</b>  </a>
                                                <a href="delete_account.php?delete_id='.$active['team_lead_id'].'&name=TeamLead">   <b class="btn btn-danger myFont mb-2">Delete Account </b>  </a>
                                             </td> 
                                              <td style="text-align:center;">  <img src="../'.$Teamlead .'/'.$active['photo'].'"  style="height:60px"/> <br/>   <b>'.$active['team_lead_id'].' </b>  </td>  
                                              <td>'.$active['username'].' <br/><b>Acct Ofiicer</b>: '.$active['admincode'].'</td> 
                                              <td>'.$active['fullname'].' <br/> <b>Date</b>:'.$active['date_reg'].'</td> 
                                              <td>'.$active['phone'].' </td> 
                                              <td>'.$active['address'].' </td>  
                                               <td>N'.number_format($FieldAdminEarn,2).' </td> 
                                              <td>'.$schoolGained.' </td> 
                                              <td>N'.number_format($FieldAdminNetEarn,2).' </td> 
                                              <td><small>
                                                '.$bank_name.' <hr/>
                                              '.$active['acct_name'].'<hr/>
                                              '.$active['acct_number'].'
                                              </small>
                                              </td> 
                                                
                                                
                                                  
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
                            <div class="card-header bg bg-warning text-white">
                                <i class="fas fa-table mr-1"></i>
                               <h3> Field Admin  </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable_8" width="100%" cellspacing="0">
                                       
                                   
                                        <thead>
                                            <tr>
                                                <th>Operations</th>
                                                <th>Photo </th>
                                                <th>Username</th> 
                                                <th>Names</th>
                                                <th>Phone </th>
                                                <th>Address</th>
                                                <th>Term Earn</th>
                                                <th>School Onboard</th>
											                          <th>Net Earn</th>
											                          <th>Bank Details</th>
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
                                            <?php 

                                            $result = $loader-> AllFieldAdmin();	
                                            
                                            foreach($result as $active)
                                            { 	 	
                                              $FieldAdminNetEarn = $loader-> FieldAdminNetEarn($active['marketer_code']);	
                                              $FieldAdminEarn = $loader-> FieldAdminEarn($active['marketer_code']);	
                                            $schoolGained = $loader-> SchoolMarketed($active['marketer_code']);	 	
                                            $bank_name = $loader->FetchBankName($active['bank_name']);
                                            echo'<tr role="row" class="odd">
                                                    
                                              <td style="text-align:center;"> 
                                                <a href="edit_data.php?data_id='.$active['marketer_code'].'&name=field_admin">   <b class="btn btn-dark myFont mb-2"> Edit Field Admin </b>   </a> 
                                                <a href="payment_history.php?payee_id='.$active['marketer_code'].'&name='.$active['fullname'].'" class="btn btn-success  myFont mb-2">   Payment History   </a>
                                                <a href="onboard_school.php?officer='.$active['marketer_code'].'&name=fieldAdmin">   <b class="btn btn-primary myFont mb-2">Onboard school </b>  </a>
                                                <a href="delete_account.php?delete_id='.$active['marketer_code'].'&name=fieldAdmin">   <b class="btn btn-danger myFont mb-2">Delete Account </b>  </a>
                                             </td> 
                                              <td style="text-align:center;">  <img src="../'.$FielAdmin .'/'.$active['photo'].'"  style="height:60px"/> <br/>   <b>'.$active['marketer_code'].' </b>  </td>  
                                              <td>'.$active['username'].' <br/><b>Acct Ofiicer</b>: '.$active['admincode'].'</td> 
                                              <td>'.$active['fullname'].' <br/> <b>Date</b>:'.$active['date_reg'].'</td> 
                                              <td>'.$active['phone'].' </td> 
                                              <td>'.$active['address'].' </td>  
                                               <td>N'.number_format($FieldAdminEarn,2).' </td> 
                                              <td>'.$schoolGained.' </td> 
                                              <td>N'.number_format($FieldAdminNetEarn,2).' </td> 
                                              <td><small>
                                                '.$bank_name.' <hr/>
                                              '.$active['acct_name'].'<hr/>
                                              '.$active['acct_number'].'
                                              </small>
                                              </td> 
                                                
                                                
                                                  
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
                            <div class="card-header bg bg-primary text-white">
                                <i class="fas fa-table mr-1"></i>
                               <h3>Admins Account </h3>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable_7" width="100%" cellspacing="0">
                                       
                                   
                                        <thead>
                                            <tr>
                                                <th>Photo </th>
                                                <th>Fullname </th>
                                                <th>Gender</th>
                                                <th>Pone</th>
                                                <th>Address</th> 
                                                <th>Department </th>
                                                <th>Bank Details</th>  
											                          <th>Reg Date</th>
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
                                            <?php 
                                          
                                                $result = $loader-> AllRegisteredAdmin();	
                                                
                                                foreach($result as $active)
                                                { 	 	
                                            
                                                  
                                                  if($active['admin_access'] == 'proprietor')
                                                  {
                                                   $out_admin_access = 'Proprietorship';
                                                  }else{
                                                    $out_admin_access = $active['admin_access'];
                                                  }
                                                  
                                                    echo'<tr role="row" class="odd">
                                                          
                                                    
                       
                                                      <td> <img src="../'.$SchoolIMG .'/'.$active['school_code'].'/'.$active['photo'].'"  style="height:60px"/> <br/>
                                                      '.$active['username'].'<br/>
                                                      
                                                      </td> 
                                                      <td>'.$active['fullname'].'</td> 
                                                      <td>'.$active['gender'].' </td> 
                                                      <td>'.$active['phone'].' </td> 
                                                      <td>'.$active['address'].' </td>    
                                                      <td>'.$active['admin_depart'].' <hr/>
                                                      <span style="text-transform:uppercase">Role: '.$out_admin_access.'</span>
                                                      </td>    
                                                      <td>
                                                      '.$active['bank_name'].' <br/>
                                                      '.$active['account_name'].' <br/>
                                                      '.$active['account_number'].' <br/>
                                                      </td>    
                                                      <td>'.$active['date'].'<br /> </td> 
                                                      
                                                      
                                                        
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
	

	
	
	

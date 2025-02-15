<!DOCTYPE html>
<html lang="en">
    <head>
				<?php
        require("../topUrl.php");
				require("../header.php");
			
        $logo ="../'.$SchoolIMG.'/'.$school_code.'/'.$photo.'";
				?>
        <title>  <?php echo $output = strtoupper($school_name); ?>  </title>
        <link rel="apple-touch-icon" href="<?php echo$logo; ?>" />
        <link rel="shortcut icon"    href="<?php echo$output; ?>" />	
    </head>
    <style>
    .myFont{
      font-size:12px
    
    }

/* Modal container */
.modal {
  display: block; /* Hidden by default */
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  overflow: scroll;
  background-color: rgba(0, 0, 0, 0.5); /* Overlay */
  z-index: 5000;
}

/* Modal content */
.modal-content {
  position: relative;
  overflow: scroll;
  width: 100%;
  max-width: 600px;
  margin: 40px auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 10px; 
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

/* Modal header */
.modal-header {
  border-bottom: 1px solid #ddd;
  padding-bottom: 10px;
  width:100%;
}

/* Modal footer */
.modal-footer {
  border-top: 1px solid #ddd;
  padding-top: 10px;
  text-align: right;
}

/* Modal trigger */
.modal-trigger {
  cursor: pointer;
}

/* Modal close */
.modal-close {
  cursor: pointer;
}

/* Show modal on click */
.modal-trigger:focus + .modal {
  display: block;
}

/* Hide modal on close */
.modal-close:focus + .modal {
  display: none;
}
    
    </style>

 
<script>
   document.addEventListener('DOMContentLoaded', (event) => {    
     var myModal = new bootstrap.Modal(document.getElementById("exampleModal")); 
     myModal.show();
     
   });
</script>

    <body class="sb-nav-fixed" >
      
    <div id="modal_loader" class="modal-backdrop loaderDisplayNone"  >  
			<?php
			require("../loader.php");
			?>
		
	</div>

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


                                if($exam_score == '0' || $test_score == '0' || $exam_time == '0' || $test_time == '0' )
                                  {

                                     echo $data ='
                                                      
                                      <div class="modal">
                                       
                                        <div class="modal-content">
                                         
                                          <div class="modal-header">
                                            <h2 style="text-transform:uppercase;text-align:center;">'.$school_name.'<br/>  TODO LIST</h2>
                                          </div>
                                          
                                              <div class="modal-body">
                                                                
                                                      <form method="POST"   id="user_register_form">

                                                      <div class="card-header mb-3">
                                                      <i class="fas fa-tag"></i>
                                                      SCHOOL ACTIVITIES SETTINGS
                                                      </div>	 

                                                      <div class="form-group">			
                                                      <label>Exam Score Mark(e.g 5marks or 1mark on each question answered correctly)</label>
                                                      <input type="number" name="exam_score" placeholder="0"  id="exam_score" class="form-control py-4"  required />
                                                      </div>


                                                      <div class="form-group">			
                                                      <label>Test Score Mark(e.g 5marks or 1mark on each question answered correctly)</label>
                                                      <input type="number" name="test_score" placeholder="0"  id="test_score" class="form-control py-4"  required />
                                                      </div>


                                                      <div class="form-group">			
                                                      <label>Exam Time (e.g 90 equal to 1:30min)</label>
                                                      <input type="number" name="exam_time" placeholder="0"  id="exam_time" class="form-control py-4"  required />
                                                      </div>



                                                      <div class="form-group">			
                                                      <label>Test Time (e.g 30 equal to 30min)</label>
                                                      <input type="number" name="test_time" placeholder="0"  id="test_time" class="form-control py-4"  required />
                                                      </div>



                                                      <div class="form-group ">
                                                      <label> Current Term</label>
                                                      <select   id="current_term"  name="current_term"   class="form-control" >
                                                      <option value="" selected="selected">-- Select current term--</option>   
                                                      <option value="1st">First Term</option>   
                                                      <option value="2nd">Second Term</option>   
                                                      <option value="3rd">Third Term</option>     
                                                      </select>
                                                      </div>


                                                      <div class="form-group">			
                                                      <label>Academy Session</label>
                                                      <input type="text" name="session" placeholder="2024/2025"  id="session" class="form-control py-4"  required />
                                                      </div><hr/>


                                                      <div class="form-group">	
                                                      <label>School Website  (optional) </label>
                                                      <input class="form-control py-4" placeholder="School Website"   type="text" name="website" id="website" class="form-control"   />
                                                      </div>  


                                                      <div class="form-group">			
                                                      <label>School Motor  </label>
                                                      <input type="text" name="school_motor" placeholder="Account name"  id="school_motor" class="form-control py-4"  required />
                                                      </div>  


                                                      <div class="form-group">			
                                                      <label>School Week </label>
                                                      <input type="text" name="school_week" placeholder="school week"  id="school_week" class="form-control py-4"  required />
                                                      </div><hr/>


                                                      <div class="card-header mt-5 mb-3">
                                                      <i class="fas fa-tag"></i>
                                                      SCHOOL MANAGEMENT
                                                      </div>		


                                                      <div class="form-group">			
                                                      <label>Proprietor/proprietress Photo</label>
                                                      <input type="file" name="schl_propritor_photo" placeholder="School Proprietor Photo"  id="schl_propritor_photo" class="form-control  "  required />
                                                      </div>



                                                      <div class="form-group">			
                                                      <label>Proprietor/proprietress Greeting Message </label>
                                                      <input type="text" name="schl_propritor_msg" placeholder="School Proprietor Message"  id="schl_propritor_msg" class="form-control py-4"  required />
                                                      </div> 



                                                      <div class="form-group">			
                                                      <label>Head Teacher Photo</label>
                                                      <input type="file" name="schl_head_photo" placeholder="School Head Photo"  id="schl_head_photo" class="form-control  "  required />
                                                      </div>



                                                      <div class="form-group">			
                                                      <label>Head Teacher Greeting Message</label>
                                                      <input type="text" name="schl_head_msg" placeholder="School Head Message"  id="schl_head_msg" class="form-control py-4"  required />
                                                      </div>  





                                                      <input type="hidden" name="page"   value="admin_signup_page" />
                                                      <input type="hidden" name="action" value="school_signup_action" />
                                                      <small> <a href="https://hebzihubnigltd.com.ng/privacy/"> On clicking Finish Setup you agree to our Term & Conditions else your  
                                                       previous setup will be deleted in the next 24 hours 
                                                       </a></small><br/>
                                                      <input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Finish Setup">

                                                      </form>                          

                                              </div>
                                         
                                           
                                        </div>
                                      </div>

                                    ';
                                  }
                                
                              ?>
                              <h3><?php echo $school_name; 	?> (<?php echo $current_term; 	?> Term)</h3>  
                              <h5><?php echo $school_address; 	?></h5>  
                              <h5 >School Type <span style="text-transform:capitalize"><?php echo $school_type; 	?></span></h5>  
                              <h5>School Code: <?php echo $school_code; 	?></h5>  
                              <h5> HI, <?php echo $fullname; 	?></h5>  
						             </div>


                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">  HOME</li>
                        </ol>
                        <div class="row"  >
                            <div class="col-xl-4 col-md-4">
                                <div class="card bg-primary text-white mb-4">
                                
                                    <div class="card-body"><center><h2 ><?php echo $loader-> DisplayTotalSchoolRow($school_code);	?> </h2></center>SCHOOL STUDENTS</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">School Parents</a>
                                        <div class="small text-white"><?php echo $loader-> DisplayTotalSchoolParentRow($school_code);	?></div>
                                    </div>
                                </div>
                            </div>
							
		 
            

							
                            <div class="col-xl-4 col-md-4"  >
                                <div class="card bg-success text-white mb-4">
								
                                    <div class="card-body"><center><h2 ><?php  echo$loader->DisplayTeachersRowCount($school_code);	?> </h2></center>SCHOOL TEACHERS</div> 
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#teacher">Uploaded Question</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-4 col-md-4"  >
                                <div class="card bg-danger text-white mb-4">
                                
                                    <div class="card-body"><center><h2 ><?php echo$loader->ActiveStudent($school_code);	?> </h2></center> CBT ACTIVE STUDENTS</div> 
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#student">Passive Student:</a>
                                        <div class="small text-white"><?php echo$loader->PassiveStudent($school_code);	?></div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-xl-3 col-md-3"  >
                                <div class="card bg-dark text-white mb-4">
								
                                    <div class="card-body"><center><h2 ><?php echo  'N'.number_format($loader->SchoolEarn($school_code),2); 	?> </h2></center> SCHOOL EARN</div> 
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#history">School CBT App Revenue</a>
                                        <div class="small text-white"><?php echo  'N'.number_format($loader->SchoolRevenue($school_code),2); 	?></div>
                                    </div>
                                </div>
                            </div> -->


                        </div>
						
                        <div class="row">
						
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                      School Activities
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
                                                $StartNewTerm = $loader->StartNewTerm($active['online_stu_id']);	
                                                  
                                                    if($StartNewTerm == 'success'){
                                                       $rawData ='
                                                       
                                                        <a href="edit_data.php?data_id='.$active['online_stu_id'].'&name=student"> 
                                                          <b class="btn btn-dark myFont mb-2"> Edit Student </b>
                                                        </a><br/>
                                                        <a href="student_subject_setup.php?student_id='.$active['online_stu_id'].'"> 
                                                          <b class="btn btn-primary myFont mb-2">Register Subjects </b>
                                                        </a><br/>
                                                        <a href="student_subject_check.php?student_id='.$active['online_stu_id'].'"> 
                                                          <b class="btn btn-success myFont mb-2">Subject Registered</b>
                                                        </a><br/>
                                                        <a href="student_result.php?student_id='.$active['online_stu_id'].'&name='.$active['student_name'].'"> 
                                                          <b class="btn btn-info myFont mb-2"> Student Result </b>
                                                        </a><br/>
                                                        <a href="delete_account.php?delete_id='.$active['online_stu_id'].'&name=student"> 
                                                          <b class="btn btn-danger myFont mb-2">Delete Account </b>
                                                        </a>';
                                                    }else  if($StartNewTerm == 'inactive'){
                                                      //41_student_subjects : admincode parent_code school_code student_code
                                                      //student_exam_result:date_term,'active',cur_term,parent_code,school_code,student_code,school_type
                                                      //student_test_result:date_term,'active',cur_term,parent_code,school_code,student_code,school_type
                                                      //student_weekly_assesment:date_term,'active',cur_term,parent_code,school_code,student_code,school_type
                                                   $admincode    =  $active['admincode']; 
                                                   $parent_code  =  $active['parent_code']; 
                                                   $school_code  =  $active['school_code']; 
                                                   $student_code =  $active['online_stu_id']; 
                                                     $rawData ="
                                                        <div  onclick='enrollStudentNewTerm(\"$admincode\",\"$parent_code\",\"$school_code\",\"$student_code\",\"$school_type\")'> 
                                                          <b class='btn btn-primary myFont mb-2'> Enroll Student For New Term </b>
                                                        </div>
                                                     ";
                                                    }


                                                    echo'<tr role="row" class="odd">
                                                          
                                                      <td style="text-align:center;">
                                                           '.$rawData.'
                                                      </td> 
                                                      <th>
                                                       <img src="../'.$SchoolIMG .'/'.$active['school_code'].'/'.$active['photo'].'"  style="width:100px;height:100px;border-radius:1500px"/>  <br/>
                                                      Student ID:<br/><b>'.$active['online_stu_id'].' </b> <br/>
                                                        <a href=" student_id_card.php?student_id='.$active['online_stu_id'].'&name=student"> 
                                                          <b class="btn btn-dark myFont mb-2">View ID Card </b>
                                                        </a><br>


                                                     
                                                      </td>
                                                      
                                                      <td>
                                                      '.$active['student_name'].'<br/> Class:'.$active['student_class'].' <hr>
                                                         <a href=" student_profile.php?student_id='.$active['online_stu_id'].'&name=student"> 
                                                          <b class="btn btn-dark myFont mb-2">View Profile </b>
                                                        </a>
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
                                                    <a href="edit_data.php?data_id='.$active['teacher_code'].'&name=teacher">   <b class="btn btn-dark myFont mb-2"> Edit Teacher </b>   </a><br/> 
                                                    <a href="student_list.php?teacher_code='.$active['teacher_code'].'&name='.$active['fullname'].'&type='.$active['subject'].'" class="btn btn-primary  myFont mb-2">  Teacher students  </a><br/>
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

                                                        <a href="add_new_student.php?parent_id='.$active['parent_code'].'"> 
                                                        <b class="btn btn-primary myFont mb-2">Add Student </b>
                                                        </a>
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
                                          
                                                $result = $loader-> AllRegisteredAdmin($school_code);	
                                                
                                                foreach($result as $active)
                                                { 	 	
                                                  if($admin_access === 'proprietor'|| $admin_access === 'head')
                                                  {
                                                   $outputAuth = ' <a class="btn btn-danger" href="authorize_admin.php?data_id='.$active['username'].'&school_id='.$active['school_code'].'" >Authorize User</a>';
                                                  }else{
                                                    $outputAuth = '';
                                                  }
                                                  
                                                  if($active['admin_access'] == 'proprietor')
                                                  {
                                                   $out_admin_access = 'Proprietorship';
                                                  }else{
                                                    $out_admin_access = $active['admin_access'];
                                                  }
                                                  
                                                    echo'<tr role="row" class="odd">
                                                          
                                                    
                       
                                                      <td> <img src="../'.$SchoolIMG .'/'.$active['school_code'].'/'.$active['photo'].'"  style="height:60px"/> <br/>
                                                      '.$active['username'].'<br/>
                                                      '.$outputAuth.'
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
  

var elementmodal = document.getElementById('modal_loader');

function enrollStudentNewTerm(a,b,c,d,e){

     //alert(a+b+c+d+e) 
              $.ajax({
                  url:"pageajax.php",
                  method:"POST",
                  dataType:"json",
                  data:{
                    admincode:a,   
                    parent_code:b,   
                    school_code:c,
                    student_code:d,
                    school_type:e,    
                    page:'enrollStudentNewTerm',
                    action:'enrollStudentNewTerm'
                    },
                    beforeSend:function()
                    {

                      elementmodal.classList.remove('loaderDisplayNone');
                      elementmodal.classList.add('loaderDisplayblock');

                    },
                    success:function(data)
                    {
                      
                          
                            if(data.success == 'success')
                            {

                                elementmodal.classList.remove('loaderDisplayblock');
                                elementmodal.classList.add('loaderDisplayNone');	
                                alert(data.feedback);
                                window.location.reload();


                            }else{

                                elementmodal.classList.remove('loaderDisplayblock');
                                elementmodal.classList.add('loaderDisplayNone');	
                                alert(data.feedback);
                          

                            }
                    }


                });	

  
    
  
}
 


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



$(document).ready(function(){

var elementmodal = document.getElementById('modal_loader');




$('#user_register_form').parsley();

$('#user_register_form').on('submit', function(event){
  event.preventDefault();



  $('#phone_no').attr('required', 'required');

  $('#gender').attr('required', 'required');

  $('#department').attr('required', 'required');

   


  if($('#user_register_form').parsley().validate())
  {
    $.ajax({
      url:'pageajax.php',
      method:"POST",
      data:new FormData(this),
      dataType:"json",
      contentType:false,
      cache:false,
      processData:false,
  
  
      beforeSend:function()
      {
        
      elementmodal.classList.remove('loaderDisplayNone');
      elementmodal.classList.add('loaderDisplayblock');
        
      },
      success:function(data)
      {
         
          
          if(data.success == 'success')
            {
             
            elementmodal.classList.remove('loaderDisplayblock');
            elementmodal.classList.add('loaderDisplayNone');	
               alert(data.feedback);
               window.location="index.php";
            
         
            }else{
               
            elementmodal.classList.remove('loaderDisplayblock');
            elementmodal.classList.add('loaderDisplayNone');	
            alert(data.feedback);
            //window.location.reload();

             
            }



      }
  
    })
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
	

	
	
	

<?php

  
header('content-type:	application/json;');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");




include("school_config.php");
$api_object = new Loader();
 
////////////////////////////////////// Database Connection
require("school_con1.php");	
require("../topUrl.php");
//$cashout_refrence_id  = uniqid();
//$reg_start         = date('Y-m-d');
 
//https://adminportal.com.ng/login/myschoolapp_api/school_api.php?action=AppSetup
 
//$questionImgGlobal ="http://127.0.0.1/myschoolapp.com/myschoolapp_api/question_img";
$questionImgGlobal ="https://adminportal.com.ng/login/myschoolapp_api/question_img";

if($_GET["action"] == 'StudentOnList')
{
 
            $encode = file_get_contents('php://input');
            $decode = json_decode($encode, true);
            
            $parentCode  =  $_GET['parent'];
            $school_code =  $_GET['school_code'];
  
            $api_object->query = "SELECT * FROM `4_student_reg` WHERE `school_code` = '$school_code' AND `parent_code` = '$parentCode' " ; 
            $result = $api_object->query_result();
		
		        $i=0;  
				foreach($result as $row)
				{
                    // $data[$i] = $row;
                    // $i++;
			  

                        $api_object->query = "SELECT * FROM `2_teacher_reg` WHERE `teacher_code` = '".$row['teacher_code']."' " ; 
                        $results = $api_object->query_result(); 
                        foreach($results as $rows)
                        {
                        $fullname =  $rows['fullname'];
                        }


                            $data[] = array(  
                            'id'              =>  $row['id'],
                            'admincode'       =>  $row['fadmin_code'],
                            'photo'           =>  $row['photo'],
                            'schl_stu_no'     =>  $row['schl_stu_no'],
                            'online_stu_id'   =>  $row['online_stu_id'],
                            'school_code'     =>  $row['school_code'],
                            'parent_code'     =>  $row['parent_code'],
                            'student_name'    =>  $row['student_name'],
                            'stu_gender'      =>  $row['stu_gender'],
                            'student_class'   =>  $row['student_class'],
                            'class_rep'       =>  $row['class_rep'],
                            'student_teacher' =>  $fullname,
                            'sub_status'      =>  $row['sub_status']
                            );
                    
                    
                    
                    
				}
 		
 
          $data ;

  
}

if($_GET["action"] == 'ParentNewsletter')
{
    
            $encode = file_get_contents('php://input');
            $decode = json_decode($encode, true);
            
            $token         = $_GET['token'];
            $school_code   = $_GET['school_code'];
            $parentCode    = $_GET['parentCode'];
  
            $api_object->query ="SELECT * FROM  `3_parent_reg` WHERE parent_code ='$parentCode' AND token='$token' ";
            $total_row = $api_object->total_row();

            $api_object->query = "SELECT * FROM `school_newsletter` WHERE `school_code` = '$school_code' AND post_review = 'live' " ; 
            $postCount = $api_object->total_row();
            if($total_row  == 1)
            {
                if($postCount  > 0)
                {
                    
                    $result = $api_object->query_result();
                
                        //$i=0;  
                        foreach($result as $row)
                        {

                            $data[] = array(  
                                'school_code'    => $row['school_code'],		
                                'uploader_code'  => $row['uploader_code'],	
                                'uploader_name'  => $row['uploader_name'],		
                                'school_logo'    => $row['school_logo'],		
                                'school_name'    => $row['school_name'],		
                                'school_address' => $row['school_address'],		
                                'header'         => $row['header'],		
                                'img_url'        => $row['img_url'],		
                                'body'           => $row['body'], 
                                'date'           => $row['date'], 
                                );



                            
                        }
                    }
                    else{
                        $data[] = array(
                            'success'  =>  "failed ",
                            'feedback'  =>  'Empty Data'
                            );
        
                    }
                
            }
            else{
                $data[] = array(
					'success'  =>  "Invalid Account ",
					'feedback'  =>  'You are not authorize to view school newsletter'
					);

            }
          $data ;

  
}
if($_GET["action"] == 'SchoolNewsletter')
{
 
            $encode = file_get_contents('php://input');
            $decode = json_decode($encode, true);
            
            $token         =  $_GET['token'];
            $school_code   =  $_GET['school_code'];
            $online_stu_id =  $_GET['student_code'];
  
            $api_object->query ="SELECT * FROM  `4_student_reg` WHERE online_stu_id ='$online_stu_id' AND token='$token' ";
            $total_row = $api_object->total_row();

            $api_object->query = "SELECT * FROM `school_newsletter` WHERE `school_code` = '$school_code' AND post_review = 'live' " ; 
            $postCount = $api_object->total_row();
            if($total_row  == 1)
            {
                if($postCount  > 0)
                {
                    
                    $result = $api_object->query_result();
                
                        $i=0;  
                        foreach($result as $row)
                        {

                            $data[] = array(  
                                'school_code'    => $row['school_code'],		
                                'uploader_code'  => $row['uploader_code'],	
                                'uploader_name'  => $row['uploader_name'],		
                                'school_logo'    => $row['school_logo'],		
                                'school_name'    => $row['school_name'],		
                                'school_address' => $row['school_address'],		
                                'header'         => $row['header'],		
                                'img_url'        => $row['img_url'],		
                                'body'           => $row['body'], 
                                'date'           => $row['date'], 
                                );



                            
                        }
                    }
                    else{
                        $data[] = array(
                            'success'  =>  "failed ",
                            'feedback'  =>  'Empty Data'
                            );
        
                    }
                
            }
            else{
                $data[] = array(
					'success'  =>  "Invalid Account ",
					'feedback'  =>  'You are not authorize to view school newsletter'
					);

            }
          $data ;

  
}

	
if($_GET["action"] == 'StudentLogin')
{
 

 
 
	$encode = file_get_contents('php://input');
	$decode = json_decode($encode, true);
	
	    $stuID    =  trim($decode['stuID']);
	    $password =  trim($decode['password']); 
 
	 
        $api_object->query ="SELECT * FROM `4_student_reg`   WHERE token = '$password' AND online_stu_id = '$stuID' ";  
        $total_row = $api_object->total_row();
        $output    = $api_object->query_result();
        foreach($output as $rows){
        $school_code = $rows['school_code'];
        $tokencode   = $rows['token'];
        }

         		 

        $api_object->query = " SELECT * FROM `4_student_reg` INNER JOIN `1_school_reg` ON `4_student_reg`.`school_code` = `1_school_reg`.`school_code`
         WHERE `4_student_reg`.`online_stu_id` = '$stuID' AND `4_student_reg`.`school_code` ='$school_code' ";
 
			if($total_row > 0)
			{
				$result = $api_object->query_result();

				foreach($result as $row)
				{
                    if($row['school_status'] ==  'active')
                    {
							 
                                if($password == $tokencode)
                                {
                                    
                                        $data = $api_object-> StudentDataFiles($row['online_stu_id']);
                                            
                                }
                                else
                                {
                                            $data[] = array(
                                            'success'  =>  'Invalid password ',
                                            'feedback'  =>  'Invalid portal password passed'
                                            );
                                    
                                }


                    }
                    else
                    {
                         
                            $data[] = array(
                                'success'  =>  'Invalid password ',
                                'feedback'  => "".$row['school_name']." account has been suspended. Please kindly contact school admin "
                                );
                        
                    }


 
				}
			}
			else
			{
					$data[] = array(
					'success'  =>  'Invalid Account ',
					'feedback'  => 	"Invalid student login. Please contact your school IT center"
					);
			}

   		
			
 
 $data ;

  
}
 
if($_GET["action"] == 'fingerPrintLogin')
{
 

 
 
	$encode = file_get_contents('php://input');
	$decode = json_decode($encode, true);
	
	    $stuID    =  trim($_GET['stuID']);
	    $password =  trim($_GET['token']); 
 
	 
        $api_object->query ="SELECT * FROM `4_student_reg`   WHERE token = '$password' AND online_stu_id = '$stuID' ";  
        $total_row = $api_object->total_row();
        $output    = $api_object->query_result();
        foreach($output as $rows){
        $school_code = $rows['school_code'];
        $tokencode   = $rows['token'];
        }

         		 

        $api_object->query = " SELECT * FROM `4_student_reg` INNER JOIN `1_school_reg` ON `4_student_reg`.`school_code` = `1_school_reg`.`school_code`
         WHERE `4_student_reg`.`online_stu_id` = '$stuID' AND `4_student_reg`.`school_code` ='$school_code' ";
 
			if($total_row > 0)
			{
				$result = $api_object->query_result();

				foreach($result as $row)
				{
                    if($row['school_status'] ==  'active')
                    {
							 
                                if($password == $tokencode)
                                {
                                    
                                        $data = $api_object-> StudentDataFiles($row['online_stu_id']);
                                            
                                }
                                else
                                {
                                            $data[] = array(
                                            'success'  =>  'Invalid password ',
                                            'feedback'  =>  'Invalid portal password passed'
                                            );
                                    
                                }


                    }
                    else
                    {
                         
                            $data[] = array(
                                'success'  =>  'Invalid password ',
                                'feedback'  => "".$row['school_name']." account has been suspended. Please kindly contact school admin "
                                );
                        
                    }


 
				}
			}
			else
			{
					$data[] = array(
					'success'  =>  'Invalid Account ',
					'feedback'  => 	"Invalid student login. Please contact your school IT center"
					);
			}

   		
			
 
 $data ;

  
}
 
	
if($_GET["action"] == 'ParentPasswordReset')
{
 
 
 
	$encode = file_get_contents('php://input');
	$decode = json_decode($encode, true);
	
	    $confirmPassword =  trim($decode['confirmPassword']);
	    $password        =  trim($decode['password']); 
	    $parent_code     =  trim($decode['parent_code']); 
	    $school_code     =  trim($decode['school_code']); 
 
	 
        $api_object->query ="SELECT * FROM `3_parent_reg`   WHERE sch_code = '$school_code' AND parent_code = '$parent_code' ";  
        $total_row = $api_object->total_row();
        $output    = $api_object->query_result();
        foreach($output as $rows){
        $school_code = $rows['sch_code']; 
        }

         		 
 
            if($total_row  == 1)
            {    
                
                if($confirmPassword === $password)
                {
                        

                            $query_update ="UPDATE `3_parent_reg` SET   
                            `token`  = '$password'		 
                             WHERE sch_code = '$school_code' AND parent_code = '$parent_code' ";
        
        
                            if(mysqli_query($homedb,$query_update))
                            {

                                $data[] = array(
                                'success'  =>  'success',
                                'feedback'  =>  'Password updated successfully. Your account will be auto logout, kindly login with your new created password'
                                );


                            }
                            else
                            {

                                $data[] = array(
                                'success'  =>  'Network Error ',
                                'feedback'  => 'Network Error'
                                );

                            }


              


     
                }
                else
                {
                        $data[] = array(
                        'success'  =>  'Invalid Password',
                        'feedback'  => 	"Invalid password passed"
                        );
                }
			}
			else
			{
					$data[] = array(
					'success'  =>  'Invalid Account ',
					'feedback'  => 	"Invalid data passed"
					);
			}

   		
			
 
 $data ;

  
}
 
if($_GET["action"] == 'StudentPasswordReset')
{
 
 
 
	$encode = file_get_contents('php://input');
	$decode = json_decode($encode, true);
	
	    $confirmPassword =  trim($decode['confirmPassword']);
	    $password        =  trim($decode['password']); 
	    $studentID       =  trim($decode['studentID']); 
	    $school_code     =  trim($decode['school_code']); 
 
	 
        $api_object->query ="SELECT * FROM `4_student_reg`   WHERE school_code = '$school_code' AND online_stu_id = '$studentID' ";  
        $total_row = $api_object->total_row();
        $output    = $api_object->query_result();
        foreach($output as $rows){
        $school_code = $rows['school_code'];
        $tokencode   = $rows['token'];
        }

         		 
 
            if($total_row  == 1)
            {    
                
                if($confirmPassword === $password)
                {
                        

                            $query_update ="UPDATE `4_student_reg` SET   
                            `token`  = '$password'		 
                             WHERE school_code = '$school_code' AND online_stu_id = '$studentID' ";
        
        
                            if(mysqli_query($homedb,$query_update))
                            {

                                $data[] = array(
                                'success'  =>  'success',
                                'feedback'  =>  'Password updated successfully. Your account will be auto logout, kindly login with your new created password'
                                );


                            }
                            else
                            {

                                $data[] = array(
                                'success'  =>  'Network Error ',
                                'feedback'  => 'Network Error'
                                );

                            }


              


     
                }
                else
                {
                        $data[] = array(
                        'success'  =>  'Invalid Password',
                        'feedback'  => 	"Invalid password passed"
                        );
                }
			}
			else
			{
					$data[] = array(
					'success'  =>  'Invalid Account ',
					'feedback'  => 	"Invalid data passed"
					);
			}

   		
			
 
 $data ;

  
}
 

if($_GET["action"] == 'AppSetup')
{
 
 
        $encode = file_get_contents('php://input');
        $decode = json_decode($encode, true);
        
        $parentCode =  $decode['parentCode'];
        $password   =  $decode['password'];
 
	     	
        $api_object->query = "SELECT * FROM `3_parent_reg` WHERE `parent_code` = '$parentCode' AND  token = '$password' " ; 
        $results_total_row = $api_object->total_row();
        $result = $api_object->query_result();

        
        ///CHECK IF PARENT HAS A REGISTER STUDENT
        $api_object->query = "SELECT * FROM `4_student_reg` WHERE `parent_code` ='$parentCode'";
        $parent_student_check = $api_object->total_row();

			if($results_total_row == 1)
			{
				 
                    if($parent_student_check > 0){
                      
                                        foreach($result as $row)
                                        { 
                                                $data = $api_object->LoginDataFiles($row['sch_code'], $parentCode); 
                                        }                     
                    }
                    else
                    {
                        $data[] = array(
                            'success'  =>  "Invalid Account",
                            'feedback'  =>  'Account setup incomplete. You need to enroll at list 1 student to access this parent portal. Thanks'
                            );                
                    }
			}
			else
			{
					$data[] = array(
					'success'  =>  "Invalid Account ",
					'feedback'  =>  'You have entered invalid account'
					);
			}

	 

		
 
 $data ;

  
}

if($_GET["action"] == 'AppSetupAutoReload')
{
 
 
        $encode = file_get_contents('php://input');
        $decode = json_decode($encode, true);
        
        $parentCode =  $decode['parentCode'];
        $schoolCode =  $decode['schoolCode'];
 
        $data = $api_object->LoginDataFiles($schoolCode, $parentCode);

    
 
 $data ;

  
}

if($_GET["action"] == 'registeredSubjects')
{
  
    $online_stu_id =  $_GET['online_stu_id'];
    $school_code   =  $_GET['school_code'];

    $data = $api_object->RegisteredSubjects($online_stu_id,$school_code);
		  

 
 $data ;

  
}

 
///////////////////////// CBT QUESTION   //////////////////
 //SchoolExamQuestion
 
if($_GET["action"] == 'SchoolExamQuestion')
{
    
    $encode = file_get_contents('php://input');
	$decode = json_decode($encode, true);

    
     $student_class   =  $_GET['student_class'];
     $school_code     =  $_GET['school_code'];
     $student_code    =  $_GET['student_code'];
     $cbt_type        =  $_GET['cbt_type'];
     $cbt_subject     =  $_GET['cbt_subject'];
     $access_code     =  '';
     $questionImg     = $questionImgGlobal;

    
                $api_object->query = "SELECT * FROM student_exam_result WHERE student_code = '$student_code' AND $cbt_subject='null'  ";  
                $total_row = $api_object->total_row(); 
                $fullname = $api_object->FetchStudentName($student_code);
                
                if($total_row == 1 )
                {      
                       
                        $api_object->query = "SELECT * FROM `50_question_table` WHERE student_class = '$student_class' AND cbt_subject ='$cbt_subject' AND cbt_status ='exam' AND school_code='$school_code'"; 
                        $result = $api_object->query_result(); 
                        $total_row2 = $api_object->total_row(); 
                        
                        if($total_row2 > 0)
                        { 
                        
                            foreach($result as $row) 
                            {
                                        $id =  $row['id'];
                                        $imgData =  $row['question_image'];
                                        $subject_id =  $row['subject_id'];
                                        
                                        
                                        $api_object->query = "SELECT * FROM exam_access_code WHERE question_id = '$subject_id' "; 
                                        $result_exam_access = $api_object->query_result(); 
                                        foreach($result_exam_access as $accecode) 
                                        {
                                        $access_code = $accecode['access_code'];
                                        
                                        }
                        
                        
                        
                                        if(empty($row['question_image']))
                                        {
                                        
                                        $img = 'null';
                                        
                                        }else{
                                        
                                        $img  = "$questionImg/$imgData";                                          
                                        }
                                        
                                        $api_object->query = "SELECT * FROM 51_question_option WHERE question_id = '$id'" ; 
                                        $result_que = $api_object->query_result(); 
                                        
                                        $i=0;                 
                                        foreach($result_que as $row_2) { 
                                        $optionData[$i] =  $row_2['option_title'];
                                        $i++;
                                        
                                        }
                                        
                                        
                                        
                                        $datas[]= array(
                                        'question_img'  =>  "$img",
                                        'question'      =>  $row['question_title'],
                                        'correctAnswer' =>  md5($row['answer_option']),   
                                        'choices'       =>  $optionData,
                                        );   
                            }                               
                               
                        }
                        else
                        {
                        
                            $datas[]= array(
                                'result'  =>  'null',
                                'question'=>  'No question found' 
                            );                           
                        }
                   
                }
                else
                {
                         
                    $datas[]= array(
                        'result'  =>  'null',
                        'question'=>  "Hi, $fullname you have taken this Exam subject. Contact your teacher for more info. Thanks.", 
                        );
                }
            
  
 $data=array('dataQuestion'=>$datas, 'token' => md5($access_code));
  
}
 
if($_GET["action"] == 'WeeklyAssessment')
{
    //action=WeeklyAssessment&   
    //student_class=jss1&
    //school_code=SCH0001&
    //cbt_subject=sub_2&
    //student_code=STUD0005&
    //cbt_type=MidTermCBT


     $student_class   =  $_GET['student_class'];
     $school_code     =  $_GET['school_code'];
     $student_code    =  $_GET['student_code'];
     $cbt_type        =  $_GET['cbt_type'];
     $cbt_subject     =  $_GET['cbt_subject'];
     $access_code     =  '';
 
     $questionImg     = $questionImgGlobal;
               
               
                $api_object->query = "SELECT * FROM student_weekly_assesment  WHERE student_code = '$student_code' AND $cbt_subject='null' ";   
                $total_row = $api_object->total_row(); 

                $fullname = $api_object->FetchStudentName($student_code);
                
               if( $total_row == 1 )
                {      
                       

                        $api_object->query = "SELECT * FROM `50_question_table` WHERE student_class = '$student_class' AND cbt_subject ='$cbt_subject' AND cbt_status ='assessment' AND school_code='$school_code'"; 
                        $result = $api_object->query_result(); 
                        $total_row2 = $api_object->total_row(); 
                        
                        if($total_row2 > 0)
                        {
                        
                            foreach($result as $row) 
                            {
                                        $id =  $row['id'];
                                        $imgData =  $row['question_image'];
                                        $subject_id =  $row['subject_id'];
                                        
                                        
                                        $api_object->query = "SELECT * FROM exam_access_code WHERE question_id = '$subject_id' "; 
                                        $result_exam_access = $api_object->query_result(); 
                                        foreach($result_exam_access as $accecode) 
                                        {
                                        $access_code = $accecode['access_code']; 
                                        }
                                        
                                        
                        
                                        if(empty($row['question_image']))
                                        {
                                        
                                        $img = 'null';
                                        
                                        }else{
                                        
                                        $img  = "$questionImg/$imgData";                                          
                                        }
                                        
                                        $api_object->query = "SELECT * FROM 51_question_option WHERE question_id = '$id'" ; 
                                        $result_que = $api_object->query_result(); 
                                        
                                        $i=0;                 
                                        foreach($result_que as $row_2) { 
                                        $optionData[$i] =  $row_2['option_title'];
                                        $i++;
                                        
                                        }
                                        
                                        
                                        
                                        $datas[]= array(
                                        'question_img'   =>  "$img",
                                        'question'       =>  $row['question_title'],
                                        'correctAnswer'  =>  md5($row['answer_option']),  
                                        'choices'        =>  $optionData,
                                        ); 
                               }
                        
                        }
                        else
                        {
                        
                            $datas[]= array(
                                'result'  =>  'null',
                                'question'=>  'No question found' 
                            );                         
                        }
                   
                }
                else
                {
                        
                         $datas[]= array(
                        'result'  =>  'null',
                        'question'=>  "$fullname you have taken this weekly assessment subject. Contact your teacher for more info. Thanks.", 
                        );
                }
 
 
 $data=array('dataQuestion'=>$datas, 'token' =>md5($access_code));
}


if($_GET["action"] == 'FetchMidTermTest')
{
    
     $student_class   =  $_GET['student_class'];
     $school_code     =  $_GET['school_code'];
     $student_code    =  $_GET['student_code'];
     $cbt_type        =  $_GET['cbt_type'];
     $cbt_subject     =  $_GET['cbt_subject'];
     $access_code     =  '';
 
     $questionImg     = $questionImgGlobal;
               
               
                $api_object->query = "SELECT * FROM student_test_result WHERE student_code = '$student_code' AND $cbt_subject='null' ";   
                $total_row = $api_object->total_row(); 

                $fullname = $api_object->FetchStudentName($student_code);
                
               if( $total_row == 1 )
                {      
                       

                        $api_object->query = "SELECT * FROM `50_question_table` WHERE student_class = '$student_class' AND cbt_subject ='$cbt_subject' AND cbt_status ='test' AND school_code='$school_code'"; 
                        $result = $api_object->query_result(); 
                        $total_row2 = $api_object->total_row(); 
                        
                        if($total_row2 > 0)
                        {
                        
                            foreach($result as $row) 
                            {
                                        $id =  $row['id'];
                                        $imgData =  $row['question_image'];
                                        $subject_id =  $row['subject_id'];
                                        
                                        
                                        $api_object->query = "SELECT * FROM exam_access_code WHERE question_id = '$subject_id' "; 
                                        $result_exam_access = $api_object->query_result(); 
                                        foreach($result_exam_access as $accecode) 
                                        {
                                        $access_code = $accecode['access_code']; 
                                        }
                                        
                                        
                        
                                        if(empty($row['question_image']))
                                        {
                                        
                                        $img = 'null';
                                        
                                        }else{
                                        
                                        $img  = "$questionImg/$imgData";                                          
                                        }
                                        
                                        $api_object->query = "SELECT * FROM 51_question_option WHERE question_id = '$id'" ; 
                                        $result_que = $api_object->query_result(); 
                                        
                                        $i=0;                 
                                        foreach($result_que as $row_2) { 
                                        $optionData[$i] =  $row_2['option_title'];
                                        $i++;
                                        
                                        }
                                        
                                        
                                        
                                        $datas[]= array(
                                        'question_img'   =>  "$img",
                                        'question'       =>  $row['question_title'],
                                        'correctAnswer'  =>  md5($row['answer_option']),  
                                        'choices'        =>  $optionData,
                                        ); 
                               }
                        
                        }
                        else
                        {
                        
                            $datas[]= array(
                                'result'  =>  'null',
                                'question'=>  'No question found' 
                            );                         
                        }
                   
                }
                else
                {
                        
                         $datas[]= array(
                        'result'  =>  'null',
                        'question'=>  "$fullname you have taken this mid-term test subject. Contact your teacher for more info. Thanks.", 
                        );
                }
 
 
 $data=array('dataQuestion'=>$datas, 'token' =>md5($access_code));
}

if($_GET["action"] == 'FetchGeneralCBTQuestion')
{
   
 
  
    
     $student_class   =  $_GET['student_class'];
     $cbt_subject     =  $_GET['cbt_subject'];
     $questionImg     = $questionImgGlobal;


                $api_object->query = "SELECT * FROM `50_question_table` WHERE student_class = '$student_class' AND cbt_subject ='$cbt_subject' AND cbt_status ='general' "; 
                $resulttotal_row = $api_object->total_row();
                $totNums  = rand(1, $resulttotal_row);
                
                if($totNums > 10){
                $api_object->query = "SELECT * FROM `50_question_table` WHERE student_class = '$student_class' AND cbt_subject ='$cbt_subject' AND cbt_status='general' LIMIT  $totNums,  10"; 
                }
                else
                {
                $api_object->query = "SELECT * FROM `50_question_table` WHERE student_class = '$student_class' AND cbt_subject ='$cbt_subject' AND cbt_status='general' LIMIT 10"; 
                }
                
                $result = $api_object->query_result();
                $total_row = $api_object->total_row();
            if($total_row > 0)
            {
                
            
                foreach($result as $row) 
                {
                        $id =  $row['id'];

                        $imgData =  $row['question_image'];
                        if(empty($row['question_image']))
                        {
                        
                        $img = 'null';
                        
                        }else{
                        
                        $img  = "$questionImg/$imgData";                                          
                        }

                        $api_object->query = "SELECT * FROM 51_question_option WHERE question_id = '$id'" ; 
                        $result_que = $api_object->query_result(); 

                        $i=0;                 
                        foreach($result_que as $row_2) { 
                        $optionData[$i] =  $row_2['option_title'];
                        $i++;

                        }

               
                        $data[]= array(
                            'question_img'      =>  "$img",
                            'question'          =>  $row['question_title'],
                            'correctAnswer'     =>  md5($row['answer_option']),  
                            'correctAnswerRaw'  => $row['answer_option'],  
                            'choices'           =>  $optionData,
                            ); 
                            
                            
                }

            }else{
                
                     $data[]= array(
                    'result'  =>  'No question found for this subject',
                    'question'=>  "null", 
                    );
                        
            }
           
   $data ;


 
  
 
  
}


if($_GET["action"] == 'FetchGeneralCBTNextQuestion')
{
   
 
  
    
     $student_class   =  $_GET['student_class'];
     $cbt_subject     =  $_GET['cbt_subject'];
     $questionImg     = $questionImgGlobal;


               // $api_object->query = "SELECT * FROM `50_question_table` WHERE `school_code` = 'SCH143255' AND student_class = 'digit3' AND  test_status = 'active'" ; 
               
               
                $api_object->query = "SELECT * FROM `50_question_table` WHERE student_class = '$student_class' AND cbt_subject ='$cbt_subject' AND cbt_status ='general' "; 
                $resulttotal_row = $api_object->total_row();
                $totNums  = rand(1, $resulttotal_row);
                
                $api_object->query = "SELECT * FROM `50_question_table` WHERE student_class = '$student_class' AND cbt_subject ='$cbt_subject' AND cbt_status='general' LIMIT  $totNums,  10"; 
                $result = $api_object->query_result();
                $total_row = $api_object->total_row();
            if($total_row > 0)
            {
                
            
                foreach($result as $row) 
                {
                        $id =  $row['id'];

                        $imgData =  $row['question_image'];
                        if(empty($row['question_image']))
                        {
                        
                        $img = 'null';
                        
                        }else{
                        
                        $img  = "$questionImg/$imgData";                                          
                        }

                        $api_object->query = "SELECT * FROM 51_question_option WHERE question_id = '$id'" ; 
                        $result_que = $api_object->query_result(); 

                        $i=0;                 
                        foreach($result_que as $row_2) { 
                        $optionData[$i] =  $row_2['option_title'];
                        $i++;

                        }

               
                        $data[]= array(
                            'question_img'      =>  "$img",
                            'question'          =>  $row['question_title'],
                            'correctAnswer'     =>  md5($row['answer_option']),  
                            'correctAnswerRaw'  => $row['answer_option'],  
                            'choices'           =>  $optionData,
                            ); 
                            
                            
                }

            }else{
                
                     $data[]= array(
                    'result'  =>  'No question found for this subject',
                    'question'=>  "null", 
                    );
                        
            }
           
   $data ;


 
  
 
  
}


/////////////////////////  ALL RESULT UPDATE///

if($_GET["action"] == 'UpdateStudentResult')
{

    
    
 
      $date         = date('Y-m-d');
    
     $student_code  =  $_GET['student_code'];
     $school_code   =  $_GET['school_code'];
     $resultType    =  $_GET['resultType'];
     $sub_caption   =  $_GET['sub_caption'];
     $subject_id    =  $_GET['subject_id'];
     $result_score  =  $_GET['result_score'];
  
  
  
                if($resultType =='Examination')
                {
                
                
                        /// This section check if Exam has been done and previously updated
                        $api_object->query = "SELECT * FROM student_exam_result WHERE student_code = '$student_code' AND $subject_id='null' ";  
                        $total_row = $api_object->total_row();  
                        if($total_row >= 1)
                        {
                            

                                	$query_update ="UPDATE `student_exam_result` SET   
            						`$subject_id`  = '$result_score'		 
            						WHERE `student_exam_result`.`student_code` = '$student_code' "; 
						
						
                                    if(mysqli_query($homedb,$query_update))
                                    {
                                    
                                    
                                    
                                            $data[] = array(
                                            'success'  =>  "success"
                                            );
                                            
                                            
                                            
                                    }
                                    else
                                    {
                                        
                                            $data[] = array(
                                            'success'  =>  "failed"
                                            );                   
                                    }
					
                        }
                        else
                        {
                        
                                    $data[] = array(
                                    'success'  =>  "updated",
                                    'feedback' =>  "Exam score already updated successfully",
                                    );
               
               
                        }
                
                }
                else if($resultType =='MidTermCBT')
                {
                
                
                
                         /// This section check if Exam has been done and previously updated
                        $api_object->query = "SELECT * FROM `student_test_result` WHERE student_code = '$student_code' AND $subject_id='null' ";  
                        $total_row = $api_object->total_row();  
                        if($total_row >= 1)
                        {
                            
                                	$query_update ="UPDATE `student_test_result` SET   
            						`$subject_id`  = '$result_score'		 
            						WHERE `student_test_result`.`student_code` = '$student_code' ";  
						           if(mysqli_query($homedb,$query_update))
                                   {
                                        $data[] = array(
                                            'success'  =>  "success"
                                            );
                                               
                                    }
                                    else
                                    {
                                        
                                            $data[] = array(
                                            'success'  =>  "failed"
                                            );                   
                                    }
                                    

					
                        }
                        else
                        {
                            
                                     $data[] = array(
                                    'success'  =>  "updated",
                                    'feedback' =>  "Mid-Term Test score already updated successfully",
                                    );                           

                
                        }
              
               
                }
                else if($resultType =='Assessment')
                {
                
                
                
                         /// This section check if Exam has been done and previously updated
                        $api_object->query = "SELECT * FROM `student_weekly_assesment` WHERE student_code = '$student_code' AND $subject_id='null' ";  
                        $total_row = $api_object->total_row();  
                        if($total_row >= 1)
                        {
                            
                                	$query_update ="UPDATE `student_weekly_assesment` SET   
            						`$subject_id`  = '$result_score'		 
            						WHERE `student_weekly_assesment`.`student_code` = '$student_code' ";  
						           if(mysqli_query($homedb,$query_update))
                                   {
                                        $data[] = array(
                                            'success'  =>  "success"
                                            );
                                               
                                    }
                                    else
                                    {
                                        
                                            $data[] = array(
                                            'success'  =>  "failed"
                                            );                   
                                    }
                                    

					
                        }
                        else
                        {
                            
                                     $data[] = array(
                                    'success'  =>  "updated",
                                    'feedback' =>  "Mid-Term Test score already updated successfully",
                                    );                           

                
                        }
              
               
                }
						
           
   $data;
  


}
////////////////////////////////////////////////
if($_GET["action"] == 'FetchAssessmentResult')
{
    
    
     
  
    
     $student_code  =  $_GET['student_ID'];
     $school_code  =  $_GET['school_code'];
  
  
  
               // $api_object->query = "SELECT * FROM `student_exam_result` WHERE student_code = '143978' AND school_code ='SCH143091' "; 
                $api_object->query = "SELECT * FROM `student_weekly_assesment` WHERE student_code = '$student_code' AND school_code ='$school_code' AND status='active' "; 
                $result = $api_object->query_result();
                $total_row = $api_object->total_row();
            if($total_row > 0){
                
               // $T=0; 
                foreach($result as $row) {
                        

                      
                           $stuData[] =  $row['sub_1'];
                           $stuData[] =  $row['sub_2'];
                           $stuData[] =  $row['sub_3']; 
                           $stuData[] =  $row['sub_4'];
                           $stuData[] =  $row['sub_5'];
                           $stuData[] =  $row['sub_6'];
                           $stuData[] =  $row['sub_7'];
                           $stuData[] =  $row['sub_8'];
                           $stuData[] =  $row['sub_9']; 
                           $stuData[] =  $row['sub_10'];  
                           $stuData[] =  $row['sub_11'];  
                           $stuData[] =  $row['sub_12'];  
                           $stuData[] =  $row['sub_13'];  
                           $stuData[] =  $row['sub_14'];  
                           $stuData[] =  $row['sub_15'];  
                           $stuData[] =  $row['sub_16'];  
                           $stuData[] =  $row['sub_17'];  
                           $stuData[] =  $row['sub_18'];  
                           $stuData[] =  $row['sub_19'];  
                           $stuData[] =  $row['sub_20'];  
                           $stuData[] =  $row['sub_21'];  
                           $stuData[] =  $row['sub_22'];  
                           $stuData[] =  $row['sub_23'];  
                           $stuData[] =  $row['sub_24'];  
                           $stuData[] =  $row['sub_25'];  
                           $stuData[] =  $row['sub_26'];  
                           $stuData[] =  $row['sub_27'];  
                           $stuData[] =  $row['sub_28'];  
                           $stuData[] =  $row['sub_29'];  
                           $stuData[] =  $row['sub_30'];  
                           $stuData[] =  $row['sub_31'];  
                           $stuData[] =  $row['sub_32'];  
                           $stuData[] =  $row['sub_33'];  
                           $stuData[] =  $row['sub_34'];  
                           $stuData[] =  $row['sub_35']; 
                           $stuData[] =  $row['sub_36'];        
                           $stuData[] =  $row['sub_37'];        
                           $stuData[] =  $row['sub_38'];        
                           $stuData[] =  $row['sub_39'];        
                           $stuData[] =  $row['sub_40'];        
                           $stuData[] =  $row['sub_41'];        
                           $stuData[] =  $row['sub_42'];        
                           $stuData[] =  $row['sub_43'];        
                           $stuData[] =  $row['sub_44'];        
                           $stuData[] =  $row['sub_45'];        
                           $stuData[] =  $row['sub_46'];        
                           $stuData[] =  $row['sub_47'];        
                           $stuData[] =  $row['sub_48'];        
                           $stuData[] =  $row['sub_49'];        
                           $stuData[] =  $row['sub_50'];        
                     // $T++;
 


                        $api_object->query = "SELECT * FROM `41_student_subjects` WHERE student_code = '$student_code' AND school_code ='$school_code' ";
                        $result_que = $api_object->query_result(); 

                                 // $i=0;                 
                                  foreach($result_que as $row_2) { 
                                       $optionData[] =  $row_2['sub_1'];
                                       $optionData[] =  $row_2['sub_2'];
                                       $optionData[] =  $row_2['sub_3']; 
                                       $optionData[] =  $row_2['sub_4'];
                                       $optionData[] =  $row_2['sub_5'];
                                       $optionData[] =  $row_2['sub_6'];
                                       $optionData[] =  $row_2['sub_7'];
                                       $optionData[] =  $row_2['sub_8'];
                                       $optionData[] =  $row_2['sub_9']; 
                                       $optionData[] =  $row_2['sub_10'];  
                                       $optionData[] =  $row_2['sub_11'];  
                                       $optionData[] =  $row_2['sub_12'];  
                                       $optionData[] =  $row_2['sub_13'];  
                                       $optionData[] =  $row_2['sub_14'];  
                                       $optionData[] =  $row_2['sub_15'];  
                                       $optionData[] =  $row_2['sub_16'];  
                                       $optionData[] =  $row_2['sub_17'];  
                                       $optionData[] =  $row_2['sub_18'];  
                                       $optionData[] =  $row_2['sub_19'];  
                                       $optionData[] =  $row_2['sub_20'];  
                                       $optionData[] =  $row_2['sub_21'];  
                                       $optionData[] =  $row_2['sub_22'];  
                                       $optionData[] =  $row_2['sub_23'];  
                                       $optionData[] =  $row_2['sub_24'];  
                                       $optionData[] =  $row_2['sub_25'];  
                                       $optionData[] =  $row_2['sub_26'];  
                                       $optionData[] =  $row_2['sub_27'];  
                                       $optionData[] =  $row_2['sub_28'];  
                                       $optionData[] =  $row_2['sub_29'];  
                                       $optionData[] =  $row_2['sub_30'];  
                                       $optionData[] =  $row_2['sub_31'];  
                                       $optionData[] =  $row_2['sub_32'];  
                                       $optionData[] =  $row_2['sub_33'];  
                                       $optionData[] =  $row_2['sub_34'];  
                                       $optionData[] =  $row_2['sub_35']; 
                                       $optionData[] =  $row_2['sub_36']; 
                                       $optionData[] =  $row_2['sub_37']; 
                                       $optionData[] =  $row_2['sub_38']; 
                                       $optionData[] =  $row_2['sub_39']; 
                                       $optionData[] =  $row_2['sub_40']; 
                                       $optionData[] =  $row_2['sub_41']; 
                                       $optionData[] =  $row_2['sub_42']; 
                                       $optionData[] =  $row_2['sub_43']; 
                                       $optionData[] =  $row_2['sub_44']; 
                                       $optionData[] =  $row_2['sub_45']; 
                                       $optionData[] =  $row_2['sub_46']; 
                                       $optionData[] =  $row_2['sub_47']; 
                                       $optionData[] =  $row_2['sub_48']; 
                                       $optionData[] =  $row_2['sub_49']; 
                                       $optionData[] =  $row_2['sub_50'];
                                  //$i++;

                                  }


                }
                        $data[]= array(   
                        'student_subjects'     =>  $optionData,
                        'student_results'     =>  $stuData,
                        );

            }else{
                
                         $data[]= array(
                        'question'=>  'null', 
                        );
                        
            }
           
   $data ;


 
  
 
  
}


if($_GET["action"] == 'FetchMidTermTestResult')
{
    
    
     
  
    
     $student_code  =  $_GET['student_ID'];
     $school_code  =  $_GET['school_code'];
  
  
  
               // $api_object->query = "SELECT * FROM `student_exam_result` WHERE student_code = '143978' AND school_code ='SCH143091' "; 
                $api_object->query = "SELECT * FROM `student_test_result` WHERE student_code = '$student_code' AND school_code ='$school_code' AND status='active' "; 
                $result = $api_object->query_result();
                $total_row = $api_object->total_row();
            if($total_row > 0){
                
               // $T=0; 
                foreach($result as $row) {
                        

                      
                           $stuData[] =  $row['sub_1'];
                           $stuData[] =  $row['sub_2'];
                           $stuData[] =  $row['sub_3']; 
                           $stuData[] =  $row['sub_4'];
                           $stuData[] =  $row['sub_5'];
                           $stuData[] =  $row['sub_6'];
                           $stuData[] =  $row['sub_7'];
                           $stuData[] =  $row['sub_8'];
                           $stuData[] =  $row['sub_9']; 
                           $stuData[] =  $row['sub_10'];  
                           $stuData[] =  $row['sub_11'];  
                           $stuData[] =  $row['sub_12'];  
                           $stuData[] =  $row['sub_13'];  
                           $stuData[] =  $row['sub_14'];  
                           $stuData[] =  $row['sub_15'];  
                           $stuData[] =  $row['sub_16'];  
                           $stuData[] =  $row['sub_17'];  
                           $stuData[] =  $row['sub_18'];  
                           $stuData[] =  $row['sub_19'];  
                           $stuData[] =  $row['sub_20'];  
                           $stuData[] =  $row['sub_21'];  
                           $stuData[] =  $row['sub_22'];  
                           $stuData[] =  $row['sub_23'];  
                           $stuData[] =  $row['sub_24'];  
                           $stuData[] =  $row['sub_25'];  
                           $stuData[] =  $row['sub_26'];  
                           $stuData[] =  $row['sub_27'];  
                           $stuData[] =  $row['sub_28'];  
                           $stuData[] =  $row['sub_29'];  
                           $stuData[] =  $row['sub_30'];  
                           $stuData[] =  $row['sub_31'];  
                           $stuData[] =  $row['sub_32'];  
                           $stuData[] =  $row['sub_33'];  
                           $stuData[] =  $row['sub_34'];  
                           $stuData[] =  $row['sub_35']; 
                           $stuData[] =  $row['sub_36'];        
                           $stuData[] =  $row['sub_37'];        
                           $stuData[] =  $row['sub_38'];        
                           $stuData[] =  $row['sub_39'];        
                           $stuData[] =  $row['sub_40'];        
                           $stuData[] =  $row['sub_41'];        
                           $stuData[] =  $row['sub_42'];        
                           $stuData[] =  $row['sub_43'];        
                           $stuData[] =  $row['sub_44'];        
                           $stuData[] =  $row['sub_45'];        
                           $stuData[] =  $row['sub_46'];        
                           $stuData[] =  $row['sub_47'];        
                           $stuData[] =  $row['sub_48'];        
                           $stuData[] =  $row['sub_49'];        
                           $stuData[] =  $row['sub_50'];        
                     // $T++;
 


                        $api_object->query = "SELECT * FROM `41_student_subjects` WHERE student_code = '$student_code' AND school_code ='$school_code' ";
                        $result_que = $api_object->query_result(); 

                                 // $i=0;                 
                                  foreach($result_que as $row_2) { 
                                       $optionData[] =  $row_2['sub_1'];
                                       $optionData[] =  $row_2['sub_2'];
                                       $optionData[] =  $row_2['sub_3']; 
                                       $optionData[] =  $row_2['sub_4'];
                                       $optionData[] =  $row_2['sub_5'];
                                       $optionData[] =  $row_2['sub_6'];
                                       $optionData[] =  $row_2['sub_7'];
                                       $optionData[] =  $row_2['sub_8'];
                                       $optionData[] =  $row_2['sub_9']; 
                                       $optionData[] =  $row_2['sub_10'];  
                                       $optionData[] =  $row_2['sub_11'];  
                                       $optionData[] =  $row_2['sub_12'];  
                                       $optionData[] =  $row_2['sub_13'];  
                                       $optionData[] =  $row_2['sub_14'];  
                                       $optionData[] =  $row_2['sub_15'];  
                                       $optionData[] =  $row_2['sub_16'];  
                                       $optionData[] =  $row_2['sub_17'];  
                                       $optionData[] =  $row_2['sub_18'];  
                                       $optionData[] =  $row_2['sub_19'];  
                                       $optionData[] =  $row_2['sub_20'];  
                                       $optionData[] =  $row_2['sub_21'];  
                                       $optionData[] =  $row_2['sub_22'];  
                                       $optionData[] =  $row_2['sub_23'];  
                                       $optionData[] =  $row_2['sub_24'];  
                                       $optionData[] =  $row_2['sub_25'];  
                                       $optionData[] =  $row_2['sub_26'];  
                                       $optionData[] =  $row_2['sub_27'];  
                                       $optionData[] =  $row_2['sub_28'];  
                                       $optionData[] =  $row_2['sub_29'];  
                                       $optionData[] =  $row_2['sub_30'];  
                                       $optionData[] =  $row_2['sub_31'];  
                                       $optionData[] =  $row_2['sub_32'];  
                                       $optionData[] =  $row_2['sub_33'];  
                                       $optionData[] =  $row_2['sub_34'];  
                                       $optionData[] =  $row_2['sub_35']; 
                                       $optionData[] =  $row_2['sub_36']; 
                                       $optionData[] =  $row_2['sub_37']; 
                                       $optionData[] =  $row_2['sub_38']; 
                                       $optionData[] =  $row_2['sub_39']; 
                                       $optionData[] =  $row_2['sub_40']; 
                                       $optionData[] =  $row_2['sub_41']; 
                                       $optionData[] =  $row_2['sub_42']; 
                                       $optionData[] =  $row_2['sub_43']; 
                                       $optionData[] =  $row_2['sub_44']; 
                                       $optionData[] =  $row_2['sub_45']; 
                                       $optionData[] =  $row_2['sub_46']; 
                                       $optionData[] =  $row_2['sub_47']; 
                                       $optionData[] =  $row_2['sub_48']; 
                                       $optionData[] =  $row_2['sub_49']; 
                                       $optionData[] =  $row_2['sub_50'];
                                  //$i++;

                                  }


                }
                        $data[]= array(   
                        'student_subjects'     =>  $optionData,
                        'student_results'     =>  $stuData,
                        );

            }else{
                
                         $data[]= array(
                        'question'=>  'null', 
                        );
                        
            }
           
   $data ;


 
  
 
  
}

 
if($_GET["action"] == 'FetchExamResult')
{
    
   
  
    
     $student_code  =  $_GET['student_ID'];
     $school_code  =  $_GET['school_code'];
  
  
  
               // $api_object->query = "SELECT * FROM `student_exam_result` WHERE student_code = '143978' AND school_code ='SCH143091' "; 
                $api_object->query = "SELECT * FROM `student_exam_result` WHERE student_code = '$student_code' AND school_code ='$school_code' AND status='active' "; 
                $result = $api_object->query_result();
                $total_row = $api_object->total_row();
            if($total_row > 0){
                
               // $T=0; 
                foreach($result as $row) {
                        

                      
                           $stuData[] =  $row['sub_1'];
                           $stuData[] =  $row['sub_2'];
                           $stuData[] =  $row['sub_3']; 
                           $stuData[] =  $row['sub_4'];
                           $stuData[] =  $row['sub_5'];
                           $stuData[] =  $row['sub_6'];
                           $stuData[] =  $row['sub_7'];
                           $stuData[] =  $row['sub_8'];
                           $stuData[] =  $row['sub_9']; 
                           $stuData[] =  $row['sub_10'];  
                           $stuData[] =  $row['sub_11'];  
                           $stuData[] =  $row['sub_12'];  
                           $stuData[] =  $row['sub_13'];  
                           $stuData[] =  $row['sub_14'];  
                           $stuData[] =  $row['sub_15'];  
                           $stuData[] =  $row['sub_16'];  
                           $stuData[] =  $row['sub_17'];  
                           $stuData[] =  $row['sub_18'];  
                           $stuData[] =  $row['sub_19'];  
                           $stuData[] =  $row['sub_20'];  
                           $stuData[] =  $row['sub_21'];  
                           $stuData[] =  $row['sub_22'];  
                           $stuData[] =  $row['sub_23'];  
                           $stuData[] =  $row['sub_24'];  
                           $stuData[] =  $row['sub_25'];  
                           $stuData[] =  $row['sub_26'];  
                           $stuData[] =  $row['sub_27'];  
                           $stuData[] =  $row['sub_28'];  
                           $stuData[] =  $row['sub_29'];  
                           $stuData[] =  $row['sub_30'];  
                           $stuData[] =  $row['sub_31'];  
                           $stuData[] =  $row['sub_32'];  
                           $stuData[] =  $row['sub_33'];  
                           $stuData[] =  $row['sub_34'];  
                           $stuData[] =  $row['sub_35'];        
                           $stuData[] =  $row['sub_36'];        
                           $stuData[] =  $row['sub_37'];        
                           $stuData[] =  $row['sub_38'];        
                           $stuData[] =  $row['sub_39'];        
                           $stuData[] =  $row['sub_40'];        
                           $stuData[] =  $row['sub_41'];        
                           $stuData[] =  $row['sub_42'];        
                           $stuData[] =  $row['sub_43'];        
                           $stuData[] =  $row['sub_44'];        
                           $stuData[] =  $row['sub_45'];        
                           $stuData[] =  $row['sub_46'];        
                           $stuData[] =  $row['sub_47'];        
                           $stuData[] =  $row['sub_48'];        
                           $stuData[] =  $row['sub_49'];        
                           $stuData[] =  $row['sub_50'];        
                     // $T++;
 


                        $api_object->query = "SELECT * FROM `41_student_subjects` WHERE student_code = '$student_code' AND school_code ='$school_code' ";
                        $result_que = $api_object->query_result(); 

                                 // $i=0;                 
                                  foreach($result_que as $row_2) { 
                                                          $optionData[] =  $row_2['sub_1'];
                           $optionData[] =  $row_2['sub_2'];
                           $optionData[] =  $row_2['sub_3']; 
                           $optionData[] =  $row_2['sub_4'];
                           $optionData[] =  $row_2['sub_5'];
                           $optionData[] =  $row_2['sub_6'];
                           $optionData[] =  $row_2['sub_7'];
                           $optionData[] =  $row_2['sub_8'];
                           $optionData[] =  $row_2['sub_9']; 
                           $optionData[] =  $row_2['sub_10'];  
                           $optionData[] =  $row_2['sub_11'];  
                           $optionData[] =  $row_2['sub_12'];  
                           $optionData[] =  $row_2['sub_13'];  
                           $optionData[] =  $row_2['sub_14'];  
                           $optionData[] =  $row_2['sub_15'];  
                           $optionData[] =  $row_2['sub_16'];  
                           $optionData[] =  $row_2['sub_17'];  
                           $optionData[] =  $row_2['sub_18'];  
                           $optionData[] =  $row_2['sub_19'];  
                           $optionData[] =  $row_2['sub_20'];  
                           $optionData[] =  $row_2['sub_21'];  
                           $optionData[] =  $row_2['sub_22'];  
                           $optionData[] =  $row_2['sub_23'];  
                           $optionData[] =  $row_2['sub_24'];  
                           $optionData[] =  $row_2['sub_25'];  
                           $optionData[] =  $row_2['sub_26'];  
                           $optionData[] =  $row_2['sub_27'];  
                           $optionData[] =  $row_2['sub_28'];  
                           $optionData[] =  $row_2['sub_29'];  
                           $optionData[] =  $row_2['sub_30'];  
                           $optionData[] =  $row_2['sub_31'];  
                           $optionData[] =  $row_2['sub_32'];  
                           $optionData[] =  $row_2['sub_33'];  
                           $optionData[] =  $row_2['sub_34'];  
                           $optionData[] =  $row_2['sub_35']; 
                           $optionData[] =  $row_2['sub_36']; 
                           $optionData[] =  $row_2['sub_37']; 
                           $optionData[] =  $row_2['sub_38']; 
                           $optionData[] =  $row_2['sub_39']; 
                           $optionData[] =  $row_2['sub_40']; 
                           $optionData[] =  $row_2['sub_41']; 
                           $optionData[] =  $row_2['sub_42']; 
                           $optionData[] =  $row_2['sub_43']; 
                           $optionData[] =  $row_2['sub_44']; 
                           $optionData[] =  $row_2['sub_45']; 
                           $optionData[] =  $row_2['sub_46']; 
                           $optionData[] =  $row_2['sub_47']; 
                           $optionData[] =  $row_2['sub_48']; 
                           $optionData[] =  $row_2['sub_49']; 
                           $optionData[] =  $row_2['sub_50']; 
                                  //$i++;

                                  }


                }
                        $data[]= array(   
                        'student_subjects'     =>  $optionData,
                        'student_results'     =>  $stuData,
                        );

            }else{
                
                         $data[]= array(
                        'question'=>  'null', 
                        );
                        
            }
           
   $data ;


 
  
 
  
}


 
 
 echo json_encode($data);
 
 
?>
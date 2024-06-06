<?php

  
header('content-type:	application/json;');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");




include("config.php");
$api_object = new Loader();
 
////////////////////////////////////// Database Connection
require"connect2.php";	


//https://rsbdigitalshares.com.ng/serverfiles/core_files/school_api.php?action=AppSetup

 
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
			  
			  
			  
			         $data[] = array(  
                    'id'              =>  $row['id'],
                    'admincode'       =>  $row['admincode'],
                    'photo'           =>  $row['photo'],
                    'schl_stu_no'     =>  $row['schl_stu_no'],
                    'online_stu_id'   =>  $row['online_stu_id'],
                    'school_code'     =>  $row['school_code'],
                    'parent_code'     =>  $row['parent_code'],
                    'student_name'    =>  $row['student_name'],
                    'stu_gender'      =>  $row['stu_gender'],
                    'student_class'   =>  $row['student_class'],
                    'class_rep'       =>  $row['class_rep'],
                    'student_teacher' =>  $row['student_teacher'],
                    'sub_status'      =>  $row['sub_status']
                    );
                    
                    
                    
				}
 		
 
          $data ;

  
}



if($_GET["action"] == 'AppSetup')
{
 
 
        $encode = file_get_contents('php://input');
        $decode = json_decode($encode, true);
        
        $schoolCode =  $decode['schoolCode'];
        $parentCode =  $decode['parentCode'];
 
	     	
            $api_object->query = "SELECT * FROM 3_parent_reg  WHERE parent_code = '$parentCode' AND sch_code='$schoolCode' "; 
            $total_row = $api_object->total_row();
			 

			if($total_row == 1)
			{
				$result = $api_object->query_result();

				foreach($result as $row)
				{
				         $data = $api_object->LoginDataFiles($schoolCode, $parentCode);
			  
				}
			}
			else
			{
					$data[] = array(
					'success'  =>  "Invalid Account $total_row ",
					'feedback'  =>  'You have entered invalid account'
					);
			}

	 

		
 
 $data ;

  
}

if($_GET["action"] == 'registeredSubjects')
{
  
    $online_stu_id =  $_GET['online_stu_id'];
    $school_code   =  $_GET['school_code'];

    $data = $api_object->RegisteredSubjects($online_stu_id,$school_code);
		  

 
 $data ;

  
}


if($_GET["action"] == 'fetchMidTermExam')
{
  //https://rsbdigitalshares.com.ng/serverfiles/core_files/school_api.php?action=AppSetup
    // $online_stu_id =  $_GET['online_stu_id'];
    // $school_code   =  $_GET['school_code'];
 


                $api_object->query = "SELECT * FROM `50_question_table` WHERE `school_code` = 'SCH143255' AND student_class = 'digit3' AND  test_status = 'active'" ; 
                $result = $api_object->query_result();

                foreach($result as $row) {
                        $id =  $row['id'];




                        $api_object->query = "SELECT * FROM 51_question_option WHERE question_id = '$id'" ; 
                        $result_que = $api_object->query_result(); 


                                  $i=0;                 
                                  foreach($result_que as $row_2) { 
                                  $optionData[$i] =  $row_2['option_title'];
                                  $i++;

                                  }

                        $data['questions'][]= array(
                        'question'=>  $row['question_title'],
                        'correctAnswer' =>  $row['answer_option'],  
                        'choices'     =>  $optionData,
                        );

                }

   
           
   $data ;


 
  
 
  
}

 

 echo json_encode($data, true);
 
 

 
			
			
?>
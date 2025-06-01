<?php
 
/*
 // cron job
// This Cron job Run on at the end of each term (1ST DEC, 1ST APR, 1ST AUG)
https://adminportal.com.ng/login/myschoolapp_api/cron_dec_apr_aug.php
http://127.0.0.1/myschoolapp.com/myschoolapp_api/cron_dec_apr_aug.php
*/

  	 	 

require("school_config.php");	

 

class CronCardBroadCastMaintenance Extends Loader{
  
    public function BonusWalletSwitch()
    {  
 
 
            $this->query = " UPDATE `1_school_reg` SET 
            `school_payment`='unpaid'
             ";
            $this->execute_query();	
            
      
    
    }    
    
    public function UpdateStdentLogindata()
    {  
 
 
            $this->query = " UPDATE `4_student_reg` SET 
            `school_fee`='unpaid',
            `sub_status`='inactive',
            `sub_trans_id`='inactive',
            `test_status`='passive',
            `exam_status`='passive'
            ";
            $this->execute_query();	
            

    }
    public function ResetAllStudentSubject()
    {  
 
 
            $this->query = " UPDATE `41_student_subjects` SET 
            `sub_1`='',
            `sub_2`='',
            `sub_3`='',
            `sub_4`='',
            `sub_5`='',
            `sub_6`='',
            `sub_7`='',
            `sub_8`='',
            `sub_9`='',
            `sub_10`='',
            `sub_11`='',
            `sub_12`='',
            `sub_13`='',
            `sub_14`='',
            `sub_15`='',
            `sub_16`='',
            `sub_17`='',
            `sub_18`='',
            `sub_19`='',
            `sub_20`='',
            `sub_21`='',
            `sub_22`='',
            `sub_23`='',
            `sub_24`='',
            `sub_25`='',
            `sub_26`='',
            `sub_27`='',
            `sub_28`='',
            `sub_29`='',
            `sub_30`='',
            `sub_31`='',
            `sub_32`='',
            `sub_33`='',
            `sub_34`='',
            `sub_35`='',
            `sub_36`='',
            `sub_37`='',
            `sub_38`='',
            `sub_39`='',
            `sub_40`='',
            `sub_41`='',
            `sub_42`='',
            `sub_43`='',
            `sub_44`='',
            `sub_45`='',
            `sub_46`='',
            `sub_47`='',
            `sub_48`='',
            `sub_49`='',
            `sub_50`=''
            ";
            $this->execute_query();	
            

    }

    public function StudentTestResult()
    {  
 
 
            $this->query = " UPDATE `student_test_result` SET  
            `status`='passive'
            ";
            $this->execute_query();	
            
      
    
    }
    public function StudentExamResult()
    {  
 
 
            $this->query = " UPDATE `student_exam_result` SET  
            `status`='passive'
            ";
            $this->execute_query();	
            
      
    
    }
    public function StudentWeeklyAssesment()
    {  
 
 
            $this->query = " UPDATE `student_weekly_assesment` SET  
            `status`='passive'
            ";
            $this->execute_query();	
            
      
    
    }
   

    
}








$Printcron = new  CronCardBroadCastMaintenance;

$Printcron->BonusWalletSwitch();         
$Printcron->ResetAllStudentSubject();         
$Printcron->UpdateStdentLogindata();
$Printcron->StudentTestResult();
$Printcron->StudentExamResult();
$Printcron->StudentWeeklyAssesment();




?>
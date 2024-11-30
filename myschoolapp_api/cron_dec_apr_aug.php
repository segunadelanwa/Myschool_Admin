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
            `school_payment`='unpaid',
            `school_payment_id`=''  ";
            $this->execute_query();	
            
      
    
    }
    
}








$Printcron = new  CronCardBroadCastMaintenance;

$Printcron->BonusWalletSwitch();         




?>
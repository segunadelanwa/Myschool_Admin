<?php
				include("index_header.php");
				?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("../header.php");
		require("../topUrl.php");


		include("../e_result_server.php");
		$ResultServer = new ResultServer();


		$year = date("Y");
		$month = date("M");
				if(isset($_GET["student_id"])){
		$student_id ='';
                   $studID = $_GET["student_id"];
				   
					if(!empty($studID))
					{
						$student_id = $_GET["student_id"];
					}else{
						$student_id = "";
					}
				
				}

		?>
			<title style="text-transform:uppercase;"> <?php echo $school_name; ?>  Student ID card </title>	
    </head>
	
 

	<script>
function GoBackHandler(){
 history.go(-1)
}	


 </script>
	
<style>
.loaderDisplayNone {
display:none;
}

</style>


  <body class="sb-nav-fixed">

 	
  <div id="dashboard_head">
		<?php
		require("dashboard_head.php");
		?>
    </div> 
	
	
	
       
  <div id="layoutSidenav">
		
  <div id="layoutSidenav_nav">

<?php
require("sidebar.php");
?>

</div> 
		<div id="layoutSidenav_content">
		    <div class="container mt-4">
				
					 
					 <div class="row mb-4" id="formBox">
						 <div   class="btn btn-primary mr-5" onclick="GoBackHandler()" >Back</div> 
						 <div   class="btn btn-success" onclick="PrintDiv();">Click here to download result</div>
					  </div>
			   
				  

						        <div class="col-md-8">  
				  
							 
							
									



											<div id="otpupdatebox" >
													<?php
														if(isset($_GET["student_id"]))
														{
															
															//REGISTERED SUBJECTS
															
																$online_stu_id = trim($_GET["student_id"]) ;
															if($id_card_type == '0'){
																

																	echo $failed ='
																	<div class=" col-md-12">
																		<div class="alert alert-danger alert-dismissible fade show" role="alert">
																			<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />

																			No ID CARD template selected yet. Please click here botton <br/><br/>

																			<a href="select_id_template.php">
																			<button type="button" class="btn btn-success"  >
																			Select ID Card
																			</button></a>
																			
																			<br/><br/>
																		</div>  
																	</div>';


															}else if($id_card_type == '1'){
																echo $ResultServer->EserverStudentIDCard_1($online_stu_id);

															}else  if($id_card_type == '2'){
																echo $ResultServer->EserverStudentIDCard_2($online_stu_id);
															
															}else  if($id_card_type == '3'){
																echo $ResultServer->EserverStudentIDCard_3($online_stu_id);
															
															}else  if($id_card_type == '4'){
																echo $ResultServer->EserverStudentIDCard_4($online_stu_id);

															}else  if($id_card_type == '5'){
																echo $ResultServer->EserverStudentIDCard_5($online_stu_id);

															}else  if($id_card_type == '6'){
																echo $ResultServer->EserverStudentIDCard_6($online_stu_id);
															}else  if($id_card_type == '7'){
																echo $ResultServer->EserverStudentIDCard_7($online_stu_id);
															}

															
																			
 
														}
														else
														{
															
															
															echo $failed ='
																		<div class="col-xl- col-md-6">
															<div class="alert alert-white alert-dismissible fade show" role="alert">
															<strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />
																			
																			Invalid Online Student ID  inserted. Please check table below to get  Online Student ID
																			
															<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
															</div>  
															</div>';
																
															
															
															
														}
														
																	
														
													 

													?>
											</div>




								</div>
										
								 
	        </div>
 
       	

    
    
     
		       <footer  >
                   <?php  
				   require("../footer2.php"); 
				   ?>
                </footer>
             </div>
			
        </div>
    </body>
</html>


<script>
     
	 function PrintDiv() {  
	var formBox           = document.getElementById('formBox'); 
	var layoutSidenav_nav = document.getElementById('layoutSidenav_nav'); 
	var dashboard_head    = document.getElementById('dashboard_head'); 

	formBox.classList.add('loaderDisplayNone');
	layoutSidenav_nav.classList.add('loaderDisplayNone');
	dashboard_head.classList.add('loaderDisplayNone');

	window.print();
	// console.log(formBox)
 }


 </script>


 

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



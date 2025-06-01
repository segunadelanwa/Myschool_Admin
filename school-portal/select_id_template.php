 
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
        require("../topUrl.php");
        include("index_header.php");
		require("../header.php");
		require("../header.php");
		 
 
		include("../e_result_server.php");
		$ResultServer = new ResultServer();
		
            
   
            $Loader->query ="SELECT * FROM `4_student_reg` WHERE school_code = '$school_code' GROUP BY school_code ";
            $result = $Loader->query_result();
            $result_total_row = $Loader->total_row();
      
                foreach($result as $row)
                { 	 	
                $student_id     = $row['online_stu_id']; 	 	  
                }
        
      



?> 	
<title>School ID Card Template Selection </title>
    </head>
 <script>
 function GoBackHandler(){
 history.go(-1)
 }
 </script>
    <body class="sb-nav-fixed">

 	
	<div id="modal" class="modal-backdrop loaderDisplayNone"  >  
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
				?>
				
		  </div>
           
		   <div id="layoutSidenav_content">
		   
		   



         <main>
                    <div class="container-fluid">
                      
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item" onclick="GoBackHandler()"> Back</li>
                            <li class="breadcrumb-item active"> School ID Card</li>
                        </ol>
                  
					  

                       

						   <div class="col-xl-12"> 
						 

										<div lass="card mb-4">
											 
												<div class="card-body">
													<div class="table-responsive">
                                                          
                                                                <?php
                                                              
                                                                if( $result_total_row >= 1){

                                                                
                                                                        if($id_card_type == '0'){
                                                                            

                                                                            echo $failed ='
                                                                            <div class=" col-md-12">
                                                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                                                    <strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />

                                                                                    No ID card template selected yet. Please click botton to select <br/><br/> 
                                                                                </div>  
                                                                            </div>';


                                                                    }else if($id_card_type == '1'){
                                                                        echo $ResultServer->EserverStudentIDCard_1($student_id);

                                                                    }else  if($id_card_type == '2'){
                                                                        echo $ResultServer->EserverStudentIDCard_2($student_id);

                                                                    }else  if($id_card_type == '3'){
                                                                        echo $ResultServer->EserverStudentIDCard_3($student_id);

                                                                    }else  if($id_card_type == '4'){
                                                                        echo $ResultServer->EserverStudentIDCard_4($student_id);

                                                                    }else  if($id_card_type == '5'){
                                                                        echo $ResultServer->EserverStudentIDCard_5($student_id); 

                                                                    }else  if($id_card_type == '6'){
                                                                        echo $ResultServer->EserverStudentIDCard_6($student_id);

                                                                    }else  if($id_card_type == '7'){
                                                                        echo $ResultServer->EserverStudentIDCard_7($student_id);
                                                                    }


                                                                }
                                                                else{

                                                                }
                                                                ?>
                                                            
                                                            <br/>
                                                            <br/>
                                                            <br/>
													          <p>ID CARD  TEMPLATE <?php echo $id_card_type; ?></P>
															   <form method="POST"   id="user_register_form">

 
                                                                        <div class="form-group">	
                                                                        
                                                                                <label>Select ID Card Template</label>
                                                                                <select id="idCardOption" name="idCardOption" class="form-control col-md-4" > 
                                                                                <option   value="0"  selected="selected"> </option> 
                                                                                <option  value='1'> ID Card Template 1</option>
                                                                                <option  value='2'> ID Card Template 2</option>
                                                                                <option  value='3'> ID Card Template 3</option>
                                                                                <option  value='4'> ID Card Template 4</option>
                                                                                <option  value='5'> ID Card Template 5</option>
                                                                                <option  value='6'> ID Card Template 6</option>
                                                                                <option  value='7'> ID Card Template 7</option>
                                                                            </select>	

                                                                        </div>																
															 				 
																		<input type="hidden" name="page"   value="idCardSelectionUpdate" />
																		<input type="hidden" name="action" value="idCardSelectionUpdate" />

																		<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Update Data">
																	</div>
															   </form>
													 
													</div>
												</div>
														 
					 				
						 </div>
					  
	                    
		  
				 
				  </div>
                </main>
  
				
            </div>
        </div>
    
    
        <script src="../js/scripts.js"></script>
    
   
 
    </body>
</html>


<script>
 
 


 $(document).ready(function(){

  var elementmodal = document.getElementById('modal');


 

   

  $('#user_register_form').on('submit', function(event){
    event.preventDefault();



 


   
			  $.ajax({
				url:'pageajax.php',
				method:"POST",
				data:new FormData(this),
				dataType:"json",
				contentType:false,
				cache:false,
				processData:false, 
		 
				success:function(data)
				{
					 
					  
					     if(data.success == 'success')
						  { 
							 window.location.reload();
							 
						  }else{
							    	
							alert(data.feedback); 
						   
						  }



				}
				
				
			  })
  

  });
	
});




</script>







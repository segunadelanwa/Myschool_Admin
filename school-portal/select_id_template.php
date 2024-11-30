 
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
		
            
  

            $Loader->query ="SELECT * FROM `3_parent_reg` WHERE parent_code = '$data_id'";
            $result = $Loader->query_result();
      
                foreach($result as $row)
                {

                
                $id             = $row['id'];  	 	
                $admin_code     = $row['admin_code']; 		
                $parent_code    = $row['parent_code']; 		
                $sch_code       = $row['sch_code'];   		
                $username       = $row['username'];  		
                $fullname       = $row['guidance_name']; 	 
                $address        = $row['address']; 	   	 
                $email          = $row['email']; 	  
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
                                                                        echo $ResultServer->EserverStudentIDCard_1('STUD0001');

                                                                    }else  if($id_card_type == '2'){
                                                                        echo $ResultServer->EserverStudentIDCard_2('STUD0001');

                                                                    }else  if($id_card_type == '3'){
                                                                        echo $ResultServer->EserverStudentIDCard_3('STUD0001');

                                                                    }else  if($id_card_type == '4'){
                                                                        echo $ResultServer->EserverStudentIDCard_4('STUD0001');

                                                                    }else  if($id_card_type == '5'){
                                                                        echo $ResultServer->EserverStudentIDCard_5('STUD0001'); 

                                                                    }else  if($id_card_type == '6'){
                                                                        echo $ResultServer->EserverStudentIDCard_6('STUD0001');

                                                                    }else  if($id_card_type == '7'){
                                                                        echo $ResultServer->EserverStudentIDCard_7('STUD0001');
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







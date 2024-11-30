
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
        require("../topUrl.php");
        include("index_header.php");
		require("../header.php");
		 
 

		
            
            $data_id     = $_GET['data_id'];
            $name       = $_GET['name'];  
            if(empty($data_id) && empty($name) ){
                
                header("Location: index.php");
            }


             if($name == 'field_admin'){
                $output = 'Field Admin';
				$Loader->query ="SELECT * FROM `0_marketer_reg` WHERE marketer_code = '$data_id'";
				$result = $Loader->query_result();
          
                    foreach($result as $row)
                    {

                    
                    $id             = $row['id'];  	 	
                    $admincode      = $row['admincode']; 		
                    $marketer_code  = $row['marketer_code']; 		
                    $photo          = $row['photo']; 		
                    $password       = $row['password'];  		
                    $username       = $row['username'];  		
                    $fullname       = $row['fullname']; 		
                    $phone          = $row['phone']; 	 
                    $address        = $row['address']; 	   	 
                    $acct_number    = $row['acct_number']; 		
                    $acct_name      = $row['acct_name']; 	
                    $bank_name      = $row['bank_name'];  
                    $password       = $row['password'];  
                    }
                 }




?> 	
<title>Edit Data</title>
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
 

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
				<?php
				require("dashboard_head.php");
				?>
        </nav>
		
        <div id="layoutSidenav">
		
            <div id="layoutSidenav_nav">

				<?php
				require("sidebar.php");
				?>
				
		  </div>
           
		   <div id="layoutSidenav_content">
		   
		   



         <main>
                    <div class="container-fluid">
                        <h3 class="mt-4">
						
						 Editing <?php echo $output; ?>  
						</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item" onclick="GoBackHandler()"> Back</li>
                            <li class="breadcrumb-item active"> <?php echo $output; ?></li>
                        </ol>
                  
					  

                       

						   <div class="col-xl-6"> 
						 

										<div class="card mb-4">
												<div class="card-header">
													<i class="fas fa-user"></i>
												  Fill all fields correctly
												</div>
												<div class="card-body">
													<div class="table-responsive">



														<?php
														
														if($name == 'field_admin'){
															$FielAdminNew = "../$FielAdmin/$photo";
															echo' <form method="POST"   id="user_register_form">
															

																<div class="form-group">
																<label>Field Admin ID </label>
																<input class="form-control py-4" value="'.$marketer_code.'"   type="text" name="fieldAdminCode" id="fieldAdminCode" class="form-control" readonly /> 
																</div>


																<div class="form-group">	
																<label>Username (email address)  </label>
																<input class="form-control py-4"  value="'.$username.'"   type="email" name="user_email_address" id="user_email_address" class="form-control"  readonly />

																</div>


																<div class="form-group">	
																<label>Field Admin Photo  </label>
																<img src="'.$FielAdminNew.'"  style="height:100px"> 
																<input class="form-control py-4"     type="file" name="field_operator_photo" id="field_operator_photo" class="form-control"    />
																<br/>
																</div>

														
																
																<div class="form-group">			
																<label>Fullname  </label>
																<input type="text" name="fullname"  value="'.$fullname.'"  id="fullname" class="form-control py-4"    />
																</div>


																<div class="form-group">			
																<label>Phone  </label>
																<input type="text" name="phone"  value="'.$phone.'"  id="phone" class="form-control py-4"    />
																</div>
																
																
																<div class="form-group">			
																<label>Home Address  </label>
																<input type="text" name="address"  value="'.$address.'"  id="address" class="form-control py-4"    />
																</div>

																<div class="form-group">	
																
																		<label>School Bank Name </label>
																		<select id="bank_name" name="bank_name" class="form-control" > 
																		<option  value="'.$bank_name.'"   selected="selected">'; echo $Loader->FetchBankName($bank_name); echo'</option>';
																			
																			$result = $Loader-> FetchBank();
																			foreach($result as $data)
																			{
																			$bank_name=$data['bank_name'];
																			$bank_code=$data['bank_code'];  
																			echo"<option  value='$bank_code'> $bank_name </option>";
																			}

																  echo' </select>	

																</div>

																<div class="form-group">			
																<label>Account Name  </label>
																<input type="text" name="acct_name"  value="'.$acct_name.'" id="acct_name" class="form-control py-4"   />
																</div>

																<div class="form-group">			
																<label>Account Number  </label>
																<input type="text" name="acct_number" value="'.$acct_number.'"  id="acct_number" class="form-control py-4"   />
																</div>
 



																	
																	
																		<input type="hidden" name="page"   value="updateUserData" />
																		<input type="hidden" name="action" value="field_admin" />

																		<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Update Data">
																	</div>
																</form>';
														}
								 

														?>
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
							//window.location.reload();

						   
						  }



				}
				
				
			  })
  

  });
	
});




</script>







<?php
			include("index_header.php");
			?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("../header.php"); 
		include("../topUrl.php"); 
	 
          
 


 
		?>
		
	<title> 
		UPDATE PASSWORD
	</title>

    </head>
	
    <style>
    .myFont{
      font-size:12px
    
    }
    </style>


	
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
                    <h1 class="mt-4"> 
					          <i class="fas fa-book"></i>Update Password
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item" onclick="GoBackHandler()">Back</li>
                       
                            <li class="breadcrumb-item active">Update Password  </li>
                        </ol>
                  
					 
  
						   <div class="col-md-12"> 
 				 
					 
					 
									 
										 
												
												<div class="card-body">
													
		 <div class="table-responsive">
														

 
		   
		   
	   		    <div id="otpupdatebox" style="background-color:white; padding:50px;margin-top:10px">
                   <div id="printBox">

                   </div>


                   <form id="searchForm" method="POST" Action="">

					


                    <div class="form-group col-md-6"> 
                    <label>New Login password  <l/abel>  
					<input class="form-control"    type="password" name="pwd_1" id="pwd_1" class="form-control"  required/>
					</div>


                    <div class="form-group col-md-6"> 
                    <label>Confirm Login password <l/abel>  
					<input class="form-control"   type="password" name="pwd_2" id="pwd_2" class="form-control"  required/>
					</div>
                    <input type="hidden" name="user" id="user" value="<?php echo$username?>"  />


                    <div class="form-group col-md-6"> 
                    <input  type="submit" id="nameSearch" name="" class="btn btn-success" value="Update Login Password" /> 
                    </div>

                    <form>

              
			   </div>
 
			</div>

			</div>


			</div>

 
		  
				 
 
				  </div>
                </main>
               
			   <footer class="py-4 bg-light mt-auto">
                   <?php 
				  // require("../footer.php"); 
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

    

 $(document).ready(function(){


  var elementmodal = document.getElementById('modal');

        $(document).on('submit', '#searchForm', function(event){
        event.preventDefault();

        const	pwd_1 = document.getElementById("pwd_1").value; 
        const	pwd_2  = document.getElementById("pwd_2").value;  
       
        
            if(pwd_1 === pwd_2)
            {
                    $.ajax({
                        url:"pageajax.php",
                        method:"POST",
                        data:{
                            pwd_1:pwd_1,   
                            pwd_2:pwd_2,    
                            page:'updateAcctPassword',
                            action:'updateAcctPassword'
                        },
                        dataType:"json",
                        // contentType:false,
                        // cache:false,
                        // processData:false, 
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
                                    window.location='logout.php';
                                    
                            
                                }else{
                                    
                                    elementmodal.classList.remove('loaderDisplayblock');
                                    elementmodal.classList.add('loaderDisplayNone');	
                                    alert(data.feedback);
                                    window.location.reload();

                                
                                }
                            
                        }
                    });	
            }
            else
            {
                alert('your password did not match, please try again')
            }
        
        });


});



</script>

 
 



 

 


 
 
 
 
 
 
 
 
 
 
 
 
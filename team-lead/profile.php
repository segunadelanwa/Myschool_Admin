				<?php
				require("index_header.php");
				?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		require("../header.php");
		?>
			<title>Teacher Account Profile</title>
    </head>
    <body class="sb-nav-fixed">
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
						
						<?php echo"$fullname" ; ?>
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                  
					  
					      <center>
                            <div class="col-xl-3">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <i class="fas fa-user"></i>
                                     Profile Photo
                                    </div>
                                    <div class="card-body">
                                    <?php   echo' <img src="../'.$Teamlead  .'/'.$photo.'"  style="height:200px"/> '; ?>
									</div>
									  <?php echo $username; ?>
                                </div>
                            </div>
                            </center> 
                       
                    
					      <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                               Profile Data
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered"   width="50%" cellspacing="0">
                                 
                            
                                        <tbody>
                                          
                                            
                                            <tr style="width:100%;">
                                                <td style="width:20%;">Name</td> 
                                                <td style="width:80%;"><?php echo $fullname; ?></td> 
                                            </tr>

                                            <tr style="width:100%;">
                                                 <td style="width:20%;">Username:</td> 
                                                 <td style="width:80%;"><?php echo $username; ?></td> 
                                            </tr>
											
                                            <tr style="width:100%;">
                                                 <td style="width:20%;">Phone no:</td> 
                                                 <td style="width:80%;"> <?php echo $phone; ?></td> 
                                            </tr>

                                           
											
                                             <tr style="width:100%;">
                                                 <td style="width:20%;">Office Unit:</td> 
                                                 <td style="width:80%;">Field Admin</td> 
                                            </tr>

                                            <tr style="width:100%;">
                                                 <td style="width:20%;">Account Status:</td> 
                                                 <td style="width:80%;">Partnership</td> 
                                            </tr>
											
                                              

                                             <tr style="width:100%;">
                                                 <td style="width:20%;">Account Registrar:</td> 
                                                 <td style="width:80%;"><?php echo $admincode; ?></td> 
                                            </tr>

                                             <tr style="width:100%;">
                                                 <td style="width:20%;">Register Date: </td> 
                                                 <td style="width:80%;"><?php echo $date_reg; ?></td> 
                                            </tr>
                                             <tr style="width:100%;">
                                                 <td style="width:20%;">Bank Name:</td> 
                                                 <td style="width:80%;"><?php echo $Loader->FetchBankName($bank_name); ?></td> 
                                            </tr>
                                             <tr style="width:100%;">
                                                 <td style="width:20%;">Account Name:</td> 
                                                 <td style="width:80%;"><?php echo $acct_name; ?></td> 
                                            </tr>

                                             <tr style="width:100%;">
                                                 <td style="width:20%;">Account Number: </td> 
                                                 <td style="width:80%;"><?php echo $acct_number; ?></td> 
                                            </tr>
                                          
                                            
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
    
    
        <script src="../js/scripts.js"></script>
    
   
 
    </body>
</html>


<script>
 


$(document).ready(function(){

  $('#user_profile_update').parsley();
  $('#user_profile_todo').parsley();
  $('#user_profile_upgrade').parsley();

  $('#user_profile_update').on('submit', function(event){
	        
		  
		  
    event.preventDefault();

    $('#banner_img2').attr('required', 'required'); 

      $.ajax({
        url:"../pageajax.php", 
        method:"POST",
        data:new FormData(this),
        dataType:"json",
        contentType:false,
        cache:false,
        processData:false,
        beforeSend:function()
        {
			
		 // btn.innerHTML = '<div class="loader-bg">  <div class="loader-bar">  </div>  </div>';
          $('#user_login').attr('disabled', 'disabled');
		  $('#user_login').addClass('btn-info');
          $('#user_login').val('Please wait...');
		  
        },
        success:function(data)
        {
          if(data.success)
          {
			  
				location.href='profile.php';
				$('#user_login').attr('disabled', false);

				$('#user_login').val('Profile update Success!!');
          }
          else
          {
			  
				$(btn).html('<div>    </div>');
				$('#message').html('<div class="alert alert-danger">Profile update Failed!! <br>'+data.error+'</div>');

				$('#user_login').attr('disabled', false);

				$('#user_login').val('Sign In');
				$('#user_login').addClass('btn-primary');
		 
		        //alert("Login Failed!!");
		       //window.location.reload();
		 
          }


        }
      })
    

  });
 



 $('#user_profile_todo').on('submit', function(event){
	        
		  
		  
    event.preventDefault();

    $('#phone_no').attr('required', 'required');

    $('#gender').attr('required', 'required');

    $('#department').attr('required', 'required');

      $.ajax({
        url:"../pageajax.php", 
        method:"POST",
        data:new FormData(this),
        dataType:"json",
        contentType:false,
        cache:false,
        processData:false,
        beforeSend:function()
        {
			
		 // btn.innerHTML = '<div class="loader-bg">  <div class="loader-bar">  </div>  </div>';
          $('#user_todo').attr('disabled', 'disabled');
		  $('#user_todo').addClass('btn-info');
          $('#user_todo').val('Please wait...');
		  
        },
        success:function(data)
        {
          if(data.success)
          {
			  
				location.href='profile.php'; 
          }
          else
          {
              alert(data.feedback);
		 
          }


        }
      })
    

  });


 $('#user_profile_upgrade').on('submit', function(event){
	        
		  
		  
    event.preventDefault();

    $('#acct_email').attr('required', 'required');

    $('#upgrade_level').attr('required', 'required');
 

      $.ajax({
        url:"pageajax.php", 
        method:"POST",
        data:new FormData(this),
        dataType:"json",
        contentType:false,
        cache:false,
        processData:false,
        beforeSend:function()
        {
			
		 // btn.innerHTML = '<div class="loader-bg">  <div class="loader-bar">  </div>  </div>';
         // $('#user_upgrade').attr('disabled', 'disabled');
		  $('#user_upgrade').addClass('btn-info');
          $('#user_upgrade').val('Please wait...');
		  
        },
        success:function(data)
        {
          if(data.success == 'success')
          {
			  
				alert(data.feedback);
				window.location="profile.php";
          }
          else
          {
              alert(data.feedback);
				 

				//$('#user_upgrade').attr('enabled', 'enabled');
				$('#user_upgrade').addClass('btn btn-primary');
				$('#user_upgrade').val('Upgrade Account');
		 
          }


        }
      })
    

  });

});


</script>







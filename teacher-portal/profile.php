				<?php
				require("index_header.php");
				?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		require("../header.php");
		require("../title.php");
 
		?>
			 
    </head>
    <body class="sb-nav-fixed">
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
                        <h1 class="mt-4"> <?php echo"$school_name" ; ?>  </h1>

                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                  
					  
					      
                            <div class="col-xl-12">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <i class="fas fa-user"></i>
                                     School Photo
                                    </div>
                                    <div class="card-body">
                                    <?php   echo' <img src="../'.$SchoolIMG.'/'.$school_code.'/'.$school_photo.'"  style="width:100%"/> '; ?>
                                  
									           </div>
									 
                                </div>
                            </div>
                           
                       
                    
                               <div class="card mb-4">
                                        <div class="card-header">
                                          <i class="fas fa-table mr-1"></i>
                                          School Profile Data
                                          </div>
                                        <div class="card-body">
                                        <div class="table-responsive">
                                          <table class="table table-bordered"   width="50%" cellspacing="0">


                                              <tbody>
                                                
                                                  
                                                  <tr style="width:100%;">
                                                      <td style="width:20%;">School Name</td> 
                                                      <td style="width:80%;">
                                                        <h3><?php echo $school_name; ?></h3>
                                                        <h4><?php echo $school_address; ?></h4>
                                                        <h6>Motto:<?php echo $school_motor; ?></h6>
                                                        <h6>Phone : <?php echo $school_phone; ?></h6>
                                                        <h6>School Code : <?php echo $school_code; ?></h6>
                                                        <small>Email: <?php echo $username; ?> | Website: <?php echo $school_website; ?></small>
                                                    </td> 
                                                  </tr>
 

                                                  <tr style="width:100%;">
                                                      <td style="width:20%;">School Owner:</td> 
                                                      <td style="width:80%;">
                                                      <?php   echo' <img src="../'.$SchoolIMG.'/'.$school_code.'/'.$schl_propritor_photo.'"  style="height:120px"/> '; ?><br/>
                                                      <h4><?php echo $schl_propritor_name; ?></h4>
                                                      Message: <small><?php echo $schl_propritor_msg; ?></small>
                                                      </td> 
                                                  </tr>

                                                  <tr style="width:100%;">
                                                      <td style="width:20%;">Head Teader :</td> 
                                                      <td style="width:80%;">
                                                      <?php   echo' <img src="../'.$SchoolIMG.'/'.$school_code.'/'.$schl_head_photo.'"  style="height:120px"/> '; ?><br/>
                                                      <h4><?php echo $schl_head_name; ?></h4>
                                                      Message: <small><?php echo $schl_head_msg; ?></small>
                                                      </td> 
                                                  </tr>



                                                  <tr style="width:100%;">
                                                      <td style="width:20%;">School Exam Score:</td> 
                                                      <td style="width:80%;"><?php echo $exam_score; ?> Marks on each correct question answered</td> 
                                                  </tr>

                                                  <tr style="width:100%;">
                                                      <td style="width:20%;">School Test Score:</td> 
                                                      <td style="width:80%;"><?php echo $test_score; ?> Marks on each correct question answered</td> 
                                                  </tr>



                                                    

                                                  <tr style="width:100%;">
                                                      <td style="width:20%;">Exam Time:</td> 
                                                      <td style="width:80%;"><?php echo $exam_time; ?></td> 
                                                  </tr>
                                                  <tr style="width:100%;">
                                                      <td style="width:20%;">Test Time:</td> 
                                                      <td style="width:80%;"><?php echo $test_time; ?></td> 
                                                  </tr>

                                                  <tr style="width:100%;">
                                                      <td style="width:20%;">Current Term: </td> 
                                                      <td style="width:80%;"><?php echo $current_term; ?></td> 
                                                  </tr>

                                                  <tr style="width:100%;">
                                                      <td style="width:20%;">Current Session: </td> 
                                                      <td style="width:80%;"><?php echo $session; ?></td> 
                                                  </tr>

                                                  <tr style="width:100%;">
                                                      <td style="width:20%;">Registeration Date: </td> 
                                                      <td style="width:80%;"><?php echo $date_reg; ?></td> 
                                                  </tr>
                                                
                                                  
                                              </tbody>
                                          </table>
                                        </div>
                                        </div>
                              </div>
            
 
 
 
                              <div class="card mb-4">
                                        <div class="card-header">
                                        <i class="fas fa-table mr-1"></i>
                                        Teacher Profile Data
                                        </div>

                                        <div class="card-body">
                                        <div class="table-responsive">
                                          <table class="table table-bordered"   width="50%" cellspacing="0">


                                            <tbody>
                                                                                      
                                                  <tr style="width:100%;">
                                                      <td style="width:20%;">Teacher Name</td> 
                                                      <td style="width:80%;">
                                                        <h3><?php echo $fullname; ?></h3> 
                                                      </td> 
                                                  </tr>
                                                  <tr style="width:100%;">
                                                      <td style="width:20%;">Teacher Address</td> 
                                                      <td style="width:80%;">
                                                        <h6><?php echo $address; ?></h6> 
                                                      </td> 
                                                  </tr>
                                                  <tr style="width:100%;">
                                                      <td style="width:20%;">Teacher Gender</td> 
                                                      <td style="width:80%;">
                                                        <h6><?php echo $gender; ?></h6> 
                                                      </td> 
                                                  </tr>
                                                  <tr style="width:100%;">
                                                      <td style="width:20%;">Teacher Phone</td> 
                                                      <td style="width:80%;">
                                                        <h6><?php echo $phone; ?></h6> 
                                                      </td> 
                                                  </tr>
                                                  <tr style="width:100%;">
                                                      <td style="width:20%;">Teacher Code</td> 
                                                      <td style="width:80%;">
                                                        <h6><?php echo $teacher_code; ?></h6> 
                                                      </td> 
                                                  </tr>
                                                  <tr style="width:100%;">
                                                      <td style="width:20%;">Teacher Subject</td> 
                                                      <td style="width:80%;">
                                                        <h6> <?php echo $Loader->FecthSingleSubject($subject) ?></h6> 
                                                      </td> 
                                                  </tr>
                                                  <tr style="width:100%;">
                                                      <td style="width:20%;">Teacher Acct Details</td> 
                                                      <td style="width:80%;">
                                                        <h6><?php echo $Loader->FetchBankName($bank_name); ?></h6>                                
                                                        <h6> <?php echo $account_name ?></h6> 
                                                        <h6> <?php echo $account_number ?></h6> 
                                                      </td> 
                                                  </tr>
                                                  <tr style="width:100%;">
                                                      <td style="width:20%;">Registration Date</td> 
                                                      <td style="width:80%;">
                                                        <h6> <?php echo $reg_date ?></h6>  
                                                      </td> 
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







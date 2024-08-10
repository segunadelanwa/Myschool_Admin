<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		require("../header.php");
		require("title.php");
		?>
		
    </head>
    <body class="bg-primary" style="background-image: url('../gen_img/admin_home_bg.jpg');  background-repeat: no-repeat; background-size: 100vw 100vh;  ">
 
 
 	<div id="modal" class="modal-backdrop loaderDisplayNone"  >  
			<?php
			require("../loader.php");
			?>
		
	</div>
	
	
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">HEPZIHUB NIG LTD<br />
                                    Field Admin Login</h3></div>
                                    <div class="card-body">
									
                                       
									<span id="message"></span>
										   
										   
								<form method="POST"   id="user_login_form">
											<div class="form-group">
													<label> <i class="fa fa-user" style="color:#007bff;font-size:18px;"></i> Username  </label>
													<input type="text" name="user_email_address" placeholder="emaill address"  id="user_email_address" class="form-control" data-parsley-checkemail data-parsley-checkemail-message='Email address does not exist' />
											</div>

											<div class="form-group">
													<label class="col-form-label"><i class="fa fa-lock"style="color:#007bff; font-size:18px;"></i> Password</label>
													<input type="password" class="form-control" placeholder="**********" id="user_password"   name="user_password"  data-parsley-password data-parsley-password-message='Wrong password inserted' />
											</div>
											
											
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="account_recovery/">Forgot Password?</a>
                                               
												
												<input type="hidden" name="page"   value='login' />
												<input type="hidden" name="action" value="login_check" />

												<input type="submit" name="user_login" id="user_login" class="btn btn-primary" value="Sign In">
                                            </div>
                                        </form>
										
										
										
										
                                    </div>
                                    <div class="card-footer text-center">
									

						
						
                                        <div class="small">
										<a href="register.php">Need an account? Sign up!</a>
										</div>
										

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
					<?php
					require('../footer.php');
					?>
            </div>
        </div>
 
    </body>
</html>


<script>
 

 
 
 
$(document).ready(function(){
  var elementmodal = document.getElementById('modal');


  const btn = document.querySelector('#loading');

  $('#user_login_form').parsley();

  $('#user_login_form').on('submit', function(event){
	  
    event.preventDefault();
    var  user_email_address = document.querySelector('#user_email_address').value; 
    var  user_password      = document.querySelector('#user_password').value; 

    var  passhash     = CryptoJS.MD5(user_password+user_email_address).toString(); 



   

    $('#user_email_address').attr('required', 'required');

    $('#user_email_address').attr('data-parsley-type', 'email');

    $('#user_password').attr('required', 'required');

    if($('#user_login_form').parsley().validate())
    {
      $.ajax({
        url:"pageajax.php",
        method:"POST",
        //data:$(this).serialize(),
        dataType:"json",
        data:{
			page:'login', 
			action:'login_check', 
            user_email_address	: user_email_address,
            user_password:passhash  
        },
        beforeSend:function()
        {
			
		
		elementmodal.classList.remove('loaderDisplayNone');
		elementmodal.classList.add('loaderDisplayblock');		
         // $('#user_login').attr('disabled', 'disabled');
		  //$('#user_login').addClass('btn-info');
         // $('#user_login').val('Please wait...');
		  
        },
        success:function(data)
        {
          if(data.success)
          {
				location.href='index.php';
				$('#user_login').attr('disabled', false);

				$('#user_login').val('Login Success!!');
          }
          else
          {
				elementmodal.classList.remove('loaderDisplayblock');
				elementmodal.classList.add('loaderDisplayNone');	
				
				$(btn).html('<div>    </div>');
				$('#message').html('<div class="alert alert-danger">Login Failed!! <br>'+data.error+'</div>');

				$('#user_login').attr('disabled', false);

				$('#user_login').val('Sign In');
				$('#user_login').addClass('btn-primary');
		 
		        //alert("Login Failed!!");
		       //window.location.reload();
		 
          }


        }
      })
    }

  });

});


</script>





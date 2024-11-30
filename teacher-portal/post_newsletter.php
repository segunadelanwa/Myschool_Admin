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
	POST SCHOOL NEWSLETTER
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
    <div id="outer">


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
                <div class="container-fluid">
                        <h3 class="mt-4">
						
						Post Newsletter  
						</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item" onclick="GoBackHandler()"> Back</li>
                            <li class="breadcrumb-item active"> School Newsletter</li>
                        </ol>
                  


                    <main id="content-box" class="order-first">
         
                    
                        <section class="work-section section" id="section-2">
                            <div class="container">

                                <div class="title">
                                <span id="message"></span>
                                <center> <h2>Upload Newsletter</h2></center>
                                </div>
                                
                                <div class="row">
                                    <form method="POST"   id="equipmentRegistration">
                                        <div class="form-group" id="CorrectiveEquip" >
                                                          
                                            <div class="form-group">
                                                <label>Newsletter Title  </label> 
                                                <input type="text" class="form-control"  name="news_title" id="news_title" class="form-control"  required />
                                            </div>
                                                     
                                            <div class="form-group">	
                                                <label> Image/Photo  link or URL(Optional)   </label>
                                                <input type="url" name="news_img" placeholder="Photo"  id="news_img" class="form-control"   />
                                            </div>
 
                                            <div class="form-group col-md-12">	
                                                <label>Newsletter Body Text </label> 
                                                <textarea rows='50' cols='150' class="form-control"  name="post_text_area" id="post_text_area" required></textarea>
                                            </div>

                                                  
                                            <input type="hidden" name="page"   value='AddNewsletter' />
                                            <input type="hidden" name="action" value="AddNewsletter" />  
                                            <input type="submit" name="add_equip" id="add_equip" class="btn btn-primary" value="Upload Newsletter">


                                            </div>

                                    </form>
                                
                            </div>
                        </section>

                

                        </div>
                    </main>
                </div>

            </div>
    </div>

  
 
         <?php  
			require("../footer2.php"); 
         ?>	


</body>
</html>

<script>
 


$(document).ready(function(){
 
  $('#equipmentRegistration').parsley();  
  

 

	$('#equipmentRegistration').on('submit', function(event){
				
			
		
		event.preventDefault();

	
		
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
			$('#add_equip').attr('disabled', 'disabled');
			$('#add_equip').addClass('btn-info');
			$('#add_equip').val('Please wait...');
			
			},
			success:function(data)
			{

                    if(data.success == 'success')
                    {
                         alert(data.feedback+'Your post will be under review untill head admin approve post to  go live.Thank you.');
                         location.href='post_review.php';
                        // $('#message').html('<div class="alert alert-success">'+data.feedback+'<br>Your post will be under review untill head admin approve to this post to  go live.<br/>Thank you.</div>');
                        // $('#add_equip').val('Success!!');
                        // $('#add_equip').attr('disabled', 'disabled');
                    }
                    else
                    {
                        $('#message').html('<div class="alert alert-danger">'+data.feedback+'</div>');
                        $('#add_equip').val('Try Again!!');
                    
                    }


			}
		})
		

	});

 
 
 


 
});


</script>

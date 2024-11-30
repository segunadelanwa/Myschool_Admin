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
	CREATE NEW TICKET
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
						
						New Ticket
						</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item" onclick="GoBackHandler()"> Back</li>
                            <li class="breadcrumb-item active">Create New Ticket</li>
                        </ol>
                  


                    <main id="content-box" class="order-first">
         
                    
                        <section class="work-section section" id="section-2">
                            <div class="container">

                                <div class="title">
                                <span id="message"></span>
                                 <h2>Create New Ticket</h2> 
                                </div>
                                
                                <div class="row" style="background-color:white;padding:10px">
                                    <form method="POST"   id="equipmentRegistration">
                                        <div class="form-group" id="CorrectiveEquip" >

                                        <div class="row">            
                                            <div class="form-group col-md-4">
                                                <label><b>Name </b></label> 
                                                <input type="text" class="form-control"  value="<?php echo $schl_head_name ?>"  name="sender_name" id="sender_name" class="form-control"  readonly />
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label><b>Email  Address</b></label> 
                                                <input type="text" class="form-control"  value="<?php echo $username ?>" name="sender_email" id="sender_email" class="form-control"  readonly />
                                            </div>


                                            <div class="form-group col-md-4">
                                                 <label><b>Ticket ID</b>  </label> 
                                                 <input type="text" class="form-control" value="<?php echo $Loader->GenerateTicket(); ?>" name="ticket_id" id="ticket_id" class="form-control"  readonly />
                                             </div>

                                        </div>
                                                     
 
                                           <div class="form-group col-md-12">
                                                <label><b>Subject</b>  </label> 
                                                <input type="text" class="form-control"  name="ticket_subject" id="ticket_subject" class="form-control"    />
                                            </div>


                                            <div class="form-group col-md-12">	
                                                <label><b>Message</b> <small>(Maximum Character 1500)</small> </label> 
                                                <textarea rows='15' cols='100' class="form-control" maxlength="1500"  name="post_text_area" id="post_text_area" required></textarea>
                                            </div>

                                                  
                                            <input type="hidden" name="school_code" id="school_code"  value='<?php echo$school_code; ?>' />
                                            <input type="hidden" name="page"   value='CreateTicket' />
                                            <input type="hidden" name="action" value="CreateTicket" />  
                                            <input type="submit" name="add_equip" id="add_equip" class="btn btn-primary" value="Submit">


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
                         alert(data.feedback);
                         location.href='ticket_open.php';
                        // $('#message').html('<div class="alert alert-success">'+data.feedback+'<br>Your post will  .<br/>Thank you.</div>');
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

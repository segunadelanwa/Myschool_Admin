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
	Online Payment Setup
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
                    <h1 class="mt-4"> 
					Online Payment Setup
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item" onclick="GoBackHandler()">Back</li>
                       
                            <li class="breadcrumb-item active">Online Payment Setup  </li>
                        </ol>
                  
					 
  
						<div lass="col-md-12"> 


						<div id="otpupdatebox" style="background-color:white; padding:50px;margin-top:10px">
						<div id="printBox">

						</div>


						<form id="searchForm" method="POST" Action="">




						<div class="form-group col-md-9"> 
						<label>Enter Payment URL <l/abel>  
						<input class="form-control"   type="text" name="payment_link" id="payment_link" class="form-control" placeholder="https://www.yourpaymentlink.com"  />
						</div>
					 

						<div class="form-group col-md-12">
						<label>Setup Options  <l/abel>
						<select   id="categories_selection"  name="categories_selection"   class="form-control col-md-12" required>
						<option value="" selected="selected">--Select Option--</option>
						<option value="link">Approve New Payment Link Above</option>   
						<option value="default">Set To Default Payment Option</option>   
						<option value="empty">Disable all Online Payment Option </option>   
						</select>
						</div>


						<div class="form-group col-md-6"> 
						<input  type="submit" id="nameSearch" name=""   class="btn btn-success" value="Submit" /> 
						</div>

						<form>


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

        const	school_code = "<?php echo$school_code ?>";
        const	payment_link = document.getElementById("payment_link").value; 
        const	cat_sele  = document.getElementById("categories_selection").value;  
       
        
    
                    $.ajax({
                        url:"pageajax.php",
                        method:"POST", 
                        dataType:"json",
                        data:{
                            payment_link:payment_link,   
                            cat_sele:cat_sele,    
                            page:'onlinePaymentUpdate',
                            action:'onlinePaymentUpdate'
                        },
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
                                    window.location.href='../school-admin/school_payment_link.php?school_code='+school_code;
                                    
                            
                                }else{
                                    
                                    elementmodal.classList.remove('loaderDisplayblock');
                                    elementmodal.classList.add('loaderDisplayNone');	
                                    alert(data.feedback);
                                    window.location.reload();

                                
                                }
                            
                        }
                    });	
     
        
        });


});



</script>

 
 



 

 


 
 
 
 
 
 
 
 
 
 
 
 
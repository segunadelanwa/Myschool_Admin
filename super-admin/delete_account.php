<?php
				include("index_header.php");
				?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("../header.php");

				if(isset($_GET["delete_id"])){
		$delete_id ='';
                   $studID = $_GET["delete_id"];
				   
					if(!empty($studID))
					{
						$delete_id = $_GET["delete_id"];
						$name       = $_GET["name"];
					}else{
						$delete_id = "";
					}
				
				}

		?>
			
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
					          <i class="fas fa-book"></i>Delete Account  
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li> 
                            <li class="breadcrumb-item active">Delete Account</li>
                        </ol>
                  
					 
  
						   <div class="col-md-12"> 
 				 
					 
					 
									 
												<div class="card-header">
													<i class="fas fa-briefcase"></i>
												Enter Student Online ID
												</div>
												
												<div class="card-body">
													
													<div class="table-responsive">
														

 		  
		   
		   
	   		<div id="otpupdatebox" style="background-color:white; padding:50px;margin-top:10px">


			</div>
			<div id="outputupdate">


			</div>
 

				   
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
    
    
		<?php 
        //BOTTOM JAVASCRIPT CODE 
        require("../footer2.php"); 
        ?>	  
 
 
    </body>
</html>


<script>

 var	delete_id = "<?php echo $delete_id; ?>";
 var	name = "<?php echo $name; ?>";



		 
				$.ajax({
				url:"../pageajax.php",
				method:"POST",
				data:{
					delete_id:delete_id,   
					name:name,   
					page:'delete',
					action:'delete'
					},
			
				success:function(data)
				{
				$('#otpupdatebox').append(data);
				
				$('#nameSearch').attr('disabled', true); 
				$('#nameSearch').removeClass('btn-warning');
				$('#nameSearch').addClass('btn-success');
				$('#nameSearch').text('Search success'); 
				 
				}
			});	






</script>



<script>


 	 function deletAccount(a,b,c,d){
    //a=category //b=online_stu_id //c=tokenpasskey //d=username


		const	passcode = document.getElementById("passcode").value; 
        var  passhash     = CryptoJS.MD5(passcode+d).toString(); 

	    if(passhash === c){
			//alert('password correct' + passhash)
			$.ajax({
				url:"../pageajax.php",
				method:"POST",
				data:{
					delete_id:b,   
					category:a,   
					page:'delete',
					action:'deleteAccount'
					},
			
				success:function(data)
				{
				$('#otpupdatebox').append(data);
				
				$('#nameSearch').attr('disabled', true); 
				$('#nameSearch').removeClass('btn-warning');
				$('#nameSearch').addClass('btn-success');
				$('#nameSearch').text('Search success'); 
				 
				}
			});	


		}else{
			alert('Wrong password passed. You need to enter correct password to delete')
		}
	 
	 
 	

		 
		
	}






</script>



 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 



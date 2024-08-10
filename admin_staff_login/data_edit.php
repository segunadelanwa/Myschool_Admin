<?php
				include("index_header.php");
?>
<!DOCTYPE html>
<html lang="zxx">

<head>


	 
		<?php

		
			 
				
				@$http_referer = $_SERVER['HTTP_REFERER'];
				
				$auto_id =time();// + $rand;
				$ref_id ="GT$auto_id"; 

				$id = $_GET['edit_post'];
				$result = $Loader->FetchPostRaw($_GET['edit_post']); 
				if(empty($result)){
					
					header("Location: index.php");
				}

				foreach($result as $row)
				{

				$title =strtoupper($row['caption']);
				$image      = 'etract_img/'.$row['image1'];
				$textarea   = $row['textarea']; 
				$date_upload= $row['date']; 
				$url ='http://127.0.0.1/e-tract.org/';
				//$url ='https://e-tract.org';
				}

			 
		?> 	

 
 
		<?php
		    include("header.php");
		?>



		<link rel="shortcut icon" href="<?php echo"$url/$image"?>" /> 
        <meta name="keywords" content="<?php echo"$title"; ?>." />

		<title>
			<?php echo"$title"; ?>
		</title>		
		<script rc="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> 
 
 
</head>

   <div id="fb-root"></div>
   
 
   
 	



 
 
  <link rel="stylesheet" href="../assets/css/style-starter.css">
 

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
					          <i class="fas fa-briefcase"></i> 
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Review E-Tract</li>
                        </ol>
                  
 
 
<section class="w3l-mag-main">
            <!--/mag-content-->
<form method="POST"   id="user_register_form">
            <div class="mag-content-inf py-5">
                <div class="container">
                    <div class="banner-bottom-sechny py-md-4">
                          <div class="ban-content-inf row py-lg-3">
                           
                             <div class="form-group col-md-12">	
															<div><b>   E-Tract Title  </b></div>  
                               <input class="form-control" value="<?php echo"$title"; ?>"   type="text" name="post_title" id="post_title" required />
															</div>
                              
                              <div class="form-group col-md-12">	
                                <div><b>   Change E-Tract Image  </b></div> 
                                <div>  
								<img src="<?php echo"$url/$image"; ?>"  style="height:100px"> </div>
                                <input class="form-control" value="<?php echo"$image1"; ?>"   type="file" name="post_img" id="post_img"   /> 
								</div>
                          
 
 

									<div class="form-group col-md-12">	
									<div><b> E-Tract Body Text </b></div> 
									<textarea rows='20' cols='120' class="form-control"  name="post_text_area" id="post_text_area" required><?php echo"$textarea"; ?></textarea>
									</div>


                  

									<input type="hidden" name="page"   value='UpdatePost' />
									<input type="hidden" name="action" value="UpdatePost" />
									<input type="hidden" name="post_id" id="post_id"  value="<?php echo"$id "; ?>" />


									<input type="submit" name="update_post" id="update_post" class="btn btn-success" value="Approve E-Tract">

									<a href='index.php'>  
									<div class="btn btn-primary ml-2 " >	 	
									Go Back 
									</div>	
									</a> 
									<a href='#'>  
									<div class="btn btn-danger ml-2 "  onclick="UnapproveEtract(<?php echo$id;?>)">	 	
									Disapprove E-Tract
									</div>	
									</a> 

                        </div>
                        </div>
                    </div>
        

                    

        </div>
  </form>
</section>
 
 

</main>
               
			   <footer class="py-4 bg-light mt-auto">
                   <?php 
				   require("footer.php"); 
				   ?>
                </footer>
				
				
            </div>
			
        </div>
    
    
        <script src="js/scripts.js"></script>
    
           <script src="js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
 
 
 
</body>
</html>
<script>
 


$(document).ready(function(){
 
  $('#user_register_form').parsley();    
 
 
	$('#user_register_form').on('submit', function(event){
				
			
		
		event.preventDefault();

	
		
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
			$('#add_equip').attr('disabled', 'disabled');
			$('#add_equip').addClass('btn-info');
			$('#add_equip').val('Please wait...');
			
			},
			success:function(data)
			{
			if(data.success == 'success')
			{
				alert(data.feedback);
				location.href='index.php';
			}
			else
			{
				alert(data.feedback);
			
			}


			}
		})
		

	});

 


 
});

function UnapproveEtract(val){
				
			
 	
				$.ajax({
					url:"../pageajax.php", 
					method:"POST",
					data:{    
						delValue:val,
						page:'UnapproveEtract',
						action:'UnapproveEtract'
						},   
					dataType:"json", 
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
						location.href='index.php';
						//window.location.reload(); 
					}
					else
					{
						alert(data.feedback);
					
					}
		
		
					}
				})
				
		 
		}
		 
</script>


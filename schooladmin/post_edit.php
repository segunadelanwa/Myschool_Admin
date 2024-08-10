<?php
				include("index_header.php");
?>
<!DOCTYPE html>
<html lang="zxx">

<head> 
	 
		<?php
             include("../header.php"); 
		
			 
     

				$id = $_GET['post'];
				$result = $Loader->FetchPost($_GET['post'],$school_code); 

				if(empty($result)){ 
					header("Location: post_review.php");
				}

				foreach($result as $row)
				{ 
                    $textarea      = $row['body'];
                    $header        = $row['header'];
                    $img_url       = $row['img_url'];
                    $date_upload   = $row['date']; 
                    $uploader_name = $row['uploader_name']; 
                    $id            = $row['id'];
                    $edit_by       = $row['edit_by'];
					 
				}

				 
		?> 	



<link rel="shortcut icon" href="<?php echo"$img_url"?>" /> 
        <meta name="keywords" content="<?php echo"$header"; ?>." />


		<title>
			Edit <?php echo"$header"; ?>
		</title>	
</head>

<script>
 function GoBackHandler(){
 history.go(-1)
 }	
</script>

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
						<li class="breadcrumb-item" onclick="GoBackHandler()"> Back</li>
                            <li class="breadcrumb-item active">Edit Newsletter</li>
                        </ol>
                  
 
 
<section class="w3l-mag-main">
            <!--/mag-content-->
<form method="POST"   id="user_register_form">
            <div class="mag-content-inf py-5">
                <div class="container">
                    <div class="banner-bottom-sechny py-md-4">
                          <div class="ban-content-inf row py-lg-3">
                           
                             <div class="form-group col-md-12">	
															<div><b>   Newsletter Title  </b></div>  
                               <input class="form-control" value="<?php echo"$header"; ?>"   type="text" name="post_title" id="post_title" required />
															</div>
                              
                              <div class="form-group col-md-12">	
								  <div> <img src="<?php echo"$img_url"; ?>"  style="height:100px"> </div>
								  <div><b>   Change Image Url/Link  </b></div> 
                                <input class="form-control" value="<?php echo"$img_url"; ?>"   type="text" name="post_img" id="post_img"   /> 
								</div>
                          

									<div class="form-group col-md-12">	
									<div><b> Newsletter Body Text </b></div> 
									<textarea rows='20' cols='120' class="form-control"  name="post_text_area" id="post_text_area" required><?php echo"$textarea"; ?></textarea>
									</div>


									<div><b>Last Post Edited By  </b></div> 
                                <input class="form-control" value="<?php echo"$edit_by"; ?>"   type="text"     Readonly /> 
								</div>   

									<input type="hidden" name="page"   value='UpdatePost' />
									<input type="hidden" name="action" value="UpdatePost" />
									<input type="hidden" name="post_id" id="post_id"  value="<?php echo"$id "; ?>" />


									<input type="submit" name="update_post" id="update_post" class="btn btn-success" value="Update Newslettter">

									<a href='#' onclick="GoBackHandler()">  
									<div class="btn btn-primary ml-2 "  >	 	
									Go Back 
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
				   require("../footer.php"); 
				   ?>
                </footer>
				
				
            </div>
			
        </div>
    
 
 
 
</body>
</html>
<script>
 


$(document).ready(function(){
 
  $('#user_register_form').parsley();    
 
 
	$('#user_register_form').on('submit', function(event){
				
			
		
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
				location.href='post_review.php';
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


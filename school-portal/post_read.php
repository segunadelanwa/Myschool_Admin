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
				}

				 
		?> 	

 
  


		<link rel="shortcut icon" href="<?php echo"$img_url"?>" /> 
        <meta name="keywords" content="<?php echo"$header"; ?>." />

		<title>
			<?php echo"$header"; ?>
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
                            <li class="breadcrumb-item active">Read Post</li>
                        </ol>
                  
 
 
<section class="w3l-mag-main">
          
            <div class="mag-content-inf py-5">
                <div class="container">
                    <div class="banner-bottom-sechny py-md-4" style="background-color:white;">
                       
                        <div class="ban-content-inf row py-lg-3">
                            <div style="width:100%;text-align:center;text-transform:uppercase"> <h2 class="top-title mb-3"><a href="#"> <?php echo"$header"; ?></a></h2> </div>

                               <div class="mag-post-meta mt-2 mb-2 p-5" style="width:100%">
                                    <span class="meta-author text-capitalize"> Uploaded
                                    <span>By&nbsp;</span><a href="#" class="author-name"><?php echo"$uploader_name";  ?></a> </span>
                                    <span class="author-date" style=" margin-left:10px"><?php echo"$date_upload";  ?></span>
                                  
                                </div>


                                <div class="maghny-gd-1 col-md-12">
                                                <div class="maghny-grid">
                                                    <figure class="effect-lily p-5">
                                                        <img src="<?php echo"$img_url"; ?>"  style="height:100%">
                                                        <figcaption>


                                                        </figcaption>
                                                    </figure>
                                                </div>

                                                <p style="font-size:16px;color:black"  >
											<textarea style="background-color:#fff; border:1px solid #fff;"  rows='30%' cols='100%'  class="form-control" disabled><?php echo"$textarea"; ?> </textarea>
										</p>



                                    
                                </div>

                        </div>
                    </div>
        

                    

        </div>
</section>
 
 

</main>
               
			   <footer class="py-4 bg-light mt-auto">
                   <?php 
				   require("../footer.php"); 
				   require("../footer2.php"); 
				   ?>
                </footer>
				
				
            </div>
			
        </div>
    
    
 
 
 
 
</body>
</html>
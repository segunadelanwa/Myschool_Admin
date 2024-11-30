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
				}

				 
		?> 	



		<link rel="shortcut icon" href="<?php echo"$url/$image"?>" /> 
        <meta name="keywords" content="<?php echo"$title"; ?>." />

		<title>
			Delete <?php echo"$header"; ?>
		</title>		
	 
 
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
                            <li class="breadcrumb-item active">Delete Newsletter Post</li>
                        </ol>
                  
 
 
<section class="w3l-mag-main">
            <!--/mag-content-->
            <div class="mag-content-inf py-5">
                <div class="container">
                    <div class="banner-bottom-sechny py-md-4" style="background-color:white;">
                        <h3 class="hny-title text-center text-danger">  <span>ARE YOU SURE YOU WANT TO DELECT THIS Newsletter?</span></h3>
                        <div class="ban-content-inf row py-lg-3">
                            <div style="width:100%;text-align:center;"> <h2 class="top-title mb-3"><a href="#"> <?php echo"$header"; ?></a></h2> </div>

    
                                <div class="maghny-gd-1 col-md-12">
                                                <div class="maghny-grid">
                                                    <figure class="effect-lily">
                                                    <img src="<?php echo"$img_url"; ?>"  style="height:100%">
                                                        <figcaption>


                                                        </figcaption>
                                                    </figure>
                                                </div>

                                                <p style="font-size:16px;color:black"  >
											<textarea style="background-color:#fff; border:1px solid #fff;"  rows='30%' cols='100%'  class="form-control" disabled><?php echo"$textarea"; ?> </textarea>
										</p>



                                            <div class="btn btn-danger ml-2 " id="add_equip"  onclick="DeleteEtract(<?php echo$id;?>)">	 	
                                            Delete  Newsletter
                                            </div>	
                                </div>

                        </div>
                    </div>
        

                    

        </div>
</section>
 
 

</div>

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
 
 
 function DeleteEtract(val){
				
			
// alert(val);
		
		$.ajax({
			url:"pageajax.php", 
			method:"POST",
            data:{    
                delValue:val,
                page:'DelPost',
                action:'DelPost'
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
                        location.href='post_review.php'; 
                    }
                    else
                    {
                        alert(data.feedback);
                    
                    }


                }
		})
		
 
}
 


 

</script>
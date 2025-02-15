 
<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php
		require("../topUrl.php");
		require("../header.php");
	
		require("index_header.php");
		
        $output ="../'.$SchoolIMG.'/'.$school_code.'/'.$photo.'";

        $data_id     = $_GET['data_id'];  
        $school_id   = trim($_GET['school_id']);  
        if($admin_access === 'proprietor'|| $admin_access === 'head')
        {

      
            $Loader->query ="SELECT * FROM `1_school_admins` WHERE `1_school_admins`.`username` = '$data_id' AND `1_school_admins`.`school_code` ='$school_id'";
            $result = $Loader->query_result();
      
                foreach($result as $row)
                {

                
              	 	
                $admin_fullname      = $row['fullname']; 		   
                $admin_photo         = $row['photo']; 		   
                $admin_admin_access  = $row['admin_access']; 		   
                $admin_username      = $row['username']; 		   
                }


        }
        else
        {
            
            header("Location: index.php");
        }




	?>
        <title>  <?php echo $output = strtoupper($school_name); ?>  </title>
        <link rel="apple-touch-icon" href="<?php echo$output; ?>" />
        <link rel="shortcut icon"    href="<?php echo$output; ?>" />
			
    </head>
    <body class="sb-nav-fixed">

 	
	<div id="modal" class="modal-backdrop loaderDisplayNone"  >  
			<?php
			require("../loader.php");
			?>
		
	</div>
 

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
						
						Admin Authorization
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Staff Authorization</li>
                        </ol>
                  
					  

                       

                        <div class="col-xl-6"> 
						 

                         <div class="card mb-4">
                                 <div class="card-header text-center">
                                     <i class="fas fa-user"></i>
                                     <h3><?php echo$admin_fullname; ?> </h3>
                                 </div>
                                 <div class="card-body">
                                     <div class="table-responsive">
                                     
                                           <form method="POST"   id="user_register_form">
                                             <?php
                                             $StuPhoto = "../$SchoolIMG/$school_code/$admin_photo";
                                             ?>
                                           <center>	<img src="<?php echo$StuPhoto?>"  style="height:200px"></center>
                                         
                                             <div class="form-group">	
                                             <label>Admin Username </label>
                                             <input class="form-control py-4" value="<?php echo$admin_username; ?>"   type="email" name="user_email_address" id="user_email_address" class="form-control" data-parsley-checkemail data-parsley-checkemail-message='<span style="color:red;">Email address already taken</span>' readonly />

                                             </div>

                                          

                                             <div class="form-group">	
                                             <label>Update New Admin Role </label>
                                            <select   name="admin_role"  id="admin_role" class="form-control "   required>
                                                <option  value="<?php echo$admin_admin_access; ?>" selected>School <?php echo$admin_admin_access; ?>  </option> 
                                                <option value='proprietor'>School Proprietor/Proprietress</option>
                                                <option value='head'>School Head </option>  
                                                <option value='admin'>School Admin </option>  
                                             </select> 
                                             </div>
                                             

  
                                                     
                                                     <input type="hidden" name="admin_user"  id="admin_user" value='<?php echo$admin_username;?>' />


                                                     <input type="hidden" name="page"   value='admin_auth_page' />
                                                     <input type="hidden" name="action" value="admin_auth_action" />

                                                     <input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Authorize New Role">
                                                 </div>
                                             </form>
                                     </div>
                                 </div>
                                          
                      
                        </div>
       
					  
	                    
		  
				 
				  </div>
                </main>
  
				
            </div>
        </div>
    
    
        <script src="../js/scripts.js"></script>
    
   
 
    </body>
</html>


<script>
 
 


 $(document).ready(function(){

  var elementmodal = document.getElementById('modal');

  window.ParsleyValidator.addValidator('checkemail', {
    validateString: function(value){
      return $.ajax({
        url:'pageajax.php',
        method:'POST',
        data:{page:'admin_signup_page', action:'check_email_admin', email:value},
        dataType:"json",
        async: false,
        success:function(data)
        {
          return true;
        }
      });
    }
  });

  $('#user_register_form').parsley();

  $('#user_register_form').on('submit', function(event){
    event.preventDefault();



    $('#phone_no').attr('required', 'required');

    $('#gender').attr('required', 'required');

    $('#department').attr('required', 'required');

 


    if($('#user_register_form').parsley().validate())
    {
      $.ajax({
        url:'pageajax.php',
        method:"POST",
        data:new FormData(this),
        dataType:"json",
        contentType:false,
        cache:false,
        processData:false,
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
					  // window.location="../";
					
			 
				  }else{
					   
					elementmodal.classList.remove('loaderDisplayblock');
					elementmodal.classList.add('loaderDisplayNone');	
					alert(data.feedback);
					//window.location.reload();

				   
				  }


        }
		
		
      })
    }

  });
	
});



</script>







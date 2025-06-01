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
		PORTAL LOCK
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
					   Student portal lock
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item" onclick="GoBackHandler()">Back</li>
                       
                            <li class="breadcrumb-item active"> Student portal lock   </li>
                        </ol>
                  
					 
  
						<div lass="col-md-12"> 


						<div id="otpupdatebox" style="background-color:white; padding:50px;margin-top:10px">
						<div id="printBox">

						</div>


						<form id="searchForm" method="POST" Action="">




						<div class="form-group col-md-9"> 
						<label>Enter Student ID <l/abel>  
						<input class="form-control"   type="text" name="stud_id" id="stud_id" class="form-control" placeholder="Student ID"  required/>
						</div>
					 

						<div class="form-group col-md-12">
						<label>Lock Option  <l/abel>
						<select   id="categories_selection"  name="categories_selection"   class="form-control col-md-12" >
						<option value="" selected="selected">--Select Option--</option>
						<option value="close">Lock Portal </option>   
						<option value="open">Unlock Portal </option>   
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

        const	stud_id = document.getElementById("stud_id").value; 
        const	cat_sele  = document.getElementById("categories_selection").value;  
       
        
    
                    $.ajax({
                        url:"pageajax.php",
                        method:"POST", 
                        dataType:"json",
                        data:{
                            stud_id:stud_id,   
                            cat_sele:cat_sele,    
                            page:'lockStudentPortal',
                            action:'lockStudentPortal'
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
                                   // window.location.reload();
                                    
                            
                                }else{
                                    
                                    elementmodal.classList.remove('loaderDisplayblock');
                                    elementmodal.classList.add('loaderDisplayNone');	
                                    alert(data.feedback);
                                    //window.location.reload();

                                
                                }
                            
                        }
                    });	
     
        
        });


});



</script>

 
 



 

 


 
 
 
 
 
 
 
 
 
 
 
 
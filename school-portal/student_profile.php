<?php
				include("index_header.php");
				?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("../header.php");
  
		?>

        <?php
                $student_id     = $_GET['student_id']; 
                if(empty($student_id)){

                header("Location: index.php");
                }else{

                    $Loader->query ="SELECT * FROM `4_student_reg` WHERE online_stu_id = '$student_id'";
                    $resulttotal_row = $Loader->total_row();

                    if($resulttotal_row == 1){

                                    $result = $Loader->query_result();

                                    foreach($result as $row)
                                    { 
                                        $id                 = $row['id'];  	 	
                                        $stu_photo          = $row['photo']; 		
                                        $stu_teacher_code   = $row['teacher_code']; 	 	  
                                        $stu_school_code    = $row['school_code']; 	 	  
                                        $stu_parent_code    = $row['parent_code'];

                                        $stu_student_name   = $row['student_name']; 	 	  
                                        $stu_stu_gender     = $row['stu_gender']; 	 	  
                                        $stu_student_class  = $row['student_class']; 	 	  
                                        $stu_class_rep      = $row['class_rep']; 	 	  
                                        $stu_date           = $row['date']; 	 	  
                                    }

                                    $Loader->query ="SELECT * FROM `3_parent_reg` WHERE parent_code = '$stu_parent_code'";
                                    $result_parent = $Loader->query_result();
                                    foreach($result_parent as $row_p)
                                    {
                                        $par_guidance_name       = $row_p['guidance_name']; 
                                        $par_phone               = $row_p['username']; 
                                        $par_address             = $row_p['address']; 
                                    }


                                    $Loader->query ="SELECT * FROM `2_teacher_reg` WHERE teacher_code = '$stu_teacher_code'";
                                    $result_teacher = $Loader->query_result();
                                    foreach($result_teacher as $row_t)
                                    {
                                        $tea_fullname  = $row_t['fullname'];  
                                        $tea_gender    = $row_t['gender'];  
                                        $phone         = $row_t['phone'];  
                                    }

                        $process ='active';
                    }else{
                        $process ='passive';


                    }



                }
        ?>


			 <title> 
             <?php   if($process == 'active'){ echo  $stu_student_name;}   ?>  School profile data
            </title>	
    </head>
	
<style>

#MaintenanceDate, #setdaily, #setmonthly,#setyearly{
display:none
}
#MaintenanceHours{
display:none
}

</style>


<script>
 function GoBackHandler(){
 history.go(-1)
 }	


</script> 	
<style>
.loaderDisplayNone {
display:none;
}

</style>




  <body class="sb-nav-fixed">

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
                            <div id="headerfluid">
                                <h1 class="mt-4"> 
                                    <i class="fas fa-book-open"></i> 
                                    <?php   if($process == 'active'){ echo  $stu_student_name;}  ?> Profile Data  
                                </h1>
                                <ol class="breadcrumb mb-4">
                                    <li class="breadcrumb-item"onclick="GoBackHandler();">Back</li>
                        
                                    <li class="breadcrumb-item active">Student Profile</li>
                                </ol>
                            </div>
					 
  
						   <div class="col-md-12"> 
 				 
					 
					 
									 
											 
												
												<div class="card-body">
													
													<div class="table-responsive">
														

 		 	 <form id="searchForm" method="POST" Action="">
	  
				   <div class="form-group col-md-4">
					   <label for="name">Enter Student Online ID</label>
					   <input type="text" name="student_id" class="form-control" id="student_id" placeholder="Student ID" required>
				   </div>
 
 

                <div class="form-group col-md-4">
                    <input  type="submit" id="nameSearch" name="" class="btn btn-warning" value="Fetch Result" /> 
                    <a href="student_profile.php"  class="btn btn-primary">Refresh    </a>	<br/>	
                  	
                </div>
                 <div   class="btn btn-success" onclick="PrintDiv();">Print Profile</div>
			
		     </form>
		   
		   
	   		<div id="otpupdatebox" style="background-color:white; padding:50px;margin-top:10px">

                    <?php

                            if($process == 'active'){
                                    include("../e_result_server.php");
                                    $ResultServer = new ResultServer(); 
                                    echo $ResultServer->StudentProfileDataFetch($student_id);
                            }
                            else
                            {


                            echo $failed ='
                            <div class="col-xl- col-md-6">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><i class="fa fa-credit-card alert_head get_st"></i><br>Notification!!</strong><br />

                               Empty result fetch. Please double check your inputs  

                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>  
                            </div>';




                            }


                    ?>

			</div>

			<div id="outputupdate">



			</div>
 

				   
													</div>
										
										</div>
										 
					  
	                       </div>

 
		  
				 
 
				  </div>
                </main>
               
			   <footer class="py-4 bg-light mt-auto " id="footer">
                   <?php 
				   require("../footer.php"); 
				   require("../footer2.php"); 
				   ?>
                </footer>
				
				
            </div>
			
        </div>
    
    
     
 
 
 
    </body>
</html>

 


<script>


 	$(document).on('click', '#nameSearch', function(event){
    event.preventDefault();
	
    const	student_id = document.getElementById("student_id").value;  
	//alert(searchNo);
	 
 	
			$.ajax({
				url:"pageajax.php",
				method:"POST",
				data:{
					student_id:student_id,      
					page:'subjectSetup',
					action:'student_profile_data'
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
		 
		
	});




    function PrintDiv() {  
	var formBox = document.getElementById('searchForm'); 
	var layoutSidenav = document.getElementById('layoutSidenav'); 
	var layoutSidenav_nav = document.getElementById('layoutSidenav_nav'); 
	var headerfluid = document.getElementById('headerfluid'); 
	var footer = document.getElementById('footer'); 


	layoutSidenav.classList.add('loaderDisplayNone');
	layoutSidenav_nav.classList.add('loaderDisplayNone');
	formBox.classList.add('loaderDisplayNone');
	headerfluid.classList.add('loaderDisplayNone');
	footer.classList.add('loaderDisplayNone');
	window.print();
	// console.log(formBox)
 }


</script>



 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 




<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		require("../header.php");
		require("../title.php");
        require("index_header.php");
		?>
			
    </head>
<style>

/* .QuestionWithImage{
display:none
}
.QuestionWithNoImage{
display:none
} */

</style>


	
<script type="text/javascript">
 
 function GoBackHandler(){
 history.go(-1)
 }	


 

// function calender(calend) {
//      var calend        = document.getElementById(calend);
//      const main_d_btn  = document.querySelector('.QuestionWithImage');
// 	 const hours_d_btn = document.querySelector('.QuestionWithNoImage');
	 
  
// 	 if(calend.value == "withImage"){
		 
// 	     main_d_btn.style.display="block";
// 		 hours_d_btn.style.display="none";
		 
// 	 }else if(calend.value == "withNoImage"){
		 
// 		 hours_d_btn.style.display="block";
// 		 main_d_btn.style.display="none";
// 	 }
	 
 
// }


 
</script> 
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
						Scheme Of Work Upload
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item" onclick="GoBackHandler()">Back</li>
                            <li class="breadcrumb-item active">Scheme Of Work</li>
                        </ol>
                  
					  

                       

						   <div class="col-xl-6"> 
						 

										<div class="card mb-4">
												<div class="card-header">
													<i class="fas fa-user"></i>
													Upload Scheme Of Work
												</div>

												<div class="card-body">
													<div class="table-responsive">
													







														 


														  <form method="POST"   id="user_register_form1"  class="QuestionWithNoImage" enctype='multipart/form-data'>
                                                       
                                                       


														  <div class="form-group">
														    <label>School Code </label> 
                                                            <input type="text" name='school_code' id='school_code' value="<?php echo$school_code; ?>"  i class="form-control py-4"   readonly />
														   </div>


                                                           <div class="form-group">
														    <label>Teacher Code </label> 
                                                            <input type="text" name='teacher_code' id='teacher_code' value="<?php echo$teacher_code; ?>"  i class="form-control py-4"   readonly />
														   </div>

														   
                                                           <div class="form-group ">
															<label for="name">Select Term</label>
															<select class="form-control" id="term_selection"  name="term_selection"   required>
															<option value="First Term">First Term </option>
															<option value="Second Term">Second Term</option>
															<option value="Third Term">Third Term</option> 
															</select>
														   </div>


                                                          <div class="form-group">	
																<label>Select Subject </label>
																<select id="subject" name="subject" class="form-control" >
																

																<?php		
																 $sub_title = $Loader-> FecthSingleSubject($subject);
                                                            
																$result = $Loader-> FecthAllSubject();
																foreach($result as $data)
																{
																$sub_title=$data['sub_title'];
																$sub_id=$data['sub_id'];  
																 echo"<option  value='$subject' selected='selected'> $sub_title </option>";
																 }

                                                                 ?>
																</select>	

															</div>	



                                                                <div class="form-group">	
																<label>Select Class </label>
															    <select  name='class' id='class'  class="form-control "  required >
																<option  value=""> select option </option>
																<option value="primary1">Primary 1 </option> 
																<option value="primary2">Primary 2 </option> 
																<option value="primary3">Primary 3 </option> 
																<option value="primary4">Primary 4 </option> 
																<option value="primary5">Primary 5 </option> 
																<option value="primary6">Primary 6 </option> 
																<option value="jss1">JSS 1 </option> 
																<option value="jss2">JSS 2 </option> 
																<option value="jss3">JSS 3 </option> 
																<option value="ss1">SS 1 </option> 
																<option value="ss2">SS 2 </option> 
																<option value="ss3">SS 3 </option> 
																
																</select>
																</div>


                                                                <div class="form-group">	
																<label>Select Week </label>
															    <select  name='week' id='week'  class="form-control "  required >
																<option  value=""> select option </option>
																<option value="1">Week 1 </option>  
																<option value="2">Week 2 </option>  
																<option value="3">Week 3 </option>  
																<option value="4">Week 4 </option>  
																<option value="5">Week 5 </option>  
																<option value="6">Week 6 </option>  
																<option value="7">Week 7 </option>  
																<option value="8">Week 8 </option>  
																<option value="9">Week 9 </option>  
																<option value="10">Week 10 </option>  
																<option value="11">Week 11</option>  
																<option value="12">Week 12</option>  
																<option value="13">Week 13</option>  
																<option value="14">Week 14</option>  
																<option value="15">Week 15</option>  
																<option value="16">Week 16</option>  
																<option value="17">Week 17</option>  
																<option value="18">Week 18</option>  
																<option value="19">Week 19</option>  
																<option value="20">Week 20</option>  
																<option value="21">Week 21</option>  
																<option value="22">Week 22</option>  
																<option value="23">Week 23</option>  
																<option value="24">Week 24</option>  
																<option value="25">Week 25</option>  
																<option value="26">Week 26</option>  
																<option value="27">Week 27</option>  
																<option value="28">Week 28</option>  
																<option value="29">Week 29</option>  
																<option value="30">Week 30 </option>  
																
																</select>
																</div>


 
                                                            <div>
                                                    
                                                            <div class="form-group">			
															<label style="font-weight:bold;">Topic </label>
															<input type="text" name='topic' id='topic'   class="form-control py-4"   required />
															</div>

                                                            <div class="form-group">
														    <label>Content </label> 
															<textarea name='content' id='content' style='height:150px;' class='form-control '></textarea>
														   </div> 

 
                                              
																	
																	<input type="hidden" name="page"   value='uploadSchemeOfWork' />
																	<input type="hidden" name="action" value="uploadSchemeOfWork" />

																	<input type="submit" name="admin_signup" id="admin_signup" class="btn btn-primary" value="Upload Scheme">
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


 

  $('#user_register_form1').on('submit', function(event){
    event.preventDefault();

 
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


  });


 
	
});

 
</script>







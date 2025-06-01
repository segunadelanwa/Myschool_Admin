

                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color:<?php echo$school_bgcolor;?>;color:<?php echo$text_code;?>"">
                    <div class="sb-sidenav-menu" >
                        <div class="nav"  >
						
                            <div class="sb-sidenav-menu-heading">
                               <a href="my_profile_data.php"> 
                                <center>
                                  <?php  if(empty($photo)){
                                      echo' <img src="image/profile.jpg"  style="width:90px;border-radius:500px"/> ';
                                  }else{
                                      echo' <img src="../'.$SchoolIMG.'/'.$school_code.'/'.$photo.'"  style="width:90px;border-radius:500px"/> '; 
                                  }
                                   ?>
                               </center>
                              </a>
							</div>
							School Code/ID: <?php echo"$school_code"; ?>
                            <a class="nav-link" href="index.php" style="color:<?php echo$text_code;?>">
                                <div class="sb-nav-link-icon"><i style="color:<?php echo$text_code;?>" class="fas fa-tachometer-alt"></i></div>
                               Goto Home
                            </a> 
						  
						  <a style="color:<?php echo$text_code;?>" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i style="color:<?php echo$text_code;?>" class="fa fa-users"></i></div>
                                Account Setup
                                <div class="sb-sidenav-collapse-arrow"><i style="color:<?php echo$text_code;?>" class="fas fa-angle-down"></i></div>
                            </a>
                            <div style="color:<?php echo$text_code;?>" class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav" > 
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="add_admin_staff.php" >Setup Admin  </a> 
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="add_teacher.php" >Setup Teacher </a> 
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="add_new_parent.php">Setup Parent </a>  
                                   
                                </nav>
                            </div>

						  <a style="color:<?php echo$text_code;?>" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEditLayouts" aria-expanded="false" aria-controls="collapseEditLayouts">
                                <div class="sb-nav-link-icon"><i style="color:<?php echo$text_code;?>" class="fa fa-users"></i></div>
                                Account Edit
                                <div class="sb-sidenav-collapse-arrow"><i style="color:<?php echo$text_code;?>" class="fas fa-angle-down"></i></div>
                            </a>
                            <div style="color:<?php echo$text_code;?>" class="collapse" id="collapseEditLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="edit_admin_profile.php">My Profile Data</a> 
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="edit_data.php?data_id=<?php echo$school_code;?>&name=school">School Account</a> 
                                   
                                </nav>
                            </div>
				 
                            <a style="color:<?php echo$text_code;?>" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSchemeOfWork" aria-expanded="false" aria-controls="collapseSchemeOfWork">
                                <div class="sb-nav-link-icon"><i style="color:<?php echo$text_code;?>" class="fa fa-users"></i></div>
                                Scheme Of Work
                                <div class="sb-sidenav-collapse-arrow"><i style="color:<?php echo$text_code;?>" class="fas fa-angle-down"></i></div>
                            </a>
                            <div style="color:<?php echo$text_code;?>" class="collapse" id="collapseSchemeOfWork" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">   
                                    
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="scheme_of_work_list.php">Scheme Of Work  </a>   
                                </nav>
                            </div>

						  <a style="color:<?php echo$text_code;?>" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePaymentLayouts" aria-expanded="false" aria-controls="collapsePaymentLayouts">
                                <div class="sb-nav-link-icon"><i style="color:<?php echo$text_code;?>" class="fa fa-credit-card"></i></div>
                                Payment portal
                                <div class="sb-sidenav-collapse-arrow"><i style="color:<?php echo$text_code;?>" class="fas fa-angle-down"></i></div>
                            </a>
                            <div style="color:<?php echo$text_code;?>" class="collapse" id="collapsePaymentLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">  
                                    <a  style="color:<?php echo$text_code;?>" class="nav-link"  href="payment_sub.php">Student portal  </a> 
                                    <a  style="color:<?php echo$text_code;?>" class="nav-link"  href="update_payment_link.php">Online Payment setup</a> 
                                   
                                </nav>
                            </div>


						  <a style="color:<?php echo$text_code;?>" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNewsletterLayouts" aria-expanded="false" aria-controls="collapseNewsletterLayouts">
                                <div class="sb-nav-link-icon"><i style="color:<?php echo$text_code;?>" class="fa fa-book"></i></div>
                              Newsletter 
                                <div class="sb-sidenav-collapse-arrow"><i style="color:<?php echo$text_code;?>" class="fas fa-angle-down"></i></div>
                            </a>
                            <div style="color:<?php echo$text_code;?>" class="collapse" id="collapseNewsletterLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="post_newsletter.php">Post Newsletter</a>   
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="post_review.php">View Newsletter</a>      
                                   
                                </nav>
                            </div>
						  <a style="color:<?php echo$text_code;?>" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapselock_student_portal" aria-expanded="false" aria-controls="collapselock_student_portal">
                                <div class="sb-nav-link-icon"><i style="color:<?php echo$text_code;?>" class="fa fa-lock"></i></div>
                              Lock Student Portal
                                <div class="sb-sidenav-collapse-arrow"><i style="color:<?php echo$text_code;?>" class="fas fa-angle-down"></i></div>
                            </a>
                            <div style="color:<?php echo$text_code;?>" class="collapse" id="collapselock_student_portal" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="lock_student_portal.php">Student Portal</a>      
                                   
                                </nav>
                            </div>

                            <a style="color:<?php echo$text_code;?>"class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQuestionUploads" aria-expanded="false" aria-controls="collapseQuestionUploads">
                                <div class="sb-nav-link-icon"><i class="fa fa-users" style="color:<?php echo$text_code;?>"></i></div>
                                Question Uploads
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down" style="color:<?php echo$text_code;?>"></i></div>
                            </a>
                            <div class="collapse" id="collapseQuestionUploads" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">  
                                    <a style="color:<?php echo$text_code;?>"class="nav-link"  href="view_question.php">View Questions </a>  
                                    <a style="color:<?php echo$text_code;?>"class="nav-link"  href="edit_print_question.php">Print Questions </a>  
                                  
                                   
                                </nav>
                            </div>


						  <a style="color:<?php echo$text_code;?>" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseResultLayouts" aria-expanded="false" aria-controls="collapseResultLayouts">
                                <div class="sb-nav-link-icon"><i style="color:<?php echo$text_code;?>" class="fa fa-book"></i></div>
                                Students Result
                                <div class="sb-sidenav-collapse-arrow"><i style="color:<?php echo$text_code;?>" class="fas fa-angle-down"></i></div>
                            </a>
                            <div style="color:<?php echo$text_code;?>" class="collapse" id="collapseResultLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="student_past_result.php">Download Past Result</a>   
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="update_result_download.php">Enable Students E-Result Download</a>   
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="update_result_download.php">Disable Students E-Result Download</a>      
                                   
                                </nav>
                            </div>

                            <a style="color:<?php echo$text_code;?>" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCreateTicket" aria-expanded="false" aria-controls="collapseCreateTicket">
                                <div class="sb-nav-link-icon"><i style="color:<?php echo$text_code;?>" class="fa fa-tools"></i></div>
                                Ticket
                                <div class="sb-sidenav-collapse-arrow"><i style="color:<?php echo$text_code;?>" class="fas fa-angle-down"></i></div>
                            </a>
                            <div style="color:<?php echo$text_code;?>" class="collapse" id="collapseCreateTicket" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                      
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="ticket_create.php"> Create Ticket</a>   
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="ticket_review.php"> View Ticket</a>   
                                   
                                </nav>
                            </div>



                            
						  <a style="color:<?php echo$text_code;?>" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettingsLayouts" aria-expanded="false" aria-controls="collapseSettingsLayouts">
                                <div class="sb-nav-link-icon"><i style="color:<?php echo$text_code;?>" class="fa fa-tools"></i></div>
                                Settings
                                <div class="sb-sidenav-collapse-arrow"><i style="color:<?php echo$text_code;?>" class="fas fa-angle-down"></i></div>
                            </a>
                            <div style="color:<?php echo$text_code;?>" class="collapse" id="collapseSettingsLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="select_id_template.php">Select ID Card Template </a>  
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="id_card_update.php">Validate ID Card </a>  
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="password_update.php">Change password </a>  
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="password_reset.php">Reset password </a> 
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="profile.php">Profile </a>  
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="logout.php">Log out </a> 
                                   
                                </nav>
                            </div>

					 </div>
						
						
                    </div>
                    <div class="sb-sidenav-footer" style="background-color:<?php echo$school_bgcolor;?>">
                        <div class="small">Logged in as:</div>
                       <?php echo"$schl_head_name"; ?>
                    </div>
                </nav>
      


                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color:<?php echo$school_bgcolor;?>">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
						
                            <div class="sb-sidenav-menu-heading">
							
							</div>
							Teacher Code/ID: <?php echo"$teacher_code"; ?>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                               Goto Home
                            </a>
                            <div class="sb-sidenav-menu-heading">TEACHER DASHBOARD</div>
                          
						  
						  
						  
						  
			 
						  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEditLayouts" aria-expanded="false" aria-controls="collapseEditLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                                Account Edit
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseEditLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a class="nav-link"  href="edit_data.php?data_id=<?php echo$teacher_code;?>&name=teacher">Teacher Account</a> 
                                   
                                </nav>
                            </div>
				 


						  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePaymentLayouts" aria-expanded="false" aria-controls="collapsePaymentLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                                Question Setup
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePaymentLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a class="nav-link"  href="upload_question.php?payee_id=<?php echo"$school_code&name=$school_name" ?>">Upload Question </a> 
                                    <a class="nav-link"  href="view_question.php">View Question </a> 
                                    <a class="nav-link"  href="edit_print_question.php?type=exam">Print Exam </a> 
                                    <a class="nav-link"  href="edit_print_question.php?type=test" >Print Test </a> 
                                  
                                   
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNewsletterLayouts" aria-expanded="false" aria-controls="collapseNewsletterLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div>
                              Newsletter 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseNewsletterLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a class="nav-link"  href="post_newsletter.php">Post Newsletter</a>   
                                    <a class="nav-link"  href="post_review.php">View Newsletter</a>      
                                   
                                </nav>
                            </div>

                            
						  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettingsLayouts" aria-expanded="false" aria-controls="collapseSettingsLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-tools"></i></div>
                                Settings
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseSettingsLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a class="nav-link"  href="password_update.php">Change password </a> 
                                    <a class="nav-link"  href="profile.php">Profile </a>  
                                    <a class="nav-link"  href="logout.php">Log out </a> 
                                   
                                </nav>
                            </div>
					 </div>
						
						
                    </div>
                    <div class="sb-sidenav-footer" style="background-color:<?php echo$school_bgcolor;?>">
                        <div class="small">Logged in as:</div>
                       <?php echo"$username"; ?>
                    </div>
                </nav>
      
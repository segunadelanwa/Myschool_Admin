

                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color:<?php echo$school_bgcolor;?>">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
						
                            <div class="sb-sidenav-menu-heading">
							
							</div>
							School Code/ID: <?php echo"$school_code"; ?>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                               Goto Home
                            </a>
                            <div class="sb-sidenav-menu-heading">SCHOOL ADMIN</div>
                          
						  
						  
						  
						  
						  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                                Account Setup
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a class="nav-link"  href="add_teacher.php">Teacher Account </a> 
                                    <a class="nav-link"  href="add_new_parent.php">Parent Account </a> 
                                    <a class="nav-link"  href="add_new_student.php">Student Account </a> 
                                   
                                </nav>
                            </div>
						  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEditLayouts" aria-expanded="false" aria-controls="collapseEditLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                                Account Edit
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseEditLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a class="nav-link"  href="edit_data.php?data_id=<?php echo$school_code;?>&name=school">School Account</a> 
                                   
                                </nav>
                            </div>
				 


						  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePaymentLayouts" aria-expanded="false" aria-controls="collapsePaymentLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-credit-card"></i></div>
                                Payment
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePaymentLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a class="nav-link"  href="payment_history.php?payee_id=<?php echo"$school_code&name=$school_name" ?>">Payment History </a> 
                                    <a class="nav-link"  href="payment_sub.php">CBT App Payment </a> 
                                   
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
                                    <a class="nav-link"  href="password_reset.php">Reset password </a> 
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
      
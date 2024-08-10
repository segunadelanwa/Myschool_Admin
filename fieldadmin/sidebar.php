

                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
						
                            <div class="sb-sidenav-menu-heading">
							
							</div>
							Field Admin ID: <?php echo"$marketer_code"; ?>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                <?php echo"$fullname"; ?>
                            </a>
                            <div class="sb-sidenav-menu-heading">FIELD ADMIN</div>
                          
						  
						  
						  
						  
						  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                                Account Setup
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a class="nav-link"  href="add_new_school.php">Setup New School </a> 
                                   
                                </nav>
                            </div>
						  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePaymentLayouts" aria-expanded="false" aria-controls="collapsePaymentLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                                Payment
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePaymentLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a class="nav-link"  href="payment_history.php?payee_id=<?php echo"$marketer_code&name=$fullname" ?>">Payment History </a> 
                                   
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
                                    <a class="nav-link"  href="edit_data.php?data_id=<?php echo"$marketer_code&name=field_admin"?>">Edit Account </a> 
                                    <a class="nav-link"  href="logout.php">Log out </a> 
                                   
                                </nav>
                            </div>
					 </div>
						
						
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                       <?php echo"$username"; ?>
                    </div>
                </nav>
      


                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
						
                            <div class="sb-sidenav-menu-heading">
							
							
							Team Lead ID: <br/><?php echo"$marketer_code"; ?>
                            <a class="nav-link" href="index.php"> 
                              Hi,  <?php echo"$fullname"; ?>
                            </a>
                        </div> 
                          
						  
						  
						  
						  
						  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                                Account Setup
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">  
                                    <a class="nav-link"  href="add_field_admin.php">Onboard FOO </a>  
                                </nav>
                            </div>
						  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProjectDocument" aria-expanded="false" aria-controls="collapseProjectDocument">
                                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                                Official Download
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProjectDocument" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">  
                                    <a class="nav-link"  href="../assets/downloads/need_to_adopt_software.pdf" download>Software Needs</a>  
                                    <a class="nav-link"  href="../assets/downloads/onboard_process.pdf" download>Onboard Process</a>  
                                    <a class="nav-link"  href="../assets/downloads/project_proposal.pdf" download>Project Proposal </a>  
                                    <a class="nav-link"  href="../assets/downloads/project_slide.pdf" download>Project Slide </a>  
                                    <a class="nav-link"  href="../assets/downloads/project_acceptance_form.pdf" download>Acceptance Form </a>   
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


                            <a style="color:<?php echo$text_code;?>" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCreateTicket" aria-expanded="false" aria-controls="collapseCreateTicket">
                                <div class="sb-nav-link-icon"><i style="color:<?php echo$text_code;?>" class="fa fa-tools"></i></div>
                                Ticket
                                <div class="sb-sidenav-collapse-arrow"><i style="color:<?php echo$text_code;?>" class="fas fa-angle-down"></i></div>
                            </a>
                            <div style="color:<?php echo$text_code;?>" class="collapse" id="collapseCreateTicket" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="ticket_review.php">Open Ticket </a>   
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="ticket_closed.php">Closed Ticket </a>   
                                   
                                </nav>
                            </div>



                            
						  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettingsLayouts" aria-expanded="false" aria-controls="collapseSettingsLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-tools"></i></div>
                                Settings
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseSettingsLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a class="nav-link"  href="password_reset.php">Reset password </a> 
                                    <a class="nav-link"  href="password_update.php">Change password </a> 
                                    <a class="nav-link"  href="profile.php">Profile </a> 
                                    <a class="nav-link"  href="edit_data.php?data_id=<?php echo"$marketer_code&name=Team_lead"?>">Edit Account </a> 
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
      
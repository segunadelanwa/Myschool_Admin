

                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color:<?php echo$school_bgcolor;?>">
                    <div class="sb-sidenav-menu">
                        <div class="nav" >
                        <center>
                            <?php   echo' <img src="../'.$SchoolIMG.'/'.$school_code.'/'.$school_logo.'"  style="width:70px"/> '; ?>
                       </center>
                            <div class="sb-sidenav-menu-heading" style="color:<?php echo$text_code;?>">
							School Code: <?php echo"$school_code"; ?>
							Teacher's Code: <?php echo"$teacher_code"; ?>
							</div>
							
                            <a class="nav-link" href="index.php"style="color:<?php echo$text_code;?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt" style="color:<?php echo$text_code;?>"></i></div>
                               Goto Home
                            </a> 
			 
						  <a style="color:<?php echo$text_code;?>" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEditLayouts" aria-expanded="false" aria-controls="collapseEditLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-users" style="color:<?php echo$text_code;?>"></i></div>
                                Account Edit
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"style="color:<?php echo$text_code;?>"></i></div>
                            </a>
                            <div class="collapse" id="collapseEditLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="edit_data.php?data_id=<?php echo$teacher_code;?>&name=teacher">Teacher Account</a> 
                                   
                                </nav>
                            </div>
				 


						  <a style="color:<?php echo$text_code;?>"class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePaymentLayouts" aria-expanded="false" aria-controls="collapsePaymentLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-users" style="color:<?php echo$text_code;?>"></i></div>
                                Question Setup
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down" style="color:<?php echo$text_code;?>"></i></div>
                            </a>
                            <div class="collapse" id="collapsePaymentLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a style="color:<?php echo$text_code;?>"class="nav-link"  href="upload_question.php?payee_id=<?php echo"$school_code&name=$school_name" ?>">Upload Question </a> 
                                    <a style="color:<?php echo$text_code;?>"class="nav-link"  href="view_question.php">View Question </a> 
                                    <a style="color:<?php echo$text_code;?>"class="nav-link"  href="edit_print_question.php?type=exam">Print Exam </a> 
                                    <a style="color:<?php echo$text_code;?>"class="nav-link"  href="edit_print_question.php?type=test" >Print Test </a> 
                                  
                                   
                                </nav>
                            </div>
						  <a style="color:<?php echo$text_code;?>"class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSchemeOfWork" aria-expanded="false" aria-controls="collapseSchemeOfWork">
                                <div class="sb-nav-link-icon"><i class="fa fa-users"style="color:<?php echo$text_code;?>"></i></div>
                                Scheme Of Work
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"style="color:<?php echo$text_code;?>"></i></div>
                            </a>
                            <div class="collapse" id="collapseSchemeOfWork" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">   
                                    <a style="color:<?php echo$text_code;?>"class="nav-link"  href="scheme_of_work_upload.php">Upload Scheme Of Work </a> 
                                    <a style="color:<?php echo$text_code;?>"class="nav-link"  href="scheme_of_work_list.php">View Scheme Of Work  </a>  
                                  
                                   
                                </nav>
                            </div>

                            <a style="color:<?php echo$text_code;?>"class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNewsletterLayouts" aria-expanded="false" aria-controls="collapseNewsletterLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-book"style="color:<?php echo$text_code;?>"></i></div>
                              Newsletter 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"style="color:<?php echo$text_code;?>"></i></div>
                            </a>
                            <div style="color:<?php echo$text_code;?>"class="collapse" id="collapseNewsletterLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a style="color:<?php echo$text_code;?>"class="nav-link"  href="post_newsletter.php">Post Newsletter</a>   
                                    <a style="color:<?php echo$text_code;?>"class="nav-link"  href="post_review.php">View Newsletter</a>      
                                   
                                </nav>
                            </div>

   
                            <a style="color:<?php echo$text_code;?>" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCreateTicket" aria-expanded="false" aria-controls="collapseCreateTicket">
                                <div class="sb-nav-link-icon"><i style="color:<?php echo$text_code;?>" class="fa fa-tools"></i></div>
                                Ticket
                                <div class="sb-sidenav-collapse-arrow"><i style="color:<?php echo$text_code;?>" class="fas fa-angle-down"></i></div>
                            </a>
                            <div style="color:<?php echo$text_code;?>" class="collapse" id="collapseCreateTicket" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="ticket_create.php">Create Ticket </a>   
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="ticket_review.php">View Ticket </a>   
                                   
                                </nav>
                            </div>                      




						  <a style="color:<?php echo$text_code;?>"class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSettingsLayouts" aria-expanded="false" aria-controls="collapseSettingsLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-tools"style="color:<?php echo$text_code;?>"></i></div>
                                Settings
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"style="color:<?php echo$text_code;?>"></i></div>
                            </a>
                            <div class="collapse" id="collapseSettingsLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a style="color:<?php echo$text_code;?>"class="nav-link"  href="password_update.php">Change password </a> 
                                    <a style="color:<?php echo$text_code;?>"class="nav-link"  href="profile.php">Profile </a>  
                                    <a style="color:<?php echo$text_code;?>"class="nav-link"  href="logout.php">Log out </a> 
                                   
                                </nav>
                            </div>



					 </div>
						
						
                    </div>
                    <div class="sb-sidenav-footer" style="background-color:<?php echo$school_bgcolor;?>; color:<?php echo$text_code;?>"">
                        <div class="small">Logged in as:</div>
                       <?php echo"$fullname"; ?>
                    </div>
                </nav>
      
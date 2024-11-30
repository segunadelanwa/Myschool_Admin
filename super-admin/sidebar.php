

                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
						
                            <div class="sb-sidenav-menu-heading">
							
							</div>
							 Admin ID: <?php echo"$admincode"; ?>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                <?php echo"$fullname"; ?>
                            </a>
                            <div class="sb-sidenav-menu-heading">Officer's Registration</div>
                          
						  
						  
						  
						  
						  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                                Account Setup
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link"  href="add_admin_staff.php">Admin/Staff</a>
                                    <a class="nav-link"  href="add_team_lead.php">Team Lead</a>
                                    <a class="nav-link"  href="add_field_admin.php">Field Admin</a>
                                    <a class="nav-link"  href="add_new_school.php">School  Reg</a>
                                    <a class="nav-link"  href="add_teacher.php">Teacher Reg</a>
									 <a class="nav-link" href="add_new_parent.php">Parent Reg</a>
									 <a class="nav-link" href="add_new_student.php">Student Reg</a>
									 <a class="nav-link" href="student_subject_setup.php">Add Student Subject</a>
									 <a class="nav-link" href="student_subject_check.php">Check Student Subject</a>
                                   
                                </nav>
                            </div>
						  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQuesLayout" aria-expanded="false" aria-controls="collapseQuesLayout">
                                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                                Question Setup
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseQuesLayout" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link"  href="upload_question.php">Upload Question</a> 
                                    <a class="nav-link"  href="view_question.php?teacher_code=<?php echo$username;?>">View Question</a> 
                                    <a class="nav-link"  href="edit_print_question.php?type=exam&teacher_code=<?php echo$username;?>">Print Exam</a> 
                                    <a class="nav-link"  href="edit_print_question.php?type=test&teacher_code=<?php echo$username;?>">Print Test</a>  
                                   
                                </nav>
                            </div>
						  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSubjectLayout" aria-expanded="false" aria-controls="collapseSubjectLayout">
                                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                                Subject Setup
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseSubjectLayout" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a class="nav-link"  href="add_subject.php">Add Subject</a> 
                                    <a class="nav-link"  href="view_subject.php">View Subjects</a> 
                                   
                                </nav>
                            </div>
						  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStuSubLayout" aria-expanded="false" aria-controls="collapseStuSubLayout">
                                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                                Payment Approve
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseStuSubLayout" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a class="nav-link"  href="payment_sub.php">Student Sub</a>  
                                    <a class="nav-link"  href="school_payment.php">School Payment</a>   
                                </nav>
                            </div>
						  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseResetDataLayout" aria-expanded="false" aria-controls="collapseResetDataLayout">
                                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                               Reset Operations
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseResetDataLayout" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a class="nav-link"  href="password_reset.php">Password Reset</a>  
                                    <a class="nav-link"  href="payment_sub.php">Subscription</a>  
                                    <a class="nav-link"  href="Update_student_class_teacher.php">Update student class teacher</a>  
                                    <a class="nav-link"  href="lockschool.php">Lock School</a>  
                                   
                                </nav>
                            </div>
						  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBulkPayment" aria-expanded="false" aria-controls="collapseBulkPayment">
                                <div class="sb-nav-link-icon"><i class="fa fa-users"></i></div>
                              Bulk Payment
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseBulkPayment" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a class="nav-link"  href="bulk-payment.php?section=field-admins">Field Admins</a>  
                                    <a class="nav-link"  href="bulk-payment.php?section=head-teachers">Head Teachers</a>  
                                    <a class="nav-link"  href="bulk-payment.php?section=teachers">Teachers</a>  
                                    <a class="nav-link"  href="bulk-payment.php?section=schools">Schools</a>  
                                   
                                </nav>
                            </div>





                            <a style="color:<?php echo$text_code;?>" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCreateTicket" aria-expanded="false" aria-controls="collapseCreateTicket">
                                <div class="sb-nav-link-icon"><i style="color:<?php echo$text_code;?>" class="fa fa-tools"></i></div>
                                Ticket
                                <div class="sb-sidenav-collapse-arrow"><i style="color:<?php echo$text_code;?>" class="fas fa-angle-down"></i></div>
                            </a>
                            <div style="color:<?php echo$text_code;?>" class="collapse" id="collapseCreateTicket" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"> 
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="ticket_review.php">Backlog Ticket </a>   
                                    <a style="color:<?php echo$text_code;?>" class="nav-link"  href="ticket_closed.php">Closed Ticket </a>   
                                   
                                </nav>
                            </div>

 
							

 
							
							
 							

<!--
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Maintenance
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
							
							
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                               
							   </nav>
                            </div>
					
							
							
                            <div class="sb-sidenav-menu-heading">Setting</div> 
 
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Approve Maint 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
							
							
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Corrective Approval
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Approve </a>
                                            <a class="nav-link" href="register.html">Disapprove</a> 
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Preventive Approval
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">Approve</a>
                                            <a class="nav-link" href="404.html">Disapprove </a> 
                                        </nav>
                                    </div>
                               
							   </nav>
                            </div>
					
 -->	                      
                            <a class="nav-link" href="logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Logout
                            </a>
                        </div>
						
						
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                       <?php echo"$username"; ?>
                    </div>
                </nav>
      
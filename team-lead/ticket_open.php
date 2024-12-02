<?php
				include("index_header.php");
?>
<!DOCTYPE html>
<html lang="zxx">

<head> 
	 
		<?php
             include("../header.php"); 
		
			 
     

				$id = $_GET['ticket'];
				$result = $Loader->FetchTicketByID($_GET['ticket'],$marketer_code); 

				if(empty($result)){ 
					header("Location: ticket_review.php");
				}

				foreach($result as $row)
				{ 
                    $ticket_id     = $row['ticket_id']; 
				}

				 
		?> 	

 
  

 

		<title>
			<?php echo"$ticket_id "; ?>
		</title>		
	 
 

</head>
<script>
 function GoBackHandler(){
 history.go(-1)
 }	
</script>

<body class="sb-nav-fixed">
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
                   <h2>Ticket ID: <?php echo"$ticket_id "; ?></h2>
                        <h1 class="mt-4"> 
					          <i class="fas fa-briefcase"></i> 
						</h1>
                        <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item" onclick="GoBackHandler()"> Back</li>
                            <li class="breadcrumb-item active">Ticket</li>
                        </ol>
                  
 
 
<section class="w3l-mag-main">
          
            <div class="mag-content-inf py-5">
                <div class="container">
                    <div class="banner-bottom-sechny "  >
                       

                    <?php
                    				$result = $Loader->FetchTicketByID($_GET['ticket'],$marketer_code); 

                                    if(empty($result)){ 
                                        header("Location: ticket_review.php");
                                    }
                    
                                    foreach($result as $row)
                                    { 
                                        $id            = $row['id'];
                                        $ticket_id     = $row['ticket_id'];
                                        $email         = $row['email'];
                                        $school_code   = $row['school_code'];
                                        $sender_name   = $row['sender_name'];
                                        $status        = $row['status']; 
                                        $unit          = $row['unit']; 
                                        $unteam_lead   = $row['team_lead']; 
                                        $operator      = $row['operator']; 
                                        $subject       = $row['subject']; 
                                        $textarea      = $row['body'];
                                        $answered_date = $row['answered_date'];
                                        $created_date  = $row['created_date'];
                                        $rate          = $row['rate'];

                                      if($rate == 0 || $rate == ''){
                                        $rateStar = '';
                                      }else if($rate == 1){
                                        $rateStar = '<i style="color:yellow" class="fa fa-star"></i>';
                                      }else if($rate == 2){
                                        $rateStar = '<i style="color:yellow" class="fa fa-star"></i> <i style="color:yellow" class="fa fa-star"></i>';
                                      }else if($rate == 3){
                                        $rateStar = '<i style="color:yellow" class="fa fa-star"></i> <i style="color:yellow" class="fa fa-star"></i> <i style="color:yellow" class="fa fa-star"></i>';
                                      }else if($rate == 4){
                                        $rateStar = '<i style="color:yellow" class="fa fa-star"></i> <i style="color:yellow" class="fa fa-star"></i> <i style="color:yellow" class="fa fa-star"></i> <i style="color:yellow" class="fa fa-star"></i>'; 
                                      }else if($rate == 5){
                                        $rateStar = '<i style="color:yellow" class="fa fa-star"></i> <i style="color:yellow" class="fa fa-star"></i> <i style="color:yellow" class="fa fa-star"></i> <i style="color:yellow" class="fa fa-star"></i> <i style="color:yellow" class="fa fa-star"></i>';
                                      }


                                      if($row['unit'] == 'agent'){
                                        $UnitCall = "Customer Service Desk";
                                    }else if($row['unit'] == 'tech'){
                                      $UnitCall = "Technical Unit";
                                    }
                                echo'       
                                 <div class="container" style="background-color:white;margin-bottom:30px;border-left:5px solid #000">


                                      <div class="row" style="width:100%;padding:10px 0 10px 0;border-bottom:2px solid #f2f2f2;background-color:#000;color:#fff">
                                          <div class="col-md-8" style="text-align:left"> Sender Details: '.$sender_name.' | '.$school_code.'</div>
                                          <div class="col-md-4"  style="text-align:right">Date: '.$answered_date.'</div> 
                                      </div> <br/>

                                        <div class="row">
                                            <div class="col-md-4" style="text-align:left">Operator Name : '. $operator .'</div>
                                            <div class="col-md-4" style="text-align:center">Department : '. $UnitCall .'</div>
                                            <div class="col-md-4"  style="text-align:right">Team Unit : '.$unteam_lead .'</div>
                                        </div><br/><br/>

                                        <div style="text-align:left;overflow:hidden"> 
                                        <h2>"'.$subject.'"</h2> 
                                        </div><hr/><br/><br/>


                                        <div class="maghny-gd-1 col-md-12">


                                        <p style="font-size:16px;color:black"  >
                                        <textarea style="background-color:#fff; border:1px solid #fff;"   rows="15" cols="100" maxlength="1500" class="form-control" disabled>'.$textarea.'  </textarea>
                                        </p>




                                        </div>

                                     <span data-toggle="modal" data-target="#reply'.$id.'"  class="btn btn-primary">Reply Ticket</span> 
                                      <span  data-toggle="modal" data-target="#close'.$id.'" class="btn btn-dark">Close Ticket</span>
                                      <span  data-toggle="modal" data-target="#rate'.$id.'" class="btn btn-info">Escalate Ticket</span>  <span class="btn btn-white">Resolution Rated: '.$rateStar.'</span>
                                  </div>';



                            echo'
                                <div class="col-md-4 modal-grids  ">
                                      <div class="modal fade" id="reply'.$id.'" tabindex="-1" role="dialog" aria-labelledby="reply'.$id.'Label">

                                            <a href="#"  > <div class="btn btn-success" data-toggle="modal" data-target="#disapproveMaintenance">REPLY TICKET</div></a>

                                            <div class="modal-dialog" role="document">
                                                  <div class="modal-content">
                                                            <div class="modal-header">
                                                            Replying Officer: '.$fullname.'
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                            </div>

                                                              <div class="modal-body"> 
                                                                Replying To: '.$sender_name.'<hr/>
                                                              <h6>Ticket Subject: <br/>"'.$subject.'"</h6> 
                                                                  <div class="form-group">	
                                                                  <label>REPLY TICKET</label> 
                                                                  <textarea   name="replyData'.$id.'"  id="replyData'.$id.'" rows="10" cols="120" class="form-control" maxlength="1500" ></textarea> 
                                                                  </div> 
                                                              ';
                                                                  echo" <input type='button' class='btn btn-primary' onclick='getReplyData($id)' value='Submit'>";
                                                              echo'
                                                                  
                                                              </div>  
                                                  </div>


                                            </div> 
                                      </div> 
                                </div>  


                                
                            ';


                            echo'
                            <div class="col-md-4 modal-grids  ">
                                    <div class="modal fade" id="rate'.$id.'" tabindex="-1" role="dialog" aria-labelledby="rate'.$id.'Label">

                                      <a href="#"  > <div class="btn btn-success" data-toggle="modal" data-target="#disapproveMaintenance">OPERATOR RESOLUTION</div></a>

                                      <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                          <div class="modal-header">
                                                           Escalating Officer: '.$fullname.'
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                          </div>

                                                          <div class="modal-body"> 
                                                              <div class="form-group">	
                                                              <label>RESOLUTION UNIT</label> 
                                                              <select   name="unit'.$id.'"  id="unit'.$id.'" class="form-control "    >
                                                                  <option  value="0">Select Unit </option> 
                                                                  <option  value="tech">Technical Support </option>   
                                                              </select> 
                                                              </div> 
                                                            </div> 
                                                    ';
                                                        echo" <input type='button' class='btn btn-primary' onclick='getTestscore($id)' value='Escalate Ticket'>";
                                                    echo'
                                                
                                            </div>  
                                      </div> 
                                  </div> 
                            </div>
                            ';

                            echo'
                            <div class="col-md-4 modal-grids  ">
                                    <div class="modal fade" id="close'.$id.'" tabindex="-1" role="dialog" aria-labelledby="close'.$id.'Label">

                                      <a href="#"  > <div class="btn btn-success" data-toggle="modal" data-target="#disapproveMaintenance">CLOSE TICKET</div></a>

                                      <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                          <div class="modal-header">
                                                           Technical  Officer: '.$fullname.'
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                          </div>

                                                          <div class="modal-body"> 
                                                              <div class="form-group">	
                                                              <label>TICKET RESOLVED</label> 
                                                              <select   name="data'.$id.'"  id="data'.$id.'" class="form-control "    >
                                                                  <option  value="0">Select option </option> 
                                                                  <option  value="close">Ticket Resolved</option>   
                                                              </select> 
                                                              </div> 
                                                            </div> 
                                                    ';
                                                        echo" <input type='button' class='btn btn-primary' onclick='getCloseTicket($id)' value='Close Ticket'>";
                                                    echo'
                                                
                                            </div>  
                                      </div> 
                                  </div> 
                            </div>
                            ';



                                    }


                    ?>
                        
        

                    

        </div>
</section>
 
 

</main>
               
			   <footer class="py-4 bg-light mt-auto">
                   <?php 
				  // require("../footer.php"); 
				   ?>
                </footer>
				
				
            </div>
			
        </div>
    
    
 
 
 
 
</body>
</html>

<script>

 
function getTestscore(val) {

var	unit = document.getElementById("unit"+val).value;  


 console.log(unit); 
 console.log(val); 


  if(unit == 'tech')
  {
      
          $.ajax({
              url:"pageajax.php",
              method:"POST",
              dataType:"json",
              data:{ 
                unit:unit,   
                id:val,    
                page:'TicketEscalation',
                action:'TicketEscalation'
                }, 
              success:function(data)
              {
              
                  if(data.success == 'success'){
                    alert(data.feedback);
                    window.location.reload(); 
                  }
                  else
                  { 
                    alert(data.feedback); 
                  }
              }
            });	

    }
    else
    {
        alert('Unit selection field can not be empty');
    }


}

function getReplyData(val) {

    var	textData = document.getElementById("replyData"+val).value;  

 

    if(textData.length > 0)
    {
        
            $.ajax({
                url:"pageajax.php",
                method:"POST",
                dataType:"json",
                data:{
                  idData:val,     
                  textData:textData,  
                  page:'getReplyData',
                  action:'getReplyData'
                  },
                success:function(data)
                {
                    if(data.success){
                      window.location.reload();

                    }
                    else
                    {
                      
                      alert(data.feedback);
                      
                    }
                }
              });	

      }else{
          alert('Score field must not be empty');
    }
 

}


function getCloseTicket(val) {

var	data = document.getElementById("data"+val).value;  


//  console.log(data); 
//  console.log(val); 


  if(data == 'close')
  {
    
        $.ajax({
            url:"../pageajax.php",
            method:"POST",
            dataType:"json",
            data:{ 
              data:data,   
              id:val,    
              page:'TicketClosed',
              action:'TicketClosed'
              }, 
            success:function(data)
            {
            
                if(data.success == 'success'){
                  alert(data.feedback);
                  window.location.reload(); 
                }
                else
                { 
                  alert(data.feedback); 
                }
            }
          });	

  }
  else
  {
      alert('Unit selection field can not be empty');
  }


}

</script>

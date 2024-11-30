<!DOCTYPE html>
<html>
<head>
<title> TERMS & CONDITIONS</title>
            <meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width	initial-scale=1"/>	   
		    <link rel="stylesheet" type="text/css" href="home.css"/>
			<link rel="stylesheet" type="text/css" href="mobile.css"/>
			<link rel="shortcut icon" href="img/logo.png"/>		
			
<script type="text/javascript" src="javascripts/jquery.min.js"></script>
<script type="text/javascript" src="javascripts/custom.js"></script>
<script type="text/javascript" src="javascripts/myhome.js"></script>			
</head>			
<style type="text/css">
.foot1>a{color:white;}.foot2>a{color:white;}.foot3>a{color:white;}
.foot1{
float:left;color:white;margin-top:10px;
width:50%;text-align:left;
}
.foot2{
float:left;margin-top:10px;
width:50%;text-align:left;
}


@media only screen and (max-width:900px){
.tab_s_bloc1>a,.tab_s_bloc2>a{
background-color:;
margin-top:3px;position:absolute;margin-left:-50px;
}}
@media only screen and (max-width:600px){

.tab_s_bloc1>a,.tab_s_bloc2>a{
background-color:;
margin-top:5px;position:absolute;margin-left:-50px;
}}
@media only screen and (max-width:500px){

.tab_s_bloc1>a,.tab_s_bloc2>a{
background-color:;
margin-top:3px;position:absolute;margin-left:-50px;
}}
@media only screen and (max-width:450px){
.tab_s_bloc1>a,.tab_s_bloc2>a{
background-color:;
margin-top:-6px;position:absolute;margin-left:-50px;
}}
</style>


<body style="background-color:#eeeeee;"><a name="head"></a>
<div id="head_bar">

 


 <div class="webname_header">
<div class="webname"> 
  <a href="https://www.gse-mart.com/index.php" >
  <div class="webname1"><span lass="webname_mart2">GSe-Mart</span></div> </a>
  <div class="webname2">T&C </span></div>
 <br class="brake">
  </div>
	
	
<div class="searchform" id="searchform">	
<form  action="loadpost.php?mart=<?php echo"$mart";?>" method="GET">
<div class="form_wrap">
<div class="search_text">
<img src="img/img-search.png" class="img-search search_none" />
<img src="img/close.png" class="img-search none" height="30px" onclick="Dclose()" />
<input type="text" name="search" placeholder="&nbsp;Search: bags, shoes, cars, Tshirt" class="searchtext" id="searchtext"style="color:white;"  required="required" aria-required="true"/>
</div>

<div class="search_sub">
<input type="hidden" name="mart" value="<?php echo"$mart";?>"class="searchg"/>
<input type="submit" name=""class="searchsub autofont2" value="Search"  /><br>
</div>
</div>
</form>


</div>
	
 		        
<div class="tab_header autofont">


<div class="tab_head1" align="center"><a href="index_home.php?mart=<?php echo"$mart";?>"><span style="position:;margin-left:%;"><img src="img/back.png" /></span></a></div>
<div class="tab_head2" align="center"><a href="home.php?">Home</a></div>
<?php
if (!empty($_SESSION['username'])){
$sess_id=$_SESSION['username'];	
$photo ="SELECT * FROM `login-table` WHERE `username`='$sess_id'";
$query_photo = mysqli_query($homedb,$photo);
while ($row = mysqli_fetch_array($query_photo)){
	$sess_photo=$row['photo'];$sess_user=$row['username'];$sess_town=$row['town'];$sur_name=$row['surname']; $admin="admin.png";
	if($sess_photo != $admin){
		echo "<div class='tab_head3' align='center'><a href='new-login.php?mart=$mart' style='text-transform:lowercase;color:white;'><img src='reg_users/$sess_town/$sess_user/$sess_photo' style='margin-top:-5px;height:30px;width:30px;border-radius:500px;'/> <span style='position:absolute;margin-top:-1px;font-size:13px;'>&nbsp;$sur_name<br>Logout</span></a></div>";
 }else{
		echo "<div class='tab_head3' align='center'><a href='new-login.php?mart=$mart' style='text-transform:lowercase;color:white;'><img src='img/$admin' style='margin-top:-5px;height:30px;width:30px;border-radius:500px;'/> <span style='position:absolute;margin-top:-1px;font-size:13px;'>&nbsp;$sur_name<br>Logout</span></a></div>";
     }
		
	
}
   
 }else{		
         echo "<div class='tab_head2' align='center'><a href='new-login.php?mart=$mart'><span style='position:;margin-left:%;'>Login </span></a></div>";
          }
?>

<div class="tab_head4" align="center">
	<a href="register.php?new_reg=signup&mart=<?php echo"$mart";?>">
	Register
	</a>
</div>

<div class="tab_head5" align="center">
	<a href="get-a-job.php?mart=<?php echo"$mart";?>">
	 (<?php echo"$job_post";?>)Jobs at <?php echo"$mart"; ?>
	</a>
</div>

</div>



</div>
	


 
</div>

<div class="tab_s autofont">
<?php
include"nav-one.php";
 
 ?>


</div>

<center><br><br><br><br><br><br><br><br>
<div><img src="img/logo.png" height="70px" width="auto"/></div>

<article class="article" class="autofont2">

<h2 style="text-decoration:underline;color:blue;">TERMS & CONDITIONS</h2>
<br>

<div id="termcon2" >
<br><br>

   Welcome to the gse-mart.com website (the "Site"). These terms & conditions ("Terms and Conditions") apply to the Site, and all of its divisions, subsidiaries, and affiliate operated Internet sites which reference these Terms and Conditions.
This website is owned and operated by Graceshield Technologies  Nigeria Limited. For the purposes of this website, "seller", "we", "us" and "our" all refer gse-mart.com
The Site reserves the right, to change, modify, add, or remove portions of both the Terms and Conditions of Use and the Terms and Conditions of Sale at any time. Changes will be effective when posted on the Site with no other notice provided. Please check these Terms and Conditions regularly for updates. Your continued use of the Site following the posting of changes to these Terms and Conditions constitutes your acceptance of those changes.
Kindly review the Terms and Conditions listed below diligently prior to using this website as your use of the website indicates your agreement to be wholly bound by its Terms and Conditions without modification.
You agree that if you are unsure of the meaning of any part of these Terms and Conditions or have any questions regarding the Terms and Conditions, you will not hesitate to contact us for clarification. These Terms and Conditions fully govern the use of this website. No extrinsic evidence, whether oral or written, will be incorporated.
<br><br>



<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;"></div>
To create, develop and deploy cost-effective and reliable mobile and web applications 
that will support and improve efficiency of small & medium scale enterprises, as well as 
to enhance sales productivity and increase  market value by providing easy to use online 
store where vendor can do their business by uploading theirr product tag with price.<br>
vendor can tag their web address/url such as( https://www.gse-mart.com/register number)
on (Facebook, whatsapp, twitter) to get in touch with your social media customer and friends <br><br>
 </div><br><br>
 


   

 
  <div id="termcon2">
<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">REGISTRATION PROCESS</div>
Note: To have a smooth registration process, Loacate Register from the homepage and fill the form
carefully.</div><br><br>
   
   

   
<div id="termcon2">
<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">UNSUBCRIBE</div>
You can unsubscribe from GS e-Mart  at any time, All you need to do 
is to <a href="contact.php?mart=<?php $mart ?>"> contact us </a>, and when you unsubscribe you 
don't have access to your store or your Dashboard, more also we delete all
you have posted from GS e-Mart Database
</div><br><br>

<div id="termcon2">
<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">ILLEGAL TRANSCATION</div>
Once we are inform of  any illegal transaction on any vendor  store , such store 
will be temporary suspended of which proper investigation will follow  for confirmation ,
sequel the vendor store will be inactive  until all issue are resolved.<br><br>
 </div><br><br>
 
<div id="termcon2">
<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">REPORT A PROBLEM</div>
This is imperative to all visitor,buyer, vendors,  quickly report any changes on your account
 once you noticed your store has been hacked or any strange occurrence 
 on your store so that we can block all activities on such store. 
</div><br><br>

<div id="termcon2">
<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">INAPPROPRIATE CONTENT</div>
we will not accept any inappropriate content such as nude photo , video uploading on any vendor store .
if such is found such store will be blocked and delete from our website. 
</div><br><br>
  
  
<div id="termcon2">
<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">UNABLE TO LOGIN</div>
Before any registration process you must take note on your
 SECURITY QUESTION and ANSWER to your security question you
 can only regain your account back by providing correct answers 
 to our security question.<br><br>

 



<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Terms and Conditions of Use</div><br>

Use of the Site
You confirm that you are at least 18 years of age or are accessing the Site under the supervision of a parent or legal guardian.
Both parties agree that this website may only be used in accordance with these Terms and Conditions of Use. If you do not agree with the Terms and Conditions of Use or do not wish to be bound by them, you agree to refrain from using this website.
We grant you a non-transferable, revocable and non-exclusive license to use this Site, in accordance with the Terms and Conditions of Use, for such things as: shopping for personal items sold on the site, gathering prior information regarding our products and services and making purchases. Commercial use or use on behalf of any third party is prohibited, except as explicitly permitted by us in advance. These Terms and Conditions of Use specifically prohibit actions such as: accessing our servers or internal computer systems, interfering in any way with the functionality of this website, gathering or altering any underlying software code, infringing any intellectual property rights. This list is non-exhaustive and similar actions are also strictly prohibited.
Any breach of these Terms and Conditions of Use shall result in the immediate revocation of the license granted in this paragraph without prior notice to you. Should we determine at our sole discretion that you are in breach of any of these conditions, we reserve the right to deny you access to this website and its contents and do so without prejudice to any available remedies at law or otherwise.
Certain services and related features that may be made available on the Site may require registration or subscription. Should you choose to register or subscribe for any such services or related features, you agree to provide accurate and current information about yourself, and to promptly update such information if there are any changes. Every user of the Site is solely responsible for keeping passwords and other account identifiers safe and secure.
The account owner is entirely responsible for all activities that occur under such password or account. Furthermore, you must notify us of any unauthorized use of your password or account. The Site shall not be responsible or liable, directly or indirectly, in any way for any loss or damage of any kind incurred as a result of, or in connection with, your failure to comply with this section.
During the registration process you agree to receive promotional emails from the Site. You can subsequently opt out of receiving such promotional e-mails by clicking on the link at the bottom of any promotional email.
<br><br>

<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">User Submissions</div><br>

Anything that you submit to the Site and/or provide to us, including but not limited to, questions, reviews, comments, and suggestions (collectively, "Submissions") will become our sole and exclusive property and shall not be returned to you.
In addition to the rights applicable to any Submission, when you post comments or reviews to the Site, you also grant us the right to use the name that you submit, in connection with such review, comment, or other content.
You shall not use a false e-mail address, pretend to be someone other than yourself or otherwise mislead us or third parties as to the origin of any Submissions. We may, but shall not be obligated to, remove or edit any Submissions.
By completing an order or signing up, you agree to receive a) emails associated with finalizing your order, which may contain relevant offers from third parties, and b) emails asking you to review GSe-Mart and your purchase and c) promotional emails, SMS and push notifications from GSe-Mart. You may unsubscribe from promotional emails via a link provided in each email. If you would like us to remove your personal information from our database, unsubscribe from emails and/or SMS, please email Customer Service email address by country.
<br><br>

<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Information Available on Website</div><br>
You accept that the information contained in this website is provided ìas is, where isî, is intended for information purposes only and that it is subject to change without notice. Although we take reasonable steps to ensure the accuracy of information and we believe the information to be reliable when posted, it should not be relied upon and it does not in any way constitute either a representation or a warranty or a guarantee.
Product representations expressed on this Site are those of the vendor and are not made by us. Submissions or opinions expressed on this Site are those of the individual posting such content and may not reflect our opinions.
We make no representations as to the merchantability of any products listed on our website, and we hereby disclaim all warranties, whether express or implied, as to the merchantability and/or fitness of the products listed on our website for any particular purpose. We shall not be held responsible or made liable for any damages or injury which may arise as a result of any error, omission, interruption, deletion, delay in operation or transmission, computer virus, communication failure and defect in the information, content, materials, software or other services included on or otherwise made available through our Website. We understand that certain state laws do not allow limitations on implied warranties or limitation of certain damages, these disclaimers may therefore not apply where these laws are applicable.
<br><br>

<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Accessibility of Website</div><br>
Our aim is to ensure accessibility to the website at all times, however we make no representation of that nature and reserves the right to terminate the website at any time and without notice. You accept that service interruption may occur in order to allow for website improvements, scheduled maintenance or may also be due to outside factors beyond our control.
<br><br>

<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Links and Thirds Party Websites</div><br>
We may include links to third party websites at any time. However, the existence of a link to another website should not be consider as an affiliation or a partnership with a third party or viewed as an endorsement of a particular website unless explicitly stated otherwise.
In the event the user follows a link to another website, he or she does so at his or her own risk. We accept no responsibility for any content, including, but not limited to, information, products and services, available on third party websites.
Creating a link to this website is strictly forbidden without our prior written consent. Furthermore, we reserve the right to revoke our consent without notice or justification.
<br><br>


<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Intellectual Property</div><br>
Both parties agree that all intellectual property rights and database rights, whether registered or unregistered, in the Site, information content on the Site and all the website design, including, but not limited to, text, graphics, software, photos, video, music, sound, and their selection and arrangement, and all software compilations, underlying source code and software shall remain at all times vested in us or our licensors. Use of such material will only be permitted as expressly authorized by us or our licensors.
Any unauthorised use of the material and content of this website is strictly prohibited and you agree not to, or facilitate any third party to, copy, reproduce, transmit, publish, display, distribute, commercially exploit or create derivative works of such material and content.
<br><br>

<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Data Protection</div><br>

Any personal information collected in relation to the use of this website will be held and used in accordant with our Privacy Policy, which is available on our Site. GSe-Mart stores the address and might use it for commercial purposes
<br><br>

<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Indemnity</div></br>
You agree to indemnify and hold us, our affiliates, officers, directors, agents and/or employees, as the case may be, free from any claim or demand, including reasonable legal fees, related to your breach of these Terms of Use and User Agreement.
<br><br>


<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Applicable Law and Jurisdiction</div><br>
These Terms and Conditions of Use shall be interpreted and governed by the laws in force in the Federal Republic of Nigeria. Subject to the Arbitration section below, each party hereby agrees to submit to the jurisdiction of the courts of Nigeria and to waive any objections based upon venue.
<br><br>

<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Arbitration</div><br>
Any controversy, claim or dispute arising out of or relating to these Terms and Conditions of Use will be referred to and finally settled by private and confidential binding arbitration before a single arbitrator held in Nigeria in English and governed by Nigeria law pursuant to the Arbitration and Conciliation Act Cap A18 Laws of the Federation of Nigeria 2004, as amended, replaced or re-enacted from time to time.
The arbitrator shall be a person who is legally trained and who has experience in the information technology field in Nigeria and is independent of either party. Notwithstanding the foregoing, the Site reserves the right to pursue the protection of intellectual property rights and confidential information through injunctive or other equitable relief through the courts.
<br><br>

<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Termination</div><br>
In addition to any other legal or equitable remedies, we may, without prior notice to you, immediately terminate the Terms and Conditions of Use or revoke any or all of your rights granted under the Terms and Conditions of Use.
Upon any termination of this Agreement, you shall immediately cease all access to and use of the Site and we shall, in addition to any other legal or equitable remedies, immediately revoke all password(s) and account identification issued to you and deny your access to and use of this Site in whole or in part. Any termination of this agreement shall not affect the respective rights and obligations (including without limitation, payment obligations) of the parties arising before the date of termination. You furthermore agree that the Site shall not be liable to you or to any other person as a result of any such suspension or termination.
If you are dissatisfied with the Site or with any terms, conditions, rules, policies, guidelines, or practices of E-Cart Internet Services Nigeria Limited in operating the Site, your sole and exclusive remedy is to discontinue using the Site.
<br><br>


<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Severability</div><br>
If any portion of these terms or conditions is held by any court or tribunal to be invalid or unenforceable, either in whole or in part, then that part shall be severed from these Terms and Conditions of Use and shall not affect the validity or enforceability of any other section listed in this document.
<br><br>

<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Miscellanuous Provisions</div></br>
You agree that all agreements, notices, disclosures and other communications that we provide to you electronically satisfy any legal requirement that such communications be in writing.
Assigning or sub-contracting any of your rights or obligations under these Terms and Conditions of Use to any third party is prohibited unless agreed upon in writing by the seller.
We reserve the right to transfer, assign or sub-contract the benefit of the whole or part of any rights or obligations under these Terms and Conditions of Use to any third party.
<br><br>

 

<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">General</div><br>
You confirm that you are at least 18 years of age or are accessing the Site under the supervision of a parent or legal guardian. You agree that if you are unsure of the meaning of any part of the Terms and Conditions of Sale, you will not hesitate to contact us for clarification prior to making a purchase.
These Terms and Conditions of Sale fully govern the sale of goods and services purchased on this Site. No extrinsic evidence, whether oral or written, will be incorporated.
<br><br>

<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Formation of Contract</div><br>

Both parties agree that browsing the website and gathering information regarding the services provided by the seller does not constitute an offer to sell, but merely an invitation to treat. The parties accept that an offer is only made once you have selected the item you intend to purchase, chosen your preferred payment method, proceeded to the checkout and completed the checkout process.
Both parties agree that the acceptance of the offer is not made when the seller contacts you by phone or by email to confirm that the order has been placed online. Your offer is only accepted when we dispatch the product to you and inform you either by email or by phone of the dispatch of your ordered product. Before your order is confirmed, you may be asked to provide additional verifications or information, including but not limited to phone number and address, before we accept the order.
Please note that there are cases when an order cannot be processed for various reasons. The Site reserves the right to refuse or cancel any order for any reason at any given time.
<br><br>


<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Acceptance of Electronic Documents</div><br>
You agree that all agreements, notices, disclosures and other communications that we provide to you electronically satisfy any legal requirement that such communications be in writing.
<br><br>


<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Payment and Pricing</div><br>
All Payment and Pricing are  provided by vendors owning a store,  however, errors may still occur, such as cases when the price of an item is not displayed correctly on the vendor store. As such, vendors reserve the right to refuse or cancel any order. In the event that an item is mispriced,our vendor may, at his own discretion, either contact you for instructions or cancel your order and notify you of such cancellation.
vendor shall have the right to refuse or cancel any such orders whether or not the order has been confirmed and your credit/debit card charged. In the event that vendor are unable to provide the services, vendor will inform you of this as soon as possible. buyer are to  paid for the products on delivery day.
Feel free to ask vendor on  payments methods on delivery day.
<br><br>

 
<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Liability of Parties on the GSe-Mart Marketplace</div><br>
We operate a virtual mart which is open for buyer and vendor to sell their products on our website. None of the products listed on the GSe-Mart Marketplace are owned or sold by us, neither are we involved in the actual sale transaction between the buyers and sellers on the GSe-Mart Marketplace.
The buyer and seller agree that we would be held free from any liability in contract, pre-contract or other representations in tort, for all transactions conducted on the GSe-Mart Marketplace.
<br><br>


<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Delivery</div><br>
This Site is only for delivery of products to customers within Nigeria. We make every effort to deliver goods within the estimated timescales set out on our Site; however delays are occasionally inevitable due to unforeseen factors. We shall be under no liability for any delay or failure to deliver the products within the estimated timescales where they did not occur due to our fault or negligence.
You agree not to hold the seller liable for any delay or failure to deliver products or otherwise perform any obligation as specified in these Terms and Conditions of Sale if the same is wholly or partly caused whether directly or indirectly by circumstances beyond our reasonable control.
<br><br>


<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Return Policy</div><br>
Our Return Policy is as contained in the document titled ìReturn Policyî on our Site. Check it here.
<br><br>


<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Indemnity</div><br>

You agree to indemnify us, our affiliates, officers, directors, agents and/or employees, as the case may be, free from any claim or demand, including reasonable legal fees, related to your breach of these Terms and Conditions of Sale.
<br><br>


<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Applicable Law and Jurisdiction</div><br>
These Terms and Conditions of Sale shall be interpreted and governed by the laws in force in the Federal Republic of Nigeria. Subject to the Arbitration section below, each party hereby agrees to submit to the jurisdiction of the courts of Nigeria and to waive any objections based upon venue.
<br><br>

<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Arbitration</div><br>
Any controversy, claim or dispute arising out of or relating to these Terms and Conditions of Sale will be referred to and finally settled by private and confidential binding arbitration before a single arbitrator held in Nigeria in English and governed by Nigeria law pursuant to the Arbitration and Conciliation Act Cap A18 Laws of the Federation of Nigeria 2004, as amended, replaced or re-enacted from time to time.
The arbitrator shall be a person who is legally trained and who has experience in the information technology field in Nigeria and is independent of either party. Notwithstanding the foregoing, the Site reserves the right to pursue the protection of intellectual property rights and confidential information through injunctive or other equitable relief through the courts.
<br><br>


<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Severability</div><br>
If any portion of these Terms or Conditions of Sale is held by any court or tribunal to be invalid or unenforceable, either in whole or in part, then that part shall be severed from these Terms and Conditions of Sale and shall not affect the validity or enforceability of any other section listed in this document.
<br><br>


<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Miscellaneous Provisions</div><br>
You agree that all agreements, notices, disclosures and other communications that we provide to you electronically satisfy any legal requirement that such communications be in writing.
Assigning or sub-contracting any of your rights or obligations under these Terms and Conditions of Sale to any third party is prohibited unless agreed upon in writing by the seller.
We reserve the right to transfer, assign or sub-contract the benefit of the whole or part of any rights or obligations under these Terms and Conditions of Sale to any third party.
<br><br>


<div style="color:white;background-color:#E00918;width:100%;margin-top:0px;">Notice of Copyright Infringement</div><br>
If you have any complaints with respect to the infringement of your copyright, kindly write to the following address: GSe-Mart Nigeria, 343  Agege moto road, Mushin, Lagos.
Who? Where?
Where you believe that your intellectual property has been infringed upon on our website, please notify us by email it to (insert physical address and email address for copyright complaints). We expeditiously respond to all concerns regarding copyright infringements.
We request that you provide the following information along with your complaint:
<br><br>
    A physical or electronic signature of the person authorized to act on behalf of the owner of the copyrighted work for the purposes of the complaint.<br>
    A proper description of the copyrighted work claimed to have been infringed.<br>
    A description of the location of the infringing material on our Website.<br>
    The address, telephone number or e-mail address of the complaining party.<br>
    A statement made by the complaining party that he has a good-faith belief that use of the material in the manner complained of is not authorized by the copyright owner, its agent or by law.<br>
    A statement deposed to under oath, that the information in the notice of copyright infringement is accurate, and that the complaining party is authorized to act on behalf of the copyright owner. Please note that this procedure is exclusively for notifying GSe-Mart that your copyrighted material has been infringed.<br>



 </div><br><br>
 
 



  

 

 
 
</article>


</center>
 


  <script type="text/javascript"> 

var btnclose = document.getElementById('btnclose');
var modalkazeem = document.getElementById('modalkazeem');

btnclose.onclick = function(){
modalkazeem.style.display = "none";
}

  </script>
<!--==========================BOTTOM ADVERT POSITION ENDS==========================-->
</div>

<footer>

<?php

include'footer-link.html'; 

?>


</footer>

</body>
</html>


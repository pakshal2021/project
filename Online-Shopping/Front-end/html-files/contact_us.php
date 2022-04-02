<?php
include "../comman/header.php";
//include "../../comman/side.php";
?>
<div id="contact-page" class="container">
<div class="row">  	
	<div class="col-sm-8">
		<div class="contact-form">
			<h2 class="title text-center">Get In Touch</h2>
			<div class="status alert alert-success" style="display: none"></div>
	    	<form id="main-contact-form" action="../php-files/contact_us.php" class="contact-form row" name="contact-form" method="post">
	            <div class="form-group col-md-6">
	                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
	            </div>
	            <div class="form-group col-md-6">
	                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
	            </div>
	            <div class="form-group col-md-12">
	                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
	            </div>
	            <div class="form-group col-md-12">
	                <textarea  name="comments" required="required" class="form-control-textarea" placeholder="Your Message Here"></textarea>

	            </div>                        
	            <div class="form-group col-md-12">
	                <input type="submit" name="save" class="btn btn-primary pull-right" value="Submit">
	            </div>
	        </form></div></div>
	
	<div class="col-sm-4">
		<div class="contact-info">
			<h2 class="title text-center">Contact Info</h2>
			<address>
				<p>Electrical Appliences Inc.</p>
				<p>107,1st Floor,Ellisbridge Shopping center,opp Town Hall,Ahmedabad </p>
				<p>Gujarat,India</p>
				<p></p>
				<p>Email: Electricalappliences@gmail.com</p>
			</address>
			<!-- <div class="social-networks">
				<h2 class="title text-center">Social Networking</h2>
				<ul>
					<li>
						<a href="#"><i class="fa fa-facebook"></i></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-twitter"></i></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-google-plus"></i></a>
					</li>
					<li>
						<a href="#"><i class="fa fa-youtube"></i></a>
					</li>
				</ul>
			</div> -->
		</div>
	</div>    			
</div>  
</div>	
	    	        <!-- <div class="container">
					        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d238133.15238545823!2d72.6822073088345!3d21.15914249972254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e59411d1563%3A0xfe4558290938b042!2sSurat%2C+Gujarat!5e0!3m2!1sen!2sin!4v1547229610637" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		    		</div> -->

<?php
include "../comman/footer.php";

?>
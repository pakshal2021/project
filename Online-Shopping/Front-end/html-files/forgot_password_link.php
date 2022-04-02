<?php 
include "../comman/header.php";
?>
	<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Forgot your password?
						  Enter your email address and we will send you instructions on how to reset your password.
						</h2>
						<form action="../php-files/send-mail/mail.php" name="login" method="post">
							<div class="form-group">
								<div class="form-label-group">
									<input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
								</div>
								<button type="submit" name="save" class="btn btn-default">Reset password</button>
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
    	 <br/>
    	 <br/>

	<?php 
include "../comman/footer.php";

?>
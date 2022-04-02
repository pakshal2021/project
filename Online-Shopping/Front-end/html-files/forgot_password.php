<?php 
include "../comman/header.php";
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
?>
	<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Reset your password</h2>
						<form action="../php-files/forgot_password.php?email=<?php echo $email?>" name="login" method="post">
							<div class="form-group">
								<div class="form-label-group">
					                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required" autofocus="autofocus">
					                <label for="inputPassword">Password</label>
					              </div>
					              <div class="form-label-group">
					                <input type="password" id="inputPassword" name="confirm_password" class="form-control" placeholder="Confirm Password" required="required">
					                <label for="inputPassword">Confirm Password</label>
					              </div>
								<button type="submit" name="save" class="btn btn-default">Update</button>
							</div>	
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php 
include "../comman/footer.php";

?>
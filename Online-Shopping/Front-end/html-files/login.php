<?php 
include "../comman/header.php";

?>

<div id="contact-page" class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="../php-files/login.php" name="login" method="post">
							            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                <label for="inputEmail">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
			   <button type="submit" name="save" class="btn btn-default pull-right">Login</button><br>
			   <a href="forgot_password_link.php"><b>Forgot Password?</b></a>
				<!-- <div class="form-label-group">
		           <a href="forgot_password_link.html" style="background: #FE980F">Forgot Password?</a>
		          </div> -->
						</form>
					</div><!--/login form-->

				</div>
			</div>
		</div>
</div>
<br/>
<br/>
	<?php 
include "../comman/footer.php";

?>
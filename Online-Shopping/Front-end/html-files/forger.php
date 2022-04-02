<?php
include "../comman/header.php";
//include "../../comman/side.php";
?>

	<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Reset Password</h2>
						<form action="../php-files/forget.php" name="login" method="post">
							            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputEmail" name="password" class="form-control" placeholder="Password" required="required" autofocus="autofocus">
                <label for="inputEmail">Password</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="confirm_password" class="form-control" placeholder="confim Password" required="required">
                <label for="inputPassword"> Confaim Password</label>
              </div>
							<button type="submit" name="save" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	

<?php
include "../comman/footer.php";

?>
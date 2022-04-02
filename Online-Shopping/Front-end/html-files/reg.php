<?php
include "../comman/header.php";
?>
		<div class="container">
			<div class="row">
            <div class="form-group">
				<div class="col-sm-8">
					<div class="signup-form"><!--sign up form-->


 					<form name="reg" action="../php-files/register.php" method="post">
						<h2>New User Signup!</h2>
							<input type="text"  name="first_name"  placeholder="First Name" required="required"/>
							<input type="text"  name="last_name"  placeholder="Last Name" required="required"/>
							<input type="text" name="mobile" placeholder="Mobile Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' pattern="[1-9]{1}[0-9]{9}"/>				
							  <p>Gender<?php  echo str_repeat('&nbsp;', 9); ?>
							    <input type="radio" id="test1" name="gender" value="male" required>
							    <label for="test1">Male</label>
							 
							    <input type="radio" id="test2" name="gender" value="female" required>
							    <label for="test2">Female</label>
							  </p>
							<input type="email" name="email" placeholder="Email Address"/>
                    <input type="password" id="inputPassword"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
    				class="form-control" name="password" placeholder="Password" required="required">

     				<input type="password" id="confirmPassword" onxlick="isformvalid();" class="form-control" name="confirm_password" placeholder="Confirm password" required="required">                 
							
            				<button class="btn btn-default pull-right" type="submit" name="save">Register Now</button>
          
							</form>
					</div><!--/sign up form-->
				</div>
			</div>
	
			</div>
		</div>
	<br/>
	<br/>

<script language="javascript">
 function isformvalid()
 {
    var password = document.getElementById("password");
    var confirmPassword = document.getElementById("confirmPassword"); 
    var msg = "";
    
    if(password.value != confirmPassword.value){
      msg +="\n password not match";
    }
    
    if(msg != ""){
      alert(msg)
      return false;
    }
    return true;
  }
    
</script>

<?php
include "../comman/footer.php";

?>
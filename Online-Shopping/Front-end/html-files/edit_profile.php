<?php

include '../php-files/connection.php';
include "../comman/header.php";

/*echo '<pre>';
print_r($_SESSION);*/
?>
		<div class="container">
			<div class="row">
            <div class="form-group">
				<div class="col-sm-8">
					<div class="signup-form"><!--sign up form-->

          <?php 
              if (!$currentUserId && isset($_SESSION['user_id']) && $_SESSION['user_id']) {
                 $currentUserId = $_SESSION['user_id'];
              }
              $qry = $conn->query("SELECT * FROM customer WHERE user_id = '{$currentUserId}'");
              $_row = $qry->fetch_assoc();
             /* echo '<pre>';
              print_r($_row);
              die;*/
          ?>
 					<form name="reg" action="../php-files/profile.php" method="post">
						<h2><a class="cart_quantity_up" href="product_list.php"> <strong>Back </strong></a> | Edit profile</h2>
							<input type="text"  name="first_name" required="required" placeholder="First Name" value="<?php echo $_row['first_name']?>"/>
							<input type="text"  name="last_name"  placeholder="Last Name" value="<?php echo $_row['last_name']?>" required="required"/>
							<input type="text" name="mobile" placeholder="Mobile Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required="required" pattern="[1-9]{1}[0-9]{9}" value="<?php echo $_row['mobile']?>">
						  
             
              <p>Gender<?php  echo str_repeat('&nbsp;', 9); ?>
                  <input type="radio" id="test1" name="gender" value="male" required <?php echo ($_row['gender'] == 'male')? 'checked="checked"': ''?>>
                  <label for="test1">Male</label>
               
                  <input type="radio" id="test2" name="gender" value="female" required <?php echo ($_row['gender'] == 'female')? 'checked="checked"': ''?>>
                  <label for="test2">Female</label>
                </p>
               
							<input type="email" name="email" required="required"placeholder="Email Address" value="<?php echo $_row['email']?>"/>
             <!--  <input type="password" id="inputPassword"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
    class="form-control" name="password" placeholder="Password" required="required">
     <input type="password" id="confirmPassword" onxlick="isformvalid();" class="form-control" name="confirm_password" placeholder="Confirm password" required="required"> -->
               <button class="btn btn-default pull-right" type="submit" name="save">Update</button>
							</form>
					</div><!--/sign up form-->
				</div>
			</div>
	
			</div>
		</div>
	
<br/>
<br/>
<!-- <script language="javascript">
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
    
</script> -->

<?php
include "../comman/footer.php";

?>
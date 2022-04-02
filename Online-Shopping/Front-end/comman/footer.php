
<?php
include '../php-files/connection.php';
  $isLogged = (isset($_SESSION['is_customer_logged_id']) && $_SESSION['is_customer_logged_id']) ? true : false;
?>
<footer id="footer"><!--Footer</-->
    <div class="footer-top">
      
    <div class="footer-widget">
      <div class="container">
        <div class="row">
          <div class="col-sm-2">
            <div class="single-widget">
              <h2>Service</h2>
              <ul class="nav nav-pills nav-stacked">
                <li><a href="../html-files/contact_us.php"><i class="fa fa-user"></i> Contact Us</a></li>               
                <?php if(!$isLogged):?>
                  <li><a href="../html-files/reg.php">Signup</a></li>
                  <li><a href="../html-files/login.php">Login</a></li>
                <?php else:?>
                  <li><a href="../html-files/edit_profile.php"><i class="fa fa-user"></i>Edit profile</a></li>
                  <li><a href="../php-files/my_orders.php"><i class="fa fas fa-th"></i>My Orders</a></li>
                <?php endif;?>
              </ul>
            </div>
          </div>
          <div class="col-sm-2">
            <div class="single-widget">
              <h2><!-- Quock Shop --></h2>
              <!-- <ul class="nav nav-pills nav-stacked">
                <li><a href="#">T-Shirt</a></li>
                <li><a href="#">Mens</a></li>
                <li><a href="#">Womens</a></li>
                <li><a href="#">Gift Cards</a></li>
                <li><a href="#">Shoes</a></li>
              </ul> -->
            </div>
          </div>
          <div class="col-sm-2">
            <div class="single-widget">
              <h2><!-- Policies --></h2>
              <!-- <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Terms of Use</a></li>
                <li><a href="#">Privecy Policy</a></li>
                <li><a href="#">Refund Policy</a></li>
                <li><a href="#">Billing System</a></li>
                <li><a href="#">Ticket System</a></li>
              </ul> -->
            </div>
          </div>
          <div class="col-sm-3 col-sm-offset-1">
            <div class="single-widget">
              <h2>About Shopper</h2>
              <form action="#" class="searchform">
                <input type="text" placeholder="Your email address" />
                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                <p>Get the most recent updates from <br />our site and be updated your self...</p>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </div>
    
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <p class="pull-left">Copyright © 2019 Electrical Appliences Inc. All rights reserved.</p>         
        </div>
      </div>
    </div>
    
  </footer><!--/Footer-->
  

  
    <script src="../assets/js/jquery.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/jquery.scrollUp.min.js"></script>
   <script src="../assets/js/price-range.js"></script>
   <script src="../assets/js/jquery.prettyPhoto.js"></script>
    <script src="../assets/js/main.js"></script>
</body>
</html>

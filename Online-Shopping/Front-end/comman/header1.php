<!DOCTYPE html>
<?php
include 'php-files/connection.php';

  $isLogged = (isset($_SESSION['is_customer_logged_id']) && $_SESSION['is_customer_logged_id']) ? true : false;
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="armash" >
    <title>Home | Online Shopping</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/css/price-range.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
  <link href="assets/css/responsive.css" rel="stylesheet">
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
  <header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="contactinfo">
              <ul class="nav nav-pills">
                <li><a href="#"><i class="fa fa-envelope"></i> onlineshopping@gmail.com</a></li>
              </ul>
            </div>
          </div>
         <!--  <div class="col-sm-6">
            <div class="social-icons pull-right">
              <ul class="nav navbar-nav">
      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
          </div> -->
        </div>
      </div>
    </div><!--/header_top-->
    
    <div class="header-middle"><!--header-middle-->
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="logo pull-left">
              <a href="index.php"><img src="images/home/logo.png" alt="" /></a>
            </div>
            
          </div>
          <div class="col-sm-8">
            <div class="shop-menu pull-right">
              <ul class="nav navbar-nav">
                  <li><a href="php-files/cart.php"><i class="fa "></i> My Cart</a></li>                 
                <?php if(!$isLogged):?>
                  <li><a href="html-files/reg.php"><i class="fa fa-user"></i> Signup</a></li>
                  <li><a href="html-files/login.php"><i class="fa fa-lock"></i> Login</a></li>
                <?php else:?>
                  <li><a href="html-files/edit_profile.php"><i class="fa fa-user"></i>Edit profile</a></li>
                  <li><a href="php-files/my_orders.php"><i class="fa fas fa-th"></i>My Orders</a></li>
                  <li><a href="php-files/logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                <?php endif;?>
              </ul>              
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-middle-->
  
    <div class="header-bottom"><!--header-bottom-->
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="mainmenu pull-left">
              <ul class="nav navbar-nav collapse navbar-collapse">
                <li><a href="php-files/home.php" class="active">Home</a></li>
                <?php    
                        $categoryData = array();          
                        $qry = $conn->query("SELECT * FROM category");
                        while ($row = mysqli_fetch_assoc($qry))
                        {
                          $categoryData[] = $row;
                        }

                        /*echo '<pre>';
                        print_r($categoryData);
                        echo '</pre>';*/

                    ?>    
                <?php foreach ($categoryData as $_category):?>            
                  <li class="dropdown"><a href="#"><?php echo $_category['category']?><i class="fa fa-angle-down"></i></a>
                      <ul role="menu" class="sub-menu">
                        <?php 
                          $subCategoryData = array();  
                          $categoryId = $_category['category_id'];  

                                  $qry = $conn->query("SELECT * FROM sub_category where category_id = {$categoryId}");
                                  while ($row = mysqli_fetch_assoc($qry))
                                  {
                                    $subCategoryData[] = $row;
                                  }

                                 /* echo '<pre>';
                                  print_r($subCategoryData);
                                  echo '</pre>';*/

                              ?>
                              <?php foreach ($subCategoryData as $_subCategory): $subCatId = $_subCategory['sub_category_id'];?>
                                <li><a href="php-files/product_list.php?subcat_id=<?php echo $subCatId?>"><?php echo $_subCategory['sub_category']?></a></li>
                              <?php endforeach;?>
                      </ul>
                  </li> 
                <?php endforeach;?>

                <!-- <li class="dropdown">
                    <a href="#">Blog<i class="fa fa-angle-down"></i></a>
                    <ul role="menu" class="sub-menu">
                      <li><a href="blog.html">Blog List</a></li>
                      <li><a href="blog-single.html">Blog Single</a></li>
                    </ul>
                  </li> -->
                <li> 
                  <a href="html-files/contact_us.php">Contact</a></li>
              <!-- <li><a href="html-files/about_us.php">About us</a></li> -->
              <!-- <li><a href="html-files/forger.php">Forget</a></li> -->
              <?php if($isLogged):?>
                <li><a href="html-files/feedback.php">Feedback</a></li>
            <?php endif;?>
              </ul>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="search_box pull-right">
                  <form action="php-files/product_list.php" method="post">
                    <input type="text" placeholder="Search Product Name" name="product_name"/>
                  </form>              
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-bottom-->
  </header><!--/header-->

  
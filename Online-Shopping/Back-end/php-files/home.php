<!DOCTYPE html>
<?php  include 'connection.php'; ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Shopping</title>

    <!-- Bootstrap core CSS-->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">    
    <?php include "../comman/header.php"; 
    ?>
    <div id="wrapper">

      <!-- Sidebar -->      
      <?php include "../comman/side.php"; ?>
      <div id="content-wrapper">

        <div class="container-fluid">

       <?php              
            $qry = $conn->query("SELECT count(*) AS user_count FROM admin_user");
            $adminUsers = $qry->fetch_assoc();

            $qry = $conn->query("SELECT count(*) AS user_count FROM tbl_contectus");
            $contectus = $qry->fetch_assoc();

            $qry = $conn->query("SELECT count(*) AS user_count FROM tbl_feedback");
            $feedback = $qry->fetch_assoc();
            
            $qry = $conn->query("SELECT count(*) AS user_count FROM category");
            $category = $qry->fetch_assoc();

            $qry = $conn->query("SELECT count(*) AS user_count FROM sub_category");
            $sub_category = $qry->fetch_assoc();

            $qry = $conn->query("SELECT count(*) AS user_count FROM product_detail");
            $productDetail = $qry->fetch_assoc();

            $qry = $conn->query("SELECT count(*) AS user_count FROM customer");
            $customer = $qry->fetch_assoc();

            $qry = $conn->query("SELECT count(*) AS user_count FROM order_detail");
            $orderDetail = $qry->fetch_assoc();
            
          ?>
           <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-table"></i>
                  </div>
                  <div class="mr-5"><?php echo $adminUsers['user_count'].' Admin Users'?></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="list_admin_user.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div> 
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fal  fa-sitemap  "></i>
                  </div>
                  <div class="mr-5"><?php echo $category['user_count'].' Category'?></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="list_category.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
             <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-grip-horizontal"></i>
                  </div>
                  <div class="mr-5"><?php echo $sub_category['user_count'].' Sub Category'?></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="list_sub_category.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-air-freshener"></i>
                  </div>
                  <div class="mr-5"><?php echo $productDetail['user_count'].' Products'?></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="list_product.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>  
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fas fa-chalkboard-teacher"></i>
                  </div>
                  <div class="mr-5"><?php echo $contectus['user_count'].' Contact us'?></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="list_contactus.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5"><?php echo $feedback['user_count'].' Feedback'?></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="list_feedback.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>   
             <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas   fa-users"></i>
                  </div>
                  <div class="mr-5"><?php echo $customer['user_count'].' Customers'?></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="list_customer.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>     
             <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-address-card"></i>
                  </div>
                  <div class="mr-5"><?php echo $orderDetail['user_count'].' Orders'?></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="list_order.php">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>            
          </div>

          <!-- Area Chart Example-->
         <!--  <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
              Area Chart Example</div>
            <div class="card-body">
              <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>  -->     

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2022</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <?php include "../comman/logout-model.html"; ?>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="../assets/vendor/chart.js/Chart.min.js"></script>
    <script src="../assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="../assets/js/demo/datatables-demo.js"></script>
    <script src="../assets/js/demo/chart-area-demo.js"></script>

  </body>

</html>

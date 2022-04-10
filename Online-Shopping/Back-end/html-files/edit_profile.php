<!DOCTYPE html>
<?php  include '../php-files/connection.php'; ?>
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
    <?php include "../comman/header.php"; ?>
    <div id="wrapper">

      <!-- Sidebar -->      
      <?php include "../comman/side.php"; ?>
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
         <!--  <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>  -->         

          <!-- DataTables Example -->
          <?php 

              $currentUserId = (isset($_REQUEST['user_id']) && $_REQUEST['user_id']) ? $_REQUEST['user_id'] : $currentUserId ;
              $qry = $conn->query("SELECT * FROM admin_user WHERE user_id='{$currentUserId}'");
              $_row = $qry->fetch_assoc();

              /*echo '<pre>';
              print_r($_row);
              echo '</pre>';*/
          ?>
          <div class="card mb-3">
            <div class="card-header">
              <a class="btn btn-secondary" href="../php-files/list_admin_user.php">Back</a>
              <i class="fas fa-table"></i>
              Edit Profile</div>
            <div class="card-body">
              <div class="table-responsive">
                   <div class="container">
              <div class="card card-register mx-auto mt-5">
                <div class="card-body">
                  <form method="post"  action="../php-files/save_profile.php?user_id=<?php echo $currentUserId?>">
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="text" id="firstName" class="form-control" name="first_name" placeholder="First name" value="<?php echo $_row['first_name']?>" required="required" autofocus="autofocus">
                            <label for="firstName">First name</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="text" id="lastName" class="form-control" name="last_name" placeholder="Last name" value="<?php echo $_row['last_name']?>" required="required">
                            <label for="lastName">Last name</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php /*   <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="number" id="mobile" class="form-control" value="<?php echo $_row['mobile']?>" name="mobile" placeholder="Mobile" required="required">
                            <label for="mobile">Mobile</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="radio" id="gender" name="gender"  value="male" required <?php echo ($_row['gender'] == 'male')? 'checked="checked"': ''?>> Male<br>
                            <input type="radio" id="gender" name="gender"  value="female" required <?php echo ($_row['gender'] == 'female')? 'checked="checked"': ''?>> Female<br>
                          </div>                  
                        </div>
                      </div>
                    </div> */ ?>
                     <div class="form-group">
            
                  <div class="form-label-group">
                    <!-- <input type="number" id="mobile" class="form-control" name="mobile" value="<?php echo $_row['mobile'] ?>" placeholder="Mobile" required="required" onkeypress='return event.charCode >= 48 && event.charCode <= 57' pattern="[1-9]{1}[0-9]{9}"> -->
                    <input type="text" id="mobile" class="form-control" name="mobile" placeholder="Mobile Number" onkeypress='return event.charCode >= 48 && event.charCode <= 57' pattern="[1-9]{1}[0-9]{9}" value="<?php echo $_row['mobile'] ?>"/> 
                    <label for="mobile">Mobile</label>
                  </div>
                </div>
                    <div class="form-group">
              <div class="form-label-group">Gender&nbsp;&nbsp;&nbsp;&nbsp; 
                <input type="radio" id="gender" name="gender"  value="male" required <?php echo ($_row['gender'] == 'male') ? 'checked': ''?>> Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                    <input type="radio" id="gender" name="gender"  value="female" required <?php echo ($_row['gender'] == 'female') ? 'checked': ''?>> Female
               <!--  <label for="inputEmail">Gender</label> -->
              </div>
            </div>
                    <div class="form-group">
                      <div class="form-label-group">
                        <input type="email" id="inputEmail" class="form-control" value="<?php echo $_row['email']?>" name="email"placeholder="Email address" required="required">
                        <label for="inputEmail">Email address</label>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit" name="save">Update</button>
                  </form>         
                </div>
              </div>
            </div>
              </div>
            </div>
          </div>

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

<!DOCTYPE html>
<?php  include '../php-files/connection.php'; ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JAAMSO ROYAL</title>

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
          <?php   $categoryId = isset($_REQUEST['category_id'])?$_REQUEST['category_id']:0;       
              $qry = $conn->query("SELECT * FROM category WHERE category_id='{$categoryId}'");
              $_row = $qry->fetch_assoc();
          ?>
          <div class="card mb-3">
            <div class="card-header">
              <a class="btn btn-secondary" href="../php-files/list_category.php">Back</a>
              <i class="fas fa-table"></i>
              Category</div>
            <div class="card-body">
              <div class="table-responsive">
                   <div class="container">
              <div class="card card-register mx-auto mt-5">
                <div class="card-body">
                  <form method="post"  action="../php-files/save_category.php?category_id=<?php echo $categoryId?>">
                     <div class="form-group">
                      <div class="">
                      <label for="category" class="form-label">Category</label>
                        <input type="text" id="category" class="form-control"  name="category" required>
                      </div>
                    </div>  
                     <div class="form-group">
                      <div class="">                        
                        <label for="category_desc" class="form-label">Category Description</label>
                        <textarea rows="3" cols="10"  id="category_desc" class="form-control" name="category_desc" required></textarea>
                      </div>
                    </div>            
                    <button class="btn btn-primary btn-block" type="submit" name="save">Save</button>
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
              <span>Copyright © Your Website 2019</span>
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

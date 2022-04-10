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

              $qryCat = $conn->query("SELECT * FROM category");

              while ($row = mysqli_fetch_assoc($qryCat))
              {
                $categorys[] = $row;
              }

              $subCategoryId = isset($_REQUEST['sub_category_id'])?$_REQUEST['sub_category_id']:0;       
              $qrySubCat = $conn->query("SELECT * FROM sub_category WHERE sub_category_id='{$subCategoryId}'");
              $_row = $qrySubCat->fetch_assoc();

             /* echo '<pre>';
              print_r($_row);
              echo '</pre>';*/

          ?>
          <div class="card mb-3">
            <div class="card-header">
              <a class="btn btn-secondary" href="../php-files/list_sub_category.php">Back</a>
              <i class="fas fa-table"></i>
              Sub Category</div>
            <div class="card-body">
              <div class="table-responsive">
                   <div class="container">
              <div class="card card-register mx-auto mt-5">
                <div class="card-body">
                  <form method="post"  action="../php-files/save_sub_category.php?sub_category_id=<?php echo $subCategoryId?>">
                    <div class="form-group">
                      <div class="">
                      <label for="sub_category_desc">Category</label>
                        <select class="form-control" name="category_id" required>
                          <option>Select Category</option>
                          <?php foreach ($categorys as $_category):?>
                              <option value="<?php echo $_category['category_id']?>" <?php echo ($_category['category_id'] ==  $_row['category_id']) ? 'selected="selected"': '';?>><?php echo $_category['category']?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                    </div>
                     <div class="form-group">
                      <div class="">
                      <label for="sub_category">Sub Category</label>
                        <input type="text" id="sub_category" class="form-control" value="<?php echo $_row['sub_category']?>" name="sub_category"placeholder="Sub Category" required="required">
                      </div>
                    </div> 
                     <div class="form-group">
                      <div class="">                        
                      <label for="sub_category_desc">Sub Category Description</label>
                        <textarea rows="3" cols="10"  id="sub_category_desc" class="form-control" name="sub_category_desc" required="required"><?php echo $_row['sub_category_desc']?></textarea>
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
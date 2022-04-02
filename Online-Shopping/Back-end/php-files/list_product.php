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
    <?php include "../comman/header.php"; ?>
    <div id="wrapper">

      <!-- Sidebar -->      
      <?php include "../comman/side.php"; ?>
      <div id="content-wrapper">

        <div class="container-fluid">
        
          <!-- DataTables Example -->
          <?php              
              $qry = $conn->query("SELECT *,SC.sub_category FROM product_detail AS P INNER JOIN sub_category AS SC ON SC.sub_category_id = P.subcat_id");
              while ($row = mysqli_fetch_assoc($qry))
              {
                $adminUserData[] = $row;
              }
              /*echo '<pre>';
              print_r($adminUserData);
              echo '</pre>';*/

          ?>
          <div class="card mb-3">
            <div class="card-header">
              <a class="btn btn-secondary" href="home.php">Back</a>
              <a class="btn btn-primary" href="../html-files/add_product.php">Add New</a>
              <i class="fas fa-table"></i>
             Product's
            </div>              
            <div class="card-body">
              <div class="table-responsive">
                <div class="container">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Name</th>                     
                      <th>Description</th>                     
                      <th>Price</th>                     
                      <th>Quantity</th>                     
                      <th>Sub Category</th>                     
                      <th>Image</th>                     
                      <th>Edit</th>                     
                      <th>Delete</th>                     
                    </tr>
                  </thead>                  
                  <tbody>   
                    <?php foreach ($adminUserData as $_user):?>                 
                    <tr>
                      <td><?php echo $_user['product_id']?></td>
                      <td><?php echo $_user['product_name']?></td>
                      <td><?php echo $_user['product_desc']?></td>
                      <td><?php echo $_user['product_price']?></td>
                      <td><?php echo $_user['product_qnt']?></td>
                      <td><?php echo $_user['sub_category']?></td>
                      <td><img src="../images/products/<?php echo $_user['product_img']?>"  width="50" height="60"></td>
                      <td><a class="btn btn-primary" href="../html-files/add_product.php?product_id=<?php echo $_user['product_id']?>">Edit</a></td>
                      <td><a class="btn btn-secondary" href="delete_product.php?product_id=<?php echo $_user['product_id']?>" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a></td>
                    </tr>
                  <?php endforeach;?>
                  </tbody>
                </table>
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

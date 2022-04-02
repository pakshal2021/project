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
          <?php   $productId = isset($_REQUEST['product_id'])?$_REQUEST['product_id']:0;       
              $qry = $conn->query("SELECT * FROM product_detail WHERE product_id='{$productId}'");
              $_row = $qry->fetch_assoc();

             /* echo '<pre>';
              print_r($_row);
              echo '</pre>';*/
          ?>
          <div class="card mb-3">
            <div class="card-header">
              <a class="btn btn-secondary" href="../php-files/list_product.php">Back</a>
              <i class="fas fa-table"></i>
              Product</div>
            <div class="card-body">
              <div class="table-responsive">
                   <div class="container">
              <div class="card card-register mx-auto mt-5">
                <div class="card-body">
                  <form method="post" enctype="multipart/form-data" action="../php-files/save_product.php?product_id=<?php echo $productId?>">
                    <div class="form-group">
                      <div class="form-label-group">                        
                       <input type="text" id="productName"  value="<?php echo $_row['product_name']?>" class="form-control" name="product_name" placeholder="product name" required="required" autofocus="autofocus">
                            <label for="productName">Product Name</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-label-group">                        
                        <textarea rows="3" cols="10"  id="product_desc" class="form-control" name="product_desc" required="required"><?php echo $_row['product_desc']?></textarea>
                        <label for="product_desc">Product Description</label>
                      </div>
                    </div>   
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="number" id="productPrice" class="form-control" name="product_price" placeholder="product price" value="<?php echo $_row['product_price']?>" required="required" autofocus="autofocus">
                            <label for="productPrice">Product Price</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-label-group">
                            <input type="number" id="productQnt" class="form-control" name="product_qnt" placeholder="Quantity" value="<?php echo $_row['product_qnt']?>" required="required">
                            <label for="productQnt">Product Quantity</label>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                          <div class="form-label-group">
                           <input type="file" id="productImage" name="product_image" style=" height:23; width:180;" maxlength="100" required="required"/>
                           <?php if(isset($_row['product_img']) && $_row['product_img']): ?>
                            <img src="../images/products/<?php echo $_row['product_img']?>"  width="40" height="50">
                          <?php endif;?>
                            <label for="productImage">Product Image</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <?php  
                              $qrySubCat = $conn->query("SELECT * FROM sub_category");

                              while ($row = mysqli_fetch_assoc($qrySubCat))
                              {
                                $subCategorys[] = $row;
                              }
                          ?>
                          <select class="form-control" required="required" name="sub_category_id">
                          <option>Sub Category</option>
                          <?php foreach ($subCategorys as $_category):?>
                              <option value="<?php echo $_category['sub_category_id']?>" <?php echo ($_category['sub_category_id'] ==  $_row['subcat_id']) ? 'selected="selected"': '';?>><?php echo $_category['sub_category']?></option>
                          <?php endforeach;?>
                        </select>
                        </div>
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

<?php
include "../comman/header.php";
include "../comman/side.php";

?>
		<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php include "../comman/left_bar.php";?>
				</div>
				
				<div class="col-sm-9 padding-right">
						<div class="features_items"><!--features_items-->
							<h2 class="title text-center">Features Items</h2>
							<?php 
							$limit = 7;
							$sqlR = "select * from product_detail";
							$resultRecors = mysqli_query($conn,$sqlR);
							$records = $resultRecors->num_rows; 
							$totalPage = ceil($records/$limit);
							
							
							if(isset($_REQUEST['page']))
							{
								$page = $_REQUEST['page'];
							}
							else
							{
								$page = 1;
							}
							$offset = $limit * ($page-1); 

								$subCatId = !empty($_REQUEST['subcat_id']) ? $_REQUEST['subcat_id'] : 0;
								$productsData = array();  
		                        $qry = $conn->query("SELECT * FROM product_detail limit $limit offset $offset");
		                        while ($row = mysqli_fetch_assoc($qry))
		                        {
		                          $productsData[] = $row;
		                        } 

		                       /* echo '<pre>';
		                        print_r($productsData);
		                        echo '</pre>';*/
		                        /*if (count($productsData)) {
		                        	echo 'items not available.';
		                        }*/
							?>
							<?php if(count($productsData)):?>
								<?php foreach ($productsData as $_product):?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="../../Back-end/images/products/<?php echo $_product['product_img']?>" alt="" width="100pxl" height="200pxp"/>
													<h2>₹<?php echo $_product['product_price']?></h2>
													<p><?php echo $_product['product_name']?></p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												<div class="product-overlay">
													<div class="overlay-content">
														<h2>₹<?php echo $_product['product_price']?></h2>
														<p><?php echo $_product['product_name']?></p>
														<a href="add_to_cart.php?product_id=<?php echo $_product['product_id'] ?>&price=<?php echo $_product['product_price']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
													</div>
												</div>
											</div>
											<div class="choose">
												<ul class="nav nav-pills nav-justified">
													<li><a href="add_to_cart.php?product_id=<?php echo $_product['product_id'] ?>&price=<?php echo $_product['product_price']?>"><i class="fa fa-plus-square"></i>Add to cart</a></li>
													<li><a href="../php-files/product_view.php?product_id=<?php echo $_product['product_id']?>"><i class="fas fa-bullhorn"></i>View Details</a></li>
												</ul>
											</div>
										</div>
									</div>
								<?php endforeach;?>
							<?php else:?>
								<span style="text-align: center;">Items are not available.</span>
							<?php endif;?>
						</div><!--features_items-->
						<nav aria-label="...">
  <ul class="pagination pagination-lg">
    <li class="page-item disabled">

    	<?php  for($i=1;$i<=$totalPage;$i++)
    	{
    		?>
       <a class="page-link" href="home.php?page=<?php echo $i ?>" tabindex="-1"><?php  echo $i?></a>

  <?php } ?>
    
    </li>

    <!-- <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li> -->
  </ul>
   <br>
    <br>
</nav>
				    </div>
			</div>
		</div>
	</section>
<?php
include "../comman/footer.php";
?>
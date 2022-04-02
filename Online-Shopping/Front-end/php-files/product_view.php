<?php
include "../comman/header.php";
//include "../comman/side.php";
?>	
	<section id="advertisement">
		<div class="container">
			<img src="../assets/images/shop/advertisement.jpg" alt="" />
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<?php include "../comman/left_bar.php";?>
				</div>
				<?php

					 $pid   = $_REQUEST['product_id'];				

					$selectQry = $conn->query("SELECT * FROM product_detail where product_id = '{$pid}'");
				    $currnetItem = mysqli_fetch_assoc($selectQry);
				    /*echo '<pre>';
				    print_r($currnetItem);*/
				    

    			?>
				<div class="col-sm-9">
						<div class="blog-post-area">
													<h2 class="title text-center">Product Details</h2>
							<div class="single-blog-post">


								<h3><a class="btn btn-secondary" href="../php-files/product_list.php?subcat_id=<?php echo $currnetItem['subcat_id']?>"><h4>Back</h4></a>&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo $currnetItem['product_name']?></h3>							
								
								<a href="">
									<img src="../../Back-end/images/products/<?php echo $currnetItem['product_img'] ?>" alt="" width="400pxl" height="450pxl">
								</a>
								<p><?php echo $currnetItem['product_desc']?></p>

								<a href="add_to_cart.php?product_id=<?php echo $currnetItem['product_id'] ?>&price=<?php echo $currnetItem['product_price']?>"><i class="fa fa-plus-square"></i> Add to cart</a>
							</div>
							<!-- <div class="single-blog-post">
								<h3>Girls Pink T Shirt arrived in store</h3>
								<div class="post-meta">
									<ul>
										<li><i class="fa fa-user"></i> Mac Doe</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
									</span>
								</div>
								<a href="">
									<img src="images/blog/blog-two.jpg" alt="">
								</a>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
								<a  class="btn btn-primary" href="">Read More</a>
							</div>
							<div class="single-blog-post">
								<h3>Girls Pink T Shirt arrived in store</h3>
								<div class="post-meta">
									<ul>
										<li><i class="fa fa-user"></i> Mac Doe</li>
										<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
										<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
									</ul>
									<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
									</span>
								</div>
								<a href="">
									<img src="images/blog/blog-three.jpg" alt="">
								</a>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
								<a  class="btn btn-primary" href="">Read More</a>
							</div> -->
							<!-- <div class="pagination-area">
								<ul class="pagination">
									<li><a href="" class="active">1</a></li>
									<li><a href="">2</a></li>
									<li><a href="">3</a></li>
									<li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
								</ul>
							</div> -->
						</div>
					</div>
					
			</div>
		</div>
	</section>
<?php
include "../comman/footer.php";
?>
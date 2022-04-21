<?php
include "../comman/header.php";
?>

	<section id="cart_items">
		<div class="container">
			<div class="review-payment">				
				<h2> <a class="cart_quantity_up" href="product_list.php"> <strong>Back </strong></a> | My cart</h2>
			</div>

			<?php 
					$cartData = array();
					$cartId = isset($_SESSION['cart_id']) ? $_SESSION['cart_id'] : 0;	
					$qry = $conn->query("SELECT *,TC.* FROM tbl_cart AS TC LEFT JOIN product_detail AS PD on PD.product_id = TC.product_id where cart_id = '{$cartId}'");
               		
                    while ($row = mysqli_fetch_assoc($qry))
                    {
                      $cartData[] = $row;
                    }
               		/*echo '<pre>';
               		print_r($cartData);
               		echo '</pre>';*/

				?>
			<?php if(count($cartData)): ?>
				<div class="table-responsive cart_info">
					<table class="table table-condensed">
						<thead>
							<tr class="cart_menu">
								<td class="image">Item</td>
								<td class="description"></td>
								<td class="price">Price</td>
								<td class="quantity">Quantity</td>
								<td class="total">Total</td>
								<td></td>
							</tr>
						</thead>
						<tbody>
							
	                		<?php $grandTotal = 0; foreach ($cartData as $_item):?>
	                			<?php 
	                				  $itemTotal = $_item['price']*$_item['qty'];
	                			?>
								<tr>
									<td class="cart_product">
										<a href=""><img src="../../Back-end/images/products/<?php echo $_item['product_img']?>" alt="" height="62" width="62"></a>
									</td>
									<td class="cart_description">
										<h4><a href=""><?php echo $_item['product_name']?></a></h4>
										<p>Web ID: qb<?php echo rand()?></p>
									</td>
									<td class="cart_price">
										<p>₹<?php echo $_item['price']?></p>
									</td>
									<td class="cart_quantity">
										<div class="cart_quantity_button">
											<a class="cart_quantity_up" href="update_to_cart.php?product_id=<?php echo $_item['product_id'] ?>&price=<?php echo $_item['price']?>"> + </a>
											<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $_item['qty']?>" autocomplete="off" size="2" readonly="readonly">
											<a class="cart_quantity_down" href="update_to_cart.php?product_id=<?php echo $_item['product_id'] ?>&price=<?php echo $_item['price']?>&is_delete=1"> - </a>
										</div>
									</td>
									<td class="cart_total">
										<p class="cart_total_price">₹<?php echo $itemTotal?></p>
									</td>
									<td class="cart_delete">
										<a class="cart_quantity_delete" href="delete_cart.php?product_id=<?php echo $_item['product_id'] ?>"><i class="fa fa-times"></i></a>
									</td>
								</tr>
	                		<?php $grandTotal +=$itemTotal; endforeach;?>
							<tr>
								<td colspan="4">&nbsp;</td>
								<td colspan="2">
									<table class="table table-condensed total-result">
										<tr>
											<td>Cart Sub Total</td>
											<td>₹<?php echo $grandTotal?></td>
										</tr>
										<tr class="shipping-cost">
											<td>Shipping Cost</td>
											<td>Free</td>										
										</tr>
										<tr>
											<td>Total</td>
											<td><span>₹<?php echo $grandTotal?></span></td>
										</tr>
										<tr>
											<td colspan="1" align="center">
												<a class="btn btn-primary" href="checkout.php">
													<h5>checkout</h5>
												</a>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			<?php else:?>
				<span style="text-align: center;">Your cart is empty.</span>
			<?php endif;?>
			<!-- <div class="payment-options">
					<span>
						<label><input type="checkbox"> Cach On Delivery</label>
					</span>					
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div> -->
		</div>
	</section> <!--/#cart_items-->

	

<?php
include "../comman/footer.php";

?>
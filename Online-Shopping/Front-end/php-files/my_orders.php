<?php
include "../comman/header.php";
?>

	<section id="cart_items">
		<div class="container">
			<div class="review-payment">				
				<h2> <a class="cart_quantity_up" href="product_list.php"> <strong>Back </strong></a> | My Orders</h2>
			</div>

			<?php 
					$ordersData = array();
					//echo "SELECT *,TC.* FROM tbl_cart AS TC LEFT JOIN product_detail AS PD on PD.product_id = TC.product_id LEFT JOIN order_detail AS O on O.user_id = TC.user_id where  O.user_id= '{$currentUserId}'";

					$currentUserId = (isset($_SESSION['user_id']) && $_SESSION['user_id']) ? $_SESSION['user_id']: $currentUserId;
					$qry = $conn->query("SELECT *,TC.* FROM order_detail AS O INNER JOIN tbl_cart AS TC ON O.user_id = TC.user_id INNER JOIN product_detail AS PD ON PD.product_id = TC.product_id WHERE O.user_id = '{$currentUserId}' GROUP BY  O.order_id");
               		
               		//var_dump($currentUserId);
               		/*echo "SELECT *,TC.* FROM order_detail AS O INNER JOIN tbl_cart AS TC ON O.user_id = TC.user_id INNER JOIN product_detail AS PD ON PD.product_id = TC.product_id WHERE O.user_id = '{$currentUserId}' GROUP BY  O.order_id";*/
               		if ($qry) {
	                    while ($row = mysqli_fetch_assoc($qry))
	                    {
	                      $ordersData[] = $row;
	                    }
               		}
               		/*echo '<pre>';
               		print_r($_SESSION);
               		print_r($ordersData);
               		echo '</pre>';*/

				?>
			<?php if(count($ordersData)): ?>
				<div class="table-responsive cart_info">
					<table class="table table-condensed">
						<thead>
							<tr class="cart_menu">
								<th >Order Id</th>
								<th>Billing Name</th>                     
								<th>Billing Address</th>                     
								<th>Billing Mobile</th>  
								<th>Shipping Name</th>                     
								<th>Shipping Address</th>                     
								<th>Shipping Mobile</th>                     
								<th>Status</th>                     
								<th>Action</th>    
								<th>Invoice</th>    
							</tr>
						</thead>
						<tbody>
							
	                		<?php $grandTotal = 0; foreach ($ordersData as $_item):?>
	                			<?php 
	                				  $itemTotal = $_item['price']*$_item['qty'];
	                			?>
								<tr>
									<td class="cart_description"><p><?php echo $_item['order_id']?></p></td>
									<td class="cart_description"><p><?php echo $_item['billing_name']?></p></td>
									<td class="cart_description"><p><?php echo $_item['billing_address']?></p></td>
									<td class="cart_description"><p><?php echo $_item['billing_mobile']?></p></td>
									<td class="cart_description"><p><?php echo $_item['shipping_name']?></p></td>
									<td class="cart_description"><p><?php echo $_item['shipping_address']?></p></td>
									<td class="cart_description"><p><?php echo $_item['shipping_mobile']?></p></td>
									<td class="cart_description"><p><?php echo $_item['status']?></p></td>
									<td>
				                          <?php if( $_item['status'] != 'cancelled'):?>
				                          <a class="btn btn-secondary" href="cancel_order.php?order_id=<?php echo $_item['order_id']?>">Cancel</a>
				                        <?php else:?>
				                              -
				                        <?php endif;?>
				                      </td>
				                    <td><a class="btn btn-secondary" href="invoice.php?order_id=<?php echo $_item['order_id']?>">Invoice</a></td>
								</tr>
	                		<?php $grandTotal +=$itemTotal; endforeach;?>
							<!-- <tr>
								<td colspan="4">&nbsp;</td>
								<td colspan="2">
									<table class="table table-condensed total-result">
										<tr>
											<td>Cart Sub Total</td>
											<td>₹<?php echo $grandTotal?></td>
										</tr>
										<tr>
											<td>Exo Tax</td>
											<td>₹18</td>
										</tr>
										<tr class="shipping-cost">
											<td>Shipping Cost</td>
											<td>Free</td>										
										</tr>
										<tr>
											<td>Total</td>
											<td><span>₹<?php echo $grandTotal+18?></span></td>
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
							</tr> -->
						</tbody>
					</table>
				</div>
			<?php else:?>
				<span style="text-align: center;">Sorry, no orders are available.</span>
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
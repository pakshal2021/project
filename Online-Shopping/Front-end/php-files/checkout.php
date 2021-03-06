<?php
include "../comman/header.php";
?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="../index.php">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div>
			<div class="shopper-informations">
				<div class="row">					
					<div class="col-sm-12 clearfix">						
							<div class="bill-to">
								<p>Address</p>
								<div class="form-one">
									<form method="post" id="billing_address">
										<input type="text" placeholder="Billing Name"  name="billing_name" required>
										<label for="country" class="sr-only"></label>
										<textarea placeholder="Billing Address" rows="5" name="billing_address" required></textarea><br><br>
										<input type="text" placeholder="Billing City" name="billing_city" required>
										<input type="text" placeholder="Billing Zip / Postal Code *" name="billing_zipcode" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' pattern="[1-6]{1}[0-6]{6}">
										<input type="text" placeholder="Billing mobile" name="billing_mobile" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' pattern="[1-9]{1}[0-9]{9}">
									</form>									
								</div>
							</div>
					</div>
				</div>
			</div>

		</div>
	</section> 
<br/>
	<div class="shopper-informations">
				<div class="row">					
					<div class="col-sm-12 clearfix">						
							<div class="bill-to">
					<section id="cart_items">
						<div class="container">
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
										<?php 
											$cartData = array();
											$cartId = $_SESSION['cart_id'];	
											$qry = $conn->query("SELECT *,TC.* FROM tbl_cart AS TC LEFT JOIN product_detail AS PD on PD.product_id = TC.product_id where cart_id = '{$cartId}'");
				                       		
					                        while ($row = mysqli_fetch_assoc($qry))
					                        {
					                          $cartData[] = $row;
					                        }
				                       		/*echo '<pre>';
				                       		print_r($cartData);
				                       		echo '</pre>';*/

										?>
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
													<p>???<?php echo $_item['price']?></p>
												</td>
												<td class="cart_quantity">
													<div class="cart_quantity_button">
														<a class="cart_quantity_up" href="update_to_cart.php?product_id=<?php echo $_item['product_id'] ?>&price=<?php echo $_item['price']?>"> + </a>
														<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $_item['qty']?>" autocomplete="off" size="2" readonly="readonly">
														<a class="cart_quantity_down" href="update_to_cart.php?product_id=<?php echo $_item['product_id'] ?>&price=<?php echo $_item['price']?>&is_delete=1"> - </a>
													</div>
												</td>
												<td class="cart_total">
													<p class="cart_total_price">???<?php echo $itemTotal?></p>
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
														<td>???<?php echo $grandTotal?></td>
													</tr>
													<tr class="shipping-cost">
														<td>Shipping Cost</td>
														<td>Free</td>										
													</tr>
													<tr>
														<td>Total</td>
														<td><span>???<?php echo $grandTotal?></span></td>
													</tr>
													<tr>
														<td colspan="1" align="center">
															<a class="btn btn-primary" onclick="placeOrder('<?php echo $grandTotal+18?>')">
																<h5>Place Order</h5>
															</a>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</div>			
						</div>
					</section>
				</div>
			</div>
		</div>
		<!-- </div>
 -->
<?php
include "../comman/footer.php";

?>
<script type="text/javascript">
	function placeOrder(total) {
		
		var dataString = $("#billing_address").serialize();
	    // Do AJAX
	    $.ajax( {
	        type: 'POST',
	        url: 'place_order.php?total='+total,
	        data: dataString,
	        success: function(data) {
	        	if (data != 0) {
	        		alert('Your order placed successfully');	        		
            		window.location.href='home.php';
	        	} else {
	        		alert('Opps Something Wrong Please try again.!!');
            		// /window.location.href='checkout.php';
	        	}	            
	        }
	    });
	}
</script>
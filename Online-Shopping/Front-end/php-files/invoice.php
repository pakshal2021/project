<?php
include 'connection.php';
$grandTotal = 0;
if (isset($_REQUEST['order_id'])) {
    $id = $_REQUEST['order_id'];
    $sql = "SELECT *,TC.* FROM order_detail AS O INNER JOIN tbl_cart AS TC ON O.user_id = TC.user_id INNER JOIN product_detail AS PD ON PD.product_id = TC.product_id WHERE O.order_id = '{$id}' GROUP BY  O.order_id";
    
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>


<html>
    <head>
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="../assets/js/bootstrap.min.js" rel="stylesheet" id="bootstrap-css">
        <style>

            .invoice-title h2, .invoice-title h3 {
                display: inline-block;
            }

            .table > tbody > tr > .no-line {
                border-top: none;
            }

            .table > thead > tr > .no-line {
                border-bottom: none;
            }

            .table > tbody > tr > .thick-line {
                border-top: 2px solid;
            }
        </style>
    </head>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="invoice-title">
                    <h2><a class="cart_quantity_up" href="my_orders.php"> <strong>Back </strong></a> | Invoice </h2><h3 class="pull-right">Order Id: <?php echo!empty($row['order_id']) ? $row['order_id'] : '-'; ?></h3>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                            <strong>Billed To:</strong><br>
                            <?php echo!empty($row['billing_name']) ? $row['billing_name'] : '-'; ?><br>
                            <?php echo!empty($row['billing_address']) ? $row['billing_address'] : '-'; ?><br>
                            <?php echo!empty($row['billing_city']) ? $row['billing_city'] : '-'; ?><br>
                            <?php echo!empty($row['billing_mobile']) ? $row['billing_mobile'] : '-'; ?><br>
                        </address>
                    </div>
                    <div class="col-xs-6 text-right">
                        <address>
                            <strong>Order Date:</strong><br>
                            <!--                            March 7, 2014<br><br>-->
                            <?php echo!empty($row['created_at']) ? date('M d , Y',strtotime($row['created_at'])) : '-'; ?><br><br>
                        </address>
                    </div>

                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Order summary</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td><strong>Item</strong></td>
                                        <td class="text-center"><strong>Price</strong></td>
                                        <td class="text-center"><strong>Quantity</strong></td>
                                        <td class="text-right"><strong>Totals</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                   $sql = "SELECT *,TC.* FROM order_detail AS O INNER JOIN tbl_cart AS TC ON O.user_id = TC.user_id INNER JOIN product_detail AS PD ON PD.product_id = TC.product_id WHERE O.order_id = '{$id}' GROUP BY  TC.item_id";

                                    $result = $conn->query($sql);
                                    //$row = $result->fetch_assoc();

                                    if ($result->num_rows > 0) {
                                        while ($rows = $result->fetch_assoc()) {
                                            ?>
                                            <tr>
                                                <td><?php echo!empty($rows['product_name']) ? $rows['product_name'] : '-'; ?></td>
                                                <td class="text-center"><?php echo!empty($rows['product_price']) ? $rows['product_price'] : '-'; ?></td>
                                                <td class="text-center"><?php echo!empty($rows['qty']) ? $rows['qty'] : '-'; ?></td>
                                                <td class="text-right"><?php echo!empty($rows['qty']) ? $rows['product_price'] * $rows['qty'] : '-'; ?></td>
                                                <?php
//                                                $grandTotal += ($rows['price'] * $rows['qty']);
//                                                echo $rows['price'] * $rows['qty'];
                                                $grandTotal += intval($rows['product_price'] * $rows['qty']);
                                                ?>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo '<tr><td><h1>No Records Found..!</h1></td></tr>';
                                    }
                                    ?>
                                    <tr>
                                        <td class="thick-line"></td>
                                        <td class="thick-line"></td>
                                        <td class="thick-line text-center"><strong>Total</strong></td>
                                        <td class="thick-line text-right"><?php echo!empty($grandTotal) ? $grandTotal : '-'; ?></td>
                                    </tr>
<!--                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center"><strong>Shipping</strong></td>
                                        <td class="no-line text-right">$15</td>
                                    </tr>-->
<!--                                    <tr>
                                        <td class="thick-line"></td>
                                        <td class="thick-line"></td>
                                        <td class="no-line text-center"><strong>Total</strong></td>
                                        <td class="no-line text-right">$685.99</td>
                                    </tr>-->
                                </tbody>
                            </table>                            
                        </div>
                    </div>
                </div>
                <div class="invoice-title">
                    <h3 class="pull-right"><button onclick="window.print();" class="btn">Download</button></h3>
                </div>
            </div>
        </div>
    </div>

</html>
<?php

include 'connection.php';

if (isset($_REQUEST['order_id'])) {
    $id = $_REQUEST['order_id'];
    $sql = "UPDATE `order_detail` SET `status` = 'cancelled' WHERE `order_id` ='{$id}'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Order marked as cancelled successfully'.);
                window.location.href='list_order.php';
             </script>";
    } else {
        echo "<script>
                alert('Opps something wents wrong...!!!');
                window.location.href='list_order.php';
             </script>";
    }
}
?>
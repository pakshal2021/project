<?php

include 'connection.php';

if (isset($_REQUEST['product_id'])) {
    $id = $_REQUEST['product_id'];
    $sql = "DELETE FROM `product_detail` WHERE `product_id`=$id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Record delete successfully');
                window.location.href='list_product.php';
             </script>";
    } else {
        echo "<script>
                alert('Opps something wents wrong...!!!');
                window.location.href='list_product.php';
             </script>";
    }
}
?>
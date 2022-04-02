<?php

include 'connection.php';

if (isset($_REQUEST['category_id'])) {
    $id = $_REQUEST['category_id'];
    $sql = "DELETE FROM `category` WHERE `category_id`=$id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Record delete successfully');
                window.location.href='list_category.php';
             </script>";
    } else {
        echo "<script>
                alert('Opps something wents wrong...!!!');
                window.location.href='list_category.php';
             </script>";
    }
}
?>
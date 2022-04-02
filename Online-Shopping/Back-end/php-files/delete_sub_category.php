<?php

include 'connection.php';

if (isset($_REQUEST['sub_category_id'])) {
    $id = $_REQUEST['sub_category_id'];
    $sql = "DELETE FROM `sub_category` WHERE `sub_category_id`=$id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Record delete successfully');
                window.location.href='list_sub_category.php';
             </script>";
    } else {
        echo "<script>
                alert('Opps something wents wrong...!!!');
                window.location.href='list_sub_category.php';
             </script>";
    }
}
?>
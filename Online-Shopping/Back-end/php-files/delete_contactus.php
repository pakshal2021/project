<?php

include 'connection.php';

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $sql = "DELETE FROM `tbl_contectus` WHERE `contect_id`=$id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Record delete successfully');
                window.location.href='list_contactus.php';
             </script>";
    } else {
        echo "<script>
                alert('Opps something wents wrong...!!!');
                window.location.href='list_contactus.php';
             </script>";
    }
}
?>
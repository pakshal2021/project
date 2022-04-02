<?php

include 'connection.php';

if (isset($_REQUEST['user_id'])) {
    $id = $_REQUEST['user_id'];
    $sql = "DELETE FROM `admin_user` WHERE `user_id`=$id";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Record delete successfully');
                window.location.href='list_admin_user.php';
             </script>";
    } else {
        echo "<script>
                alert('Opps something wents wrong...!!!');
                window.location.href='list_admin_user.php';
             </script>";
    }
}
?>
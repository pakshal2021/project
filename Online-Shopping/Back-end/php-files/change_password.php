<?php 
	include 'connection.php';

	//$_SESSION['user_id'];

if (isset($_REQUEST['save'])) {
   
    $qry = $conn->query("SELECT * FROM admin_user WHERE user_id='{$currentUserId}'");
    $oldPassword = $qry->fetch_assoc();

    if ($oldPassword['password'] != $_REQUEST['old_password']) {
        echo "<script>
            alert('Old Password not match.!!');
            window.location.href='../html-files/change_password.php';
         </script>";
         return false;
    } 

    if ($_REQUEST['password'] != $_REQUEST['confirm_password']) {      
        echo "<script>
            alert('Password and confirm password not match.!!');
            window.location.href='../html-files/change_password.php';
         </script>";
         return false;
    }

    $password = $_REQUEST['password'];   
   

    $sql = "UPDATE `admin_user` SET `password` ='$password' WHERE user_id='{$currentUserId}'";
    $r = mysqli_query($conn, $sql);
 
    if ($r == 1) {
        echo "<script>
            alert('Your password is change sucessfully.');
            window.location.href='../php-files/home.php';
         </script>";
    } else {
        echo "<script>
            alert('Opps something wrong please try again.');
            window.location.href='../html-files/change_password.php';
         </script>";
    }
}
?>
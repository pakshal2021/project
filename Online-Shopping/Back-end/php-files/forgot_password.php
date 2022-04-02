<?php 
	include 'connection.php';

	//$_SESSION['user_id'];

if (isset($_REQUEST['save'])) {
    
    $password = $_REQUEST['password'];   
    $email = isset($_REQUEST['email']) ?  $_REQUEST['email']: $_SESSION['email'] ;   

    $sql = "UPDATE `admin_user` SET `password` ='$password' WHERE `email`='{$email}'";
    $r = mysqli_query($conn, $sql);
 
    if ($r == 1) {
        echo "<script>
            alert('Your password is change sucessfully, Please Lgoing Here..');
            window.location.href='../html-files/login.html';
         </script>";
    } else {
        echo "<script>
            alert('Invalid details, Please again');
            window.location.href='forgot_password.html';
         </script>";
    }
}
?>
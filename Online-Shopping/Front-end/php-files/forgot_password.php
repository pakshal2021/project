<?php 
	include 'connection.php';

if (isset($_REQUEST['save'])) {
    $Valid = 0;
 
    $password = $_REQUEST['password'];
    $len = strlen($_REQUEST['password']);
    if ($len < 6) {
        echo "<script>
                alert('!!! Insert at least Six Characters');
                 window.location.href='../html-files/forgot_password.php';
             </script>";
        $Valid = 1;
    }
    if (!preg_match("/^[a-zA-Z0-9]*$/", $password)) {
        $$error = "!!! Invalid Password Format";
         echo "<script>
                alert('!!! Invalid Password Format');
                window.location.href='../html-files/forgot_password.php';
             </script>";
        $Valid = 1;
    }    
    /*echo '<pre>';
    print_r($_REQUEST);
    die;*/
    $confirmPassword = $_REQUEST['confirm_password'];
    if ($password != $confirmPassword) {
        echo "<script>
                alert('Password Not Matched');
                window.location.href='../html-files/forgot_password.php';
             </script>";
        $Valid = 1;
    }        

    $password = $_REQUEST['password'];   
    $email = isset($_REQUEST['email'])? $_REQUEST['email'] :'';   
   
    if ($Valid == 0) {
       /* echo*/ $sql = "UPDATE `customer` SET `password` ='$password' WHERE `email`='{$email}'";
        //die;
        $r = mysqli_query($conn, $sql);
     
        if ($r == 1) {
            echo "<script>
                alert('Your password is change sucessfully, Please Lgoing Here..');
                window.location.href='../html-files/login.php';
             </script>";
        } else {
            echo "<script>
                alert('Invalid details, Please again');
                window.location.href='../html-files/forgot_password.php';
             </script>";
        }
    }
}
?>
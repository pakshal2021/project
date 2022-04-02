<?php
include 'connection.php';

$errmsg ='';
if (isset($_REQUEST['save'])) {

    $Valid = 1;
   /* if (empty($_REQUEST['email'])) {
        $emailError = "*  Email is Required";
        $Valid = 0;
    }

    if (empty($_REQUEST['password'])) {
        $passwordError = "*  Password is Required";
        $Valid = 0;
    }*/

    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    if ($Valid == 1) {
        if ($qry = $conn->query("SELECT * FROM admin_user WHERE email='{$email}' AND  password='{$password}'")) {
            if ($_row = $qry->fetch_assoc()) {

                $fname = isset($_row['first_name']) ? $_row['first_name'] : '';
                $lname = isset($_row['last_name']) ? $_row['last_name'] : '';
                $full_name = $fname.' '.$lname;
                $_SESSION['user_id'] = $_row['user_id'];
                $_SESSION['full_name'] = $full_name;
                $_SESSION['first_name'] =  $fname;
                $_SESSION['last_name'] = $lname;
                $_SESSION['email'] = $_row['email'];
              echo "<script>
                alert('Welcome back $full_name');
                window.location.href='home.php';
             </script>";
            } else {
                echo "<script>
                 alert('Invalid details, Please try again');
                window.location.href='../html-files/login.html';
             </script>";
            }
        }
    }
}
?> 
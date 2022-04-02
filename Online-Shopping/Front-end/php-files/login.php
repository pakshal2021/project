<?php
include 'connection.php';

if (isset($_REQUEST['save'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
        

    $qry = $conn->query("SELECT * FROM customer WHERE email='{$email}' AND  password='{$password}'");
    if ($_row = $qry->fetch_assoc())
     {
        $fname = isset($_row['first_name']) ? $_row['first_name'] : '';
        $lname = isset($_row['last_name']) ? $_row['last_name'] : '';
        $full_name = $fname.' '.$lname;
        $_SESSION['user_id'] = $_row['user_id'];
        $_SESSION['full_name'] = $full_name;
        $_SESSION['first_name'] =  $fname;
        $_SESSION['last_name'] = $lname;
        $_SESSION['is_customer_logged_id'] = 1;

        echo "<script>
        alert('Welcome back $full_name');
        window.location.href='home.php';
        </script>";
    } 
    else {
        echo "<script>
        alert('Invalid details, Please try again');
        window.location.href='../html-files/login.php';            
     </script>";
    }    
}
?> 

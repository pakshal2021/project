<?php 
include 'connection.php';

if (isset($_REQUEST['save'])) {

        $firstName = $_REQUEST['first_name'];
        $lastName = $_REQUEST['last_name'];
        $mobile = $_REQUEST['mobile'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];         
        $gender = $_REQUEST['gender'];

        $sql ="INSERT INTO `customer`(`first_name`, `last_name`, `mobile`, `email`, `password`, `gender`)
         VALUES ('{$firstName}','{$lastName}','{$mobile}','{$email}','{$password}','{$gender}')";        
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>
                alert('You are Registration successfully, Please Login Here..!!');
                window.location.href='../html-files/login.php';
             </script>";            
        } else {
          echo "<script>
                alert('Opps Something Wrong Please try again.!!');
                window.location.href='../html-files/register.php';
             </script>";  
        }
 }
?>
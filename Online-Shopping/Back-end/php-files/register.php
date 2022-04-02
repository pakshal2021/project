<?php 
include 'connection.php';

if (isset($_REQUEST['save'])) {

    
   /* echo '<pre>';
    print_r($_REQUEST);
    die;*/
    if ($_REQUEST['password'] != $_REQUEST['confirm_password']) {      
        echo "<script>
            alert('Password and confirm password not match.!!');
            window.location.href='../html-files/add_admin.php';
         </script>";
         return false;
    }
  

        $firstName = $_REQUEST['first_name'];
        $lastName = $_REQUEST['last_name'];
        $mobile = $_REQUEST['mobile'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];         
        $gender = $_REQUEST['gender'];


        $sql ="INSERT INTO `admin_user`(`first_name`, `last_name`, `mobile`, `email`, `password`, `gender`)
         VALUES ('{$firstName}','{$lastName}','{$mobile}','{$email}','{$password}','{$gender}')";
        // window.location.href='list_admin_user.php';
        if (mysqli_query($conn, $sql)) {
            if (isset($_REQUEST['is_admin']) && $_REQUEST['is_admin']) {
                echo "<script>
                  alert('New Admin User Register Successfully.!!');
                  window.location.href='../php-files/list_admin_user.php';
                 
               </script>";
            } else {              
              echo "<script>
                  alert('You are Registration successfully, Please Login Here..!!');
                  window.location.href='../php-files/list_admin_user.php';
               </script>";            
            }
        } else {
          if (isset($_REQUEST['is_admin']) && $_REQUEST['is_admin']) {
                echo "<script>
                  alert('Opps Something Wrong Please try again.!!');
                  window.location.href='../html-files/add_admin.php';
               </script>";
            } else { 
            echo "<script>
                alert('Opps Something Wrong Please try again.!!');
                window.location.href='../html-files/register.html';
             </script>";  
           }
        }
 }
?>
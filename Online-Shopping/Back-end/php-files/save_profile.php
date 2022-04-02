<?php 
include 'connection.php';

if (isset($_REQUEST['save'])) {
  
        $firstName = $_REQUEST['first_name'];
        $lastName = $_REQUEST['last_name'];
        $email = $_REQUEST['email'];
        $mobile = $_REQUEST['mobile'];
        $gender = $_REQUEST['gender'];

        $currentUserId = (isset($_REQUEST['user_id']) && $_REQUEST['user_id']) ? $_REQUEST['user_id'] : $currentUserId ;
        $sql = "UPDATE `admin_user` SET `first_name` = '{$firstName}',`last_name` = '{$lastName}', `email` = '{$email}', `mobile` = '{$mobile}' , `gender` = '{$gender}' WHERE `user_id` = $currentUserId";
       
        if (mysqli_query($conn, $sql)) {
            echo "<script>
              alert('Your data is successfully saved.');
              window.location.href='list_admin_user.php';
            </script>";            
        } else {
            echo "<script>
              alert('Opps Something Wrong Please try again.!!');
              window.location.href='../html-files/edit_profile.php';
            </script>";  
        }
    
 }

?>
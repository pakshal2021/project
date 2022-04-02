<?php
include 'connection.php';
if (isset($_REQUEST['save'])) {
		$name=$_POST['name'];
		$emai=$_POST['email'];
		$sub=$_POST['subject'];
		$comm=$_POST['comments']; 
		
      	$sql = "INSERT INTO `tbl_feedback`( `name`, `email`, `subject`, `comments`)
         VALUES ('{$name}','{$emai}','{$sub}','{$comm}')";        
        if (mysqli_query($conn, $sql)) {
            echo "<script>
                alert('thank you for your feedback'); 
                window.location.href='home.php';              
             </script>";            
        } else {
          echo "<script>
                alert('Opps Something Wrong Please try again.!!'); 
                window.location.href='home.php';               
             </script>";  
    }
}
?>
	
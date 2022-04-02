
<?php
 require 'PHPMailerAutoload.php';

 include '../connection.php';

 	$toEmail = isset($_POST['email']) ? $_POST['email'] : ''; 	

 	$content = '';
 	if (isset($_POST['forgot_password']) && $_POST['forgot_password']) {
 		$content = '<a href="http://localhost/Vikash/Online-Shopping/Back-end/html-files/forgot_password.php?email='.$toEmail.'>Click Here. </a>';
		$Subject =  'Reset Your Password';
 	}  else {
 		$toEmail = (isset($_REQUEST['email']) && $_REQUEST['email']) ? $_REQUEST['email'] : $_SESSION['email'];
 		$content = "Hello, Welcome to our site.";
		$Subject = 'Verification';
 	}

 	if (!$toEmail) {
 		echo "Email must be required.";
 		return false;
 	}

 	// From Details.
 	$fromEmail = '';//Enter Your Email
 	$fromPass  = '';//Enter Your Password

 	if (!$fromEmail || !$fromPass) {
 		echo "<script>
 				alert('Please add from email address and password.!!');
	            window.location.href='../../html-files/login.html';
	             </script>";
 		return false;
 	}
 	
 	
	$mail = new PHPMailer;

	$mail->SMTPDebug =0 ;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = $fromEmail;        // SMTP username(Org email)
	$mail->Password = $fromPass;                          // SMTP password(Org pass)
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom($fromEmail, 'Online-Shopping');
	$mail->addAddress($toEmail, 'To User');     // Add a recipient

	/*
	$mail->addAddress('ellen@example.com');               // Name is optional
	$mail->addReplyTo('info@example.com', 'Information');
	$mail->addCC('cc@example.com');
	$mail->addBCC('bcc@example.com');

	$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	$mail->addAttachment('/tmp/image.jpg', 'new.jpg');
	*/    // Optional name
	
	$mail->isHTML(true);                                // Set email format to HTML


	$mail->Subject = $Subject;
	$mail->Body = $content;

	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send())
		{
		echo 'Mail could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else 
	{	
		if (isset($_POST['forgot_password'])) {
			if ($_POST['forgot_password'] == 1) {
				echo "<script>
	                alert('Your reset password link has been sent in the email!!');
	                window.location.href='../../html-files/login.html';
	             </script>";
			} else {				
				echo "<script>
	                alert('Your reset password link has been sent in the email!!');
	                window.location.href='../home.php';
	             </script>";
			}
		} else {		
			if (isset($_REQUEST['is_admin']) && $_REQUEST['is_admin']) {
				echo "<script>
		                alert('Mail has been sent!!');
		                window.location.href='../list_admin_user.php';
		             </script>";
			} else {				
				echo "<script>
		                alert('Mail has been sent!!');
		                window.location.href='../../html-files/login.html';
		             </script>";
			}
		}
	}
 ?>
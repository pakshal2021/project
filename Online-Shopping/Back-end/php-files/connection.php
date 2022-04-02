<?php
$conn = mysqli_connect("localhost","root","","grand-project");
if(!isset($_SESSION) && !isset($_SESSION['user_id'])) {
    session_start();
	$currentUserId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
}
?>
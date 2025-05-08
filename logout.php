<?php  // logout.php
session_start();
if(isset($_SESSION['id'])){
	session_unset();
	session_destroy();
	header('location:Login.php');
}
?>
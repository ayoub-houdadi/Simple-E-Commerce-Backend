<?php
session_start();
if(isset($_SESSION['id'])){
	include('connection.php');
	$req = 'delete from articles where code_article = '.$_GET['code_article'];
	$pdo->query($req);
	header('location:Home.php');
}
else
	header('location:Login.php');
?>
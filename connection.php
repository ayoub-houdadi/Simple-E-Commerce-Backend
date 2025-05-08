<?php
try{
	$pdo = new PDO('mysql:host=localhost;dbname=ecommerce','root','');
}catch(Exception $e){
	die('Database connection error : '.$e->getMessage());
}
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>
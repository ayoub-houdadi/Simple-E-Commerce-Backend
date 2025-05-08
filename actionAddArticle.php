<?php // actionAddArticle.php
session_start();
if(!isset($_SESSION['id'])) // on vérifier est-ce que le vendeur est bien connecté
	header('location:Login.php');

$desi = $_POST['designation'];
$prix = $_POST['price'];
$qte = $_POST['qteStock'];
$nomPhoto = $_FILES['photo']['name']; 
$nomPhoto_tmp = $_FILES['photo']['tmp_name']; 
$extension = pathinfo($nomPhoto,PATHINFO_EXTENSION); 
if($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg'){
	if(!empty($desi) && !empty($price) && !empty($qte) && !empty($nomPhoto)){
		include('connection.php');
		$req = 'insert into articles(designation,price,Quantity_in_stock,photo,id) values (?,?,?,?,?);';
		$stmt = $pdo->prepare($req);
		$stmt->execute([$desi,$price,$qte,$nomPhoto,$_SESSION['id']]);								
		move_uploaded_file($nomPhoto_tmp, 'images/'.$nomPhoto); 
		header('location:Home.php?err=1');
	}
	else
		header('location:Home.php?err=2');
}
else
	header('location:Home.php?err=3');
?>
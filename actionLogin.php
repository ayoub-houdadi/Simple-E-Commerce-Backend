<?php // actionSeConnecter.php
if(isset($_POST['Login'])){
	$login = $_POST['login'];
	$psw = $_POST['psw'];
	if(!empty($login) && !empty($psw)){
		include('connection.php');
		$req = 'select * from sellers where login = ? and psw = md5(?);';
		$stmt = $pdo->prepare($req);
		$stmt->execute([$login,$psw]);
		if($stmt->rowCount() == 1){
			$seller = $stmt->fetch();
			session_start();
			$_SESSION['id'] = $seller['id'];
			$_SESSION['lastname'] = $seller['lastname'];
			header('location:Home.php');
		}
		else
			header('location:Login.php?err=1');
	}
}
 ?>
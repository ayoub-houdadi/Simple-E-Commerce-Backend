<?php
if(isset($_POST['confirm'])){
	$nom = $_POST['lastname'];
	$prenom = $_POST['firstname'];
	$login = $_POST['login'];
	$psw = $_POST['psw'];
		
	if(!empty($_POST['lastname']) && !empty($_POST['firstname']) 
			&& !empty($_POST['login']) && !empty($_POST['psw'])) {
		include('connection.php');
		$req = $pdo->prepare('insert into sellers(lastname,firstname,login,psw) values (?,?,?,?);');
		$req->execute(array($lastname,$firtsname,$login,md5($psw)));
		header('location:RegistrationSeller.php?err=3');
	}
	else
		header('location:RegistrationSeller.php?err=1&lastname='.$lastname.'&firstname='.$firtsname.'&login='.$login);
}
else
	header('location:RegistrationSeller.php?err=2');
	
?>
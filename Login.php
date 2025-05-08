<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--seConnter.php -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>
	<div class="container">
		<form action="actionLogin.php" class="form" method="post">
			<input type="text" name="login" placeholder="Login">
			<input type="password" name="psw" placeholder="Password">
			<button type="submit" name="Login">Login</button>
		</form>
		<div class="err">
			<?php
				if(isset($_GET['err']) && $_GET['err'] == 1)
					echo '<p>login/psw incorrect</p>';
			?>
			
			<p><a href="RegistrationSeller.php">Create an account</p>
		</div>
	 </div>
</body>
</html>
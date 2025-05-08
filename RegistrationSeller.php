<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>
	<div class="container">
		<form action="actionRegistrationSeller.php" class="form" method="post">
			<input type="text" name="last name" placeholder="last name"
				value="<?php if(isset($_GET['last name'])) 
				echo $_GET['last name']; ?>">
			<input type="text" name="first name" placeholder="first name"
				value="<?php if(isset($_GET['first name'])) 
				echo $_GET['first name']; ?>">
			<input type="text" name="login" placeholder="Login"
				value="<?php if(isset($_GET['login'])) 
				echo $_GET['login']; ?>">
			<input type="password" name="psw" placeholder="Password">
			<button type="submit" name="Confirm">Confirm</button>
		</form>
		<a href="Login.php">Login</a>
		<div class="err">
			<?php 
				if(isset($_GET['err'])){
					switch ($_GET['err']) {
						case '1':
							echo '<p>Thank you for filling everything!</p>';
							break;
						case '2':
							echo '<p>Create an account!</p>';
							break;
						default:
							echo '<p>Account created</p>';
							break;
					}
				}
			 ?>
		 </div>
	 </div>
</body>
</html>
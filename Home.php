<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php  // Login.php
	session_start();
	if(!isset($_SESSION['id']))
		header('location:Login.php');
	echo "<h2>Bonjour ".$_SESSION['last name']."</h2>";
	?>
	<div class="container">
		<form action="actionAddArticle.php" class="form" method="post" enctype="multipart/form-data">
			<input type="text" name="designation" placeholder="Designation">
			<input type="text" name="price" placeholder="Price">
			<input type="text" name="qteStock" placeholder="Quantity in stock">
			<input type="file" name="photo">
			<button type="submit" name="add">Add</button>
		</form>
		<div class="err">
			<?php 
				if(isset($_GET['err'])){
					if($_GET['err'] == 1)
						echo '<p>Item well added</p>';
					else if($_GET['err'] == 2)
						echo '<p>Please fill in all the information</p>';
					else
						echo '<p>Please upload a png, jpg or jpeg photo</p>';
				}
			 ?>
		 </div>
		<a href="logout.php">Logout</a>
		<table class="table table-striped">
			<tr><th>Designation</th><th>Price</th><th>Quantity in stock</th><th>Photo</th><th>Action</th>
			</tr>
			<?php 
			include('connection.php');
			$req = 'select * from articles where id = '.$_SESSION['id'];
			$articles = $pdo->query($req)->fetchAll(); 
			foreach ($articles as $article) { 
				$ligne = '<tr><td>';
				$ligne .= $article['designation'];
				$ligne .= '</td><td>';
				$ligne .= $article['price'].' DH';
				$ligne .= '</td><td>';
				$ligne .= $article['Quantity_in_stock'];
				$ligne .= '</td><td><img style="width:40px" src="images/';
				$ligne .= $article['photo'];
				$ligne .= '"/></td><td>';
				$ligne .= '<a href="actionDelete.php?code_article=';
				$ligne .= $article['code_article'];
				$ligne .= '" onclick="return confirm(\'are you sure you want to delete this article\');"';
				$ligne .= '>Delete</a></td></tr>';
				echo $ligne;
			}
			?>
		</table>
	</div>
	
</body>
</html>
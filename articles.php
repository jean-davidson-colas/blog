<html>

<?php
require 'class/bdd.php';
require 'class/user.php';

session_start();

?>

<head>
	<title>Articles</title> 
	<link rel="stylesheet" href="css/style.css">
	
</head>

<body>

	<?php require 'header.php';?>

	<main>
		<?php require 'creer-article.php';?>
	</main>


	<?php require 'footer.php'?>


</body>

</html>

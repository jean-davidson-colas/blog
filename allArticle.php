<html>

<?php
	require 'class/bdd.php';
	require 'class/user.php';

	session_start();

	$connexion = mysqli_connect("localhost", "root", "", "blog");

	$requeteAllArticle = "SELECT * FROM articles";
	$queryAllArticle = mysqli_query($connexion, $requeteAllArticle);
	$resultAllArticle = mysqli_fetch_all($queryAllArticle);

	$nbArticle = count($resultAllArticle);
	var_dump($resultAllArticle);

?>

<head>
	<title>Articles</title> 
	<link rel="stylesheet" href="css/style.css">
	
</head>

<body>

	<?php require 'header.php';?>

	<main>
		<?php

			for ($i=0; $i < $nbArticle ; $i++) 
				{ ?>
					<div> <a href=""><?php echo $resultAllArticle[$i][1];  ?></a></div>
					<?php
				}

		?>
		
	</main>


	<?php require 'footer.php'?>


</body>

</html>
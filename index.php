<html>

<?php
require 'class/bdd.php';
require 'class/user.php';

session_start();

$connexion = mysqli_connect("localhost", "root", "", "blog");
?>

<head>
        <title>Accueil</title> 
        <link rel="stylesheet" href="css/style.css">
        
</head>



<body>
	
	<div class="banniere">
		<div class="logo">
			<img src="img/logo.png">
		</div>
	</div>

	<?php require 'header.php';?>

	<main>
		<?php

		$requeteArticleIndex = "SELECT * FROM articles ORDER BY date DESC LIMIT 3 OFFSET 0 ";
		$queryArticleIndex = mysqli_query($connexion, $requeteArticleIndex);
		$resultArticleIndex = mysqli_fetch_all($queryArticleIndex);

		$nbLastArticle = count($resultArticleIndex);
		var_dump($resultArticleIndex);

		?>

		<section id="allArticle">
			<?php

			for ($i=0; $i < $nbLastArticle ; $i++) 
			{ ?>
				<div class="articles"> <a href="articles.php?id=<?php echo $resultArticleIndex[$i][0]?>"> <?php echo $resultArticleIndex[$i][1];  ?></a></div>
				<br />
			<?php
			}

			?>
			
		</section>
	</main>


<?php require 'footer.php'?>


</body>

</html>
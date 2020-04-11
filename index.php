<html>

<?php
require 'class/bdd.php';
require 'class/user.php';

session_start();


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
	<h1>Bienvenue  sur Konoha.Blog </h1>
	<h2>Retrouver chaque jour un episode de Naruto a voir gratuitement!!!</h2>
	<section>
	<iframe width="1280" height="615" src="https://www.youtube.com/embed/FOfWwN8lp9s" 
		frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</section>
</main>


<?php require 'footer.php'?>


</body>

</html>
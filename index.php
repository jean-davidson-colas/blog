<html>

<?php
require 'class/bdd.php';
require 'class/user.php';

session_start();


?>

<head>
        <title>Accueil</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
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
	<h2>Retrouver chaque jour des épisodes de Naruto a voir gratuitement!!!</h2>
	<section>
	<iframe width=100% height="615" src="https://www.youtube.com/embed/FOfWwN8lp9s" 
		frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</section><hr>
<section class="acc">
<iframe width="860px" height="780" src="https://www.youtube.com/embed/m7feI8093iY"
frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
allowfullscreen></iframe>

	<ul>
		<li>
		<u>nom:</u>uzumaki
		</li>
		<li>
		<u>prenom:</u>naruto
		</li>
		<li>
		<u>village:</u>konoha no kuni
		</li>
		<li>
		<u>grade:</u>genin
		</li>
		<li>
		<u>age:</u>12ans
		</li>
		<li>
		<u>sexe:</u>M
		</li>
		<li>
		<u>taille:</u>1m45
		</li>
		<li>
		<u>poids:</u>40,1kg
		</li>
		<li>
		<u>sensei:</u>hatake kakashi
		</li>
		<li>
		<u>jutsus:</u>oiroke no jutsus, kage bushin no jutsus, harem no jutsus, rasengan...
		</li>
		<li>
		<u>description:</u>Personnage principale de la serie, Naruto est assez turbulent et casse-cou. Il est le meilleur ami de Sasuke(bien qu'il se cherche des crosse souvent) qu'il envie quelque fois car il l'admire. Il est amoureux de Sakura mais elle le deteste!! Il était le cancre de l'académie des ninjas mais il est très fort et très imprevisible. Il est déterminé et plein de volonté! Et surtout, le démon kyubi, scellé en lui, lui donne une force incroyable! Son reve est de devenir hokage.
		</li>
		<p>toujours plus de shippuden</p>
	</ul>
	
</section>
</main>


<?php include 'footer.php'?>
</body>
</html>
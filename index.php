<html>

<?php
require 'class/bdd.php';
require 'class/user.php';

session_start();

$connexion = mysqli_connect("localhost", "root", "", "blog");
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
		<h1>Dernier Blog ajouté</h1>

		<?php

		$requeteArticleIndex = "SELECT * FROM articles ORDER BY date DESC LIMIT 3 OFFSET 0 ";
		$queryArticleIndex = mysqli_query($connexion, $requeteArticleIndex);
		$resultArticleIndex = mysqli_fetch_all($queryArticleIndex);

		$nbLastArticle = count($resultArticleIndex);
		

		?>
		<section id="articleIndex">	
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
		</section>
		<h2>Retrouver chaque jour des épisodes de Naruto a voir gratuitement!!!</h2>
		<section id="episode">
							
				<iframe width=40% height="600" src="https://www.youtube.com/embed/FOfWwN8lp9s" 
				frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			
			
				
			<iframe width=40% height="600" src="https://www.youtube.com/embed/m7feI8093iY"
			frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			
		</section>
		<br />
		<br />

		<section class="acc">
			

			
			<table id="infoNaruto">
				<tbody>
					<th>
						<td colspan="11">Infos sur notre meilleur Hokage</td>
					</th>
				
				
					<tr>
						<td>Nom</td>
						<td>Prenom</td>
						<td>Sexe</td>
						<td>Age</td>
						<td>Taille</td>
						<td>Poids</td>
						<td>Village</td>
						<td>Grade</td>
						<td>Sensei</td>
						<td>Jutsu</td>
						<td>Descriptio</td>
					</tr>

					<tr>
						<td>Uzumaki</td>
						<td>Naruto</td>
						<td>M</td>
						<td>12</td>
						<td>1m45</td>
						<td>40kgs</td>
						<td>Konohagakure</td>
						<td>Genin</td>
						<td>Kakashi Hatake</td>
						<td>Oiroke no jutsus, Kage Bushin no jutsu, Harem no jutsus, Rasengan...</td>
						<td><textarea cols="30" rows="5">Personnage principale de la serie, Naruto est assez turbulent et casse-cou. Il est le meilleur ami de Sasuke qu'il envie quelque fois car il l'admire. Il est amoureux de Sakura mais elle le deteste!! Il était le cancre de l'académie des ninjas mais il est très fort et très imprevisible. Il est déterminé et plein de volonté! Et surtout, le démon kyubi, scellé en lui, lui donne une force incroyable! Son reve est de devenir hokage.</textarea> </td>

					</tr>
				</tbody>
			</table>

		</section>
	</main>

	<?php require 'footer.php';?>
	
</body>
</html>
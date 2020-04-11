<html>

<?php
require 'class/bdd.php';
require 'class/user.php';

session_start();

$connexion = mysqli_connect("localhost", "root", "", "blog");

if (isset($_GET['id'])) 
{
	$requeteArticle = "SELECT * FROM articles WHERE id = '".$_GET['id']."'";
	$queryArticle = mysqli_query($connexion, $requeteArticle);
	$resultArticle = mysqli_fetch_all($queryArticle);

	$requeteUser = "SELECT * FROM utilisateurs WHERE login = '".$_SESSION['login']."'";
	$queryUser = mysqli_query($connexion, $requeteUser) ;
	$resultUser = mysqli_fetch_all($queryUser);

	
}




?>

<head>
	<title>Articles</title> 
	<link rel="stylesheet" href="css/style.css">
	
</head>

<div class="banniere">
		<div class="logo">
			<img src="img/logo.png">
		</div>
	</div>

<body id="bodyArticle">
<div class="banniere">
		<div class="logo">
			<img src="img/logo.png">
		</div>
	</div>

	<?php require 'header.php';?>

	<main id="mainArticle">
		<?php

		if (isset($_SESSION['login'])) 
		{?>
			
			<div id="infoArticle">
				Titre :
				<?php
				echo $resultArticle[0][1];
				?>
				Créer par : <?php ?>
			</div>

			<div>
				<?php

				$requeteCommentaire = "SELECT * FROM commentaires WHERE id_article='".$_GET['id']."'";
				$queryCommentaire = mysqli_query($connexion, $requeteCommentaire);
				$resultCommentaire = mysqli_fetch_all($queryCommentaire);

				$nbCommentaire = count($resultCommentaire);

				//echo $requeteCommentaire;
				//var_dump($resultCommentaire);

				if (empty($resultCommentaire)) 
				{
					echo "PAS DE COMMENTAIRE";
				}
				else
				{
					for ($i=0; $i < $nbCommentaire ; $i++) 
					{ 

						echo $resultCommentaire[$i][1];
						echo "<br />";

					}

				}


				?>
			</div>

			<div>
				<form action="articles.php?id=<?php echo $resultArticle[0][0]?>" method="post">

					<textarea name="commentaire" placeholder="Votre Message"></textarea>
					<br />
					<input id="button1" type="submit" name="envoyer" value="Envoyer">

				</form>

				<?php

				if (isset($_POST['envoyer'])) 
				{
					$date = date("Y-m-d H:i:s");

					$requeteNewMessage = "INSERT INTO commentaires (commentaire, id_article, id_utilisateur, date) VALUES ('".$_POST['commentaire']."', '".$_GET['id']."', '".$resultUser[0][0]."', '".$date."')";

					$queryNewMessage = mysqli_query($connexion, $requeteNewMessage) ;
					header('Location:articles.php?id='.$_GET['id'].'');

					echo $requeteNewMessage;
					var_dump($resultUser);

				}
				?>
			</div>
		<?php
		}
		else
		{
			echo "Vous devez etre connecter pour avoir accés a cette partit du blog";
		}
		?>
	</main>


	<?php require 'footer.php'?>


</body>

</html>

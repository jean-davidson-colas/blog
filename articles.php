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

	

    $requeteMessage = "SELECT commentaires.id,commentaire,id_article,id_utilisateur,date,utilisateurs.id,login,password,email,id_droits FROM commentaires INNER JOIN utilisateurs ON utilisateurs.id = commentaires.id_utilisateur WHERE id_article = '".$_GET['id']."'";
    $queryMessage = mysqli_query($connexion, $requeteMessage);
    $resultMessage = mysqli_fetch_all($queryMessage);

    

	
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

	<?php require 'header.php';?>

	<main id="mainArticle">
		<?php

		if (isset($_SESSION['login'])) 
		{?>
			
			<div id="infoArticle">
				Article :<br/>
				<?php
				echo $resultArticle[0][1];
				?>
				
			</div>

			<section id="sectionCommentaire">

				
				
					<?php

					$requeteCommentaire = "SELECT * FROM commentaires WHERE id_article='".$_GET['id']."'";
					$queryCommentaire = mysqli_query($connexion, $requeteCommentaire);
					$resultCommentaire = mysqli_fetch_all($queryCommentaire);

					$nbCommentaire = count($resultCommentaire);

					


					if (empty($resultCommentaire)) 
					{
						echo "PAS DE COMMENTAIRE";
					}
					else
					{
						for ($i=0; $i < $nbCommentaire ; $i++) 
						{ ?>

							<div id="userCommentaire">
								Utilisateur :
								<?php
								echo $resultMessage[$i][6];
								?>
							</div>

							<div id="commentaire">
								<?php	
								echo $resultCommentaire[$i][1];
								echo "<br />";
								?>
								<br />
								<?php

								if ($_SESSION['id_droits'] = 1337) 
								{?>
									<div id="delete">
                                            <a href="delete.php?id_article=<?php echo "".$resultArticle[0][0].""; ?>&&id=<?php echo "".$resultCommentaire[$i][0].""; ?>">Supprimer</a>                                       
                                    </div>
								<?php
								}?>
								
                                    

								
							</div>
						<?php
						}

					}


					?>
				
			</section>

			<div id="newCommentaire">
				<form action="articles.php?id=<?php echo $resultArticle[0][0]?>" method="post">

					<textarea rows="10" cols="30" name="commentaire" placeholder="Votre Message"></textarea>
					<br />
					<input id="button1" type="submit" name="envoyer" value="Envoyer">

				</form>

				<?php

				if (isset($_POST['envoyer']) AND !empty($_POST['commentaire'])) 
				{
					$date = date("Y-m-d H:i:s");

					$requeteNewMessage = "INSERT INTO commentaires (commentaire, id_article, id_utilisateur, date) VALUES ('".$_POST['commentaire']."', '".$_GET['id']."', '".$resultUser[0][0]."', '".$date."')";

					$queryNewMessage = mysqli_query($connexion, $requeteNewMessage) ;
					header('Location:articles.php?id='.$_GET['id'].'');

					

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

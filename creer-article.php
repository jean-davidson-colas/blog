<?php
	
    session_start();
    date_default_timezone_set('Europe/Paris');
   
    $connexion = mysqli_connect("localhost", "root", "", "blog");

    $requeteCptCat = "SELECT nom FROM categories";
    $queryCptCat = mysqli_query($connexion, $requeteCptCat);
    $resultCptCat = mysqli_fetch_all($queryCptCat);

    $nbCat = count($resultCptCat);
    //var_dump($resultCptCat);


    $requeteInfoUser = "SELECT * FROM utilisateurs WHERE login = '".$_SESSION['login']."'";
    $queryInfoUser = mysqli_query($connexion, $requeteInfoUser);
    $resultInfoUser = mysqli_fetch_assoc($queryInfoUser) ;
    //var_dump($resultInfoUser);

   


    if (isset($_POST['addArticle'])) 
    {
    	$newArticle = $_POST['newArticle'];

    	
    	$date = date("Y-m-d H:i:s");

    	$requeteCat = "SELECT * FROM categories WHERE nom = '".$_POST['categories']."'";
    	$queryCat = mysqli_query($connexion, $requeteCat);
    	$resultCat = mysqli_fetch_assoc($queryCat);

    	


    	$requeteNewArticle = "INSERT INTO articles (article, id_utilisateur, id_categorie, date)VALUES ('$newArticle', '".$resultInfoUser['id']."', '".$resultCat['id']."', '$date')";
    	$queryNewArticle = mysqli_query($connexion, $requeteNewArticle);
    	

    	
    	
    }

?>



<html>

<head>
	<title>Creer Article</title> 
	<link rel="stylesheet" href="css/style.css">
	
</head>

<body>

	<?php require 'header.php';?>

	<main>
		<?php

		if (isset($_SESSION['login'])) 
		{
		?>
			<section id="creerArticle">
			
					<form method="post" action="creer-article.php">
						<label>Article : </label><br/>
						<textarea name="newArticle" placeholder="Entrer Votre Article ICI" rows="10" cols="60" resize="none" required></textarea>
						<br />
						<br />

						<select type="post" name="categories" required>
							
						<?php

							for ($i=0; $i < $nbCat ; $i++) 
							{ ?>
								<option> <?php echo $resultCptCat[$i][0];  ?></option>
							<?php
							}

						?>
							
							
						</select><br />

						<input type="submit" name="addArticle" value="Valider">

					</form>
					
		
			</section>
		<?php
		}
		else
		{
			echo "VOUS DEVEZ ETRE CO POUR CREE UN ARTICLE";
		}
		?>	
	</main>


	<?php require 'footer.php'?>


</body>

</html>

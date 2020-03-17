<?php
	session_start();

	$serverName = "localhost";
    $userName = "root";
    $passwordServer = "";
    $nameTable = "blog";

    $connexion = mysqli_connect("$serverName", "$userName", "$passwordServer", "$nameTable") ;

    $requeteCptCat = "SELECT nom FROM categories";
    $queryCptCat = mysqli_query($connexion, $requeteCptCat);
    $resultCptCat = mysqli_fetch_all($queryCptCat);

    $nbCat = count($resultCptCat);
    var_dump($resultCptCat);

    if (isset($_POST['addArticle'])) 
    {
    	$newArticle = $_POST['newArticle'];

    	$requeteNewArticle = "INSERT INTO "
    	
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
		<section id="creerArticle">
			
					<form method="post">
						<label>Article : </label><br/>
						<textarea name="newArticle" placeholder="Entrer Votre Article ICI" rows="10" cols="60" resize="none" required></textarea>
						<br />
						<br />

						<select type="post" name="categories" required>
							<option>Categories</option>
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

	</main>


	<?php require 'footer.php'?>


</body>

</html>

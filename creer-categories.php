<?php
	session_start();

	$serverName = "localhost";
    $userName = "root";
    $passwordServer = "";
    $nameTable = "blog";

    $connexion = mysqli_connect("$serverName", "$userName", "$passwordServer", "$nameTable") ;

    

    if (isset($_POST['addCat'])) 
    {
    	$newCat = $_POST['newcategorie'];
    	$requeteNewCategorie = "INSERT INTO categories (nom) VALUES ('".$newCat."') ";
    	$queryNewCategorie = mysqli_query($connexion, $requeteNewCategorie) ;
    	header("location:index.php");

    }


?>

<!DOCTYPE html>
<html>
<head>
	<title>Cree Categories</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php require 'header.php';?>

	<main>
		<?php
			if ($_SESSION['id_droits'] = 1337) 
			{
				
			
		
		?>
				
				<section id="newCategorie">

					<form action="creer-categories.php" method="post" id="formCategorie">
						<label>Nom Categorie :</label>
						<input type="text" name="newcategorie">
						<br/>
						<input type="submit" name="addCat" value="Ajouter">
					</form>
					
				</section>
		<?php
			}
			else
			{
				echo "Vous ne pouvez pas cree de categories";
			}

		?>
	</main>

	<?php require 'footer.php';?>

</body>
</html>
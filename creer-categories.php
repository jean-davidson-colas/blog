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
			/*if (role admin ou modo) 
			{
				
			
		*/
		?>
				
				<section id="newCategorie">

					<form method="post">
						<label>Nom Categorie :</label>
						<input type="text" name="newcategorie">
						<br/>
						<input type="submit" name="addCat" value="Ajouter">
					</form>
					
				</section>
		<?php
			/*}*/


		?>
	</main>

	<?php require 'footer.php';?>

</body>
</html>
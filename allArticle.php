<html>

<?php
	require 'class/bdd.php';
	require 'class/user.php';

	session_start();

	$connexion = mysqli_connect("localhost", "root", "", "blog");

	

	if (isset($_GET['id_cat'])) 
	{
		$requeteAllArticle = "SELECT * FROM articles WHERE id_categorie = '".$_GET['id_cat']."' ";
		$queryAllArticle = mysqli_query($connexion, $requeteAllArticle);
		$resultAllArticle = mysqli_fetch_all($queryAllArticle);


		$nbArticle = count($resultAllArticle);
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
<body id="bodyAllArticle">

	<?php require 'header.php';?>

	<main>
		<?php

		if (isset($_SESSION['login'])) 
		{
			

			$articleParPage=5;
			$nombreDePages=ceil($nbArticle/$articleParPage);

			if(isset($_GET['page'])) 
			{
				$pageActuelle=intval($_GET['page']);

     			if($pageActuelle>$nombreDePages) 
     			{
     				$pageActuelle=$nombreDePages;
     			}
     		}
			else 
			{
    			$pageActuelle=1;   
    		}

 			$premiereEntree=($pageActuelle-1)*$articleParPage; // On calcule la première entrée à lire
 			$requetePageArticle = "SELECT * FROM articles WHERE id_categorie = '".$_GET['id_cat']."' ORDER BY date DESC LIMIT $articleParPage OFFSET $premiereEntree ";
 			$retourArticle=mysqli_query($connexion, $requetePageArticle);
 			$donneesArticle= mysqli_fetch_all($retourArticle);
 			
 			$nbArticleParPage = count($donneesArticle);
 			

 			?>
 			<section id="allArticle">
 				
 			<?php
 				for ($i=0; $i < $nbArticleParPage; $i++) 
 				{ ?>
				
					<div class="articles"> <a href="articles.php?id=<?php echo $donneesArticle[$i][0] ?>"><?php echo $donneesArticle[$i][1];?></a></div>

				<?php
				}
				?>
			

			<?php
 			

 			echo '<p align="center">Page : '; 
			for($i=1; $i<=$nombreDePages; $i++) 
			{
    
     			if($i==$pageActuelle) 
     			{
     				echo ' [ '.$i.' ] '; 
     			}    
     			else 
     			{
     				echo ' <a href="allArticle.php?id_cat='.$_GET['id_cat'].'&&page='.$i.'">'.$i.'</a> ';
     			}
 			}
 			echo '</p>';?>
			</section>
			
		<?php
		}
		else
		{
			echo "Vous devez etre connecter pour pouvoir voir les articles affichés.";
		}

		?>
		
	</main>


	<?php require 'footer.php'?>


</body>

</html>


<?php
	session_start();

	$serverName = "localhost";
    $userName = "root";
    $passwordServer = "";
    $nameTable = "blog";
    $connexion = mysqli_connect("$serverName", "$userName", "$passwordServer", "$nameTable") ;

	if (isset($_GET['id']) AND $_SESSION['id_droits'] = 1337 ) 
	{
		$deleteMessage = "DELETE FROM commentaires WHERE id = '".$_GET['id']."' ";
		$queryMessage = mysqli_query($connexion, $deleteMessage) ;

		header('Location:articles.php?id='.$_GET['id_article'].'');
	}
	else
	{
		echo "VOUS NE POUVEZ PAS SUPPRIMER DE MESSAGES <br /> VOUS N'ETES PAS ADMIN OU MODO";
	}

?>
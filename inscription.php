<html>

<?php
require 'class/bdd.php';
require 'class/user.php';


session_start();

$_SESSION['bdd'] = new bdd();


$user = new user();

if(!isset($_SESSION['id'])){
header('Location:index.php');
}

?>



<head>
        <title>Inscription</title> 
        <link rel="stylesheet" href="css/style.css">
        
</head>

<body>
<div class="banniere">
		<div class="logo">
			<img src="img/logo.png">
		</div>
	</div>
<?php require 'header.php'?>

    <main>

    <section>
                 <h1>Inscription</h1>
    
        <form class="formulaire" action="inscription.php" method="post">

            <label>Identifiant</label>
            <input type="text" name="login" required><br>
            <label>Email</label>
            <input type="mail" name="mail" required><br>
            <label>Mot de passe</label>
            <input type="password" name="password" minlength="5" required><br>
            <label>Confirmation du mot de passe</label>
            <input type="password" name="passwordconf" minlength="5" required><br>
           
            <input type="submit" name="envoyer">
        </form>

    </section>
<section>
<?php

if(isset($_POST['envoyer'])){
    if($_SESSION["user"]->inscription($_POST['login'],$_POST["password"],$_POST['passwordconf'],$_POST['mail']) == "ok"){
        ?>
        <p>Le compte a été créé.</p>
        <?php
    }
    elseif($_SESSION["user"]->inscription($_POST['login'],$_POST["password"],$_POST['passwordconf'],$_POST['mail']) == "log"){
        ?>
            <p>L'identifiant ou l'email est déjà pris.</p>
        <?php
    }
    elseif($_SESSION["user"]->inscription($_POST['login'],$_POST["password"],$_POST['passwordconf'],$_POST['mail']) == "empty"){
        ?>
            <p>Veuillez remplir tous les champs.</p>
        <?php
    }
    elseif($_SESSION["user"]->inscription($_POST['login'],$_POST["password"],$_POST['passwordconf'],$_POST['mail']) == "mdp"){
        ?>
            <p>Les mots de passes ne sont pas identiques.</p>
        <?php
    }
}
?>
</section>

    </main>

<?php require 'footer.php';?>


</body>

</html>
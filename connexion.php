<html>

<?php 
require 'class/bdd.php';
require 'class/user.php';

session_start();

if(!isset($_SESSION['bdd']))
{
    $_SESSION['bdd'] = new bdd();
}
if(!isset($_SESSION['user'])){
    $_SESSION['user'] = new user();
}
if($_SESSION['user']->isConnected() != false){
    header('Location:index.php');
}
?>



<head>
<meta charset="utf-8" />
        <title>Connexion</title> 
        <link rel="stylesheet" href="css/style.css">
        

</head>

<body>

<?php require 'header.php'?>


<main>

<section class="connexion">
                 <h1> Connexion </h1>
   
        <form class="formulaire" action="connexion.php" method="post">
        
            <label>Identifiant</label>
            <input type="text" name="login" required><br>
            <label>Mot de passe</label>
            <input type="password" name="password" required><br>

            <input type="submit" name="send">
        </form>

</section>
<section>
<?php
if(isset($_POST["send"])){
    if($_SESSION["user"]->connexion($_POST["login"],$_POST["password"]) == false){
        ?>
            <p>Un problème est survenue lors de la connexion. Veuillez vérifer vos informations de connexion.</p>
        <?php
    }
    else{
        $_SESSION["user"]->connexion($_POST["login"],$_POST["password"]);
        $_SESSION["login"] = false;
        if($_SESSION['user']->getrole() == "admin"){
            $_SESSION["role"] = true;
        }
        header('location:index.php');
    }
    
}

?>
</section>

</main>

<?php require 'footer.php'?>

</body>

</html>
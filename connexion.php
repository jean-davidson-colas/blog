<html>

<?php 
require 'class/bdd.php';
require 'class/user.php';

session_start();



    $_SESSION['bdd'] = new bdd();


    $user = new user();

    if(isset($_SESSION['id'])){
        header('Location:index.php');
        }
?>



<head>
<meta charset="utf-8" />
        <title>Connexion</title> 
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Leckerli+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

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
    $user->connexion($_POST["login"],$_POST["password"]);
    
}

?>
</section>

</main>

<?php require 'footer.php'?>

</body>

</html>
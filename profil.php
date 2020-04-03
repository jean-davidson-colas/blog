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
if($_SESSION['user']->isConnected() != true){
    header('Location:index.php');
}?>
<html>

<head>
        <title>Profil</title> 
        <link rel="stylesheet" href="css/style.css">
        
</head>

<body>

<?php require 'header.php'?>


<main>

<?php
echo "<h1>Bonjour $login !!</h1>";
?>
<section>
    <h1> Mon compte </h1>
            <form action="profil.php" class="formulaire" method="post">
                <label>Login</label>
                <input type="text" name="login" required><br>
                <label>Mail</label>
                <input type="mail" name="mail" required><br>
                <label>Password</label>
                <input type="password" name="password" minlength="12"required ><br>
                <label>Password confirm</label>
                <input type="password" name="passwordconf" minlength="12" required><br>
                
                <input type="submit" name="envoyer">
                </form> 
            
 
        </section>

<?php
if(isset($_POST["envoyer"])){
    if(!empty($_POST["passwordconf"])){
        if(!empty($_POST["login"])){
            $_SESSION['user']->profil($_POST["passwordconf"],$_POST["login"],NULL,NULL,NULL,NULL);
        }
        if(!empty($_POST["mail"])){
            $_SESSION['user']->profil($_POST["passwordconf"],NULL,NULL,NULL,$_POST["mail"],NULL);
        }
        if(!empty($_POST["password"])){
            $_SESSION['user']->profil($_POST["passwordconf"],NULL,NULL,NULL,NULL,$_POST["password"]);
        }
    }
    else{
        ?>
            <p>Veuillez rentrer votre ancien mot de passe pour valider vos changements.</p>
        <?php
    }
}

?>

</main>

<?php require 'footer.php'?>


</body>

</html>
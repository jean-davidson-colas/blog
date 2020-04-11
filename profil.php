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
<html>

<head>
        <title>Profil</title> 
        <link rel="stylesheet" href="css/style.css">
        
</head>

<body class = "profil">
<div class="banniere">
		<div class="logo">
			<img src="img/logo.png">
		</div>
	</div>

<?php include 'header.php'?>


<main>
<section>
    <h1> Mon compte </h1>

    <h1>Bienvenue <?php echo $_SESSION['login'];?></h1>
    
            <form action="profil.php" class="formulaire" method="post">

                <?php
                if (!empty($resultatInfosProfil['avatar'])) 
                { ?>
                    <img src="avatar/<?php echo $resultatInfosProfil['avatar'] ?>" width="200" ><br><br>
                <?php
                }?>
                

                

                    <label>Login</label>
                    <input type="text" name="login" required><br>
                    <label>Mail</label>
                    <input type="mail" name="mail" required><br>
                    <label>Password</label>
                    <input type="password" name="password" minlength="12"required ><br>
                    <label>Password confirm</label>
                    <input type="password" name="passwordconf" minlength="12" required><br>
                
                    <input type="submit" name="envoyer">
                <?php
                
                if($_SESSION['id_droits'] == 1337)
                { ?>
                    <label> Rôle du membre : </label><br>
                    <select type="post" name="roleinput"><br>
                        <option>Changer de rôle</option>
                        <option value="Admin">Admin</option>
                        <option value="Modo">Modo</option>
                        <option value="Membre">Membre</option>
                    </select>
                    <br><input type="submit" value="Modifier le rôle" name="modifierrole" />
                        <?php } ?>
                </form> 
            
 
        </section>

<?php
if(isset($_POST["envoyer"])){
    if(!empty($_POST["passwordconf"])){
        if(!empty($_POST["login"])){
            $user->profil($_POST["passwordconf"],$_POST["login"],NULL,NULL,NULL,NULL);
        }
        if(!empty($_POST["mail"])){
            $user->profil($_POST["passwordconf"],NULL,NULL,NULL,$_POST["mail"],NULL);
        }
        if(!empty($_POST["password"])){
            $user->profil($_POST["passwordconf"],NULL,NULL,NULL,NULL,$_POST["password"]);
        }
    }
    else{
        ?>
            <p>Veuillez rentrer votre ancien mot de passe pour valider vos changements.</p>
        <?php
    }
}


if (isset($_FILES['avatar']) AND !empty($_FILES['avatar'])) 
{
    $tailleMax = 2097152 ;
    $extensionsValides = $arrayName = array('jpg', 'jpeg', 'gif', 'png');
    if ($_FILES['avatar']['size'] <= $tailleMax) 
    {
        $extensionsUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
        if (in_array($extensionsUpload, $extensionsValides)) 
        {
            $chemin = "avatar/".$resultatInfosProfil['login'].".".$extensionsUpload;
            echo $chemin;
            $deplacement = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
            if ($deplacement) 
            {
                $updateAvatar = "UPDATE utilisateurs SET avatar = '".$resultatInfosProfil['login'].".".$extensionsUpload."' WHERE id = ".$resultatInfosProfil['id']."";
                $queryAvatar = mysqli_query($connexion,$updateAvatar);
            }
            else
            {
                $msg = "Erreur durant l'importation de votre photo de profil" ;
            }
        }
        else
        {
            $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png. ";
        }

    }
    else
    {
        $msg = "Votre photo de profil ne doit pas dépasser 2Mo" ;
    }
}

?>
</br>
<section><p></p>
<iframe width=100% height="615" src="https://www.youtube.com/embed/FOfWwN8lp9s" 
		frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</section>
<section width=100% >
<p>Contrairement à une opinion répandue, le Lorem Ipsum n'est pas simplement du texte aléatoire.
Il trouve ses racines dans une oeuvre de la littérature latine classique datant de 45 av. J.-C., 
le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney College, en Virginie, s'est intéress
à un des mots latins les plus
Contrairement à une opinion répandue, le Lorem Ipsum n'est pas simplement du texte aléatoire.
Il trouve ses racines dans une oeuvre de la littérature latine classique datant de 45 av. J.-C., 
le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney College, en Virginie, s'est intéress
à un des mots latins les plusContrairement à une opinion répandue, le Lorem Ipsum n'est pas simplement du texte aléatoire.
Il trouve ses racines dans une oeuvre de la littérature latine classique datant de 45 av. J.-C., 
le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney College, en Virginie, s'est intéress
à un des mots latins les plus</p>
</section>
</main>

<?php require 'footer.php'?>


</body>

</html>
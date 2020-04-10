<header>

<?php
date_default_timezone_set('UTC');


if (isset($_SESSION['login']))
 {
    $login = $_SESSION['login'];
    $today = date("d.m.y")
?>

<nav>
    <ul>
        <?php 
        if($_SESSION['id_droits'] == 1337)
        {
        ?>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="admin.php">Admin</a>
            <li><a href="profil.php">profil</a>
            <li><a href="allArticle.php">Article</a>
            <li><a href="creer-article.php">Add Article</a></li>
            <li><a href="creer-categories.php">Add Categorie</a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        <?php
        }
        else if ($_SESSION['id_droits'] == 42) 
        {?>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="modo.php">modérateur</a>
            <li><a href="profil.php">profil</a>
            <li><a href="allArticle.php">Article</a>
            <li><a href="creer-article.php">Add Article</a></li>
            <li><a href="creer-categories.php">Add Categorie</a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        <?php
        }
        else if ($_SESSION['id_droits'] == 1) 
        {?>
           <li><a href="index.php">Accueil</a></li>
           <li><a href="allArticle.php">Article</a>
            <li><a href="profil.php">Mon compte</a></li>
            <li><a href="creer-article.php">Add article</a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        <?php
        }
        ?>
        
        

    </ul>
 </nav>
<?php 
}
else
 {
?>
<nav>
    <ul>
            <li><a href="index.php"> Accueil</a></li>
            <li><a href="inscription.php"> Inscription</a></li>
            <li><a href="connexion.php"> Connexion</a></li> 
            
            
             
     </ul>
</nav>

<?php
 }
?>

</header>
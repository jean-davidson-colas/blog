<header>

<?php
date_default_timezone_set('UTC');

$requeteCptCat = "SELECT * FROM categories";
$queryCptCat = mysqli_query($connexion, $requeteCptCat);
$resultCptCat = mysqli_fetch_all($queryCptCat);

$nbCat = count($resultCptCat);

if (isset($_SESSION['login']))
 {
    $login = $_SESSION['login'];
    $today = date("d.m.y")
?>

<nav>
    <ul>
        <?php 
        if($_SESSION['id_droits'] = 1337)
        {
        ?>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="admin.php">Admin</a>
        <li class="dropdown">
            <a href="allArticle.php">Articles</a>
            <div class="dropdown-content">
            
                <?php

                for ($i=0; $i < $nbCat ; $i++) 
                    { ?>
                        <a href="allArticle.php?id_cat=<?php echo $resultCptCat[$i][0] ?>"> <?php echo $resultCptCat[$i][1];  ?></a>
                        <?php
                    }

                ?>
            </div>

        </li>
        <li><a href="creer-article.php">Add Article</a></li>
        <li><a href="creer-categories.php">Add Categorie</a></li>
        <li><a href="deconnexion.php">Déconnexion</a></li>
        <?php
        }
        elseif ($_SESSION['id_droits'] = 42) 
        {?>
            <li><a href="index.php">Accueil</a></li>
            <li class="dropdown">
            <a href="allArticle.php">Articles</a>
            <div class="dropdown-content">
            
                <?php

                for ($i=0; $i < $nbCat ; $i++) 
                    { ?>
                        <a href="allArticle.php?id=<?php echo $resultCptCat[$i][0] ?>"> <?php echo $resultCptCat[$i][1];  ?></a>
                        <?php
                    }

                ?>
            </div>

        </li>
            <li><a href="creer-article.php">Add Article</a></li>
            <li><a href="creer-categories.php">Add Categorie</a></li>
            <li><a href="deconnexion.php">Déconnexion</a></li>
        <?php
        }
        elseif ($_SESSION['id_droits'] = 1) 
        {?>
           <li><a href="index.php">Accueil</a></li>
           <li class="dropdown">
            <a href="allArticle.php">Articles</a>
            <div class="dropdown-content">
            
                <?php

                for ($i=0; $i < $nbCat ; $i++) 
                    { ?>
                        <a href="allArticle.php?id=<?php echo $resultCptCat[$i][0] ?>"> <?php echo $resultCptCat[$i][1];  ?></a>
                        <?php
                    }

                ?>
            </div>

        </li>
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
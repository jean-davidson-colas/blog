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
if($_SESSION['user']->getrole() != "admin"){
    //header('Location:index.php');
}

?>
<html>

<head>
        <title>Administration</title> 
        <link rel="stylesheet" href="css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Leckerli+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body>

<?php require 'header.php'?>


<main>
<section>
    <h1> Administration du site </h1>
            
</section>


<?php
$_SESSION['bdd']->connect();
$uti=$_SESSION['bdd']->execute("SELECT * FROM utilisateurs");
//var_dump($uti);
//$resa=$_SESSION['bdd']->execute("SELECT reservations.debut,reservations.fin,reservations.id,utilisateurs.login  FROM reservations INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id");

$_SESSION['bdd']->close();

foreach($uti as $utili) 
{ 
     
?>
<table>
<thead>
    <tr>
        <th>id</th>
        <th>login</th>
        <th>email</th>
        <th>id_droits</th>
    </tr>
</thead>
<tbody>
    <tr>
    <td><?php echo $utili[0] ; ?> </td>
    <td><?php echo $utili[1] ; ?> </td>
    <td><?php echo $utili[3] ; ?> </td>
    <td><?php echo $utili[4] ; ?> </td>
    <td>
    <form method="post" action="admin.php" id="suppression">
    <button type="submit" id="submit" name="resat" value ="<?php echo $utili[2];?>">Supprimer</button></form>
    </td>
    </tr>
</tbody>
</table>
<?php
//*suppression de l'article 
if(isset($_POST['resat']))
{
    $_SESSION['bdd']->delete();
    header('Location:admin.php');
    //$_SESSION['bdd']->execute("DELETE reservations.debut,reservations.fin FROM reservations WHERE `reservations`.`id` = 28");
    //$suppr = $_SESSION['bdd']->execute("DELETE FROM reservations WHERE id = '".$_POST['resat']."'");
    //var_dump($suppr);
}

}
$_SESSION['bdd']->connect();
$art=$_SESSION['bdd']->execute("SELECT * FROM articles ORDER BY id_utilisateur");
var_dump($art);

foreach($art as $art3) 
{ 
     
?>
<table>
<thead>
    <tr>
        <th>id.article</th>
        <th>id.utilisateur</th>
        <th>id.categorie</th>
        <th>article</th>
        <th>date</th>
        
    </tr>
</thead>
<tbody>
    <tr>
    <td><?php echo $art3[0] ; ?> </td>
    <td><?php echo $art3[2] ; ?> </td>
    <td><?php echo $art3[3] ; ?> </td>
    <td><?php echo $art3[1] ; ?> </td>
    <td><?php echo $art3[4] ; ?> </td>
    <td></td>
    <td>
    <form method="post" action="admin.php" id="modifier">
    <input type="text" name="<?php echo $art3[2] ;?>" value =""></td>
    <td>
    <input type="submit" id="submit" name="price<?php echo $art3[2];?>" value="Modifier"/>
    </form>
    </td>
    </tr>
</tbody>
  </table>  
<?php
//Modifier les prix 

if(isset($_POST['price'.$art3[2]]))
{
    $_SESSION['bdd']->update($art3[2]);
    header('Location:admin.php');
    
    
}

}
    
?>

</main>

<?php require 'footer.php'?>


</body>

</html>
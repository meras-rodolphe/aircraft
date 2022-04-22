<?php 
require 'header_admin.php';
require 'bdd.php';
session_start();
if(!$_SESSION['nom']){
    header(location: connexion.php);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet"  href="style.css">
    <title>Document</title>
</head>
<body>
    <button><a href="ajouter-avion.php">Ajouter un avion</a></button>
    

 <?php 
        $recupAvions = $bdd->query('SELECT * FROM avions');
        while($avion = $recupAvions->fetch()){
         ?> 
         <div class="avion">
             <h2><?= $avion['programme']; ?></h2>
             <h2><?="<img src='./upload/".$avion['name']."' width='300px' ><br>"; ?></h2>
             <a href="supprimer_avion.php?id=<?= $avion['id_avion']; ?>">
             <button style="color:white; background-color: red">Supprimer avion</button>
             <a href="modifier_avion.php?id=<?= $avion['id_avion']; ?>">
             <button style="color:black; background-color: yellow">Modifier avion</button>
            </a>
        </div>
     <?php
        }
    ?>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
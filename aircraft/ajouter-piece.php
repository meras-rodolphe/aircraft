<?php 
require './image.php';
require 'header.php';
session_start();
try{
    $bdd = new PDO('mysql:host=localhost;dbname=aircraft;charset=utf8;', 'root', '');
}catch(PDOException $e){
    die('Erreur connexion : '.$e->getMessage());
}
if(!$_SESSION['nom']){
    header(location: connexion.php);
}

if(isset($_POST['envoi'])){
    if(!empty($_POST['nom_piece']) AND !empty($_POST['programme']) AND empty($_FILES['name']) AND !empty($_POST['service'])){
        $nom_piece = htmlspecialchars($_POST['nom_piece']);
        $programme = htmlspecialchars($_POST['programme']);
        $service = htmlspecialchars($_POST['service']); 

        $insererPiece = $bdd->prepare('INSERT INTO pieces (nom_piece, programme, name, service) VALUES (?, ?, ?, ?)');
        $insererPiece->execute(array($nom_piece,$programme,$file,$service));
        echo 'Pièce bien ajouter';
    }else{
        echo 'Veuillez compléter tous les champs..';
    }
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
    <title>Ajouter une piece</title>
</head>
<body>
   <form action="ajouter-piece.php" method="POST" enctype="multipart/form-data">
       <label for="nom_piece">Nom de la piece</label>
       <input type="text" name="nom_piece">
       <br>
       <label for="programme">Nom du programme.</label>
       <input type="text" name="programme">
       <br>
       <label for="file">Ajouter plan</label>
       <input type="file" name="file">
       <br>
       <label for="service">Service</label>
       <input type="text" name="service">
       <br>
       <input type="submit" name="envoi">
       
   </form>
    <br>
    <button><a href=piece.php>Retour</a></button>
   
    
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html> 


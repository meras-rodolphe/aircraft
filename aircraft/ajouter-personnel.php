<?php 
require 'header.php';
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=aircraft;charset=utf8;', 'root', '');

if(!$_SESSION['nom']){
    header(location: connexion.php);
}

if(isset($_POST['envoi'])){
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['date']) AND !empty($_POST['service'])){
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $date = htmlspecialchars($_POST['date']);
        $service = htmlspecialchars($_POST['service']);
        
        $insererUser = $bdd->prepare('INSERT INTO users (nom, prenom, date, service) VALUES (?, ?, ?, ?)');
        $insererUser->execute(array($nom,$prenom,$date,$service));
        echo 'Personnel bien ajouter';
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet"  href="style.css">
    <title>Ajouter personnel</title>
</head>
<body>
   <form method="POST">
       <label for="nom">Nom:</label>
       <input type="text" name="nom">
       <br>
       <label for="prenon">Prénom:</label>
       <input type="text" name="prenom">
       <br>
       <label for="date-de-naissance">Date de naissance:</label>
       <input type="date" name="date">
       <br>
       <label for="service">Service:</label>
       <input type="text" name="service">
       <br>
       <input type="submit" name="envoi">
       
   </form>
    <br>
    <button><a href='personnel.php'>Retour</a></button>
   
    
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html> 
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
    if(!empty($_POST['programme']) AND empty($_FILES['name'])){
        $programme = htmlspecialchars($_POST['programme']);
        
        $insererAvion = $bdd->prepare('INSERT INTO avions (programme, name) VALUES (?, ?)');
        $insererAvion->execute(array($programme,$file));
        echo 'Avion bien ajouter';
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
    <title>Ajouter un avion</title>
</head>
<body>
   <form action="ajouter-avion.php" method="POST" enctype="multipart/form-data">
       <label for="programme">Programme</label>
       <input type="text" name="programme">
       <br>
       <label for="file">Ajouter</label>
       <input type="file" name="file">
       <input type="submit" name="envoi">
       
   </form>
    <br>
    <button href=avion.php>Retour</button>
   
    
</body>
</html> 


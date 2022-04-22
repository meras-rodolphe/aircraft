<?php
require 'bdd.php';
session_start();
if(isset($_POST['submit'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $req = $bdd->prepare('SELECT * FROM admins WHERE nom = ? AND prenom = ?');
    $req->execute(array($nom, $prenom));
    $resultat = $req->fetch();
    if($resultat){
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        header('location: administrateur.php');
    }
    else{
        echo '<p>Mauvais identifiant</p>';
    }
}
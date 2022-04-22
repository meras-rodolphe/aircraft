<!-- Système de déconnexion avec envoi vers connexion.php -->
<?php
session_start();
$_SESSION = array();
session_destroy();
header('location: connexion.php');
?>
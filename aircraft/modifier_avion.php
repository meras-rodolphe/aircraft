<?php 
require 'header.php';
$bdd = new PDO('mysql:host=localhost;dbname=aircraft;charset=utf8;', 'root', '');
if(isset($_GET['id_avion'])){
    $getid = $_GET['id_avion'];

    $recupAvion = $bdd->prepare('SELECT * FROM avions WHERE id_avion = ?');
    $recupAvion->execute(array($getid));
    if ($recupeAvion->rowCount() > 0){
        $avionInfos = $recupeAvion->fetch();
        $programme = $avionInfos['programme'];
        if(isset($_POST['Valider'])){
        $programme_saisi = htmlspecialchars($_POST['programme']);
        $updateAvion = $bdd->prepare('UPDATE avions SET programme = ? WHERE id_avion = ?');
        $updateAvion->execute(array($programme_saisi));
        }
    }else{
        echo "Aucun avion trouvé.";
    }
}else{
    echo "Aucun programme trouvé!";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier avion.</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="programme">
        <br>
        <input type="submit" name="Valider">
    </form>

</body>
</html>
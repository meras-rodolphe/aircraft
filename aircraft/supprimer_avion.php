<?php 
$bdd = new PDO('mysql:host=localhost;dbname=aircraft;charset=utf8;', 'root', '');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupAvion = $bdd->prepare('SELECT * FROM avions WHERE id_avion = ?');
    $recupAvion->execute(array($getid));
    if($recupAvion->rowCount() > 0){
        $deleteAvion = $bdd->prepare('DELETE FROM avions WHERE id_avion = ?');
        $deleteAvion->execute(array($getid));
        header('location: avion.php');
    }else{
        echo "Aucun id trouvé!";} 
}else{
    echo "Aucun programme trouvé";
}
?>
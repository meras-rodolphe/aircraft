<?php 
$bdd = new PDO('mysql:host=localhost;dbname=aircraft;charset=utf8;', 'root', '');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupPiece = $bdd->prepare('SELECT * FROM pieces WHERE id_piece = ?');
    $recupPiece->execute(array($getid));
    if($recupPiece->rowCount() > 0){
        $deletePiece = $bdd->prepare('DELETE FROM pieces WHERE id_piece = ?');
        $deletePiece->execute(array($getid));
        header('location: piece.php');
    }else{
        echo "Aucun id trouvé!";} 
}else{
    echo "Aucune pièce trouvé";
}
?>
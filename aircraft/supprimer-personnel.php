<?php 
$bdd = new PDO('mysql:host=localhost;dbname=aircraft;charset=utf8;', 'root', '');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupUser = $bdd->prepare('SELECT * FROM users WHERE id_user = ?');
    $recupUser->execute(array($getid));
    if($recupUser->rowCount() > 0){
        $deleteUser = $bdd->prepare('DELETE FROM users WHERE id_user = ?');
        $deleteUser->execute(array($getid));
        header('location: personnel.php');
    }else{
        echo "Aucun id trouvé!";} 
}else{
    echo "Aucun personnel trouvé";
}
?>
<?php 
$bdd = new PDO('mysql:host=localhost;dbname=aircraft;charset=utf8;', 'root', '');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupAdmin = $bdd->prepare('SELECT * FROM admins WHERE id_admin = ?');
    $recupAdmin->execute(array($getid));
    if($recupAdmin->rowCount() > 0){
        $deleteAdmin = $bdd->prepare('DELETE FROM admins WHERE id_admin = ?');
        $deleteAdmin->execute(array($getid));
        header('location: administrateur.php');
    }else{
        echo "Aucun id trouvé!";} 
}else{
    echo "Aucun administrateur trouvé";
}
?>
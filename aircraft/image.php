<?php
try{
    $bdd = new PDO('mysql:host=localhost;dbname=aircraft;charset=utf8;', 'root', '');
}catch(PDOException $e){
    die('Erreur connexion : '.$e->getMessage());
}
// Code pour ajouter une image ou fichier dans la bdd.
if(isset($_FILES['file'])){    
    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    //Verifier l'extension du fichier.
    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));
    //Tableau des extensions que l'on accepte.
    $extensions = ['jpg', 'png', 'jpeg', 'gif'];
    //Taille max que l'on accepte
    $maxSize = 1000000;
    if(in_array($extension, $extensions) && $size <= $maxSize){
        $uniqueName = uniqid('', true);
        //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
        $file = $uniqueName.".".$extension;
        //$file = 5f586bf96dcd38.73540086.jpg
        move_uploaded_file($tmpName, './upload/'.$file);
        echo "Image enregistrée";
    }
    else{
        echo "Mauvaise extension ou taille trop grande";
    }
}
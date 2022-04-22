<div class="avion">
             <h2>Nom de la pièce:<?= $piece['nom_piece']; ?></h2>
             <h2>Programme:<?= $piece['programme']; ?></h2>
             <h2><?="<img src='./upload/".$piece['name']."' width='300px' ><br>"; ?></h2>
             <h2>Service:<?= $piece['service']; ?></h2>
             <a href="supprimer_piece.php?id=<?= $piece['id_piece']; ?>">
             <button style="color:white; background-color: red">Supprimer pièce</button>
            </a>
        </div>



        <?php 
        $recupAdmin = $bdd->query('SELECT * FROM admins');
        while($admin = $recupAdmin->fetch()){
         ?> 
        <div class="admin">
             <h1><?= $admin['nom']; ?></h1>
             <h1><?= $admin['prenom']; ?></h1>
             <h1><?= $admin['date']; ?></h1>
             <h1><?= $admin['service']; ?></h1>
             <a href="supprime-admin.php?id=<?= $admin['id_admin']; ?>">
             <button style="color:white; background-color: red">Supprimer administrateur</button>
             <a href="modifier_personnel.php?id=<?= $admin['id_admin']; ?>">
             <button style="color:black; background-color: yellow">Modifier administrateur</button>
            </a>
        </div>
        <?php
        }
    ?>

<?php 
        $recupUser = $bdd->query('SELECT * FROM users');
        while($user = $recupUser->fetch()){
         ?> 
        <div class="user">
             <h1><?= $user['nom']; ?></h1>
             <h1><?= $user['prenom']; ?></h1>
             <h1><?= $user['date']; ?></h1>
             <h1><?= $user['service']; ?></h1>
             <a href="supprimer-personnel.php?id=<?= $user['id_user']; ?>">
             <button style="color:white; background-color: red">Supprimer personnel</button>
             <a href="modifier_personnel.php?id=<?= $user['id_user']; ?>">
             <button style="color:black; background-color: yellow">Modifier personnel</button>
            </a>
        </div>
        <?php
        }
    ?>

<div class="piece">
            <h2>Nom de la pièce:<?= $piece['nom_piece']; ?></h2>
            <h2>Programme:<?= $piece['programme']; ?></h2>
            <h2><?="<img src='./upload/".$piece['name']."' width='300px' ><br>"; ?></h2>
            <h2>Service:<?= $piece['service']; ?></h2>
            <a href="supprimer_piece.php?id=<?= $piece['id_piece']; ?>">
            <button style="color:white; background-color: red">Supprimer pièce</button>
           </a>
       </div>


       <div class="avion">
             <h1><?= $avion['programme']; ?></h1>
             <h1><?="<img src='./upload/".$avion['name']."' width='300px' ><br>"; ?></h1>
             <a href="supprimer_avion.php?id=<?= $avion['id_avion']; ?>">
             <button style="color:white; background-color: red">Supprimer avion</button>
             <a href="modifier_avion.php?id=<?= $avion['id_avion']; ?>">
             <button style="color:black; background-color: yellow">Modifier avion</button>
            </a>
        </div>
   

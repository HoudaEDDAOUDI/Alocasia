<?php
    include('../autres_pages/header.php');
?>
<h2>gestion des données pour les utilisateurs</h2>
<a href="../index.php" class="retour">Retour</a>
    <hr>
    <a href="utilisateurs_new_from.php" class="retour">ajouter un utilisateurs</a>
    <br>
    <table class="tabadmin">
        <thead>
            <tr>
                <td>id</td>
                <td>Nom</td>
                <td>Prenom</td>
                <td>Mail</td>
                <td>Mot de passe</td>
                <td>Photo</td>
                <td>Supprimer</td>
                <td>Modifier</td>
            </tr>
        </thead>
        <tbody>
    <?php
    include('../pdo.php');
    $mabd->query('SET NAMES utf8;');
    $req = "SELECT * FROM utilisateurs";
    $resultat = $mabd->query($req);

    foreach ($resultat as $value) {
        echo '<tr>' ;
        echo '<td>' . $value['utilisateurs_id'] . '</td>';
        echo '<td>' . $value['utilisateurs_nom'] . '</td>';
        echo '<td>' . $value['utilisateurs_prenom'] . '</td>';
        echo '<td>' . $value['utilisateurs_mail'] . '</td>';
        echo '<td>' . $value['utilisateurs_mdp'] . '</td>';
        echo '<td><img src="../../images/uploads/'.$value['utilisateurs_photo'].'" alt="'.$value['utilisateurs_photo'].'" width="100px"></td>';
        echo '<td><a href="utilisateurs_delete.php?num='.$value['utilisateurs_id'].'">supprimer</a></td>';
        echo '<td><a href="utilisateurs_update_form.php?num='.$value['utilisateurs_id'].'">modifier</a> </td>';
        echo '</tr>';
    }
    ?>

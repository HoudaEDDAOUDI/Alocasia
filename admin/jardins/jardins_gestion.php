<?php
    include('../autres_pages/header.php');
?>
<h2>gestion des données pour les jardins</h2>
<a href="../index.php" class="retour">Retour</a>
    <hr>
    <a href="jardins_new_from.php" class="retour">ajouter un jardins</a>
    <br>
    <table class="tabadmin">
        <thead>
            <tr>
                <td>id</td>
                <td>Nom</td>
                <td>Adresse</td>
                <td>Longitude</td>
                <td>Latitude</td>
                <td>Surface</td>
                <td>Propriétaire</td>
                <td>Nombre de parcelles</td>
                <td>Nom de la photo</td>
                <td>Photo</td>
                <td>Supprimer</td>
                <td>Modifier</td>
            </tr>
        </thead>
        <tbody>
    <?php
    include('../pdo.php');
    $mabd->query('SET NAMES utf8;');
    $req = "SELECT * FROM jardins";
    $resultat = $mabd->query($req);

    foreach ($resultat as $value) {
        echo '<tr>';
        echo '<td>' . $value['jardins_id'] . '</td>';
        echo '<td>' . $value['jardins_nom'] . '</td>';
        echo '<td>' . $value['jardins_adresse'] . '</td>';
        echo '<td>' . $value['jardins_lon'] . '</td>';
        echo '<td>' . $value['jardins_lat'] . '</td>';
        echo '<td>' . $value['jardins_surface'] . '</td>';
        echo '<td>' . $value['jardins_proprietaire'] . '</td>';
        echo '<td>' . $value['jardins_nbr_parcelles'] . '</td>';
        echo '<td>' . $value['jardins_photo'] . '</td>';
        echo '<td><img src="../../images/uploads/'.$value['jardins_photo'].'" alt="'.$value['jardins_photo'].'" width="100px"></td>';
        echo '<td><a href="jardins_delete.php?num='.$value['jardins_id'].'">supprimer</a></td>';
        echo '<td><a href="jardins_update_form.php?num='.$value['jardins_id'].'"> modifier </a> </td>';
        echo '</tr>';
    }
    include('../autres_pages/footer.php');
    ?>

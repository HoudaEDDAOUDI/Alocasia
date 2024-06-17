<?php
    include('../autres_pages/header.php');
?>
<h2>gestion des données pour les parcelles</h2>
<a href="../index.php" class="retour">Retour</a>
    <hr>
    <a href="parcelles_new_from.php" class="retour">ajouter une parcelle</a>
    <br>
    <table class="tabadmin">
        <thead>
            <tr>
                <td>Id</td>
                <td>Nom</td>
                <td>Type de plantations</td>
                <td>Date de début</td>
                <td>Date de fin</td>
                <td>Disponibilité</td>
                <!-- <td>Jardin</td>
                <td>Utilisateurs</td>  -->
                <td>Supprimer</td>
                <td>Modifier</td>
            </tr>
        </thead>
        <tbody>
    <?php
    include('../pdo.php');
    $mabd->query('SET NAMES utf8;');
    $req = "SELECT * FROM parcelles";
    $resultat = $mabd->query($req);

    foreach ($resultat as $value) {
        echo '<tr>' ;
        echo '<td>' . $value['parcelles_id'] . '</td>';
        echo '<td>' . $value['parcelles_nom'] . '</td>';
        echo '<td>' . $value['parcelles_plantations'] . '</td>';
        echo '<td>' . $value['parcelles_date_debut'] . '</td>';
        echo '<td>' . $value['parcelles_date_fin'] . '</td>';
        echo '<td>' . $value['parcelles_disponibilite'] . '</td>';
        echo '<td><a href="parcelles_delete.php?num='.$value['parcelles_id'].'">supprimer</a></td>';
        echo '<td><a href="parcelles_update_form.php?num='.$value['parcelles_id'].'">modifier</a> </td>';
        echo '</tr>';
    }
    // echo '<td>' . $value['jardins_nom'] . '</td>';
    //     echo '<td>' . $value['utilisateurs_nom'] . '</td>';
    ?>
<?php
    include('../autres_pages/footer.php');
?>

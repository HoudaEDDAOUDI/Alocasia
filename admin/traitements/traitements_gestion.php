<?php
    include('../autres_pages/header.php');
?>

<h2>gestion des demandes de réservations de parcelles</h2>
<a href="../index.php" class="retour">Retour</a>
<hr>
<table class="tabadmin">
    <thead>
        <tr>
            <td>Utilisateurs</td>
            <td>Jardin</td>
            <td>Parcelles</td>
            <td>Date de début</td>
            <td>Date de fin</td>
            <td>Validé</td>
            <td>Refusé</td>
        </tr>
    </thead>
    <tbody>
<?php
include('../pdo.php');
$mabd->query('SET NAMES utf8;');

// Sélectionner uniquement les parcelles en attente
$req = "SELECT * FROM parcelles 
        JOIN jardins ON parcelles._jardins_id = jardins.jardins_id
        JOIN utilisateurs ON parcelles._utilisateurs_id = utilisateurs.utilisateurs_id
        WHERE parcelles.parcelles_disponibilite = 'en attente'";
$resultat = $mabd->query($req);

foreach ($resultat as $value) {
    echo '<tr>';
    echo '<td>' . $value['utilisateurs_nom'] . ' ' . $value['utilisateurs_prenom'] . '</td>';
    echo '<td>' . $value['jardins_nom'] . '</td>';
    echo '<td>' . $value['parcelles_nom'] . '</td>';
    echo '<td>' . $value['parcelles_date_debut'] . '</td>';
    echo '<td>' . $value['parcelles_date_fin'] . '</td>';
    echo '<td><a href="traitements_valid.php?num=' . $value['parcelles_id'] . '"><span class="check-mark">&#10004;</span></a></td>';
    echo '<td><a href="traitements_refu.php?num=' . $value['parcelles_id'] . '"><span class="cross-mark">&#10006;</span></a></td>';
    echo '</tr>';
}
?>

<?php
include('../autres_pages/footer.php');
?>

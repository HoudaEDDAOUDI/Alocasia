<?php
if (isset($_GET['parcelle_id'])) {
    $parcelleId = $_GET['parcelle_id'];

    include('admin/pdo.php');
    $mabd->query('SET NAMES utf8;');
    $req = 'SELECT * FROM parcelles WHERE parcelles_id=' . $parcelleId;
    $resultat = $mabd->query($req);
    if ($value = $resultat->fetch()) {
        echo '<h4>Parcelles ' . $value['parcelles_nom'] . '</h4>';
        echo '<p>Plantations : ' . $value['parcelles_plantations'] . '</p>';
        echo '<p>Disponibilité le: ' . $value['parcelles_date_debut'] . ' au '.$value['parcelles_date_fin'].'</p>';
        // Ajoutez d'autres champs si nécessaire
    } else {
        echo '<p>Aucune information disponible pour cette parcelle.</p>';
    }
} else {
    echo '<p>Aucune parcelle sélectionnée.</p>';
}
?>

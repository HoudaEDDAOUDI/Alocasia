<?php
if (isset($_GET['parcelle_id'])) {
    $parcelleId = $_GET['parcelle_id'];

    include('admin/pdo.php');
    $mabd->query('SET NAMES utf8;');
    $req = 'SELECT * FROM parcelles  WHERE parcelles.parcelles_id = :parcelleId';

    $stmt = $mabd->prepare($req);
    $stmt->execute(['parcelleId' => $parcelleId]);
    $value = $stmt->fetch();

    if ($value) {
        echo '<p><strong>Parcelle : ' . $value['parcelles_nom'] . '</strong></p>';
        // echo '<p>Type de plantations : ' . $value['parcelles_plantations'] . '</p>';
        // echo '<p>Disponibilité du ' . $value['parcelles_date_debut'] . ' au ' . $value['parcelles_date_fin'] . '</p>';
        // echo '<p>Date de réservation: <input type="text" id="datePicker" name="date" placeholder="Choisissez une date"></p>';
        // Ajoutez d'autres champs si nécessaire
    } else {
        echo '<p>Aucune information disponible pour cette parcelle.</p>';
    }
} else {
    echo '<p>Aucune parcelle sélectionnée.</p>';
}
?>
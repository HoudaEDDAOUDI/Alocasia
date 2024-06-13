<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $parcelleId = $_POST['parcelles_id'];
    $dateDebut = $_POST['date_debut'];
    $dateFin = $_POST['date_fin'];

    // Connexion à la base de données
    include('admin/pdo.php');
    $mabd->query('SET NAMES utf8;');

    // Vérifiez si les dates sont disponibles
    $req = 'SELECT * FROM reservations WHERE parcelles_id=' . $parcelleId . ' AND (date_debut <= "' . $dateFin . '" AND date_fin >= "' . $dateDebut . '")';
    $resultat = $mabd->query($req);
    if ($resultat->rowCount() > 0) {
        echo '<p>Cette parcelle est déjà réservée pour les dates sélectionnées.</p>';
    } else {
        // Insérez la réservation
        $req = $mabd->prepare('INSERT INTO reservations (parcelles_id, date_debut, date_fin) VALUES (?, ?, ?)');
        $req->execute([$parcelleId, $dateDebut, $dateFin]);
        echo '<p>Votre réservation a été enregistrée avec succès.</p>';
    }
} else {
    echo '<p>Méthode de requête non autorisée.</p>';
}
?>
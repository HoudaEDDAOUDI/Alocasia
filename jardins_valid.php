<?php
include('autres_pages/header.php');
?>
<main class="contact">
<h1>Votre réservation a été envoyée et sera étudiée dans les plus brefs délais.</h1>

<hr>

<?php
if (isset($_POST['num']) && isset($_POST['user_id'])) {
    $num = $_POST['num'];
    $userId = $_POST['user_id'];
    $parcelles = explode(',', $num);

    include('admin/pdo.php');
    $mabd->query('SET NAMES utf8;');

    foreach ($parcelles as $parcelleId) {
        // Mettre à jour la disponibilité de la parcelle à "en attente" et l'utilisateur associé
        $req = 'UPDATE parcelles SET _utilisateurs_id = :user_id, parcelles_disponibilite = "en attente" WHERE parcelles_id = :parcelle_id';
        $stmt = $mabd->prepare($req);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':parcelle_id', $parcelleId);
        $stmt->execute();
    }

    echo '<p id="recap"><strong>Voici un récapitulatif :</strong></p>';
    echo '<div class="parcelle-details-container">';

    foreach ($parcelles as $parcelleId) {
        $req = 'SELECT * FROM parcelles WHERE parcelles_id = :parcelle_id';
        $stmt = $mabd->prepare($req);
        $stmt->bindParam(':parcelle_id', $parcelleId);
        $stmt->execute();
        if ($value = $stmt->fetch()) {
            echo '<div class="parcelle-details">';
            echo '<p><strong>Parcelle : ' . $value['parcelles_nom'] . '</strong></p>';
            echo '<p>Type de plantations : ' . $value['parcelles_plantations'] . '</p>';
            echo '<p>Disponibilité : ' . $value['parcelles_date_debut'] . ' au ' . $value['parcelles_date_fin'] . '</p>';
            echo '</div>';
        }
    }

    echo '</div>';

    echo '<a class="button-find-garden" href="index.php?num=' . $num . '">Retour</a>';
} else {
    echo '<p>Erreur : Informations manquantes.</p>';
}
?>
</main>
<?php
include('autres_pages/footer.php');
?>

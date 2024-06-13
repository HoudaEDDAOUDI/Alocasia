<?php
include('autres_pages/header.php');
?>
<h2>Votre réservation a été envoyée et sera étudiée dans les plus brefs délais.</h2>
<p>Voici un récapitulatif :</p>
<hr>

<?php
if (isset($_POST['num']) && isset($_POST['user_id'])) {
    $num = $_POST['num'];
    $userId = $_POST['user_id'];
    $parcelles = explode(',', $num);

    include('admin/pdo.php');
    $mabd->query('SET NAMES utf8;');

    foreach ($parcelles as $parcelleId) {
        $req = 'UPDATE parcelles SET _utilisateurs_id="' . $userId . '" WHERE parcelles_id="' . $parcelleId . '"';
        $resultat = $mabd->query($req);
    }
    echo '<a class="retour" href="index.php?num=' . $num . '">Retour</a>';
} else {
    echo '<p>Erreur : Les valeurs "num" ou "user_id" n\'ont pas été soumises.</p>';
}
?>

<?php
include('autres_pages/footer.php');
?>

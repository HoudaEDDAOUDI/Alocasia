<?php
include('../../autres_pages/header.php');

// Vérification de l'existence du paramètre 'num' et de la session utilisateur
if (isset($_GET['num'])) {
    $num = (int)$_GET['num'];

    include('../../admin/pdo.php');
    $mabd->query('SET NAMES utf8;');

    // Requête pour vérifier que la parcelle appartient à l'utilisateur connecté
    $utilisateur_id = $_SESSION['utilisateurs_id']; // Remplacer par l'ID réel de l'utilisateur connecté
    $checkReq = $mabd->prepare('SELECT * FROM parcelles WHERE parcelles_id = ? AND _utilisateurs_id = ?');
    $checkReq->execute([$num, $utilisateur_id]);

    if ($checkReq->rowCount() > 0) {
        // Si la parcelle appartient à l'utilisateur, procéder à la déconnexion
        $req = $mabd->prepare('UPDATE parcelles SET _utilisateurs_id = NULL WHERE parcelles_id = ? AND _utilisateurs_id = ?');
        $req->execute([$num, $utilisateur_id]);

        echo '<p>Vous venez d\'annuler la réservation de la parcelle numéro '.$num.'</p>';
    } else {
        echo '<p>Erreur : Cette parcelle ne vous appartient pas ou n\'existe pas.</p>';
    }
} else {
    echo '<p>Erreur : Aucun identifiant de parcelle fourni.</p>';
}
?>
<a href="../profil.php" class="retour">Retourner sur mon profil</a>
<?php
include('../../autres_pages/footer.php');
?>

<?php
ob_start();
include('../../autres_pages/header.php');

// Vérification de l'existence du paramètre 'num' et de la session utilisateur
if (isset($_GET['num']) && isset($_SESSION['utilisateurs_id'])) {
    $num = (int)$_GET['num'];

    include('../../admin/pdo.php');
    $mabd->query('SET NAMES utf8;');

    // Requête pour vérifier que la parcelle appartient à l'utilisateur connecté
    $utilisateur_id = $_SESSION['utilisateurs_id'];
    $checkReq = $mabd->prepare('SELECT * FROM parcelles WHERE parcelles_id = ? AND _utilisateurs_id = ?');
    $checkReq->execute([$num, $utilisateur_id]);

    if ($checkReq->rowCount() > 0) {
        // Si la parcelle appartient à l'utilisateur, procéder à la déconnexion
        $req = $mabd->prepare('UPDATE parcelles SET _utilisateurs_id = NULL, parcelles_disponibilite = "disponible" WHERE parcelles_id = ? AND _utilisateurs_id = ?');
        $req->execute([$num, $utilisateur_id]);

        // Redirection vers la page de profil avec un message de confirmation
        $_SESSION['info'] = 'Vous venez d\'annuler la réservation de la parcelle';
        header('Location: /utilisateurs/profil.php');
        exit();
    } else {
        // Redirection vers la page de profil avec un message d'erreur
        $_SESSION['info'] = 'Erreur : Cette parcelle ne vous appartient pas ou n\'existe pas.';
        header('Location: /utilisateurs/profil.php');
        exit();
    }
} else {
    // Redirection vers la page de profil avec un message d'erreur
    $_SESSION['info'] = 'Erreur : Aucun identifiant de parcelle fourni ou utilisateur non connecté.';
    header('Location: /utilisateurs/profil.php');
    exit();
}

include('../../autres_pages/footer.php');
?>

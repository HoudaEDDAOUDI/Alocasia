<?php
include('../pdo.php');
$mabd->query('SET NAMES utf8;');

if (isset($_GET['num'])) {
    $parcelleId = $_GET['num'];
    $req = "UPDATE parcelles SET parcelles_disponibilite = 'réservée' WHERE parcelles_id = :parcelleId";
    $stmt = $mabd->prepare($req);
    $stmt->bindParam(':parcelleId', $parcelleId, PDO::PARAM_INT);
    $stmt->execute();
}

header('Location: traitements_gestion.php');
exit();
?>

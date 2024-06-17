<?php
include('../autres_pages/header.php');

if(isset($_POST['ajouter'])) {
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $lon = $_POST['lon'];
    $lat = $_POST['lat'];
    $surface = $_POST['surface'];
    $nbr_parcelle = $_POST['nbr_parcelle'];
    $proprietaire = $_POST['proprietaire'];

    include('../pdo.php');
    $mabd->query('SET NAMES utf8;');

    // Vérification du format de l'image téléchargée
    $imageType = $_FILES["photo"]["type"];
    if (!in_array($imageType, ["image/png", "image/jpg", "image/jpeg", "image/webp"])) {
        echo '<p>Désolé, le type d\'image n\'est pas reconnu !';
        echo 'Seuls les formats PNG, JPEG et WEBP sont autorisés.</p>';
        die();
    }

    // Création d'un nouveau nom pour cette image téléchargée
    $nouvelleImage = date("Y_m_d_H_i_s") . "---" . $_FILES["photo"]["name"];

    // Dépôt du fichier téléchargé dans le dossier /var/www/r214/images/uploads
    if (is_uploaded_file($_FILES["photo"]["tmp_name"])) {
        if (!move_uploaded_file($_FILES["photo"]["tmp_name"], "../../images/uploads/" . $nouvelleImage)) {
            echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>';
            die();
        }
    } else {
        echo '<p>Problème : image non chargée...</p>';
        die();
    }

    // Insertion du nouveau jardin dans la table jardins
    $reqInsertJardin = 'INSERT INTO jardins(jardins_nom, jardins_adresse, jardins_lon, jardins_lat, jardins_surface, jardins_proprietaire, jardins_nbr_parcelles, jardins_photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
    $stmt = $mabd->prepare($reqInsertJardin);
    $stmt->execute([$nom, $adresse, $lon, $lat, $surface, $proprietaire, $nbr_parcelle, $nouvelleImage]);

    // Récupération de l'ID du jardin inséré
    $nouveauJardinId = $mabd->lastInsertId();

    // Insertion des parcelles correspondantes dans la table parcelles
    $lettres = range('A', 'Z'); // Tableau des lettres de A à Z
    $count = 0; // Compteur pour les parcelles
    for ($i = 0; $i < $nbr_parcelle; $i++) {
        $lettre = $lettres[floor($i / 5)]; // Calcul de la lettre (A, B, C, ...)
        $numero = ($i % 5) + 1; // Calcul du numéro (1, 2, 3, 4, 5)
        $nomParcelle = $lettre . $numero; // Nom de la parcelle (A1, A2, ..., B1, B2, ...)
        
        // Insertion de la parcelle dans la table parcelles
        $reqInsertParcelle = 'INSERT INTO parcelles(parcelles_nom, _jardins_id, _utilisateurs_id, parcelles_disponibilite) VALUES (?, ?, NULL, "disponible")';
        $stmt = $mabd->prepare($reqInsertParcelle);
        $stmt->execute([$nomParcelle, $nouveauJardinId]);
    }

    // Affichage de confirmation
    echo '<h2>Gestion de nos jardins</h2>';
    echo '<h3>Vous venez d\'ajouter un jardin</h3>';
    echo '<p>Le jardin "' . $nom . '" a été ajouté avec succès avec ' . $nbr_parcelle . ' parcelles.</p>';

    include('../autres_pages/footer.php');
}
?>

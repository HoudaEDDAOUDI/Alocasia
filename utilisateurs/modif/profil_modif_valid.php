<?php
include('../../autres_pages/header.php');
?>

<h1>Vous venez de modifier un Utilisateur</h1>
<hr>

<?php
include ('../../admin/pdo.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $num = $_POST['num'];

    // Vérification de l'existence et du succès du téléchargement de l'image
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] === UPLOAD_ERR_OK) {
        $photo = $_FILES["photo"]["name"];
        $imageType = $_FILES["photo"]["type"];

        // Vérification du type d'image
        $allowedTypes = ['image/png', 'image/jpeg', 'image/webp']; // Ajoutez d'autres types si nécessaire
        if (!in_array($imageType, $allowedTypes)) {
            echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats PNG, JPEG et WEBP sont autorisés.</p>';
            die();
        }

        // Génération d'un nom unique pour l'image
        $nouvelleImage = date("Y_m_d")."-" . $photo;

        // Déplacement du fichier téléchargé vers le dossier des images
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], "../../images/uploads/" . $nouvelleImage)) {
            // Requête SQL avec mise à jour de l'image
            $req = 'UPDATE utilisateurs SET utilisateurs_nom = :nom, utilisateurs_mail = :mail, utilisateurs_photo = :photo, utilisateurs_prenom = :prenom WHERE utilisateurs_id = :id';
            $stmt = $mabd->prepare($req);
            $stmt->execute(['nom' => $nom, 'prenom' => $prenom, 'mail' => $mail, 'photo' => $nouvelleImage, 'id' => $num]);

            // Mise à jour des variables de session
            $_SESSION['utilisateurs_nom'] = $nom;
            $_SESSION['utilisateurs_mail'] = $mail;
            $_SESSION['utilisateurs_prenom'] = $prenom;
            $_SESSION['utilisateurs_photo'] = $nouvelleImage;
        } else {
            echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>';
            die();
        }
    } else {
        // Requête SQL sans mise à jour de l'image
        $req = 'UPDATE utilisateurs SET utilisateurs_nom = :nom, utilisateurs_mail = :mail, utilisateurs_prenom = :prenom WHERE utilisateurs_id = :id';
        $stmt = $mabd->prepare($req);
        $stmt->execute(['nom' => $nom, 'prenom' => $prenom, 'mail' => $mail, 'id' => $num]);

        // Mise à jour des variables de session
        $_SESSION['utilisateurs_nom'] = $nom;
        $_SESSION['utilisateurs_mail'] = $mail;
        $_SESSION['utilisateurs_prenom'] = $prenom;
    }

    echo '<a href="./profil_modif.php">Retour</a>';
} else {
    echo '<p>Une erreur s\'est produite lors de la soumission du formulaire.</p>';
}

include('../../autres_pages/footer.php');
?>

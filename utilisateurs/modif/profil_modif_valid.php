<?php
include('../../autres_pages/header.php');
?>

<section class="registration-form-section">
    <h2>Modifier mon profil</h2>

    <?php
session_start();
include('../../admin/pdo.php');
$mabd->query('SET NAMES utf8;');

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    $utilisateur_id = $_POST['num'];

    // Vérifier si un fichier a été téléchargé
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $imageName = $_FILES['photo']['name'];
        $imageType = $_FILES['photo']['type'];

        // Vérifier le type d'image
        if ($imageType != "image/png" && $imageType != "image/jpg" && $imageType != "image/jpeg") {
            echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats PNG et JPEG sont autorisés.</p>';
            exit;
        }

        // Générer un nom unique pour l'image
        $nouvelleImage = date("Y_m_d_H_i_s") . "---" . $imageName;

        // Déplacer le fichier téléchargé vers le dossier de destination
        if (!move_uploaded_file($_FILES['photo']['tmp_name'], "../../images/uploads/" . $nouvelleImage)) {
            echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>';
            exit;
        }

        // Préparer la requête SQL avec mise à jour de l'image
        $req = 'UPDATE utilisateurs SET utilisateurs_nom = :nom, utilisateurs_prenom = :prenom, utilisateurs_mail = :mail, utilisateurs_photo = :photo WHERE utilisateurs_id = :id';
        $stmt = $mabd->prepare($req);
        $stmt->execute(['nom' => $nom, 'prenom' => $prenom, 'mail' => $mail, 'photo' => $nouvelleImage, 'id' => $utilisateur_id]);
    } else {
        // Préparer la requête SQL sans mise à jour de l'image
        $req = 'UPDATE utilisateurs SET utilisateurs_nom = :nom, utilisateurs_prenom = :prenom, utilisateurs_mail = :mail WHERE utilisateurs_id = :id';
        $stmt = $mabd->prepare($req);
        $stmt->execute(['nom' => $nom, 'prenom' => $prenom, 'mail' => $mail, 'id' => $utilisateur_id]);
    }

    // Mettre à jour la session avec les nouvelles informations
    $_SESSION['utilisateurs_nom'] = $nom;
    $_SESSION['utilisateurs_prenom'] = $prenom;
    $_SESSION['utilisateurs_mail'] = $mail;
    if (isset($nouvelleImage)) {
        $_SESSION['utilisateurs_photo'] = $nouvelleImage;
    }

    // Rediriger vers la page de profil ou autre
    header('Location: ../profil.php');
    exit;
}
?>


    <br><button><a href="../profil.php">Retourner à mon profil.</a></button>
</section>

<?php
include('../../autres_pages/footer.php');
?>

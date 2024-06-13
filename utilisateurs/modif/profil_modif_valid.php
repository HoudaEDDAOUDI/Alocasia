<?php
include('../../autres_pages/header.php');
?>

<section class="registration-form-section">
    <h2>Modifier mon profil</h2>

    <?php
    // Vérifier que les données nécessaires sont soumises
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mail'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];

        include('../../admin/pdo.php');
        $mabd->query('SET NAMES utf8;');

        // Vérifier si un fichier a été téléchargé
        if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
            $imageName = $_FILES["photo"]["name"];
            $imageType = $_FILES["photo"]["type"];

            // Vérifier le type d'image
            if ($imageType != "image/png" && $imageType != "image/jpg" && $imageType != "image/jpeg") {
                echo '<p>Désolé, le type d\'image n\'est pas reconnu ! Seuls les formats PNG et JPEG sont autorisés.</p>';
                exit;
            }

            // Générer un nom unique pour l'image
            $nouvelleImage = date("Y_m_d_H_i_s") . "---" . $imageName;

            // Déplacer le fichier téléchargé vers le dossier de destination
            if (!move_uploaded_file($_FILES["photo"]["tmp_name"], "../../images/uploads/" . $nouvelleImage)) {
                echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>';
                exit;
            }

            // Préparer la requête SQL avec mise à jour de l'image
            $req = 'UPDATE utilisateurs SET utilisateurs_nom = "'.$nom.'", utilisateurs_prenom = "'.$prenom.'", utilisateurs_mail = "'.$mail.'", utilisateurs_photo = "'.$nouvelleImage.'" WHERE utilisateurs_nom = "'.$_SESSION['utilisateurs_nom'].'"';
        } else {
            // Préparer la requête SQL sans mise à jour de l'image
            $req = 'UPDATE utilisateurs SET utilisateurs_nom = "'.$nom.'", utilisateurs_prenom = "'.$prenom.'", utilisateurs_mail = "'.$mail.'" WHERE utilisateurs_nom = "'.$_SESSION['utilisateurs_nom'].'"';
        }

        // Exécuter la requête SQL
        $resultat = $mabd->query($req);

        // Afficher un message de confirmation
        echo "Les changements ont bien été pris en compte";
    } else {
        echo '<p>Erreur : Tous les champs requis n\'ont pas été soumis.</p>';
    }
    ?>

    <br><button><a href="../profil.php">Retourner à mon profil.</a></button>
</section>

<?php
include('../../autres_pages/footer.php');
?>

<?php
    include('../autres_pages/header.php');
?>
<!-- PAS FINIIIIIS -->
    <a href="jardins_gestion.php" class="retour">Retour</a>
        <hr>
    <h2>gestion de nos jardins</h2>
    <h3>vous venez d'ajouter un jardin</h3>
    <hr>
    <?php
    $nom=$_POST['nom'];
    $adresse=$_POST['adresse'];
    $surface=$_POST['surface'];
    $proprietaire=$_POST['proprietaire'];

    include('../pdo.php');
    $mabd->query('SET NAMES utf8;');

    //vérification du format de l'image téléchargée
	$imageType=$_FILES["photo"]["type"];
    if ( ($imageType != "image/png") &&
        ($imageType != "image/jpg") &&
        ($imageType != "image/jpeg") ) {
            echo '<p>Désolé, le type d\'image n\'est pas reconnu !';
            echo 'Seuls les formats PNG et JPEG sont autorisés.</p>'."\n";
        die();
    }

    //creation d'un nouveau nom pour cette image téléchargée
    // pour éviter d'avoir 2 fichiers avec le même nom
    $nouvelleImage = date("Y_m_d_H_i_s")."---".$_FILES["photo"]["name"];

    // dépot du fichier téléchargé dans le dossier /var/www/r214/images/uploads
    if(is_uploaded_file($_FILES["photo"]["tmp_name"])) {
        if(!move_uploaded_file($_FILES["photo"]["tmp_name"], 
        "/images/uploads/".$nouvelleImage)) {
            echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>'."\n";
            die();
        }
    } else {
        echo '<p>Problème : image non chargée...</p>'."\n";
        die();
    }
    $req = 'INSERT INTO jardins(jardins_nom,jardins_adresse,jardins_surface,jardins_proprietaire,jardins_photo) VALUES("'.$nom.'","'.$adresse.'","'.$surface.'","'.$proprietaire.'","'.$photo.'")';
    $resultat = $mabd->query($req);
    include('../autres_pages/footer.php');
?>
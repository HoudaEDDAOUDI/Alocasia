<?php
    include('../autres_pages/header.php');
?>
    <!------------- NE MARCHE PAS ------------>
    <a href="jardins_gestion.php" class="retour">Retour</a>
        <hr>
    <h2>Modifier un jardin : Valid</h2>
    <h3>vous venez de modifier un jardin</h3>
    <hr>
    <?php
    $nom=$_POST['nom'];
    $adresse=$_POST['adresse'];
    $lon=$_POST['lon'];
    $lat=$_POST['lat'];
    $surface=$_POST['surface'];
    $proprietaire=$_POST['proprietaire'];
    $num=$_POST['num'];

    include('../pdo.php');
    $mabd->query('SET NAMES utf8;');

    $imageName=$_FILES["photo"]["name"];
    if($imageName!=""){
			//vérification du format de l'image téléchargée
			$imageType=$_FILES["photo"]["type"];
            if ( ($imageType != "image/png") &&
                ($imageType != "image/jpg") &&
                ($imageType != "image/jpeg") &&
                ($imageType != "image/webp") ) {
                    echo '<p>Désolé, le type d\'image n\'est pas reconnu !';
                    echo 'Seuls les formats PNG, JPEG et WEBP sont autorisés.</p>'."\n";
                die();
            }
	
    		//creation d'un nouveau nom pour cette image téléchargée
            // pour éviter d'avoir 2 fichiers avec le même nom
	        $nouvelleImage = date("Y_m_d_H_i_s")."---".$_FILES["photo"]["name"];
	

    		// dépot du fichier téléchargé dans le dossier /var/www/sae203/images/uploads
	        if(is_uploaded_file($_FILES["photo"]["tmp_name"])) {
	            if(!move_uploaded_file($_FILES["photo"]["tmp_name"], 
	            "../../images/uploads/".$nouvelleImage)) {
	                echo '<p>Problème avec la sauvegarde de l\'image, désolé...</p>'."\n";
	                die();
	            }
	        } else {
	            echo '<p>Problème : image non chargée...</p>'."\n";
	            die();
            }

    $req = 'UPDATE jardins SET jardins_nom="'.$nom.'",jardins_adresse="'.$adresse.'",jardins_lon="'.$lon.'",jardins_lat="'.$lat.'",jardins_surface="'.$surface.'",jardins_proprietaire="'.$proprietaire.'",jardins_photo="'.$nouvelleImage.'" WHERE jardins_id="'.$num.'"';
        }
        else{
            $req = 'UPDATE jardins SET jardins_nom="'.$nom.'",jardins_adresse="'.$adresse.'",jardins_lon="'.$lon.'",jardins_lat="'.$lat.'",jardins_surface="'.$surface.'",jardins_proprietaire="'.$proprietaire.'" WHERE jardins_id="'.$num.'"';
        }
    $resultat = $mabd->query($req);
    ?>
    <?php 
        echo '<a class="retour" href="jardins_update_form.php?num='.$num.'">
                Recommencer
            </a>';
    ?>
</body>
</html>
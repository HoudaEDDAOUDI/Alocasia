<?php
    include('../autres_pages/header.php');
?>
    <!------------- NE MARCHE PAS ------------>
    <a href="parcelles_gestion.php" class="retour">Retour</a>
        <hr>
    <h2>Modifier un jardin : Valid</h2>
    <h3>vous venez de modifier un jardin</h3>
    <hr>
    <?php
    $nom=$_POST['nom'];
    $plantations=$_POST['plantation'];
    $debut=$_POST['debut'];
    $fin=$_POST['fin'];
    $jardins=$_POST['jardins'];
    $disponibilite=$_POST['disponibilite'];
    $utilisateurs=$_POST['utilisateurs'];
    $num=$_POST['num'];

    include('../pdo.php');
    $mabd->query('SET NAMES utf8;');

    
    $req = 'UPDATE parcelles SET parcelles_nom="'.$nom.'",parcelles_plantations="'.$plantations.'",parcelles_date_debut="'.$debut.'",parcelles_date_fin="'.$fin.'",_jardins_id="'.$jardins.'",parcelles_disponibilite="'.$disponibilite.'",_utilisateurs_id="'.$utilisateurs.'" WHERE parcelles_id="'.$num.'"';
    echo 'juste pour le debug:'.$req;
    $resultat = $mabd->query($req);
    ?>
    <?php 
        echo '<a class="retour" href="parcelles_update_form.php?num='.$num.'">
                Recommencer
            </a>';
    ?>
</body>
</html>
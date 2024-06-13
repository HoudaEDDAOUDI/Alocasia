<?php
    include('../autres_pages/header.php');
?>
    <a href="parcelles_gestion.php" class="retour">Retour</a>
        <hr>
    <h2>Ajout d'une parcelle</h2>
    <h3>Vous venez d'ajouter une parcelle</h3>
    <hr>
    <?php
    $nom=$_POST['nom'];
    $plantations=$_POST['plantations'];
    $debut=$_POST['debut'];
    $fin=$_POST['fin'];
    $jardins=$_POST['jardins'];
    $disponibilite = !empty($_POST['disponibilite']) ? $_POST['disponibilite'] : NULL;
    $utilisateurs = !empty($_POST['utilisateurs']) ? $_POST['utilisateurs'] : NULL;
    

    include('../pdo.php');
    $mabd->query('SET NAMES utf8;');

    $req = 'INSERT INTO parcelles (parcelles_nom, parcelles_plantations, parcelles_date_debut, parcelles_date_fin, _jardins_id' . 
           (!is_null($disponibilite) ? ', parcelles_disponibilite' : '') . 
           (!is_null($utilisateurs) ? ', _utilisateurs_id' : '') . 
           ') VALUES (:nom, :plantations, :debut, :fin, :jardins' .
           (!is_null($disponibilite) ? ', :disponibilite' : '') .
           (!is_null($utilisateurs) ? ', :utilisateurs' : '') .
           ')';    echo $req;

    $stmt = $mabd->prepare($req);

    // Lier les paramètres
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':plantations', $plantations);
    $stmt->bindParam(':debut', $debut);
    $stmt->bindParam(':fin', $fin);
    $stmt->bindParam(':jardins', $jardins);
    if (!is_null($disponibilite)) $stmt->bindParam(':disponibilite', $disponibilite);
    if (!is_null($utilisateurs)) $stmt->bindParam(':utilisateurs', $utilisateurs);

    $stmt->execute();
    ?>
    <br><a href="parcelles_new_from.php" class="retour">Ajouter une nouvelle parcelle</a>
</body>
</html>
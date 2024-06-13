<?php
    include('../autres_pages/header.php');
?>
    <a href="parcelles_gestion.php" class="retour">Retour</a>
   <h2>Supprimer une parcelle</h2> 
   <hr>
   <?php
        // recupérer dans l'url l'id de l'album à supprimer
        $num=$_GET['num'];

        include('../pdo.php');
        $mabd->query('SET NAMES utf8;');

        // tapez ici la requete de suppression de l'album dont l'id est passé dans l'url
        $req = 'DELETE FROM parcelles WHERE parcelles_id='.$num.''; 

        $resultat = $mabd->query($req);

        echo '<p>vous venez de supprimer la parcelle numéro '.$num.'</p>';
    ?>
<?php
    include('../autres_pages/footer.php');
?>
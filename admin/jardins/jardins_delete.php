<?php
    include('../autres_pages/header.php');
?>
    <a href="jardins_gestion.php" class="retour">Retour</a>
   <h2>Supprimer un jardin</h2> 
   <hr>
   <?php
        // recupérer dans l'url l'id de l'album à supprimer
        $num=$_GET['num'];

        include('../pdo.php');
        $mabd->query('SET NAMES utf8;');

        // tapez ici la requete de suppression de l'album dont l'id est passé dans l'url
        $req = 'DELETE FROM jardins WHERE jardins_id='.$num.''; 

        $resultat = $mabd->query($req);

        echo '<p>vous venez de supprimer le jardins numéro '.$num.'</p>';
    ?>
<?php
    include('../autres_pages/footer.php');
?>
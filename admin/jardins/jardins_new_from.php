<?php
    include('../autres_pages/header.php');
?>
    <a href="jardins_gestion.php" class="retour">Retour</a> 	
        <hr>
    <h2>Ajout d'un article</h2>
    <hr>
    <?php
        include('../pdo.php');
        $mabd->query('SET NAMES utf8;');
        $req = 'SELECT * FROM  jardins INNER JOIN parcelles ON jardins._jardins_id=parcelles.jardins_id';
    ?>

    <form method="POST" action="jardins_new_valid.php" enctype="multipart/form-data">
        Nom:<input type="text" name="nom" ><br>
        Adresse:<input type="text" name="adresse" ><br>
        Surface:<input type="text" name="surface" ><br>
        Propriétaire:<input type="text" name="proprietaire" ><br>
        Photo:<input type="file" name="photo" required /><br />
        <br>   
        <input type="submit" name="ajouter">
    </form>
    <?php
    include('../autres_pages/footer.php');
?>
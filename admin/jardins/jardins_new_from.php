<?php
    include('../autres_pages/header.php');
?>
    <a href="jardins_gestion.php" class="retour">Retour</a> 	
        <hr>
    <h2>Ajout d'un jardin</h2>
    <hr>
    <?php
        include('../pdo.php');
        $mabd->query('SET NAMES utf8;');
        $req = 'SELECT * FROM  jardins INNER JOIN parcelles ON jardins._jardins_id=parcelles.jardins_id';
    ?>
    <form method="POST" action="jardins_new_valid.php" enctype="multipart/form-data">
        Nom:<input type="text" name="nom" ><br>
        Adresse:<input type="text" name="adresse" ><br>
        Longitude:<input type="text" name="lon" ><br>
        Latitude:<input type="text" name="lat"><br>
        Surface:<input type="text" name="surface" ><br>
        Propriétaire:<input type="text" name="proprietaire" ><br>
        Photo:<input type="file" name="photo" required /><br />
        Nombres de parcelle: 
        <select name="nbr_parcelle" id="nbr_parcelle">
            <?php
                for ($i = 1; $i <= 16; $i++) {
                    echo "<option value=\"$i\">$i</option>";
                }
            ?>
        </select><br>
        <br>   
        <input type="submit" name="ajouter">
    </form>
    <?php
    include('../autres_pages/footer.php');
?>
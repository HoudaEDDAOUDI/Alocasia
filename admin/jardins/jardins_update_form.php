<?php
    include('../autres_pages/header.php');
?>
    <!------------- le valid de cette page NE MARCHE PAS ------------>
    <a href="jardins_gestion.php" class="retour">Retour</a> 	
	<hr>
    <h2>Modifier un jardin</h2>
    <p>Jardin que vous voulez modifier:</p>
    <?php
        $num = $_GET['num'];
        include('../pdo.php');
        $mabd->query('SET NAMES utf8;');
        $req = 'SELECT * FROM  jardins WHERE jardins_id='.$num.'';
        $resultat = $mabd->query($req);
        $jardins = $resultat->fetch();
    ?>
    <hr>
    <hr>

<div class="recherche">  
    <div id="recherche2">
        <form method="POST" action="jardins_update_valid.php" enctype="multipart/form-data">
            <input type="hidden" name="num"  value="<?php echo $jardins['jardins_id']; ?>">
            Nom:<input type="text" name="nom" value="<?php echo $jardins['jardins_nom'];?>"><br>
            Adresse:<input type="text" name="adresse" value="<?php echo $jardins['jardins_adresse'];?>"><br>
            Longitude:<input type="text" name="lon" value="<?php echo $jardins['jardins_lon'];?>"><br>
            Latitude:<input type="text" name="lat" value="<?php echo $jardins['jardins_lat'];?>"><br>
            Surface:<input type="text" name="surface" value="<?php echo $jardins['jardins_surface'];?>"><br>
            Propriétaire:<input type="text" name="proprietaire" value="<?php echo $jardins['jardins_proprietaire'];?>"><br>
            Photo:<input type="file" name="photo" value="<?php echo $jardins['jardins_photo'];?>"><br>  
            <input type="submit" name="">
        </form>
    </div>
</div>  
<?php
    include('../autres_pages/footer.php');
?>
<?php
    include('../autres_pages/header.php');
?>
    <!------------- le valid de cette page NE MARCHE PAS ------------>
    <a href="utilisateurs_gestion.php" class="retour">Retour</a> 	
	<hr>
    <h2>Modifier un utilisateur</h2>
    <p>L'utilisateur que vous voulez modifier:</p>
    <?php
        $num = $_GET['num'];
        include('../pdo.php');
        $mabd->query('SET NAMES utf8;');
        $req = 'SELECT * FROM  utilisateurs WHERE utilisateurs_id='.$num.'';
        $resultat = $mabd->query($req);
        $jardins = $resultat->fetch();
    ?>
    <hr>
    <hr>

<div class="recherche">
    <div id="recherche2">
        <form method="POST" action="utilisateurs_update_valid.php" enctype="multipart/form-data">
            <input type="hidden" name="num"  value="<?php echo $jardins['utilisateurs_id']; ?>">
            Nom:<input type="text" name="nom" value="<?php echo $jardins['utilisateurs_nom'];?>"><br>
            Prénom:<input type="text" name="prenom" value="<?php echo $jardins['utilisateurs_prenom'];?>"><br>
            Email:<input type="email" name="mail" value="<?php echo $jardins['utilisateurs_mail'];?>"><br>
            Mot de pass:<input type="text" name="mdp" value="<?php echo $jardins['utilisateurs_mdp'];?>"><br>
            Photo:<input type="file" name="photo" value="<?php echo $jardins['utilisateurs_photo'];?>"><br>  
            <input type="submit" name="">
        </form>
    </div>
</div>  
<?php
    include('../autres_pages/footer.php');
?>
<?php
    include('../autres_pages/header.php');
?> 
    <a href="utilisateurs_gestion.php" class="retour">Retour</a> 	
        <hr>
    <!-- PAS FINIIIIIS -->
    <h2>Ajout d'un utilisateurs</h2>
    <hr>
    <?php
        include('../pdo.php');
        $mabd->query('SET NAMES utf8;');
        $req = 'SELECT * FROM utilisateurs INNER JOIN parcelles ON parcelles._utilisateurs_id=utilisateurs.utilisateurs_id';
    ?>

    <form method="POST" action="utilisateurs_new_valid.php" enctype="multipart/form-data">
        Nom*: <input type="text" name="nom" required><br>
        Prenom*:<input type="text" name="prenom" required><br>
        Mail*:<input type="mail" name="mail" required><br>
        Mot de passe*:<input type="text" name="mdp" required><br>
        Photo de profil:<input type="file" name="photo" required /><br />
        </select>
        <br>   
        <input type="submit" name="ajouter">
    </form>
    <?php
    include('../autres_pages/footer.php');
?>
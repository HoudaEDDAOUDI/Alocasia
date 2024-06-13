<?php
    include('../autres_pages/header.php');
?> 
    <a href="parcelles_gestion.php" class="retour">Retour</a> 	
        <hr>
    <!-- PAS FINIIIIIS -->
    <h2>Ajout d'une parcelle</h2>
    <hr>
    <?php
        include('../pdo.php');
        $mabd->query('SET NAMES utf8;');
        $req = 'SELECT * FROM parcelles 
            INNER JOIN jardins ON parcelles._jardins_id=jardins.jardins_id 
            LEFT JOIN utilisateurs ON parcelles._utilisateurs_id=utilisateurs.utilisateurs_id';
    ?>

    <form method="POST" action="parcelles_new_valid.php" enctype="multipart/form-data">
        Nom*: <input type="text" name="nom" required><br>
        Type de plantations*:<input type="text" name="plantations" required><br>
        Date de début*:<input type="date" name="debut" required><br>
        Date de fin*:<input type="date" name="fin" required><br>
        Choisir le jardin*:</label>
        <select name="jardins" required>
            <?php
            include('../pdo.php');
            $mabd->query('SET NAMES utf8;');
            $req = "SELECT * FROM jardins";
            $resultat = $mabd->query($req);

            foreach ($resultat as $value){        
                echo '<option value="'.$value['jardins_id'].'">'.$value['jardins_nom'].'</option>';
            }
            ?>
        </select><br>
        Parcelle disponible (optionnel):
        <select name="disponibilite">
            <option value="">--Sélectionner--</option>
            <option value="disponible">Oui</option>
            <option value="réservée">Non</option>
        </select><br>

        Utilisateur(optinel):
        <select name="utilisateurs">
            <option value="">--Sélectionner--</option>
            <?php
            include('../pdo.php');
            $mabd->query('SET NAMES utf8;');
            $req = "SELECT * FROM utilisateurs";
            $resultat = $mabd->query($req);

            foreach ($resultat as $value){        
                echo '<option value="'.$value['utilisateurs_id'].'">'.$value['utilisateurs_nom'].'</option>';
            }
            ?>
        </select>
        <br>   
        <input type="submit" name="ajouter">
    </form>
    <?php
    include('../autres_pages/footer.php');
?>
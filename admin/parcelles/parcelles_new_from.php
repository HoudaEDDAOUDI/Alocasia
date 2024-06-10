<?php
    include('../autres_pages/header.php');
?> 
    <a href="parcelles_gestion.php" class="retour">Retour</a> 	
        <hr>
    <!-- PAS FINIIIIIS -->
    <h2>Ajout d'un article</h2>
    <hr>
    <?php
        include('../pdo.php');
        $mabd->query('SET NAMES utf8;');
        $req = 'SELECT * FROM  jardins INNER JOIN parcelles ON jardins._jardins_id=parcelles.jardins_id';
    ?>

    <form method="POST" action="jardins_new_valid.php" enctype="multipart/form-data">
        Type de plantations:<input type="text" name="plantations" ><br>
        date de début:<input type="text" name="debut" ><br>
        date de fin:<input type="text" name="fin" ><br>
        Choisir le jardin:</label><select name="jardins">
            <?php
            include('../pdo.php');
            $mabd->query('SET NAMES utf8;');
            $req = "SELECT * FROM jardins";
            $resultat = $mabd->query($req);

            foreach ($resultat as $value){        
                echo '<option value="'.$value['jardins_id'].'">'.$value['jardins_nom'].'</option>';
            }
            ?>
        </select>
        <select name="utilisateurs">
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
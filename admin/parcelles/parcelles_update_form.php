<?php
    include('../autres_pages/header.php');
?>
    <!------------- le valid de cette page NE MARCHE PAS ------------>
    <a href="parcelles_gestion.php" class="retour">Retour</a> 	
	<hr>
    <h2>Modifier une parcelle</h2>
    <p>Parcelles que vous voulez modifier:</p>
    <?php
        $num = $_GET['num'];
        include('../pdo.php');
        $mabd->query('SET NAMES utf8;');
        $req = 'SELECT * FROM  parcelles WHERE parcelles_id='.$num.'';
        $resultat = $mabd->query($req);
        $jardins = $resultat->fetch();
    ?>
    <hr>
    <hr>

<div class="recherche">  
    <div id="recherche2">
        <form method="POST" action="parcelles_update_valid.php" enctype="multipart/form-data">
            <input type="hidden" name="num"  value="<?php echo $jardins['parcelles_id']; ?>">
            Nom:<input type="text" name="nom" value="<?php echo $jardins['parcelles_nom'];?>"><br>
            Type de plantations:<input type="text" name="plantation" value="<?php echo $jardins['parcelles_plantations'];?>"><br>
            Date de début:<input type="date" name="debut" value="<?php echo $jardins['parcelles_date_debut'];?>"><br>
            Date de fin:<input type="date" name="fin" value="<?php echo $jardins['parcelles_date_fin'];?>"><br>
            Choisir le jardin:
            <select name="jardins">
                <?php
                include('../pdo.php');
                $mabd->query('SET NAMES utf8;');
                $req = "SELECT * FROM jardins ORDER BY jardins_nom ASC";
                $resultat = $mabd->query($req);

                foreach ($resultat as $value){
                    $selection="";
                    if($jardins['_jardins_id'] == $value['jardins_id']) $selection="selected";          
                    echo '<option '.$selection.' value="'.$value['jardins_id'].'">'.$value['jardins_nom'].'</option>';
                }
                ?>
            </select><br>
            Parcelle disponible (optionnel):
            <select name="disponibilite">
                <?php
                include('../pdo.php');
                $mabd->query('SET NAMES utf8;');
                $req = 'SELECT * FROM  parcelles WHERE parcelles_id='.$num.'';
                $resultat = $mabd->query($req);
                $current_disponibilite = $resultat->fetchColumn();

                $options = [
                    'disponible' => 'Oui',
                    'réservée' => 'Non'
                ];

                foreach ($options as $value => $label) {
                    $selected = ($value === $current_disponibilite) ? 'selected' : '';
                    echo '<option value="' . $value . '" ' . $selected . '>' . $label . '</option>';
                }
                ?>
            </select><br>
            Utilisateur(optinel):
            <select name="utilisateurs">
                <?php
                include('../pdo.php');
                $mabd->query('SET NAMES utf8;');
                $req = "SELECT * FROM utilisateurs ORDER BY utilisateurs_nom ASC";
                $resultat = $mabd->query($req);

                foreach ($resultat as $value){
                    $selection="";
                    if($jardins['_utilisateurs_id'] == $value['utilisateurs_id']) $selection="selected";          
                    echo '<option '.$selection.' value="'.$value['utilisateurs_id'].'">'.$value['utilisateurs_nom'].'</option>';
                }
                ?>
            </select><br>
            <br>   
            <input type="submit" name="">
        </form>
    </div>
</div>  
<?php
    include('../autres_pages/footer.php');
?>
<?php
include('../../autres_pages/header.php');
?>
<main class="contact">
<hr>
<h1>Modifier ma réservation parcelle</h1>
<section class="contact-form-section">
<?php
$num = $_GET['num'];
include('../../admin/pdo.php');
$mabd->query('SET NAMES utf8;');
$req = 'SELECT * FROM parcelles WHERE parcelles_id="' . $num.'"';
$resultat = $mabd->query($req);
$res = $resultat->fetch();


?>


        <form method="POST" action="parcelles_modif_valid.php" enctype="multipart/form-data" class="contact-form">
            <input type="hidden" name="num" value="<?php echo $res['parcelles_id']; ?>">
            <p>Nom: <?php echo $res['parcelles_nom']; ?></p>
            <p>Date de réservation: <?php echo $res['parcelles_date_debut']; ?> au <?php echo $res['parcelles_date_fin']; ?></p>
            <p>Type de plantations actuel: <?php echo $res['parcelles_plantations']; ?><br><br><br><br></p>
            <p>Nouveau type de plantations:</p>

            <select name="type_plantations" id="type_plantations">
                <option value="<?php echo $res['parcelles_plantations']; ?>"><?php echo $res['parcelles_plantations']; ?></option>
                <?php
                // Now you can fetch all rows for the select options
                $req_options = 'SELECT DISTINCT parcelles_plantations FROM parcelles';
                $resultat_options = $mabd->query($req_options);
                
                while ($row = $resultat_options->fetch(PDO::FETCH_ASSOC)) {
                    echo '<option value="'. $row['parcelles_plantations'] .'">' . $row['parcelles_plantations'] . '</option>';
                }
                ?>
            </select><br><br>

            <button type="submit" class="button-envoyer">Modifier</button>
        </form>
</section>
</main>
<?php
include('../../autres_pages/footer.php');
?>

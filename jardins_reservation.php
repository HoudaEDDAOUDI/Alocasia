<?php
    include('autres_pages/header.php');
?>
<main>
    <section class="contact-form-section">
        <h2>Réservation</h2>
        <?php
            $num=$_GET['num'];

            include('admin/pdo.php');
            $mabd->query('SET NAMES utf8;');
            $req = 'SELECT * FROM  jardins WHERE jardins_id='.$num.'';
            $resultat = $mabd->query($req);
            foreach($resultat as $value){
                echo '<h3>'.$value['jardins_nom'].'.</h3>';
                echo '<img src="../images/'.$value['jardins_photo'].'" alt="'.$value['jardins_photo'].'">';
                echo '<p>Chez '.$value['jardins_proprietaire'].'.</p>';
                echo '<p>'.$value['jardins_adresse'].'</p>';
                echo '<p>'.$value['jardins_surface'].' m²</p>';
            }
        ?>
        <h3>Parcelles</h3>
        <div id="parcelles_choix">
            <?php
            include('admin/pdo.php');
            $mabd->query('SET NAMES utf8;');
            $req = 'SELECT * FROM parcelles WHERE _jardins_id='.$num;
            $resultat = $mabd->query($req);
            foreach($resultat as $value){
                $couleur = ($value['parcelles_disponibilite'] == 'disponible') ? 'green' : 'red';
                echo '<button style="background:' . $couleur . ';">'.$value['parcelles_nom'].'</button>';
            }
            ?>
        </div>
    </section>
</main>
<script>
    var button = document.querySelector('button');
    
</script>
<?php
    include('autres_pages/footer.php');
?>
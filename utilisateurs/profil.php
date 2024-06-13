<?php
include('../autres_pages/header.php');
?>

<main>
    <section class="profile-section">
        <h2>Mon profil</h2>

        <div class="profile-info2">
            
            <div class="profile-info">
                <div class="profile-picture">
                    <?php echo '<img id="profile-picture" src="/images/uploads/'.$_SESSION['utilisateurs_photo'].'" alt="'.$_SESSION['utilisateurs_nom'].'">'; ?>
                </div>
                <div class="profile-picture2"> 
                    <p><?php echo $_SESSION['utilisateurs_nom'].' '.$_SESSION['utilisateurs_prenom']; ?></p>
                    <button><a href="modif/profil_modif.php">Modifier mon profil</a></button>
                    <button><a href="modif/profil_modif_mdp.php">Modifier mon mot de passe</a></button>
                </div>
            </div>
        </div>

        <div class="profile-content" style="color:white;">
            <div class="profile-box">
                <h3>Mes parcelles</h3>
                <ul>
                    <?php
                    include('../admin/pdo.php');
                    $mabd->query('SET NAMES utf8;');
                    $req =  'SELECT * FROM parcelles 
                             JOIN utilisateurs ON parcelles._utilisateurs_id = utilisateurs.utilisateurs_id 
                             JOIN jardins ON parcelles._jardins_id = jardins.jardins_id
                             WHERE utilisateurs_nom = "'.$_SESSION['utilisateurs_nom'].'"';
                    $resultat = $mabd->query($req);

                    foreach($resultat as $value){
                        echo '
                        <li>
                            <div>
                                <img class="myparcelle" src="/images/uploads/'.$value['jardins_photo'].'" alt="'.$value['jardins_photo'].'">
                                <span>'.$value['jardins_nom'].' - '.$value['parcelles_nom'].' - '.$value['parcelles_date_debut'].' au '.$value['parcelles_date_fin'].'</span>
                                <button><a href="modif/parcelles_deconnect.php?num='.$value['parcelles_id'].'">Annuler la réservation</a></button>
                            </div>
                            <hr>
                        </li>
                        ';
                    }
                    ?>
                </ul>
            </div>

            <div class="profile-box">
                <h3>Valider ou refuser la demande de parcelle</h3>
                <ul>
                    <li>Raphael - Parc des moulins - parcelles 2 <span class="check-mark">&#10004;</span><span class="cross-mark">&#10006;</span></li>
                    <li>Houda - Jardin de sauterelle - parcelles 7 <span class="check-mark">&#10004;</span><span class="cross-mark">&#10006;</span></li>
                    <li>Imad - Jardin du pommier - parcelles 1 <span class="check-mark">&#10004;</span><span class="cross-mark">&#10006;</span></li>
                </ul>
            </div>
        </div>
    </section>
</main>

<?php
include('../autres_pages/footer.php');
?>

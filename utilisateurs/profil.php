<?php
include('../autres_pages/header.php');
?>

<main class="my_profil">
    <section class="profile-section">
        <h1>Mon profil</h1>
        <?php
                    include('../admin/pdo.php');
                    $mabd->query('SET NAMES utf8;');
                    
                    $req =  'SELECT * FROM parcelles
                 JOIN utilisateurs ON parcelles._utilisateurs_id = utilisateurs.utilisateurs_id 
                 JOIN jardins ON parcelles._jardins_id = jardins.jardins_id
                 WHERE utilisateurs.utilisateurs_id = "'.$_SESSION['utilisateurs_id'].'" AND parcelles.parcelles_disponibilite = "réservée"';
                    $resultat = $mabd->query($req);
                    $row = $resultat->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="profile-info2">
            
            <div class="profile-info">
                <div class="profile-picture">
                    <?php echo '<img id="profile-picture" src="/images/uploads/'.$row['utilisateurs_photo'].'" alt="'.$row['utilisateurs_photo'].'">'; ?>
                    <a id="modif_pro" href="modif/profil_modif.php?num='<?php echo $row['utilisateurs_id'] ?>'">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48" height="48" viewBox="0 0 48 48"> <path d="M 36 5.0097656 C 34.205301 5.0097656 32.410791 5.6901377 31.050781 7.0507812 L 8.9160156 29.183594 C 8.4960384 29.603571 8.1884588 30.12585 8.0253906 30.699219 L 5.0585938 41.087891 A 1.50015 1.50015 0 0 0 6.9121094 42.941406 L 17.302734 39.974609 A 1.50015 1.50015 0 0 0 17.304688 39.972656 C 17.874212 39.808939 18.39521 39.50518 18.816406 39.083984 L 40.949219 16.949219 C 43.670344 14.228094 43.670344 9.7719064 40.949219 7.0507812 C 39.589209 5.6901377 37.794699 5.0097656 36 5.0097656 z M 36 7.9921875 C 37.020801 7.9921875 38.040182 8.3855186 38.826172 9.171875 A 1.50015 1.50015 0 0 0 38.828125 9.171875 C 40.403 10.74675 40.403 13.25325 38.828125 14.828125 L 36.888672 16.767578 L 31.232422 11.111328 L 33.171875 9.171875 C 33.957865 8.3855186 34.979199 7.9921875 36 7.9921875 z M 29.111328 13.232422 L 34.767578 18.888672 L 16.693359 36.962891 C 16.634729 37.021121 16.560472 37.065723 16.476562 37.089844 L 8.6835938 39.316406 L 10.910156 31.521484 A 1.50015 1.50015 0 0 0 10.910156 31.519531 C 10.933086 31.438901 10.975086 31.366709 11.037109 31.304688 L 29.111328 13.232422 z"></path> </svg>
                    </a>
                </div>
                <div class="profile-picture2"> 
                    <p><?php echo $_SESSION['utilisateurs_nom'].' '.$_SESSION['utilisateurs_prenom']; ?></p>
                    <a class="button-envoyer2" href="modif/profil_modif_mdp.php">Modifier mon mot de passe</a>
                </div>
            </div>
        </div>
        <div class="profile-content" >
        <?php
                    if(isset($_SESSION['info'])){
                        if($_SESSION['info'] == 'Vous venez d\'annuler la réservation de la parcelle'){
                            ?>
                                <div id="valide">
                                    <div class="success">
                                        <div class="success__icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none"><path fill-rule="evenodd" fill="#393a37" d="m12 1c-6.075 0-11 4.925-11 11s4.925 11 11 11 11-4.925 11-11-4.925-11-11-11zm4.768 9.14c.0878-.1004.1546-.21726.1966-.34383.0419-.12657.0581-.26026.0477-.39319-.0105-.13293-.0475-.26242-.1087-.38085-.0613-.11844-.1456-.22342-.2481-.30879-.1024-.08536-.2209-.14938-.3484-.18828s-.2616-.0519-.3942-.03823c-.1327.01366-.2612.05372-.3782.1178-.1169.06409-.2198.15091-.3027.25537l-4.3 5.159-2.225-2.226c-.1886-.1822-.4412-.283-.7034-.2807s-.51301.1075-.69842.2929-.29058.4362-.29285.6984c-.00228.2622.09851.5148.28067.7034l3 3c.0983.0982.2159.1748.3454.2251.1295.0502.2681.0729.4069.0665.1387-.0063.2747-.0414.3991-.1032.1244-.0617.2347-.1487.3236-.2554z" clip-rule="evenodd"></path></svg>
                                        </div>
                                        <div class="success__title"><?php echo $_SESSION['info']; ?></div>
                                            <div class="success__close"><svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20"><path fill="#393a37" d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }else{
                            ?>
                                <div id="erreur">
                                    <div class="error">
                                        <div class="error__icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none"><path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path></svg>
                                        </div>
                                        <div class="error__title"><?php echo $_SESSION['info']; ?></div>
                                        <div class="error__close"><svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20"><path fill="#393a37" d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"></path></svg></div>
                                    </div> 
                                </div>
                            <?php
                        }
                        unset($_SESSION['info']);
                    }
                ?>
            <div class="profile-box">
                <h2>Vos parcelles</h2>
                <ul>
                       <table class="tabprofil">
                            <thead>
                                    <td><strong>Jardins</strong></td>
                                    <td><strong>Parcelle(s) reservé(es)</strong></td>
                                    <td><strong>Date de la reservation</strong></td>
                                    <td><strong>Plantation</strong></td>
                                    <td><strong>Annuler</strong></td>
                                    <td><strong>Modifier</strong></td>
                            </thead>
                            <tbody>
                       <?php 
                    foreach($resultat as $value){
                        echo '<tr class="tr">';
                            echo '<td>' . $value['jardins_nom'] . '</td>';
                            echo '<td>' . $value['parcelles_nom'] . '</td>';
                            echo '<td>' . $value['parcelles_date_debut'] . ' au '. $value['parcelles_date_fin'] .'</td>';
                            echo '<td>' . $value['parcelles_plantations'] . '</td>';
                            echo '<td><a href="modif/parcelles_deconnect.php?num='.$value['parcelles_id'].'"><span class="cross-mark">&#10006;</span></a></td>';
                            echo '<td><a href="modif/parcelles_modif.php?num='.$value['parcelles_id'].'"><span class="cross-modif">&#9998;</span></a></td>';
                        echo '</tr>';
                        
                        
                    }
                    ?>
                </ul>
            </div>
                </tbody>
            </table>
            <div class="profile-box2">
    <h2>Suivez ci-dessous l’état d’avancement de vos demandes de parcelles</h2>
    <ul>
        <?php
            $req =  'SELECT * FROM parcelles
                    JOIN utilisateurs ON parcelles._utilisateurs_id = utilisateurs.utilisateurs_id 
                    JOIN jardins ON parcelles._jardins_id = jardins.jardins_id
                    WHERE utilisateurs.utilisateurs_id = "'.$_SESSION['utilisateurs_id'].'" AND parcelles.parcelles_disponibilite = "en attente"';
            $resultat = $mabd->query($req);
        

            if ($resultat->rowCount() == 0) {
                echo '<p>Vous n\'avez aucune parcelle en attente.</p>';
            } else {
                foreach ($resultat as $value) {
                    echo '<li>
                        <p>' . $value['jardins_proprietaire'] . '</p>
                        <p> - </p>
                        <p>' . $value['jardins_nom'] . '</p>
                        <p> - </p>
                        <p>' . $value['parcelles_nom'] . '</p>';
                        
                    // Display the correct status icon
                    if ($value['parcelles_disponibilite'] == 'réservée') {
                        echo '<span class="check-mark">&#10004;</span>';
                    } elseif ($value['parcelles_disponibilite'] == 'disponible') {
                        echo '<span class="cross-mark">&#10006;</span>';
                    } elseif ($value['parcelles_disponibilite'] == 'en attente') {
                        echo '<span class="attente">&#10227;</span>';
                    }

                    echo '</li>';
                }
            }
            ?>
        </ul>
    </div>
        </div>
        <div class="profile-box3">
            <!-- <p><span class="check-mark">&#10004;</span> = validée</p> -->
            <p><span class="cross-mark">&#10006;</span> = annuler</p>
            <p><span class="attente">&#10227;</span> = en attente</p>
        </div>
    </section>
</main>
<script>
    document.querySelectorAll('.error__close, .success__close').forEach(function(closeBtn) {
    closeBtn.addEventListener('click', function() {
        this.closest('.error, .success').style.display = 'none';
    });
    });
</script>
<?php
include('../autres_pages/footer.php');
?>

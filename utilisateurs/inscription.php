<?php
    include('../autres_pages/header.php');
?>


<section class="registration-form-section">
    <h2>Inscription</h2>
    <?php
        if(isset($_SESSION['erreur'])){
    ?>
        <div id="erreur">
            <div class="error">
                <div class="error__icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none"><path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path></svg>
                </div>
                <div class="error__title"><?php echo htmlspecialchars($_SESSION['erreur']); ?></div>
                <div class="error__close"><svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20"><path fill="#393a37" d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"></path></svg></div>
            </div> 
        </div>
    <?php
            unset($_SESSION['erreur']);
        }
    ?>
    <form action="verif_inscription.php" method="post" class="registration-form">
        <label for="nom">Nom* :</label>
            <input type="text" id="nom" name="utilisateurs_nom" placeholder="nom" required>

        <label for="prenom">Prénom* :</label>
            <input type="text" id="prenom" name="utilisateurs_prenom" placeholder="prenom" required>

        <label for="email">Email* :</label>
            <input type="email" id="email" name="utilisateurs_mail" placeholder="email" required>

        <label for="password">Mot de passe * :</label>
            <input type="password" id="password" name="utilisateurs_mdp" placeholder="mot de passe" required>

        <label for="confirm-password">Confirmation du mot de passe * :</label>
        <input type="password" id="confirm-password" name="utilisateurs_mdp2" placeholder="confirmer le mot de passe" required>

        <label class="checkbox-container">
            <input type="checkbox" required>
            <span class="checkmark"></span>
            Accepter les conditions générales d'utilisation.
        </label>

        <button type="submit" class="submit-button">Inscription</button>
    </form>
</section>
<?php
    include('../autres_pages/footer.php');
?>
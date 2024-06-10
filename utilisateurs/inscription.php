<?php
    include('../autres_pages/header.php');
?>


<section class="registration-form-section">
    <h2>Inscription</h2>
    <?php
        if(isset($_SESSION['erreur'])){
            echo '<div>'.htmlspecialchars($_SESSION['erreur']).'</div>';
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
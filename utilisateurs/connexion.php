<?php
    include('../autres_pages/header.php');
?>
<section class="login-form-section">
    <h2>Connexion</h2>
    <form action="verif_connexion.php" method="post" class="login-form">
        <label for="email">Email * :</label>
            <input type="text" id="email" name="utilisateurs_mail" placeholder="email" required>

        <label for="password">Mot de passe * :</label>
            <input type="password" id="password" name="utilisateurs_mdp" placeholder="mot de passe" required>

        <button type="submit" class="submit-button">Connexion</button>
        <p class="signup-link">Pas de compte ? <a href="inscription.html">Créez le maintenant</a></p>
    </form>
</section>
    <?php
        if(isset($_SESSION['erreur'])){
            echo '<div>'.htmlspecialchars($_SESSION['erreur']).'</div>';
            unset($_SESSION['erreur']);
        }
    ?>
<?php
    include('../autres_pages/footer.php');
?>
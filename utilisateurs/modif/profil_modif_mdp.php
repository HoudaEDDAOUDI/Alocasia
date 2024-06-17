<?php
include('../../autres_pages/header.php');
?>
<main class="contact">
<h1>Modifier mon mot de passe</h1>
<section class="contact-form-section">
    <?php
    include('../../admin/pdo.php');
    $mabd->query('SET NAMES utf8;');

    // Préparer la requête SQL pour éviter les injections SQL
    $req = $mabd->prepare('SELECT * FROM utilisateurs WHERE utilisateurs_nom = :nom');
    $req->execute(['nom' => $_SESSION['utilisateurs_nom']]);
    $utilisateurs = $req->fetch();
    ?>
    <form action="profil_modif_mdp_valid.php" method="post" class="contact-form">
        <input type="hidden" name="num" value="<?php echo htmlspecialchars($utilisateurs['utilisateurs_id']); ?>">
        <div class="input-container">
            <input type="password" name="ancien_mdp" required>
            <label for="ancien_mdp">Votre ancien mot de passe</label>
        </div>
        <div class="input-container">
            <input type="password" name="nouveau_mdp" required>
            <label for="nouveau_mdp">Votre nouveau mot de passe* :</label>
        </div>
        <div class="input-container">
            <input type="password" name="nouveau2_mdp" required>
            <label for="nouveau2_mdp">Confirmer votre nouveau mot de passe* :</label>
        </div>
        <button type="submit" class="button-envoyer">Modifier</button>
    </form>
</section>
</main>
<?php
include('../../autres_pages/footer.php');
?>
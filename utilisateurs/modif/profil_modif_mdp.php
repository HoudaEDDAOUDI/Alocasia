<?php
include('../../autres_pages/header.php');
?>
<section class="registration-form-section">
    <h2>Modifier mon mot de passe</h2>
    <?php
    include('../../admin/pdo.php');
    $mabd->query('SET NAMES utf8;');

    // Préparer la requête SQL pour éviter les injections SQL
    $req = $mabd->prepare('SELECT * FROM utilisateurs WHERE utilisateurs_nom = :nom');
    $req->execute(['nom' => $_SESSION['utilisateurs_nom']]);
    $utilisateurs = $req->fetch();
    ?>
    <form action="profil_modif_mdp_valid.php" method="post" class="registration-form">
        <input type="hidden" name="num" value="<?php echo htmlspecialchars($utilisateurs['utilisateurs_id']); ?>">

        <label for="ancien_mdp">Votre ancien mot de passe* :</label>
        <input type="password" name="ancien_mdp" required>

        <label for="nouveau_mdp">Votre nouveau mot de passe* :</label>
        <input type="password" name="nouveau_mdp" required>

        <label for="nouveau2_mdp">Confirmer votre nouveau mot de passe* :</label>
        <input type="password" name="nouveau2_mdp" required>

        <button type="submit" class="submit-button">Modifier</button>
    </form>
</section>
<?php
include('../../autres_pages/footer.php');
?>
<?php
include('../../autres_pages/header.php');
?>
<section class="registration-form-section">
    <h2>Modifier mon profil</h2>
    <?php

    $ancien_mdp = $_POST['ancien_mdp'];
    $nouveau_mdp = $_POST['nouveau_mdp'];
    $nouveau2_mdp = $_POST['nouveau2_mdp'];
    $num = $_POST['num'];

    if ($nouveau_mdp !== $nouveau2_mdp) {
        echo "Les nouveaux mots de passe ne correspondent pas.";
        exit;
    }

    include('../../admin/pdo.php');
    $mabd->query('SET NAMES utf8;');

    if (password_verify($ancien_mdp,$_SESSION['utilisateurs_mdp'])) {
       
        $nouveau_mdp_hache = password_hash($nouveau_mdp, PASSWORD_DEFAULT);

        $req = $mabd->prepare('UPDATE utilisateurs SET utilisateurs_mdp = :mdp WHERE utilisateurs_id = :id');
        $req->execute(['mdp' => $nouveau_mdp_hache, 'id' => $num]);

        echo "Votre mot de passe a été mis à jour avec succès.";
    } else {
        echo "L'ancien mot de passe est incorrect.";
    }
    ?>
    <br><button><a href="../profil.php">Retourner à mon profil.</a></button>
</section>
<?php
include('../../autres_pages/footer.php');
?>

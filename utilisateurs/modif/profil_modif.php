<?php
    include('../../autres_pages/header.php');
?>
    <section class="registration-form-section">
    <h2>Modifier mon profil</h2>
    <?php
        include('../../admin/pdo.php');
        $mabd->query('SET NAMES utf8;');

        // Préparer la requête SQL pour éviter les injections SQL
        $req = $mabd->prepare('SELECT * FROM utilisateurs WHERE utilisateurs_nom = :nom');
        $req->execute(['nom' => $_SESSION['utilisateurs_nom']]);
        $utilisateurs = $req->fetch();
    ?>
    <form action="profil_modif_valid.php" method="post" class="registration-form">

            <input type="hidden" name="num"  value="<?php echo $utilisateurs['utilisateurs_id']; ?>">

        <label for="nom">Nom* :</label>
            <input type="text" name="nom" value="<?php echo $utilisateurs['utilisateurs_nom'];?>" required>

        <label for="prenom">Prénom* :</label>
            <input type="text" name="prenom" value="<?php echo $utilisateurs['utilisateurs_prenom'];?>" required>

        <label for="email">Email* :</label>
            <input type="email" name="mail" value="<?php echo $utilisateurs['utilisateurs_mail'];?>" required>

        <label for="photo">Photo* :</label>
            <input type="file" name="photo" value="<?php echo $utilisateurs['utilisateurs_photo'];?>" required>

        <button type="submit" class="submit-button">Modifier</button>
    </form>
</section>
<?php
    include('../../autres_pages/footer.php');
?>
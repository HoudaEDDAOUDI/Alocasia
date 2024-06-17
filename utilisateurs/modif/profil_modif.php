<?php
    include('../../autres_pages/header.php');
?>
<main class="contact">
<h1>Modifier mon profil</h1>
    <section class="contact-form-section">
    
    <?php
        include('../../admin/pdo.php');
        $mabd->query('SET NAMES utf8;');

        // Préparer la requête SQL pour éviter les injections SQL
        $req = $mabd->prepare('SELECT * FROM utilisateurs WHERE utilisateurs_nom = :nom');
        $req->execute(['nom' => $_SESSION['utilisateurs_nom']]);
        $utilisateurs = $req->fetch();
    ?>
    <form action="profil_modif_valid.php" method="post" class="contact-form">

            <input type="hidden" name="num"  value="<?php echo $utilisateurs['utilisateurs_id']; ?>">

        <div class="contact-nom-prenom">
            <div class="input-container2">
                <input placeholder="John" type="text" name="prenom" value="<?php echo $utilisateurs['utilisateurs_prenom'];?>" required>
                <label for="prenom">Prénom</label>
            </div>
            <div class="input-container2">
                <input placeholder="Doe" type="text" name="nom" value="<?php echo $utilisateurs['utilisateurs_nom'];?>" required>
                <label for="nom">Nom</label>
            </div>
        </div>

        <div class="input-container">
                <input placeholder="john.doe@gmail.com" type="email" name="mail" value="<?php echo $utilisateurs['utilisateurs_mail'];?>" required>
                <label for="email">Email</label>
        </div>

        <div class="input-container">
            <input type="file" name="photo" id="photo">
            <label for="photo">Photo</label>
        </div>

        <button type="submit" class="button-envoyer">Modifier</button>
    </form>
</section>
</main>
<?php
    include('../../autres_pages/footer.php');
?>
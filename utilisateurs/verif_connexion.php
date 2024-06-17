<?php
ob_start();

require("../autres_pages/header.php");
$email = $_POST['utilisateurs_mail'];
$password = $_POST['utilisateurs_mdp'];

function verif_utilisateur($mail)
{
    require("../admin/pdo.php");
    try {
        $req = $mabd->query('SELECT * FROM utilisateurs WHERE utilisateurs_mail = "'.$mail.'"');
        $resultat = $req->fetch();
        return $resultat;
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
        return false;
    }
}

function verif_connexion() {
    if(isset($_POST['utilisateurs_mail']) && isset($_POST['utilisateurs_mdp'])) {
        
        $resul = verif_utilisateur($_POST['utilisateurs_mail']);

        if($resul && password_verify($_POST['utilisateurs_mdp'], $resul['utilisateurs_mdp'])) {
            session_start();
            $_SESSION['utilisateurs_nom'] = $resul['utilisateurs_nom'];
            $_SESSION['utilisateurs_prenom'] = $resul['utilisateurs_prenom'];
            $_SESSION['utilisateurs_id'] = $resul['utilisateurs_id'];
            $_SESSION['utilisateurs_mail'] = $resul['utilisateurs_mail'];
            $_SESSION['utilisateurs_photo'] = $resul['utilisateurs_photo']; 

            header('Location: /index.php');
            exit();
        } else {
            $_SESSION['erreur'] = 'Identifiants incorrects.';
            header('Location: /utilisateurs/connexion.php');
        }
    } else {
        $_SESSION['erreur'] = 'Les champs sont mal remplis.';
        header('Location: /utilisateurs/connexion.php');
    }
}
    verif_connexion();
    ?>
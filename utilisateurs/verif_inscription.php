<?php
ob_start();
require("../autres_pages/header.php");

$nom = $_POST['utilisateurs_nom'];
$prenom = $_POST['utilisateurs_prenom'];
$mail = $_POST['utilisateurs_mail'];
$mdp = $_POST['utilisateurs_mdp'];
$mdp2 = $_POST['utilisateurs_mdp2'];

function inscription_utilisateur($nom, $prenom, $mail, $mdp) {
    require("../admin/pdo.php");

    try {
        $req = $mabd->prepare('INSERT INTO utilisateurs (utilisateurs_nom, utilisateurs_prenom, utilisateurs_mail, utilisateurs_mdp) VALUES (?, ?, ?, ?)');
        $req->execute([$nom, $prenom, $mail, $mdp]);
        return $mabd->lastInsertId();
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
        return false;
    }
}

function verif_utilisateur($mail) {
    require("../admin/pdo.php");
    try {
        $req = $mabd->prepare('SELECT * FROM utilisateurs WHERE utilisateurs_mail = ?');
        $req->execute([$mail]);
        return $req->fetch();
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
        return false;
    }
}

function validation_inscription() {
    if(isset($_POST['utilisateurs_mail']) && isset($_POST['utilisateurs_mdp']) && isset($_POST['utilisateurs_mdp2']) && isset($_POST['utilisateurs_nom']) && isset($_POST['utilisateurs_prenom'])) {
        if($_POST['utilisateurs_mdp'] == $_POST['utilisateurs_mdp2']) {
            $resul = verif_utilisateur($_POST['utilisateurs_mail']);

            if(!$resul) {
                // Définition de l'image par défaut
 

                $mot = password_hash($_POST['utilisateurs_mdp'], PASSWORD_DEFAULT);
                $userId = inscription_utilisateur($_POST['utilisateurs_nom'], $_POST['utilisateurs_prenom'], $_POST['utilisateurs_mail'], $mot, $image_par_defaut);

                if ($userId) {
                    session_start();
                    $_SESSION['utilisateurs_id'] = $userId;
                    $_SESSION['utilisateurs_nom'] = $_POST['utilisateurs_nom'];
                    $_SESSION['utilisateurs_prenom'] = $_POST['utilisateurs_prenom'];
                    $_SESSION['utilisateurs_mail'] = $_POST['utilisateurs_mail'];

                    header('Location: /index.php');
                    exit();
                } else {
                    echo "Erreur lors de l'inscription.";
                }
            } else {
                $_SESSION['erreur'] = 'Vous avez déjà un compte.';
                header('Location: /utilisateurs/connexion.php');
            }
        } else {
            $_SESSION['erreur'] = 'Les mots de passe sont différents.';
            header('Location: /utilisateurs/inscription.php');
        }
    } else {
        $_SESSION['erreur'] = 'Les champs sont mal remplis.';
        header('Location: /utilisateurs/inscription.php');
    }
}


validation_inscription();
?>
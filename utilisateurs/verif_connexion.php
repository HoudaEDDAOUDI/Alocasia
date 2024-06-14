<?php
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

function verif_connexion()
    {
        //on vérifie si les champs sont bien remplis
        if(isset($_POST['utilisateurs_mail']) && isset($_POST['utilisateurs_mdp']))
        {
            // on uilise la fonction verif_utilisateur du modèle connexion_model
            // cette fonction n'existe pas encore dans notre modele, nous allons l'ecrire apres.
            $resul=verif_utilisateur($_POST['utilisateurs_mail']);
        
            //on vérifie si le login et le mot de passe sont corrects avec le hash du mot de passe
            if($resul['utilisateurs_mail']==$_POST['utilisateurs_mail'] && password_verify($_POST['utilisateurs_mdp'],$resul['utilisateurs_mdp']))
            {
                //si c'est le cas, on crée une session pour l'utilisateur
                session_start();
                $_SESSION['utilisateurs_nom']=$resul['utilisateurs_nom'];
                $_SESSION['utilisateurs_prenom']=$resul['utilisateurs_prenom'];
                $_SESSION['utilisateurs_id']=$resul['utilisateurs_id'];

                $resultat['utilisateurs_photo']= 'avatar_default.webp';
                $_POST['utilisateurs_photo'] = $resultat['utilisateurs_photo'];
                $_SESSION['utilisateurs_photo'] = $_POST['utilisateurs_photo'];

                $_SESSION['utilisateurs_mail']=$resul['utilisateurs_mail'];
                $_SESSION['utilisateurs_mdp']=$resul['utilisateurs_mdp'];
                //on affiche un message de connexion réussie
                header('Location: /index.php');
                //echo 'connexion réussie';
            }
            else
            {
                //on affiche un message d'erreur si le login ou le mot de passe sont incorrects
                header('Location: /utilisateurs/connexion.php');
                //echo 'erreur de connexion login ou mot de passe incorrects';
                $_SESSION['erreur']='Erreur de connexion : le mot de passe est incorrects.';
            }
        }
        else
        {
            //si les champs ne sont pas remplis
            //on affiche un message d'erreur si les champs ne sont pas remplis
            header('Location: /utilisateurs/connexion.php');
            //echo 'erreur de connexion les champs ne sont pas remplis';
            $_SESSION['erreur']='Erreur de connexion : les champs ne sont pas remplis.';
        }
    }
    verif_connexion();
    ?>
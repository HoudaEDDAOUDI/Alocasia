<?php
require("../autres_pages/header.php");

$nom=$_POST['utilisateurs_nom'];
$prenom=$_POST['utilisateurs_prenom'];
$mail=$_POST['utilisateurs_mail'];
$mdp=$_POST['utilisateurs_mdp'];
$mdp2=$_POST['utilisateurs_mdp2'];

function inscription_utilisateur($nom,$prenom,$mail,$mdp){
    require("../admin/pdo.php");
    // $req = 'INSERT INTO utilisateurs(utilisateurs_nom, utilisateurs_prenom, utilisateurs_mail, utilisateurs_mdp) VALUES ("'.$nom.'","'.$prenom.'","'.$mail.'","'.$mdp.'")';
    // $resultat = $mabd->query($req);
    // return $resultat;
    // echo 'Bienvenue '.$nom;

    try {
        $req = $mabd->query('INSERT INTO utilisateurs(utilisateurs_nom, utilisateurs_prenom, utilisateurs_mail, utilisateurs_mdp) VALUES ("'.$nom.'","'.$prenom.'","'.$mail.'","'.$mdp.'")');
        $resultat = $req->fetch();
        return $resultat;
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
        return false;
    }
}

function verif_utilisateur($mail)
{
    //on se connecte à la base de données
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

function validation_inscription()
    {
        //on vérifie si les champs sont bien remplis
        if(isset($_POST['utilisateurs_mail']) && isset($_POST['utilisateurs_mdp']) && isset($_POST['utilisateurs_mdp2']) && isset($_POST['utilisateurs_nom']) && isset($_POST['utilisateurs_prenom']))
        {
            //on vérifie si les deux mots de passe sont identiques
            if($_POST['utilisateurs_mdp']==$_POST['utilisateurs_mdp2'])
            {
                //on vérifie si l'utilisateur existe déjà
                $resul=verif_utilisateur($_POST['utilisateurs_mail']);
                
                if(!$resul)
                {
                    //on hash le mot de passe
                    $mot=password_hash($_POST['utilisateurs_mdp'],PASSWORD_DEFAULT);
                    //on crée un nouvel utilisateur
                    // inscription_utilisateur($_POST['utilisateurs_mail'],$mot,$_POST['utilisateurs_nom'],$_POST['utilisateurs_prenom']);
                    // //on crée une session pour l'utilisateur
                    // session_start();
                    // $_SESSION['utilisateurs_nom']=$_POST['utilisateurs_nom'];
                    // inscription_utilisateur($nom,$prenom,$mail,$mdp);
                    //on redirige l'utilisateur vers la page d'accueil
                    // header('Location: ../index.php');
                    // if (
                    inscription_utilisateur($_POST['utilisateurs_nom'], $_POST['utilisateurs_prenom'], $_POST['utilisateurs_mail'], $mot);
                    // ) {
                        $_SESSION['utilisateurs_nom'] = $_POST['utilisateurs_nom'];
                        $_SESSION['utilisateurs_prenom']=$resul['utilisateurs_prenom'];

                        $resultat['utilisateurs_photo']= 'avatar_default.webp';
                        $_POST['utilisateurs_photo'] = $resultat['utilisateurs_photo'];
                        $_SESSION['utilisateurs_photo'] = $_POST['utilisateurs_photo'];

                        $_SESSION['utilisateurs_mail']=$resul['utilisateurs_mail'];
                        $_SESSION['utilisateurs_mdp']=$resul['utilisateurs_mdp'];
                        
                        header('Location: /index.php');
                        echo "Bienvenue.";
                        // exit();
                    // } else {
                    //     echo "Erreur lors de l'inscription.";
                    // }
                }
                else
                {
                    //si l'utilisateur existe déjà, on redirige l'utilisateur vers la page d'inscription
                    $_SESSION['erreur']='Vous avez déjà un compte.';
                    header('Location: /utilisateurs/connexion.php');
                }
            }
            else
            {
                //si les deux mots de passe ne sont pas identiques, on redirige l'utilisateur vers la page d'inscription
                $_SESSION['erreur']='Les mots de passes sont différent.';
                header('Location: /utilisateurs/inscription.php');
            }
        }
        else
        {
            //si les champs ne sont pas remplis, on redirige l'utilisateur vers la page d'inscription
            header('Location: /utilisateurs/inscription.php');
            $_SESSION['erreur']='Les champs sont mal remplis.';
        }
    }
    validation_inscription();
?>
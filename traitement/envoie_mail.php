<?php
session_start();
$_SESSION['information']='';

if (count($_POST)==0) {
	header('location: ../contact.php');
}

$affichage_retour = '';														// Lignes à ajouter au début des vérifications
$erreurs=0;

if (!empty($_POST['nom'])) {
	$nom=$_POST['nom'];
} else {
	$affichage_retour .='Le champ nom est obligatoire.<br>';
    $erreurs++;
}

if (!empty($_POST['prenom'])) {
	$prenom=$_POST['prenom'];
} else {
	$affichage_retour .='Le champ prénom est obligatoire.<br>';
    $erreurs++;
}

if (!empty($_POST['message'])) {
	$message=$_POST['message'];
} else {
	$affichage_retour .='Le champ message est obligatoire.<br>';
    $erreurs++;
}

if (!empty($_POST['demande'])) {
	$demande=$_POST['demande'];
} else {
	$affichage_retour .='Le champ est obligatoire.<br>';
    $erreurs++;
}

if (!empty($_POST['email'])) {
	// Si le champ email contient des données
		// Verification du format de l'email
		if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
		$email=$_POST['email'];
	  } else {
	  // Si l'email est incorrect on retourne au formulaire  
		$affichage_retour .='Le champ email est obligatoire<br>';
		$erreurs++;
	  }
  // Si le champ email est vide, on retourne au formulaire     
  } else {
		$affichage_retour .='Le champ email est obligatoire<br>';
		$erreurs++;
  }

  	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$message=$_POST['message'];
	$email=$_POST['email'];
	$demande=$_POST['demande'];

	$prenom=mb_strtolower($prenom);
	$nom=mb_strtolower($nom);
	$prenom=ucfirst($prenom);
	$nom=ucfirst($nom);

if ($erreurs == 0) {

//__________________________________________________DEMANDE
$objet='SAE105 : demande de '.$prenom.' '.$nom.' pour une '.$demande.' .';
	$headers['From']=$email;							
	$headers['Reply-to']=$email;					
	$headers['X-Mailer']='PHP/'.phpversion();

	$email_dest="mmi23f05@mmi-troyes.fr";
		
	if (mail($email_dest,$objet,$message,$headers)) {
			$erreurs=0;								
		}else {
			$erreurs++;
		}
//__________________________________________________CONFIRMATION

$objet='Alocasia : confirmation d\'envoie du mail pour : '.$demande.' .';
	$headers['From']='mmi23f05@mmi-troyes.fr';							
	$headers['Reply-to']='no-reply@emmi-troyes.fr';						
	$headers['X-Mailer']='PHP/'.phpversion();

	$email_dest=$email;
	$headers['MIME-Version'] = '1.0';
	$headers['content-type'] = 'text/html; charset=utf-8';
	
	$message='<html><body>';
	$message.='<p>Bonjour '.$prenom.' '.$nom.',</p><br>';
	$message.= 'Votre demande concernant '.$demande.' a bien été transmise.';
	$message.= '<p>Nous reviendrons vers vous dans les meilleurs délais afin de répondre à votre demande.</p>';
	$message.= '<p>Cordialement,</p>';
	$message.= '<p>L\'équipe "<em>Discover the world</em>".</p>';
	$message.= '</body></html>';
	
	if (mail($email_dest,$objet,$message,$headers)) {
			$erreurs=0;								
		}else {
			$erreurs++;
		}
	
//____________Détermination du message à affichée après les tentatives d'envoi
	$affichage_retour='Votre demande à bien été envoyée.';
    
	if ($erreurs != 0) {
  	$affichage_retour='Echec de l\'envoi du message.'.$erreurs;
  }
}
$_SESSION['information']=$affichage_retour;
header('location: ../contact.php');
?>
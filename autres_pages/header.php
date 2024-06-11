<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>site officiel</title>
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>
</head>
<body>
    <header class="header">
        <span class="menu-icon" onclick="toggleMenu()">&#9776;</span>
        <nav>
            <ul>
                <li><a href="/index.php">
                    <!-- <img src="house-icon.png" alt="Icon Accueil" class="icon"> -->
                    ACCUEIL</a></li>
                <li><a href="/jardins.php">
                    <!-- <img src="garden-icon.png" alt="Icon Jardins" class="icon"> -->
                    JARDINS</a></li>
                <li><a href="/contact.php">
                    <!-- <img src="contact-icon.png" alt="Icon Contact" class="icon"> -->
                    CONTACT</a></li>
            </ul>
        </nav>

        <?php
        session_start();

        if(isset($_SESSION['utilisateurs_nom']))
        {
            echo '<div> Bienvenue '.$_SESSION['utilisateurs_nom'].'
            <div class="user-space">
                <button class="dropbtn">Mon espace</button>
                <div class="dropdown-content">
                    <a href="/utilisateurs/profil.php">Mon profil</a>
                    <a href="/utilisateurs/deconnexion.php">Se déconnecter</a>
                </div>
            </div>';
        }else{
            echo '
            <div class="user-space">
                <button class="dropbtn">Mon espace</button>
                <div class="dropdown-content">
                    <a href="/utilisateurs/connexion.php">Se connecter</a>
                    <a href="/utilisateurs/inscription.php">S\'inscrire</a>
                </div>
            </div>';
            // echo '<div id="connexion"><a href="/utilisateurs/connexion.php">Connexion</a>/
            // <a href="/utilisateurs/inscription.php">Inscription</a></div>';
        }
        ?>
    </header>
    

<?php
    include('autres_pages/header.php');

    include('pdo.php');
    $mabd->query('SET NAMES utf8;');
    $req = "SELECT COUNT(*) AS nombre_de_jardins
            FROM jardins";
    $resultat = $mabd->query($req);
    $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
    $nombre_de_jardins = $ligne['nombre_de_jardins'];
    echo "<p>Nombre de jardins : $nombre_de_jardins</p>";
    
    
    $mabd->query('SET NAMES utf8;');
    $req = "SELECT COUNT(*) AS nombre_de_utilisateurs
            FROM utilisateurs";
    $resultat = $mabd->query($req);
    $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
    $nombre_de_utilisateurs = $ligne['nombre_de_utilisateurs'];
    echo "<p>Nombre d'utilisateurs : $nombre_de_utilisateurs</p>";

    $mabd->query('SET NAMES utf8;');
    $req = "SELECT COUNT(*) AS nombre_de_parcelles_total
            FROM parcelles";
    $resultat = $mabd->query($req);
    $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
    $nombre_de_parcelles_total = $ligne['nombre_de_parcelles_total'];
    echo "<p>Nombre de parcelles totals : $nombre_de_parcelles_total</p>";

    $mabd->query('SET NAMES utf8;');
    $req = "SELECT COUNT(*) AS nombre_de_parcelles_disponibles 
            FROM parcelles 
            WHERE parcelles_disponibilite = 'disponible'";
    $resultat = $mabd->query($req);
    $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
    $nombre_de_parcelles_disponibles = $ligne['nombre_de_parcelles_disponibles'];
    echo "<p>Nombre de parcelles disponible : $nombre_de_parcelles_disponibles</p>";

    $mabd->query('SET NAMES utf8;');
    $req = "SELECT COUNT(*) AS nombre_de_parcelles_reserve
            FROM parcelles 
            WHERE parcelles_disponibilite = 'réservée'";
    $resultat = $mabd->query($req);
    $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
    $nombre_de_parcelles_reserve = $ligne['nombre_de_parcelles_reserve'];
    echo "<p>Nombre de parcelles réservé : $nombre_de_parcelles_reserve</p>";

    include('autres_pages/footer.php');
?>
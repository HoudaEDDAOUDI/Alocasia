<?php
        include('autres_pages/header.php');

echo '
        <main class="contact">
        <h1>Statistiques</h1>
';
echo '<div id="statistique">';
        echo '<a href="jardins/jardins_gestion.php">';
        echo '<div class="admin_stat">';
                echo '<h2>Jardins</h2>';
                include('pdo.php');
                $mabd->query('SET NAMES utf8;');
                $req = "SELECT COUNT(*) AS nombre_de_jardins
                        FROM jardins";
                $resultat = $mabd->query($req);
                $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
                $nombre_de_jardins = $ligne['nombre_de_jardins'];
                echo "<p>Jardins totals : $nombre_de_jardins</p>";
        echo '</div>';
        echo '</a>';
        
        echo '<a href="utilisateurs/utilisateurs_gestion.php">';
        echo '<div class="admin_stat">';
                echo '<h2>Utilisateurs</h2>';
                $mabd->query('SET NAMES utf8;');
                $req = "SELECT COUNT(*) AS nombre_de_utilisateurs
                        FROM utilisateurs";
                $resultat = $mabd->query($req);
                $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
                $nombre_de_utilisateurs = $ligne['nombre_de_utilisateurs'];
                echo "<p>Utilisateurs totals : $nombre_de_utilisateurs</p>";
        echo '</div>';
        echo '</a>';

        echo '<a href="parcelles/parcelles_gestion.php">';
        echo '<div class="admin_stat">';
                echo '<h2>Parcelles</h2>
                <div>
                ';
                $mabd->query('SET NAMES utf8;');
                $req = "SELECT COUNT(*) AS nombre_de_parcelles_total
                        FROM parcelles";
                $resultat = $mabd->query($req);
                $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
                $nombre_de_parcelles_total = $ligne['nombre_de_parcelles_total'];
                echo "<p>Parcelles totals : $nombre_de_parcelles_total</p>";

                $mabd->query('SET NAMES utf8;');
                $req = "SELECT COUNT(*) AS nombre_de_parcelles_disponibles 
                        FROM parcelles 
                        WHERE parcelles_disponibilite = 'disponible'";
                $resultat = $mabd->query($req);
                $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
                $nombre_de_parcelles_disponibles = $ligne['nombre_de_parcelles_disponibles'];
                echo "<p>Parcelles disponible : $nombre_de_parcelles_disponibles</p>";

                $mabd->query('SET NAMES utf8;');
                $req = "SELECT COUNT(*) AS nombre_de_parcelles_reserve
                        FROM parcelles 
                        WHERE parcelles_disponibilite = 'réservée'";
                $resultat = $mabd->query($req);
                $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
                $nombre_de_parcelles_reserve = $ligne['nombre_de_parcelles_reserve'];
                echo "<p>Parcelles réservé : $nombre_de_parcelles_reserve</p>";
        echo '</div>
        </div>';
        echo '</a>';

        echo '<a href="traitements/traitements_gestion.php">';
        echo '<div class="admin_stat">';
                echo '<h2>Demandes</h2>';
                $mabd->query('SET NAMES utf8;');

                $req = "SELECT COUNT(*) AS nombre_de_jardins FROM parcelles 
                        JOIN jardins ON parcelles._jardins_id = jardins.jardins_id
                        JOIN utilisateurs ON parcelles._utilisateurs_id = utilisateurs.utilisateurs_id
                        WHERE parcelles.parcelles_disponibilite = 'en attente'";
                $resultat = $mabd->query($req);
                $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
                $nombre_de_jardins = $ligne['nombre_de_jardins'];
                echo "<p>Demande en attente : $nombre_de_jardins</p>";
        echo '</div>';
        echo '</a>';

echo '</div>
</main>';
        include('autres_pages/footer.php');
?>
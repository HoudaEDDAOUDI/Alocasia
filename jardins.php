<?php
    include('autres_pages/header.php');
?>
<header>

</header>
    <main>
        <section class="how-it-works-section">
            <h2>Comment ça marche ?</h2>
            <p>Tout d'abord laissez nous vous introduire le principe !</p>
            <p>Cet espace est dédié aux cojardinages et vous allez voir, c'est super simple et pratique ! Tout d'abord vous avez la possibilité de vous même réserver un partiel proposé par notre site afin d'y construire votre jardin convivial. Vous pouvez aussi inscrire votre propre jardin personnel et y inviter d'autres personnes.</p>
            <p>Vous pouvez aussi tout simplement, rejoindre une parcelle existante afin de contribuer à son développement !</p>
        </section>
        <div class="container">
            <ul id="carte_ul">
                <?php
                // Connexion à la base de données
                $servername = "localhost";
                $username = "agence-admin2";
                $password = "SaE?202";
                $dbname = "sae202";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Vérifier la connexion
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Récupérer les données des jardins depuis la base de données
                $sql = "SELECT * FROM jardins";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Afficher les données des jardins dans une liste
                    // <li data-lat="' . $row['jardins_lat'] . '" data-lon="' . $row['jardins_lon'] . '"><img width="50%" src="images/gps.png" alt="icon d\'emplacement"></li>
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <div class="jardins2">
                            <div class="jardins">
                                <div>
                                    <li class="h3" data-lat="' . $row['jardins_lat'] . '" data-lon="' . $row['jardins_lon'] . '"> <img src="images/uploads/'.$row['jardins_photo']. '" alt="'.$row['jardins_photo'].'" ></li>
                                </div>
                                <div class="infos">
                                    <li class="nom" data-lat="' . $row['jardins_lat'] . '" data-lon="' . $row['jardins_lon'] . '">' . $row['jardins_nom'] . '</li>
                                    <li class="prop" data-lat="' . $row['jardins_lat'] . '" data-lon="' . $row['jardins_lon'] . '">' . $row['jardins_proprietaire'] . '</li>
                                    <li class="adresse" data-lat="' . $row['jardins_lat'] . '" data-lon="' . $row['jardins_lon'] . '">' . $row['jardins_adresse'] . '</li>
                                    <li class="surface" data-lat="' . $row['jardins_lat'] . '" data-lon="' . $row['jardins_lon'] . '">' . $row['jardins_surface'] . '</li>
                                <button><a href="';
                        if(isset($_SESSION['utilisateurs_nom'])){
                            echo '/jardins_reservation.php';
                        }else{
                            echo '/utilisateurs/connexion.php';
                        }
                        echo '?num=' . $row['jardins_id'] . '">Réserver</a></button>';
                        echo '</div>';
                        echo '</div>';
                        echo '<div><br>';
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </ul>
            <div id="map" style="height: 500px;"></div>
        </div>
        <section class="add-your-garden-section">
            <button class="add-garden-button">Ajouter votre propre parcelle ici !</button>
            <button class="view-gardens-button">Vos parcelles</button>
        </section>
    </main>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([46.858859, 2.3470599], 6);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Créer un groupe de marqueurs
        var markers = L.featureGroup();

        // Ajouter des marqueurs pour chaque jardin
        var jardins = document.querySelectorAll('#carte_ul li');
        jardins.forEach(function(jardin) {
            var lat = parseFloat(jardin.getAttribute('data-lat'));
            var lon = parseFloat(jardin.getAttribute('data-lon'));
            var marker = L.marker([lat, lon]).addTo(map).bindPopup(jardin.innerText);
            
            // Ajouter le marqueur au groupe de marqueurs
            markers.addLayer(marker);
            
            // Ajouter un gestionnaire d'événements de clic pour centrer la carte sur le jardin
            jardin.addEventListener('click', function() {
                map.setView([lat, lon], 15);
            });
        });

        // Ajuster la vue de la carte pour englober tous les marqueurs
        map.fitBounds(markers.getBounds());
    </script>
<?php
    include('autres_pages/footer.php');
?>

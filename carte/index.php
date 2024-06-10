<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Map marker</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>
    <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
<div class="container">
    <ul>
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
            while ($row = $result->fetch_assoc()) {
                echo "<li data-lat='" . $row['jardins_lat'] . "' data-lon='" . $row['jardins_lon'] . "'>" . $row['jardins_nom'] . "</li>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </ul>
    
    <div id="map" style="height: 400px;"></div>
    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([46.858859, 2.3470599], 6);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Créer un groupe de marqueurs
        var markers = L.featureGroup();

        // Ajouter des marqueurs pour chaque jardin
        var jardins = document.querySelectorAll('li');
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
</body>
</html>

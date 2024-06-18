<?php
include('autres_pages/header.php');
?>
<main class="contact">
    <h1>Réservation</h1>
    <section class="contact-form-section">
        
        <?php
        $num = $_GET['num'];

        include('admin/pdo.php');
        $mabd->query('SET NAMES utf8;');
        $req = 'SELECT * FROM  jardins WHERE jardins_id=' . $num;
        $resultat = $mabd->query($req);
        foreach($resultat as $value){
            echo '<div class="racap-reserv">';
            echo '<h2>' . $value['jardins_nom'] . '.</h2>';
            echo '<p>Chez ' . $value['jardins_proprietaire'] . '.</p>';
                echo '<div class="racap-reserv2">';
                    echo '<img src="../images/uploads/' . $value['jardins_photo'] . '" alt="' . $value['jardins_photo'] . '">';
                    echo '<div class="racap-reserv3">';
                        echo '<p><strong>Adresse:</strong>' . $value['jardins_adresse'] . '</p>';
                        echo '<p><strong>Surface:</strong>' . $value['jardins_surface'] . ' m²</p>';
                    echo '</div>';
                echo '</div>';
                echo '<h2>Les parcelles du jardins</h2>';
            echo '</div>';
        }
        ?>
        
        <div id="parcelles_choix">
        <?php
          include('admin/pdo.php');
          $mabd->query('SET NAMES utf8;');
          $req = 'SELECT * FROM parcelles WHERE _jardins_id=' . $num;
          $resultat = $mabd->query($req);

          // Vérifier s'il y a des résultats
          if ($resultat) {
              // Boucler à travers les résultats
              foreach($resultat as $value){
                  $couleur = ($value['parcelles_disponibilite'] == 'disponible') ? 'green' : 'grey';
                  $cursor = ($couleur == 'green') ? 'pointer' : '';
                  $disabled = ($value['parcelles_disponibilite'] == 'disponible') ? '' : 'disabled';
                  echo '<button class="parcelles_dispo" data-parcelle-id="' . $value['parcelles_id'] . '" style="background:' . $couleur . '; cursor:' . $cursor . ';"  ' . $disabled . '>' . $value['parcelles_nom'] . '</button>';
              }
          } else {
              echo 'Aucune parcelle trouvée.';
          }
          ?>
        </div>
        <div id="parcelle_details"></div>
        <form id="reservation-form" action="jardins_valid.php" method="POST">
            <input type="hidden" id="num" name="num" value="">
            <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['utilisateurs_id']; ?>">
            <button type="submit" id="send-reservation" class="button-envoyer">Envoyer</button>
        </form>
    </section>
</main>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      var selectedParcelles = [];
      var buttons = document.querySelectorAll('#parcelles_choix button');
      var sendButton = document.getElementById('send-reservation');
      var numInput = document.getElementById('num');

      buttons.forEach(function(button) {
        button.addEventListener('click', function() {
          if (!this.hasAttribute('disabled')) {
            var parcelleId = this.getAttribute('data-parcelle-id');
            toggleParcelleDetails(parcelleId, this);
          }
        });
      });

      sendButton.addEventListener('click', function() {
        numInput.value = selectedParcelles.join(',');
      });

      function toggleParcelleDetails(parcelleId, button) {
        var detailsDiv = document.getElementById('parcelle_details');
        if (button.style.background === 'green') {
          button.style.background = 'grey';
          selectedParcelles.push(parcelleId);
          fetchParcelleDetails(parcelleId, function(details) {
            var containerElement = document.createElement('div');
            containerElement.className = 'parcelle-details-container';
            containerElement.id = 'details-' + parcelleId;
            containerElement.innerHTML = details;
            detailsDiv.appendChild(containerElement);
          });
        } else {
          button.style.background = 'green';
          selectedParcelles = selectedParcelles.filter(id => id !== parcelleId);
          var containerElement = document.getElementById('details-' + parcelleId);
          if (containerElement) {
            detailsDiv.removeChild(containerElement);
          }
        }
      }

      function fetchParcelleDetails(parcelleId, callback) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'get_parcelle_details.php?parcelle_id=' + parcelleId, true);
        xhr.onload = function() {
          if (xhr.status === 200) {
            callback(xhr.responseText);
          } else {
            console.error('Une erreur s’est produite lors de la récupération des détails de la parcelle.');
          }
        };
        xhr.send();
      }
    });
</script>
<?php
include('autres_pages/footer.php');
?>

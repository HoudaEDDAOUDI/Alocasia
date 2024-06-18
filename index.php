<?php
    include('autres_pages/header.php');
?>

<main>
        <!-- <section class="welcome-section"> -->
        <div class="A1">
            <!-- <div class="A1-1a"> -->
                <div class="A1-1">
                    <h1>MAIN DANS LA MAIN, FAISONS FLEURIR NOS JARDINS !</h1>
                    <div class="buttons">
                        <a class="button-find-garden" href="jardins.php">Trouver un jardin !</a>
                        <a class="button-find-garden" href="contact.php">Contactez-nous !</a>
                    </div>
                </div>
                <!-- <div class="A1-2">
                    <img src="images/ACEUIL.png" alt="">
                </div> -->
            <!-- </div> -->
            <div class="A1-1b">
            <a href="#A2" id="scrollToA2"><span>&#8675;</span></a>
            </div>
        </div>
       
        <div id="A2">
            <h2>Bienvenue chez Alocasia !</h2><br>
            <p>Vous rêvez de cultiver votre propre jardin mais vous manquez d'espace ? Alocasia est là pour vous ! Notre plateforme de co-jardinage vous permet de réserver facilement des parcelles de jardin à Troyes. Rejoignez notre communauté d'amoureux de la nature et profitez des bienfaits du jardinage en partageant des espaces verts avec d'autres passionnés.<br><br>

            Que vous soyez un jardinier débutant ou expérimenté, Alocasia vous offre la possibilité de cultiver vos légumes, fruits et fleurs dans un cadre convivial et collaboratif. Nos parcelles sont bien entretenues et prêtes à accueillir vos projets de jardinage.<br><br>

            Réservez dès maintenant votre parcelle et transformez vos rêves de jardinage en réalité. Ensemble, cultivons un avenir plus vert et plus durable !<br><br></p>
        </div>

        <div class="bento-box">

            <div class="box box1">
                <img src="images/bento_box.jpg" alt="">
            </div>

            <div class="box box2">
                <h2>Le cojardinage</h2><br>
                <div id="box2">
                    <div class="box22">
                        <!-- <img src="" alt=""> -->
                        <p class="pourcentage">75%<br></p>
                        <p>déclarent une amélioration de leur bien-être mental.</p>
                    </div>
                    <div class="box22">
                        <!-- <img src="" alt=""> -->
                        <p class="pourcentage">30%<br></p>
                        <p>de réduction des déchets alimentaires.</p>
                    </div>
                    <div class="box22">
                        <!-- <img src="" alt=""> -->
                        <p class="pourcentage">65%<br></p>
                        <p>utilisent des pratiques de jardinage biologique.</p>
                    </div>
                </div>
            </div>

            <div class="box box3">
                <div class="box33">
                    <div class="box3etape">1.</div>
                    <div class="box3p">
                        <p>Créer votre compte</p>
                    </div>
                </div>
                <div class="box33">
                    <div class="box3etape">2.</div>
                    <div class="box3p">
                        <p>Chercher un jardin</p>
                    </div>
                </div>
                <div class="box33">
                    <div class="box3etape">3.</div>
                    <div class="box3p pp">
                        <p>Vous êtes prêts à jardiner</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="A5">
            <a class="button-find-garden" href="/utilisateurs/inscription.php">Commencer</a>
        </div>
        <div class="A6">
            
        </div>
        <?php
            include('admin/pdo.php');
            $mabd->query('SET NAMES utf8;');
            
            $req = "SELECT j.*, COUNT(p.parcelles_id) AS nombre_parcelles_disponibles
                    FROM jardins j
                    LEFT JOIN parcelles p ON j.jardins_id = p._jardins_id AND p.parcelles_disponibilite = 'disponible'
                    GROUP BY j.jardins_id
                    LIMIT 10";
            
            $resultat = $mabd->query($req)->fetchAll(PDO::FETCH_ASSOC);

?>
<div id="youtube">
<iframe width="560" height="315" src="/images/video_youtube.mp4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<h2 class="h2">Les jardins</h2>
<div id="scroll">
    <!-- <button class="prev" aria-label="suivant"></button> -->
    <div class="slider">
        <?php
        $articles_par_diapositive = 0; // Initialiser le compteur pour les articles par diapositive
        $jardins_affiches = [];

        foreach ($resultat as $index => $value) {

            if (in_array($value['jardins_id'], $jardins_affiches)) {
                continue; // Passer à l'itération suivante si le jardin est déjà affiché
            }
            // Ouvrir une nouvelle diapositive chaque deux jardins
            if ($articles_par_diapositive % 3 == 0) {
                echo '<div class="slide">';
            }

            // Afficher chaque jardin
            echo '<div class="sacs">';
            echo '<div class="proprio">';
                echo '<h3>'.$value['jardins_nom'].'</h3>';
                echo '<p>Chez '.$value['jardins_proprietaire'].'</p>';
            echo '</div>';
                echo '<div class="img_scroll">';
                    echo '<img src="images/uploads/'.$value['jardins_photo'].'" alt="'.$value['jardins_photo'].'" width="200" height="100">';
                echo '</div>';
                echo '<div>';
                    echo '<p>'.$value['jardins_adresse'].'</p>';
                    echo '<p>'.$value['jardins_surface'].' m²</p>';
                echo '</div>';
                echo '<div class="parcelles_scroll">';
                    echo '<p>Nombre de parcelles disponibles: '.$value['nombre_parcelles_disponibles'].'</p>';
                    
                    echo '<a class="plus" href="';
                    if(isset($_SESSION['utilisateurs_nom'])){
                        echo '/jardins_reservation.php';
                    }else{
                        echo '/utilisateurs/connexion.php';
                    }
                    echo '?num=' . $value['jardins_id'] . '">+</a>';
                    
                echo '</div>';
                
            echo '</div>';

            // Fermer la diapositive après avoir affiché deux jardins
            if ($articles_par_diapositive % 3 == 1 || $index == count($resultat) - 1) {
                echo '</div>'; 
            }

            $articles_par_diapositive++; 
        }
        ?>
    </div>
    <!-- <button class="next" aria-label="précédente"></button> -->
</div>
    
    </main>
    <script>
        document.getElementById('scrollToA2').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('A2').scrollIntoView({ behavior: 'smooth' });
        });


                // / Sélectionnez votre élément slider
            const slider = document.querySelector('.slider');
            const slideWidth = slider.offsetWidth; // Largeur d'une slide
            let intervalId; // Variable pour stocker l'ID de l'intervalle

            // Fonction pour faire défiler vers la droite (next)
            function slideNext() {
                slider.scrollBy({
                    left: slideWidth,
                    behavior: 'smooth'
                });

                // Si on atteint la fin du slider, réinitialiser au début en douceur
                if (slider.scrollLeft + slider.clientWidth >= slider.scrollWidth) {
                    setTimeout(() => {
                        slider.scrollTo({
                            left: 0,
                            behavior: 'smooth'
                        });
                    }, 500); // Délai avant de revenir au début (ajustable selon la vitesse du scroll)
                }
            }

            // Fonction pour démarrer le défilement automatique
            function startAutoSlide() {
                intervalId = setInterval(slideNext, 4000); // Défile toutes les 5 secondes (5000 ms)
            }

            // Démarrer le défilement automatique au chargement de la page
            startAutoSlide();

            window.addEventListener('scroll', function() {
                const header = document.getElementById('main-header');
                const scrollPosition = window.scrollY;

                // Ajouter la classe "scrolled" lorsque le défilement est au-dessus de 50 pixels
                if (scrollPosition > 50) {
                    header.classList.add('scrolled');
                } else {
                    header.classList.remove('scrolled');
                }
            });
            
    </script>
<?php
    include('autres_pages/footer.php');
?>
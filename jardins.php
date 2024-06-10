<?php
    include('autres_pages/header.php');
?>
    <main>
        <section class="how-it-works-section">
            <h2>Comment ça marche ?</h2>
            <p>Tout d'abord laissez nous vous introduire le principe !</p>
            <p>Cet espace est dédié aux cojardinages et vous allez voir, c'est super simple et pratique ! Tout d'abord vous avez la possibilité de vous même réserver un partiel proposé par notre site afin d'y construire votre jardin convivial. Vous pouvez aussi inscrire votre propre jardin personnel et y inviter d'autres personnes.</p>
            <p>Vous pouvez aussi tout simplement, rejoindre une parcelle existante afin de contribuer à son développement !</p>
        </section>
        <section class="available-gardens-section">
            <h2>JARDIN MIS A DISPOSITION</h2>
            <div class="gardens-carousel">
                <div class="garden">
                    <img src="garden1.png" alt="Jardin Parc des Moulins">
                    <h3>Jardin Parc des Moulins</h3>
                    <p>25 rue Jean Moulin, 10 000 Troyes</p>
                    <p>Plantations: Lorem ipsum</p>
                    <p class="availability">5 parcelles disponibles</p>
                </div>
                <div class="garden">
                    <img src="garden2.png" alt="Jardin Lucas">
                    <h3>Jardin Lucas</h3>
                    <p>25 rue Jean Moulin, 10 000 Troyes</p>
                    <p>Plantations: Lorem ipsum</p>
                    <p class="availability">Parcelle particulière</p>
                </div>

            </div>
        </section>
        <section class="reserve-section">
            <h2>Reservez votre propre parcelle !</h2>
            <div class="reserve-container">
                <div class="reserve-item">
                    <h3>Jardin sélectionné:</h3>
                    <p>Chez : Jardin Lorem</p>
                    <p>Au : 25 rue Jean Moulin, 10 000 Troyes</p>
                    <label for="date1">Date:</label>
                    <input type="date" id="date1" name="date1">
                    <div class="counter">
                        <button class="decrement">-</button>
                        <input type="number" value="1" min="1" id="quantity1">
                        <button class="increment">+</button>
                    </div>
                    <p>Vous avez réservé X m².</p>
                    <button class="reserve-button">➔</button>
                </div>
                <div class="reserve-item">
                    <h3>Jardin sélectionné:</h3>
                    <p>Chez : Jardin Lorem</p>
                    <p>Au : 25 rue Jean Moulin, 10 000 Troyes</p>
                    <label for="date2">Date:</label>
                    <input type="date" id="date2" name="date2">
                    <div class="counter">
                        <button class="decrement">-</button>
                        <input type="number" value="1" min="1" id="quantity2">
                        <button class="increment">+</button>
                    </div>
                    <p>Vous avez réservé X m².</p>
                    <button class="reserve-button">➔</button>
                </div>

            </div>
        </section>
        <section class="add-your-garden-section">
            <button class="add-garden-button">Ajouter votre propre parcelle ici !</button>
            <button class="view-gardens-button">Vos parcelles</button>
        </section>
    </main>
<?php
    include('autres_pages/footer.php');
?>

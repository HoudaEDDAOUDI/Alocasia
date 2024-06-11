<?php
    include('autres_pages/header.php');
?>
    <main>
    <section class="contact-form-section">
        <form action="#" method="post" class="contact-form">
        <label for="email">Email * :</label>
            <input type="email" id="email" name="email" required>

        <div class="contact-nom-prenom">
            <div class="contact-nom">
                <label for="nom">Nom * :</label>
                    <input type="text" id="nom" name="nom" required>
            </div>
            <div class="contact-prenom">
                <label for="prenom">Prenom * :</label>
                    <input type="text" id="prenom" name="prenom" required>
            </div>
        </div>
            <label for="demande">Ma demande concerne * :</label>
                <select id="demande" name="demande" required>
                    <option value="">--</option>
                    <option value="option1">Option 1</option>
                    <option value="option2">Option 2</option>
                </select>
                <label for="message">Message *</label>
                <textarea id="message" name="message" required></textarea>
                <button type="submit" class="submit-button">Envoyer</button>
            </form>
        </section>
        <section class="contact-info-section2" >
            <h2 id="h2section2">Contactez nous aussi :</h2>
            <div class="contact-info">
                <div class="contact-item">
                    <p>07.38.93.39.30</p>
                </div>
                <div class="contact-item">
                    <a href="#" class="social-button">Facebook</a>
                </div>
                <div class="contact-item">
                    <a href="#" class="social-button">Instagram</a>
                </div>
            </div>
        </section>
    </main>
<?php
    include('autres_pages/footer.php');
?>  

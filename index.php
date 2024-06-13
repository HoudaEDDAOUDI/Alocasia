<?php
    include('autres_pages/header.php');
?>
<style>

/*-------------------------------------------------ACCEUIL-------------------------------------------------------*/

/*----------------------A1----------------------*/

.A1{
    display: flex;
    max-width: 100%;
}

.A1-2{
    max-width:50%;
    overflow: hidden;
}

.A1-2 img{
    max-width:100%;

}

.A1-1{
    display: flex;
    flex-direction: column;
    justify-content: space-around;
}

.A1-1 h1{
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 3%;
}

.A1-1-1{
    display: flex;
    flex-direction: row;
    justify-content: space-around;
}

/*----------------------A2----------------------*/


.A2{
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 6%;
    background-color: rgb(126, 211, 239);
    color: #FFF;
    padding: 5%;
}

.A2 p{
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 1%;
}

/*----------------------A3----------------------*/


.A3{
    display: flex;
    max-width: 100%;
    gap: 2%;
    padding: 3%;
}

.A3-1{
    max-width:50%;
    overflow: hidden;
}

.A3-1 img{
    max-width:100%;

}

.A3-1-1 {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center ;
}

.A3-1-1 img {
    height: 100%;
    width: 100%;
    border-radius: 12%;
}

.A3-2{
    max-width:50%;
    overflow: hidden;
    max-height: 100%;
    display: flex;
    flex-direction: column;
}

.A3-2 h1{
    max-width:100%;
    padding: 8px;
    border-radius: 20px;
    color: #FFF;
    background-color: blueviolet;
    margin-bottom: 2%;
    display: flex;
    justify-content: center;
}

.A3-2 img{
    max-width:100%;
}

.A3-2-2 {
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center ;
}

.A3-2-2 img {
    height: 100%;
    width: 100%;
    border-radius: 8%;
}

/*----------------------A4----------------------*/

.A4{
    display: flex;
    align-items: center;
    padding: 3%;
    width: 100%;
    justify-content: center;
    max-width: 100%;
    max-height: 10vh;
    
}

.A4-1{
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center ;
    max-height: 10vh;



}


.A4-1 img{
    max-height: 10vh;
    width: 100%;
    border-radius: 12%;
    box-sizing: border-box;

}

/*----------------------A5----------------------*/

.A5{
    display: flex;
    justify-content: center;
    align-items: center;
}

/*----------------------A6----------------------*/

.A6{
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 6%;
    background-color: #dfb520;
    color: #FFF;
    padding: 5%;
}

.A6-2{
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    margin-top: 6%;
    color: #FFF;
    padding: 5%;
    gap: 5vh;
    width: 100%;
    max-height: 7vh;
}


.A6-2-1{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
}

.A6-2-1 p{
    margin-top: 5%;
    font-size: 1.5rem;
}

/*----------------------Autre----------------------*/

.button{
    padding: 2% 10%;
    border-radius: 24px;
    color: #FFF;
    background-color: #dfb520;
    text-decoration: none;
    font-size: medium;
    font-weight: bolder;
    margin: 3%;

}

.button3{
    padding: 2% 10%;
    border-radius: 24px;
    color: #FFF;
    background-color: rgb(126, 211, 239);
    text-decoration: none;
    font-size: medium;
    font-weight: bolder;
    margin: 3%;

}

.button2{
    padding: 30px;
    font-size: large;
    border-radius: 20px;
    color: #FFF;
    width: 25%;
    padding: 20px 40px;
    box-sizing: border-box;
    background-color: rgb(126, 211, 239);
    border: none;
    cursor: pointer;
    text-align: center;
    margin: 0 auto;
    margin-top: 20px;
}

.circle1 {
    justify-content: center;
    align-items: center;
    display: flex;
    width: 12vw;
    height: 12vw;
    background-color: #017869;
    border-radius: 50%;
}

.circle2 {
    justify-content: center;
    align-items: center;
    display: flex;
    width: 12vw;
    height: 12vw;
    background-color: red;
    border-radius: 50%;
}

.circle3 {
    justify-content: center;
    align-items: center;
    display: flex;
    width: 12vw;
    height: 12vw;
    background-color: purple;
    border-radius: 50%;
}

    </style>
<main>
        <!-- <section class="welcome-section"> -->
        <div class="A1">
            <div class="A1-1">
                <h1>MAIN DANS LA MAIN, FAISONS FLEURIR NOS JARDINS !</h1>
                <div class="buttons">
                    <button class="button-find-garden"><a href="jardins.php">Trouver un jardin !</a></button>
                    <button class="button-contact"><a href="contact.php">Contactez-nous !</a></button>
                </div>
                </div>
            <div class="A1-2">
                <img src="images/ACEUIL.png" alt="">
            </div>
        </div>
       
        <div class="A2">
            <h1>Bienvenue chez Alocasia !</h1>
            <p>"Bienvenue dans notre oasis verte ! Nous sommes ravis de vous accueillir sur notre site dédié à l'écojardinage. Ici, vous pourrez partager votre expérience et votre envie de jardiner à plusieurs."</p>
        </div>

        <div class="A3">
        <div class="A3-1">
            <div class="A3-1-1">
            <img src="images/haha.png" alt="">
            </div>
        </div>
        <div class="A3-2">
            <H1>Le cojardinage</H1>
            <div class="A3-2-2">
                <img src="images/haha.png" alt="">
            </div>
        </div>
    </div>

    <div class="A4">
        <div class="A4-1">
        <img src="images/haha.png" alt="">
        </div>
    </div>
    <div class="A5">
            <button class="button2">Je souhaite commencer</button>
    </div>
    <div class="A6">
        <div class="A6-1">
            <h1>Les étapes pour commencer</h1>
        </div>
        <div class="A6-2">
            <div class="A6-2-1">
                <h1 class="circle1">1</h1>
                <p>Créer votre compte.</p>
            </div>
            <div class="A6-2-1">
                <h1 class="circle2">2</h1>
                <p>Chercher un jardin près de chez vous.</p>
            </div>
            <div class="A6-2-1">
              <h1 class="circle3">3</h1>
              <p>Vous êtes prêt à jardiner!</p>
            </div>
        </div>
    </div>
        <!-- <section class="co-gardening-section">
            <h2>Le cojardinage</h2>
            <div class="co-gardening-content">
                <img src="gardening-image.png" alt="Gardening">
                <div class="co-gardening-offers">
                    <div class="offer">+20% de Lorem ipsum</div>
                    <div class="offer">+80% de Lorem ipsum</div>
                    <div class="offer">+80% de Lorem ipsum</div>
                </div>
            </div>
            <button class="button-start"><a href="utilisateurs/inscription.php">Je souhaite commencé</a></button>
        </section> -->

        <!-- <section class="steps-section">
            <h2>Les étapes pour commencer</h2>
            <div class="steps">
                <div class="step">1<br>Créer votre compte.</div>
                <div class="step">2<br>Chercher un jardin près de chez vous.</div>
                <div class="step">3<br>Vous êtes prêts à jardinez!</div>
            </div>
        </section> -->
        <section class="gardens-section">
            <h2>Les jardins</h2>
            <div class="garden">
                <h3>Jardin de Lucas</h3>
                <img src="garden-image.png" alt="Jardin de Lucas">
                <p>Lucas - Adresse - Téléphone</p>
                <button>Plus d'infos</button>
                <button>Accepter</button>
            </div>
            <div class="garden">
                <h3>Jardin de Mathilde</h3>
                <img src="garden-image.png" alt="Jardin de Mathilde">
                <p>Mathilde - Adresse - Téléphone</p>
                <button>Plus d'infos</button>
                <button>Accepter</button>
            </div>
        </section>
    </main>
<?php
    include('autres_pages/footer.php');
?>
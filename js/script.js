//-------------------------------------MENU

    var menuIcon = document.querySelector('.menu-icon');
    var nav = document.querySelector('nav');
function toggleMenu() {
    // Toggle class 'active' on menuIcon
    menuIcon.classList.toggle('active');

    // Toggle class 'active' on nav
    nav.classList.toggle('active');

    // Optionally, you can also add logic to close the menu when clicking outside of it
    // This assumes you have a container (like body) that you can attach the listener to
    document.body.addEventListener('click', function(event) {
        if (!nav.contains(event.target) && !menuIcon.contains(event.target)) {
            nav.classList.remove('active');
            menuIcon.classList.remove('active');
        }
    });
}
//----------------------------header
document.addEventListener('DOMContentLoaded', function() {
    // Votre code JavaScript ici
    window.addEventListener('scroll', function() {
        // Code pour le scroll
        const header = document.getElementById('header');
        const scrollPosition = window.scrollY;
            if (scrollPosition > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
    });
});
    



console.log("Le fichier script.js est chargé !");

document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const menu = document.querySelector('.menu');

    if (menuToggle && menu) {
        menuToggle.addEventListener('click', function() {
            menu.classList.toggle('show');
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const rows = document.querySelectorAll('table tbody tr');

    rows.forEach(row => {
        row.addEventListener('mouseover', function() {
            this.style.backgroundColor = '#e0e0e0';
        });

        row.addEventListener('mouseout', function() {
            this.style.backgroundColor = '';
        });
    });
});
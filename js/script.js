console.log("Le fichier script.js est chargé !");

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
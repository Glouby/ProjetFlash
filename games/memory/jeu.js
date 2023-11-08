var menuDeroulan = document.getElementById("choixTheme");
var afficherTheme = document.getElementById("afficherTheme");
var choix_theme = ''; // Déclarer la variable en dehors du gestionnaire d'événement

menuDeroulan.addEventListener("change", function() {
    choix_theme = menuDeroulan.value; // Mettre à jour la variable
    afficherTheme.textContent = "Vous avez choisi le thème : " + choix_theme;
});

var menuDeroulant = document.getElementById("choixNiv");
var afficherNiv = document.getElementById("afficherNiv");
var choix_niv = 8; // Déclarer la variable en dehors du gestionnaire d'événement

menuDeroulant.addEventListener("change", function() {
    choix_niv = menuDeroulant.value; // Mettre à jour la variable
    afficherNiv.textContent = "Vous avez choisi le niveau : " + choix_niv;
});




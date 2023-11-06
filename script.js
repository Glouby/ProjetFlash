const image1 = document.getElementById('image1');
const image2 = document.getElementById('image2');

image1.addEventListener('click', () => {
    image1.style.transform = 'rotate(90deg)'; // Rotation de 90 degrés (ou l'angle de votre choix)
    image2.style.display = 'block'; // Affichage de l'image 2
});

<?php
require '../../utils/common.php';
require '../../utils/database.php';
$NamePage = "game";
?>

<?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_SESSION['userId']) && !empty($_POST['message'])){
                postMessage();        
            } else {
                getMessage(); 
        }
    }
?>
<?php
function getMessage() {
    global $pdo;
    $userId = $_SESSION['userId'];
    $resultat = $pdo->query("SELECT message, pseudo, date_heure_m, id_exp 
        FROM Utilisateur 
        JOIN Message ON Utilisateur.id_u = Message.id_exp
        WHERE date_heure_m >= NOW() - INTERVAL 1 DAY
        ORDER BY date_heure_m ASC");

    $messages = $resultat->fetchAll();

    foreach ($messages as $message) {
        $messageContent = $message->message;
        $messageSender = $message->id_exp;
        $pseudo = $message->pseudo;
        $date = $message->date_heure_m;
        $class = ($messageSender == $userId) ? 'message-envoye' : 'message-recu';
        $alignClass = ($messageSender == $userId) ? 'align-right' : 'align-left';
    
        echo "<div class='div_message'> 
            <span class='message-pseudo $alignClass' data-pseudo='$pseudo' data-date='$date'>$pseudo</span>
            <p class='message $class'>$messageContent</p>
            <span class='message-date $alignClass' data-date='$date'>$date</span>
        </div>";
    }    
}




function postMessage(){
    global $pdo;
    $userId = $_SESSION['userId'];
    $message = $_POST['message'];
    $pdoStatement = $pdo->prepare("INSERT INTO Message (id_j, id_exp, message, date_heure_m) VALUES ( :idJ, :userId, :message, NOW())");
    $pdoStatement -> execute([ 
        "idJ" => 1,
        ":userId" => $userId, 
        ":message"=> $message
    ]);
}
?>


<!DOCTYPE html>
<html lang="fr">
<?php
        require SITE_ROOT . 'partials/head.php';
    ?>
<body class="jeu">
<?php
        require SITE_ROOT . 'partials/header.php';
    ?>
    <div class="title">
        <h1>JEU</h1>
    </div> 



    <?php if(isset($_SESSION['userId'])) :?>
        <label for="choixTheme" style="color: white; padding-left: 38.194vw;">Sélectionnez un Thème :</label>
            <select id="choixTheme" style="background-color: #737287; padding: 0.556vw; border-radius: 0.694vw;">
                <option value="">Thèmes</option>
                <option value="Espace">ESPACE</option>
                <option value="Jeux videos">JEUX VIDEOS</option>
                <option value="Mangas">MANGA</option>
            </select>
            
            <p id="afficherTheme" style="color: orange; padding-left: 38.194vw; font-size: 1.389vw;"></p>


    <label for="choixNiv" style="color: white; padding-left: 38.194vw;">Sélectionnez le niveau :</label>
        <select id="choixNiv"  style="background-color: #737287; padding: 0.556vw; border-radius:0.694vw;">
            <option value="">Niveaux</option>
            <option value="Facile">FACILE</option>
            <option value="Moyen">MOYEN</option>
            <option value="Difficile">DIFFICILE</option>
        </select>
        
        <p id="afficherNiv" style="color: orange; padding-left: 38.194vw; font-size: 1.389vw;"></p>
        

        <button id="lancerPartie" onclick="startTimerAndPartie()" style="margin-left: 45.139vw; background-color: orange; border-radius: 2vw; padding: 1.389vw; margin-top: 3.472vw;font-size: 1.2vw;" disabled>Lancer la Partie</button>

    <script src="jeu.js"></script>


    <div id="timer" style="color: white; text-align: center; border: 0.1vw solid orange; margin-top: 5vw; margin-left: 15%; width: 10vw; height: 4vw; font-size:1.2vw;">
            <div id="timer-text" style=" color: white; text-align: center; font-size: 1.2vw; margin: 1.2vw;">00:00:00</div>
    </div>

        <script>


            let timerValue = 0;
            let timerInterval;
            let startTime = 0;
            let isRunning = false;

            function formatTime(ms) {
                const minutes = Math.floor(ms / 60000);
                const seconds = Math.floor((ms % 60000) / 1000);
                const milliseconds = (ms % 1000).toString().padStart(3, '0');
                return `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}:${milliseconds}`;
            }


            function updateChronometer() {
                const currentTime = Date.now() - startTime;
                timerValue = currentTime; // Mettez à jour la variable timerValue
                document.getElementById('timer').textContent = formatTime(currentTime);
            }

            function startTimerAndPartie() {
                if (choixTheme.value !== '' && choixNiv.value !== '') {
                    // Vérifiez si la partie est déjà en cours
                    if (!partieEnCours) {
                        startTimer(); // Démarrez le timer si les sélections sont valides
                        startPartie(); // Démarrez la partie
                        if (choix_niv == 'Facile') {
                            choix_niv = 4;
                        } else if (choix_niv == 'Moyen') {
                            choix_niv = 6;
                        } else if (choix_niv == 'Difficile') {
                            choix_niv = 8;
                        }

                        if (choix_theme == 'Espace') {
                            choix_theme = '_e';
                        } else if (choix_theme == 'Jeux videos') {
                            choix_theme = '_j';
                        } else if (choix_theme == 'Mangas') {
                            choix_theme = '_m';
                        }

                        tableCreate();
                    }
                }
            }



            function startTimer() {
                if (!isRunning) {
                    startTime = Date.now() - startTime;
                    timerInterval = setInterval(updateChronometer, 10);
                    isRunning = true;
                }
            }



            const choixTheme = document.getElementById('choixTheme');
            const choixNiv = document.getElementById('choixNiv');
            const lancerPartieBtn = document.getElementById('lancerPartie');

            choixTheme.addEventListener('change', checkSelections);
            choixNiv.addEventListener('change', checkSelections);

            function checkSelections() {
                if (choixTheme.value !== '' && choixNiv.value !== '') {
                    lancerPartieBtn.removeAttribute('disabled');
                } else {
                    lancerPartieBtn.setAttribute('disabled', true);
                }
            }

        </script>
        
        
        <div id="victory-popup" class="victory-popup">
            <p>Félicitations ! Vous avez terminé le jeu en <span id="victory-time">00:00:00</span>.</p>
            <div style="display: flex;">
                <button id="rejouer-button-popup" style="margin-right: 1vw;">Rejouer</button>
                <button id="score-button-popup">Voir le score</button>
            </div>
        </div>





        <div id="tableau" class="tableau">
        </div>

        
        <section class="chat">
        <div class="chat-box">
            <div class="chat-header">
            <img src= "<?= PROJECT_FOLDER ?>assets/image/chat.jpg" class='Photo'>
                Chat General
            </div>
        
            <div id="msg" class="chat-messages">
                <?php getMessage(); ?>
            </div>

        
            <div class="chat-input">
                <input type="text" name="message" class="message" id="messagerie" placeholder="Votre message..."></input>
                <input type="button" onclick="functionAjax()" value="Envoyer" id="Envoyer">
            </div>
        </div>  
    </section>
    <a href="#" class="le_btn">^</a>

    <script>
        function functionAjax() {
            // Récupérez le texte du message
            var text = document.getElementById("messagerie").value.trim();

            // Vérifiez si le message n'est pas vide
            if (text.length < 3) {
                // Affichez un message d'erreur ou effectuez une action appropriée
                alert("Veuillez entrer un message de plus de 2 caractère avant d'envoyer.");

                // Arrêtez l'exécution de la fonction
                return;
            }

            // Continuez avec la requête AJAX car le message n'est pas vide
            let request = $.ajax({
                type: "POST",
                url: "index.php",
                data: { 'message': text }
            });

            request.done(function (output) {
                let dateActuelle = new Date();
                let jour = dateActuelle.getDate();
                let mois = dateActuelle.getMonth() + 1;
                let annee = dateActuelle.getFullYear();
                let heures = dateActuelle.getHours();
                let minutes = dateActuelle.getMinutes().toString().padStart(2, '0');
                let secondes = dateActuelle.getSeconds();
                let dateHeureFormattee = `${annee}-${mois}-${jour} ${heures}:${minutes}:${secondes}`;
                var pseudo = document.querySelector('.message-pseudo.align-right').dataset.pseudo;

                // Code à jouer en cas d'exécution sans erreur du script PHP
                document.getElementById('messagerie').value = ''; // Efface le champ de saisie

                // Ajoute le message à la boîte de chat
                const chatBox = document.getElementById('msg');
                const newMessage = document.createElement('div');
                newMessage.className = 'div_message';

                // Ajouter le pseudo
                const pseudoSpan = document.createElement('span');
                pseudoSpan.className = 'message-pseudo align-right';
                pseudoSpan.textContent = pseudo;
                pseudoSpan.setAttribute('data-pseudo', pseudo);
                newMessage.appendChild(pseudoSpan);

                // Ajouter le message
                const messageP = document.createElement('p');
                messageP.className = 'message message-envoye';
                messageP.textContent = text;
                newMessage.appendChild(messageP);

                // Ajouter la date
                const dateSpan = document.createElement('span');
                dateSpan.className = 'message-date align-right';
                dateSpan.textContent = dateHeureFormattee;
                dateSpan.setAttribute('data-date', dateHeureFormattee);
                newMessage.appendChild(dateSpan);

                chatBox.appendChild(newMessage);
                chatBox.scrollTop = chatBox.scrollHeight;
            });
        }


        var input = document.getElementById("messagerie");
        input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            var text = document.getElementById("messagerie").value.trim();

            // Vérifiez si le message n'est pas vide
            if (text === "") {
                // Affichez un message d'erreur ou effectuez une action appropriée
                alert("Veuillez entrer un message avant d'envoyer.");

                // Arrêtez l'exécution de la fonction
                return;
            }
            var text = document.getElementById("messagerie").value;
            let request =
            $.ajax({
                    type: "POST",
                    url: "index.php", 
                    data: {'message': text}
                });
                request.done(function (output) {
        let dateActuelle = new Date();
        let jour = dateActuelle.getDate();
        let mois = dateActuelle.getMonth() + 1;
        let annee = dateActuelle.getFullYear();
        let heures = dateActuelle.getHours();
        let minutes = dateActuelle.getMinutes().toString().padStart(2, '0');
        let secondes = dateActuelle.getSeconds();
        let dateHeureFormattee = `${annee}-${mois}-${jour} ${heures}:${minutes}:${secondes}`;
        var pseudo = document.querySelector('.message-pseudo.align-right').dataset.pseudo;

        // Code à jouer en cas d'exécution sans erreur du script PHP
        document.getElementById('messagerie').value = ''; // Efface le champ de saisie

        // Ajoute le message à la boîte de chat
        const chatBox = document.getElementById('msg');
        const newMessage = document.createElement('div');
        newMessage.className = 'div_message';

        // Ajouter le pseudo
        const pseudoSpan = document.createElement('span');
        pseudoSpan.className = 'message-pseudo align-right';
        pseudoSpan.textContent = pseudo;
        pseudoSpan.setAttribute('data-pseudo', pseudo);
        newMessage.appendChild(pseudoSpan);

        // Ajouter le message
        const messageP = document.createElement('p');
        messageP.className = 'message message-envoye';
        messageP.textContent = text;
        newMessage.appendChild(messageP);

        // Ajouter la date
        const dateSpan = document.createElement('span');
        dateSpan.className = 'message-date align-right';
        dateSpan.textContent = dateHeureFormattee;
        dateSpan.setAttribute('data-date', dateHeureFormattee);
        newMessage.appendChild(dateSpan);

        chatBox.appendChild(newMessage);
        chatBox.scrollTop = chatBox.scrollHeight;
    });

            document.getElementById("myBtn").click();
            msg.innerHTML="msg";
        }});

    </script>
        <?php else :?>
        <p style="text-align:center; font-size: 2vw;"> Vous n'êtes pas connecté(e)</p>
    <?php endif ?>

    <?php
        require SITE_ROOT . 'partials/footer.php';
    ?>
    <a href="#" class="le_btn">^</a>
</body>


<script>


    let pairsFlipped = 0; // Variable pour suivre le nombre de paires de cartes retournées


    function creer_tab(choix_niv){
        const tailleTableau = choix_niv ** 2; // La taille du tableau
        const elements = (choix_niv ** 2) / 2; // Le nombre d'éléments différents que vous voulez répéter

        const tableau = [];

        // Créez le tableau en ajoutant les éléments répétés
        for (let i = 1; i <= elements; i++) {
            for (let j = 0; j < tailleTableau / elements; j++) {
                tableau.push(i);
            }
        }
        return tableau
    }



    const rejouerButtonPopup = document.getElementById('rejouer-button-popup');
    rejouerButtonPopup.addEventListener('click', function() {
        location.reload(); // Rafraîchit la page
    });



    
    function ajaxEnvoie(){
        var victoryTime = formatTime(timerValue);
        var score = victoryTime;
        if (choix_niv == 4) {
            var difficulte = 'Facile';
        } else if (choix_niv == 6) {
            var difficulte = 'Moyen';
        } else if (choix_niv == 8) {
            var difficulte = 'Difficile';
        }
        let request =
        $.ajax({
            type: "POST",             //Méthode à employer POST ou GET 
            url: "server.php",  //Cible du script coté serveur à appeler 
            data: {'score': score, 'difficulte': difficulte}
        });
        request.done(function (output) {
            //Code à jouer en cas d'éxécution sans erreur du script du PHP
            document.getElementById('victory-time').textContent = victoryTime;

            // Affichez la victoire popup
            const victoryPopup = document.getElementById('victory-popup');
            victoryPopup.classList.add('show');

            // Affichez le bouton "Rejouer" dans la popup
            rejouerButtonPopup.style.display = 'block';
        });
    }


    function shuffle(array) {
        let currentIndex = array.length,  randomIndex;

        // While there remain elements to shuffle.
        while (currentIndex > 0) {

            // Pick a remaining element.
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex--;

            // And swap it with the current element.
            [array[currentIndex], array[randomIndex]] = [
            array[randomIndex], array[currentIndex]];
        }

        return array;
}


var cardsFlipped = []; // Tableau pour stocker les cartes retournées

var isLocked = false; // Variable de verrouillage


let partieEnCours = false;

function startPartie() {
    // Vérifiez d'abord si la partie est déjà en cours
    if (partieEnCours) {
        return;
    }
    
    // La partie n'est pas encore en cours, commencez-la maintenant
    partieEnCours = true;
    
    // Réinitialisez le compteur de paires retournées
    pairsFlipped = 0;

    // Désactivez le bouton
    lancerPartieBtn.disabled = true;
}



function tourne_image(index) {
    if (!partieEnCours || isLocked) {
        return; // Si la partie n'est pas en cours ou si le jeu est verrouillé, ne rien faire
    }

    var carte = event.target; // Capture l'élément sur lequel vous avez cliqué

    if (carte.classList.contains('flipped')) {
        return; // Si la carte est déjà retournée, ne rien faire
    }

    carte.style.transform = 'rotateY(360deg)'; // Effectue la rotation de la carte

    // Attendez un court instant pour changer l'image
    setTimeout(function() {
        carte.src = '<?= PROJECT_FOLDER ?>assets/image/image' + index + choix_theme + '.jpeg';
        carte.classList.add('flipped'); // Ajoute une classe "flipped" pour indiquer que la carte est retournée
        cardsFlipped.push(carte);

        if (cardsFlipped.length === 2) {
            isLocked = true; // Verrouiller le jeu pendant la comparaison
            if (cardsFlipped[0].src !== cardsFlipped[1].src) {
                // Si les cartes sont différentes, attendez un court instant, puis retournez-les
                setTimeout(function() {
                    cardsFlipped[0].style.transform = 'rotateY(0deg)'; // Retournez la première carte
                    cardsFlipped[1].style.transform = 'rotateY(0deg)'; // Retournez la deuxième carte
                    cardsFlipped[0].classList.remove('flipped'); // Retire la classe "flipped"
                    cardsFlipped[1].classList.remove('flipped');
                    cardsFlipped[0].src = '<?= PROJECT_FOLDER ?>assets/image/carte.jpeg';
                    cardsFlipped[1].src = '<?= PROJECT_FOLDER ?>assets/image/carte.jpeg';
                    cardsFlipped = [];
                    isLocked = false; // Déverrouiller le jeu
                }, 1000); // Attendre 1 seconde (1000 millisecondes) pour l'animation
            } else {
                // Si les cartes sont identiques, laissez-les affichées
                cardsFlipped = [];
                isLocked = false; // Déverrouiller le jeu
                pairsFlipped += 1;
                
                // Vérifiez si toutes les paires de cartes ont été retournées
                if (pairsFlipped === (choix_niv ** 2 / 2)) {
                    clearInterval(timerInterval);
                    ajaxEnvoie()
                }
            }
        }
    }, 100); // Attendre 0.1 seconde (100 millisecondes) avant la rotation
}










function tableCreate() {
    var tab = creer_tab(choix_niv);
    shuffle(tab);
    shuffle(tab);
    const tableau = document.getElementById('tableau');
    const tbl = document.createElement('table');
    tbl.style.width = '6.944vw';

    for (let i = 0; i < choix_niv; i++) {
        const tr = tbl.insertRow();
        for (let j = 0; j < choix_niv; j++) {
            let index = i * choix_niv + j; // Calcule l'index de la carte dans le tableau
            let value = tab[index];  
            const td = tr.insertCell();
            let img = document.createElement('img');
            img.src = '<?= PROJECT_FOLDER ?>assets/image/carte.jpeg';
            img.className = 'carte ' + index.toString;
            img.onclick = function() {
            tourne_image(value);
            };

            td.appendChild(img);
        }
    }

    tableau.appendChild(tbl);
}


const scoreButtonPopup = document.getElementById('score-button-popup');

scoreButtonPopup.addEventListener('click', function() {
    window.location.href = "<?= PROJECT_FOLDER ?>games/memory/scores.php";
});
</script>
</html>
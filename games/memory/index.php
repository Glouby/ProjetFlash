<?php
require '../../utils/common.php';
require '../../utils/database.php';
$NamePage = "game";

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

    <div class="timer">
        <div class="timer-texte">TIMER : 2:17</div>
    </div>
    
    <div id="tableau" class="tableau les_cartes">
        <div class="carte-face carte-front">

        </div>
        <div class="carte-back carte-face">

        </div>
    </div>

    
    <div class="chat">
        <div class="chat-box">
            <div class="chat-header">
            <img src= "<?= PROJECT_FOLDER ?>assets/image/chat.jpg" class='Photo'>
                Chat General
            </div>
    
            <div class="chat-messages">
    
                <div class="Moi">Moi</div> 
                <div class="Mes-messages">
                    <div class="mot"> Hello </div>
                </div>
                <div class="Hour-moi"> Aujoud'hui à 15h22 </div>
    
                <div class="message">
    
                <div class="user">User 1</div>
                    <div class="image">
                    <img src= "<?= PROJECT_FOLDER ?>assets/image/chat.jpg" class='Pdp'>
                    <div class="text"> hvjdhzlkdhazpodbjrz <br>
                            dklazjazlkdezalkdjazlkdjzakdjazldkjazkldjazl
                    </div>
                </div>  
                <div class="Hour-User">Aujoud'hui à 15h30</div>
                    <div class="Moi2">Moi</div> 
                    <div class="Mes-messages2">
                        <div class="mot2"> wowy c'est incroyable </div>
                    </div>

                    </div>
                <div class="Hour-moi2"> Aujoud'hui à 15h22 </div>
                <div class="chat-input">
                    <input type="text" id="message-input" placeholder="Votre message...">
                    <button id="send-button">Envoyer</button>
                </div>
            </div>
        </div>  
    </div>


    <?php
        require SITE_ROOT . 'partials/footer.php';
    ?>
    <a href="#" class="le_btn">^</a>
</body>


<script>
    let tab = [1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8];
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

// Used like so
shuffle(tab);

function tableCreate() {
  const tableau = document.getElementById('tableau'),
        tbl = document.createElement('table');
  tbl.style.width = '100px';

  for (let i = 0; i < 4; i++) {
    const tr = tbl.insertRow();
    for (let j = 0; j < 4; j++) {
        const td = tr.insertCell();
        let img = document.createElement('img');
            img.src = '<?= PROJECT_FOLDER ?>assets/image/carte.jpeg'
            img.className = 'carte';
        
        let image = document.createElement('img');
            image.src = '<?= PROJECT_FOLDER ?>assets/image/image1_e.jpeg'
            image.className = 'carte';
        
        td.appendChild(img);
        td.appendChild(image);
    }
  }
  tableau.appendChild(tbl);
}

tableCreate();

</script>
</html>
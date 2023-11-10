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



    <div id="timer" style="color: white; text-align: center; border: 0.1vw solid orange; margin-top: 5vw; margin-left: 15%; width: 10vw; height: 4vw;">
        <div id="timer-text" style=" color: white; text-align: center; font-size: 1.2vw; margin: 1.2vw;">00:00:00</div>
    <button id="startButton" onclick="startTimer()">Démarrer</button>
    </div>
    <script>
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
            document.getElementById('timer').textContent = formatTime(currentTime);
        }

        function startTimer() {
            if (!isRunning) {
                startTime = Date.now() - startTime;
                timerInterval = setInterval(updateChronometer, 10);
                isRunning = true;
            }
        }

       
    </script>

 </div>

    <table class="tableau, hidden">
        <tr>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
        </tr>
        <tr>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
        </tr>
        <tr>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
        </tr>
        <tr>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
        </tr>
    </table>

    <table class="tableau, hidden">
        <tr>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
        </tr>
        <tr>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
        </tr>
        <tr>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
        </tr>
        <tr>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
        </tr>
        <tr>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
        </tr>
        <tr>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
        </tr>
        <tr>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
        </tr>
        <tr>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
            <td><img src= "<?= PROJECT_FOLDER ?>assets/image/carte.jpeg" class='carte'></td>
        </tr>
    </table>

    
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
</html>
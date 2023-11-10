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
function getMessage(){
    global $pdo;
    $resultat = $pdo -> query("SELECT message, pseudo, date_heure_m 
    FROM Utilisateur 
    JOIN Message ON Utilisateur.id_u = Message.id_exp
    WHERE date_heure_m <= NOW() + INTERVAL 1 DAY");
    $messages = $resultat -> fetchAll();
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

    <div class="timer">
        <div class="timer-texte">TIMER : 2:17</div>
    </div>
    <table class="tableau">
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
    <!-- chat du jeu -->
    <section class="chat">
        <div class="chat-box">
            <div class="chat-header">
            <img src= "<?= PROJECT_FOLDER ?>assets/image/chat.jpg" class='Photo'>
                Chat General
            </div>
        
            <div id="msg" class="mot">
                
            </div>
        
            <div class="chat-input">
                <input type="text" name="message" class="message" id="messagerie" placeholder="Votre message..."></input>
                <input type="button" onclick="functionAjax()" value="Envoyer" id="Envoyer">
            </div>
        </div>  
    </section>
    <?php
        require SITE_ROOT.'partials/footer.php';
    ?>
    <a href="#" class="le_btn">^</a>

    <script>
        function functionAjax(){
            var text = document.getElementById("messagerie").value;
            let request =
            $.ajax({
                type: "POST",
                url: "index.php", 
                data: {'message': text}
            });
            request.done(function (output) {
                    document.getElementById('messagerie').value = ''; 
                    const chatBox = document.getElementById('msg');
                    chatBox.innerHTML += '<p>' + text + '</p>';
            });
        }
        // envoie avec enter
        var input = document.getElementById("messagerie");
        input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            var text = document.getElementById("messagerie").value;
            let request =
            $.ajax({
                type: "POST",
                url: "index.php", 
                data: {'message': text}
            });
            request.done(function (output) {
                    // Code à jouer en cas d'éxécution sans erreur du script du PHP
                    document.getElementById('messagerie').value = ''; // Efface le champ de saisie
                    // Ajoute le message à la boîte de chat
                    const chatBox = document.getElementById('msg');
                    chatBox.innerHTML += '<p>' + text + '</p>';
            });
            event.preventDefault();
            document.getElementById("myBtn").click();
        }});
    </script>
</body>
</html>
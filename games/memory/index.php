<?php
require '../../utils/common.php';
require '../../utils/database.php';
$NamePage = "game";
?>
<?php

function getMessage(){
    global $pdo;
    $resultat = $pdo -> query("SELECT message, pseudo, date_heure_m 
    FROM Utilisateur 
    JOIN Message ON Utilisateur.id_u = Message.id_exp
    WHERE date_heure_m <= NOW() + INTERVAL 1 DAY");
    $messages = $resultat -> fetchAll();
    echo json_encode($messages);
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
    echo json_encode($message);
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
    <script>

    </script>
    <section class="chat">
        <div class="chat-box">
            <div class="chat-header">
            <img src= "<?= PROJECT_FOLDER ?>assets/image/chat.jpg" class='Photo'>
                Chat General
            </div>
            <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(isset($_SESSION['userId']) && !empty($_POST['message'])){
                    postMessage();
                }else{ 
                    getMessage();
                }
            }
            ?>
            <form method="POST" action="" class="chat-messages">
                <div class="chat-input">
                    <input type="text" name="message" class="message" id="messagerie" placeholder="Votre message..."></input>
                    <input type="button" onclick="functionAjax()" value="Envoyer" id="Envoyer">
                </div>
            </form>
        </div>  
    </section>
    <?php
        require SITE_ROOT . 'partials/footer.php';
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
        document.getElementById("messagerie").animate([
        
        ]);
        });
    }
    </script>
</body>
</html>
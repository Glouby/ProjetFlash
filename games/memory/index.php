<?php
require '../../utils/common.php';
require '../../utils/database.php';
$NamePage = "game";
?>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Envoyer'])){
    if(isset($_SESSION['userId']) && !empty($_POST['message'])){
        postMessage();
        } else {
        getMessage();
    }
}

function getMessage(){
    global $pdo;
    $resultat = $pdo -> query("SELECT message, pseudo, date_heure_m 
    FROM Utilisateur 
    JOIN Message ON Utilisateur.id_u = Message.id_exp
    WHERE date_heure_m <= NOW() + INTERVAL 1 DAY") ;
    $messages = $resultat -> fetchAll();
    echo json_encode($messages);
}

function postMessage(){
    global $pdo;
    $userId = $_SESSION['userId'];
    $messages = $_POST['message'];
    $query = $pdo->query(" SELECT id_exp, message FROM Utilisateur JOIN Message ON Message.id_exp = Utilisateur.id_u WHERE id_exp = :userId;
        INSERT INTO Message SET id_exp = :userId, message = :messageries, date_heure_m = NOW()");
    $query -> execute([ 
        "userId" => $userId, 
        "messageries" => $messages
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
            <form method="POST" action="" class="chat-messages">
                <div class="chat-input">
                    <input name="message" class="message" id="messagerie" placeholder="Votre message..."></input>
                    <input type="submit" name="Envoyer" id="button">
                </div>
            </form>
        </div>  
    </section>


    <?php
        require SITE_ROOT . 'partials/footer.php';
    ?>
    <a href="#" class="le_btn">^</a>
</body>
</html>
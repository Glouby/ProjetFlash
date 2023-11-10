<?php
require 'utils/common.php';
require 'utils/database.php';

$NamePage = 'registe';

if (!empty($_GET["email"])){
    $email = $_GET["email"];
}else{
    $email = null;
}
if (!empty($_GET["pseudo"])){
    $pseudo = $_GET["pseudo"];
}else{
    $pseudo = null;
}
if (!empty($_GET["password"])){
    $password = $_GET["password"];
}else{
    $password = null;
}
if (!empty($_GET["conf_password"])){
    $conf_password = $_GET["conf_password"];
}else{
    $conf_password = null;
}

$validation = 0;

$pattern_pseudo = '/^.{4,}$/'; 
$pattern_password = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/'; 

$inscription = $pdo->prepare('INSERT INTO Utilisateur(email, mdp, pseudo) VALUES (:email, :mdp, :pseudo)');
$tt_pseudo = $pdo->prepare('SELECT pseudo FROM Utilisateur');
$tt_pseudo->execute();
$les_pseudo = $tt_pseudo->fetchAll();
?>


<!DOCTYPE html>
<html lang="fr">
<?php
        require 'partials/head.php';
    ?>
<body class="register">
<?php
        require 'partials/header.php';
    ?>

    <div class="title">
        <h1>INSCRIPTION</h1>
    </div>


    <div class="cases">
        <form  method="get">
            <div>
                <label for="mail"></label>
                <input class="box" type="text" name="email" id="email" placeholder="Email">
                <?php 
                if (filter_var($email, FILTER_VALIDATE_EMAIL) && $validation != 4): 
                    $validation += 1;?>
                    <p style="color: green;"> L'adresse email est considérée comme valide. </p>
                <?php elseif($email != null): 
                    $validation = 0;?>
                    <p style="color: red;"> L'adresse email est considérée comme invalide. </p>
                <?php endif; ?>
                
            </div>
            <div>
                <label for="pseudo"></label>
                <input class="box" type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
                <?php 
                if (preg_match($pattern_pseudo, $pseudo??"") && $validation != 4):
                    $validation += 1;?>
                    <p style="color: green;"> Le pseudo est considérée comme valide. </p>
                <?php elseif($pseudo != null): 
                    $validation = 0;?>
                    <p style="color: red;"> Le pseudo doit comporter au moins 4 caractère. </p>
                <?php endif; ?>
            </div>
            <div>
                <label for="password"></label>
                <input class="box" type="password" name="password" id="password" oninput="validatePassword()" placeholder="Mot de passe">
                <div class="strength-bar-container" style="margin-top: 10px; height: 10px; background-color: #100e2e; border-radius: 4px; overflow: hidden; margin-right:450px">
                    <div id="strength-bar" style="height: 100%; width: 0; transition: width 0.3s ease; margin-top:0;"></div>
                </div>
                <p id="message"></p>
                <?php 
                if (preg_match($pattern_password, $password??"") && $validation != 4):
                    $validation += 1;?>
                    <p style="color: green;"> Le mot de passe est considérée comme valide. </p>
                <?php elseif($password != null): 
                    $validation = 0;?>
                    <p style="color: red;"> Le mot de passe doit : <br>
                    - Faire au minimum 8 caractères <br>
                    - Comprendre au moins un chiffre <br>
                    - Comprendre au moins une majuscule <br>
                    - Comprendre au moins un caractère spécial <br> </p>
                <?php endif; ?>
             </div>
             <script src="register.js"></script>
            <div>
                <label for="password"></label>
                <input class="box" type="password" name="conf_password" id="password" placeholder="Confirmez le mot de passe">
                <?php 
                if ($conf_password == $password && $conf_password != null && $validation != 4):
                    $validation += 1;?>
                    <p style="color: green;"> La confirmation du mot de passe est considérée comme valide. </p>
                <?php elseif($conf_password != null): 
                    $validation = 0;?>
                    <p style="color: red;"> La confirmation du mot de passe doit être identique. </p>
                <?php endif; ?>
            </div>
            <div>
                <input class="bouton"type="submit" value="Inscription">
            </div>
        </form>
    </div>

<?php
foreach($les_pseudo as $Pseudos){
    if($pseudo == $Pseudos->pseudo){
        $validation = 10;
    }
}
if ($validation == 4): 
    $inscription->execute([
        ':email' => $email,
        ':mdp' => hash('sha256', $password),
        ':pseudo' => $pseudo,
    ]);?>
    <p style="text-align:center; font-size: 2vw;">Votre inscription a été validée.</p>
<?php elseif($validation == 10): ?>
    <p style="text-align:center; font-size: 2vw; color:red;">Votre pseudo est déjà utilisé.</p>
    

<?php endif; ?>
    <?php
        require 'partials/footer.php';
    ?>
    <a href="#" class="le_btn">^</a>

</body>
</html>
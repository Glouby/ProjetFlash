<?php
require 'utils/common.php';
require 'utils/database.php';
$NamePage = 'account';

if(isset($_SESSION['userId'])){
    $pdoStatement = $pdo->prepare("SELECT pseudo FROM Utilisateur WHERE id_u = :id"); 
    $pdoStatement->execute([
        ':id' => $_SESSION['userId']
    ]);
    $name = $pdoStatement->fetch();

    $pdoStatement = $pdo->prepare("SELECT email FROM Utilisateur WHERE id_u = :id"); 
    $pdoStatement->execute([
        ':id' => $_SESSION['userId']
    ]);
    $email_u = $pdoStatement->fetch();

    $pdoStatement = $pdo->prepare("SELECT mdp FROM Utilisateur WHERE id_u = :id"); 
    $pdoStatement->execute([
        ':id' => $_SESSION['userId']
    ]);
    $password_u = $pdoStatement->fetch();

    $mettre_nouv_email = $pdo->prepare("UPDATE Utilisateur SET email = :email  WHERE id_u = :id"); 

    $mettre_nouv_mdp = $pdo->prepare("UPDATE Utilisateur SET mdp = :mdp  WHERE id_u = :id"); 
}


if (!empty($_GET["email"])){
    $email = $_GET["email"];
}else{
    $email = null;
}
if (!empty($_GET["new_email"])){
    $new_email = $_GET["new_email"];
}else{
    $new_email = null;
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
if (!empty($_GET["change_password"])){
    $change_password = $_GET["change_password"];
}else{
    $change_password = null;
}
if (!empty($_GET["new_password"])){
    $new_password = $_GET["new_password"];
}else{
    $new_password = null;
}

$validation=0;
$validation_mdp = 0;

$pattern_password = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{8,}$/'; 
?>



<!DOCTYPE html>
<html lang="fr">

<?php
        require 'partials/head.php';
    ?>

<body class="account">
<?php
        require 'partials/header.php';
        ?>
    <div class="title">
        <h1>MON ESPACE</h1>
    </div>
    
    <?php if(isset($_SESSION['userId'])) :?>

        <div class="position4">
            <img class="image" src="assets/image/profil.jpeg">
            <div class="text">
                <p><?php echo $name -> pseudo ?></p>
            </div>


        </div>


        <div class="aligner">
            <div class="motdepass">
                <h2>Changement email</h2>
            </div>
            <div class="adressmail">
                <h2>Changement de mot de passe</h2>
            </div>
        </div>

        <div class="position3">
            <div class="position2">
                <form method="get">

                    <div class="espace">
                        <label for="mail"></label>
                        <input class="box" type="text" name="email" id="email" placeholder="Ancien email">

                        <?php if ($email == $email_u->email && $validation != 3): 
                            $validation += 1;?>
                            <p style="color: green;"> L'adresse email est considérée comme valide. </p>
                        <?php elseif($email != null): 
                            $validation = 0;?>
                            <p style="color: red;"> Ce n est pas votre adresse mail. </p>
                        <?php endif; ?>
                    </div>
                    <div class="espace">
                        <label for="new_email"></label>
                        <input class="box" type="text" name="new_email" id="pseudo" placeholder="Nouveau email">

                        <?php
                        if (filter_var($new_email, FILTER_VALIDATE_EMAIL) && $validation != 3): 
                            $validation += 1;?>
                            <p style="color: green;"> L'adresse email est considérée comme valide. </p>
                        <?php elseif($new_email != null): 
                            $validation = 0;?>
                            <p style="color: red;"> L'adresse email est considérée comme invalide. </p>
                        <?php endif ?>
                    </div>
                    <div class="espace">
                        <label for="password"></label>
                        <input class="box" type="password" name="password" id="pseudo" placeholder="Mot de passe">

                        <?php if (hash('sha256', $password??'') == $password_u -> mdp && $validation != 4): 
                            $validation += 1;?>
                            <p style="color: green;"> Le mot de passe est valide. </p>
                        <?php elseif($password != null): 
                            $validation = 0;?>
                            <p style="color: red;"> Ce n est pas votre mot de passe. </p>
                        <?php endif; ?>
                    </div>


                    <div>
                        <input class="bouton" type="submit" value="Inscription">
                    </div>
                </form>
            </div>
            <div class="position">
                <form  method="get">
                    <div class="espace">
                        <label for="password"></label>
                        <input class="box" type="password" name="change_password" id="pseudo" placeholder="Ancien mot de passe">

                        <?php if (hash('sha256', $change_password??'') == $password_u -> mdp && $validation_mdp != 4): 
                            $validation_mdp += 1;?>
                            <p style="color: green;"> Le mot de passe est valide. </p>
                        <?php elseif($change_password != null): 
                            $validation_mdp = 0;?>
                            <p style="color: red;"> Ce n est pas votre mot de passe. </p>
                        <?php endif; ?>
                    </div>
                    <div class="espace">
                        <label for="new_password"></label>
                        <input class="box" type="password" name="new_password" id="password" placeholder="Nouveau Mot de passe">

                        <?php if (preg_match($pattern_password, $new_password??'') && $validation_mdp != 4):
                            $validation_mdp += 1;?>
                            <p style="color: green;"> Le mot de passe est considérée comme valide. </p>
                        <?php elseif($new_password != null): 
                            $validation_mdp = 0;?>
                            <p style="color: red;"> Le mot de passe doit : <br>
                            - Faire au minimum 8 caractères <br>
                            - Comprendre au moins un chiffre <br>
                            - Comprendre au moins une majuscule <br>
                            - Comprendre au moins un caractère spécial <br> </p>
                        <?php endif; ?>
                    </div>
                    <div class="espace">
                        <label for="conf_password"></label>
                        <input class="box" type="password" name="conf_password" id="password" placeholder="Confimer le nouveau mot de passe">
                        
                        <?php 
                        if ($conf_password == $new_password && $conf_password != null && $validation_mdp != 3):
                            $validation_mdp += 1;?>
                            <p style="color: green;"> La confirmation du mot de passe est considérée comme valide. </p>
                        <?php elseif($conf_password != null): 
                            $validation_mdp = 0;?>
                            <p style="color: red;"> La confirmation du nouveau mot de passe doit être identique. </p>
                        <?php endif; ?>
                        <div>
                            <input class="bouton" type="submit" value="Confirmer">
                        </div>
                    </div>
                </form>
            </div>
        </div>


    <?php else :?>
        <p style="text-align:center; font-size: 2vw;"> Vous n'êtes pas connecté(e)</p>
    <?php endif ?>

    
    <?php if ($validation == 3): 
    $mettre_nouv_email->execute([
        ':email' => $new_email,
        ':id' => $_SESSION['userId']
    ]);?>
    <p style="text-align:center; font-size: 2vw;">Votre email a été changé.</p>
    <?php endif ?>

    <?php if ($validation_mdp == 3): 
    $mettre_nouv_mdp->execute([
        ':mdp' => hash('sha256', $password),
        ':id' => $_SESSION['userId']
    ]);?>
    <p style="text-align:center; font-size: 2vw;">Votre mot de passe a été changé.</p>
    <?php endif ?>

    <?php
        require 'partials/footer.php';
    ?>
    <a href="#" class="le_btn">^</a>

</body>

</html>
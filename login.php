<?php
require 'utils/common.php';
require 'utils/database.php';
$NamePage = 'login';

if (!empty($_GET["email"])){
    $email = $_GET["email"];
        }else{
            $email = null;
        }
        if (!empty($_GET["password"])){
            $password = $_GET["password"];
        }else{
            $password = null;
        }


$pdoStatement = $pdo->prepare("SELECT id_u FROM Utilisateur WHERE mdp = :mdp AND email = :email ");
$pdoStatement->execute([
    ':mdp'=> hash('sha256', $password??''),
    ':email'=>$email
]);
$user = $pdoStatement->fetch();

if($user != null){
    $_SESSION['userId'] = $user->id_u;
}
?>


<!DOCTYPE html>
<html lang="fr">
<?php
        require 'partials/head.php';
    ?>
<body class="login">
<!-- le haut de la page -->
<?php
        require 'partials/header.php';
        ?>

    <!-- le titre + l'image -->
    <div class="title">
        <h1>CONNEXION</h1>
    </div>   

  <!-- les informations pour la connexion-->
    <form method="get"> 
        <div class="Space">
            <div class="input">
                <input class="id-connexion" type="text" name="email" id="Email" placeholder="Email">
            </div>
            
            <!-- mdp -->

            <div class="input">
                <input class="id-connexion" type="password" name="password" id="mdp" placeholder="Mot de passe">
            </div>

            <div class="input-bouton">
                <label for="bouton"></label>
                <input class="bouton" type="submit" value="Connexion">
            </div>  

            <?php if (isset($_SESSION['userId']) && $_SESSION['userId'] != null): ?>
                <p style="text-align: center; font-size:1.5vw">Vous êtes connecté(e)</p>
            <?php endif ?>
        </div>             
    </form>

    <form action="disconnect.php">
    <div class="input-bouton" style="color: red;">
        <label for="bouton"></label>
        <input class="bouton" style="background-color: red;" type="submit" value="Déconnexion">
    </div>  
    </form>

    <?php
        require 'partials/footer.php';
    ?>
    <a href="#" class="le_btn">^</a>
    
</body>
</html>
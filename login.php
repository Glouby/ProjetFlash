<?php
require 'utils/common.php';
$NamePage = 'login';

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
    <form action="info"> 
        <div class="Space">
            <div class="input">
                <input class="id-connexion" type="text" name="Email" id="Email" placeholder="Email">
            </div>
            
            <!-- mdp -->

            <div class="input">
                <input class="id-connexion" type="password" name="Mot de passe" id="mdp" placeholder="Mot de passe">
            </div>

            <div class="input-bouton">
                <label for="bouton"></label>
                <input class="bouton" type="submit" value="Connexion">
            </div>  

        </div>             
        <?php
        require 'partials/footer.php';
    ?>
    </form>
    <a href="#" class="le_btn">^</a>
    
</body>
</html>
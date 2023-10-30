<?php
require 'utils/common.php';
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
        <form action="email.php" method="post">
            <div>
                <label for="mail"></label>
                <input class="box" type="text" email="email" id="email" placeholder="Email">
            </div>

            <div>
                <label for="pseudo"></label>
                <input class="box" type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
            </div>
            <div>
                <label for="password"></label>
                <input class="box" type="password" name="password" id="password" placeholder="Mot de passe">
             </div>
            <div>
                <label for="password"></label>
                <input class="box" type="password" name="password" id="password" placeholder="Confirmez le mot de passe">
            </div>
            <div>
                <input class="bouton" type="submit" value="Inscription">
            </div>
        </form>
    </div>

    <?php
        require 'partials/footer.php';
    ?>
    <a href="#" class="le_btn">^</a>



</body>
</html>
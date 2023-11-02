<?php
require 'utils/common.php';
require 'utils/database.php';
$NamePage = 'account'
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

    <div class="position4">
        <img class="image" src="assets/image/profil.jpeg">
        <div class="text">
            <p>Mahtis braux</p>
        </div>


    </div>

    <div class="aligner">
        <div class="motdepass">
            <h2>Changement de mot de passe</h2>
        </div>
        <div class="adressmail">
            <h2>Changement email</h2>
        </div>
    </div>

    <div class="position3">
        <div class="position2">
            <form method="get">

                <div class="espace">
                    <label for="mail"></label>
                    <input class="box" type="text" email="email" id="email" placeholder="Ancien email">
                </div>
                <div class="espace">
                    <label for="pseudo"></label>
                    <input class="box" type="text" name="pseudo" id="pseudo" placeholder="Nouveau email">
                </div>
                <div class="espace">
                    <label for="pseudo"></label>
                    <input class="box" type="password" name="pseudo" id="pseudo" placeholder="Mot de passe">
                </div>

                <div>
                    <input class="bouton" type="submit" value="Confirmer">
                </div>
            </form>
        </div>
        <div class="position">
            <form  method="get">
                <div class="espace">
                    <label for="pseudo"></label>
                    <input class="box" type="password" name="pseudo" id="pseudo" placeholder="Ancien mot de passe">
                </div>
                <div class="espace">
                    <label for="password"></label>
                    <input class="box" type="password" name="password" id="password" placeholder="Nouveau Mot de passe">
                </div>
                <div class="espace">
                    <label for="password"></label>
                    <input class="box" type="password" name="password" id="password"
                        placeholder="Confimer le nouveau mot de passe">
                    <div>
                        <input class="bouton" type="submit" value="Confirmer">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
        require 'partials/footer.php';
    ?>
    <a href="#" class="le_btn">^</a>

</body>

</html>
<?php
require 'utils/common.php';
require 'utils/database.php';
$NamePage = 'account';

// if(isset($_SESSION['userId'])){
//     $userId = $_SESSION['userId'];
// }


// if (isset($_FILES['pdp'])) {
//     // TODO : controller le type de fichier soumis
//     // TODO : controller la taille du fichier soumis

//     // stocker le fichier
//     $folderPath = SITE_ROOT . "userFiles/$userId/";
// 

// <?php
//     if (!file_exists($folderPath)) {
//         mkdir($folderPath, 0777, true);
//     } else{
//         $files = scandir($folderPath);
//         foreach($files as $file){
//             if($file != '.' && $file != '..'){
//                 unlink($folderPath.$file);
//             }
//         }
//     }

//     $extension = strtolower(substr(strrchr($_FILES['pdp']['name'], '.'), 1));
//     $filePath = "$folderPath/profilePicture.$extension";
//     move_uploaded_file($_FILES['pdp']['tmp_name'], $filePath);

//     $taillemax = 5000000;
//     $extension = array('jpeg','jpg', 'gif', 'png');
// }
// ?>

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
    <!--- TODO : Afficher la photo envoyée -->

    <!-- 
    // $folderPath = SITE_ROOT . "userFiles/$userId/";
    // $files = scandir($folderPath);
    // $profilePictureName = $files[2];

    // if ( $_FILES['pdp']['size'] <= $taillemax && file_exists($folderPath.$profilePictureName)) : ?>
     <img class="image" src="userFiles/ // //$userId ?>  //$profilePictureName ?>">
     else:
        <img src="assets/image/profil.jpeg">
     -->

    <div class="position4">
        <form method="post" enctype="multipart/form-data">
            <img src="assets/image/profil.jpeg" class="image">
            <input type="file" name="pdp">
            <div class="text">
        
            </div>
            <button class="bouton">go</button>
        </form>
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
                    <input class="box" type="password" name="password" id="password" placeholder="Confimer le nouveau mot de passe">
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
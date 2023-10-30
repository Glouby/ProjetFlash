<?php
require 'utils/common.php';
require 'partials/footer.php';
?>


<!DOCTYPE html>
<html lang="fr">
<?php
        require 'partials/head.php';
    ?>
    <body class="contact">
        <?php
        require 'partials/header.php';
        ?>

        <div class="title">
            <h1>NOUS CONTACTER</h1>
        </div> 

        <main>
            <div class="infoC">
                <div class="ligne2">
                    <div class="numero">
                        <div class="item"><i class="fa-solid fa-mobile-screen-button"></i></div>
                        <p class="num">06 05 04 03 02</p>
                    </div>
                    <div class="m">
                        <div class="item"><i class="fa-regular fa-envelope"></i></div>
                        <p class="sup">support@powerofmemory.com</p>
                    </div> 
                    <div class="Paris">
                        <div class="item"><i class="fa-solid fa-location-dot"></i></div>
                        <p class="ville">Paris</p>
                    </div>
                </div>   
                <script src="https://kit.fontawesome.com/f09ae54942.js" crossorigin="anonymous"></script>
            </div>


            <div class="cases2">
                <form action="email.php" method="post">
                    <div class="ligne1">
                        <div style="margin: 0vw 1.042vw 0vw 0vw;">
                            <label for="nom"></label>
                            <input class="boxs" type="nom" email="nom" id="nom" placeholder="Nom">
                        </div>

                        <div>
                            <label for="email"></label>
                            <input class="boxs" type="text" name="email" id="email" placeholder="Email">
                        </div>
                    </div>    
                        <div>
                            <label for="sujet"></label>
                            <input class="boxs" type="text" name="sujet" id="sujet" placeholder="Sujet" style="padding: 1.042vw 29.861vw 1.042vw 1.042vw; margin: 0 0 0.347vw 0;">
                        </div>
                        <div>
                            <label for="Message"></label>
                            <textarea class="boxs" name="Message" id="Message" cols="53" rows="10" placeholder="Message"></textarea>
                        </div>
                        <div>
                            <input class="btn" type="submit" value="Envoyer">
                        </div>
                </form>
            </main>
            <?php
            require 'partials/footer.php';
            ?>
            <a href="#" class="le_btn">^</a>
    </body>
</html>
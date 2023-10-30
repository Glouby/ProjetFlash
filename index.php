<?php
require 'utils/common.php';
require 'partials/footer.php';
?>

<!DOCTYPE php>
<php lang="fr">
<?php
        require 'partials/head.php';
    ?>
    <body class="index">
        <?php
        require 'partials/header.php';
        ?>
        <h2>Bienvenue dans notre studio !</h2>
        <center>
            <p class="le_p">Venez challenger les cerveaux les plus agiles !</p>
        </center>
        <div class="play-button-container">
            <a href="memory.php" class="play-button">Jouer !</a>
        </div>

        <br/><br/><br/><br/> <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/> <br/><br/><br/><br/><br/><br/>
        <div class="image" style="padding: 0 12.153vw;">
            <img src="assets/image/carte_non_tourne.jpeg" style="height: 27.778vw; width: 34.722vw;">
            <img src="assets/image/carte_tourne.jpeg" style="height: 27.778vw; width: 17.361vw; margin: 0 1.389vw;">
            <img src="assets/image/carte_vide.jpeg" style="height: 27.778vw; width: 17.361vw;">
        </div>
        <br/><br/>
        <div class="texte_bloc">
            <div class="bloc">
                <p class="nb">01</p>
                <p><span class="gras">Lorem Ipsum</span> <br><br>Maecenas porttitor placerat metus, ac varius sem dignissim quis. Nunc consequat mattis libero</p>
            </div>
            <div class="bloc">
                <p class="nb">02</p>
                <p><span class="gras">Lorem Ipsum</span> <br><br> Duis nulla nunc, posuere ac vestibulum accumsan, suscipit vitae enim. Ut et risus vel lorem scelerisque scelerisque. Curabitur bibendum ultrices quam, non cursus quam tempus sit amet.</p>
            </div>
            <div class="bloc">
                <p class="nb">03</p>
                <p><span class="gras">Lorem Ipsum</span> <br><br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam semper nisl dui, ut vulputate mi volutpat ut. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse volutpat accumsan eros viverra lobortis.</p>
            </div>
        </div>

        <div class="community">
            <img src="assets/image/comunity.jpeg" class="img"/>
            <div class="part_2">
                <div class="ligne_1">
                    <div class="case_1">
                        <p class="le_nb"><span class="gros_nb">310</span><br>Parties Jouées</p>
                    </div>
                    <div class="case_2">
                        <p class="le_nb"><span class="gros_nb">1020</span><br>Joueurs Connectés</p>
                    </div>
                </div>
                <div class="ligne_2">
                    <div class="case_3">
                        <p class="le_nb"><span class="gros_nb">10 sec</span> <br> Temps Reccord</p>
                    </div>
                    <div class="case_4">
                        <p class="le_nb"><span class="gros_nb">21 300</span><br>Joueurs Inscrits</p>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br><br>

        <h3 style="color: white; text-align: center; font-size: 2.222vw;">Notre Équipe</h3>
        <p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        <div style="display: flex; justify-content: center; align-items: center;">
            <img src="assets/image/petit_logo.jpeg">
        </div>

        <div class="notre_equipe">
            <div class="rectangle">
                <div class="centre">
                    <img src="assets/image/The_rock.jpeg" style="height: 6.944vw; width: 6.944vw; border-radius: 50%;">
                    <p class="grand">The Rock</p>
                    <p class="petit">Game Developper</p>
                    <div class="logo-equipe">
                        <i class="fa-brands fa-facebook-f" style="color: white; margin-right: 0.694vw;"></i>
                        <i class="fa-brands fa-twitter " style="color: white; margin-right: 0.694vw;"></i>
                        <i class="fa-brands fa-pinterest" style="color: white;"></i>
                    </div>
                </div>
            </div>
            <div class="rectangle">
                <div class="centre">
                    <img src="assets/image/Arnold.jpeg" style="height: 6.944vw; width: 6.944vw; border-radius: 50%;">
                    <p class="grand">Arnold</p>
                    <p class="petit">Game Designer</p>
                    <div class="logo-equipe">
                        <i class="fa-brands fa-facebook-f" style="color: white; margin-right: 0.694vw;"></i>
                        <i class="fa-brands fa-twitter " style="color: white; margin-right: 0.694vw;"></i>
                        <i class="fa-brands fa-pinterest" style="color: white;"></i>
                    </div>
                </div>
            </div>
            <div class="rectangle">
                <div class="centre">
                    <img src="assets/image/benoit.jpeg" style="height: 6.944vw; width: 6.944vw; border-radius: 50%;">
                    <p class="grand">Benoit</p>
                    <p class="petit">Game Developper</p>
                    <div class="logo-equipe">
                        <i class="fa-brands fa-facebook-f" style="color: white; margin-right: 0.694vw;"></i>
                        <i class="fa-brands fa-twitter " style="color: white; margin-right: 0.694vw;"></i>
                        <i class="fa-brands fa-pinterest" style="color: white;"></i>
                    </div>
                </div>
            </div>
        </div>

        <?php
        require 'partials/footer.php';
    ?>
        <a href="#" class="le_btn">^</a>
    </body>
    
</php>
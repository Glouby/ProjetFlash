<?php
require '../../utils/common.php';
?>


<!DOCTYPE html>
<html lang="fr">
<?php
        require SITE_ROOT . 'partials/head.php';
    ?>
<body class="scores">
<?php
        require SITE_ROOT . 'partials/header.php';
    ?>

    <!-- le titre + l'image -->
    <div class="title">
        <h1>SCORES</h1>
    </div>   

    <form class="Les-cases" action="Les-cases">

        <div class="Tête-du-Tableau">
            <div id="Pseudo-in-case">Pseudo</div>
            <div id="Level-in-case">Niveau</div>
            <div id="Score-in-case">Score</div> 
            <div id="Date-in-case"> Date</div> 
            <div id="Hour-in-case"> Heure</div>
        </div>

    </form> 

    <form class="Tableau" action="Tableau">

            <div class="Les-cases-Pseudo">
                <div id="Pseudo-case"> Jean</div>
                <div id="Pseudo-case"> Jaque</div>
                <div id="Pseudo-case"> Jackie</div>
                <div id="Pseudo-case"> Paule</div>
                <div id="Pseudo-case"> Jean-Paule</div>
            </div>
            <div class="Les-cases-Level">
                <div id="Level-case"> 1</div>
                <div id="Level-case"> 2</div>
                <div id="Level-case"> 3</div>
                <div id="Level-case"> 4</div>
                <div id="Level-case"> 5</div>
            </div>

            <div class="Les-cases-Score" >
                <div id="Score-case"> 102003</div>
                <div id="Score-case"> 91939</div>
                <div id="Score-case"> 13132</div>
                <div id="Score-case"> 124343</div>
                <div id="Score-case"> 12312</div>
            </div>

            <div class="Les-cases-Date">
                <div id="Date-case"> 06/07/23</div>
                <div id="Date-case"> 19/04/23</div>
                <div id="Date-case"> 17/03/23</div>
                <div id="Date-case"> 23/01/23</div>
                <div id="Date-case"> 12/12/23</div>
            </div>

            <div class="Les-cases-Hour">
                <div id="Hour-case"> 14:33</div>
                <div id="Hour-case"> 05:45</div>
                <div id="Hour-case"> 11:55</div>
                <div id="Hour-case"> 10:40</div>
                <div id="Hour-case"> 09:43</div>
            </div>
    </form>
    <?php
        require SITE_ROOT . 'partials/footer.php';
    ?>
    <a href="#" class="le_btn">^</a>
</body>
</html>
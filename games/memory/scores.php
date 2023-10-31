<?php
require '../../utils/common.php';
require SITE_ROOT . 'utils/database.php';
?>

<?php
$pdo = connectToDbAndGetPdo();
$pdoStatement = $pdo->prepare('SELECT Score.*, nom_jeu, pseudo FROM Score JOIN Jeu ON Score.id_j = Jeu.id_j JOIN Utilisateur ON Score.id_u = Utilisateur.id_u ORDER BY Score.score ASC');
$pdoStatement->execute();
$Scores = $pdoStatement->fetchAll();
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

    <form method="get"  name="posttkt" style="margin: 2vw 0 1vw 60vw;">
        <input name="q" type = "search"> 
        <input type = "submit" value = "Rechercher">
    </form>

    <?php if (isset($_GET["q"])){
        $bla = $_GET["q"];
    };?>


    <table class="Les-cases" action="Les-cases">
        
        <tr>
            <td id="Pseudo-in-case">Pseudo</td>
            <td id="Level-in-case">Niveau</td>
            <td id="Score-in-case">Score</td> 
            <td id="Date-in-case">Date et Heure</td> 
            <td id="Hour-in-case">Jeu</td>
        </tr>
        <?php foreach($Scores as $score ): ?>
        <tr>
            <td id="Pseudo-case"> <?php echo $score -> pseudo ?> </td>
            <td id="Level-case"> <?php echo $score -> niv ?> </td>
            <td id="Score-case"> <?php echo $score -> score ?> </td>
            <td id="Date-case"> <?php echo $score -> date_heure_score ?> </td>
            <td id="Hour-case"> <?php echo $score -> nom_jeu ?> </td>
        </tr> 
        <?php endforeach; ?>

    </table>
    <?php
        require SITE_ROOT . 'partials/footer.php';
    ?>
    <a href="#" class="le_btn">^</a>
</body>
</html>
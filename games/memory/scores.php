<?php
require '../../utils/common.php';
require SITE_ROOT . 'utils/database.php';

$NamePage = "score";

?>


<?php if (!empty($_GET["q"])){
        $bla = $_GET["q"];
        $pdoStatement = $pdo->prepare('SELECT Score.*, nom_jeu, pseudo FROM Score JOIN Jeu 
        ON Score.id_j = Jeu.id_j JOIN Utilisateur ON Score.id_u = Utilisateur.id_u WHERE Utilisateur.pseudo LIKE(:pseudo) ORDER BY nom_jeu,
        (
            CASE niv
                WHEN "Difficile" THEN 3
                WHEN "Moyen" THEN 2
                WHEN "Facile" THEN 1
            END
        ), score ASC;');
        $pdoStatement->execute([
            ':pseudo' => '%' . $bla . '%',
        ]);
        $Scores = $pdoStatement->fetchAll();
    } else{
    $pdoStatement = $pdo->prepare('SELECT Score.*, nom_jeu, pseudo FROM Score JOIN Jeu ON Score.id_j = Jeu.id_j JOIN Utilisateur ON Score.id_u = Utilisateur.id_u ORDER BY nom_jeu,
    (
        CASE niv
            WHEN "Difficile" THEN 3
            WHEN "Moyen" THEN 2
            WHEN "Facile" THEN 1
        END
    ), score ASC;');
    
    $pdoStatement->execute();
    $Scores = $pdoStatement->fetchAll();
    }
    
    if(isset($_SESSION['userId'])){
        $pdoStatement = $pdo->prepare('SELECT pseudo FROM Utilisateur WHERE id_u = :id');
        $pdoStatement->execute([
            ':id' => $_SESSION['userId']
        ]);
        $name = $pdoStatement->fetch();
    }?>


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
            <td id="Pseudo-case"
            <?php if(isset($_SESSION['userId'])): if($score -> pseudo == $name -> pseudo) : ?> style="background-color:#a9a7ce;"
            <?php endif ?> <?php endif ?>> <?php echo $score -> pseudo ?> </td>
            <td id="Level-case"
            <?php if(isset($_SESSION['userId'])): if($score -> pseudo == $name -> pseudo) : ?> style="background-color:#a9a7ce;"
            <?php endif ?> <?php endif ?>> <?php echo $score -> niv ?> </td>
            <td id="Score-case"
            <?php if(isset($_SESSION['userId'])): if($score -> pseudo == $name -> pseudo) : ?> style="background-color:#a9a7ce;"
            <?php endif ?> <?php endif ?>> <?php echo $score -> score ?> </td>
            <td id="Date-case"
            <?php if(isset($_SESSION['userId'])): if($score -> pseudo == $name -> pseudo) : ?> style="background-color:#a9a7ce;"
            <?php endif ?> <?php endif ?>> <?php echo $score -> date_heure_score ?> </td>
            <td id="Hour-case"
            <?php if(isset($_SESSION['userId'])): if($score -> pseudo == $name -> pseudo) : ?> style="background-color:#a9a7ce;"
            <?php endif ?> <?php endif ?>> <?php echo $score -> nom_jeu ?> </td>
        </tr> 
        <?php endforeach; ?>

    </table>
    <?php
        require SITE_ROOT . 'partials/footer.php';
    ?>
    <a href="#" class="le_btn">^</a>
</body>
</html>
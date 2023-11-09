<?php
require '../../utils/common.php';
require '../../utils/database.php';

$score = $_POST['score'];
$difficulte = $_POST['difficulte'];

$pdoStatement = $pdo->prepare("SELECT score FROM Score WHERE Score.id_u = :id AND niv = :niv;"); 
$pdoStatement->execute([
    ':id' => $_SESSION['userId'],
    ':niv' => $difficulte
]);
$a_score = $pdoStatement->fetch();

if($a_score == null){
    $pdoStatement = $pdo->prepare("INSERT INTO Score(id_u, id_j, niv, score) VALUES(:id, 1, :niv, :score);"); 
    $pdoStatement->execute([
        ':id' => $_SESSION['userId'],
        ':niv' => $difficulte,
        ':score' => $score
    ]);
}


elseif($score < $a_score -> score){
    $new_score = $pdo->prepare("UPDATE Score SET score = :new_score, date_heure_score = CURRENT_TIMESTAMP WHERE id_u = :id AND niv = :niv;"); 
    $new_score->execute([
        ':id' => $_SESSION['userId'],
        ':niv' => $difficulte,
        ':new_score' => $score
    ]);
}
?>
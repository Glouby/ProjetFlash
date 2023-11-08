<?php
require '../../utils/common.php';
require '../../utils/database.php';

$score = $_POST['score'];
$difficulte = $_POST['difficulte'];

$pdoStatement = $pdo->prepare("SELECT score FROM Utilisateur JOIN Score ON Utilisateur.id_u = Score.id_u WHERE Score.id_u = :id AND niv = :niv;"); 
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
elseif($a_score < $score){
    $pdoStatement = $pdo->prepare("UPDATE Score SET score = :score WHERE id_u = :id AND niv = :niv;"); 
    $pdoStatement->execute([
        ':id' => $_SESSION['userId'],
        ':niv' => $difficulte,
        ':score' => $score
    ]);
}
?>
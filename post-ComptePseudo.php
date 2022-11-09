<?php
include 'config.php';
include 'variables.php';

$mdp = $_POST['mdp'];

if(hash('sha256', $mdp) == $userInfos[0][3]){
    $newPseudo = $_POST['Pseudo'];
    $updatePseudo = $pdo->prepare("UPDATE user SET Pseudo = :pseudo where id  = :id");
    $updatePseudo->execute(['pseudo'=>$newPseudo, 'id'=>$_SESSION['ids']]);
}

header('location:compte.php') ?>
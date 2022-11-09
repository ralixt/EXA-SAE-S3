<?php
include 'config.php';
include 'variables.php';

$mdp = $_POST['mdp'];

if(hash('sha256', $mdp) == $userInfos[0][3]){
    $newMail = $_POST['adr_email'];
    $updateMail = $pdo->prepare("UPDATE user SET email = :mail where id  = :id");
    $updateMail->execute(['mail'=>$newMail, 'id'=>$_SESSION['ids']]);
}

header('location:compte.php') ?>
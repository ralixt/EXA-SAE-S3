<?php
include 'config.php';
include 'variables.php';

$ancien_mdp = $_POST['ancien_mdp'];
$nouveau_mdp = $_POST['nouveau_mdp'];
$confirmation_mdp = $_POST['confirmation_mdp'];

if(hash('sha256', $ancien_mdp) == $userInfos[0][3]){
    if($nouveau_mdp == $confirmation_mdp){
        $updatePassword = $pdo->prepare("UPDATE user SET password = :mdp where id  = :id");
        $updatePassword->execute(['mdp'=>hash('sha256', $nouveau_mdp), 'id'=>$_SESSION['ids']]);
    }
}

header('location:compte.php') ?>
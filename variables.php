<?php
include_once("config.php");
session_start();
if(isset($_SESSION['ids'])){
    $id = $_SESSION['ids'];
    $userInfo = $pdo->prepare("Select * from user where id = :id");
    $userInfo->execute(['id'=>$id]);
    $userInfos=$userInfo->fetchAll();
}
// Récupération des variables à l'aide du client MySQL
$usersStatement = $pdo->prepare('SELECT * FROM user');
$usersStatement->execute();
$users = $usersStatement->fetchAll();


$projectStatement = $pdo->prepare('SELECT * FROM projet ');
$projectStatement->execute();
$projets = $projectStatement->fetchAll();



$commentStatement =$pdo->prepare('SELECT  Pseudo, titre from comment JOIN user ON comment.author = user.id JOIN projet ON projet.id = comment.projet ');
$commentStatement-> execute();



$comments=$commentStatement->fetchAll();
$tagStatement =$pdo->prepare('SELECT * FROM tag ');
$tagStatement-> execute();
$tags=$tagStatement->fetchAll();


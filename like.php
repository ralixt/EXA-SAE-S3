<?php


include_once('config.php');
include_once('variables.php');
include_once('login.php');

$comment=$_GET['idcommentsss'];
$userss=$_GET['idusersss'];
$likecomment=$pdo->prepare('INSERT INTO likecomment (id_comment,id_user) VALUES(:idcomment, :iduser)');
$likecomment->execute([
    'idcomment'=>$comment,
    'iduser'=>$userss


]);
header('location:accueil.php')
?>
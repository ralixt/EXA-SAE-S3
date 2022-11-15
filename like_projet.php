<?php


include_once('config.php');
include_once('variables.php');
include_once('login.php');

$like=$_GET['idprojett'];
$userss=$_GET['idusersss'];
$affichagelike=$pdo->prepare('SELECT * from likeproject where user=:iduser and project=:idprojet' );
$affichagelike->execute([
    'iduser'=>$userss,
    'idprojet'=>$like,
]);
$likes=$affichagelike->fetchall();
if($affichagelike->rowCount()==0){

$likecomment=$pdo->prepare('INSERT INTO likeproject(user,project) VALUES(:iduser, :idprojet)');
$likecomment->execute([
    'idprojet'=>$like,
    'iduser'=>$userss


]);
header('location:accueil.php');
}else{
$suppressionlike=$pdo->prepare('Delete from likeproject where user=:iduser and project=:idprojet');
$suppressionlike->execute([
    'idprojet'=>$like,
    'iduser'=>$userss,
]);
header('location:accueil.php');
}


?>
<?php
    include_once('config.php');
    include_once('variables.php');
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contenu</title>
    <link rel="stylesheet" type="text/css" href="css/styless.css">
    <script type="text/javascript" src="script/comments.js" defer></script>

</head>
<?php

include_once("config.php");

//$pseudo=$_POST["Pseudo"];
if(isset($_GET['id'])){
$id=$_GET['id'];
}
//$id=$_POST['id'];


$ajoutinfo=$pdo->prepare('SELECT * FROM projet where id=:id');

$ajoutinfo->execute([
'id'=>$id,







]);

$result=$ajoutinfo->fetchall();


$affichagetag=$pdo->prepare('SELECT tag.title from tag JOIN projet_tag on tag.id=projet_tag.id_tag JOIN projet on projet_tag.id_projet=projet.id where projet.id=:id');
$affichagetag->execute([
    'id'=>$id,
    
    
]);
$resulttag=$affichagetag->fetchall();   

$affichageressources=$pdo->prepare('Select URL_Image from projet where id=:id');
$affichageressources->execute([
    'id'=>$id,
]);
$resultressource=$affichageressources->fetchall();

$affichagecommentaire=$pdo->prepare('SELECT comment.content , Pseudo,titre FROM comment JOIN user on comment.author=user.id JOIN projet on comment.projet=projet.id where comment.projet=:id');
$affichagecommentaire->execute([
    'id'=>$id,
]);
$commentaires=$affichagecommentaire->fetchall();

?>
<header>
 
    <input type="hidden" name="comments" id="comments" value="<?php if(isset($commentaire[0][0])){ echo($commentaires[0][0]);}?>">
    
    <h2><?php echo($result[0][2])?></h2>
    <p><?php echo($result[0][1])?></p>
    <?php foreach($resulttag as $tag){
    echo('<button>'.$tag[0].'</button>');
    }?>
  
</header>
<body>
    <div>
        <h2>Ressources</h2>
        <?php echo('<a href= image/'.$resultressource[0][0].'  title="mon fichier (zip, 255K)" >'. $resultressource[0][0].'</a>');?>
    </div>
    
        
    
   
    <div>
        <h2>Projet</h2>
        <?php
        require_once'libs/Parsedown.php';
        $parsedown=new Parsedown();
        $text=$result[0][3];

        ?>
        <p><?php echo($parsedown->text($text));?></p>
    </div>
    <div>
        <h2>Commentaires</h2>
        <form action="post-comment.php" method="post">
            <div>
                <?php foreach($users as $user):?>                       
                        <label for="idusers"></label>                
                        <input type="hidden" id="idusers" name="idusers" value="<?php echo ($user["id"])?>"/>                    
                <?php endforeach?>
            </div>
            <div>
                                  
                        <label for="idprojets"></label>                
                        <input type="hidden" id="idprojets" name="idprojets" value="<?php echo ($_GET['id'])?>"/>                    
                
            </div>
            <div>
            <label for="commentaire"></label>
            <input type="text" name="commentaire" id="commentaire" placeholder="Ajouter un commentaire">
            </div>
            <button type="submit" id="ajouter">Ajouter</button>
        </form>
        


    </div>
   
        <div id='comment_contenair'>
            <?php foreach($commentaires as $commentaire):?>
            <div class='comment'>
            <h2><?php echo($commentaire[1])?></h2>
            <p>
            <?php echo($commentaire[0])?>
            </p>
            </div>
            <?php endforeach?>
            
        </div>
    
</body>

</html>
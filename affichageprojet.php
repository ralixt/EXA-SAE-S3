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
    <link rel="stylesheet" type="text/css" href="css/stylesss.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0..1,0" />
    

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

$affichagecommentaire=$pdo->prepare('SELECT comment.content , Pseudo,titre,comment.rating,comment.id FROM comment JOIN user on comment.author=user.id JOIN projet on comment.projet=projet.id where comment.projet=:id');
$affichagecommentaire->execute([
    'id'=>$id,
]);
$commentaires=$affichagecommentaire->fetchall();

//$affichagelike=$pdo->prepare('SELECT likecomment.id from likecomment where  ')

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

                    <input type="radio" id="note0"
                    name="note" value="0" checked>
                    <label for="note0">0</label>

                    <input type="radio" id="note1"
                    name="note" value="1">
                    <label for="note1">1</label>

                    <input type="radio" id="note2"
                    name="note" value="2">
                    <label for="note2">2</label>

                    <input type="radio" id="note3"
                    name="note" value="3" >
                    <label for="note3">3</label>

                    <input type="radio" id="note4"
                    name="note" value="4">
                    <label for="note4">4</label>
                    
                    <input type="radio" id="note5"
                    name="note" value="5">
                    <label for="note5">5</label>
            </div>
            <br>
            <div>
                                  
                        <label for="idprojets"></label>                
                        <input type="hidden" id="idprojets" name="idprojets" value="<?php if(isset($_GET['id'])){ echo ($_GET['id']);}?>"/>                    
                
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
            <h2><?php echo($commentaire[1])?></h2>  <a href="like.php?idcommentsss=<?php echo($commentaire[4])?>&idusersss=<?php echo($_SESSION['ids'])?>"><span class="material-symbols-outlined">favorite</span></a>
               
           

            <h3> notes: <?php echo($commentaire[3].'/5')?></h3>
            
            <p>
            <?php echo($commentaire[0])?>
            </p>
            </div>
            <div>
                
                <?php
                /*
                 $variable_php = '<script type="text/javascript">document.write(variable);</script>';

                 echo($variable_php);
            if($variable_php=='material-symbols-outlined'){
                
                $likecomment=$pdo->prepare('INSERT INTO likecomment (user,comment) VALUES( :iduser,:idcomment)');
             $likecomment->execute([
             'iduser'=>$_SESSION["ids"],
             'idcomment'=>$commentaire[4]

            ]);
            
        }
        */
            ?>
    
                <input type="hidden" name="idcomments" value= "<?php echo( $commentaire[4])?>">
         
            </div>
            <?php endforeach?>
            
        </div>
    
        <script language="javascript">
             var like=document.querySelector('.material-symbols-outlined');
             var likes=document.querySelectorAll('.material-symbols-outlined');
             for(let i=0;i<likes.length;i++){
             var variable=likes[i].className;
             }
             

            function changement(e){
           
           // variable=like.className;

            console.log(like.className);
            
           // likes[i].classList.remove('filled');
           // likes[i].classList.add('filled');
           
            e.target.classList.toggle('filled');
           
           
            
           }
          
           
           
            
           for(let i=0;i<likes.length;i++){
            
                likes[i].addEventListener("click",changement);
           }
           
        </script>
</body>

</html>
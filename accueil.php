<?php
    require_once "config.php";
   
    
    require_once "variables.php";
?>

<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/styless.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    
    
</head>
<header>
<?php
    if(isset($_SESSION['ids']) && $_SESSION['ids']!=null){
        echo ('<a href="login.php"><button>Changer de compte</button></a>');
        echo('<a href="compte.php"><button>Compte</button></a>');
        echo '<a href="projet.php"><button>Nouveau Projet</button></a>';
    }
    else{
        echo ('<a href="login.php"><button>Connexion</button></a>');
        echo '<a href="login.php"><button>Nouveau Projet</button></a>';
    }
    ?>
    <a href="deconnexion.php"><button>Deconnexion</button></a>
    <button id="test">Test</button>
    <?php if(isset($_SESSION["email"])):?>
    <p>Bienvenue <span><?php echo $_SESSION["email"]?></span> vous etes un : <?php echo $_SESSION["roles"]?></p><br>
    <?php endif ?>
    <form method="GET">
        <input type="search" name="recherche" id="recherche" value='<?php  if(isset($_GET["recherche"])){$recherche=$_GET["recherche"];  echo($recherche);} ?>'>
        <p>
            langage de programmation <br/>
            HTML: <input type="checkbox" name="tag[]" value="HTML" /><br/>
            Java: <input type="checkbox" name="tag[]" value="Java" /><br/>
            Python: <input type="checkbox" name="tag[]" value="Python" /><br/>
            C++: <input type="checkbox" name="tag[]" value="C++" /> <br/>
            C: <input type="checkbox" name="tag[]" value="C" /><br/>
            C#: <input type="checkbox" name="tag[]" value="C#" /><br/>
            PHP: <input type="checkbox" name="tag[]" value="PHP" /><br/>
            CSS: <input type="checkbox" name="tag[]" value="CSS" /><br/>
            SQL: <input type="checkbox" name="tag[]" value="SQL" /><br/>
            Javascript: <input type="checkbox" name="tag[]" value="Javascript" /><br><br>

            difficulté <br/>
            Facile: <input type="checkbox" name="tag[]" value="facile" /><br/>
            Moyen: <input type="checkbox" name="tag[]" value="moyen" /><br/>
            Difficile: <input type="checkbox" name="tag[]" value="difficile" /><br/><br>

            support <br/>
            Windows: <input type="checkbox" name="tag[]" value="Windows" /><br/>
            Linux: <input type="checkbox" name="tag[]" value="Linux" /><br/>
            Mac: <input type="checkbox" name="tag[]" value="Mac" /><br/><br>

            langue <br/>
            Français: <input type="checkbox" name="tag[]" value="francais" /><br/>
            English: <input type="checkbox" name="tag[]" value="english" /><br/>
            Espanol: <input type="checkbox" name="tag[]" value="espanol" /><br/>
            Deutsch: <input type="checkbox" name="tag[]" value="deutsch" /> <br/>
        </p>
        <input type="submit" name="valider" value="valider">   
    </form>
    
    
</header>
<body>
    

    <br>
    <!--
    <div class="container">
        <div class="row">
            <a href="affichageprojet.php"><img class="imageprojet"src="image/projet.jpg" alt="" ></a>
            
            <a href="affichageprojet.php"><img class="imageprojet"src="image/projet.jpg" alt="" ></a>
        </div>
        <div class="row">
        <a href="affichageprojet.php"><img class="imageprojet"src="image/projet.jpg" alt="" ></a>
            
        <a href="affichageprojet.php"><img class="imageprojet"src="image/projet.jpg" alt="" ></a>
    </div>
    </div>
    -->
    <!--
    <div class="imagecontenair">
    -->
            <?php
           /* if(isset($_GET["valider"])){
               
                echo('rechereche :: '.$recherche);
            }*/
           if(isset($_GET["recherche"])){
            $recherche=$_GET["recherche"]; 
            $valider=$_GET["valider"];
           }
           if(isset($_GET['tag'])){
                var_dump($_GET['tag']);
                if(sizeof($_GET['tag']) > 1){
                    $tag = implode($_GET['tag'], " AND ");
                    var_dump($tag);
                }
                else{
                    $tag = implode($_GET['tag']);
                    var_dump($tag);
                }
           }
           // echo('rechereche :: '.$recherche);    
            // Attempt select query execution
                if(isset($valider) && !empty(trim($recherche)) && isset($_GET['tag'])){
                //comment avoir plusieurs tags?
                $sql = 'Select * from projet where titre LIKE "%' . $recherche .  '%" OR content LIKE "%' . $recherche .  '%"';
                //$sql='SELECT * From projet where titre Like "%'.$recherche.'%"';
                if($result = $pdo->query($sql)){
                    $row=$result->fetchall();
                    
                     
                        // while($row = $result->fetchall()){
                             /*
                           for( $i=0 ;$i<$row;$i++){
                             if($i%3==0){
                                 
                                 echo("<div class='imageenligne' >");
                             
                                 echo('<a href="affichageprojet.php"><img class="imageprojet" src="image/projet.jpg"/></a>');
                                 echo("</div>");
 
                             }
                           }
                             
                            
                             
                             */
                             echo("<div class='imageenligne'>");
                             
                            for($i=0;$i<count($row);$i++){
                            
                             if($i%3==0){
                                 echo("</div>");
                                 echo("<div class='imagecontenair'>");
                             }
                             echo("<div class='imagetexte'>");
                             echo('<a href="affichageprojet.php?id='. $row[$i][0] .'"><img class="imageprojet" src="image/projet.jpg" title='.$row[$i][2].'  /></a>');
                            echo('<p>'. $row[$i][2] .'</p> <br>');
                             echo("</div>");
 
                            // ;
                            }
                            echo("</div>");
                            echo("</div>");
                         }
                            
                        // }
                     unset($result);
 
                }
                elseif(empty($recherche)){
                    $sql = "SELECT * FROM projet where status = 'Published';";
                    if($result = $pdo->query($sql)){
                        $row=$result->fetchall();
                        
                         
                            // while($row = $result->fetchall()){
                                 /*
                               for( $i=0 ;$i<$row;$i++){
                                 if($i%3==0){
                                     
                                     echo("<div class='imageenligne' >");
                                 
                                     echo('<a href="affichageprojet.php"><img class="imageprojet" src="image/projet.jpg"/></a>');
                                     echo("</div>");
     
                                 }
                               }
                                 
                                
                                 
                                 */
                                 echo("<div class='imageenligne'>");
                                 
                                for($i=0;$i<count($row);$i++){
                                
                                 if($i%3==0){
                                     echo("</div>");
                                     echo("<div class='imagecontenair'>");
                                     
                                     
     
                                 }
                                 echo("<div class='imagetexte'>");
                                 echo('<a href="affichageprojet.php?id='. $row[$i][0] .'"><img class="imageprojet" src="image/projet.jpg" title='.$row[$i][2].'  /></a>');
                                 echo('<p>'. $row[$i][2] .'</p> <br>');
                                 echo("</div>");
     
                                // ;
                               
     
     
                                 
                                 
                               
                                }
                                echo("</div>");
                                echo("</div>");
                             }
                                
                            // }
                         unset($result);
     
                }
                elseif (!isset($_GET['tag'])) {
                    $sql = 'SELECT * FROM projet WHERE titre LIKE "%' . $recherche . '%" OR content LIKE "%' . $recherche . '%";';
                        if($result = $pdo->query($sql)){
                            $row=$result->fetchall();
                            echo("<div class='imageenligne'>");
                            for($i=0;$i<count($row);$i++){
                                if($i%3==0){
                                    echo("</div>");
                                    echo("<div class='imagecontenair'>");
                                }
                                echo("<div class='imagetexte'>");
                                echo('<a href="affichageprojet.php?id='. $row[$i][0] .'"><img class="imageprojet" src="image/projet.jpg" title='.$row[$i][2].'  /></a>');
                                echo('<p>'. $row[$i][2] .'</p> <br>');
                                echo("</div>");
                            }
                            echo("</div>");
                            echo("</div>");
                        }
                    unset($result);
                }
                
                
        ?>
        
    </div>
    
       
    <script language="javascript">
    let recup = <?php echo( json_encode($row)); ?>;
  
    let imgs=document.querySelectorAll('.imageprojet')
    let img=document.querySelector('.imagetexte');
   
    console.log(imgs);
    
    function affichagetitre(){
        
        for(let i=0 ;i<recup.length;i++ ){
            for(let j=0;j<imgs.length;j++){
                let p=document.createElement('p');
          // p.classList('list');
         
            p.innerHTML= recup[i][2];
            p.style.color = "black";
            p.style.backgroundcolor = "black";
        
           img.append(p);
       }
    }
          
            
        
        
         

        

    }
    function suppresiontitre(){
         
    }
    
   /*
   
    function displayDivInfo(text){
    if(text){
        //Détection du navigateur
        is_ie = (navigator.userAgent.toLowerCase().indexOf("msie") != -1) && (navigator.userAgent.toLowerCase().indexOf("opera") == -1);
         
        //Création d'une div provisoire
        var divInfo = document.createElement('div');
        divInfo.style.position = 'absolute';
        document.onmousemove = function(e){
            x = (!is_ie ? e.pageX-window.pageXOffset : event.x+document.body.scrollLeft);
            y = (!is_ie ? e.pageY-window.pageYOffset : event.y+document.body.scrollTop);
            divInfo.style.left = x+15+'px';
            divInfo.style.top = y+15+'px';
        }
        divInfo.id = 'divInfo';
        divInfo.innerHTML = text;
        document.body.appendChild(divInfo);
    }
    else{
        document.onmousemove = '';
        imgs.removeChild(document.getElementById('divInfo'));
    }

}
*/
    //img .addEventListener("mouseover",affichagetitre)


</script>
</body>

</html>

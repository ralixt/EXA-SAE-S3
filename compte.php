<?php 
    include_once('config.php');
    include_once('variables.php');
    $projetUserStatement =$pdo->prepare('SELECT Count(*) FROM projet where author = :id');
    $projetUserStatement-> execute(['id'=>$_SESSION['ids']]);
    $projetPub=$projetUserStatement->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script language="javascript" type="text/javascript" src="script.js" defer></script> 
    <title>Compte</title>
    <link rel="stylesheet" href="CSS/stylescompte.css">
    <link rel="icon" href="image/Let_s_Code.png">
</head>
<header>
    <?php if(isset($_SESSION['ids']) && $_SESSION['ids']!=null){
        echo('<a href="login.php">Changer de compte</a>');
    }
    ?>
    <a href="Accueil.php">Accueil</a>
        <!-- récupérer le header du groupe et changer l'image -->
</header>
<body>
    <div class="rectangle">
        <div>
            <p id="pseudoname">Pseudo : <?php echo $userInfos[0][1] ?></p>
        </div ><br>
        <div>
            <p id="AdresseMail">Mail :  <?php echo $userInfos[0][2]?></p>
        </div><br>
        <div>
            <p id="ProjetPub">Nombre de projets publiés :  <?php echo $projetPub[0][0] ?></p>
        </div><br>
    </div>
    <div class="rectangle flex">
        <div class="rectangle blanc">
            <h2>Gratuit</h2>
            <ul>
                <li>Accès à des millions de projets</li>
                <li>Publication de projets</li>
                <li>Accès aux ressources de projets</li>
            </ul>
            <Button class="button salope">Selectionné</Button>
        </div>
        <div class="rectangle blanc">
            <p>A droite<br>les trois meilleurs projets gratuit</p>
            <ul>
                <li><a href="">Projet 1</a></li>
                <li><a href="">Projet 2</a></li>
                <li><a href="">Projet 3</a></li>
            </ul>
        </div>
        <div class="rectangle blanc">
            <h2>Premium</h2>
            <ul>
                <li>Accès à des millions de projets</li>
                <li>Publication de projets</li>
                <li>Accès aux ressources de projets</li>
                <li>Accès à des projets premium</li>
            </ul>
            <Button id="premium" class="button salope">Selectionner</Button>
        </div>
        <div class="rectangle blanc">
            <p>A droite<br>les trois meilleurs projets premium</p>
            <ul>
                <li><a href="">Projet 1</a></li>
                <li><a href="">Projet 2</a></li>
                <li><a href="">Projet 3</a></li>
            </ul>
        </div>
    </div>
    <div class="rectangle">
        <div>
            <form class="ModifierSesInfos" action="post-ComptePseudo.php" method="post">
                <div>
                    <input type="text" id="prenom" name="Pseudo" placeholder="Pseudo" maxlength="16" minlength="6" required>
                    <ul class="error-container static"></ul>
                </div ><br>
                <div>
                    <input id="mdp" name="mdp" type="password" placeholder="Rentrer votre mot de passe" minlength="8" required>
                </div><br>
                <div>
                    <button id="valider" type="submit" class="button">Modifier son pseudo</button>
                </div>
            </form>
        </div>
        <div>
            <form class="ModifierSesInfos" action="post-CompteMail.php" method="post">
                <div>
                    <input id="adr_email" name="adr_email" type="email" placeholder="Email" required>
                    <ul class="error-container static"></ul>
                </div><br>
                <div>
                    <input id="mdp" name="mdp" type="password" placeholder="Rentrer votre mot de passe" minlength="8" required>
                </div><br>
                <div>
                    <button id="valider" type="submit" class="button">Modifier son mail</button>
                </div>
            </form>
        </div>
        <div>
            <form class="ModifierSesInfos" action="post-CompteMDP.php" method="post">
                <div>
                    <input id="nouveau_mdp" name="nouveau_mdp" type="password" placeholder="Rentrer un nouveau mot de passe" minlength="8" required>
                </div><br>
                <div>
                    <input id="confirmation_mdp" name="confirmation_mdp" type="password" placeholder="Confirmer le mot de passe" required>
                </div><br>
                <div>
                    <input id="ancien_mdp" name="ancien_mdp" type="password" placeholder="Rentrer votre ancien mot de passe" minlength="8" required>
                </div><br>
                <div>
                    <button id="valider" type="submit" class="button">Modifier son mot de passe</button>
                </div>
            </form>
        </div>
    </div>
</body>
<footer>
    <div>
        <a href="document">Terms & Conditions</a>
        <a href="contact.html">Contact</a>
    </div>
    <div>
        <a href="#">haut de la page</a>
    </div>
    <div>
        <a href="login.php">Connexion</a>
        <a href="inscription.php">Inscription</a>
    </div>
</footer>
</html>
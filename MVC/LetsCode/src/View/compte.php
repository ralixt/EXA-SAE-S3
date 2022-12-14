<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel='stylesheet' href='../Ressource/css/styles.css'  type='text/css' media='screen'>
    <title>Accueil</title>
</head>


<body>
    <header>
        <?php
        NbrUserProjet();
        if(isset($_SESSION['ids']) && $_SESSION['ids']!=null){
            echo('<a href="login.php">Changer de compte</a>');
        }
        ?>
        <a href="Accueil.php">Accueil</a>
    </header>

    <main>
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
                <Button class="buttonSelectedProject">Selectionné</Button>
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
                <Button id="premium" class="buttonSelectedProject">Selectionner</Button>
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
                <form class="ModifierSesInfos" action="../../../Rageethtan/post-ComptePseudo.php" method="post">
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
                <form class="ModifierSesInfos" action="../../../Rageethtan/post-CompteMail.php" method="post">
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
                <form class="ModifierSesInfos" action="../../../Rageethtan/post-CompteMDP.php" method="post">
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
    </main>

</body>
<?php include 'footer.php'?>
</html>
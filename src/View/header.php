<header>
    <nav id="navbar">
        <a href="http://localhost" ><img class="logoLetsCode" src="../Ressource/images/logoLetsCode.png" alt="Logo Let's Code"></a>

        <div id="nav-links">
            <ul style="list-style-type:none">
                <li><a href="http://localhost">Accueil</a></li>
                <!--pour les user connecté-->

                <?php if(isset($_SESSION["Pseudo"])) : ?>
                    <li><a href="/create">Nouveau Projet</a></li>
                    <div class="buttonLog">
                        <li><a href="/compte" class="loginButton">Mon compte</a></li>
                    </div>

                <?php else : ?>
                    <!--pour les user non connecté-->
                    <div class="buttonLog">
                        <li><a href="/login" class="loginButton">Connexion/Inscription</a></li>

                    </div>

                <?php endif; ?>

            </ul>
        </div>
    </nav>
</header>

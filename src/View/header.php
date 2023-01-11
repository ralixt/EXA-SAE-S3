<header>
    <nav class="navbar">
        <a href="http://localhost" ><img class="logoLetsCode" src="../Ressource/images/logoLetsCode.png" alt="Logo Let's Code"></a>

        <div class="nav-links">
            <ul style="list-style-type:none">
                <li><a href="http://localhost">Accueil</a></li>
                <!--pour les user connectés-->

                <?php if(isset($_SESSION["Pseudo"])) : ?>
                    <li><a href="/create">Nouveau Projet</a></li>
                    <li><a href="/compte" class="loginButton">Mon compte</a></li>


                <?php else : ?>
                    <!--pour les user non connectés-->
                    <li><a href="/login">Nouveau Projet</a></li>
                    <li><a href="/login" class="loginButton">Connexion/Inscription</a></li>

                <?php endif; ?>
            </ul>
        </div>
        <img class="menu-hamburger" src="../Ressource/images/menu.png" alt="menu hamburger">
        <img class="menu-hamburger-close" src="../Ressource/images/close.png" alt="close menu hamburger">

    </nav>
</header>
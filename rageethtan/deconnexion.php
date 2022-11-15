<?php

//account logout
session_start();
session_unset();
session_destroy();

header("location:accueil.php")

?>
<?php
    session_start();
    unset($_SESSION['grille']);
    echo "La partie a bien été relancé. A toi de jouer ! Tu es les X";
?>
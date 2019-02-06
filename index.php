<?php
    session_start();
    unset($_SESSION['grille']);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Morpion</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <h1>Jeu du morpion !</h1>
        <div id="jeu">
            <table>
                <tr>
                    <th colspan="3" id="head">A toi de jouer ! Tu es les X</th>
                </tr>
                <tr>
                    <td class="vide" id="a1"></td>
                    <td class="vide" id="a2"></td>
                    <td class="vide" id="a3"></td>
                </tr>
                <tr>
                    <td class="vide" id="b1"></td>
                    <td class="vide" id="b2"></td>
                    <td class="vide" id="b3"></td>
                </tr>
                <tr>
                    <td class="vide" id="c1"></td>
                    <td class="vide" id="c2"></td>
                    <td class="vide" id="c3"></td>
                </tr>
            </table>
        </div>
        <div id="tab_score">
            <div class="container">
                <div class="item">
                    <div class="score">
                        <h2>Joueur (X) : <span id="score_joueur"><?php
							if (isset($_SESSION['score_joueur'])){
								echo $_SESSION['score_joueur'];}
							else{
								echo "0";
							}
							?></span></h2>
                    </div>
                    <div class="score">
                        <h2>Ordinateur (O) : <span id="score_ordi"><?php
							if (isset($_SESSION['score_ordi'])){
								echo $_SESSION['score_ordi'];}
							else{
								echo "0";
							}
							?></span></h2>
                    </div>
                      <div class="score">
                        <h2>Egalité : <span id="matchnul"><?php
							if (isset($_SESSION['matchnul'])){
								echo $_SESSION['matchnul'];}
							else{
								echo "0";
							}
							?></span></h2>
                    </div>
                </div>
                <hr>
                <div class="item">
                    <input class="bouton" id="relancer" type="submit" value="Relancer la partie">
                    <form action="appelAjax/recommencer.php">
                        <input class="bouton" type="submit" value="Recommencer à zéro">
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="js/script.js"></script>
</html>
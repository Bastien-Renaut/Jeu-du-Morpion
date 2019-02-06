<?php
    session_start();
	
	function isWin($joueur) {
		if( $_SESSION['grille']['a1'] == $joueur && $_SESSION['grille']['a2'] == $joueur && $_SESSION['grille']['a3'] == $joueur ||
			$_SESSION['grille']['b1'] == $joueur && $_SESSION['grille']['b2'] == $joueur && $_SESSION['grille']['b3'] == $joueur ||
			$_SESSION['grille']['c1'] == $joueur && $_SESSION['grille']['c2'] == $joueur && $_SESSION['grille']['c3'] == $joueur ||
			$_SESSION['grille']['a1'] == $joueur && $_SESSION['grille']['b2'] == $joueur && $_SESSION['grille']['c3'] == $joueur ||
			$_SESSION['grille']['a3'] == $joueur && $_SESSION['grille']['b2'] == $joueur && $_SESSION['grille']['c1'] == $joueur ||
			$_SESSION['grille']['a1'] == $joueur && $_SESSION['grille']['b1'] == $joueur && $_SESSION['grille']['c1'] == $joueur ||
			$_SESSION['grille']['a2'] == $joueur && $_SESSION['grille']['b2'] == $joueur && $_SESSION['grille']['c2'] == $joueur ||
			$_SESSION['grille']['a3'] == $joueur && $_SESSION['grille']['b3'] == $joueur && $_SESSION['grille']['c3'] == $joueur) {

				return true;
		} else {
			return false;
		}
	}

	function ordinateur() {
		$retourOrdi = verifWinPossible('Ordi');
		$retourJ1 = verifWinPossible('J1');

		if ($retourOrdi[0] != '') {
			return $retourOrdi[0];
		}
		elseif ($retourOrdi[0] == '') {
			if ($retourJ1[0] != '') {
				return $retourJ1[0];
			}
			elseif ($retourJ1[0] == '') {            
				do {
					$random = rand(0, 8);
					switch($random) {
						case 0:
							$caseOrdi = 'a1';
							break;
						case 1:
							$caseOrdi = 'a2';
							break;
						case 2:
							$caseOrdi = 'a3';
							break;
						case 3:
							$caseOrdi = 'b1';
							break;
						case 4:
							$caseOrdi = 'b2';
							break;
						case 5:
							$caseOrdi = 'b3';
							break;
						case 6:
							$caseOrdi = 'c1';
							break;
						case 7:
							$caseOrdi = 'c2';
							break;
						case 8:
							$caseOrdi = 'c3';
							break;
					}
				} while ($_SESSION['grille'][$caseOrdi] != "");
				return $caseOrdi;
			}
		}
	}
	function verifWinPossible($joueur) {
		$pourGagner = array();
		// Vérif si peut gagner en haut
		if ($_SESSION['grille']['a1'] == $joueur && $_SESSION['grille']['a2'] == $joueur || $_SESSION['grille']['a1'] == $joueur && $_SESSION['grille']['a3'] == $joueur || $_SESSION['grille']['a2'] == $joueur && $_SESSION['grille']['a3'] == $joueur) {
			if ($_SESSION['grille']['a1'] == "") { array_push($pourGagner, 'a1'); }
			if ($_SESSION['grille']['a2'] == "") { array_push($pourGagner, 'a2'); }
			if ($_SESSION['grille']['a3'] == "") { array_push($pourGagner, 'a3'); }
		}
		// Vérif si peut gagner au milieu (ligne)
		if ($_SESSION['grille']['b1'] == $joueur && $_SESSION['grille']['b2'] == $joueur || $_SESSION['grille']['b1'] == $joueur && $_SESSION['grille']['b3'] == $joueur || $_SESSION['grille']['b2'] == $joueur && $_SESSION['grille']['b3'] == $joueur) {
			if ($_SESSION['grille']['b1'] == "") { array_push($pourGagner, 'b1'); }
			if ($_SESSION['grille']['b2'] == "") { array_push($pourGagner, 'b2'); }
			if ($_SESSION['grille']['b3'] == "") { array_push($pourGagner, 'b3'); }
		}
		// Vérif si peut gagner en bas
		if ($_SESSION['grille']['c1'] == $joueur && $_SESSION['grille']['c2'] == $joueur || $_SESSION['grille']['c1'] == $joueur && $_SESSION['grille']['c3'] == $joueur || $_SESSION['grille']['c2'] == $joueur && $_SESSION['grille']['c3'] == $joueur) {
			if ($_SESSION['grille']['c1'] == "") { array_push($pourGagner, 'c1'); }
			if ($_SESSION['grille']['c2'] == "") { array_push($pourGagner, 'c2'); }
			if ($_SESSION['grille']['c3'] == "") { array_push($pourGagner, 'c3'); }
		}
		// Vérif si peut gagner à gauche
		if ($_SESSION['grille']['a1'] == $joueur && $_SESSION['grille']['b1'] == $joueur || $_SESSION['grille']['a1'] == $joueur && $_SESSION['grille']['c1'] == $joueur || $_SESSION['grille']['b1'] == $joueur && $_SESSION['grille']['c1'] == $joueur) {
			if ($_SESSION['grille']['a1'] == "") { array_push($pourGagner, 'a1'); }
			if ($_SESSION['grille']['b1'] == "") { array_push($pourGagner, 'b1'); }
			if ($_SESSION['grille']['c1'] == "") { array_push($pourGagner, 'c1'); }
		}
		// Vérif si peut gagner au milieu (colonne)
		if ($_SESSION['grille']['a2'] == $joueur && $_SESSION['grille']['b2'] == $joueur || $_SESSION['grille']['a2'] == $joueur && $_SESSION['grille']['c2'] == $joueur || $_SESSION['grille']['b2'] == $joueur && $_SESSION['grille']['c2'] == $joueur) {
			if ($_SESSION['grille']['a2'] == "") { array_push($pourGagner, 'a2'); }
			if ($_SESSION['grille']['b2'] == "") { array_push($pourGagner, 'b2'); }
			if ($_SESSION['grille']['c2'] == "") { array_push($pourGagner, 'c2'); }
		}
		// Vérif si peut gagner à droite
		if ($_SESSION['grille']['a3'] == $joueur && $_SESSION['grille']['b3'] == $joueur || $_SESSION['grille']['a3'] == $joueur && $_SESSION['grille']['c3'] == $joueur || $_SESSION['grille']['b3'] == $joueur && $_SESSION['grille']['c3'] == $joueur) {
			if ($_SESSION['grille']['a3'] == "") { array_push($pourGagner, 'a3'); }
			if ($_SESSION['grille']['b3'] == "") { array_push($pourGagner, 'b3'); }
			if ($_SESSION['grille']['c3'] == "") { array_push($pourGagner, 'c3'); }
		}
		// Vérif si peut gagner diagonale haut gauche -> bas droite
		if ($_SESSION['grille']['a1'] == $joueur && $_SESSION['grille']['b2'] == $joueur || $_SESSION['grille']['a1'] == $joueur && $_SESSION['grille']['c3'] == $joueur || $_SESSION['grille']['b2'] == $joueur && $_SESSION['grille']['c3'] == $joueur) {
			if ($_SESSION['grille']['a1'] == "") { array_push($pourGagner, 'a1'); }
			if ($_SESSION['grille']['b2'] == "") { array_push($pourGagner, 'b2'); }
			if ($_SESSION['grille']['c3'] == "") { array_push($pourGagner, 'c3'); }
		}
		// Vérif si peut gagner diagonale haut droite -> bas gauche
		if ($_SESSION['grille']['a3'] == $joueur && $_SESSION['grille']['b2'] == $joueur || $_SESSION['grille']['a3'] == $joueur && $_SESSION['grille']['c1'] == $joueur || $_SESSION['grille']['b2'] == $joueur && $_SESSION['grille']['c1'] == $joueur) {
			if ($_SESSION['grille']['a3'] == "") { array_push($pourGagner, 'a3'); }
			if ($_SESSION['grille']['b2'] == "") { array_push($pourGagner, 'b2'); }
			if ($_SESSION['grille']['c1'] == "") { array_push($pourGagner, 'c1'); }
		}
		array_push($pourGagner, '');
		

		return $pourGagner;
	}

	//Si la grille n'a pas encore été initialisée, créer la grille
	if(!isset($_SESSION['grille'])) {
		$_SESSION['grille'] = array (
			"a1" => "",
			"a2" => "", 
			"a3" => "", 
			"b1" => "", 
			"b2" => "", 
			"b3" => "", 
			"c1" => "",
			"c2" => "", 
			"c3" => ""
		);
	}

	//Si le score du joueur n'a pas encore été initialisé, on initialise le score à 0
	if (!isset($_SESSION['score_joueur'])) {
		$_SESSION['score_joueur'] = 0;
	}

	//Si le score de l'ordinateur n'a pas encore été initialisé, on initialise le score à 0
	if (!isset($_SESSION['score_ordi'])) {
		$_SESSION['score_ordi'] = 0;
	}

	//Si le compteur des machts nuls n'a pas encore été initialisé, on initialise le score à 0
	if (!isset($_SESSION['matchnul'])) {
		$_SESSION['matchnul'] = 0;
	}

	if (isset($_GET['case'])) {
		$case = $_GET['case'];
		if($_SESSION['grille'][$case] == "") {
			$_SESSION['grille'][$case] = "J1";
			// Vérifier si joueur a gagné
			if(isWin("J1")) {
				$_SESSION['score_joueur'] ++;
				if(isset($_SESSION['score_joueur'])) {	 
				echo '{
				"SymboleJ1": "X",
				"ClassJ1": "J1",
				"Head": "Le Joueur a gagné !",
				"ScoreJoueur":"'.$_SESSION['score_joueur'].'"
				
				}';}
			} else {
				
				//Pour que l'ordinateur joue
				if(in_array("", $_SESSION['grille'], true)) {
					$ordinateur = ordinateur();
					$_SESSION['grille'][$ordinateur] = "Ordi";
					
					//On vérifie si l'ordinateur a gagné
					if (isWin("Ordi")) {
						$_SESSION['score_ordi'] ++;
						if(isset($_SESSION['score_ordi'])) {
							
						echo '{
						"SymboleJ1": "X",
						"ClassJ1": "J1",
						"SymboleOrdi": "O",
						"ClassOrdi": "Ordi",
						"CaseOrdi": "'.$ordinateur.'",
						"Head": "L\'Ordinateur a gagné !" ,
						"ScoreOrdi":"'.$_SESSION['score_ordi'].'"
				
						}';		}
					} else {
						echo '{"SymboleJ1": "X", "ClassJ1": "J1", "SymboleOrdi": "O", "ClassOrdi": "Ordi", "CaseOrdi": "'.$ordinateur.'", "Head": "A toi de jouer ! Tu es les X"}';
					}
				}
				else {
					$_SESSION['matchnul'] ++;
					if(isset($_SESSION['score_ordi'])){
					echo '{"SymboleJ1": "X",
					"ClassJ1": "J1",
					"Head": "Personne n\'a gagné !",
					"ScoreNul":"'.$_SESSION['matchnul'].'"
					
					}';}
					
				}
			}
		}
	}
?>

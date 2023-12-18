<?php 
    function telechargerTous() {
        include("../config/configuration.php");
		$bdd = new PDO($dsn, $user, $password);
		$requete = 'SELECT nom, prenom, nom_animal FROM `participants`';
		$resultats = $bdd->query($requete);
    	$tableau = $resultats->fetchAll(); // Récupération des résultats
    	$resultats->closeCursor();
        $i = 0;
        foreach ($tableau as $value) {
                $participant = new Participant;
                $participant->nom = $tableau[$i]['nom'];
                $participant->prenom = $tableau[$i]['prenom'];
                $participant->nom_animal = $tableau[$i]['nom_animal'];
                self::$instances[] = $participant;
            $i++;
        }
    }
?>
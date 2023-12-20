<?php 
    function telechargerTous($id_activite) {
        Participant::$instances = [];
        include("../config/configuration.php");
		$bdd = new PDO($dsn, $user, $password);
		$requete = 'SELECT nom, prenom, nom_animal FROM `participant` INNER JOIN participe ON participe.id_participant=participant.id_participant WHERE participe.id_activite='.$id_activite;
		$resultats = $bdd->query($requete);
    	$tableau = $resultats->fetchAll(); // Récupération des résultats
    	$resultats->closeCursor();
        $i = 0;
        foreach ($tableau as $value) {
                $participant = new Participant;
                $participant->nom = $tableau[$i]['nom'];
                $participant->prenom = $tableau[$i]['prenom'];
                $participant->nom_animal = $tableau[$i]['nom_animal'];
                Participant::$instances[] = array(
                    'nom_prenom' => $participant->nom . ' ' . $participant->prenom,
                    'nom_animal' => $participant->nom_animal
                );
            $i++;
        }
    }
?>
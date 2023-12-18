<?php

class Participant {
    public $nom = "";
    public $prenom = "";
    public $nom_animal = "";

    public function __construct() {
	}

    public function telechargerParticipant($id_participant) {
        $participant = new Participant;
        include("../config/configuration.php");
		$bdd = new PDO($dsn, $user, $password);
		$requete = 'SELECT nom, prenom, nom_animal FROM `participants` WHERE id_participant ='.$id_participant;
		$resultats = $bdd->query($requete);
    	$resultats->fetchAll(); // Récupération des résultats
    	$resultats->closeCursor();
        $participant->nom = array_splice($resultats,0,1);
        $participant->prenom = array_splice($resultats,1,1);
        $participant->nom_animal = array_slice($resultats,2,1);
        $participant->nom = implode($this->nom);
        $participant->prenom = implode($this->prenom);
        $participant->nom_animal = implode($this->nom_animal);
        return $participant;
    }

    public function telechargerTous() {
        include("../config/configuration.php");
		$bdd = new PDO($dsn, $user, $password);
		$requete = 'SELECT nom, prenom, nom_animal FROM `participants`';
		$resultats = $bdd->query($requete);
    	$resultats->setFetchMode(PDO::FETCH_CLASS, 'Participant'); // Récupération des résultats
    	$resultats->closeCursor();
        $i = 0;
        foreach ($resultats as $key => $value) {
            foreach ($value as $key => $value) {
                $participants[$i] = new Participant;
                $participants[$i][$key] = $value;
            }    
            $i++;
        }
    }
}
?>
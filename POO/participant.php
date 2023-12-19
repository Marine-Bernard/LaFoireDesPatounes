<?php

class Participant {
    public $nom = "";
    public $prenom = "";
    public $nom_animal = "";

    public static $instances = [];

    public function __construct() {
	}

    public function telechargerParticipant($id_participant) {
        include("../config/configuration.php");
		$bdd = new PDO($dsn, $user, $password);
		$requete = 'SELECT nom, prenom, nom_animal FROM `participant` WHERE id_participant ='.$id_participant;
		$resultats = $bdd->query($requete);
    	$tableau = $resultats->fetch(); // Récupération des résultats
    	$resultats->closeCursor();
        $this->nom = $tableau['nom'];
        $this->prenom = $tableau['prenom'];
        $this->nom_animal = $tableau['nom_animal'];
        Participant::$instances=array_unique(Participant::$instances);
    }
}
?>
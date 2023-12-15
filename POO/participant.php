<?php

class participant {
    public $nom = "";
    public $prenom = "";
    public $nom_animal = "";

    public function __construct() {
	}

    public function téléchargerParticipant($id_participant) {
        include("../config/configuration.php");
		$bdd = new PDO($dsn, $user, $password);
		$requete = 'SELECT nom, prenom, nom_animal FROM `participants`';
		$resultats = $bdd->query($requete);
    	$resultats->fetchAll(); // Récupération des résultats
    	$resultats->closeCursor();
        $this->nom = array_splice($resultats,0,1);
        $this->prenom = array_splice($resultats,1,1);
        $this->nom_animal = array_slice($resultats,2,1);
        $this->nom = implode($this->nom);
        $this->prenom = implode($this->prenom);
        $this->nom_animal = implode($this->nom_animal);
    }
}
?>
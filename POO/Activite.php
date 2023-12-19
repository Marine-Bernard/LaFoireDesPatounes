<?php

// Classe pour stocker les pages internet /
class Activite {

	// Le texte de la page /
	public $id_activite = "";
	public $nom = "";
	public $description = "";
	public $minidesc = "";
	public $img = "";  //l'adresse de l'image sur le serv
	public $date;
	public $horaireDebut;
	public $horaireFin;

	// Constructeur par défaut /
	public function __construct($id_activite) {		//A la création d'une instance, il faudra juste renseigner l'id de l'activite pour que tout se remplisse tout seul
		include("../config/configuration.php");
		$bdd = new PDO($dsn, $user, $password);
		$requete = 'SELECT nom, description, minidesc, img, date, horaire_deb, horaire_fin FROM `activite` WHERE id_activite ='.$id_activite;
		$resultats = $bdd->query($requete);
    	$tableau = $resultats->fetch(); // Récupération des résultats
    	$resultats->closeCursor();
		$this->id_activite=$id_activite;
		$this->nom=$tableau['nom'];
		$this->description=$tableau['description'];
		$this->minidesc=$tableau['minidesc'];
		$this->img=$tableau['img'];
		$this->date=$tableau['date'];
		$this->horaireDebut=$tableau['horaire_deb'];
		$this->horaireFin=$tableau['horaire_fin'];
	}

	public function tableauParticipants() {
		include("Participant.php");
		include("function.php");
		telechargerTous($this->id_activite);
		$participants = Participant::$instances;
		// On mettra le code pour les ajouter au tableau /
	}
}
?>
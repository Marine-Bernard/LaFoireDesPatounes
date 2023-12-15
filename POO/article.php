<?php

// Classe pour stocker les pages internet /
class Article {

	// Le texte de la page /
	public $texte = "";
	public $participants = [];

	// Constructeur par défaut /
	public function __construct($texte) {
		$this->texte = $texte;
	}

	public function tableauParticipants($id_article) {
		include("../config/configuration.php");
		$bdd = new PDO($dsn, $user, $password);
		$requete = 'SELECT nom, prenom, nom_animal FROM `participants` INNER JOIN `participe` ON participe.id_participants = participants.id_participants';
		$resultats = $bdd->query($requete);
    	$this->participants = $resultats->fetchAll(); // Récupération des résultats
    	$resultats->closeCursor();
		// On mettra le code pour les ajouter au tableau /
	}
}
?>
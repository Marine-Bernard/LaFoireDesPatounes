<?php 
    include ("../config/configuration.php"); // Inclusion du fichier de configuration
    $bdd = new PDO($dsn, $user, $password); // Connexion à la base de données
    $requete = 'SELECT * FROM `activite` ORDER BY horaire_deb';
    $resultats = $bdd->query($requete);
    $Activite = $resultats->fetchAll(); // Récupération des résultats
    $resultats->closeCursor();


?>
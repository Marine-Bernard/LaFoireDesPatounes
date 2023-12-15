<?php 
    include ("config/configuration.php"); // Inclusion du fichier de configuration
    include("script/script.php"); // Inclusion du script
    $bdd = new PDO($dsn, $user, $password); // Connexion à la base de données
    // Requête pour récupérer les trois derniers articles avec leurs catégories correspondantes
    $requete = 'SELECT * FROM `activite` ORDER BY horaire_deb';
    $resultats = $bdd->query($requete);
    $Activite = $resultats->fetchAll(); // Récupération des résultats
    $resultats->closeCursor();


?>
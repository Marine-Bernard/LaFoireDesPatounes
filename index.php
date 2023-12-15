<!DOCTYPE html>

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



<html>

<head>
  <meta charset="UTF-8">
  <title>La Foire Des Patounes</title>
  <link rel="icon" type="image/x-icon" href="img/IcoClub.jpg"> <!-- changer icon -->
  <meta name="description" content="Voici la page de La Foire des Patounes ce projet a pour but de financer la SPA ! ">
  <!-- Début de la balise <meta> pour la vue mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Inclusion de votre propre fichier CSS -->
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1> Event </h1>
<div> La image </div>
<div> collonne de texte 1 </div>
<div> colonne de texte 2 </div>
<h1> 




</body>
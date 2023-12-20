<?php 
    // Cette partie sert à ajouter un participant
    include("../config/configuration.php");
    // Inclusion du fichier de configuration contenant les informations de connexion à la base de données

    $bdd = new PDO($dsn, $user, $password); // Connexion à la base de données
    // Établissement de la connexion à la base de données en utilisant les informations de configuration
    
    $id_act = $_POST["id_act"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $nom_animal = $_POST["nom_animal"];
    $description = $_POST['description'];

    // Préparation de la requête pour ajouter un participant dans la table "participant"
    $requete_preparee = $bdd->prepare('INSERT INTO participant(nom, prenom, nom_animal, info_animal) VALUES (:nom, :prenom, :nom_animal, :description)');
    
    // Association des valeurs aux paramètres de la requête préparée
    $requete_preparee->bindParam(':nom', $nom);
    $requete_preparee->bindParam(':prenom', $prenom);
    $requete_preparee->bindParam(':nom_animal', $nom_animal);
    $requete_preparee->bindParam(':description', $description);

    // Exécution de la requête préparée pour ajouter le participant
    $res = $requete_preparee->execute();

    // Récupération de l'ID du participant que vous venez de créer
    $id_participant = $bdd->lastInsertId();

    // Préparation de la requête pour ajouter la relation dans la table "participe"
    $requete_preparee = $bdd->prepare('INSERT INTO participe(Id_activite, Id_participant) VALUES (:id_activite, :id_participant)');
    
    // Association des valeurs aux paramètres de la requête préparée
    $requete_preparee->bindParam(':id_activite', $id_act);
    $requete_preparee->bindParam(':id_participant', $id_participant);

    // Exécution de la requête préparée pour ajouter la relation
    $res = $requete_preparee->execute();

    // Redirection vers la page "admin.php"
    header('Location: activite.php?id='.$id_act);
    exit();
?>

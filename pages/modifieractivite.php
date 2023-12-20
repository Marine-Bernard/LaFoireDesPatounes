<?php
    // Cette partie sert à ajouter un article
    include("../config/configuration.php");
    // Inclusion du fichier de configuration contenant les informations de connexion à la base de données
    
    $bdd = new PDO($dsn, $user, $password); // Connexion à la base de données
    // Établissement de la connexion à la base de données en utilisant les informations de configuration
    

    $id = $_POST['id'];
    $nom= $_POST["nom"]."\n";
    $description= $_POST["description"]."\n";
    $minidesc= $_POST["minidesc"]."\n";
    $img= $_POST['img']."\n";
    $date= $_POST["date"]."\n";
    $horaire_deb =$_POST["tdeb"]."\n";
    $horaire_fin =$_POST["tfin"]."\n";

    // Préparation de la requête pour ajouter un article dans la table "article"
    $requete_preparee = $bdd->prepare('UPDATE activite SET nom = :nom, description = :description, minidesc = :minidesc, img = :img, date = :date, horaire_deb = :horaire_deb, horaire_fin = :horaire_fin WHERE id_activite = :id');
    
    // Association des valeurs aux paramètres de la requête préparée
    $requete_preparee->bindParam(':id', $id);
    $requete_preparee->bindParam(':nom', $nom);
    $requete_preparee->bindParam(':description', $description);
    $requete_preparee->bindParam(':minidesc',$minidesc);
    $requete_preparee->bindParam(':img',$img);
    $requete_preparee->bindParam(':date',$date);
    $requete_preparee->bindParam(':horaire_deb',$horaire_deb);
    $requete_preparee->bindParam(':horaire_fin',$horaire_fin);


    $res=$requete_preparee->execute();
    // Exécution de la requête préparée pour ajouter l'article

    header('Location: admin.php');
    // Redirection vers la page "admin.php"
    exit();
    // Fin du script
?>
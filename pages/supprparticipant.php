<?php
include ("../config/configuration.php"); // Inclusion du fichier de configuration

$bdd = new PDO($dsn, $user, $password); // Connexion à la base de données

// Vérifier si l'id est défini et n'est pas vide
if(isset($_POST['idpart']) && !empty($_POST['idpart'])) {
    $id = $_POST['idpart'];
    echo $id;
    // Préparation de la requête pour ajouter un article dans la table "article"
    $requete_preparee= $bdd->prepare('DELETE FROM participe WHERE Id_participant = :id');
    // Association des valeurs aux paramètres de la requête préparée
    $requete_preparee->bindParam(':id', $id);
    $res=$requete_preparee->execute();
    echo "supprimé";

    $requete_preparee= $bdd->prepare('DELETE FROM participant WHERE Id_participant = :id');
    // Association des valeurs aux paramètres de la requête préparée
    $requete_preparee->bindParam(':id', $id);
    $res=$requete_preparee->execute();
    echo "supprimé";

    // Ajoutez ici le code de redirection ou d'affichage pour informer que la suppression a réussi.
} else {
    // Gérer le cas où l'id n'est pas défini ou est vide.
    echo "L'identifiant à supprimer n'est pas valide.";
}
header('Location: admin.php');
    // Redirection vers la page "admin.php"
    exit();
    // Fin du script

?>
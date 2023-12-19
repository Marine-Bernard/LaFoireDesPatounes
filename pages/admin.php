<!DOCTYPE html>

<?php 
   include ("../config/configuration.php"); // Inclusion du fichier de configuration
   $bdd = new PDO($dsn, $user, $password); // Connexion à la base de données
   $requete = 'SELECT * FROM `activite` ORDER BY horaire_deb';
   $resultats = $bdd->query($requete);
   $Activite = $resultats->fetchAll(); // Récupération des résultats
   $resultats->closeCursor();

   $nbACTIS=count($Activite);


  if(isset($_GET['idact'])){
    $idact=$_GET['idact'];
    $requete='SELECT * FROM activite WHERE Id_activite='.$idact;
    $resultats= $bdd -> query($requete);
    $act = $resultats -> fetchAll();
    $resultats -> closeCursor();


  }
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

    <h1>Les activités</h1>
    <?php if(isset($_GET['idact'])){ ?>
    <div id="infoact">
      <h2>Information sur l'activité</h2>
    
      <?php
            echo '<div> le nom de l\'activité'.$act[0]["nom"].'</div>'."\n";    
            echo '<div> La description de l\'activité'.$act[0]["description"].'</div>'."\n";   
            echo '<div> description courte'.$act[0]["minidesc"].'</div>'."\n";   
            echo '<div> date'.$act[0]["date"].'</div>'."\n";
            echo '<div> horaire deb '.$act[0]["horaire_deb"].'</div>'."\n";
            echo '<div> horaire fin '.$act[0]["horaire_fin"].'</div>'."\n";
        ?>
    </div>
    <?php } ?>


    <input type="submit" value="suppr"/>
    <input type="submit" value="modifier"/>

    
    <h2>Liste des activités</h2>
    <form method="GET">
      <select name="idact" size="5">
        <?php
          for($i=0;$i<$nbACTIS;$i++){
            echo '<option value="'.$Activite[$i]["Id_activite"].'">'.$Activite[$i]["nom"].$Activite[$i]["Id_activite"].'</option>'."\n";
          }
        ?>
      </select></br>
      <input type="submit" value="Voir Ressources">
    </form>

    <h1> De nouvelles activités</h1> 
    <!-- Ajout d'un article--> 
    <form action="ajouterarticle.php" method="POST">
      <!-- Formulaire pour ajouter un article -->
      Nom : <input type="text" name="titre" required="required" /><br/>
      Description : <input type="text" name="prix" required="required" /><br/>
      Description pour le carroussel : <input type="text" name="stock" required="required" /><br/>
      Image : <input type="file" name="img" required="required" accept="image/*"/><br/>
      Jour : <select name="id_categorie" required="required">
        <option value="Sam"> Samedi </option>
        <option value="Dim"> Dimanche </option>
      </select><br>
      Horaire de debut: <input type="time" name="tdeb" required="required"/><br/>
      Horaire de fin: <input type="time" name="tfin" required="required"/><br/>

      <br/><br/>
      <input type="submit" value="Ajouter l'activité"/>
    </form>

   <!-- modification d'un article déjà fait--> 
   
   
  </body>
</html>
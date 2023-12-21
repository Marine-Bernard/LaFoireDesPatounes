<!DOCTYPE html>

<?php 
   include ("../config/configuration.php"); // Inclusion du fichier de configuration
   include ("../script/fonction.php");
   $bdd = new PDO($dsn, $user, $password); // Connexion à la base de données
   $requete = 'SELECT * FROM `activite`';
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

  if(isset($_GET['idpart'])){
    $idpart=$_GET['idpart'];
    $requete = 'SELECT * FROM Participant INNER JOIN Participe ON Participant.Id_participant = Participe.Id_participant WHERE Id_activite='.$idpart;
    $resultats= $bdd -> query($requete);
    $part = $resultats -> fetchAll();
    $resultats -> closeCursor();

    $nbpart = count($part);

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
  <link rel="stylesheet" href="../style/styles.css">
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
            echo '<div> image'.$act[0]["img"].'</div>'."\n";   
            echo '<div> date'.$act[0]["date"].'</div>'."\n";
            echo '<div> horaire deb '.$act[0]["horaire_deb"].'</div>'."\n";
            echo '<div> horaire fin '.$act[0]["horaire_fin"].'</div>'."\n";
        ?>
    </div>
    <?php } ?>

    <form action="suppractivités.php" method="POST" >
      <input type="hidden" value="<?php echo $idact?>" name="id"/>
      <input type="submit" value="suppr"/>
    </form>
      <input type="submit" value="modifier" id="modif"/>
<!-- Formulaire pour MODIFIER un article -->
<div id="cacher" style="visibility: hidden">
    <form action="modifieractivite.php" method="POST" >
      
      <input type="hidden" value="<?php echo $idact?>" name="id"/>
      Nom : <input type="text" name="nom" required="required" value="<?php echo $act[0]["nom"]?>" onFocus="this.value='';"/><br/>
      Description : <input type="text" name="description" required="required" value="<?php echo $act[0]["description"]?>" onFocus="this.value='';"/><br/>
      Description pour le carroussel : <input type="text" name="minidesc" required="required" value="<?php echo $act[0]["minidesc"]?>" onFocus="this.value='';"/><br/>
      Image : <input type="file" name="img" accept="image/*" value="$act[0]['img']" onFocus="this.value='';"/><br/>
      Jour : <select name="date" required="required">
        <option value="2025-03-01"> Samedi </option>
        <option value="2025-03-02"> Dimanche </option>
      </select><br>
      Horaire de debut: <input type="time" name="tdeb" required="required" value="<?php echo $act[0]["horaire_deb"]?>"/><br/>
      Horaire de fin: <input type="time" name="tfin" required="required" value="<?php echo $act[0]["horaire_fin"]?>"/><br/>

      <br/><br/>
      <input type="submit" value="Modifier l'activité"/>
    </form>
</div>
    
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
    <form action="ajouteractivite.php" method="POST">
      <!-- Formulaire pour ajouter un article -->
      Nom : <input type="text" name="nom" required="required" /><br/>
      Description : <input type="text" name="description" required="required" /><br/>
      Description pour le carroussel : <input type="text" name="minidesc" required="required" /><br/>
      Image : <input type="file" name="img" required="required" accept="image/*"/><br/>
      Jour : <select name="date" required="required">
        <option value="2025-03-01"> Samedi </option>
        <option value="2025-03-02"> Dimanche </option>
      </select><br>
      Horaire de debut: <input type="time" name="tdeb" required="required"/><br/>
      Horaire de fin: <input type="time" name="tfin" required="required"/><br/>

      <br/><br/>
      <input type="submit" value="Ajouter l'activité"/>
    </form>

   <!-- suppression d'un participant--> 
   <h2>Liste des participant</h2>
   <form method="GET">
   Catégorie : <select name="idpart" required="required">
        <?php
          for($i=0;$i<$nbACTIS;$i++){
            echo '<option value="'.$Activite[$i]["Id_activite"].'">'.$Activite[$i]["nom"].$Activite[$i]["Id_activite"].'</option>'."\n";
          }
        ?>
      </select></br>
      <input type="submit" value="Voir les participants">
    </form>
      </select>

    <?php if(isset($_GET['idpart'])){ ?>
      <div id="infopart">
        <form action="supprparticipant.php" method="POST">
        <h2>Information sur les participants </h2>
        <select name="idpart" required="required">
          <?php
              for($i=0;$i<$nbpart;$i++){
                echo '<option value="'.$part[$i]["Id_participant"].'">'.$part[$i]["nom"]." ".$part[$i]["prenom"].'</option>'."\n";
              }
            ?>

          <input type="submit" value="Supprimer ce participant">
          </select>

      </div>
      </form>
    <?php } ?>

   
  </body>
</html>
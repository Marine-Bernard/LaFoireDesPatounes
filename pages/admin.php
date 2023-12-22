<!DOCTYPE html>

<?php
include("../config/configuration.php"); // Inclusion du fichier de configuration
include("../script/fonction.php");
$bdd = new PDO($dsn, $user, $password); // Connexion à la base de données
$requete = 'SELECT * FROM `activite`';
$resultats = $bdd->query($requete);
$Activite = $resultats->fetchAll(); // Récupération des résultats
$resultats->closeCursor();

$nbACTIS = count($Activite);


if (isset($_GET['idact'])) {
  $idact = $_GET['idact'];
  $requete = 'SELECT * FROM activite WHERE Id_activite=' . $idact;
  $resultats = $bdd->query($requete);
  $act = $resultats->fetchAll();
  $resultats->closeCursor();
}

if (isset($_GET['idpart'])) {
  $idpart = $_GET['idpart'];
  $requete = 'SELECT * FROM Participant INNER JOIN Participe ON Participant.Id_participant = Participe.Id_participant WHERE Id_activite=' . $idpart;
  $resultats = $bdd->query($requete);
  $part = $resultats->fetchAll();
  $resultats->closeCursor();

  $nbpart = count($part);
}
?>

<html>

<head>
  <meta charset="UTF-8">
  <title>La Foire Des Patounes</title>
  <link rel="icon" type="image/x-icon" href="../images/1x/logo noir.png"> <!-- changer icon -->
  <meta name="description" content="Voici la page de La Foire des Patounes ce projet a pour but de financer la SPA ! ">
  <!-- Début de la balise <meta> pour la vue mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Inclusion de votre propre fichier CSS -->
  <link rel="stylesheet" href="../style/styles.css">
</head>

<body>
<div class="sidenav">
    <img class="imglogo"src="../images/logo spa.svg"></br>
    <img style="background-color: #F6F5FF;" src="../images/1.svg"></br>
    <a href="../index.php"><img src="../images/2.svg"></a></br>
    <img src="../images/3.svg"></br>
    <img src="../images/4.svg"></br>
    <img src="../images/5.svg"></br>
    <img src="../images/6.svg"></br>
    <img src="../images/7.svg"></br>
    <img src="../images/8.svg"></br>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#6a1abb" fill-opacity="1" d="M0,256L30,234.7C60,213,120,171,180,165.3C240,160,300,192,360,186.7C420,181,480,139,540,117.3C600,96,660,96,720,133.3C780,171,840,245,900,245.3C960,245,1020,171,1080,154.7C1140,139,1200,181,1260,186.7C1320,192,1380,160,1410,144L1440,128L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path>
  </svg>
  <h1>Admin</h1>
  <h2 class="noir">Les participants</h2>
  <form method="GET">
    Catégorie : <select name="idpart" required="required">
      <?php
      for ($i = 0; $i < $nbACTIS; $i++) {
        echo '<option value="' . $Activite[$i]["Id_activite"] . '">' . $Activite[$i]["nom"] . $Activite[$i]["Id_activite"] . '</option>' . "\n";
      } ?>
    </select></br>
    <input type="submit" value="Voir les participants">
  </form>
  </select>

  <?php if (isset($_GET['idpart'])) { ?>
    <div id="infopart">
      <form action="supprparticipant.php" method="POST">
        <h2>Information sur les participants </h2>
        <select name="idpart" required="required">
          <?php
          for ($i = 0; $i < $nbpart; $i++) {
            echo '<option value="' . $part[$i]["Id_participant"] . '">' . $part[$i]["nom"] . " " . $part[$i]["prenom"] . '</option>' . "\n";
          } ?>
          
          <input type="submit" value="Supprimer ce participant">
        </select>

    </div>
    </form>
  <?php } ?>

  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style='margin-bottom:-2%;'>
    <path fill="#6a1abb" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
  </svg>
  <div class="violet">

    <h2>Les activités</h2>
    <form method="GET">
      <select name="idact" size="7" style="width:80%" >
        <?php
        for ($i = 0; $i < $nbACTIS; $i++) {
          echo '<option value="' . $Activite[$i]["Id_activite"] . '">' . $Activite[$i]["nom"] . $Activite[$i]["Id_activite"] . '</option>' . "\n";
        }
        ?>
      </select></br>
      <div id="envoyer">
      <input type="submit" value="Voir Ressources"></div>
    </form>
    <?php if (isset($_GET['idact'])) { ?>
      <div id="infoact">
        <h2>Information sur l'activité</h2>

        <?php
        echo '<div> le nom de l\'activité' . $act[0]["nom"] . '</div>' . "\n";
        echo '<div> La description de l\'activité' . $act[0]["description"] . '</div>' . "\n";
        echo '<div> description courte' . $act[0]["minidesc"] . '</div>' . "\n";
        echo '<div> date' . $act[0]["date"] . '</div>' . "\n";
        echo '<div> horaire deb ' . $act[0]["horaire_deb"] . '</div>' . "\n";
        echo '<div> horaire fin ' . $act[0]["horaire_fin"] . '</div>' . "\n";
        ?>
      </div>
    <?php } ?>

    <form action="suppractivités.php" method="POST">
      <div id="envoyer">
      <input type="hidden" value="<?php echo $idact ?>" name="id" />
      <input type="submit" value="suppr" /></div>
    </form>
    <h2>Modifier les activités</h2>
    <input type="submit" value="modifier" id="modif" />
    <!-- Formulaire pour MODIFIER un article -->
    <div id="cacher" style="visibility: hidden">
      <form action="modifieractivite.php" method="POST">

        <input type="hidden" value="<?php echo $idact ?>" name="id" />
        Nom : <input type="text" name="nom" required="required" value="<?php echo $act[0]["nom"] ?>" onFocus="this.value='';" /><br />
        Description : <input type="text" name="description" required="required" value="<?php echo $act[0]["description"] ?>" onFocus="this.value='';" /><br />
        Description pour le carroussel : <input type="text" name="minidesc" required="required" value="<?php echo $act[0]["minidesc"] ?>" onFocus="this.value='';" /><br />
        Jour : <select name="date" required="required">
          <option value="2025-03-01"> Samedi </option>
          <option value="2025-03-02"> Dimanche </option>
        </select><br>
        Horaire de debut: <input type="time" name="tdeb" required="required" value="<?php echo $act[0]["horaire_deb"] ?>" /><br />
        Horaire de fin: <input type="time" name="tfin" required="required" value="<?php echo $act[0]["horaire_fin"] ?>" /><br />

        <br /><br />
        <input type="submit" value="Modifier l'activité" />
      </form>
    </div>

    <h2> De nouvelles activités</h2>
    <!-- Ajout d'un article-->
    <form action="ajouteractivite.php" method="POST">
      <!-- Formulaire pour ajouter un article -->
      <div id="formleft">
      <input id="formleft" type="text" name="nom" placeholder="Nom" required="required" /><br />
      <select id="formleft" name="date" placeholder="Date" required="required">
        <option value="2025-03-01"> Samedi </option>
        <option value="2025-03-02"> Dimanche </option>
      </select><br>
      <input id="formleft" type="time" name="tdeb" placeholder="Horaire de début" class='champForm' required="required" />
      <input type="time" name="tfin" placeholder="Horaire de fin" required="required" /><br />
      </div>
      <input type="text" name="description" placeholder="Description"  style="width:80% ;" required="required" /><br />
      <input type="text" name="minidesc" placeholder="Mini-description"  style="width:80% ;" required="required" /><br />
      <br/>
      <input type="submit" value="Envoyer" />
    </form>

    <!-- suppression d'un participant-->

  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="margin-top:-0%">
    <path fill="#6a1abb" fill-opacity="1" d="M0,160L48,144C96,128,192,96,288,85.3C384,75,480,85,576,80C672,75,768,53,864,69.3C960,85,1056,139,1152,138.7C1248,139,1344,85,1392,58.7L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
  </svg>
</body>

</html>
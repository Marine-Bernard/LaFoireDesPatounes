<!DOCTYPE html>

<html>

<head>
  <meta charset="UTF-8">
  <title>La Foire Des Patounes</title>
  <link rel="icon" type="image/x-icon" href="img/IcoClub.jpg"> <!-- changer icon -->
  <meta name="description" content="Voici la page de La Foire des Patounes ce projet a pour but de financer la SPA ! ">
  <!-- Début de la balise <meta> pour la vue mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Inclusion de votre propre fichier CSS -->
  <link rel="stylesheet" href="style/styles.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



</head>

<?php



include("config/configuration.php"); // Inclusion du fichier de configuration
$bdd = new PDO($dsn, $user, $password); // Connexion à la base de données
$requete = 'SELECT * FROM `activite`';
$resultats = $bdd->query($requete);
$aff = $resultats->fetchAll(); // Récupération des résultats
$resultats->closeCursor();

$requete = 'SELECT nom, horaire_deb, horaire_fin FROM activite WHERE date ="2025-03-01" ORDER BY horaire_deb ASC';
$resultats = $bdd->query($requete);
$affjour = $resultats->fetchAll(); // Récupération des résultats
$resultats->closeCursor();

if (isset($_GET['Jour'])) {
  $jour = $_GET['Jour'];

  // Utilisation de requêtes préparées pour éviter les attaques par injection SQL
  $requete = 'SELECT nom, horaire_deb, horaire_fin FROM activite WHERE date ="' . $jour . '" ORDER BY horaire_deb ASC';
  $resultats = $bdd->query($requete);
  $affjour = $resultats->fetchAll(); // Récupération des résultats
  $resultats->closeCursor();
}
?>


<body>

  <div class="sidenav">
    <img class="imglogo"src="images/logo spa.svg"></br>
    <img style="background-color: #F6F5FF;" src="images/1.svg"></br>
    <img src="images/2.svg"></br>
    <img src="images/3.svg"></br>
    <img src="images/4.svg"></br>
    <img src="images/5.svg"></br>
    <img src="images/6.svg"></br>
    <img src="images/7.svg"></br>
    <img src="images/8.svg"></br>
  </div>
  <div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#6a1abb" fill-opacity="1" d="M0,256L30,234.7C60,213,120,171,180,165.3C240,160,300,192,360,186.7C420,181,480,139,540,117.3C600,96,660,96,720,133.3C780,171,840,245,900,245.3C960,245,1020,171,1080,154.7C1140,139,1200,181,1260,186.7C1320,192,1380,160,1410,144L1440,128L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path>
    </svg>

    <h1> Event </h1>
    <div> La image </div>
    <img src="" alt="Yoyoyoyo je suis l'image de l'event">
    <div> colonne de texte 1 </div>
    <div> colonne de texte 2 </div>


      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style='margin-bottom:-2%;'>
        <path fill="#6a1abb" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      </svg>
      <div class="violetcarrousel">
        <ul id="c">
          <?php
          foreach ($aff as $value) {
            echo '<li> <h3><strong>' . $value["nom"] . '</strong></h3><h3>' . $value["minidesc"] . '</h3></li>';
          }
          ?>
        </ul>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="margin-top:-1.2%">
        <path fill="#6a1abb" fill-opacity="1" d="M0,160L48,144C96,128,192,96,288,85.3C384,75,480,85,576,80C672,75,768,53,864,69.3C960,85,1056,139,1152,138.7C1248,139,1344,85,1392,58.7L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
      </svg>
      <div>
        <form method="GET">
          <input type="radio" name="Jour" id="Samedi" value="2025-03-01" />
          <label for="Samedi">Samedi</label>
          <input type="radio" name="Jour" id="Dimanche" value="2025-03-02" />
          <label for="Dimanche">Dimanche</label>
          <input type="submit" value="Selection du jour">
        </form>
        <table style="margin-bottom:4%;">
          <thead>
            <tr>
              <th>Horaire</th>
              <th>Activités</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($affjour as $value) {
              echo '<tr><td>' ."De ". $value['horaire_deb'] ." à ". $value['horaire_fin'] . ' </td> <td>' . $value['nom'] . '</td></tr>';
            }
            ?>
          </tbody>
        </table>

      </div>


      <?php
      include('script/carrousel.php');

      ?>
</body>
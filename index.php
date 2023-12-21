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



include ("config/configuration.php"); // Inclusion du fichier de configuration
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
  $requete = 'SELECT nom, horaire_deb, horaire_fin FROM activite WHERE date ="'.$jour.'" ORDER BY horaire_deb ASC';
  $resultats = $bdd->query($requete);
  $affjour = $resultats->fetchAll(); // Récupération des résultats
  $resultats->closeCursor();
  }

  echo $aff[0][1];
?>


<body>

<div class="sidenav">
  <h3 >Menu</h3>
  <a href="#" >Link 1</a>
  <a href="#">Link 2</a>
  <a href="#">Link 3</a>
</div>
<div class="blanc">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" >
  <path fill="#6a1abb" fill-opacity="1" d="M0,256L30,234.7C60,213,120,171,180,165.3C240,160,300,192,360,186.7C420,181,480,139,540,117.3C600,96,660,96,720,133.3C780,171,840,245,900,245.3C960,245,1020,171,1080,154.7C1140,139,1200,181,1260,186.7C1320,192,1380,160,1410,144L1440,128L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path>
  </svg>

  <h1> Event </h1>
  <div> La image </div>
  <img src="" alt="Yoyoyoyo je suis l'image de l'event">
  <div> colonne de texte 1 </div>
  <div> colonne de texte 2 </div>
  <h1> 
<div>
<div class="violet">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" >
  <path fill="#F6F5FF" fill-opacity="1" d="M0,256L30,234.7C60,213,120,171,180,165.3C240,160,300,192,360,186.7C420,181,480,139,540,117.3C600,96,660,96,720,133.3C780,171,840,245,900,245.3C960,245,1020,171,1080,154.7C1140,139,1200,181,1260,186.7C1320,192,1380,160,1410,144L1440,128L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path>
  </svg>
</div>

<ul id="c">
    <?php
    foreach ($aff as $value) {
      echo '<li> <p><strong>'. $value["nom"].'</strong></p><p>'. $value["minidesc"].'</p></li>';
    }
    ?>
  </ul>
<div class="tableau">
  <form method="GET">
        <input type="radio" name="Jour" id="Samedi" value="2025-03-01" />
        <label for="Samedi">Samedi</label> 
        <input type="radio" name="Jour" id="Dimanche" value="2025-03-02"/>
        <label for="Dimanche">Dimanche</label> 
     <input type="submit" value="Selection du jour">
    </form>
<table >

<thead>
    <tr>
      <th>L'horraire</th>
      <th>L'activités</th>
    </tr>
  </thead>
  <tbody>
<?php
foreach ($affjour as $value) {
			echo '<tr><td>'.$value['horaire_deb'].$value['horaire_fin']. ' </td> <td>' . $value['nom'] . '</td></tr>';
		
    
		}
    ?>
  </tbody>


</table>

</div>


    <?php
    include('script/carrousel.php');

    ?>
</body>

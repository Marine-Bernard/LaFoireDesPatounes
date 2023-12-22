<?php
include("../POO/Activite.php");;

// Requête SQL pour sélectionner l'article en fonction de son ID
$id = $_GET["id"];
$page = new Activite($id);
?>

<!-- Début du code HTML -->

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

  <title><?php
          // Afficher le nom de l'article dans le titre de la page
          echo $page->nom;
          ?></title>
  <?php include("../script/fonction.php"); ?>
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
  <h1>
    <?php echo $page->nom ?>
  </h1>


  <div>
    <img src="../images/<?php echo $page->img ?>" class="baniere"/>
  </div>

  <div> <?php echo $page->description ?> </div>

  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style='margin-bottom:-2%;'>
    <path fill="#6a1abb" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
  </svg>
  <div class="violet">
    <h2> Liste des participants </h2>

    <table class="listetable">
      <thead>
        <tr>
          <th>L'humain</th>
          <th>L'animal</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $page->tableauParticipants()
        ?>
      </tbody>
    </table>
    <h2> Ajout participant </h2>

    <!-- Ajout d'un article-->
    <form action="ajouterparticipant.php" method="POST">
      <!-- Formulaire pour ajouter un article -->
      <div id="formleft">
        <input type="hidden" value="<?php echo $id ?>" name="id_act" />
        <input id="formleft" type="text" name="nom" placeholder="Votre nom" required="required" /><br />
        <input id="formleft" type="text" name="prenom" placeholder="Votre prénom" required="required" /><br />
        <input id="formleft" type="text" name="nom_animal" placeholder="Le nom de votre animal" required="required" /><br />
      </div>
      <textarea type="texte" name="description" placeholder="Dites-nous en plus sur lui" style="width:80% ; height: 20%;" required="required"></textarea><br />
      <br />
      <div id="envoyer">
        <input type="submit" value="S'inscrire" />
      </div>
    </form>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="margin-top:-1.2%">
    <path fill="#6a1abb" fill-opacity="1" d="M0,160L48,144C96,128,192,96,288,85.3C384,75,480,85,576,80C672,75,768,53,864,69.3C960,85,1056,139,1152,138.7C1248,139,1344,85,1392,58.7L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
  </svg>

</body>

</html>

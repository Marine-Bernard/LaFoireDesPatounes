<?php
include("../POO/Activite.php");
;

// Requête SQL pour sélectionner l'article en fonction de son ID
$id=$_GET["id"];
$page = new Activite($id);
?>

<!-- Début du code HTML -->

<html>
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Marine Bernard">
    <link rel="stylesheet" href="../css/style.css">
    <html lang="fr">
    <title><?php
      // Afficher le nom de l'article dans le titre de la page
      echo $page->nom;
      ?></title>
     <?php include("../script/fonction.php");?> 
  </head>
  
  <body>
    <h1>  
      <?php echo $page->nom ?>
    </h1>


    <div>
      la y'aura l'image mais bon toi même tu sais ca vient après
      <?php echo $page->img ?>
    </div>

  <div> <?php echo $page->description ?> </div>

    <h1> Liste des participant </h1>

    <table>
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
    <table>
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

<h1> Ajout participant </h1>

<h1> Ajout participant </h1>

<!-- Ajout d'un article--> 
<form action="ajouterparticipant.php" method="POST">
      <!-- Formulaire pour ajouter un article -->
      <div id="formleft">
        <input type="hidden" value="<?php echo $id?>" name="id_act"/>
        Votre nom : <input id="formleft" type="text" name="nom" required="required" /><br/>
        Votre prénom : <input id="formleft" type="text" name="prenom" required="required" /><br/>
        Nom de l'animal: <input id="formleft" type="text" name="nom_animal" required="required" /><br/>
      Description de l'animal : </div>
      <textarea type="texte" name="description" style="width:80% ; height: 20%;" required="required"></textarea><br/>
  
      <br/><br/>
      <div id="envoyer">
      <input type="submit" value="S'inscrire"/>
      </div>
    </form>
  </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="margin-top:-1.2%">
      <path fill="#6a1abb" fill-opacity="1" d="M0,160L48,144C96,128,192,96,288,85.3C384,75,480,85,576,80C672,75,768,53,864,69.3C960,85,1056,139,1152,138.7C1248,139,1344,85,1392,58.7L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
    </svg>

</body>
</html>
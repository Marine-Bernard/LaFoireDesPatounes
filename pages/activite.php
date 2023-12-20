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

<h1> Ajout participant </h1>

<!-- Ajout d'un article--> 
<form action="ajouterparticipant.php" method="POST">
      <!-- Formulaire pour ajouter un article -->
      <input type="hidden" value="<?php echo $id?>" name="id_act"/>
      Votre nom : <input type="text" name="nom" required="required" /><br/>
      Votre prénom : <input type="text" name="prenom" required="required" /><br/>
      Nom de l'animal: <input type="text" name="nom_animal" required="required" /><br/>
      Description de l'animal : <input type="texte" name="description" required="required"><br/>
  
      <br/><br/>
      <input type="submit" value="S'inscrire"/>
    </form>

</body>
</html>
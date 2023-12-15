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
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
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
  </body>
</html>
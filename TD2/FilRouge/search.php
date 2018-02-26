<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
     <title> Rechercher un film </title>
</head>
<body>

  <!--formulaire pour rechercher un film dans data.movies.php-->
  <form method="GET" action="movies.php">
    <input placeholder="Titre" required="required" name="titre" type="text">
    <input placeholder="Date de sortie" required="required" name="date" type="text">
    <select name="genre">

<?php

include 'data.movies.php';

  sort($genres);
  $texte = null;
  foreach($genres as $genre) {
    $texte = $texte ."<option value='{$genre}'>{$genre}</option>";
  }
  echo $texte;

 ?>
    <input placeholder="Cast" required="required" name="cast" type="text">
    <input value="Rechercher" type="submit">
  </form>

</body>
</html>

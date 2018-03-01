<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
     <link rel="stylesheet" type="text/css" href="style.css">
     <title> Rechercher un film </title>
</head>
<body>
  <h1 id="recherche">Rechercher un film</h1>

  <!--formulaire pour rechercher un film dans data.movies.php-->
  <form method="GET" action="movies.php"></br>
    <input placeholder="Titre" name="titre" type="text"></br>
    <input placeholder="Date de sortie" name="date" type="text"></br>

<?php

include 'data.movies.php';

  sort($genres); //ordonne les élements de $genres dans l'ardre alphabétique
  $texte = null;
  foreach($genres as $genre) {
    $texte = $texte ."<input type='radio' name='genre' value='{$genre}'>{$genre}</br>"; //radio : n'accepte qu'une seule case cochée
  }
  echo $texte;

 ?>
    <input placeholder="Cast" name="cast" type="text">
    <input value="Rechercher" type="submit">
  </form>

</body>
</html>

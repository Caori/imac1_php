
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
     <title> Recherche </title>
</head>
<body>

  <h1>Rechercher un film</h1>

  <!--formulaire pour rechercher un film-->
  <form method="GET" action="results.php"></br>
    <input placeholder="Titre" name="titre" type="text"></br>
    <input placeholder="Date de sortie min" name="datemin" type="text"></br>
    <input placeholder="Date de sortie max" name="datemax" type="text"></br>
<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "./genre/Genre.class.php";


$genres = Genre::getAll();
$texte = null;
foreach($genres as $genre) {
  $texte = $texte ."<input type='radio' name='genre' value='{$genre->name}'>{$genre->name}</br>";
}
echo $texte;

?>

  <input placeholder="Cast" name="cast" type="text">
    <input value="Rechercher" type="submit">
  </form>

</body>
</html>

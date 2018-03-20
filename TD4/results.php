<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
     <title> Recherche </title>
</head>
<body>

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once "/var/www/html/imac1_php/TD4/pdo/MyPDO.imac_movies.include.php";
require_once "./search.php";
require_once "./movie/Movie.class.php";


$titre = $_GET["titre"];
$datemin = $_GET["datemin"];
$datemax = $_GET["datemax"];
$genre = $_GET["genre"];
//$cast = $_GET["cast"];

if($genre == null) {
  echo "Il faut choisir un genre ! </br>";
  die();
}
//appel fonction pour récupérer les films correspondants
$films = searchMovies($titre, $datemin, $datemax, $genre);

  //si searchMovies() n'a renvoyé aucun film
 if($films == null) {
   echo "Aucun résultat. Sorry not sorry</br>";
 }
 else {
   //affichage des résultats
   foreach($films as $film) {
     echo <<<HTML
     <div class='item'>

         <strong>{$film->getTitle()} ({$film->getReleaseDate()}) </strong>
     </div>
HTML;
   }
 }

?>

</div>

<!--Lien pour revenir au formulaire de recherche!-->
<a href="./search.php">&larr; Retour au formulaire</a>

</body>
</html>

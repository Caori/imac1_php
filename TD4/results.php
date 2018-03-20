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

function searchMovies($titre, $datemin, $datemax, $genre, $cast) {
  $cmd = "SELECT * FROM Movie m, Genre g, MovieGenre mg, Cast c, Actor a, Director d ";
  $results = array();
  if($titre != null) {
    $cmd .= "WHERE m.title LIKE '%$titre%' ";
  }
  if($datemin != null) {
    if($titre == null) {
      $cmd .= "WHERE m.releaseDate >= '$datemin' ";
    }
    else $cmd .= "AND m.releaseDate >= '$datemin' ";
  }
  if($datemax != null) {
    if($titre == null && $datemin == null) {
      $cmd .= "WHERE m.releaseDate <= '$datemax' ";
    }
    else $cmd .= "AND m.releaseDate <= '$datemax' ";
  }
  if($genre != null) {
    if($titre == null && $datemin == null && $datemax == null) {
      $$cmd .= "WHERE mg.idMovie = m.id AND mg.idGenre = g.id
      AND g.name LIKE '$genre' ";
    }
    else $cmd .= "AND mg.idMovie = m.id AND mg.idGenre = g.id
    AND g.name LIKE '$genre' ";
  }
  /*if($cast != null) {
    if($titre == null && $datemin == null && $datemax == null && $genre == null) {
      $cmd .= "WHERE ((c.id = a.idActor AND m.id = a.idMovie
            AND (c.firstname LIKE '$cast' OR c.lastname LIKE '$cast'))
          OR (c.id = d.idDirector AND m.id = d.idMovie
                AND (c.firstname LIKE '$cast' OR c.lastname LIKE '$cast')))";
    }
    else $cmd .= "AND ((c.id = a.idActor AND m.id = a.idMovie
          AND (c.firstname LIKE '$cast' OR c.lastname LIKE '$cast'))
        OR (c.id = d.idDirector AND m.id = d.idMovie
              AND (c.firstname LIKE '$cast' OR c.lastname LIKE '$cast')))";
  }*/
  $cmd .= "ORDER BY m.title;";
  $stmt = MyPDO::getInstance()->prepare($cmd);
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_CLASS, "Movie");
  if (($object = $stmt->fetchAll()) !== false)
    return $object;
}

$titre = $_GET["titre"];
$datemin = $_GET["datemin"];
$datemax = $_GET["datemax"];
$genre = $_GET["genre"];
$cast = $_GET["cast"];

if($genre == null) {
  echo "Il faut choisir un genre ! </br>";
  die();
}
//appel fonction pour récupérer les films correspondants
$films = searchMovies($titre, $datemin, $datemax, $genre, $cast);

  //si searchMovies() n'a renvoyé aucun film
 if($films == null) {
   echo "Aucun résultat. Sorry not sorry</br>";
 }
 else {
   //affichage des résultats
   foreach($films as $film) {
     echo <<<HTML
     <div class='item'>
       <a href="./movie/movie.php?id={$film->getId()}">
         <strong>{$film->getTitle()} </a>
           ({$film->getReleaseDate()}) </strong>
     </div>
HTML;
   }
 }

?>

//</div>

<!--Lien pour revenir au formulaire de recherche!-->
<a href="./search.php">&larr; Retour au formulaire</a>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
     <link rel="stylesheet" type="text/css" href="movies.css">
     <title> Liste de films </title>
</head>
<body>

  <h1>Liste de films</h1>
  <div id='list'>

<?php

require_once "Movie.class.php";

$allMovies = Movie::getAll(); //instanciation de tous les casts


//affichage des résultats
foreach($allMovies as $movie) {
  $id = $movie->id;
  $titre = $movie->title;
  //$nom = $movie->lastname;
  echo <<<HTML
  <div class='item'>
    <a href="movie.php?id=$id"><strong>$titre </strong></a>
  </div>
HTML;
}

?>

  </div>
</body>
</html>

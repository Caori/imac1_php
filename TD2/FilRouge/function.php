<?php

require_once 'data.movies.php';
include 'search.php';

function searchMovies($movies, $titre, $date, $genre, $cast) {
  $results = array(); //tableau dans lequel on mettra les films qu'on veut renvoyer
  //si au moins un champs est rempli
  if($titre != null || $date != null || $genre != null || $cast != null) {
    foreach($movies as $movie) {
      //si les infos dans les champs correspondent à un film dans $movies OU champ vide
      if((strcmp($movie["title"], $titre) == 0 || $titre == null)
      && (strcmp($movie["releaseDate"], $date) == 0 || $date == null)
      && (strcmp($movie["genre"], $genre) == 0 || $genre == null)
      && (strcmp($movie["director"], $cast) == 0 || $cast == null)) {
        array_push($results, $movie); //on met ce film dans $results
      }
    }
    return $results;
  }
  else {
    echo "Il manque quelque chose dans le formulaire.</br>";
  }
}

?>

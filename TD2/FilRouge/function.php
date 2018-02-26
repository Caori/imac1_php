<?php

include 'data.movies.php';
include 'search.php';

function searchMovies($titre, $date, $genre, $cast) {
  $i = 0;
  $films = array();
  //si tous les champs du formulaire sont remplis
    foreach ($movies as $movie) { //parcourt la liste de films
      if($titre != null) {
        if(strcmp($movie["title"], $titre) != 0)
          continue;
      }
      if($date != null) {
        if(strcmp($movie["releaseDate"], $date) != 0)
          continue;
      }
      if($genre != null) {
        if(strcom($movie["genre"], $genre) != 0)
          continue;
      }
      if($cast != null) {
        if(strcmp($movie["director"], $cast) != 0)
          continue;
      }
      array_push($films, $movie);
      echo "Film ajouté à la liste.";
    }
      return $films;
  }

?>

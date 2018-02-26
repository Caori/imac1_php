<?php

require_once 'data.movies.php';
include 'search.php';

function searchMovies($titre, $date, $genre, $cast) {
  $results = array();
  echo "$titre $date $genre $cast </br>";
  echo $movies[1]; // affiche rien ???
  if($titre != null && $date != null && $genre != null && $cast != null) {
    echo "pas null</br>";
    foreach($movies as $movie) { //parcourt la liste de films
      echo "dans la boucle</br>"; //s'affiche pas, donc on entre jamais dans la boucle ???
      if(strcmp($movie["title"], $titre) == 0 &&
      strcmp($movie["releaseDate"], $date) == 0 &&
      strcom($movie["genre"], $genre) == 0 &&
      strcmp($movie["director"], $cast) == 0) {
        array_push($results, $movie);
        echo "Film ajouté à la liste.</br>";
      }
    }
  return $results;
  }
}

?>

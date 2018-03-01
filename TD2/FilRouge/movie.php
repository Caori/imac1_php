<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
     <link rel="stylesheet" type="text/css" href="styleresults.css">
     <title> Résultats </title>
</head>
<body>
<h1>Résultats</h1>

<div id="list">
<?php

include 'Movie.class.php';
include 'data.movies.php';

//met l'id entré dans l'url dans variable $id
$id = $_GET["id"];
$filmTrouve = null;

//parcourt le tableau $movies
foreach ($movies as $movie) {
  if($movie["id"] == $id) {
    $filmTrouve = $movie;
  }
}

if($filmTrouve != null) {
  $title = $filmTrouve["title"];
  $date = $filmTrouve["releaseDate"];
  $genre = $filmTrouve["genre"];
  $director = $filmTrouve["director"];

  //instanciation objet Movie
  $film = new Movie($id, $title, $date, $genre, $director);

  //appel fonction pour afficher les attributs du film
  $film->renderHTML();
}
else echo "Aucun film ne correspond à cet id.</br>";

?>

</div>

</body>
</html>

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

include 'function.php';
include 'data.movies.php';

$titre = $_GET["titre"];
$date = $_GET["date"];
$genre = $_GET["genre"];
$cast = $_GET["cast"];

//appel fonction pour récupérer les films correspondants
$films = searchMovies($movies, $titre, $date, $genre, $cast);

  //si searchMovies() n'a renvoyé aucun film
 if($films == null) {
   echo "Aucun résultat. Sorry not sorry</br>";
 }
 else {
   //affichage des résultats
   foreach($films as $film) {
     echo <<<HTML
     <div class='item'>
       <strong>{$film["title"]} ({$film["releaseDate"]}) : </strong>
        <ul>
          <li>Genre: {$film["genre"]}</li>
          <li>Director: {$film["director"]}</li>
        </ul>
     </div>
HTML;
   }
 }

?>
</div>

<a href="./search.php">&larr; Retour au formulaire</a>

</body>
</html>

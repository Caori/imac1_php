<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
     <title> Résultats </title>
</head>
<body>
<h1>Résultats</h1>
<?php

include 'function.php';
include 'data.movies.php';

$titre = $_GET["titre"];
$date = $_GET["date"];
$genre = $_GET["genre"];
$cast = $_GET["cast"];
$films = searchMovies($titre, $date, $genre, $cast);
 var_dump($films);

 if($films == null) {
   echo "Rien du tout !";
 }
 else echo $films;
?>
<a href="./search.php">Retour au formulaire de recherche</a>

</body>
</html>

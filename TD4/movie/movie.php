<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
     <link rel="stylesheet" type="text/css" href="movies.css">
     <title> Movie Details </title>
</head>
<body>

  <h1>Details sur le film</h1>

<?php

require_once "Movie.class.php";
require_once "../cast/Cast.class.php";

//met l'id entré dans l'url dans variable $id
$id = $_GET["id"];

try { //on tente l'instanciation du film correspondant
  $filmTrouve = Movie::createFromId($id);
}
catch(Exception $e) { //si createFromId() renvoie une exception
  //si l'id entrée dans l'url n'existe pas dans la BDD
  echo "{$e->getMessage()}</br>
  <a href='movies.php'>&larr; Retour à la liste des films</a>";
  die(); //on arrête le script
}

//s'il n'y a pas eu d'exception
$titre = $filmTrouve->getTitle();
$dateSortie = $filmTrouve->getReleaseDate();

$output = <<<HTML
  <p><strong>Titre :</strong> $titre </p>
  <p><strong>Date de sortie :</strong> $dateSortie </p>
HTML;

echo $output;

//on obtient la liste des personnes qui ont réalisé le film
$listeReals = Cast::getDirectorsFromMovieId($id);
if(sizeof($listeReals) > 0) {
  echo "<p><strong>Réalisateur(s) :</strong></p>";
  foreach($listeReals as $real) {
    $idReal = $real->getId();
    $prenomReal = $real->getFirstName();
    $nomReal = $real->getLastName();
    echo "<p><a href='../cast/cast.php?id=$idReal'>
    $prenomReal $nomReal </a></p>";
  }
}

//on obtient la liste des personnes qui ont joué dans le film
$listeActeurs = Cast::getActorsFromMovieId($id);
if(sizeof($listeActeurs) > 0) {
  echo "<p><strong>Acteur(s) :</strong></p>";
  foreach($listeActeurs as $acteur) {
    $idAct = $acteur->getId();
    $prenomAct = $acteur->getFirstName();
    $nomAct = $acteur->getLastName();
    $role = $acteur->name;
    echo "<p><a href='../cast/cast.php?id=$idAct'>
    $prenomAct $nomAct</a>, dans le rôle de : $role</p>";
  }
}

?>
<a href="movies.php">&larr; Retour à la liste des films</a>

</body>
</html>

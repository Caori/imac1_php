<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
     <link rel="stylesheet" type="text/css" href="casts.css">
     <title> Détails sur le membre du cast </title>
</head>
<body>

  <h1>Détails sur le membre du cast</h1>

<?php

require_once "Cast.class.php";
require_once "../movie/Movie.class.php";

//met l'id entré dans l'url dans variable $id
$id = $_GET["id"];

try { //on tente l'instanciation du cast correspondant
  $castTrouve = Cast::createFromId($id);
}
catch(Exception $e) { //si createFromId() renvoie une exception
  //si l'id entrée dans l'url n'existe pas dans le BDD
  echo "{$e->getMessage()}</br>
  <a href='casts.php'>&larr; Retour à la liste du cast</a>";
  die(); //on arrête le script
}

//s'il n'y a pas eu d'exception
$id = $castTrouve->getId();
$nom = $castTrouve->getLastName();
$prenom = $castTrouve->getFirstName();
$dateNaissance = $castTrouve->getBirthYear();
$dateMort = $castTrouve->getDeathYear();

echo <<<HTML
    <p><strong>Nom :</strong> $nom </p>
    <p><strong>Prénom :</strong> $prenom </p>
    <p><strong>Date de naissance :</strong> $dateNaissance </p>
HTML;

if($castTrouve->isAlive() == false) { //si cast mort
  echo "<p><strong>Date de décès :</strong> $dateMort </p>";
}


//on obtient la liste des films réalisés par la personne
$listeFilmsFaits = Movie::getFromDirectorId($id);
if(sizeof($listeFilmsFaits) > 0) {
  echo "<p><strong>Film(s) réalisé(s) :</strong></p>";
  foreach($listeFilmsFaits as $film) {
    $idFilm = $film->getId();
    $titreFilm = $film->getTitle();
    $dateFilm = $film->getReleaseDate();
    echo "<p><a href='../movie/movie.php?id=$idFilm'>$titreFilm</a> ($dateFilm)</p>";
  }
}

//on obtient la liste des films ou la personne a joué
$listeFilmsJoues = Movie::getFromActorId($id);
if(sizeof($listeFilmsJoues) > 0) {
  echo "<p><strong>Film(s) joué(s) :</strong></p>";
  foreach($listeFilmsJoues as $filmJ) {
    $idFilmJ = $filmJ->getId();
    $titreFilmJ = $filmJ->getTitle();
    $dateFilmJ = $filmJ->getReleaseDate();
    $role = $filmJ->name;
    echo "<p><a href='../movie/movie.php?id=$idFilmJ'>$titreFilmJ</a>
     ($dateFilmJ) : $role</p>";
  }
}


?>
<a href="casts.php">&larr; Retour à la liste du cast</a>

</body>
</html>

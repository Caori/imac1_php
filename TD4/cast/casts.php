<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
     <link rel="stylesheet" type="text/css" href="casts.css">
     <title> Membres du cast </title>
</head>
<body>

  <h1>Membres du cast</h1>
  <div id='list'>

<?php

require_once "Cast.class.php";

$allCast = Cast::getAll(); //instanciation de tous les casts


//affichage des résultats
foreach($allCast as $cast) {
  $id = $cast->id;
  $prenom = $cast->firstname;
  $nom = $cast->lastname;
  echo <<<HTML
  <div class='item'>
    <a href="cast.php?id=$id"><strong>$prenom $nom </strong></a>
  </div>
HTML;
}

?>

  </div>
</body>
</html>

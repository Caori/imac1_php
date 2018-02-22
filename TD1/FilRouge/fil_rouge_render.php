<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
     <link rel="stylesheet" type="text/css" href="style.css">
     <title> Plein de films ! </title>
</head>
<body>

<?php

include 'data_movies.php';


function render_movie_list($movie, $genre, $age) { //affiche les films correspondant aux paramètres
  $bool = 0; //variable qui servira a vérifier si des films correspondent
  foreach ($movie as $key => $value) {
    if($value["genre"] == $genre && $value["year"] == date("Y") - $age) {
      $bool = 1;
      echo <<<HTML
      <div class='item'>
        <li><strong>{$value["title"]} ({$value["year"]}) : </strong>
          <ul>
            <li>Genre: {$value["genre"]}</li>
            <li>Director: {$value["director"]}</li>
          </ul>
        </li>
HTML;
      echo "</div>"; //ferme balise <div class="item">
    }
  }
  if($bool == 0) {
    echo "Il n'y a rien ici !\n";
  }
}

//partie affichage
echo "<h1>Liste de films trop swag</h1>
<ul id='list'>"; //titre et ouverture de la liste principale

render_movie_list($movies, "Drama", 0); //exemple : demande d'afficher tous les films de Drama qui ont 0 ans (sortis en 2018)

echo "</ul>"; //ferme la liste princiale

?>

</body>
</html>

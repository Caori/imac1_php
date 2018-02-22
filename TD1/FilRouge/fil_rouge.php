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

//partie affichage
echo "<h1>Liste de films trop swag</h1>
<ul id='list'>"; //titre et ouverture de la liste principale

foreach ($movies as $key => $value) { //parcourt la liste de films
  if($value["genre"] == "Science Fiction") { //si le films a pour genre "Science Fiction"
  $films = <<<HTML
  <div class='item red'>
    <li><strong>{$value["title"]} ({$value["year"]}) : </strong>
      <ul>
        <li>Genre: {$value["genre"]}</li>
        <li>Director: {$value["director"]}</li>
      </ul>
    </li>
HTML;
  }
  else {
    $films = <<<HTML
    <div class='item'>
      <li><strong> {$value["title"]} ({$value["year"]}) : </strong>
        <ul>
          <li>Genre: {$value["genre"]}</li>
          <li>Director: {$value["director"]}</li>
        </ul>
      </li>
HTML;
  }

  echo $films; //affiche les informations sur le film lu par la boucle

  if ($value["year"] > date("Y") - 10 ) { //si le film a moins de 10 ans
    echo "<em>Ce film a moins de 10 ans.</em>";
  }
  echo "</div>"; //ferme balise <div class="item"> ou <div class="item red">
}

echo "</ul>"; //ferme la liste princiale

?>

</body>
</html>

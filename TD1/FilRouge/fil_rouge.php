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

echo "<h1>Liste de films trop swag</h1>
<ul>";

foreach ($movies as $key => $value) {
  if($value["genre"] == "Science Fiction") {
  $films = <<<HTML
    <li><div class="red">{$value["title"]} ({$value["year"]}) : </div>
      <ul>
        <li>Genre: {$value["genre"]}</li>
        <li>Director: {$value["director"]}</li>
      </ul>
    </li>
HTML;
  }
  else {
    $films = <<<HTML
      <li>{$value["title"]} ({$value["year"]}) :
        <ul>
          <li>Genre: {$value["genre"]}</li>
          <li>Director: {$value["director"]}</li>
        </ul>
      </li>
HTML;
  }

echo $films;
}

echo "</ul>"

?>

</body>
</html>

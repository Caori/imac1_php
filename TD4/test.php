<?php

require_once "./cast/Cast.class.php";

error_reporting(E_ALL);
ini_set("display_errors", 1);

$cast = Cast::createFromId(3); //instanciation de l'élément cast dont l'id est 3

//test des fonctions get
echo "Id : {$cast->getId()} <br>
     First name : {$cast->getFirstname()} </br>
     Last name : {$cast->getLastname()} </br>
     Birth year : {$cast->getBirthYear()} </br>
     Death year : {$cast->getDeathYear()} </br>";

//test fonction isAlive()
$theyAlive = $cast->isAlive();

var_dump($theyAlive); //stanley est mort donc renvoie false

//test fonction getAll()
$allCast = $cast->getAll();
foreach($allCast as $result) {
  echo "</br> {$result->id}, {$result->firstname}, {$result->lastname},
   {$result->birthYear}, {$result->deathYear}</br>";
}

/*$stmt = MyPDO::getInstance()->prepare(<<<SQL
	SELECT *
	FROM Cast
	ORDER BY lastname, firstname
SQL
);

$stmt->execute();

while (($row = $stmt->fetch()) !== false) {
	echo "<div>{$row['lastname']}</div>";
}*/

?>

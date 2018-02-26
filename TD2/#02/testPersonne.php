<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
     <title> Test Personne </title>
</head>
<body>

<?php

require_once "Personne.class.php";

//nouvelle instance de Personne
$personne1 = new Personne("Jon", "Snow", 18, "Winterfell");

$personne1->afficher();

//tableau de plusieurs instances de Personne
$personnes = array(
  $personne2 = new Personne("Arya", "Stark", 14, "Winterfell"),
  $personne3 = new Personne("Tyrion", "Lannister", 32, "King's Landing"),
  $personne4 = new Personne("Danaerys", "Targaryen", 16, "Winterfell")
);

//affiche les attributs des Personnes une par une
foreach($personnes as $value) {
   $value->afficher();
}

?>

</body>
</html>

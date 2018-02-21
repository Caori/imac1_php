<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
     <title> Exo 2 </title>
</head>
<body>

<?php

// Exercices sur les chaînes de caractère

     $prenom = "Solane";
     $nom = "Genevaux";
     $ville = "Tournefeuille";
     $age = 20;

if ($age == 1) {
     echo "<div>Bonsoir, je m'appelle $prenom $nom, je viens de $ville et j'ai $age an.</div>";
}
else {
     echo "<div>Bonsoir, je m'appelle $prenom $nom, je viens de $ville et j'ai $age ans.</div>";
}

$personne1 = array(
  "prenom" => "John",
  "nom" => "Egbert",
  "ville" => "LOWAS",
  "age" => 14
);

$personne2["prenom"] = "Jade";
$personne2["nom"] = "Harley";
$personne2["ville"] = "LOFAF";
$personne2["age"] = 15;

$personne3 = array(
  "prenom" => "Dave",
  "nom" => "Strider",
  "ville" => "LOHAC",
  "age" => 14
);

//var_dump($personne2);

if ($personne["age"] == 1) {
     echo "<div>Bonsoir, je m'appelle {$personne2["prenom"]} {$personne2["nom"]}, je viens de
     {$personne2["ville"]} et j'ai {$personne2["age"]} an.</div>";
}
else {
     echo "<div>Bonsoir, je m'appelle {$personne2["prenom"]} {$personne2["nom"]}, je viens de
     {$personne2["ville"]} et j'ai {$personne2["age"]} ans.</div>";
}

// Exercices sur les boucles

$week = ["Lundi", "Mardi", "Mercredi", "Jeudimac", "Vendredi", "Samedi", "Dimanche"];

foreach ($week as $key => $value) {
  echo "$value <br>";
}

$personnes = [$personne1, $personne2, $personne3];

if (empty($personnes)) {
  echo "Il n'y a personne :'(";
}
else {
  foreach ($personnes as $key => $value) {
    echo "{$value["prenom"]} {$value["nom"]}, vit sur {$value["ville"]}, {$value["age"]} ans.<br>";
  }
}

?>


</body>
</html>

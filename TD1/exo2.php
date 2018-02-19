<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
     <title> Exo 2 </title>
</head>
<body>

<?php
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

//var_dump($personne2);

if ($personne["age"] == 1) {
     echo "<div>Bonsoir, je m'appelle {$personne2["prenom"]} {$personne2["nom"]}, je viens de
     {$personne2["ville"]} et j'ai {$personne2["age"]} an.</div>";
}
else {
     echo "<div>Bonsoir, je m'appelle {$personne2["prenom"]} {$personne2["nom"]}, je viens de
     {$personne2["ville"]} et j'ai {$personne2["age"]} ans.</div>";
}


?>


</body>
</html>

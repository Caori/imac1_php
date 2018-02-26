<?php

require_once "Personne.class.php";

//si les trois champs existent et ne sont pas vident
if(isset($_GET["prenom"]) && isset($_GET["nom"]) && isset($_GET["age"])) {
  if(!empty($_GET["prenom"]) && !empty($_GET["nom"]) && !empty($_GET["age"])) {
    if($_GET["age"] > 0) { //vérifie que l'age est correct
      //instanciation avec les valeurs entrées dans le formulaire
      $personne = new Personne($_GET["prenom"], $_GET["nom"], $_GET["age"], "nulle part");
      $personne->afficher();
    }
    else {
      echo "Votre age est bizarre. Vous allez bien ?</br>";
    }
  }
  else {
    echo "Utilisation incorrecte. Vous avez dû faire des trucs chelous avec ce form...</br>";
  }
}

?>

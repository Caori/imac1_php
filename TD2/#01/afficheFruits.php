<?php

  $retour = null;
  if(isset($_POST["fruit"])) { //si champs existe
    if(!empty($_POST["fruit"])) { //si une/plusieurs cases cochées
      $retour = "J'adore ";
      foreach($_POST["fruit"] as $fruit) {
        $retour = $retour . "les " . $fruit ."... ";
      }
    }
  }
  else { //si aucune case cochée
    $retour = "Vous n'aimez aucun fruit ! C'est triste :'( </br>";
  }
  echo $retour;

?>

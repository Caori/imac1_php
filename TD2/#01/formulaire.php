<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8" />
     <title> Table de multiplication </title>
</head>
<body>
  <form method="POST" action="formulaire.php">
    <input placeholder="Chiffre" required="required" name="number" type="number">
    <input value="Calculer" type="submit">
  </form>

<?php
  if(isset($_POST["number"])) { //$_POST["number"] défini ? = champs existe ?
    if(!empty($_POST["number"])) { //si champs rempli
      $nb = $_POST["number"];
      $retour = null;
      for($i = 1; $i <= 10; $i++) {
        $retour = $retour . "{$nb}*{$i} = " . $nb*$i . "</br>"; //on stack dans un string
      }
    }
    else { //si champs vide
      echo "Champs vide. 1 like = 1 prayer</br>";
    }
    echo $retour; //toutes les infos s'affichent d'un coup
  }

?>
</body>
</html>

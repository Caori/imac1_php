<?php

class Personne {
    private $prenom;
    private $nom;
    private $age;
    private $ville;

    //constructeur
    public function __construct($prenom, $nom, $age, $ville) {
      $this->prenom = (string) $prenom;
      $this->nom = (string) $nom;
      $this->age = (int) $age;
      $this->ville = (string) $ville;
    }

    //getter générique
    public function get($nomAttribut) {
      return $this->$nomAttribut;
    }

    //setter générique
    public function set($nomAttribut, $valeur) {
      $this->$nomAttribut = $valeur;
    }

    //affiche les attributs d'une Personne
    public function afficher() {
      if(date("H") < 18) { //s'il est plus tôt que 18h
        $retour = "Bonjour, je m'appelle " . $this->prenom . " " . $this->nom .",
        je viens de " . $this->ville . " et j'ai " . $this->age . " ans. </br>";
      }
      else {
        $retour = "Bonsoir, je m'appelle " . $this->prenom . " " . $this->nom .",
        je viens de " . $this->ville . " et j'ai " . $this->age . " ans. </br>";
      }
      echo $retour;
    }
}

?>

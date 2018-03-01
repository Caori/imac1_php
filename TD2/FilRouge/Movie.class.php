<?php

class Movie {
  private $id;
  private $title;
  private $date;
  private $genre;
  private $director;

  //constructeur
  public function __construct($id, $title, $date, $genre, $director) {
    $this->id = (int) $id;
    $this->title = (string) $title;
    $this->date = (string) $date;
    $this->genre = (string) $genre;
    $this->director = (string) $director;
  }

  //getter générique
  public function get($nomAttribut) {
    return $this->$nomAttribut;
  }

  //setter générique
  public function set($nomAttribut, $valeur) {
    $this->$nomAttribut = $nomAttribut;
  }

  //affiche les attributs d'un film
  public function renderHTML() {
      $retour = <<<HTML
      <div class='item'>
        <strong>{$this->title} ({$this->date}) : </strong>
         <ul>
           <li>Genre: {$this->genre}</li>
           <li>Director: {$this->director}</li>
         </ul>
      </div>
HTML;

    echo $retour;
  }
}

?>

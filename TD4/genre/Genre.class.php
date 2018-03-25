<?php
//ne fonctionne qu'avec le chemin absolu, je sais pas pourquoi
include(dirname(__DIR__).'/pdo/MyPDO.imac_movies.include.php');

/**
 * Classe Genre
 */
class Genre {

	/***********************ATTRIBUTS***********************/

	// Identifiant
	private $id = null;
	// Nom
	private $name = null;


	/*********************CONSTRUCTEURS*********************/

	// Constructeur non accessible
	function __construct() {}

	/**
	 * Usine pour fabriquer une instance de Genre à partir d'un id (via la bdd)
	 * @param int $id identifiant du genre à créer (bdd)
	 * @return Genre instance correspondant à $id
	 * @throws Exception s'il n'existe pas cet $id dans a bdd
	 */
	public static function createFromId($id){
		$stmt = MyPDO::getInstance()->prepare("SELECT * FROM Genre WHERE id=?;");
		$stmt->execute(array($id));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Genre");
		if (($object = $stmt->fetch()) !== false)
			return $object;
		else
			throw new Exception("Erreur : ce genre n'existe pas.");
	}

	/********************GETTERS SIMPLES********************/

	/**
	 * Getter sur l'identifiant
	 * @return int $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Getter sur le nom
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/*******************GETTERS COMPLEXES*******************/

	/**
	 * Récupère tous les enregistrements de la table Genre de la bdd
	 * qui ont au moins un film associé au genre
	 * Tri par ordre alphabétique
	 * @return array<Genre> liste d'instances de Genre
	 */
	public static function getAll() {
		$all = MyPDO::getInstance()->prepare(
		"SELECT g.name, COUNT(g.id) AS nb_films
		FROM MovieGenre mg, Genre g
		WHERE mg.idGenre = g.id
	  GROUP BY g.id
	  HAVING nb_films > 0
		ORDER BY g.name;");
		$all->execute();
		$all->setFetchMode(PDO::FETCH_OBJ);
		$results = $all->fetchAll();

		return $results;
	}
}

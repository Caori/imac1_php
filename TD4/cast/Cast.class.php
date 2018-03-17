<?php
require_once '../pdo/MyPDO.imac_movies.include.php';

error_reporting(E_ALL);
ini_set("display_errors", 1);

/**
 * Classe Cast
 */
class Cast {

	/***********************ATTRIBUTS***********************/

	// Identidiant
	private $id=null;
	// Prénom
	private $firstname=null;
	// Nom
	private $lastname=null;
	// Année de naissance
	private $birthYear=null;
	// Année de décès
	private $deathYear=null;

	/*********************CONSTRUCTEURS*********************/

	// Constructeur non accessible
	function __construct() {}

	/**
	 * Usine pour fabriquer une instance de Cast à partir d'un id (via la bdd)
	 * @param int $id identifiant du cast à créer (bdd)
	 * @return Cast instance correspondant à $id
	 * @throws Exception s'il n'existe pas cet $id dans a bdd
	 */
	public static function createFromId($id){
		$stmt = MyPDO::getInstance()->prepare("SELECT * FROM Cast WHERE id=?;");
		$stmt->execute(array($id));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Cast");
		if (($object = $stmt->fetch()) !== false)
			return $object;
		else
			throw new Exception("Erreur : cette personne n'existe pas.");
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
	 * Getter sur le prénom
	 * @return string $firstname
	 */
	public function getFirstname() {
		return $this->firstname;
	}

	/**
	 * Getter sur le nom
	 * @return string $lastname
	 */
	public function getLastname() {
		return $this->lastname;
	}

	/**
	 * Getter sur l'année de naissance
	 * @return int $birthYear
	 */
	public function getBirthYear() {
		return $this->birthYear;
	}

	/**
	 * Getter sur l'année de décès
	 * @return int $deathYear (null si vivant)
	 */
	public function getDeathYear() {
		return $this->deathYear;
	}

	/**
	 * Vérifie si le cast est vivant.e
	 * @return bool
	 */
	public function isAlive() {
		if($this->deathYear === null)
			return true;
		else return false;
	}

	/*******************GETTERS COMPLEXES*******************/

	/**
	 * Récupère tous les enregistrements de la table Cast de la bdd
	 * Tri par ordre alphabétique sur le nom puis sur le prénom
	 * @return array<Cast> liste d'instances de Cast
	 */
	public static function getAll() {
		$all = MyPDO::getInstance()->prepare("SELECT * FROM Cast
			ORDER BY lastname, firstname;");
		$all->execute();
		$all->setFetchMode(PDO::FETCH_OBJ);
		$results = $all->fetchAll();

		return $results;
	}

	/**
	 * Récupère tou.te.s les réalisateurs/réalisatrices d'un film
	 * Tri par ordre alphabétique selon le nom puis le prénom
	 * @param  $idMovie identifiant du film
	 * @return array<Cast> liste des instances de Cast
	 */
	public static function getDirectorsFromMovieId($idMovie) {
		$stmt = MyPDO::getInstance()->prepare(
			"SELECT c.id, c.firstname, c.lastname
			FROM Cast c, Director d, Movie m
			WHERE c.id = d.idDirector
			AND m.id = d.idMovie
			AND m.id=?
			ORDER BY c.lastname, c.firstname;");
		$stmt->execute(array($idMovie));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Cast");
		if (($object = $stmt->fetchAll()) !== false)
			return $object;
	}

	/**
	 * Récupère tou.te.s les acteurs/actrices d'un film avec leur rôle
	 * Tri par ordre alphabétique selon le nom puis le prénom
	 * @param  $idMovie identifiant du film
	 * @return array<Cast> liste d'instances de Cast
	 */
	public static function getActorsFromMovieId($idMovie) {
		$stmt = MyPDO::getInstance()->prepare(
			"SELECT c.id, c.firstname, c.lastname, a.name
			FROM Cast c, Actor a, Movie m
			WHERE c.id = a.idActor
			AND m.id = a.idMovie
			AND m.id=?
			ORDER BY c.lastname, c.firstname;");
		$stmt->execute(array($idMovie));
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Cast");
		if (($object = $stmt->fetchAll()) !== false)
			return $object;
	}

}

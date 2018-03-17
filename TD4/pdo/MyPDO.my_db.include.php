<?php
require_once 'MyPDO.class.php';

// TO DO : à modifier
// host=votre serveur (localhost si travail en local)
MyPDO::setConfiguration('mysql:host=mysql;dbname=imac_movies;charset=utf8', 'login', 'mdp');

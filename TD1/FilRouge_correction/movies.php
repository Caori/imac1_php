<?php
require_once('data.movies.php');

function render_movie_list($movies, $genre="Science Fiction", $nbYear=10){
	// récupération de l'année actuelle
	$today = date('Y');

	// vérification du contenu de $movies
	if (!isset($movies) or empty($movies)) {
		return "<div class='error-message'>
			There is no movie 
			<span class='emoji'>🙄</span>
		</div>"; 
	}

	// rendu
	$content = "<div class='movie-list'>\n";

	foreach ($movies as $movie) {
		$highlightedYear = ($today - $movie['year'] <= $nbYear) ? "highlighted-year" : "";

		$highlightedGenre = ($movie['genre'] == $genre) ? "highlighted-genre" : "";

		$content .= <<<HTML
			<div class='movie-item'>
				<h2>
					<span class='movie-title'>{$movie['title']}</span>
					<span class='movie-year $highlightedYear'>
						({$movie['year']})
					</span>
				</h2>
				<ul>
					<li class='movie-genre $highlightedGenre'>
						Genre: {$movie['genre']}
					</li>
					<li class='movie-director'>
						Director: {$movie['director']}
					</li>
				</ul>
			</div>

HTML;
	}

	$content .= "</div>\n";

	return $content;
}

$content = render_movie_list($movies);

$html = <<<HTML
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>🎞ＭＯＶＩＥＳ🎞</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<h1>🎞ＭＯＶＩＥＳ🎞</h1>
		$content
	</body>
</html>
HTML;

echo $html;

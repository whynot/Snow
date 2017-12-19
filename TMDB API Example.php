<?php
	
	// This code is used in my website http://sanpetemovies.com to fetch data
	// from The Movie Database json API at http://www.themoviedb.com

	// configuration for TMDB API
	$config['tmdb_id'] = 181808;
	$config['api_key'] = 'a030b7c76b419887167e868e9b37f1cf';
	$config['lang'] = 'en-US';
	$config['api_url'] = 'http://api.themoviedb.org/3';
	$config['image_url'] = 'https://image.tmdb.org/t/p/w370_and_h556_bestv2';

	// CURL function to fetch API data and return as an array for processing
	function tmdb($url = null)
	{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_FAILONERROR, 1);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		$results = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		}
		
		return (array) json_decode(($results), true);
	}

	// Grab data from TMDB
  $moviedata = tmdb($config['api_url'] . '/movie/' . $config['tmdb_id'] . '?api_key=' . $config['api_key'] . '&language=' . $config['lang']);
	
	// Assign movie data to template array for caching to database and display
  if(!$err && $moviedata) {
    $template['movie_title'] = $moviedata['title'];

    $template['tmdb_id'] = $moviedata['id'];
    $template['imdb_id'] = $moviedata['imdb_id'];
    $template['movie_plot'] = $moviedata['overview'];
    $template['movie_runtime'] = $moviedata['runtime'];
    $template['movie_poster'] = $config['image_url'] . $moviedata['poster_path'];

    // Parse the movie genre list
    $i = 0;
    while($moviedata['genres'][$i]) {
        $genre_name = $moviedata['genres'][$i]['name'];
        $movie_genres[] = array("name" => $genre_name);
        $i++;
    }
		$template['movie_genres'] = $movie_genres;

		// Display raw array here but in production the data is cached to a SQL database
		print_r($template);
  }

?>
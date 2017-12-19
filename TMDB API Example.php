<?php

	// configuration for TMDB API
	$config['api_key'] = '';
	$config['lang'] = 'en';
	$config['api_url'] = 'http://api.themoviedb.org/3/';

	/**
	* TMDB class to interface with TMDB API
	*/
class TMDB
	{
		const API_URL = $config['api_url'];
		
		function __construct($config = null)
		{
			
		}
		
		private function 
		
		function fetch($url = null)
		{
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_HEADER, 0);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_FAILONERROR, 1);
			$results = curl_exec($curl);
			curl_close($curl);
			
			return (array) json_decode(($results), true);
		}
	}

?>
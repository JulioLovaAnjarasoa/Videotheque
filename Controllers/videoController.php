<?php
require $_SERVER['DOCUMENT_ROOT'] . '/Videotheque/Modeles/api.php';

class VideoController
{
    public $tmdbAPI;
    public function __construct()
    {
        $this->tmdbAPI = new TMDBApi();
    }

    public function get_videos()
    {
        $endpoint = 'discover/movie';
        $data = $this->tmdbAPI->get_from_api($endpoint);
        return json_decode($data)->results;
    }

    public function get_movies_types()
    {
        $endpoint = "genre/movie/list";
        $data = $this->tmdbAPI->get_from_api($endpoint);
        return json_decode($data)->genres;
    }

    public function get_top_rated_movies()
    {
        $endpoint = "movie/top_rated";
        $data = $this->tmdbAPI->get_from_api($endpoint);
        return json_decode($data)->results;
    }

    public function get_movies_by_genres($genre_id)
    {
        $endpoint = "discover/movie";
        $query[] = ["with_genres", $genre_id];
        $data = $this->tmdbAPI->get_from_api($endpoint, $query);
        return json_decode($data)->results;
    }
}

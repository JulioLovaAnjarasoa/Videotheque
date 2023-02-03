<?php
require $_SERVER['DOCUMENT_ROOT'] . '/Videotheque/API/api.php';

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
        return json_decode($data);
    }

    public function get_movies_types()
    {
        $endpoint = "genre/movie/list";
        $data = $this->tmdbAPI->get_from_api($endpoint);
        return json_decode($data)->genres;
    }
}

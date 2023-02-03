<?php

require $_SERVER['DOCUMENT_ROOT'] . '/Videotheque/Controllers/videoController.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Videotheque/Views/layout.php';

class Controller
{
    public $video_controller;
    public $layout;
    public function __construct()
    {
        $this->video_controller = new VideoController();
        $this->layout = new Layout();
    }

    public function index()
    {
        $movies_Genres = $this->video_controller->get_movies_types();
        $this->layout->index($movies_Genres);
    }
}

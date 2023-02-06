<?php

require $_SERVER['DOCUMENT_ROOT'] . '/Videotheque/Controllers/videoController.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Videotheque/Controllers/UserController.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Videotheque/Views/layout.php';

class Controller
{
    public $video_controller;
    public $user_controller;
    public $layout;
    public function __construct()
    {
        $this->video_controller = new VideoController();
        $this->user_controller = new UserController();
        $this->layout = new Layout();
    }

    public function index()
    {
        if (is_null($_SESSION['token']) || empty($_SESSION['token'])) {
            if (is_null($_POST['token']) || empty($_POST['token'])) {
                $this->layout->login_or_register();
            } else {
                $this->user_controller;
            }
        } else {
            $datas['types'] = $this->video_controller->get_movies_types();
            if ($_GET['genre']) {
                $datas['type'] = $_GET['type'];
                $datas['movies'] = $this->video_controller->get_movies_by_genres($_GET['genre']);
            } else {
                $datas['movies'] = $this->video_controller->get_videos();
                $datas['popular_movies'] = $this->video_controller->get_top_rated_movies();
                $datas['type'] = 'List of ';
            }
            $this->layout->index($datas);
        }
    }
}

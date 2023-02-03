<?php

require_once 'vendor/autoload.php';

// Loading environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// require $_SERVER['DOCUMENT_ROOT'] . '/Videotheque/Controllers/videoController.php';
// require $_SERVER['DOCUMENT_ROOT'] . '/Videotheque/Views/index.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Videotheque/Controllers/index.php';

$controller = new Controller();
$controller->index();

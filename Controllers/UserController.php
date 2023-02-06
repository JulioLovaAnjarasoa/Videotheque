<?php

require $_SERVER['DOCUMENT_ROOT'] . '/Videotheque/Modeles/bdd.php';

class UserController
{
    public $db;
    public function __construct()
    {
        $db = new App_DB();
        $this->db = $db->connect_To_DB();
    }

    public function register_user()
    {
    }
}

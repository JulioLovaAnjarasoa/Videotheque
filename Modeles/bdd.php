<?php

class App_DB
{
    public function __construct()
    {
    }

    public function connect_To_DB()
    {
        $mysqli = new mysqli("localhost", $_ENV['db_usr'], $_ENV['db_pwd'], $_ENV['db_name']);
        if ($mysqli->connect_errno) {
            die("connexion a échoué: " . $mysqli->connect_error);
        }
        return $mysqli;
    }
}

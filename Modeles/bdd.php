<?php

class App_DB
{
    public $db;
    public function __construct()
    {
        $this->connect_To_DB();
        $this->db_init();
    }

    private function db_init()
    {
        $userTable = 'User';
        $createUserTable = "CREATE TABLE IF NOT EXISTS User (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            mail VARCHAR(50) UNIQUE,
            pwd TEXT NOT NULL
            )";
        $this->db->query($createUserTable);
    }

    public function connect_To_DB()
    {
        $mysqli = new mysqli("localhost", $_ENV['db_usr'], $_ENV['db_pwd'], $_ENV['db_name']);
        if ($mysqli->connect_errno) {
            die("connexion a échoué: " . $mysqli->connect_error);
        }
        $this->db = $mysqli;
    }

    public function insert_into_db($table, array $params = [])
    {
        $query = "INSERT INTO " . $table . " (" . implode(',', array_keys($params)) . ") VALUES (" .  "'" . implode("', '", array_values($params)) . "'" . ")";
        return $this->db->query($query);
    }
}

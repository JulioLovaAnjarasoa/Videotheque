<?php

require $_SERVER['DOCUMENT_ROOT'] . '/Videotheque/Modeles/bdd.php';

class UserController
{
    public $db;
    public $table;
    public function __construct()
    {
        $this->db = new App_DB();
        $this->table = 'User';
    }

    public function register_user()
    {
        // firstname, lastname, mail, pwd
        password_hash("Cloudways", PASSWORD_DEFAULT);
        $params = [
            "firstname" => $_POST['inputFirstName'],
            "lastname" => $_POST['inputLastName'],
            "mail" => $_POST['inputEmail'],
            "pwd" => password_hash($_POST['inputPassword'], PASSWORD_DEFAULT),
        ];
        $insert_id = $this->db->insert_into_db($this->table, $params);
        if ($insert_id) {
            $user_response = $this->db->get_user_from_db($insert_id);
            $user = $user_response->fetch_assoc();
            $_SESSION['token'] = $user['pwd'];
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
                $redirect = "https://";
            } else {
                $redirect = "http://";
            }
            $redirect .= "" . $_SERVER['SERVER_NAME'] . "/Videotheque";
            header('Location: ' . $redirect);
        }
    }
}

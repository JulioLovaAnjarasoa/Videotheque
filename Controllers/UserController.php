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
            $user_response = $this->db->get_user_by_id_from_db($insert_id);
            $user = $user_response->fetch_assoc();
            $_SESSION['token'] = $user['pwd'];
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
                $redirect = "https://";
            } else {
                $redirect = "http://";
            }
            $redirect .= "" . $_SERVER['SERVER_NAME'] . "/Videotheque";
            header('Location: ' . $redirect);
        } else {
            unset($_POST);
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
    }

    public function user_login()
    {
        $mail = $_POST['inputEmail'];
        $user_response = $this->db->get_user_by_mail_from_db($mail);

        $user = $user_response->fetch_assoc();
        if (isset($user)) {
            if (!is_null($user['pwd']) && !empty($user['pwd'])) {
                $verify = password_verify($_POST['inputPassword'], $user['pwd']);
                if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
                    $redirect = "https://";
                } else {
                    $redirect = "http://";
                }
                $redirect .= "" . $_SERVER['SERVER_NAME'] . "/Videotheque";
                if ($verify) {
                    $_SESSION['token'] = $user['pwd'];
                    $_SESSION['usr_first_name'] = $user['firstname'];
                    $_SESSION['usr_last_name'] = $user['lastname'];
                } else {
                    unset($_POST);
                }
                header('Location: ' . $redirect);
            }
        } else {
            unset($_POST);
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
    }

    public function user_logout()
    {
        session_destroy();

        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
            $redirect = "https://";
        } else {
            $redirect = "http://";
        }
        $redirect .= "" . $_SERVER['SERVER_NAME'] . "/Videotheque";
        header("Refresh:0; url=" . $redirect);
    }
}

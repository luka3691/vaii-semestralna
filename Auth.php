<?php

class Auth
{
    public $isLoggedIn = false;

    public function __construct()
    {
        if (isset($_POST['login'])) {
            $this->login($_POST['login']);
        }


        if (isset($_SESSION['logged'])) {
            $this->isLoggedIn = true;
        }
    }

    public function login($email){
        if ($email == "ferko") {
            $this->isLoggedIn = true;
            $_SESSION['logged'] = true;
        } else {
            $this->logout();
        }
    }

    public function logout() {
        $this->isLoggedIn = false;
        unset($_SESSION['logged']);
        session_destroy();
    }
}
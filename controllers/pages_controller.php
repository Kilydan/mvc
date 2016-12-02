<?php

class PagesController
{
    public function home()
    {
        $first_name = 'Tim';
        $last_name = 'Hoenselaar';
        require_once('views/pages/home.php');
    }

    public function admin()
    {
        require_once('views/pages/admin.php');
    }

    public function signup()
    {
        require_once('views/pages/signup.php');
    }

    public function login()
    {
        require_once('views/pages/login.php');
    }

    public function error()
    {
        require_once('views/pages/error.php');
    }
}
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
        require_once('views/pages/admin/admin.php');
    }
    public function signup()
    {
        require_once('views/pages/signup.php');
    }

    public function login()
    {
        require_once('views/pages/login.php');
    }
    public function account(){
        require_once('views/users/account.php');
    }
    public function contact(){
        require_once('views/pages/contact.php');
    }
    public function edit_account(){
        require_once('views/users/edit_account.php');
    }
    public function logout()
    {
        require_once('views/pages/logout.php');
    }
    public function voorwaardes()
    {
        require_once('views/pages/voorwaardes.php');
    }
    public function huren(){
        require_once('views/cars/huren.php');
    }
    public function error()
    {
        require_once('views/pages/error.php');
    }
}
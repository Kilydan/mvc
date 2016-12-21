<?php
    class AccountController {
        public function signup(){
            $name = $_GET['name'];
            $username = $_GET['username'];
            $password = $_GET['password'];
            $address = $_GET['address'];
            $postalcode = $_GET['postalcode'];
            $place = $_GET['place'];
            $signup = Account::create($name, $username, $password, $address, $postalcode, $place);
            require_once('views/users/login.php');
        }
        public function login(){
            $username = $_GET['username'];
            $password = $_GET['password'];
            $login = Account::login($username, $password);
            require_once('views/users/login.php');
        }
        public function is_loggedin(){
        }
        public function logout(){
            $logout = Account::logout();
//            require_once('views/users/logout.php');
        }
        public function edit(){
            $name = $_GET['name'];
            $username = $_GET['username'];
//            $password = $_GET['password'];
            $address = $_GET['address'];
            $postalcode = $_GET['postalcode'];
            $place = $_GET['place'];
            $edit = Account::edit($name, $username, $address, $postalcode, $place);
            require_once('views/users/account.php');
        }
        public function get_role($gebruiker_email){
            $role = Account::get_role($gebruiker_email);
        }
    }
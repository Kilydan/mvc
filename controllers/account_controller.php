<?php
    class AccountController {
        public function signup(){
            $username = $_GET['username'];
            $password = $_GET['password'];
            $signup = Account::create($username, $password);
            require_once('views/users/login.php');
        }
        public function login(){
            $username = $_GET['username'];
            $password = $_GET['password'];
            $login = Account::login($username, $password);
//            require_once('views/users/login.php');
        }
        public function is_loggedin(){
        }
        public function logout(){
            $logout = Account::logout();
//            require_once('views/users/logout.php');
        }
        public function edit(){

        }
        public function get_role($username){
            $role = Account::get_role($username);
        }
    }
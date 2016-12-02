<?php
    class AccountController {
        public function signup(){
            $username = $_GET['username'];
            $password = $_GET['password'];
            $signup = Account::create($username, $password);
        }
        public function login(){
            require_once('views/users/login.php');
        }
        public function logout(){

        }
        public function edit(){

        }
    }
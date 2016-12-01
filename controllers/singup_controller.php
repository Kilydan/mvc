<?php
    class SignupController {
        public function signup(){
            dump('test');
            die();
            $username = $_GET['username'];
            $password = $_GET['password'];
            $signup = Signup::create($username, $password);
            require_once('views/users/signup.php');
        }
        public function logout(){

        }
        public function edit(){

        }
        public function login(){

    }
    }
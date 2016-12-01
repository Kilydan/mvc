<?php
    class SignupController {
        public function signup(){
            $username = $_GET['username'];
            $password = $_GET['password'];
            $signup = Signup::create($username, $password);
            require_once('views/pages/signup.php');
        }
        public function logout(){

        }
        public function edit(){

        }
        public function login(){

    }
    }
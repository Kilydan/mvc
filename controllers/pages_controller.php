<?php
    class PagesController {
        public function home() {
            $first_name = 'Tim';
            $last_name = 'Hoenselaar';
            require_once('views/pages/home.php');
        }
        public function admin() {
            require_once('views/pages/admin.php');
        }
        public function error() {
            require_once('views/pages/error.php');
        }
    }
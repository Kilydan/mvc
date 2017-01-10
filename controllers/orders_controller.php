<?php
    Class OrdersController {
        public function index(){
            $orders = Orders::index();
            require_once('views/pages/admin/reserveringen.php');
        }
        public function dates(){
            $orders = Orders::dates();
            require_once('views/cars/huren.php');
        }
        public function afhandelen(){
            $factuurnummer = $_GET['factuurnummer'];
            $afgehandeld = $_GET['afgehandeld'];
            $orders = Orders::afhandelen($factuurnummer, $afgehandeld);
        }
        public function remove(){
            $orders = Orders::remove();
        }
        public function invoices(){
            $usersession = $_SESSION['user_session'];
            $invoices = Orders::invoices($usersession);
            require_once('views/pages/facturen.php');
        }
    }
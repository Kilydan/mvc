<?php
    Class OrdersController {
        public function index(){
            $orders = Orders::index();
            require_once('views/pages/admin/reserveringen.php');
        }
    }
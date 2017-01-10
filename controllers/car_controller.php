<?php
    class CarController {
        public function indexadmin() {
            // we store all the posts in a variable
            $cars = Car::all();
            require_once('views/pages/admin/autos.php');
        }
        public function index() {
            // we store all the posts in a variable
            $cars = Car::all();
            require_once('views/cars/index.php');
        }
        public function addCar(){
            $kenteken = $_GET['kenteken'];
            $brand = $_GET['brand'];
            $type = $_GET['type'];
            $price = $_GET['price'];
            $description = $_GET['description'];
            $image = $_GET['image'];
            $addcar = Car::addCar($kenteken, $brand, $type, $price, $description, $image);
            require_once('views/pages/addcarsuccess.php');
        }
        public function change() {
            $auto_kenteken = $_GET['kenteken'];
            $brand = $_GET['brand'];
            $type = $_GET['type'];
            $price = $_GET['price'];
            $description = $_GET['description'];
            $image = $_GET['image'];
            $car = Car::change($auto_kenteken, $brand, $type, $price, $description, $image);
            require_once('views/pages/addcarsuccess.php');
        }
        public function remove(){
            $auto_kenteken = $_SESSION['auto_kenteken'];
            $car = Car::remove($auto_kenteken);
            require_once('views/pages/addcarsuccess.php');
        }
        public function show() {
            //we expect a url of form ?controller-post&action=show&id=x
            // without an id we j   ust redirect to the error page as we need the post id to find it in the database
            $auto_kenteken = $_GET['kenteken'];
            if (!isset($auto_kenteken))
                return call('car', 'error');

            // we use the given id to get the right post
            $car = Car::find($auto_kenteken);
           require_once('views/cars/show.php');
        }
        public function rent() {
            $kenteken = $_GET['kenteken'];
            $start_date = $_GET['start_date'];
            $end_date = $_GET['end_date'];
            $rent = Car::rent($kenteken, $start_date, $end_date);
            //header("location: /views/cars/factuur.php");
            require_once('views/pages/bedankt.php');
        }
    }
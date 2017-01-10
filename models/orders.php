<?php

class Orders
{
    public $auto_kenteken;
    public $factuurnummer;
    public $start_date;
    public $end_date;

    public function __construct($auto_kenteken, $factuurnummer, $start_date, $end_date, $afgehandeld)
    {
        $this->auto_kenteken = $auto_kenteken;
        $this->factuurnummer = $factuurnummer;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->afgehandeld = $afgehandeld;
    }

    public static function index(){
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM reservering ORDER BY auto_gereserveerd_van');

        foreach ($req->fetchAll() as $order){
            $list[] = new Orders($order['auto_kenteken'], $order['factuurnummer'], $order['auto_gereserveerd_van'], $order['auto_gereserveerd_tot'], $order['afgehandeld']);
        }
        die(print_r($list));
        return $list;
    }
    public static function remove(){
        $db = Db::getInstance();
        date_default_timezone_set('Europe/Amsterdam');
        $today = date('Y-m-d');
//        die($today);
        $req = $db->prepare('DELETE reservering FROM reservering WHERE auto_gereserveerd_tot < :today');
        $req->bindParam(":today", $today);
        $req->execute();
        header("Refresh:0; url=/?controller=orders&action=index", true, 303);
    }
    public static function dates(){
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM reservering ORDER BY auto_gereserveerd_van');
        foreach ($req->fetchAll() as $order){
            $list[] = new Orders($order['auto_kenteken'], $order['factuurnummer'], $order['auto_gereserveerd_van'], $order['auto_gereserveerd_tot'], $order['afgehandeld']);
        }
        return $list;
    }

    public static function invoices($usersession){
        $list = [];
        $db = Db::getInstance();
        $req = $db->prepare('SELECT reservering.* FROM reservering INNER JOIN orders WHERE orders.klant_id=:usersession AND orders.factuurnummer = reservering.factuurnummer;');
        $req->bindParam(":usersession", $usersession, PDO::PARAM_INT);
        $req->execute();
//        $req->execute(array(':usersession' => $usersession));
//        $result = $req->fetchAll();
//        die(print_r($result));
//        $req->execute(array('usersession' => $usersession));
//        print_r($result);
        foreach ($req->fetchAll() as $order){
            $list[] = new Orders($order['auto_kenteken'], $order['factuurnummer'], $order['auto_gereserveerd_van'], $order['auto_gereserveerd_tot'], $order['afgehandeld']);
        }
        return $list;
    }

    public static function afhandelen($factuurnummer, $afgehandeld){
        try {
            $db = Db::getInstance();
            // check if username already exists
//            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $ins = $db->prepare('UPDATE reservering SET afgehandeld=:afgehandeld WHERE factuurnummer=:factuurnummer');

            $ins->bindParam(":factuurnummer", $factuurnummer);
            $ins->bindParam(":afgehandeld", $afgehandeld);
            $ins->execute();

//            return $ins;
            header("Refresh:0; url=/?controller=orders&action=index", true, 303);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
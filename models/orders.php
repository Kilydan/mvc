<?php

class Orders
{
    public $auto_kenteken;
    public $factuurnummer;
    public $start_date;
    public $end_date;

    public function __construct($auto_kenteken, $factuurnummer, $start_date, $end_date)
    {
        $this->auto_kenteken = $auto_kenteken;
        $this->factuurnummer = $factuurnummer;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }

    public static function index(){
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM reservering ORDER BY auto_gereserveerd_van');

        foreach ($req->fetchAll() as $order){
            $list[] = new Orders($order['auto_kenteken'], $order['factuurnummer'], $order['auto_gereserveerd_van'], $order['auto_gereserveerd_tot']);
        }
        return $list;
    }
}